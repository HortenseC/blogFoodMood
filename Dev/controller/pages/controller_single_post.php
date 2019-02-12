<?php
$list_comments = search_all_comments($bdd, $_GET["id"]);
$comments_number = count_comments_per_post($bdd, $_GET["id"]);
$post = PostQuery::search_post($bdd, $_GET["id"]);	
require 'views/details.php';
?>