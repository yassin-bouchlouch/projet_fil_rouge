<?php
include("includes/includedFiles.php");
?>
<style>
 @import url('https://fonts.googleapis.com/css2?family=Raleway:wght@400&display=swap');

 /* body {
  background: #262626;
  font-family: raleway;
  color: white;
  margin: 0;
} */

.popup .content {
 position: absolute;
 top: 50%;
 left: 50%;
 transform: translate(-50%,-150%) scale(0);
 width: 300px;
 height: 450px;
 z-index: 2;
 text-align: center;
 padding: 20px;
 border-radius: 10px;
 background: linear-gradient( to right bottom, rgba(0, 0, 0, 0.02), rgba(0, 0, 0, 0.05) );
    backdrop-filter: blur(2rem);
    border: 1px solid rgba(255,255,255,0.3);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.253), 0 6px 6px rgba(0, 0, 0, 0.297);
 z-index: 1;
}

.popup .close-btn {
 cursor: pointer;
 position: absolute;
 right: 20px;
 top: 20px;
 width: 30px;
 height: 30px;
 color: #fff;
 font-size: 30px;
 
 }

.popup.active .content {
transition: all 300ms ease-in-out;
transform: translate(-50%,-50%) scale(1);
}

h1 {
 text-align: center;
 font-size: 32px;
 font-weight: 600;
 padding-top: 20px;
 padding-bottom: 10px;
}

a {
 font-weight: 600;
 color: white;
}

.input-field .validate {
width: 100%;
padding: 15px;
font-size: 16px;
border-radius: 10px;
border: 1px solid #f24B4B;
margin-bottom: 15px;
color: #fff;
background: #0c0d14;
/* box-shadow: inset 5px 5px 5px #f24B4B, 
            inset -5px -5px 5px #f24B4B; */
outline: none;
}


.second-button {
width: 100%;
color: white;
font-size: 18px;
font-weight: 500;
margin-top: 20px;
padding: 15px 30px;
border-radius: 10px;
border: none;
background: #f24B4B;
box-shadow:  8px 8px 15px #202020, 
             -8px -8px 15px #2c2c2c;
transition: box-shadow .35s ease !important;
outline: none;
}

.second-button:active{
background: linear-gradient(145deg,#222222, #292929);
box-shadow: 5px 5px 10px #262626, -5px -5px 10px #262626;
border: none;
outline: none;
}
p{
color: #fff;
padding: 15px;
}

</style>
<div class="playlistsContainer">

	<div class="gridViewContainer">
		<h2>Your Podcasts</h2>
		<div class="popup" id="popup-1">
   <div class="content">
    <div class="close-btn" onclick="togglePopup()">
     ×</div>
     
		<h1>Add New Album</h1> 
			<div class="input-field"><input placeholder="Album's Name" class="validate"></div>
			<div class="input-field"><input placeholder="Genre" class="validate"></div>
    <button class="second-button">Add</button>
    
      
	
     
   </div>

	 <div class="buttonItems">
			<button class="button first-button" onclick="togglePopup()">NEW ALBUM</button>
		</div>
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







	
