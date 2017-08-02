<?php 
if (isset($_POST['do']) and $_POST['do'] == 'signin'){
	// Form Value
	$username = strip_tags($_POST['username']);
	$password = md5(md5($_POST['password']));

	// Starting New Users Class & Passing The Values to the function and display errors or success messages
	$user = new Users();
	$user->signinUser($username,$password);
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
	<form action="index.php?page=signin" method="post">
		<div class="input-group">
			<label for="username">Username</label>
			<input type="text" name="username" placeholder="username" class="form-control">
		</div>
		<div class="input-group">
			<label for="password">Password</label>
			<input type="password" name="password" placeholder="password" class="form-control">
		</div>
		<div class="input-group">
			<input type="submit" value="Sign in" class="btn btn-sm btn-success">
			<input type="hidden" name="do" value="signin">
		</div>
	</form>
</div>
<!-- Signup Form End -->