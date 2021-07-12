<?php  
include("includes/includedFiles.php");
?>

<div class="entityInfo">

	<div class="centerSection">
		
	</div>

	<div class="userDetails">


				<div class="container">
					<img class='setting-profilePic' src="<?php echo $userLoggedIn->getprofilePic(); ?>">
					<!-- <button class="button" onclick="updateprofilePic('profilePic')">SAVE</button> -->
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