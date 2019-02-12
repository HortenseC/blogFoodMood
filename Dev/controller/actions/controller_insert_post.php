<?php
// on verifie si les variables post du formulaire existent et que la session existe
if ( isset($_POST['title']) && isset($_POST['content']) && isset($_POST['category']) && isset($_POST['author']) && isset($_FILES['uploaded_file']) && isset($_SESSION['id']) && isset($_SESSION['level']))
{
// si l'utilisateur est niveau 1 ou si il est l'auteur
	if ( ($_SESSION['level'] == '1')  || (($_SESSION['level'] != '1') && ($_SESSION['id'] == $_POST['author'])))
	{
// si les champs du formulaire ne sont pas vides
		if (strlen($_POST['title']) != 0 && strlen($_POST['content']) != 0 && strlen($_POST['author']) != 0 && strlen($_POST['category']) != 0)
		{
		

		PostQuery::create_post($bdd, $_POST['title'], $_POST['content'], $_POST['category'], $_POST['author'], $_FILES['uploaded_file']);

		require 'controller/pages/controller_list_post.php';

		}
		else
		{
			$message = "Merci de remplir tous les champs" ;
			require 'controller/pages/controller_form_insert_post.php';
		}
	}


	else 
	{
				$message = "vous n\'avez pas accés  à cette action : 01" ;
				require 'controller/pages/controller_list_post.php';
	}
}

else 
{
	$message = "vous n\'êtes pas autorisé à effectuer cette action : 02" ;
		require 'controller/pages/controller_list_post.php';
}


?>