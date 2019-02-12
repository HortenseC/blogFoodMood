

<section class="container">
	<form  method="post" action="edited-category-<?php echo utf8_encode($cat['id']) ?>" class="border border-light p-5 m-5 form_register">

		<h2 class="mb-4 text-center">Modifier cette catégorie</h2>
		<input type="hidden" name="id" value="<?php echo utf8_encode($cat['id']) ?>">

		<input type="text" name="name" id="defaultRegisterFormLastName" class="form-control mb-3" value="<?php echo utf8_encode($cat['name']) ?>">		


		<button class="btn btn-info my-4 btn-block" type="submit">Enregistrer</button>

	</form>

</section>