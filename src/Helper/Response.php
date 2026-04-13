<?php 
    class Response
    {
        public static function success($data)
        {
            http_response_code(200);
            echo json_encode([
                "status" => "success",
                "data" => $data
            ]);
            exit;
        }

        public static function error($message, $code)
        {
            http_response_code($code);
            echo json_encode([
                "status" => "error",
                "message" => $message
            ]);
            exit;
        }
    }


?>