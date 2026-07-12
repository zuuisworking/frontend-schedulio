<?php

require_once __DIR__ . '/../helpers/api_helper.php';

class DashboardController {
    
    public function index() {
        if (!isset($_SESSION['token'])) {
            header('Location: /login');
            exit();
        }

        $tasksResponse = ApiHelper::get('/tasks');
        $tasks = $tasksResponse['http_status'] === 200 ? ($tasksResponse['data'] ?? []) : [];

        $schedulesResponse = ApiHelper::get('/schedules');
        $schedules = $schedulesResponse['http_status'] === 200 ? ($schedulesResponse['data'] ?? []) : [];

        $completedTasks = 0;
        foreach ($tasks as $task) {
            if (isset($task['status']) && $task['status'] === 'completed') {
                $completedTasks++;
            }
        }

        $nearestResponse = ApiHelper::get('/dashboard/nearest');
        $nearestSchedules = $nearestResponse['http_status'] === 200 ? ($nearestResponse['data'] ?? []) : [];
        
        $chartData = [
            'labels' => [],
            'tasks' => array_fill(0, 7, 0),
            'schedules' => array_fill(0, 7, 0)
        ];

        for ($i = 6; $i >= 0; $i--) {
            $date = date('Y-m-d', strtotime("-$i days"));
            $chartData['labels'][] = date('d M', strtotime("-$i days"));

            foreach ($tasks as $task) {
                if (isset($task['deadline']) && strpos($task['deadline'], $date) === 0) {
                    $chartData['tasks'][6 - $i]++;
                }
            }
            
            foreach ($schedules as $schedule) {
                if (isset($schedule['date']) && strpos($schedule['date'], $date) === 0) {
                    $chartData['schedules'][6 - $i]++;
                }
            }
        }

        require_once __DIR__ . '/../views/dashboard/index.php';
    }
}