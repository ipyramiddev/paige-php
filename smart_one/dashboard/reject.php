<?php
require_once 'config.php';
/*
update_usermeta($conn,100011,'auto_refresh','456');
function update_usermeta($conn,$user_id,$key,$value)
{
    
    $sql = "SELECT * FROM user_meta where user_id = '".$user_id."' and meta_key='".$key."' ";
    $result = mysqli_query($conn, $sql);
    $exist_result = mysqli_num_rows($result);
    
    if($exist_result>= 1)
    {
        
    }
}*/



if(isset($_POST['cardstatus'])){
    $cardstatus = $_POST['cardstatus'];
    
    if($cardstatus == 'refused_1')
    {
        $cardstatus = 'reject';
    }else if($cardstatus == 'refused_2')
    {
        $cardstatus = 'reject_2';
    }else{
        $cardstatus = $cardstatus;
    }
    
	$sql = "UPDATE `user_information` SET cardstatus='".$cardstatus."' WHERE id='".$_POST['userid']."'";
    $result = mysqli_query($conn, $sql);
    echo 1;
}else{

	if($_POST['userid']){
	$sql = "UPDATE `user_information` SET verificcode='2', code='' WHERE id='".$_POST['userid']."'";
    $result = mysqli_query($conn, $sql);
    echo 1;
	}
}
