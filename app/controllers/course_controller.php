<?php

require_once __DIR__ . '/../helpers/api_helper.php';

class CourseController {
    
    public function index() {
        if (!isset($_SESSION['token'])) {
            header('Location: /login');
            exit();
        }

        $response = ApiHelper::get('/courses');
        $courses = $response['http_status'] === 200 ? ($response['data'] ?? []) : [];
        
        require_once __DIR__ . '/../views/courses/index.php';
    }

    public function create() {
        if (!isset($_SESSION['token'])) {
            header('Location: /login');
            exit();
        }
        
        require_once __DIR__ . '/../views/courses/create.php';
    }

    public function store() {
        if (!isset($_SESSION['token'])) {
            header('Location: /login');
            exit();
        }

        $data = [
            'course_name' => $_POST['course_name'] ?? '',
            'day_of_week' => $_POST['day_of_week'] ?? '',
            'start_time' => $_POST['start_time'] ?? '',
            'end_time' => $_POST['end_time'] ?? '',
        ];

        $response = ApiHelper::post('/courses', $data);

        if ($response['http_status'] === 201) {
            $_SESSION['success'] = "Jadwal kuliah berhasil ditambahkan!";
            header('Location: /courses');
        } else {
            $_SESSION['error'] = $response['message'] ?? "Gagal menambahkan jadwal kuliah.";
            header('Location: /courses/create');
        }
        exit();
    }

    public function delete($id) {
        if (!isset($_SESSION['token'])) {
            header('Location: /login');
            exit();
        }

        $response = ApiHelper::delete('/courses/' . $id);

        if ($response['http_status'] === 200) {
            $_SESSION['success'] = "Jadwal kuliah berhasil dihapus!";
        } else {
            $_SESSION['error'] = "Gagal menghapus jadwal kuliah.";
        }
        
        header('Location: /courses');
        exit();
    }
}
