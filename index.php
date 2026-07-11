<?php

session_start();
define('API_BASE_URL', 'https://schedulio-backend.up.railway.app/api');

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
        $controller->index();
        break;

    default:
        http_response_code(404);
        echo "<h1 style='text-align:center; margin-top:50px; font-family:sans-serif;'>404 - Halaman Tidak Ditemukan</h1>";
        break;
}