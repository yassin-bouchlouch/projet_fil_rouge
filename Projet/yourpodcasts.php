<?php
include("includes/includedFiles.php");
?>

<div class="playlistsContainer">

	<div class="gridViewContainer">
		<h2>Your Podcasts</h2>

		<div class="buttonItems">
			<button class="button" onclick="createNewAlbum()">NEW ALBUM</button>
		</div>



		<?php
			$username = $userLoggedIn->getUsername();

			$yourPodcastsQuery = mysqli_query($con, "SELECT * FROM yourPodcasts WHERE owner='$username'");

			if(mysqli_num_rows($yourPodcastsQuery) == 0) {
				echo "<span class='noResults'>it seems like You don't have any Podcasts yet.</span>";
			}

			while($row = mysqli_fetch_array($yourPodcastsQuery)) {

				$UploadedPodcasts = new UploadedPodcasts($con, $row);

				echo "<div class='gridViewItem' role='link' tabindex='0' 
							onclick='openPage(\"podcasts.php?id=" . $UploadedPodcasts->getId() . "\")'>

						<div class='playlistImage'>
							<img src='assets/images/icons/disc.svg'>
						</div>
						
						<div class='gridViewInfo'>"
							. $UploadedPodcasts->getName() .
						"</div>

					</div>";



			}
		?>






	</div>

</div>







	
