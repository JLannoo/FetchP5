<?php
    function fetchP5(){
        $curl = curl_init("https://editor.p5js.org/editor/julianlannoo/projects");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        return $response;
    }
?>