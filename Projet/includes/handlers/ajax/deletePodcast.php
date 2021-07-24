<?php
include("../../config.php");

if(isset($_POST['albumSong'])) {
	$albumSong = $_POST['albumSong'];

	$albumQuery = mysqli_query($con, "DELETE FROM podcasts WHERE id='$albumSong'");
	$podcastsQuery = mysqli_query($con, "DELETE FROM Podcasts WHERE albumSong='$albumSong'");
}
else {
	echo "albumSong was not passed into deletealbums.php";
}


?>