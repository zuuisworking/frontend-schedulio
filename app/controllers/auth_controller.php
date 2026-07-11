<?php

require_once __DIR__ . '/../helpers/api_helper.php';

class AuthController {
    
    public function index() {
        if (isset($_SESSION['token'])) {
            header('Location: /dashboard');
            exit();
        }
        
        require_once __DIR__ . '/../views/auth/login.php';
    }

    public function processLogin() {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        if (empty($email) || empty($password)) {
            $_SESSION['error'] = "Email dan password wajib diisi!";
            header('Location: /login');
            exit();
        }

        $response = ApiHelper::post('/login', [
            'email' => $email,
            'password' => $password
        ]);

        if ($response['http_status'] === 200 && isset($response['token'])) {
            $_SESSION['token'] = $response['token'];
            $_SESSION['user'] = $response['user'] ?? ['name' => 'User']; 
            header('Location: /dashboard');
        } else {
            $_SESSION['error'] = $response['message'] ?? "Email atau password salah. Gagal terhubung ke server.";
            header('Location: /login');
        }
        exit();
    }

    public function logout() {
        session_destroy();
        header('Location: /login');
        exit();
    }
}