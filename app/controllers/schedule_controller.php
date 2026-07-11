<?php

require_once __DIR__ . '/../helpers/api_helper.php';

class ScheduleController {
    
    public function index() {
        if (!isset($_SESSION['token'])) {
            header('Location: /login');
            exit();
        }

        $response = ApiHelper::get('/schedule');
        $schedules = $response['http_status'] === 200 ? ($response['data'] ?? []) : [];
        $error_message = null;
        if ($response['http_status'] !== 200 && $response['http_status'] !== 404) {
            $error_message = $response['message'] ?? "Gagal memuat rekomendasi jadwal.";
        }
        
        require_once __DIR__ . '/../views/schedule/index.php';
    }
}