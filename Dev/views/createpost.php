<?php

if (isset($_SESSION['id'])){

?>
<section class="container">
	<form  enctype="multipart/form-data" method="post"  action="created-post" class="border border-light p-5 m-5 form_register">
		<div><?php echo $message; ?></div>
		<h2 class="mb-4 text-center">Créer un article</h2>

		<input type="text" name="title" id="defaultRegisterFormFirstName" class="form-control mb-3"  placeholder="Titre de l'article">

		<select name="author" class="browser-default custom-select  mb-3">
		<option selected>Choisir l'auteur</option>
		<?php

		foreach ($all_authors as $datas) {
			echo '
			<option value=" '.$datas['id']. '"> ' .utf8_encode($datas['firstname']). ' ' .utf8_encode($datas['lastname']).' </option>';
		}
		
		?>
		</select> 

		<select name="category" class="browser-default custom-select  mb-3">
		<option selected>Choisir la catégorie</option>
		<?php

		foreach ($all_categories as $datas) {
			echo '
			<option value=" '.$datas['id']. '"> ' .utf8_encode($datas['name']). '</option>
		 ';
		}
		
		?>
		</select> 
		<textarea class="form-control rounded-0 mb-3" name="content" id="exampleFormControlTextarea1" rows="10"   placeholder="Votre article"></textarea>

		<input class="btn btn-info m-3" type="file" name="uploaded_file">

		<button class="btn btn-info my-4 btn-block" type="submit">Publier</button>

	
	</form>

</section>

<?php

}

?>