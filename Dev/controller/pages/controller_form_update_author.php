<?php
$author=search_author($bdd, $_GET["id"]);
require 'views/editauthor.php';
?>