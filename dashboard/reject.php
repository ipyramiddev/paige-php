<?php
require_once 'config.php';
if(isset($_POST['cardstatus'])){

	$sql = "UPDATE user_information SET cardstatus='reject' , prompt_status=2 WHERE id='".$_POST['userid']."'";

   $result = mysqli_query($conn, $sql);
  echo 1;
}else{

	if($_POST['userid']){
	$sql = "UPDATE user_information SET verificcode='2', code='' WHERE id='".$_POST['userid']."'";

   $result = mysqli_query($conn, $sql);
    echo 1;
	}
}
?>