<?php
include("../../config.php");

if(isset($_POST['albumId'])) {
	$albumId = $_POST['albumId'];

	$albumQuery = mysqli_query($con, "DELETE FROM albums WHERE id='$albumId'");
	$podcastsQuery = mysqli_query($con, "DELETE FROM Podcasts WHERE albumId='$albumId'");
}
else {
	echo "albumId was not passed into deletealbums.php";
}


?>