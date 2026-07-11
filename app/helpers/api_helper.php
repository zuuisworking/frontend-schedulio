<?php

class ApiHelper {

    public static function request($method, $endpoint, $data = null) {
        $url = API_BASE_URL . $endpoint;
        $ch = curl_init($url);
        $headers = ['Content-Type: application/json'];

        if (isset($_SESSION['token'])) {
            $headers[] = 'Authorization: Bearer ' . $_SESSION['token'];
        }

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        
        if ($data !== null) {
            $payload = json_encode($data);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
            $headers[] = 'Content-Length: ' . strlen($payload);
        }
        
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        
        $result = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        $response = json_decode($result, true);
        
        if (!is_array($response)) {
            $response = [];
        }
        
        $response['http_status'] = $httpcode; 
        
        return $response;
    }

    public static function get($endpoint) {
        return self::request('GET', $endpoint);
    }

    public static function post($endpoint, $data) {
        return self::request('POST', $endpoint, $data);
    }
    
    public static function put($endpoint, $data) {
        return self::request('PUT', $endpoint, $data);
    }

    public static function delete($endpoint) {
        return self::request('DELETE', $endpoint);
    }
}