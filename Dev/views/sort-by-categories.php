<main>
	<div class="row text-center">
		<div class="col-12 en_tete">
			<h1>Bienvenue sur<br><span>FOOD MOOD</span></h1>
			<p class="mx-auto p-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		</div>
	</div>

	<div class="text-center p-2 mt-5">
		<h2><?php echo utf8_encode($cat['name']); ?></h2>
	</div>

	<div class="d-flex">
		<div class="category ml-3">
			<ul class="list-group">
				<?php foreach ($posts_cat as  $value) { ?>
				<a href="sort-category-<?php echo $value['id']; ?>"><li class="list-group-item">
   				 <?php echo utf8_encode($value['name']); ?>
    			<span class="badge badge-primary badge-pill float-right"><?php echo $value['count(*)']; ?></span>
  				</li></a>
				</ul>
				<?php } ?>
 			</ul>
		</div>
	<div class="container">
		<!-- Section: Blog v.1 -->
		<section class="my-5">

			<?php

			foreach ($post_per_cat as $datas) {    	

				?>
				<!-- Grid row -->
				<div class="row wow slideInRight mb-5" data-wow-duration="1s" data-wow-delay="0.5s">

					<!-- Grid column -->
					<div class="col-lg-5">

						<!-- Featured image -->
						<div class="view overlay rounded z-depth-2 mb-lg-0 mb-4">
							<img class="img-fluid" src="<?php echo $datas['image'] ?>" alt="Sample image">
							<a>
								<div class="mask rgba-white-slight"></div>
							</a>
						</div>

					</div>
					<!-- Grid column -->

					<!-- Grid column -->
					<div class="col-lg-7">

						<!-- Category -->
						<a href="#!" class="green-text">
							<h6 class="font-weight-bold mb-3"><i class="fas fa-utensils pr-2"></i><?php echo utf8_encode($datas['name']) ?></h6>
						</a>
						<!-- Post title -->
						<h3 class="font-weight-bold mb-3"><strong><?php echo utf8_encode($datas['title']) ?></strong></h3>
						<!-- Excerpt -->
						<p><?php echo substr($datas['content'],0,500);  ?></p>
						<!-- Post data -->
						<p>par <a><strong><?php echo utf8_encode($datas['firstname']) ?> <?php echo utf8_encode($datas['lastname']) ?></strong></a>, le <?php echo date('d-m-Y', strtotime($datas['created_date'])) ?></p>
						<!-- Read more button -->
						<a href="post-<?php echo $datas['id'] ?>" class="btn btn-success btn-md bg-primary text-white">Lire la suite</a>

						<?php

						if (isset($_SESSION['id'])&&($_SESSION['level'])=='1'){
							?>
							<div class="d-flex justify-content-end">
								<a href="edit-post-<?php echo $datas['id']?>"><button type="button" class="btn btn-primary btn-rounded mr-2"><i class="fas fa-edit"></i> Editer</button></a>							<!-- bouton qui lance pop up supression-->
								<button type="button" class="btn btn-danger btn-rounded" data-toggle="modal" data-target="#modalConfirmDelete-<?php echo $datas['id']; ?>"><i class="fas fa-trash-alt"></i>Supprimer</button>
							</div>


							<!--pop up: ConfirmDelete-->
							<div class="modal fade" id="modalConfirmDelete-<?php echo $datas['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
							aria-hidden="true">
							<div class="modal-dialog modal-sm modal-notify modal-danger" role="document">
								<!--Content-->
								<div class="modal-content text-center">
									<!--Header-->
									<div class="modal-header d-flex justify-content-center">
										<p class="heading">Voulez-vous suprimer cet article?</p>
									</div>

									<!--Body-->
									<div class="modal-body">

										<i class="fas fa-times fa-4x animated rotateIn"></i>

									</div>

									<!--Footer-->
									<div class="modal-footer flex-center">
										<a href="delete-post-<?php echo $datas['id']?>" class="btn  btn-outline-danger">Oui</a>
										<a type="button" class="btn  btn-danger waves-effect" data-dismiss="modal">Non</a>
									</div>
								</div>
								<!--/.Content-->
							</div>
						</div>
						<!--pop up: ConfirmDelete-->
						<?php
					} else if (isset($_SESSION['id']) && ($_SESSION['id']==$datas['id_author'])){
						?>
						
						<div class="d-flex justify-content-end">
							<a href="edit-post-<?php echo $datas['id']?>"><button type="button" class="btn btn-primary btn-rounded mr-2"><i class="fas fa-edit"></i> Editer</button></a>
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
										<a href="delete-post-<?php echo $datas['id']?>" class="btn  btn-outline-danger">Oui</a>
										<a type="button" class="btn  btn-danger waves-effect" data-dismiss="modal">Non</a>
									</div>
								</div>
								<!--/.Content-->
							</div>
						</div>
						<!--pop up: ConfirmDelete-->	

						<?php		
					} else {}
					?>

				</div>
				<!-- Grid column -->

			</div>
			<!-- Grid row -->

			<!-- Grid row -->
			<?php
		}

		?>
	</div>

	</div>
	<!-- Section: Blog v.1 -->
</section>

