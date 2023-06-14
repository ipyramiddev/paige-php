<?php

require_once 'config.php';

$action = $_POST["action"];

if($action == 'user_delete')
{
    $user_id = $_POST["userid"]; 
    
    $row='';
    $sql = "DELETE FROM user_information_4 where id='$user_id'";
        if ($result = mysqli_query($conn, $sql)) {
           $row = $conn->affected_rows;
        }
        
        
        if($row !=0)
        {
            echo 1;        
        }else{
            echo 1;
        }
}

