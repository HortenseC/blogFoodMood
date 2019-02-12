<?php



			PostQuery::delete_image($bdd, $_GET['id']);
			PostQuery::update_post($bdd, $_POST['id'], $_POST['title'], $_POST['content'], $_POST['category'], $_FILES['uploaded_file']);
			$posts_cat=PostQuery::count_posts_per_cat($bdd);
			$all_posts=PostQuery::search_all_posts($bdd);	
			header("location: index.php");

?>



