<?php 
if (isset($_POST['do']) and $_POST['do'] == 'add'){
	// Form Values
	$name = strip_tags($_POST['name']);

	// Starting New Categories Class & Passing The Values to the function and display errors or success messages
	$category = new Categories();
	$category->addCategory($name);
	if ($category->error == 'true'){
		echo $category->errorMsg;
	}
	if ($category->success == 'true'){
		echo $category->successMsg;
	}
}

// Deleting row from Database
if ($_REQUEST['action'] == 'delete'){
	$id = intval(abs($_GET['id']));
	$category = new Categories();
	$category->deleteCategory($id);
}
?>
<!-- Signup Form Start -->
<div class="signupForm">
	<form action="index.php?page=addCategory" method="post">
		<div class="input-group">
			<label for="username">Category Name</label>
			<input type="text" name="name" placeholder="Category Name" class="form-control">
		</div>
		<div class="input-group">
			<input type="submit" value="Add Category" class="btn btn-sm btn-success">
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
				<th>Category Name</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
			<?php 

			// Fetching All Categories from DataBase
			$category = new Categories();
			$getall = $category->getCategories();
				foreach($getall as $row){
					echo 
					'
					<tr>
						<td>'.$row["name"].'</td>
						<td><a href="index.php?page=addCategory&action=delete&id='.$row["id"].'">Delete</a></td>
					</tr>
					';
				}
			?>
			
		</tbody>
	</table>
</div>
<!-- View & Delete Categories End -->