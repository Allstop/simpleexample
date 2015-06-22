<?php

class Model{
    public function curlUrl($url, $method, $headerData, $parameterData)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        if ($headerData) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, http_build_query($headerData));
        }
        curl_setopt($ch, CURLOPT_HEADER, false);
        if ($method === 'get') {
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        }
        if ($method === 'put') {
            if ($parameterData) {
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
                curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameterData));
            }
        }
        if ($method === 'post') {
            if ($parameterData) {
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameterData));
            }
        }
        if ($method === 'delete') {
            if ($parameterData) {
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
                curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameterData));
            }
        }
        $temp = preg_replace('/\s/', '', curl_exec($ch));
        $temp = mb_convert_encoding($temp, 'utf-8', 'GBK,UTF-8,ASCII');
        return $temp;
        $ch = curl_init();
    }
}
?>
