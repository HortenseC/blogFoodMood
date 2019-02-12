<?php
			PostQuery::delete_post($bdd, $_GET['id']);
			$posts_cat=PostQuery::count_posts_per_cat($bdd);
			$all_posts=PostQuery::search_all_posts($bdd);	
			header("location: index.php");

?>