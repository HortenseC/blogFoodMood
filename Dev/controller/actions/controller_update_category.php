<?php
update_category($bdd, $_POST['id'], $_POST['name']);
$all_authors=search_all_authors($bdd);
$all_posts=PostQuery::search_all_posts($bdd);
$all_categories=search_all_categories($bdd);	
header("location: admin");
?>