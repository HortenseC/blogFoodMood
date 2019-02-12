
<main>

	<div class="container">

		<h2 class="display-4 text-center text-white mt-5"><?php echo utf8_encode($post['title']) ?></h2>
		<div class="mt-5 d-flex align-items-center mb-3">
			<img class="post_image" src="<?php echo $post['image'] ?>">
			
		</div>
		<div class="col-lg-12 post_content mb-5 p-5">
			<a href="sort-category-<?php echo ($post['id_cat']) ?>" class="green-text">
				<h3 class="font-weight-bold mb-3"><i class="fas fa-utensils pr-2"></i><?php echo utf8_encode($post['name']) ?></h3>	</a>
				<p>par <a href="sort-authors-<?php echo $post['id_author'] ?>"><strong><?php echo utf8_encode($post['firstname']) ?> <?php echo utf8_encode($post['lastname']) ?></strong></a>, le <?php echo date('d-m-Y', strtotime($post['created_date'])) ?></p>
				<p><?php echo utf8_encode($post['content']) ?></p>

				<?php

				if (isset($_SESSION['id'])&&($_SESSION['level'])=='1'){
					?>
					<div class="d-flex justify-content-end">
						<a href="edit-post-<?php echo $post['id']?>"><button type="button" class="btn btn-primary btn-rounded mr-2"><i class="fas fa-edit"></i> Editer</button></a>
						<!-- bouton qui lance pop up supression-->
						<button type="button" class="btn btn-danger btn-rounded" data-toggle="modal" data-target="#modalConfirmDelete-<?php echo $post['id']; ?>"><i class="fas fa-trash-alt"></i>Supprimer</button>
					</div>


					<!--pop up: ConfirmDelete-->
					<div class="modal fade" id="modalConfirmDelete-<?php echo $post['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
						aria-hidden="true">
						<div class="modal-dialog modal-sm modal-notify modal-danger" role="document">
							<!--Content-->
							<div class="modal-content text-center">
								<!--Header-->
								<div class="modal-header d-flex justify-content-center">
									<p class="heading">Voulez-vous supprimer cet article?</p>
								</div>

								<!--Body-->
								<div class="modal-body">

									<i class="fas fa-times fa-4x animated rotateIn"></i>

								</div>

								<!--Footer-->
								<div class="modal-footer flex-center">
									<a href="delete-post-<?php echo $post['id']?>" class="btn  btn-outline-danger">Oui</a>
									<a type="button" class="btn  btn-danger waves-effect" data-dismiss="modal">Non</a>
								</div>
							</div>
							<!--/.Content-->
						</div>
					</div>
					<!--pop up: ConfirmDelete-->	
					<?php
				} else if (isset($_SESSION['id'])&&($_SESSION['id']==$post['id_author'])){
					?>

					<div class="d-flex justify-content-end">
						<a href="edit-post-<?php echo $post['id']?>"><button type="button" class="btn btn-primary btn-rounded mr-2"><i class="fas fa-edit"></i> Editer</button></a>
						<!-- bouton qui lance pop up supression-->
						<button type="button" class="btn btn-danger btn-rounded" data-toggle="modal" data-target="#modalConfirmDelete"><i class="fas fa-trash-alt"></i>Supprimer</button>
					</div>


					<!--pop up: ConfirmDelete-->
					<div class="modal fade" id="modalConfirmDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
					aria-hidden="true">
					<div class="modal-dialog modal-sm modal-notify modal-danger" role="document">
						<!--Content-->
						<div class="modal-content text-center">
							<!--Header-->
							<div class="modal-header d-flex justify-content-center">
								<p class="heading">Voulez-vous supprimer cet article?</p>
							</div>

							<!--Body-->
							<div class="modal-body">

								<i class="fas fa-times fa-4x animated rotateIn"></i>

							</div>

							<!--Footer-->
							<div class="modal-footer flex-center">
								<a href="delete-post-<?php echo $post['id']?>" class="btn  btn-outline-danger">Oui</a>
								<a type="button" class="btn  btn-danger waves-effect" data-dismiss="modal">Non</a>
							</div>
						</div>
						<!--/.Content-->
					</div>
				</div>
				<!--pop up: ConfirmDelete-->	
				<?php		
			} else{}
			?>
		</div>
	</div>

	<?php

	if (isset($_SESSION['id'])){

		?>
		<section class="container">
			<form method="post"  action="created-comment-<?php echo $post['id']?>" class="border border-light p-5 m-5 form_register">

				<h2 class="mb-4 text-center">Ecrire un commentaire</h2>


				<textarea class="form-control rounded-0 mb-3" name="comment_content" id="exampleFormControlTextarea1" rows="10"   placeholder="Votre commentaire"></textarea>

				<input type="hidden" name="id_post" value="<?php echo $post['id']?>">
				<input type="hidden" name="id_author" value="<?php echo $_SESSION['id']?>">


				<button class="btn btn-info my-4 btn-block" type="submit">Publier</button>
			</form>

		</section>

		<?php

	}

	?>

	<div class="row">
		<div class="col-12 text-center text-white">
			<h3><?php echo ($comments_number['count(*)']) ?> Commentaire(s)</h3>

		</div><!-- /col-sm-12 -->
	</div><!-- /row -->
	<?php foreach ($list_comments as $value) { ?>

		<div class="container">

			<div class="row  d-flex">
				<div class="col-sm-5 post_content mb-2 d-flex">
					

					<div class="col-3">
						<div class="thumbnail">
							<img class="img-responsive user-photo" src="<?php echo ($value['avatar']) ?>">
						</div>
						<!-- /thumbnail -->
					</div><!-- /col-sm-1 -->

					<div class="panel panel-default">

						<div class="panel-heading">


							<strong>Par <?php echo utf8_encode($value['firstname']) ?> <?php echo utf8_encode($value['lastname']) ?></strong> <br/><span class="text-muted">Le : <?php echo date('d-m-Y', strtotime($value['created_comment_date'])) ?></span>
						</div>
						<div class="panel-body">
							<?php echo utf8_encode($value['comment_content']) ?>
						</div><!-- /panel-body -->
					</div><!-- /panel panel-default -->
					<?php

					if (isset($_SESSION['id'])&&($_SESSION['level'])=='1'||($_SESSION['id'])==$value['id_author']){
						?>
						<button type="button" class="btn btn-danger btn-rounded h-25 ml-5" data-toggle="modal" data-target="#modalConfirmDelete-<?php echo $value['id']; ?>"><i class="far fa-times-circle"></i></button>

						<!--pop up: ConfirmDelete-->
							<div class="modal fade" id="modalConfirmDelete-<?php echo $value['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
							aria-hidden="true">
							<div class="modal-dialog modal-sm modal-notify modal-danger" role="document">
								<!--Content-->
								<div class="modal-content text-center">
									<!--Header-->
									<div class="modal-header d-flex justify-content-center">
										<p class="heading">Voulez-vous supprimer ce commentaire?</p>
									</div>

									<!--Body-->
									<div class="modal-body">

										<i class="fas fa-times fa-4x animated rotateIn"></i>

									</div>

									<!--Footer-->
									<div class="modal-footer flex-center">
										<a href="delete-comment-<?php echo($value['id']); ?>-<?php echo($value['id_post']); ?>" class="btn  btn-outline-danger">Oui</a>
										<a type="button" class="btn  btn-danger waves-effect" data-dismiss="modal">Non</a>
									</div>
								</div>
								<!--/.Content-->
							</div>
						</div>
						<!--pop up: ConfirmDelete-->	

						<?php
					} else{

					}
					?>
				</div><!-- /col-sm-5 -->
			</div><!-- /row -->

		</div><!-- /container -->
	<?php } 
	?>
	<div class="container d-flex justify-content-between">

		<a href="index.php?page=details&id=<?php echo $post['id']-1 ?>"><i class="fas fa-backward fa-2x p-3"></i>Précédent</a>
		<a href="index.php?page=details&id=<?php echo $post['id']+1 ?>">Suivant<i class="fas fa-forward fa-2x p-3"></i></a>
	</div>

	<div class="d-flex justify-content-end">
		<a href="index.php">Retour à la liste des articles<i class="fas fa-home fa-2x p-3"></i></a>
	</div>
	
</main>








