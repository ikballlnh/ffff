<?php
error_reporting(0);
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

function save($filename, $email) {
    $save = fopen($filename, "a");
    fputs($save, "$email");
    fclose($save);
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

function sendOtp($email) {
    $url = "https://api.olx.co.id/v2/auth/authenticate";
    $data = '{"email":"' . $email . '","grantType":"email","language":"en","stop_otp_on_email":false}';
    $headers = array();
    $headers[] = "Host: api.olx.co.id";
    $headers[] = "User-Agent: android 16.11.001 olxid";
    $headers[] = 'x-origin-panamera: Production';
    $headers[] = "Content-Type: application/json";
    $headers[] = "Connection: Keep-Alive";
    $headers[] = "Accept-Encoding: gzip";
    $getotp = post($url, $data, $headers);
    $json = json_decode($getotp, true);
    $cheker = $json['status'];
    if ($cheker == "PENDING") {
        $token = $json['token'];
        return [True, $token];
    } else {
        return [False, "0"];
    }
}

function getOtp() {
    $url = "https://api.internal.temp-mail.io/api/v3/email/de6mjhxzyg@waterisgone.com/messages";
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
    $idEmail = $json[0]['id'];
    if ($idEmail != null) {
        $isiemail = $json[0]['body_text'];
        $regex = "/\d\d\d\d/";
        preg_match($regex, $isiemail, $hasil);
        return [True, $hasil[0], $idEmail];
    } else {
        return [False, "0"];
    }
}

function inputpin($email, $pin, $token) {
    $url = "https://api.olx.co.id/v2/auth/authenticate";
    $data = '{"code":"' . $pin . '","email":"' . $email . '","grantType":"pin","metadata":{"deviceInfo":"' . $token . '"}}';
    $headers = array();
    $headers[] = "Host: api.olx.co.id";
    $headers[] = "Authorization: Bearer $token";
    $headers[] = 'User-Agent: android 17.00.002 olxid';
    $headers[] = "Content-Type: application/json";
    $headers[] = "Connection: Keep-Alive";
    $headers[] = "Accept-Encoding: gzip";
    $getotp = post($url, $data, $headers);
    $json = json_decode($getotp, true);
    $aksestoken = $json['accessToken'];
    if ($aksestoken != null) {
        $iduser = $json['user']['id'];
        return [True, $aksestoken, $iduser];
    } else {
        return [False, "0", $getotp];
    }
}

function settPass($idUser, $aksestoken) {
    $url = "https://api.olx.co.id/api/v1/users/$idUser";
    $data = '{"data":{"password":"viola331","passwordConfirmation":"viola331"}}';
    $headers = array();
    $headers[] = "Host: api.olx.co.id";
    $headers[] = "Authorization: Bearer $aksestoken";
    $headers[] = 'User-Agent: android 17.00.002 olxid';
    $headers[] = "Content-Type: application/json";
    $headers[] = "Connection: Keep-Alive";
    $headers[] = "Accept-Encoding: gzip";
    $getotp = PACTHS($url, $data, $headers);
    $json = json_decode($getotp, true);
    $cheker = $json['data']['status'];
    if ($cheker == "confirmed") {
        return [True, $json];
    } else {
        return [False, $json];
    }
}

function deleteIsiEmail($idEmail) {
    $url = "https://api.internal.temp-mail.io/api/v3/message/$idEmail";
    $data = '{"token":"FfAmqSWwNmjPuyhg3me9"}';
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
    $cheker = $json['message'];
    if ($cheker != 'tempmail: message not found') {
        return True;
    } else {
        return False;
    }
}

$ulangotp = 0;
$indexulang = 0;

$data = file_get_contents("ex.txt");
$list = explode("\n", str_replace("\r", "", $data));
$count = count($list);

ulang:
if ($indexulang < $count) {
    # code...
    $emailni = $list[$indexulang];
    $sendOtp = sendOtp($emailni);
    if ($sendOtp[0] == True) {
        $token = $sendOtp[1];
        //echo ("$emailni \n");
        //echo ("$token \n");
        //echo ("Menunggu otp masuk");
        ulangotp:
        if ($ulangotp <= 5) {
            $getOtp = getOtp();
            if ($getOtp[0] == True) {
                $pin = $getOtp[1];
                $idEmail = $getOtp[2];
                //echo ("$pin \n");
                $inputpin = inputpin($emailni, $pin, $token);
                if ($inputpin[0] == True) {
                    $aksestoken = $inputpin[1];
                    $idUser = $inputpin[2];
                    // echo ($aksestoken);
                    //echo ($idUser);
                    $settPass = settPass($idUser, $aksestoken);
                    if ($settPass == True) {
                        //  echo ("Berhasil ganti pw");
                        $deleteIsiEmail = deleteIsiEmail($idEmail);
                        if ($deleteIsiEmail = True) {
                            $result = ("$emailni|viola331|$idUser \n");
                            save("Hasil.txt", $result);
                            echo ("$indexulang. $result");
                            $ulangotp = 0;
                            $indexulang = $indexulang + 1;
                            goto ulang;
                        } else {
                            echo ("Gagal delete isi email");
                            $indexulang = $indexulang + 1;
                            goto ulang;
                        }
                    } else {
                        var_dump($settPass[1]);
                        echo ("Tidak berhasil ganti ppw");
                        $indexulang = $indexulang + 1;
                        deleteIsiEmail($idEmail);
                        goto ulang;
                    }
                } else {
                    echo ("gagal input pin");
                    echo ($inputpin[2]);
                    $indexulang = $indexulang + 1;
                    deleteIsiEmail($idEmail);
                    goto ulang;
                }
            } else {
                sleep(1);
                //echo ("Tidak berhasil dpt otp");
                $ulangotp = $ulangotp + 1;
                goto ulangotp;
            }
        } else {
            echo ("Gagal bikin akun karena otp slaah terus");
            $ulangotp = 0;
            $indexulang = $indexulang + 1;
            deleteIsiEmail($idEmail);
            goto ulang;
        }
    } else {
        echo ("Gagal mengirim otp");
        $indexulang = $indexulang + 1;
        deleteIsiEmail($idEmail);
        goto ulang;
    }
} else {
    echo ("Selesai");
    deleteIsiEmail($idEmail);
}
