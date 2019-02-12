<?php
$posts_cat=PostQuery::count_posts_per_cat($bdd);
$all_posts=PostQuery::search_all_posts($bdd);
create_comment($bdd, $_POST['comment_content'], $_POST['id_post'], $_POST['id_author']);
$list_comments = search_all_comments($bdd, $_GET["id"]);
$comments_number = count_comments_per_post($bdd, $_GET["id"]);
$post = PostQuery::search_post($bdd, $_GET["id"]);	
header("location: post-".$_GET["id"]);
?>