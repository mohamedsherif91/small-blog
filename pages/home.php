<!-- Get All Articles Start -->
<?php 
	// Fetching All Articles with full details like "author - date - content"
	$article = new Article();
	$getall = $article->getArticlesWithDetails();
	foreach($getall as $row){
		echo 
		'
		<article>
			<h3 class="text-center">'.$row["title"].'</h3>
			<p class="postDetails text-center"><i class="fa fa-list"></i> '.$row["name"].' - <i class="fa fa-user"></i> '.$row["username"].'</p>
			<div class="postContent">
			'.$row["content"].'
			</div>
		</article>
';
	}
?>

<!-- Get All Articles End -->