<?php
$post_author=PostQuery::count_posts_per_authors($bdd, $_GET['id']);
$author=search_author($bdd, $_GET["id"]);
$post_per_authors = PostQuery::sort_by_authors($bdd, $_GET['id']);
$all_posts=PostQuery::search_all_posts($bdd);
$all_categories=search_all_categories($bdd);
$post_per_cat=PostQuery::sort_by_categories($bdd, $_GET["id"]);
$posts_cat=PostQuery::count_posts_per_cat($bdd);

require 'views/sort-by-authors.php';
?>