<?php 
if (isset($_POST['do']) and $_POST['do'] == 'signup'){
	// Form Value
	$username = strip_tags($_POST['username']);
	$email = strip_tags($_POST['email']);
	$password = md5(md5($_POST['password']));

	// Starting New Users Class & Passing The Values to the function and display errors or success messages
	$user = new Users();
	$user->createUser($username,$password,$email);
	if ($user->error == 'true'){
		echo $user->errorMsg;
	}
	if ($user->success == 'true'){
		echo $user->successMsg;
		// Redirection to home page
		echo '<meta http-equiv="refresh" content="1; url=index.php" />';
	}
}
?>
<!-- Signup Form Start -->
<div class="signupForm">
	<form action="index.php?page=signup" method="post">
		<div class="input-group">
			<label for="username">Username</label>
			<input type="text" name="username" placeholder="username" class="form-control">
		</div>
		<div class="input-group">
			<label for="password">Password</label>
			<input type="password" name="password" placeholder="password" class="form-control">
		</div>
		<div class="input-group">
			<label for="email">Email</label>
			<input type="email" name="email" placeholder="email" class="form-control">
		</div>
		<div class="input-group">
			<input type="submit" value="Sign up" class="btn btn-sm btn-success">
			<input type="hidden" name="do" value="signup">
		</div>
	</form>
</div>
<!-- Signup Form End -->