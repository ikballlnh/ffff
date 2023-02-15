<?php
function get($url, $headers, $put = null) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    if ($put) :
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    endif;
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    if ($headers) :
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    endif;
    curl_setopt($ch, CURLOPT_ENCODING, "GZIP");
    return curl_exec($ch);
}

function post($url, $data, $headers, $put = null) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    if ($put) :
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    endif;
    if ($data) :
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20);
        curl_setopt($ch, CURLOPT_TIMEOUT, 120);
    endif;
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    if ($headers) :
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    endif;
    curl_setopt($ch, CURLOPT_ENCODING, "GZIP");
    return curl_exec($ch);
}

function diliti($url, $data, $headers) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $response = curl_exec($ch);
    return $response;
}

function PACTHS($url, $data, $headers) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PATCH");
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $response = curl_exec($ch);
    return $response;
}

function regis() {
    $url = "https://api.internal.temp-mail.io/api/v3/email/ikbalange@coffeetimer24.com/messages";
    $headers = array();
    $headers[] = "Host: api.internal.temp-mail.io";
    $headers[] = "Cookie: _ga=GA1.2.145552877.1676454071; _gid=GA1.2.820485662.1676454071; _gat=1; __gads=ID=e63043c9098bfe92-2220fbc3ccd90028:T=1676454072:RT=1676454072:S=ALNI_MZaTv0iK43soMHbLSVUcZNspJFNGA; __gpi=UID=000009ae4188605f:T=1676454072:RT=1676454072:S=ALNI_MaMTznUygYQ3dKycvYXO6QjWQ6yDg";
    $headers[] = 'Accept: application/json, text/plain, */*';
    $headers[] = "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36";
    $headers[] = "Origin: https://temp-mail.io";
    $headers[] = "Referer: https://temp-mail.io/";
    $headers[] = "Accept-Encoding: gzip, deflate";
    $headers[] = 'Accept-Language: en-US,en;q=0.9';
    $getotp = get($url, $headers);
    $json = json_decode($getotp, true);
    var_dump($json[0]['id']);
}

function relet() {
    $url = "https://api.internal.temp-mail.io/api/v3/message/e1dbe42b-e294-454e-ae03-5ff617c4dccd";
    $data = '{"token":"2goCZbz4pxciXOS1U2dQ"}';
    $headers = array();
    $headers[] = "Host: api.internal.temp-mail.io";
    $headers[] = "Cookie: _ga=GA1.2.145552877.1676454071; _gid=GA1.2.820485662.1676454071; __gads=ID=e63043c9098bfe92-2220fbc3ccd90028:T=1676454072:RT=1676454072:S=ALNI_MZaTv0iK43soMHbLSVUcZNspJFNGA; __gpi=UID=000009ae4188605f:T=1676454072:RT=1676454072:S=ALNI_MaMTznUygYQ3dKycvYXO6QjWQ6yDg; _gat=1";
    $headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36';
    $headers[] = "Content-Type: application/json;charset=UTF-8";
    $headers[] = "Accept: application/json, text/plain, */*";
    $headers[] = "Origin: https://temp-mail.io";
    $headers[] = "Referer: https://temp-mail.io/";
    $headers[] = "Accept-Encoding: gzip, deflate";
    $headers[] = 'Accept-Language: en-US,en;q=0.9';
    $getotp = diliti($url, $data, $headers);
    $json = json_decode($getotp, true);
    var_dump($json);
}

function inputpin() {
    $url = "https://www.olx.co.id/api/auth/authenticate/login";
    $data = '{"grantType":"pin","code":"3333","email":"wwefewfwewwe@gmail.com","language":"id","metadata":{"deviceInfo":"eyJicm93c2VyIjoiQ2hyb21lIiwicGxhdGZvcm0iOiJXZWItZGVza3RvcDogV2luZG93cyAxMCIsImNpdHlOYW1lIjoiSmFrYXJ0YSBQdXNhdCIsInN0YXRlIjoiSmFrYXJ0YSBELksuSS4iLCJsb2NhdGlvbiI6eyJsYXQiOi02LjE5MzQ1NjIsImxvbmciOjEwNi44NTAyODc5fX0="}}';
    $headers = array();
    $headers[] = "Host: www.olx.co.id";
    $headers[] = "Authorization: Bearer eyJhbGciOiJSUzUxMiIsInR5cCI6IkpXVCIsImtpZCI6ImViT21QTmlrIn0.eyJncmFudF90eXBlIjoiZW1haWwiLCJjbGllbnRfdHlwZSI6IndlYiIsInNpdGVfY29kZSI6Im9seGlkIiwidG9rZW5fdHlwZSI6ImNvbmZpcm1hdGlvblRva2VuIiwiaXNfbmV3X3VzZXIiOnRydWUsImltYWdlX3VybCI6IiIsImxhbmd1YWdlIjoiaWQiLCJlbWFpbCI6Ind3ZWZld2Z3ZXd3ZUBnbWFpbC5jb20iLCJpYXQiOjE2NzY0NTU2MTgsImV4cCI6MTY3NjQ1NzQxOCwiYXVkIjoib2x4aWQiLCJpc3MiOiJvbHgiLCJzdWIiOiIiLCJqdGkiOiI1NzYxNGE5ZmY4ZWQ3MWMxZGFlMTZiMzRlOWQ5MDAyM2U4MzgxNGU1In0.enmNC39ceSLjHmXJrBnbADsekRkOS4hTYQfGx982rYz8Ng-gYhzKuCSPDtXWSNRcy4v1CkXu1Y4TxAVX7ofv3ybdXS3jXzgp7Qg1Ac1LTXgkbxsiuaSXoQQrj0dB9EiLGRC5_gxDGBqdbfS9wNyzc8tcft7drGozMp61ta81usreSNl6yltNcmS0pNnXxxQpM3LxGHvJkFl5HI36oFMNIOgvNusxqAlarmyLvG2L4i3uZlOaaVr-Nyg7X3mzMAHlklK2eVP57vJqz10jbVqSBo_oPJ5gf1dEzA87atrtip2-fjmtAUgLAe70MgPs1bTe-G2ScyUpKvU_xvtT9n377g";
    $headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36';
    $headers[] = "Content-Type: application/json";
    $headers[] = "Accept: */*";
    $headers[] = "Origin: https://www.olx.co.id";
    $headers[] = "Referer: https://www.olx.co.id/item/laptop-asus-a442u-i5-gen-8-ram-8gb-ssd-120gb-iid-886733379";
    $headers[] = "Accept-Encoding: gzip, deflate";
    $headers[] = 'Accept-Language: en-US,en;q=0.9';
    $getotp = post($url, $data, $headers);
    $json = json_decode($getotp, true);
    var_dump($json);
}

function pweyy() {
    $url = "https://www.olx.co.id/api/users/125381503";
    $data = '{"data":{"password":"viola331","passwordConfirmation":"viola331"}}';
    $headers = array();
    $headers[] = "Host: www.olx.co.id";
    $headers[] = "Authorization: Bearer eyJhbGciOiJSUzUxMiIsInR5cCI6IkpXVCIsImtpZCI6ImViT21QTmlrIn0.eyJncmFudFR5cGUiOiJwaW4iLCJjbGllbnRUeXBlIjoid2ViIiwidG9rZW5UeXBlIjoiYWNjZXNzVG9rZW4iLCJpc05ld1VzZXIiOmZhbHNlLCJpYXQiOjE2NzY0NTY5OTIsImV4cCI6MTY3NjQ1Nzg5MiwiYXVkIjoib2x4aWQiLCJpc3MiOiJvbHgiLCJzdWIiOiIxMjUzODE1MDMiLCJqdGkiOiI2OWFmZDRkMjI2NzM0ZDNjOWVmODUxNjhmMDRhMzU5OWRlODdiN2JiIn0.l6xlKQZrGNMP0v1UMfMT8AkVjOvEek3OwculrF6hv7r83Uicq9TPvBtmpMvSAKfoURML6m6Ck2l94jZFq_K5dfwT211dRsJ6xc9imgMqL-t2bbXr_YU07jZZzNNWQx2foHYYp4ZZPnH9Qqzm6iU7soJmLXw4KtTb9pBMZp4W6MXTF1rP2KcTE-oidhdgc133fsKpNmXQHefT2P9QgdEyT3qklZpkxApiEVfdFPtmLEIk_9XOkpQa66VSi---S7qHLIMiW82LyBqI5ESEnMJIK32_DLbP5mpJemqma7QgUdVsNyEivp6lsMnMijNde0XWTXse1QTdcPICkO7Q3FowDA";
    $headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36';
    $headers[] = "Content-Type: application/json";
    $headers[] = "Accept: */*";
    $headers[] = "Origin: https://www.olx.co.id";
    $headers[] = "Referer: https://www.olx.co.id/item/laptop-asus-a442u-i5-gen-8-ram-8gb-ssd-120gb-iid-886733379";
    $headers[] = "Accept-Encoding: gzip, deflate";
    $headers[] = 'Accept-Language: en-US,en;q=0.9';
    $getotp = PACTHS($url, $data, $headers);
    $json = json_decode($getotp, true);
    var_dump($json);
}

inputpin();
