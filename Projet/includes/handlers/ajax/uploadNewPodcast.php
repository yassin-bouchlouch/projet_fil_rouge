<?php 
 include("../../config.php");


 function message($body,$type){
	$_SESSION['message']['body'] = $body;
	$_SESSION['message']['type'] = $type;
}
	

	if(isset($_POST['name'])){
		$name = "";  
		$song_mp3 = "";

		

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

		$name = $_POST['name'];
		
 
		$SQL = "INSERT INTO songs(
						song_mp3,song_name
					)VALUES(
						'{$song_mp3}','{$name}'
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
