<?php 
if (isset($_POST['do']) and $_POST['do'] == 'add'){
	// Form Values
	$title = strip_tags($_POST['title']);
	$catid = strip_tags($_POST['catid']);
	$content = strip_tags($_POST['content'],"<br><p>");
	$userid = $_SESSION['sessionuserid'];

	// Starting New Article Class & Passing The Values to the function and display errors or success messages
	$article = new Article();
	$article->addArticle($title,$content,$catid,$userid);
	if ($article->error == 'true'){
		echo $article->errorMsg;
	}
	if ($article->success == 'true'){
		echo $article->successMsg;
	}
}

// Deleting row from Database
if ($_REQUEST['action'] == 'delete'){
	$id = intval(abs($_GET['id']));
	$article = new Article();
	$article->deleteArticle($id);
}
?>
<!-- Signup Form Start -->
<div class="signupForm">
	<form action="index.php?page=addArticle" method="post">
		<div class="input-group">
			<label for="title">Article Title</label>
			<input type="text" name="title" placeholder="Article Title" class="form-control">
		</div>
		<div class="input-group">
			<label for="catid">Category</label>
			<select name="catid" class="form-control">
			<?php 
			// Fetching The Category List
			$category = new Categories();
			$getall = $category->getCategories();
				foreach($getall as $row){
					echo 
					'
					<option value="'.$row["id"].'">'.$row["name"].'</option>
					';
				}
			?>
			</select>
		</div>
		<div class="input-group">
			<label for="content">Content</label>
			<textarea class="form-control" name="content" placeholder="Write Your Content"></textarea>
		</div>
		
		<div class="input-group">
			<input type="submit" value="Add Article" class="btn btn-sm btn-success">
			<input type="hidden" name="do" value="add">
		</div>
	</form>
</div>
<!-- Signup Form End -->

<!-- View & Delete Categories Start -->
<div class="viewTable">
	<table class="table table-responsive">
		<thead>
			<tr>
				<th>Title</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			// Fetching All Articles from DataBase
			$article = new Article();
			$getall = $article->getArticles();
				foreach($getall as $row){
					echo 
					'
					<tr>
						<td><a href="index.php">'.$row["title"].'</a></td>
						<td><a href="index.php?page=addArticle&action=delete&id='.$row["id"].'">Delete</a></td>
					</tr>
					';
				}
			?>
			
		</tbody>
	</table>
</div>
<!-- View & Delete Categories End -->