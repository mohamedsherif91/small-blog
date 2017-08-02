<?php 
// Include Require Modules Files
require_once("db_connect.php");
require_once("sessions.php");

// Starting Class
class Article{
	public $title;
	public $content;
	public $catid;
	public $errorMsg;
	public $successMsg;

	// Add Article Function containing The Values (Title - content - category id - user id)
	public function addArticle($title,$content,$catid,$userid){
		$session = new Session(); // New Session 
		$checkSession = $session->isLoginStatus; // Get Session Status if login or not
		if ($checkSession == true){ // If True will start our code 
			if (empty($title) or empty($content) or empty($catid)){ // Checking if the values is empty
				$this->error = true;
				$this->errorMsg = "<div class='alert alert-danger'>Write all fields for article</div>";
			}else {
				// Preparing the Data to pass it to the database
				global $db;
				$insert = $db->prepare("INSERT INTO posts (title,content,catid,userid) VALUES (:tit,:cont,:cid,:usrid)");
				$insert->bindvalue(":tit",$title,PDO::PARAM_STR);
				$insert->bindvalue(":cont",$content,PDO::PARAM_STR);
				$insert->bindvalue(":cid",$catid,PDO::PARAM_INT);
				$insert->bindvalue(":usrid",$userid,PDO::PARAM_INT);
				$insert->execute();
				if ($insert){
					$this->success = true;
					$this->successMsg = "<div class='alert alert-success'>Article Added</div>";
				}
			}
		}else {
			$this->error = true;
			$this->errorMsg = "<div class='alert alert-danger'>You need to login first</div>";
		}
	}

	// Get Articles from database
	public function getArticles(){
		global $db;
		$getAll = $db->prepare("SELECT * FROM posts ORDER BY id DESC");
		$getAll->execute();
		return $getAll->fetchAll();
	}

	// Delete Article from Database
	public function deleteArticle($id){
		global $db;
		$delete = $db->prepare("DELETE FROM posts WHERE id='$id'");
		$delete->execute();
		if ($delete){
			return "<div class='alert alert-success'>Deleted</div>";
		}else {
			return "<div class='alert alert-danger'>Problem Happend</div>";
		}
	}

	// Get Article Details like (title - content - category - user name)
	public function getArticlesWithDetails(){
		global $db;
		$getAll = $db->prepare("
			SELECT posts.id, posts.title, posts.content, cats.name, users.username 
			FROM posts 
			INNER JOIN cats ON posts.catid =  cats.id 
			INNER JOIN users ON posts.userid = users.id 
			ORDER BY id DESC
		");
		$getAll->execute();
		return $getAll->fetchAll();

	}
}
?>