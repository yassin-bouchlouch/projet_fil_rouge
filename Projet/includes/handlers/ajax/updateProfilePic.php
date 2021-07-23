<?php
include("../../config.php");


	 
	
if(!isset($_POST['username'])) {
	echo "ERROR: Could not set username";
	exit();
}

	if(isset($_FILES['profilePic']['error'])){

		$username = $_POST['username'];
	$profilePic = $_POST['profilePic'];
		if($_FILES['profilePic']['error'] == 0){
	 
			$target_dir = "../../../assets/images/profile-Pics/";
			
			$profilePic =time()."_".rand(100000,10000000).rand(100000,10000000)."_".$_FILES["profilePic"];

			$profilePic = str_replace(" ", "_", $profilePic);
			$profilePic = urlencode($profilePic);


			$source = $_FILES["profilePic"]["tmp_name"];
			$destination = $target_dir.$profilePic;
			
			 if(move_uploaded_file($source, $destination)){
					
			 }else{
				 $profilePic = "faild";
			 }
		}
	}

	$updateQuery = mysqli_query($con, "UPDATE users SET profilePic = '$profilePic' WHERE username='$username'");
	echo "Update successful";




?>