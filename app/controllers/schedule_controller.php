<?php

require_once __DIR__ . '/../helpers/api_helper.php';

class ScheduleController {
    
    public function index() {
        if (!isset($_SESSION['token'])) {
            header('Location: /login');
            exit();
        }

        $response = ApiHelper::get('/schedules');
        $schedules = $response['http_status'] === 200 ? ($response['data'] ?? []) : [];
        
        require_once __DIR__ . '/../views/schedule/index.php';
    }

    public function create() {
        if (!isset($_SESSION['token'])) {
            header('Location: /login');
            exit();
        }
        
        require_once __DIR__ . '/../views/schedule/create.php';
    }

    public function store() {
        if (!isset($_SESSION['token'])) {
            header('Location: /login');
            exit();
        }

        $data = [
            'name' => $_POST['name'] ?? '',
            'description' => $_POST['description'] ?? '',
            'date' => $_POST['date'] ?? '',
            'time' => $_POST['time'] ?? ''
        ];

        $response = ApiHelper::post('/schedules', $data);

        if ($response['http_status'] === 201) {
            $_SESSION['success'] = "Kegiatan berhasil ditambahkan!";
            header('Location: /schedule');
        } else {
            $_SESSION['error'] = $response['message'] ?? "Gagal menambahkan kegiatan.";
            header('Location: /schedule/create');
        }
        exit();
    }

    public function delete($id) {
        if (!isset($_SESSION['token'])) {
            header('Location: /login');
            exit();
        }

        $response = ApiHelper::delete('/schedules/' . $id);

        if ($response['http_status'] === 200) {
            $_SESSION['success'] = "Kegiatan berhasil dihapus!";
        } else {
            $_SESSION['error'] = "Gagal menghapus kegiatan.";
        }
        
        header('Location: /schedule');
        exit();
    }
}