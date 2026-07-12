<?php

require_once __DIR__ . '/../helpers/api_helper.php';

class SchedulioController {
    
    public function index() {
        if (!isset($_SESSION['token'])) {
            header('Location: /login');
            exit();
        }

        // First, trigger the calculation to make sure results are fresh
        ApiHelper::post('/schedulio/calculate', []);

        $response = ApiHelper::get('/schedulio/recommendations');
        $recommendations = $response['http_status'] === 200 ? ($response['data'] ?? []) : [];
        
        require_once __DIR__ . '/../views/schedulio/index.php';
    }
}
