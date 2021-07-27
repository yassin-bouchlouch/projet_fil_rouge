<div id="navBarContainer">
	<nav class="navBar">

		<span role="link" tabindex="0" onclick="openPage('index.php')" class="logo">
			<!-- <img src="assets/images/icons/logo.png"> -->Podcaster
		</span>


		

		<div class="group">

		<div class="avatar-container">
			<img class='avatar' src="<?php echo $userLoggedIn->getprofilePic(); ?>">
		</div>

		<div class="navItem">
				<img class='icon' src='assets/images/icons/user.svg'>
				<span role="link" tabindex="0" onclick="openPage('settings.php')" class="navItemLink"><?php echo $userLoggedIn->getFirstName(); ?></span>
			</div>

		

			<div class="navItem">
				<img class='icon' src='assets/images/icons/headphones.svg'>
				<span role="link" tabindex="0" onclick="openPage('browse.php')" class="navItemLink">Browse</span>
			</div>

			<div class="navItem">
				<img class='icon' src='assets/images/icons/mic.svg'>
				<span role="link" tabindex="0" onclick="openPage('yourpodcasts.php')" class="navItemLink">your Podcasts</span>
			</div>

			<div class="navItem">
				<img class='icon' src='assets/images/icons/heart.svg'>
				<span role="link" tabindex="0" onclick="openPage('yourLikes.php')" class="navItemLink">Your Likes</span>
			</div>
			
	<div class="navItem">
				<img class='icon' src='assets/images/icons/search.svg'>
				<span role="link" tabindex="0" onclick="openPage('search.php')" class="navItemLink">Search</span>
			</div>

			<div class="navItem">
				<img class='icon' src='assets/images/icons/arrow-out-square.svg'>
			<span role="link" tabindex="0" class="navItemLink" onclick="logout()">Logout</span>
			</div>
			

	
		</div>

	</nav>
</div>