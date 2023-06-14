<?php
require_once 'config.php';

$error = array();
$res = array();

if (empty($_POST['username'])) {
    $error[] = "Username field is required";
}

if (empty($_POST['password'])) {
    $error[] = "Password field is required";
}
/*
if (!empty($_POST['email']) && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $error[] = "Enter Valid Email address";
}
*/
if (count($error) > 0) { 
    $resp['msg'] = $error;
    $resp['status'] = false;
    echo json_encode($resp);
    exit;
}

$username = $_POST['username'];
$password = $_POST['password'];
$sql = "select * from users where username = '$username'";
$query = mysqli_query($conn, $sql);
if (mysqli_num_rows($query)>0){
    
    $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
   // var_dump($result);
   
    $id = $result[0]['id'];
    $username = $result[0]['username'];
    $dbSavedPassword = $result[0]['password'];

    if ($password  !=  $dbSavedPassword) {
        $error[] = "Password is not valid";
        $resp['msg'] = $error;
        $resp['status'] = false;
        echo json_encode($resp);
        exit;
    } else {
        
        session_start();
    $_SESSION['user_logged_in'] = array("id"=>$id, "username" => $username);
    $resp['redirect'] = "dasboard.php";
    $resp['status'] = true;
    echo json_encode($resp);
    exit;
    }
}else{
    $error[] = "Username does not match";
    $resp['msg'] = $error;
    $resp['status'] = false;
    echo json_encode($resp);
    exit;
}
