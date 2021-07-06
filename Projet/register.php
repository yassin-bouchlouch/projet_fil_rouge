<?php
include('includes/classes/Account.php');
$account =new Account();

include('includes/handlers/register-handler.php');
include('includes/handlers/login-handler.php');
?>

<html>
<head>
	<title>Podcast Portfolio!</title>
</head>
<body>

	<div id="inputContainer">
		<form id="loginForm" action="register.php" method="POST">
			<h2>Login to your account</h2>
			<p>
				<label for="loginUsername">Username</label>
				<input id="loginUsername" name="loginUsername" type="text" placeholder="Enter your username" required>
			</p>
			<p>
				<label for="loginPassword">Password</label>
				<input id="loginPassword" name="loginPassword" type="password" required>
			</p>

			<button type="submit" name="loginButton">LOG IN</button>
			
		</form>



    <form id="registerForm" action="register.php" method="POST">
			<h2>Create your Account</h2>
			<p>
				<label for="username">Username</label>
				<input id="username" name="username" type="text" placeholder="Enter your Username" required>
			</p>
      <p>
				<label for="firstName">First name</label>
				<input id="firstName" name="firstName" type="text" placeholder="Enter your first Name" required>
			</p>	
      <p>
				<label for="lastName">Last name</label>
				<input id="lastName" name="lastName" type="text" placeholder="Enter your last name" required>
			</p>
      <p>
				<label for="Email">Email</label>
				<input id="Email" name="Email" type="email" placeholder="Enter your Email" required>
			</p>
      <p>
				<label for="Email2">Confirm Email</label>
				<input id="Email2" name="Email2" type="email" placeholder="confirm your Email" required>
			</p>
			<p>
				<label for="password">Password</label>
				<input id="password" name="loginPassword" type="password"  placeholder="your Password" required>
			</p>
			<p>
				<label for="confirmPassword">Confirm Password</label>
				<input id="password" name="loginPassword" type="password" placeholder="Confirm your Password" required>
			</p>

			<button type="submit" name="registerButton">SIGN UP</button>
			
		</form>
	</div>

</body>
</html>