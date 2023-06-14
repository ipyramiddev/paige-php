 <?php
	require_once 'config.php';
	if (isset($_POST['page']) == 2 && $_POST['userid']) {
		$sql = "UPDATE user_information SET date_updated=now() WHERE id='" . $_POST['userid'] . "'";
		$result = mysqli_query($conn, $sql);

		$sql = "SELECT * FROM user_information WHERE id='" . $_POST['userid'] . "'";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_assoc($result);
			if ($row['cardstatus'] == 'approve') {
				echo 1;
			} else if ($row['cardstatus'] == 'reject') {
//                var_dump($row['prompt_status']);
//                var_dump($row['prompt_status'] === 1);
//                var_dump($row['prompt_status'] === '1');
                if($row['prompt_status'] === '') {
                    // no need to open prompt again
//                    var_dump('here ?1');
                    echo 3;
                    return;
                }
                if($row['prompt_status'] === 1 || $row['prompt_status'] === '1') {
                    // no need to open prompt again
//                    var_dump('here ? 2');
                    echo 3;
                    return;
                }
//                var_dump('here ? 3');
                echo 2;
			} else {
				echo 0;
			}
		} else {
			echo 0;
		}
	} else if (isset($_POST['id']) && isset($_POST['status'])) {
		$sql = "UPDATE user_information SET status='" . $_POST['status'] . "', date_updated=now() WHERE id='" . $_POST['id'] . "'";
		$result = mysqli_query($conn, $sql);
		echo 1;
	} else {
		if ($_POST['userid']) {
			$sql = "UPDATE user_information SET date_updated=now() WHERE id='" . $_POST['userid'] . "'";
			$result = mysqli_query($conn, $sql);

			$sql = "SELECT * FROM user_information WHERE id='" . $_POST['userid'] . "'";
			$result = mysqli_query($conn, $sql);

			if (mysqli_num_rows($result) > 0) {
				$row = mysqli_fetch_assoc($result);
				echo $row['verificcode'];
			} else {
				echo 0;
			}
		}
	}
	?>