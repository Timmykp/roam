<?php
require_once 'headerprelogin.php';

if($_SESSION['loggedIn'] == true){
	header('Location: index.php');
}

 
if(isset($_POST['roam-submit'])) {
	//Handle login
	$email = $_POST['email'];
	$password = $_POST['password'];

	if(validateLogin($email, $password)){
		//Login validation succeeded.
		$_SESSION['loggedIn'] = true;
		$_SESSION['email'] = $email;
		header('Location: index.php');
	} else {
		//Login validation failed
		echo "<script>window.alert('boo!');</script>";
	}

} else {
	showLogin();
}

/*
* Function to display the login containers on the login screen
* @param none
* @return none
*/	
function showLogin(){ ?>

<section id="splash">
		<div id="container-left">
			<h2>Login</h2>
				<button>Login with Facebook</button>
				<form action='' method='post'>					
					<div id='login-seperator'>
					- or -
					</div>

					<div id="input-fields">
							<input type="text" name="email" placeholder="email">
							<input type="password" name="password" placeholder="password">
							<input type="submit" name="roam-submit" value="Login with Roam">
					</div>

					<div id="register-link">
						<p>No account yet?</p>
						<p><a href="registerUser.php">Sign up for free here!</a></p>
					</div>

				</form>
		</div>
		<div id="container-right" class="clearfix">
		</div>
</section>
<div id="splash-img"></div>
<?php
}

require_once 'footerprelogin.php';
?>