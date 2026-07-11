<?php

require_once __DIR__ . '/../helpers/api_helper.php';

class ActivityController {
    
    public function index() {
        if (!isset($_SESSION['token'])) {
            header('Location: /login');
            exit();
        }

        $response = ApiHelper::get('/activities');
        $kegiatans = $response['http_status'] === 200 ? ($response['data'] ?? []) : [];
        
        require_once __DIR__ . '/../views/activities/index.php';
    }

	public function create() {
        if (!isset($_SESSION['token'])) {
            header('Location: /login');
            exit();
        }
        
        require_once __DIR__ . '/../views/activities/create.php';
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

        $response = ApiHelper::post('/activities', $data);

        if ($response['http_status'] === 201) {
            $_SESSION['success'] = "Kegiatan berhasil ditambahkan!";
            header('Location: /activities');
        } else {
            $_SESSION['error'] = $response['message'] ?? "Gagal menambahkan kegiatan.";
            header('Location: /activities/create');
        }
        exit();
    }

    public function delete($id) {
        if (!isset($_SESSION['token'])) {
            header('Location: /login');
            exit();
        }

        $response = ApiHelper::delete('/activities/' . $id);

        if ($response['http_status'] === 200) {
            $_SESSION['success'] = "Kegiatan berhasil dihapus!";
        } else {
            $_SESSION['error'] = "Gagal menghapus kegiatan.";
        }
        
        header('Location: /activities');
        exit();
    }
}