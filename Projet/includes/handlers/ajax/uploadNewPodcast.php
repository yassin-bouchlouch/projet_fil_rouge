<?php 
 include("../../config.php");
 include("../../classes/album.php");
 
 


 function message($body,$type){
	$_SESSION['message']['body'] = $body;
	$_SESSION['message']['type'] = $type;
}
if(isset($_POST['name'])){
	$albumId = $_POST['albumId'];
	echo $albumId;
}

	if(isset($_POST['name'])){
		$name = "";  
		$podcast = "";
		

		if(isset($_FILES['podcast']['error'])){
			if($_FILES['podcast']['error'] == 0){
		 
				$target_dir = "../../../assets/music/";
				
				$podcast = time()."_".rand(100000,10000000).rand(100000,10000000)."_".$_FILES["podcast"]["name"];

				// $podcast = str_replace(" ", "_", $podcast);
				// $podcast = urlencode($podcast);
 

				$source = $_FILES["podcast"]["tmp_name"];
				$destination = $target_dir.$podcast;
				
				 if(move_uploaded_file($source, $destination)){
					$podcast = "assets/music/".$podcast;
				 }else{
				 	// $podcast = "";
					 echo "something went wrong";
				 }
			}
		}

		$song_date = time();
		$userLoggedIn = $_SESSION['userLoggedIn'];
		$name = $_POST['name'];
 
		$SQL = "INSERT INTO podcasts(
						title,artist,album,genre,path
					)VALUES(
						'{$name}',(SELECT id from artists where name = '$userLoggedIn'),'{$albumId}',(SELECT genre from albums where id = '$albumId'),'{$podcast}'
					)
				";

		if($con->query($SQL)){ 
			message("New song was uploaded successfully.","success");
		}else{ 
			message("Something went wrong while uploading New song.","warning");
		}

		header("Location:../../../yourpodcasts.php");
		die();
	}

	
?>
