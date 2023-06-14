<?php

session_start();
$price = $_POST['total_quantity'];
if($price) {
    $_SESSION['total_quantity'] = array("quantity" => $price);
    return true;
}
