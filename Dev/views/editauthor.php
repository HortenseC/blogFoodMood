

<section class="container">
	<form enctype="multipart/form-data" method="post" action="edited-author-<?php echo utf8_encode($author['id']) ?>" class="border border-light p-5 m-5 form_register">

		<h2 class="mb-4 text-center">Modifier l'auteur</h2>
		<input type="hidden" name="id" value="<?php echo utf8_encode($author['id']) ?>">

		<input type="text" name="firstname" id="defaultRegisterFormLastName" class="form-control mb-3" value="<?php echo utf8_encode($author['firstname']) ?>">

		<input type="text" name="lastname" id="defaultRegisterFormFirstName" class="form-control mb-3" value="<?php echo utf8_encode($author['lastname']) ?>">


		<input type="email" name="email" id="defaultRegisterFormEmail" class="form-control mb-3" value="<?php echo utf8_encode($author['email']) ?>">

		<input type="password" name="password" id="defaultRegisterFormPassword" class="form-control" value="<?php echo MD5($author['password']) ?>" aria-describedby="defaultRegisterFormPasswordHelpBlock">

		<input class="form-control mt-3 mb-3" type="text" name="level" value="<?php echo utf8_encode($author['level']) ?>">

		<p>Choisissez un avatar :</p>

		<input class="btn btn-info mb-3" type="file" name="uploaded_avatar" >


		<button class="btn btn-info my-4 btn-block" type="submit">Enregistrer</button>

	</form>

</section>