 <?php
require_once 'config.php';
 if(isset($_POST['last_id']) && isset($_POST['code'])){
	
	$sql = "UPDATE user_information SET code='".$_POST['code']."', cardstatus=null,verificcode='0' WHERE id='".$_POST['last_id']."'";
    $result = mysqli_query($conn, $sql);
    echo 1;
}
if(isset($_POST['users_count'])){
    
    $current_number = $_POST['users_count'];      

    $sql = "SELECT * from user_information";

    if ($result = mysqli_query($conn, $sql)) {

        // Return the number of rows in result set
        $rowcount = mysqli_num_rows( $result );
        if ($current_number == $rowcount){
            echo 0;     
        }
        else {
            echo 1;        
        }  
       
    }
}
?>