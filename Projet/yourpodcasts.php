<?php
include("includes/includedFiles.php");


function getAllGenres($con){
	$sql = "SELECT * FROM genres ORDER BY name ASC";
 	$res = $con->query($sql);
 	$genres = array();  
  	while ($data = $res->fetch_assoc()) {
  		array_push($genres, $data);
 	}
 	return $genres;
}
$genres = getAllGenres($con);
?>
<style>


</style>
<link rel="stylesheet" href="assets/css/yourpodcasts.css">
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
<div class="playlistsContainer">

	<div class="gridViewContainer">
		<h2>Your Podcasts</h2>
		<div class="popup" id="popup-1">
   <div class="content">
    <div class="close-btn" onclick="togglePopup()">
     ×</div>
     
		<h1>Add New Album</h1>
		<form method="post" action="includes/handlers/ajax/uploadNewAlbum.php" enctype="multipart/form-data"> 
		<div class='form-item'>
    <label for="title">Title</label>
      <input class=" input-field" name="title" id="title" class="form-control validate"></input>
    </div>
  
      <div class="form-item box">
      <label for="id">Genre</label>
			    <select  name="id" required="">
			    	<option value=""></option>
			    	<?php foreach ($genres as $key => $a): ?>
			    		<option value="<?php echo($a['id']); ?>"><?php echo($a['name']); ?></option>
			    	<?php endforeach ?>
			    </select>
			  </div>

        <div class="form-item">
        <label for="artwork">Poster</label>
          <input type="file" id="artwork" name="artwork" multiple />
        </div>
        
        <div class="form-item box">
            <button type="submit" class="second-button">Add</button>
        </div>
		</form>
    
      
	
     
   </div>

	 <div class="buttonItems">
			<button class="button first-button" onclick="togglePopup()">NEW ALBUM</button>
		</div>
  </div>
	
	<!-- <a class="btn btn-dark btn-sm mt-1" href="includes/handlers/ajax/uploadNewAlbum.php">UPLOAD NEW MUSIC</a> -->

	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="./script.js"></script>
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







	
