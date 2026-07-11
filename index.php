<?php

session_start();

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

$apiBaseUrl = $_ENV['API_BASE_URL'] ?? 'https://backend-schedulio-production-ec22.up.railway.app/api';
define('API_BASE_URL', $apiBaseUrl);

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

switch ($uri) {
    case '/':
    case '/login':
        require_once __DIR__ . '/app/controllers/auth_controller.php';
        $controller = new AuthController();
        if ($method === 'POST') {
            $controller->processLogin();
        } else {
            $controller->index();
        }
        break;

    case '/register':
        require_once __DIR__ . '/app/controllers/auth_controller.php';
        $controller = new AuthController();
        if ($method === 'POST') {
            $controller->processRegister();
        } else {
            $controller->register();
        }
        break;

    case '/logout':
        require_once __DIR__ . '/app/controllers/auth_controller.php';
        $controller = new AuthController();
        $controller->logout();
        break;

    case '/dashboard':
        require_once __DIR__ . '/app/controllers/dashboard_controller.php';
        $controller = new DashboardController();
        $controller->index();
        break;

    case '/tasks':
        require_once __DIR__ . '/app/controllers/task_controller.php';
        $controller = new TaskController();
        if ($method === 'POST') {
            $controller->store();
        } else {
            $controller->index();
        }
        break;

    case '/tasks/create':
        require_once __DIR__ . '/app/controllers/task_controller.php';
        $controller = new TaskController();
        $controller->create();
        break;

    case '/tasks/complete':
        require_once __DIR__ . '/app/controllers/task_controller.php';
        $controller = new TaskController();
        $id = $_GET['id'] ?? null;
        if ($id) {
            $controller->complete($id);
        } else {
            header('Location: /tasks');
        }
        break;

    case '/tasks/delete':
        require_once __DIR__ . '/app/controllers/task_controller.php';
        $controller = new TaskController();
        $id = $_GET['id'] ?? null;
        if ($id) {
            $controller->delete($id);
        } else {
            header('Location: /tasks');
        }
        break;

    case '/schedule':
        require_once __DIR__ . '/app/controllers/schedule_controller.php';
        $controller = new ScheduleController();
        if ($method === 'POST') {
            $controller->store();
        } else {
            $controller->index();
        }
        break;

    case '/schedule/create':
        require_once __DIR__ . '/app/controllers/schedule_controller.php';
        $controller = new ScheduleController();
        $controller->create();
        break;

    case '/schedule/delete':
        require_once __DIR__ . '/app/controllers/schedule_controller.php';
        $controller = new ScheduleController();
        $id = $_GET['id'] ?? null;
        if ($id) {
            $controller->delete($id);
        } else {
            header('Location: /schedule');
        }
        break;

    case '/privacy':
        require_once __DIR__ . '/app/views/pages/privacy.php';
        break;

    default:
        http_response_code(404);
        echo "<h1 style='text-align:center; margin-top:50px; font-family:sans-serif;'>404 - Halaman Tidak Ditemukan</h1>";
        break;
}