<?php
	include("includes/config.php");
	include("includes/classes/Account.php");
	include("includes/classes/Constants.php");

	$account = new Account($con);

	include("includes/handlers/register-handler.php");
	include("includes/handlers/login-handler.php");

	function getInputValue($name) {
		if(isset($_POST[$name])) {
			echo $_POST[$name];
		}
	}
?>

<html>
<head>
	<title>Welcome to Podcaster!</title>

	<link rel="stylesheet" type="text/css" href="assets/css/register.css">

	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	<script src="assets/js/register.js"></script>
	<script  src="./script.js"></script>
	<script>
		function togglePopup1() {
	document.getElementById("popup-1")
	 .classList.toggle("active");
 }
		function togglePopup2() {
	document.getElementById("popup-2")
	 .classList.toggle("active");
 }
	</script>
</head>
<body>
<div class="navbar-container">
	<div class="logo">
	<h1>Podcaster</h1>
</div>
<div class="menu">
		<a class="sign-up" onclick="togglePopup1()">SIGN UP</a>
		<a class="sign-in"  onclick="togglePopup2()">SIGN IN</a>
</div>
</div>

		
	<?php

	if(isset($_POST['registerButton'])) {
		echo '<script>
				$(document).ready(function() {
					$("#loginForm").show();
					$("#registerForm").show();
				});
			</script>';
	}
	else {
		echo '<script>
				$(document).ready(function() {
					$("#loginForm").show();
					$("#registerForm").show();
				});
			</script>';
	}

	?>
	

	<div id="background">
				<div id="loginText"><h1>Your Voice,<br> Your World</h1></div>															

		<div class="popup" id="popup-2">			
				<div class="content">	
						<div class="close-btn" onclick="togglePopup2()">×</div>
						<div id="loginContainer">
								<form id="loginForm" action="register.php" method="POST">
									<h2>Login to your account</h2>
										<p>
											<?php echo $account->getError(Constants::$loginFailed); ?>
											<label for="loginUsername">Username</label>
											<input id="loginUsername" name="loginUsername" type="text"  value="<?php getInputValue('loginUsername') ?>" required autocomplete="off">
										</p>
										<p>
											<label for="loginPassword">Password</label>
											<input id="loginPassword" name="loginPassword" type="password"  required>
										</p>

									<button type="submit" name="loginButton">LOG IN</button>

									<div class="hasAccountText">
										<span id="hideLogin">Don't have an account yet? Signup here.</span>
									</div>									
								</form>	
				</div>	
			</div>	
		</div>			
	</div>



	<div class="popup" id="popup-1">			
				<div class="content">	
						<div class="close-btn" onclick="togglePopup1()">×</div>
						<div id="loginContainer">
						<form id="registerForm" action="register.php" method="POST">
					<h2>Create your free account</h2>
					<p>
						<?php echo $account->getError(Constants::$usernameCharacters); ?>
						<?php echo $account->getError(Constants::$usernameTaken); ?>
						
						<input id="username" name="username" type="text" placeholder="Username"  value="<?php getInputValue('username') ?>" required>
					</p>

					<p>
						<?php echo $account->getError(Constants::$firstNameCharacters); ?>
						
						<input id="firstName" name="firstName" type="text"  placeholder="First Name" value="<?php getInputValue('firstName') ?>" required>
					</p>

					<p>
						<?php echo $account->getError(Constants::$lastNameCharacters); ?>
						
						<input id="lastName" name="lastName" type="text" placeholder="Last Name"  value="<?php getInputValue('lastName') ?>" required>
					</p>

					<p>
						<?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
						<?php echo $account->getError(Constants::$emailInvalid); ?>
						<?php echo $account->getError(Constants::$emailTaken); ?>
						
						<input id="email" name="email" type="email" placeholder="Email" value="<?php getInputValue('email') ?>" required>
					</p>

					<p>
						
						<input id="email2" name="email2" type="email" placeholder="Confirm Email" value="<?php getInputValue('email2') ?>" required>
					</p>

					<p>
						<?php echo $account->getError(Constants::$passwordsDoNoMatch); ?>
						<?php echo $account->getError(Constants::$passwordNotAlphanumeric); ?>
						<?php echo $account->getError(Constants::$passwordCharacters); ?>
						
						<input id="password" name="password" type="password" placeholder="Password"  required>
					</p>

					<p>
						
						<input id="password2" name="password2" type="password" placeholder="Confirm Password" required>
					</p>

					<button type="submit" name="registerButton">SIGN UP</button>

			
					
				</form>		

				</div>	
			</div>	
		</div>			
	</div>


</body>
</html>