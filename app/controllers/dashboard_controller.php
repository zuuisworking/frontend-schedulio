<?php

require_once __DIR__ . '/../helpers/api_helper.php';

class DashboardController {
    
    public function index() {
        if (!isset($_SESSION['token'])) {
            header('Location: /login');
            exit();
        }

        $tasksResponse = ApiHelper::get('/tasks');
        $tasks = [];
        
        if ($tasksResponse['http_status'] === 200) {
            $tasks = $tasksResponse['data'] ?? [];
        } else if ($tasksResponse['http_status'] === 401) {
            session_destroy();
            header('Location: /login');
            exit();
        }

        $user = $_SESSION['user'] ?? ['name' => 'Pengguna'];

        require_once __DIR__ . '/../views/dashboard/index.php';
    }
}