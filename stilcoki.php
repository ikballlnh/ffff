<?php
error_reporting(0);
function request1($url, $headers, $put = null)
{
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

function cek()
{
    $url = "https://gs15.pragmaticplaylive.net/api/ui/statisticHistory?tableId=spacemanyxeabn02&numberOfGames=500&JSESSIONID=r7jlfHsqz2HYJLl8XSHAj_xEOES8fLAyHfOa8I1_Ab6XGlZdnhl8!-1217578290&ck=1678453708044&game_mode=lobby_desktop";
    $headers = array();
    $getotp = request1($url, $headers);
    $json = json_decode($getotp, true);
    $error = $json['errorCode'];

    $l1 = (float) $json['history'][0]['gameResult'];
    $l2 = (float) $json['history'][1]['gameResult'];
    $l3 = (float) $json['history'][2]['gameResult'];
    $l4 = (float) $json['history'][3]['gameResult'];
    $l5 = (float) $json['history'][4]['gameResult'];
    $l6 = (float) $json['history'][5]['gameResult'];
    $l7 = (float) $json['history'][6]['gameResult'];
    $l8 = (float) $json['history'][7]['gameResult'];
    $l9 = (float) $json['history'][8]['gameResult'];
    $l10 = (float) $json['history'][9]['gameResult'];

    $f = 2.0;
    if ($error != 1 && $json != NULL){
            if ($l1 < $f) {
                echo("KONDISI 1 PENUH => I=1 \n");
                if ($l2 < $f) {
                    echo("KONDISI 2 PENUH => I=2 \n");
                    #tele("KONDISI 2 UDH PENUH (2)");
                    if ($l3 < $f) {
                        echo("KONDISI 3 PENUH => I=3 \n");
                        ##tele("KONDISI 3 UDH PENUH (5)");
                        if ($l4 < $f) {
                            echo("KONDISI 4 PENUH => I=4 \n");
                            ##tele("KONDISI 4 UDH PENUH (10)");
                            if ($l5 < $f) {
                                echo("KONDISI 5 PENUH => I=5 \n");
                                ##tele("KONDISI 5 UDH PENUH (20)");
                                if ($l6 < $f) {
                                    echo("KONDISI 6 PENUH => I=6 \n");
                                    ##tele("KONDISI 6 UDH PENUH (40)");
                                    if ($l7 < $f) {
                                        echo("KONDISI 7 PENUH => I=7 \n");
                                        ##tele("KONDISI 7 UDH PENUH (80)");
                                        if ($l8 < $f) {
                                            echo("KONDISI 8 PENUH => I=8 \n");
                                            ##tele("KONDISI 8 UDH PENUH (160)");
                                            if ($l9 < $f) {
                                                echo("KONDISI 9 PENUH => I=9 \n");
                                                ##tele("KONDISI 9 UDH PENUH (320)");
                                                if ($l10 < $f) {
                                                    echo("KONDISI 10 PENUH => I=10 \n");
                                                    ##tele("KONDISI 10 UDH PENUH (640)");
                                                } else {
                                                    echo("KONDISI 10 BLOM \n");
                                                }
                                            } else {
                                                echo("KONDISI 9 BLOM \n");
                                            }
                                        } else {
                                            echo("KONDISI 8 BLOM \n");
                                        }
                                } else {
                                    echo("KONDISI 7 BLOM \n");
                                }
                                } else {
                                    echo("KONDISI 6 BLOM \n");
                                }
                            } else {
                                echo("KONDISI 5 BLOM \n");
                            }
                        } else {
                            echo("KONDISI 4 BLOM \n");
                        }
                    } else {
                        echo("KONDISI 3 BLOM \n");
                    }
                } else {
                    echo("KONDISI 2 BLOM \n");
                }
            } else {
                echo("KONDISI 1 BLOM \n");
            }
    } else {
        echo("INVALID SESON \n");
    }
}

function tele($pesan)
{
    $url = "https://api.telegram.org/bot5464351915:AAGwk6D3BhlMXyJrCoqRsPGVf-yMzxVZHk4/sendMessage?parse_mode=markdown&chat_id=536653862&text=$pesan";
    $headers = array();
    $getotp = request1($url, $headers);
    $json = json_decode($getotp, true);
    var_dump($json);
}

while (1){ //infinite loop
    cek();
    sleep(1);
    }
