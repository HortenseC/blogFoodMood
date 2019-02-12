<?php
$all_authors=search_all_authors($bdd);
$all_categories=search_all_categories($bdd);
$post=PostQuery::search_post($bdd, $_GET["id"]);
require 'views/editpost.php';
?>