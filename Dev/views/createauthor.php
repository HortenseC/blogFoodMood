

<section class="container">
	<form enctype="multipart/form-data" method="post" action="created-author" class="border border-light p-5 m-5 form_register">

		<h2 class="mb-4 text-center">Nouvel auteur</h2>

		<input type="text" name="firstname" id="defaultRegisterFormLastName" class="form-control mb-3" placeholder="Prénom">

		<input type="text" name="lastname" id="defaultRegisterFormFirstName" class="form-control mb-3" placeholder="Nom">


		<input type="email" name="email" id="defaultRegisterFormEmail" class="form-control mb-3" placeholder="E-mail">

		<input type="password" name="password" id="defaultRegisterFormPassword" class="form-control" placeholder="Mot de passe" aria-describedby="defaultRegisterFormPasswordHelpBlock">

		<input class="form-control mt-3 mb-3" type="text" name="level" placeholder="Niveau d'autorisation">

		<p>Choisissez un avatar :</p>

		<input class="btn btn-info mb-3" type="file" name="uploaded_avatar">


		<button class="btn btn-info my-4 btn-block" type="submit">Enregistrer</button>

	</form>

</section>

