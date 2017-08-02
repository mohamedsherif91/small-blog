<?php 
// Include Require Modules Files
require_once("db_connect.php");
require_once("sessions.php");

// Starting Class
class Users{
	public $username;
	public $password;
	public $email;
	public $errorMsg;
	public $successMsg;

	// Signup or Create new user with values (username and password and email address)
	public function createUser($username,$password,$email){
		if (!$username or !$password or !$email){ // Check if the values is empty 
			$this->error = true;
			$this->errorMsg = "<div class='alert alert-danger'>Please write all fields</div>";
		}else {
			$checkuser = $this->checkUser($username,$email); // check if he username or email already in database
			if ($checkuser == true){ // if the username or email already in database will display error
				$this->error = true;
				$this->errorMsg = "<div class='alert alert-danger'>username or email already registered</div>";
			}else { 
			// if the username or email not registered already will start register and preparing out values
				global $db;
				$insertNewUser = $db->prepare("INSERT INTO users (username,password,email) VALUES (:usr,:pswd,:eml)");
				$insertNewUser->bindvalue(":usr",$username,PDO::PARAM_STR);
				$insertNewUser->bindvalue(":pswd",$password,PDO::PARAM_STR);
				$insertNewUser->bindvalue(":eml",$email,PDO::PARAM_STR);
				$insertNewUser->execute();
				if ($insertNewUser){
				$this->success = true;
				$this->successMsg = "<div class='alert alert-success'>Congratz .. Sign in now</div>";
				}
			}
		}
	}

	// Check if username or email is already in our system
	private function checkUser($username,$email){
		if ($username != "" and $email != ""){ // Check if the values are empty
			global $db;
			$check = $db->prepare("SELECT * FROM users WHERE username=:usr OR email=:eml");
			$check->bindvalue(":usr",$username,PDO::PARAM_STR);
			$check->bindvalue(":eml",$email,PDO::PARAM_STR);
			$check->execute();
			$counts = $check->rowCount(); // Rows Count
			if ($counts > 0){ // if Count is bigger than 0, it's mean if table have rows
				return true;
			}else {
				return false;
			}
		}
	}

	// Sign in the user containg the username and password
	public function signinUser($username,$password){
		if (empty($username) or empty($password)){ // check if username or password is empty
			$this->error = true;
			$this->errorMsg = "<div class='alert alert-danger'>Please write all fields</div>";
		}else {
			$findUser = $this->findUser($username,$password); // check if the username and password is correct and matching
			if ($this->findUserr == true){ // if matching
				$id = $this->userId; // userid
				$newSession = new Session(); // starting session class
				$makeSession = $newSession->makeSession($username,$id); // make new session with username and user id
				if ($makeSession == true){ // if session is created successful this message will display
					$this->success = true;
					$this->successMsg = "<div class='alert alert-success'>".$_SESSION['sessionusername']." Congratz .. Enjoy our website</div>";
				}
				if ($makeSession == false){ // if session is not created this message will display
					$this->error = true;
					$this->errorMsg = "<div class='alert alert-danger'>You are already logged in</div>";
				}
			}else { // if the details is not correct
				$this->error = true;
				$this->errorMsg = "<div class='alert alert-danger'>You are not a member with us</div>";
			}

		}
	}

	// Check if username and password is correct and matching
	private function findUser($username,$password){
			// preparing the values and checking in the database
			global $db;
			$check = $db->prepare("SELECT * FROM users WHERE username=:usr AND password=:pswd");
			$check->bindvalue(":usr",$username,PDO::PARAM_STR);
			$check->bindvalue(":pswd",$password,PDO::PARAM_STR);
			$check->execute();
			$counts = $check->rowCount(); // Row Counts
			$row = $check->fetch(PDO::FETCH_ASSOC);
			$this->userId = $row['id']; // Get user id
			if ($counts > 0){ // if the results have rows it's mean the system found the user matching the password
				return $this->findUserr = true;
			}else {
				return $this->findUserr = false;
			}		
	}
}
?>