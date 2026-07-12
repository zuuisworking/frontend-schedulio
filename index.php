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

    case '/activities':
        require_once __DIR__ . '/app/controllers/activity_controller.php';
        $controller = new ActivityController();
        if ($method === 'POST') {
            $controller->store();
        } else {
            $controller->index();
        }
        break;

    case '/activities/create':
        require_once __DIR__ . '/app/controllers/activity_controller.php';
        $controller = new ActivityController();
        $controller->create();
        break;

	
    case '/activities/delete':
        require_once __DIR__ . '/app/controllers/activity_controller.php';
        $controller = new ActivityController();
        $id = $_GET['id'] ?? null;
        if ($id) {
            $controller->delete($id);
        } else {
            header('Location: /activities');
        }
        break;

    case '/courses':
        require_once __DIR__ . '/app/controllers/course_controller.php';
        $controller = new CourseController();
        if ($method === 'POST') {
            $controller->store();
        } else {
            $controller->index();
        }
        break;

    case '/courses/create':
        require_once __DIR__ . '/app/controllers/course_controller.php';
        $controller = new CourseController();
        $controller->create();
        break;

	
    case '/courses/delete':
        require_once __DIR__ . '/app/controllers/course_controller.php';
        $controller = new CourseController();
        $id = $_GET['id'] ?? null;
        if ($id) {
            $controller->delete($id);
        } else {
            header('Location: /courses');
        }
        break;

    case '/schedulio':
        require_once __DIR__ . '/app/controllers/schedulio_controller.php';
        $controller = new SchedulioController();
        $controller->index();
        break;
    
    case '/about':
        require_once __DIR__ . '/app/controllers/page_controller.php';
        $controller = new PageController();
        $controller->about();
        break;

    case '/help':
        require_once __DIR__ . '/app/controllers/page_controller.php';
        $controller = new PageController();
        $controller->help();
        break;

    case '/privacy':
        require_once __DIR__ . '/app/controllers/page_controller.php';
        $controller = new PageController();
        $controller->privacy();
        break;

    default:
        http_response_code(404);
        echo "<h1 style='text-align:center; margin-top:50px; font-family:sans-serif;'>404 - Halaman Tidak Ditemukan</h1>";
        break;
}