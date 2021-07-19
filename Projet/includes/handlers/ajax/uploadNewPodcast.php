<?php 
 include("../../config.php");


 function message($body,$type){
	$_SESSION['message']['body'] = $body;
	$_SESSION['message']['type'] = $type;
}
	

	if(isset($_POST['song_name'])){
		$file_name = "";  
  
		$song_photo = "";
		$song_mp3 = "";

		if(isset($_FILES['song_photo']['error'])){
			if($_FILES['song_photo']['error'] == 0){
		 
				$target_dir = "../../../assets/uploads/";
				
				$song_photo = time()."_".rand(100000,10000000).rand(100000,10000000)."_".$_FILES["song_photo"]["name"];

				$song_photo = str_replace(" ", "_", $song_photo);
				$song_photo = urlencode($song_photo);
 

				$source = $_FILES["song_photo"]["tmp_name"];
				$destinatin = $target_dir.$song_photo;
				
				 if(move_uploaded_file($source, $destinatin)){
				 	 
				 }else{
				 	$song_photo = "";
				 }
			}
		}


		if(isset($_FILES['song_mp3']['error'])){
			if($_FILES['song_mp3']['error'] == 0){
		 
				$target_dir = "../../../assets/uploads/";
				
				$song_mp3 = time()."_".rand(100000,10000000).rand(100000,10000000)."_".$_FILES["song_mp3"]["name"];

				$song_mp3 = str_replace(" ", "_", $song_mp3);
				$song_mp3 = urlencode($song_mp3);
 

				$source = $_FILES["song_mp3"]["tmp_name"];
				$destinatin = $target_dir.$song_mp3;
				
				 if(move_uploaded_file($source, $destinatin)){
				 	 
				 }else{
				 	$song_mp3 = "";
				 }
			}
		}

		$song_date = time();

		$song_name = $_POST['song_name'];
		
 
		$SQL = "INSERT INTO songs(
						song_mp3,song_photo,song_name
					)VALUES(
						'{$song_mp3}','{$song_photo}','{$song_name}'
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
<div class="container">
	
<!-- 
		song_date		
 -->
	<div class="row pl-0">
		
		<div class="col-md-8">
			<h2>Uploading new song</h2>

			<form method="post" action="upload.php" enctype="multipart/form-data">
			  <div class="form-group">
			    <label for="song_name">Song name</label>
			    <input type="text" name="song_name" class="form-control" id="song_name"  placeholder="Enter song name"> 
			  </div>
 

 			  <div class="form-group">
			    <label for="song_photo">Song photo</label>
			    <input type="file"  name="song_photo" class="form-control" id="song_photo"> 
			  </div>


 			  <div class="form-group">
			    <label for="song_mp3">Song mp3</label>
			    <input type="file" accept=".mp3" name="song_mp3" class="form-control" id="song_mp3"> 
			  </div>

			  <button type="submit" class="float-right mt-md-3 btn btn-lg btn-dark">Add new song</button>

			</form>

		</div>
	</div>

</div>




  