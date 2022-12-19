<?php
    function makeToken($appId, $token, $param=array()){
        ksort($param);
        $paramArr = [];
        $paramArr[] = $appId;
        $paramArr[] = $token;
        foreach($param as $x=>$x_value){
            $paramArr[] = $x . "=" . (string)$x_value;
        }

        if (count($param) == 0){
            $paramArr[] = "";
        }

        return md5(implode("&", $paramArr));
    }

    function httpPostJson($url, $jsonStr, $app, $secret)
    {
        $jsonStr = $jsonStr == "[]"? "": $jsonStr;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonStr);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json; charset=utf-8',
                'Content-Length: ' . strlen($jsonStr),
                'App: '. $app,
                'Access-Token: '. $secret
            )
        );
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        return $response;
    }
