<?php

require_once __DIR__ . '/../helpers/api_helper.php';

class AuthController {
    
    // Tampilkan form login
    public function index() {
        if (isset($_SESSION['token'])) {
            header('Location: /dashboard');
            exit();
        }
        
        require_once __DIR__ . '/../views/auth/login.php';
    }

    // Tampilkan form register
    public function register() {
        if (isset($_SESSION['token'])) {
            header('Location: /dashboard');
            exit();
        }
        
        require_once __DIR__ . '/../views/auth/register.php';
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

    public function processRegister() {
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $confirm_password = $_POST['confirm_password'] ?? '';

        if (empty($name) || empty($email) || empty($password)) {
            $_SESSION['error'] = "Semua kolom wajib diisi!";
            header('Location: /register');
            exit();
        }

        if ($password !== $confirm_password) {
            $_SESSION['error'] = "Konfirmasi password tidak cocok!";
            header('Location: /register');
            exit();
        }

        $response = ApiHelper::post('/register', [
            'name' => $name,
            'email' => $email,
            'password' => $password
        ]);

        if ($response['http_status'] === 201) {
            // Berhasil register, arahkan ke login dengan pesan sukses
            $_SESSION['success'] = "Pendaftaran berhasil! Silakan login.";
            header('Location: /login');
        } else {
            // Gagal register (misal email sudah ada)
            $_SESSION['error'] = $response['message'] ?? "Gagal mendaftar. Email mungkin sudah terdaftar.";
            header('Location: /register');
        }
        exit();
    }

    public function logout() {
        session_destroy();
        header('Location: /login');
        exit();
    }
}