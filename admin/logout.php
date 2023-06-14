<?php
unset($_SESSION["loggedin"]);
$_SESSION['loggedin'] = "";
session_start();
session_destroy();
header("location: /admin/login.php");
