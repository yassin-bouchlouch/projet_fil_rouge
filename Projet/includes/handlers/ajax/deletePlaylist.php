<?php
include("../../config.php");

if(isset($_POST['playlistId'])) {
	$playlistId = $_POST['playlistId'];

	$playlistQuery = mysqli_query($con, "DELETE FROM playlists WHERE id='$playlistId'");
	$podcastsQuery = mysqli_query($con, "DELETE FROM playlistPodcasts WHERE playlistId='$playlistId'");
}
else {
	echo "PlaylistId was not passed into deletePlaylist.php";
}


?>