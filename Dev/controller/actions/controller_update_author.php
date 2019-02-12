<?php
delete_avatar($bdd, $_GET['id']);
update_author($bdd, $_POST['id'], $_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['password'], $_POST['level'], $_FILES['uploaded_avatar']);
$all_authors=search_all_authors($bdd);
$all_posts=PostQuery::search_all_posts($bdd);
$all_categories=search_all_categories($bdd);	
header("location: admin");

?>