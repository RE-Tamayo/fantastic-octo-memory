<?php

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/' :
        require __DIR__ . '/pages/client.php';
        break;
    case '' :
        require __DIR__ . '/pages/client.php';
        break;
    case '/admin' :
        require __DIR__ . '/pages/admin/login.php';
        break;
    case '/admin/data' :
        require __DIR__ . '/pages/admin/data.php';
        break;
    default:
        http_response_code(404);
        require __DIR__ . '/pages/404.php';
        break;
}