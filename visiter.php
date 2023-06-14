<?php

if(isset($_POST['visit'])) {

    require_once 'config.php';

    $ipaddress = $_SERVER['REMOTE_ADDR'];
    $datetime = date('Y-m-d h:i:s');
    $useragent = $_SERVER['HTTP_USER_AGENT'];
    $os = systemInfo($useragent);
    $browser = browser($useragent);
    $date = date('Y-m-d');

    $sql = " SELECT * FROM `visitor` WHERE ip_address = '$ipaddress' AND DATE(date_created) = '$date' ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if(empty($row)) {
        $insert = "INSERT INTO visitor (ip_address, city, country, browser, platform) VALUES ('$ipaddress', '', '', '$browser', '$os')";

        $res = mysqli_query($conn, $insert);
        echo json_encode(array('success'=>$res));
    }

}else {

    $count_page = ("hitcount.txt");
    $hits = file($count_page);
    $hits[0]++;

    $fp = fopen($count_page, "r");
    fread($fp, "$hits[0]");
    fclose($fp);
    echo $hits[0];
}

function systemInfo($user_agent)
{
    $os_platform    = "windows";
    $os_array       = array('/windows phone 8/i'    =>  'windows',
        '/windows phone os 7/i' =>  'windows',
        '/windows nt 6.3/i'     =>  'windows',
        '/windows nt 6.2/i'     =>  'windows',
        '/windows nt 6.1/i'     =>  'windows',
        '/windows nt 6.0/i'     =>  'windows',
        '/windows nt 5.2/i'     =>  'windows',
        '/windows nt 5.1/i'     =>  'windows',
        '/windows xp/i'         =>  'windows',
        '/windows nt 5.0/i'     =>  'windows',
        '/windows me/i'         =>  'windows',
        '/win98/i'              =>  'windows',
        '/win95/i'              =>  'windows',
        '/win16/i'              =>  'windows',
        '/macintosh|mac os x/i' =>  'mac',
        '/mac_powerpc/i'        =>  'mac',
        '/linux/i'              =>  'linux',
        '/ubuntu/i'             =>  'ubuntu',
        '/iphone/i'             =>  'iPhone',
        '/ipod/i'               =>  'iPod',
        '/ipad/i'               =>  'iPad',
        '/android/i'            =>  'Android',
        '/blackberry/i'         =>  'BlackBerry',
        '/webos/i'              =>  'Mobile');

    foreach ($os_array as $regex => $value)
    {
        if (preg_match($regex, $user_agent,$os_array))
        {
            $os_platform    =   $value;
        }
    }
    return $os_platform;
}

function browser($user_agent)
{

    $browser        =   "Unknown Browser";

    $browser_array  = array('/msie/i'       =>  'Internet Explorer',
        '/firefox/i'    =>  'Mozilla Firefox',
        '/safari/i'     =>  'Apple Safari',
        '/chrome/i'     =>  'Google Chrome',
        '/opera/i'      =>  'Opera',
        '/netscape/i'   =>  'Netscape',
        '/maxthon/i'    =>  'Maxthon',
        '/konqueror/i'  =>  'Konqueror',
        '/mobile/i'     =>  'Handheld Browser');

    foreach ($browser_array as $regex => $value)
    {
        if (preg_match($regex, $user_agent,$browser_array))
        {
            $browser    =   $value;
        }
    }
    return $browser;
}

?>