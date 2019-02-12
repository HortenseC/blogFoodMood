<?php
$mail=search_email($bdd, $_POST['email']);
			if ($mail) {
				echo 'Mail déjà utilisé';
			} else {
			create_author($bdd, $_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['password'], $_POST['level'], $_FILES['uploaded_avatar']);
			$all_authors=search_all_authors($bdd);
			$all_posts=PostQuery::search_all_posts($bdd);	
			header("location: admin");}

?>