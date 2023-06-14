<?php
require_once 'config.php';
if(isset($_POST['cardstatus'])){
	$sql = "UPDATE `user_information` SET cardstatus='approve' WHERE id='".$_POST['userid']."'";

   $result = mysqli_query($conn, $sql);
  echo 1;
}else{
	if($_POST['userid']){
	$sql = "UPDATE `user_information` SET verificcode='1' WHERE id='".$_POST['userid']."'";

   $result = mysqli_query($conn, $sql);
   echo 1;
	}
}
