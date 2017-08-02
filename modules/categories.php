<?php 
// Include Require Modules Files
require_once("db_connect.php");
require_once("sessions.php");

// Starting Class
class Categories{
	public $name;
	public $errorMsg;
	public $successMsg;

	// Add Category Function containing The Values (name of category)
	public function addCategory($name){
		$session = new Session(); // New Session 
		$checkSession = $session->isLoginStatus; // Get Session Status if login or not
		if ($checkSession == true){ // If True will start our code 
			if (empty($name)){ // Checking if the values is empty
				$this->error = true;
				$this->errorMsg = "<div class='alert alert-danger'>Write Name for category</div>";
			}else {
				// Preparing the Data to pass it to the database
				global $db;
				$insert = $db->prepare("INSERT INTO cats (name) VALUES (:nm)");
				$insert->bindvalue(":nm",$name,PDO::PARAM_STR);
				$insert->execute();
				if ($insert){
					$this->success = true;
					$this->successMsg = "<div class='alert alert-success'>Category Added</div>";
				}
			}
		}else {
			$this->error = true;
			$this->errorMsg = "<div class='alert alert-danger'>You need to login first</div>";
		}
	}

	// Get All Categories
	public function getCategories(){
		global $db;
		$getAll = $db->prepare("SELECT * FROM cats ORDER BY id DESC");
		$getAll->execute();
		return $getAll->fetchAll();
	}

	// Delete Category
	public function deleteCategory($id){
		global $db;
		$delete = $db->prepare("DELETE FROM cats WHERE id='$id'");
		$delete->execute();
		if ($delete){
			return "<div class='alert alert-success'>Deleted</div>";
		}else {
			return "<div class='alert alert-danger'>Problem Happend</div>";
		}
		
	}
}
?>