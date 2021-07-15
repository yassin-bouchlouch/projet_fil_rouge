
<?php include("includes/includedFiles.php"); 

if(isset($_GET['id'])) {
	$UploadedPodcastsId = $_GET['id'];
}
else {
	header("Location: index.php");
}

$UploadedPodcasts = new UploadedPodcasts($con, $UploadedPodcastsId);
$owner = new User($con, $UploadedPodcasts->getOwner());
?>

<div class="entityInfo">

	<div class="leftSection">
		<div class="UploadedPodcastsImage">
			<img src="assets/images/icons/heart.svg">
		</div>
	</div>

	<div class="rightSection">
		<h2><?php echo $UploadedPodcasts->getName(); ?></h2>
		<p>By <?php echo $UploadedPodcasts->getOwner(); ?></p>
		<p><?php echo $UploadedPodcasts->getNumberOfPodcast(); ?> Podcasts</p>
		<button class="button" onclick="deleteUploadedPodcasts('<?php echo $UploadedPodcastsId; ?>')">DELETE ALBUM</button>

	</div>

</div>


<div class="tracklistContainer">
	<ul class="tracklist">
		
		<?php
		$songIdArray = $UploadedPodcasts->getSongIds();

		$i = 1;
		foreach($songIdArray as $songId) {

			$UploadedPodcastsSong = new Podcast($con, $songId);
			$songArtist = $UploadedPodcastsSong->getArtist();

			echo "<li class='tracklistRow'>
					<div class='trackCount'>
						<img class='play' src='assets/images/icons/play-white.png' onclick='setTrack(\"" . $UploadedPodcastsSong->getId() . "\", tempUploadedPodcasts, true)'>
						<span class='trackNumber'>$i</span>
					</div>


					<div class='trackInfo'>
						<span class='trackName'>" . $UploadedPodcastsSong->getTitle() . "</span>
						<span class='artistName'>" . $songArtist->getName() . "</span>
					</div>

					<div class='trackOptions'>
						<input type='hidden' class='songId' value='" . $UploadedPodcastsSong->getId() . "'>
						<img class='optionsButton' src='assets/images/icons/more.png' onclick='showOptionsMenu(this)'>
					</div>

					<div class='trackDuration'>
						<span class='duration'>" . $UploadedPodcastsSong->getDuration() . "</span>
					</div>


				</li>";

			$i = $i + 1;
		}

		?>

		<script>
			var tempSongIds = '<?php echo json_encode($songIdArray); ?>';
			tempUploadedPodcasts = JSON.parse(tempSongIds);
		</script>

	</ul>
</div>

<nav class="optionsMenu">
	<input type="hidden" class="songId">
	<?php echo UploadedPodcasts::getUploadedPodcastssDropdown($con, $userLoggedIn->getUsername()); ?>
	<div class="item" onclick="removeFromUploadedPodcasts(this, '<?php echo $UploadedPodcastsId; ?>')">Remove from UploadedPodcasts</div>
</nav>

<a class="btn btn-dark btn-sm mt-1" href="includes/handlers/ajax/upload.php">UPLOAD NEW Podcasts</a>







