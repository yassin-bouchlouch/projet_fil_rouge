<?php
include("../../config.php");


	$updateQuery = mysqli_query($con, "UPDATE users SET profilePic = '$profilePic' WHERE username='$username'");
	echo "Update successful";




?>