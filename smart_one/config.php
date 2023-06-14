<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// const defined
define('DOCUMENT_ROOT', $_SERVER["DOCUMENT_ROOT"]);

$servername = "localhost";
$username = "root";
$password = "Password123@123";
$dbname = "hk3";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


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

function ban_ip($ip)
{
  // $ip = get_client_ip();
  $file = DOCUMENT_ROOT . "/security/blocked_ips.txt"; //Select file
  $file = fopen($file, "a"); //Appened file
  $data = "$ip,";
  fwrite($file, $data); //Write data to file
  fclose($file); //Close the file
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
  header("Location: " . 'https://eshop.hk.chinamobile.com/tc/index.html');
  $_SESSION['ipstatus'] = 1;
  die;
}
