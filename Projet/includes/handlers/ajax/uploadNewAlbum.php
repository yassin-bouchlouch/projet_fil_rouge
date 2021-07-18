<?php 
 include("../../config.php");


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
				
				$artwork = time()."_".rand(100000,10000000).rand(100000,10000000)."_".$_FILES["artwork"]["name"];

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

	

		$title = $_POST['title'];
    $id = $_POST['id'];
 
		$SQL = "INSERT INTO albums(
						title,genre,artworkPath
					)VALUES(
						'{$title}','{$id}','{$artwork}'
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
	

	<div class="row pl-0">
		
		<div class="col-md-8">
			<h2>Uploading new song</h2>

			<form method="post" action="uploadNewAlbum.php" enctype="multipart/form-data">
			  <div class="form-group">
			    <label for="title">Song name</label>
			    <input type="text" name="title" class="form-control" id="title"  placeholder="Enter albums name"> 
			  </div>
 
        
        <div class="form-group">
			    <label for="id">Genre</label>
			    <select name="id" required="" class="form-control">
			    	<option value=""></option>
			    	<?php foreach ($genres as $key => $a): ?>
			    		<option value="<?php echo($a['id']); ?>"><?php echo($a['name']); ?></option>
			    	<?php endforeach ?>
			    </select>
			  </div>

 			  <div class="form-group">
			    <label for="artwork">Song photo</label>
			    <input type="file"  name="artwork" class="form-control" id="artwork"> 
			  </div>

			  <button type="submit" class="float-right mt-md-3 btn btn-lg btn-dark">Add new Album</button>

			</form>

		</div>
	</div>

</div>




  