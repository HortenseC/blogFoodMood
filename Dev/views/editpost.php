<?php

if (isset($_SESSION['id'])){

?>


<section class="container">
	<form  enctype="multipart/form-data" method="post"  action="edited-post-<?php echo utf8_encode($post['id']) ?>" class="border border-light p-5 m-5 form_register">

		<h2 class="mb-4 text-center">Editer un article</h2>

		<input type="hidden" name="id" value="<?php echo utf8_encode($post['id']) ?>">

		<input type="text" name="title" id="defaultRegisterFormFirstName" class="form-control mb-3" value="<?php echo utf8_encode($post['title']) ?>">

		<?php
		if($_SESSION['level']=='1'){
		?>
		<label name="author" class="form-control mb-3">Par : <?php echo utf8_encode($post['firstname']) ; ?> <?php echo utf8_encode($post['lastname']); ?></label>		
	
		<?php } else{}
		 ?>
		

		<select name="category" class="browser-default custom-select  mb-3">
		<option selected>Choisissez la catégorie</option>
		<?php
		foreach ($all_categories as $datas) {
			echo '
			<option value=" '.$datas['id']. '"> ' .utf8_encode($datas['name']). '</option>
		 ';
		}
		?>
		</select> 
		<textarea class="form-control rounded-0 mb-3" name="content" id="exampleFormControlTextarea1" rows="10"><?php echo utf8_encode($post['content']) ?></textarea>
		<input class="btn btn-info m-3" type="file" name="uploaded_file">
		
		<button class="btn btn-info my-4 btn-block" type="submit">Publier</button>
	</form>

</section>

<?php

}

?>