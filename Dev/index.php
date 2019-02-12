<?php
session_start();		
require('model/connexion.php');
require('model/function.php');
require_once('model/class-postquery.php');
$message = '';
if(isset($_POST['email']) && isset($_POST['password']) && isset($_GET['action'])&&($_GET['action']) == 'login'){
	$user=search_author_login($bdd, $_POST['email'], $_POST['password']);
	if ($user){
		$_SESSION['id']=$user['id'];
		$_SESSION['firstname']=$user['firstname'];
		$_SESSION['lastname']=$user['lastname'];
		$_SESSION['email']=$user['email'];
		$_SESSION['level']=$user['level'];
		$_SESSION['avatar']=$user['avatar'];
	} else {
		echo "Email ou mot de passe incorrect";
	}
}

if ((isset($_GET['stopsession']) && ($_GET['stopsession']) =='yes'))
{
	unset($_SESSION['id']);
	unset($_SESSION['firstname']);
	unset($_SESSION['lastname']);
	unset($_SESSION['email']);
	unset($_SESSION['level']);
	unset($_SESSION['avatar']);
	session_destroy();

}

require('views/header.php');


if (isset($_GET['action'])) {
	switch ($_GET['action']) {
		case 'createpost':
			require 'controller/actions/controller_insert_post.php';
			break;
		case 'editpost':
			require 'controller/actions/controller_update_post.php';
			break;
		case 'deletepost':
			require 'controller/actions/controller_delete_post.php';
			break;

		case 'createauthor':
			require 'controller/actions/controller_insert_author.php';
			break;
		case 'editauthor':
			require 'controller/actions/controller_update_author.php';			
			break;
		case 'deleteauthor':
			require 'controller/actions/controller_delete_author.php';			
			break;
		case 'login':
			require 'controller/actions/controller_login.php';	
			break;
		case 'createcategory':
			require 'controller/actions/controller_insert_category.php';
			break;
		case 'editcategory':
			require 'controller/actions/controller_update_category.php';
			break;
		case 'deletecategory':
			require 'controller/actions/controller_delete_category.php';	
			break;
		case 'createcomment':
			require 'controller/actions/controller_insert_comment.php';
			break;	
		case 'deletecomment':
			require 'controller/actions/controller_delete_comment.php';
			break;
	}
} else if(isset($_GET['page'])){
	switch($_GET['page']){
		case 'details':	
			require 'controller/pages/controller_single_post.php';
			break;
		case 'editauthor':
			require 'controller/pages/controller_form_update_author.php';
			break;
		case 'login':
			require 'views/login.php';
			break;
		case 'admin':
			require 'controller/pages/controller_admin.php';
			break;	
		case 'createauthor':
			require 'controller/pages/controller_form_insert_author.php';
			break;
		case 'createpost':
			require 'controller/pages/controller_form_insert_post.php';
			break;
		case 'editpost':
			require 'controller/pages/controller_form_update_post.php';
			break;
		case 'createcategory':
			require 'controller/pages/controller_form_insert_category.php';
			break;	
		case 'editcategory':
			require 'controller/pages/controller_form_update_category.php';
			break;
		case 'sort-by-categories':
			require 'controller/pages/controller_list_post_category.php';
			break;	
		case 'sort-by-authors':
			require 'controller/pages/controller_list_post_author.php';
			break;		
	}
}
else{
	require 'controller/pages/controller_list_post.php';
}
	require('views/footer.php');
?>