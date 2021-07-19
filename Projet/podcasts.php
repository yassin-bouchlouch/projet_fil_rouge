<?php include("includes/includedFiles.php"); 

if(isset($_GET['id'])) {
	$albumId = $_GET['id'];
}
else {
	header("Location: index.php");
}

$album = new Album($con, $albumId);
$artist = $album->getArtist();
$artistId = $artist->getId();
?>

<div class="entityInfo">

	<div class="leftSection">
		<img src="assets/images/artwork/<?php echo $album->getArtworkPath(); ?>">
	</div>

	<div class="rightSection">
		<h2><?php echo $album->getTitle(); ?></h2>
		<p role="link" tabindex="0" onclick="openPage('artist.php?id=<?php echo $artistId; ?>')">By <?php echo $artist->getName(); ?></p>
		<p><?php echo $album->getNumberOfPodcast(); ?> Podcasts</p>
		<button class="button" onclick="togglePopup()">UPLOAD NEW PODCAST</button>
		<button class="button"  onclick="deletePlaylist('<?php echo $playlistId; ?>')">DELETE ALBUM</button>


	</div>

</div>

<link rel="stylesheet" href="assets/css/yourpodcasts.css">
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="./script.js"></script>

<div class="popup" id="popup-1">
   <div class="content">
    <div class="close-btn" onclick="togglePopup()">
     ×</div>
     
		<h1>Add New Album</h1>
		<form method="post" action="includes/handlers/ajax/uploadNewPodcast.php" enctype="multipart/form-data"> 
		<div class='form-item'>
    <label for="title">Title</label>
      <input class=" input-field" name="title" id="title" class="form-control validate"></input>
    </div>

        <div class="form-item">
        <label for="artwork">Podcast</label>
          <input type="file" id="artwork" name="artwork" multiple />
        </div>
        
        <div class="form-item box">
            <button type="submit" class="second-button">Add</button>
        </div>
		</form>
   </div>


<div class="tracklistContainer">
	<ul class="tracklist">
		
		<?php
		$songIdArray = $album->getSongIds();

		$i = 1;
		foreach($songIdArray as $songId) {

			$albumSong = new Podcast($con, $songId);
			$albumArtist = $albumSong->getArtist();

			echo "<li class='tracklistRow'>
					<div class='trackCount'>
						<img class='play' src='assets/images/icons/play-white.png' onclick='setTrack(\"" . $albumSong->getId() . "\", tempPlaylist, true)'>
						<span class='trackNumber'>$i</span>
					</div>


					<div class='trackInfo'>
						<span class='trackName'>" . $albumSong->getTitle() . "</span>
						<span class='artistName'>" . $albumArtist->getName() . "</span>
					</div>

					<div class='trackOptions'>
						<input type='hidden' class='songId' value='" . $albumSong->getId() . "'>
						<img class='optionsButton' src='assets/images/icons/more.png' onclick='showOptionsMenu(this)'>
					</div>

					<div class='trackDuration'>
						<span class='duration'>" . $albumSong->getDuration() . "</span>
					</div>


				</li>";

			$i = $i + 1;
		}

		?>

		<script>
			var tempSongIds = '<?php echo json_encode($songIdArray); ?>';
			tempPlaylist = JSON.parse(tempSongIds);
		</script>

	</ul>
</div>


<nav class="optionsMenu">
	<input type="hidden" class="songId">
	<?php echo Playlist::getPlaylistsDropdown($con, $userLoggedIn->getUsername()); ?>
</nav>







