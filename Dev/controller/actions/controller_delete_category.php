<?php
	delete_category($bdd, $_GET['id']);
	$all_posts=PostQuery::search_all_posts($bdd);
	$all_authors=search_all_authors($bdd);
	$all_categories=search_all_categories($bdd);	
	header("location: admin");
?>