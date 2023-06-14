<?php
require_once 'config.php';

if ($_POST['userid']) {
    $sql = "SELECT ipaddress, banstatus FROM user_information WHERE id=" . $_POST['userid'];
    if ($result = mysqli_query($conn, $sql)) {
        while ($row = mysqli_fetch_array($result)) {
            if (!$row['banstatus']) {
                if ($row['ipaddress']) {
                    ban_ip($row['ipaddress']);
                    $sql = "UPDATE `user_information` SET banstatus=1 WHERE id='" . $_POST['userid'] . "'";
                    $result = mysqli_query($conn, $sql);
                    echo 1;
                }
            }
        }
    }
}
