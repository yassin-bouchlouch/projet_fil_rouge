<?php  
include("includes/includedFiles.php");
?>

<link rel="stylesheet" href="./profile.css">
<div class="entityInfo">

	<div class="centerSection">
		
	</div>

	<div class="userDetails">

	

				<div class="container">
				<div class="profile-pic">
				<label class="-label" for="file">
					<span class="glyphicon glyphicon-camera"></span>
					<span id="change" style="display:none">Change Image</span>
				</label>
				<input id="file" type="file" onchange="loadFile(event)"/>
				<img class='setting-profilePic' id="output" src="<?php echo $userLoggedIn->getprofilePic(); ?>">
				</div>
				</div>

				<div class="userInfo">
					<h1><?php echo $userLoggedIn->getFirstAndLastName(); ?></h1>
				</div>

			<div class="container borderBottom">
				<h2>EMAIL</h2>
				<input type="text" class="email" name="email" placeholder="Email address..." value="<?php echo $userLoggedIn->getEmail(); ?>">
				<span class="message"></span>
				<button class="button" onclick="updateEmail('email')">SAVE</button>
			</div>

			<div class="container">
				<h2>PASSWORD</h2>
				<input type="password" class="oldPassword" name="oldPassword" placeholder="Current password">
				<input type="password" class="newPassword1" name="newPassword1" placeholder="New password">
				<input type="password" class="newPassword2" name="newPassword2" placeholder="Confirm password">
				<span class="message"></span>
				<button class="button" onclick="updatePassword('oldPassword', 'newPassword1', 'newPassword2')">SAVE</button>
			</div>

</div>

</div>

<!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js'></script> -->
<script  src="./script.js"></script>