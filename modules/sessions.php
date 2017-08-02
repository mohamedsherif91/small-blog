<?php 
// Session Class to make session or destroy it
class Session{
	public $username;
	public $id;
	public $isLoginStatus;

	// Starting when class launching
	public function __construct(){
		session_start();
		$this->isLogin();
	}

	// Make Session
	public function makeSession($username,$id){
		$check = $this->checkSessionFound();
		if ($check == true){
			return false;
		}else {
			$_SESSION['sessionusername'] = $username;
			$_SESSION['sessionuserid'] = $id;
			return true;
		}
	}

	// Check if session is already created
	public function checkSessionFound(){
		if (empty($_SESSION['sessionusername'])){
			return false;
		}else {
			return true;
		}
	}

	// Unset or destroy the session
	public function sessionLogout(){
		if ($this->isLoginStatus == true){
			session_unset('sessionusername');
			session_unset('sessionuserid');
			return "<div class='alert alert-success'>Logged Out Done</div>";
		}else {
			return "<div class='alert alert-success'>You Are Not logged in</div>";
		}
	}

	// Check if user already login or no
	public function isLogin(){
		if (!empty($_SESSION['sessionusername'])){
			return $this->isLoginStatus = true;
		}else {
			return $this->isLoginStatus = false;
		}
	}
}
$session = new Session();
?>