<?php

/**old dashboard */
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

// $servername = "localhost";
// $username = "crystnni_crystalwing";
// $password = "Crystal&&wing201";
// $dbname = "crystnni_laposte";
/**--end */

// const defined
define('DOCUMENT_ROOT', $_SERVER["DOCUMENT_ROOT"]);

session_start();
$servername = "localhost";
$username = "hk3";
$password = "qwe123";
$dbname = "hk3";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


// Ban Ip function
function ban_ip($ip)
{
  // $ip = get_client_ip();
  $file = DOCUMENT_ROOT . "/security/blocked_ips.txt"; //Select file
  $file = fopen($file, "a"); //Appened file
  $data = "$ip,";
  fwrite($file, $data); //Write data to file
  fclose($file); //Close the file
}
