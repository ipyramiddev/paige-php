<?php


require_once 'config.php';
if ($_POST['userid']) {
    $sql = "UPDATE user_information SET prompt_status=1, code='' WHERE id='" . $_POST['userid'] . "'";

    $result = mysqli_query($conn, $sql);
    echo 1;
}


?>