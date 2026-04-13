<?php 

    $request = $_SERVER['REQUEST_URI'];

    if (strpos($request, '/api/classify') !== false) {
        require_once __DIR__ . '/../src/Controller/GenderController.php';
        $controller = new GenderController();
        $controller->handle();
        exit;
    }

// fallback
    echo json_encode([
        "status" => "error",
        "message" => "Route not found"
    ]);

    
?>