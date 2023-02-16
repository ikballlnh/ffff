<?php

$url = "https://api.olx.co.id/v2/auth/authenticate";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_ENCODING, "GZIP");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
    "Authorization: Bearer eyJhbGciOiJSUzUxMiIsInR5cCI6IkpXVCIsImtpZCI6ImViT21QTmlrIn0.eyJncmFudF90eXBlIjoiZW1haWwiLCJjbGllbnRfdHlwZSI6ImFuZHJvaWQiLCJzaXRlX2NvZGUiOiJvbHhpZCIsInRva2VuX3R5cGUiOiJjb25maXJtYXRpb25Ub2tlbiIsImlzX25ld191c2VyIjpmYWxzZSwiaW1hZ2VfdXJsIjoiIiwibGFuZ3VhZ2UiOiJlbiIsImVtYWlsIjoibi51cm0uYXUuYmVsLmkuYi5hLnJhLm4uZ2JrLmEuc0BnbWFpbC5jb20iLCJpYXQiOjE2NzY1MTg0NDIsImV4cCI6MTY3NjUyMDI0MiwiYXVkIjoib2x4aWQiLCJpc3MiOiJvbHgiLCJzdWIiOiIiLCJqdGkiOiJjZGUzM2JmYTAzYWNmNzg4NzkwMDNhODEzOWJhOWVjNDE2NDc2ZTFjIn0.HGGi-CKJxDtUsjyGfM4FiXptVcbyN7eJjVipQz1eYmEUONIQYsO_bELnm0Bb8tC6ej5e16AGQONMrz9sVCyxcixtKBd41LrdatNH2zvBDMBK7ciZ6HFQLbVQqmsOWcq6_JtfzXdsZ_0ieqj86LX1FWUjsWlmh3OTZNGPmlvE1QDO1ZrFIlcRkagTHXdTFMsihzWTm4DbXjMiV4eIZ8PNUr_gq7z609Pfk4R8JrelS-03Bp3An6AANW79NU0EfjqolFhCx-Aqiihh4fk4gg1NrtPUcxjYNx5V95B7KdvRVJc4lV9MxQ3dYN8mWxAIZSnb0gRIiG1T6QJsgjtWKjC4_g",
    "User-Agent: android 17.00.002 olxid",
    "Content-Type: application/json",
    "Content-Length: 242",
    "Host: api.olx.co.id",
    "Connection: Keep-Alive",
    "Accept-Encoding: gzip",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = '{"code":"2222","email":"wfssssssssw@gmail.com","grantType":"pin","metadata":{"deviceInfo":"eyJsb2NhdGlvbiI6eyJsYXQiOjMxLjI0OTE2LCJsb25nIjoxMjEuNDg3ODk4M30sIm1ha2UiOiJBc3VzIiwibW9kZWwiOiJBU1VTX1owMVFEIiwicGxhdGZvcm0iOiJBbmRyb2lkIDcuMS4yIn0="}}';

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
var_dump($resp);
