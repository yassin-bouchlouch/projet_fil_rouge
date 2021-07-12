<?php
include("../../config.php");



if(isset($_POST['songId'])) {
	$songId = $_POST['songId'];


	$updateQuery = mysqli_query($con, "UPDATE users SET email = '$email' WHERE username='$username'");
	echo "Update successful";




?>