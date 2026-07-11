<?php

require_once __DIR__ . '/../helpers/api_helper.php';

class TaskController {
    
    public function index() {
        if (!isset($_SESSION['token'])) {
            header('Location: /login');
            exit();
        }

        $response = ApiHelper::get('/tasks');
        $tasks = $response['http_status'] === 200 ? ($response['data'] ?? []) : [];
        
        require_once __DIR__ . '/../views/tasks/index.php';
    }

    public function create() {
        if (!isset($_SESSION['token'])) {
            header('Location: /login');
            exit();
        }
        
        require_once __DIR__ . '/../views/tasks/create.php';
    }

    public function store() {
        if (!isset($_SESSION['token'])) {
            header('Location: /login');
            exit();
        }

        $data = [
            'name' => $_POST['name'] ?? '',
            'description' => $_POST['description'] ?? '',
            'difficulty_level' => (int)($_POST['difficulty_level'] ?? 1),
            'importance_level' => (int)($_POST['importance_level'] ?? 1),
            'deadline' => $_POST['deadline'] ?? ''
        ];

        $response = ApiHelper::post('/tasks', $data);

        if ($response['http_status'] === 201) {
            $_SESSION['success'] = "Tugas berhasil ditambahkan!";
            header('Location: /tasks');
        } else {
            $_SESSION['error'] = $response['message'] ?? "Gagal menambahkan tugas.";
            header('Location: /tasks/create');
        }
        exit();
    }

    public function complete($id) {
        if (!isset($_SESSION['token'])) {
            header('Location: /login');
            exit();
        }

        $response = ApiHelper::put('/tasks/' . $id, [
            'status' => 'completed'
        ]);

        if ($response['http_status'] === 200) {
            $_SESSION['success'] = "Yey! Tugas berhasil diselesaikan!";
        } else {
            $_SESSION['error'] = "Gagal mengubah status tugas.";
        }
        
        header('Location: /tasks');
        exit();
    }

    public function delete($id) {
        if (!isset($_SESSION['token'])) {
            header('Location: /login');
            exit();
        }

        $response = ApiHelper::delete('/tasks/' . $id);

        if ($response['http_status'] === 200) {
            $_SESSION['success'] = "Tugas berhasil dihapus!";
        } else {
            $_SESSION['error'] = "Gagal menghapus tugas.";
        }
        
        header('Location: /tasks');
        exit();
    }
}