<?php 
    class GenderizeService
    {
        public function getGender($name)
        {
            $url = "https://api.genderize.io?name=" . urlencode($name);

            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $response = curl_exec($ch);
            $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

            curl_close($ch);

            if ($response === false || $status !== 200) {
                return null;
            }

            return json_decode($response, true);
        }
    }





?>