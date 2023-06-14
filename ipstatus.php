<?php

define('DOCUMENT_ROOT', $_SERVER["DOCUMENT_ROOT"]);
function get_client_ip()
{
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if (isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if (isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if (isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

function is_black_listed()
{
    $ip = get_client_ip();
    $file = DOCUMENT_ROOT . "/security/blocked_ips.txt";
    $ips = file_get_contents($file);
    $ips = explode(',', $ips);
    return in_array($ip, $ips);
}

/* header */
if (is_black_listed()) {
    echo 1;
} else {
    echo 0;
}

?>
