<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">	
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://gitcdn.xyz/repo/thesmart/jquery-scrollspy/0.1.3/scrollspy.js"></script>
	<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
	<script type="text/javascript" src="js/script.js"></script>
	<link rel="icon" type="image/png" href="favicon.png" />
	<title><?php if (isset ($_GET['page'])) {
		echo $_GET['page'];
	} else {
		echo "Home";
	} ?>
	</title>
</head>
<body>
	<header class="d-flex">		
		<div class="dropdown">
			<button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu3" data-toggle="dropdown"
			aria-haspopup="true" aria-expanded="false">
			<div id="profil_icon" class="p-3">
				<?php

						if (isset($_SESSION['id'])) {
				?>
							<div><img class="img-responsive user-photo" src="<?php echo ($_SESSION['avatar']) ?>"></div>

				<?php		} else{ 
				?>

							<i class="fas fa-user fa-2x"></i>
				<?php		
			}
				?>
					
			</div>
		</button>
		<div class="dropdown-menu" aria-labelledby="dropdownMenu3">
			<?php

				if (isset($_SESSION['id'])&&($_SESSION['level']=='1')){
					echo '<h6 class="dropdown-header">Bonjour ' .utf8_encode($_SESSION['firstname']).'</h6>
					<a class="dropdown-item" href="admin">Administrer</a>
					<a class="dropdown-item" href="logout">Se déconnecter</a>';
				} else if (isset($_SESSION['id'])){ 
					echo '<h6 class="dropdown-header">Bonjour ' .utf8_encode($_SESSION['firstname']).'</h6>
					<a class="dropdown-item" href="account">Modifier mon compte</a>
					<a class="dropdown-item" href="logout">Se déconnecter</a>';
				} else {
					echo '<a class="dropdown-item" href="login">Se connecter</a>';
				}
				
			?>
			
		</div>
	</div>
	<?php
		if (isset($_SESSION['id'])){
	?>
			<div class="d-flex justify-content-between align-items-center ml-3">
			<a href="create-post"><button type="button" class="btn btn-success btn-rounded mr-2 p-3"><i class="fas fa-pen"></i> Ecrire un nouvel article</button></a>
			
			<?php } else{

			}

			?>
	
	<div id="logo">
		<a href="index.php"><img src="img/logo_food.png"></a>
	</div>

</header>

