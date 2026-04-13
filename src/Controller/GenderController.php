<?php 
    require_once __DIR__ . '/../Services/GenderizeService.php';
    require_once __DIR__ . '/../Helper/Response.php';

    class GenderController
    {
        public function handle()
        {
            header("Content-Type: application/json");
            header("Access-Control-Allow-Origin: *");

            $name = $_GET['name'] ?? null;

            if(!$name) {
                Response::error("Name is Required", 400);
            }

            if (!is_string($name)) {
                Response::error("Name must be a string", 422);
            }

            $service = new GenderizeService();
            $data = $service->getGender($name);

            if(!$data) {
                Response::error("Unable to fetch data", 502);
            }

            //edge cases:
            if($data['gender'] === null || $data['count'] === 0){
                Response::error("No prediction available for the provided name", 422);
            }

            $gender = $data['gender'];
            $sample_size = $data['count'];
            $probability = $data['probability'];

            $is_confident = ($probability >= 0.7 && $sample_size >= 100);

            $processed_at = gmdate("c");

            Response::success([
                "name" => $name,
                "gender" => $gender,
                "probability" => $probability,
                "sample_size" => $sample_size,
                "is_confident" => $is_confident,
                "processed_at" => $processed_at
            ]);
        }
    }





?>