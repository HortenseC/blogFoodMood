<?php
$cat=search_category($bdd, $_GET["id"]);
require 'views/editcategory.php';
?>