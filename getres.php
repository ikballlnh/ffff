<?php
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

function save($filename, $email)
{
    $save = fopen($filename, "a");
    fputs($save, "$email");
    fclose($save);
}

function cek()
{
    $url = "https://gs15.pragmaticplaylive.net/api/ui/statisticHistory?tableId=spacemanyxeabn02&numberOfGames=500&JSESSIONID=r7jlfHsqz2HYJLl8XSHAj_xEOES8fLAyHfOa8I1_Ab6XGlZdnhl8!-1217578290&ck=1678453708044&game_mode=lobby_desktop";
    $headers = array();
    $getotp = request1($url, $headers);
    $json = json_decode($getotp, true);

    for ($x = 0; $x < 500; $x++) {
        $gameRes = $json['history'][$x]['gameResult'];
        $gameId = $json['history'][$x]['gameId'];
        $result = "$gameId|$gameRes\n";
        save("HASIL.txt", $result);

      }
}

while (1){ //infinite loop
    echo("GASS\n");
    cek();
    print("SLeEP DLU 5000 S\n");
    sleep(5000);    
}


