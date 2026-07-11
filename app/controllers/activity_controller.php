<?php

require_once __DIR__ . '/../helpers/api_helper.php';

class ActivityController {
    
    public function index() {
        if (!isset($_SESSION['token'])) {
            header('Location: /login');
            exit();
        }

        $response = ApiHelper::get('/activity');
        $kegiatans = $response['http_status'] === 200 ? ($response['data'] ?? []) : [];
        
        require_once __DIR__ . '/../views/activity/index.php';
    }

	public function create() {
        if (!isset($_SESSION['token'])) {
            header('Location: /login');
            exit();
        }
        
        require_once __DIR__ . '/../views/activity/create.php';
    }

    public function store() {
        if (!isset($_SESSION['token'])) {
            header('Location: /login');
            exit();
        }

        $data = [
            'name' => $_POST['name'] ?? '',
            'description' => $_POST['description'] ?? '',
            'activity_date' => $_POST['activity_date'] ?? '',
            'activity_time' => $_POST['activity_time'] ?? '',
        ];

        $response = ApiHelper::post('/activity', $data);

        if ($response['http_status'] === 201) {
            $_SESSION['success'] = "Kegiatan berhasil ditambahkan!";
            header('Location: /activity');
        } else {
            $_SESSION['error'] = $response['message'] ?? "Gagal menambahkan kegiatan.";
            header('Location: /activity/create');
        }
        exit();
    }

    public function delete($id) {
        if (!isset($_SESSION['token'])) {
            header('Location: /login');
            exit();
        }

        $response = ApiHelper::delete('/activity/' . $id);

        if ($response['http_status'] === 200) {
            $_SESSION['success'] = "Kegiatan berhasil dihapus!";
        } else {
            $_SESSION['error'] = "Gagal menghapus kegiatan.";
        }
        
        header('Location: /activity');
        exit();
    }
}