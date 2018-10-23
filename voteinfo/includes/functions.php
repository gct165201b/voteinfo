<?php 



include 'Database.php';



function addData($candidate1, $symbol1, $symbol1_tmp, $votes1, $candidate2, $votes2, $symbol2, $symbol2_tmp) {
	# Uploading files

	move_uploaded_file($symbol1_tmp, "./uploads/".$symbol1);
	move_uploaded_file($symbol2_tmp, "./uploads/".$symbol2);




	// Storing it inside database.

	$database = new Database();

	$conn = $database->connect();

	if(!$conn) {
		die("CONNECTION ERROR: ".mysqli_error($conn));
	} else {


		$query = "INSERT INTO candidates (candidate_name, candidate_votes, candidate_part_sym) VALUES";
		$query .= " ('{$candidate1}',{$votes1},'{$symbol1}'),";
		$query .= " ('{$candidate2}',{$votes2},'{$symbol2}')";


		$insert_candidate_result = mysqli_query($conn , $query);

		if(!$insert_candidate_result) {
			header("Location: index.php?query=failed");
		} else {
			header("Location: index.php?query=success");
		}


	}
}









function getAndValidate() {
		if(isset($_POST['submit'])) {
			$candidate1 = $_POST['candidate1'];
			$votes1 = $_POST['votes1'];
			
			$symbol1 = $_FILES['symbol1']['name']; # image
			$symbol1_tmp = $_FILES['symbol1']['tmp_name'];


			$candidate2 = $_POST['candidate2'];
			$votes2 = $_POST['votes2'];


			$symbol2 = $_FILES['symbol2']['name']; # image
			$symbol2_tmp = $_FILES['symbol2']['tmp_name'];





			if(empty($candidate1) || empty($candidate2) || empty($votes1) || empty($votes2) || empty($symbol2) || empty($symbol1)) {
				header("Location: index.php?field=empty");
			} else {
				addData($candidate1, $symbol1, $symbol1_tmp, $votes1, $candidate2, $votes2, $symbol2, $symbol2_tmp);
			}

		
	}
}