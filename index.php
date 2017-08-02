<?php 
// Include Require Modules Files and Get Session Status
require "modules/db_connect.php";
require "modules/users.php";
require "modules/categories.php";
require "modules/articles.php";
$checkSession = $session->isLoginStatus;
?>

<!DOCTYPE html>
<html>
<head>
	<title>Small Blog</title>
	<meta charset="utf-8">
	<!-- Stylesheet & Bootstrap & Jquery Files -->
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
	<script src="bootstrap/js/bootstrap.min.css"></script>
	<script src="js/jquery-3.2.1.min.js"></script>
</head>
<body>

<!-- Header Start -->
<header>
	<div class="container">
		<div class="text-center">
			<h3 class="text-uppercase">Small Blog</h3>
			<p>Minimum Blog Software .. Articles & Login Modules</p>
			<p class="created">Created with <i class="fa fa-heart"></i> By <a href="https://github.com/mohamedsherif91">Mohamed Sherif</a></p>
			<div class="navbarLinks">
				<ul>
					<li><a href="index.php">Home</a> |</li>
					<?php 
					// Check if the system found Session will display specific links else will display another
					if ($checkSession == true){
						echo 
						'
						<li><a href="index.php?page=addCategory">Add Category</a> |</li>
						<li><a href="index.php?page=addArticle">Add Article</a> |</li>
						<li><a href="index.php?page=logout">Logout</a></li>
						';
					}else {
						echo 
						'
						<li><a href="index.php?page=signup">Signup</a> |</li>
						<li><a href="index.php?page=signin">Signin</a></li>
						';
					}
					?>
					
					
				</ul>
			</div>
		</div>
	</div>
</header>
<!-- Header End -->

<!-- Content Start -->
<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12"></div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="contentBox">

				<?php 
				// Includeing Pages When Called and check the session status 
				$page = strip_tags($_GET['page']);
				if (!$page){
					require "pages/home.php"; 
				}
				if ($checkSession == false){
					if ($page == 'signup'){
						require "pages/signup.php";
					}
					if ($page == 'signin'){
						require "pages/signin.php";
					}
				}
				if ($checkSession == true){
					if ($page == 'logout'){
						echo $session->sessionLogout();
					}
					if ($page == 'addCategory'){
						require "pages/addCategory.php";
					}
					if ($page == 'addArticle'){
						require "pages/addArticle.php";
					}
				}
				
				?>

				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12"></div>
		</div>
	</div>
</section>
<!-- Content End -->

<!-- Footer Start -->
<footer>
	<p class="text-center">All Copyright Reserved By <a href="https://github.com/mohamedsherif91">Mohamed Sherif</a> 2017.</p>
</footer>
<!-- Footer End -->

</body>
</html>