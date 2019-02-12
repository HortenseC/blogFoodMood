<?php
$posts_cat=PostQuery::count_posts_per_cat($bdd);
$all_categories=search_all_categories($bdd);
$all_authors=search_all_authors($bdd);

// $postquery = new PostQuery;
// $all_posts = $postquery->searchallposts($bdd);

$all_posts=PostQuery::search_all_posts($bdd);

require 'views/home.php';
?>