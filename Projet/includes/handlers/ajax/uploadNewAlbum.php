<?php 
 include("../../config.php");
 include("../../classes/User.php");


 function message($body,$type){
	$_SESSION['message']['body'] = $body;
	$_SESSION['message']['type'] = $type;
}

	if(isset($_POST['title'])){
		$file_name = "";  
		$artwork = "";

		if(isset($_FILES['artwork']['error'])){
			if($_FILES['artwork']['error'] == 0){
		 
				$target_dir = "../../../assets/images/artwork/";
				
				$artwork =time()."_".rand(100000,10000000).rand(100000,10000000)."_".$_FILES["artwork"]["name"];

				$artwork = str_replace(" ", "_", $artwork);
				$artwork = urlencode($artwork);
 

				$source = $_FILES["artwork"]["tmp_name"];
				$destinatin = $target_dir.$artwork;
				
				 if(move_uploaded_file($source, $destinatin)){
				 	 
				 }else{
				 	$artwork = "";
				 }
			}
		}

	
		$userLoggedIn = $_SESSION['userLoggedIn'];
		$title = $_POST['title'];
    $id = $_POST['id'];
 
		$SQL = "INSERT INTO albums(
						title,artist,genre,artworkPath
					)VALUES(
						'{$title}',(SELECT id from artists where name = '$userLoggedIn'),'{$id}','{$artwork}'
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





  