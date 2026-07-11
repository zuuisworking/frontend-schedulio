<?php

class PageController {
    
    public function about() {
        require_once __DIR__ . '/../views/pages/about.php';
    }

    public function help() {
        require_once __DIR__ . '/../views/pages/help.php';
    }

    public function privacy() {
        require_once __DIR__ . '/../views/pages/privacy.php';
    }
}