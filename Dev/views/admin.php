
<section class="container bg-white p-5 m-5 mx-auto" id="gestion_authors" >
	

<div class="wrapper-row-editor text-center">
	<h2>Administration des auteurs </h2>

  <div class="d-flex justify-content-center buttonWrapper flex-wrap">
    <a href="create-author"><button id="" class="btn btn-sm btn-teal btn-rounded btn-success addNewColumn m-3">Ajouter un auteur</button></a>
  </div>
<!--   <div class="closeByClick d-none"></div> -->
<!--   <div class="showForm d-none" style="position: fixed; top: 20%; left:50%; transform: translate(-50%, -50%); z-index: 1100;">
    <form class="text-center border border-light p-5" style="background: white;">
      <button type="button" class="close position-relative button-x" style="top:-12%; right: -5%">
        <span aria-hidden="true" class="text-danger">×</span>
      </button>
      <h3 class="h3 my-3 text-danger font-weight-bold">Delete</h3>
      <hr class="mt-2 mb-3">
      <p class="text-center h5 py-2 pb-3">Are you sure to delete selected rows?</p>
      <hr class="mt-2 mb-3">
      <div class="d-flex justify-content-center buttonYesNoWrapper">
        <button type="button" class="btn btn-danger btnYes btn-sm" data-dismiss="modal">Yes</button>
        <button type="button" class="btn btn-primary btnNo btn-sm" data-dismiss="modal">No</button>
      </div>
    </form>
  </div> -->
  <table id="dt-more-row-col" class="table table-striped table-bordered " cellspacing="0" width="100%">
    <thead>
      <tr>
        <th class="th-sm">Prénom
        </th>
        <th class="th-sm">Nom
        </th>
        <th class="th-sm">E-mail
        </th>
        <th class="th-sm">Niveau
        </th>
        <th class="th-sm">Avatar
        </th>
        <th class="th-sm">Gestion
        </th>
      </tr>
    </thead>

    <tbody>
    	<?php
    	foreach ($all_authors as $datas) {?>
		<tr>
        <td class="align-middle"><?php echo utf8_encode($datas['firstname']); ?></td>
        <td class="align-middle"><?php echo utf8_encode($datas['lastname']); ?></td>
        <td class="align-middle"><?php echo($datas['email']); ?></td>
        <td class="align-middle"><?php echo($datas['level']); ?></td>
        <td class="align-middle"><img  class="w-25 h-25" src="<?php echo($datas['avatar']); ?>"></td>
        <td class="align-middle"><a href="edit-author-<?php echo($datas['id']); ?>"><button id="" class="btn btn-sm btn-teal btn-primary btn-rounded addNewColumn">Editer</button></a>
        	<!-- bouton qui lance pop up supression-->
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
										<p class="heading">Voulez-vous supprimer cet auteur?</p>
									</div>

									<!--Body-->
									<div class="modal-body">

										<i class="fas fa-times fa-4x animated rotateIn"></i>

									</div>

									<!--Footer-->
									<div class="modal-footer flex-center">
										<a href="delete-author-<?php echo($datas['id']); ?>" class="btn  btn-outline-danger">Oui</a>
										<a type="button" class="btn  btn-danger waves-effect" data-dismiss="modal">Non</a>
									</div>
								</div>
								<!--/.Content-->
							</div>
						</div>
						<!--pop up: ConfirmDelete-->	
       </tr>
		<?php	
		}
		?>

      
    </tbody>

  </table>
</div>

</section>


<section class="container bg-white p-5 m-5 mx-auto" id="gestion_authors" >
	

<div class="wrapper-row-editor text-center">
	<h2>Administration des catégories </h2>

  <div class="d-flex justify-content-center buttonWrapper flex-wrap">
    <a href="create-category"><button id="" class="btn btn-sm btn-teal btn-rounded btn-success addNewColumn m-3">Ajouter une catégorie</button></a>
  </div>
<!--   <div class="closeByClick d-none"></div> -->
<!--   <div class="showForm d-none" style="position: fixed; top: 20%; left:50%; transform: translate(-50%, -50%); z-index: 1100;">
    <form class="text-center border border-light p-5" style="background: white;">
      <button type="button" class="close position-relative button-x" style="top:-12%; right: -5%">
        <span aria-hidden="true" class="text-danger">×</span>
      </button>
      <h3 class="h3 my-3 text-danger font-weight-bold">Delete</h3>
      <hr class="mt-2 mb-3">
      <p class="text-center h5 py-2 pb-3">Are you sure to delete selected rows?</p>
      <hr class="mt-2 mb-3">
      <div class="d-flex justify-content-center buttonYesNoWrapper">
        <button type="button" class="btn btn-danger btnYes btn-sm" data-dismiss="modal">Yes</button>
        <button type="button" class="btn btn-primary btnNo btn-sm" data-dismiss="modal">No</button>
      </div>
    </form>
  </div> -->
  <table id="dt-more-row-col" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th class="th-sm">Nom
        </th>
        <th class="th-sm">Gestion
        </th>
      </tr>
    </thead>

    <tbody>
    	<?php
    	foreach ($all_categories as $datas) { 
    		$cat_id = $datas['id'];
    		$cat_name = utf8_encode($datas['name']);
    		?>
		<tr>
        <td><?php echo $cat_name; ?></td>
        <td><a href="edit-category-<?php echo $cat_id; ?>"><button id="" class="btn btn-sm btn-teal btn-primary btn-rounded addNewColumn">Editer</button></a>

        				<!-- bouton qui lance pop up supression-->
							<button type="button" class="btn btn-danger btn-rounded" data-toggle="modal" data-target="#modalConfirmDeleteCategory-<?php echo $cat_id ?>"><i class="fas fa-trash-alt"></i>Supprimer</button>


							<!--pop up: ConfirmDelete-->
							<div class="modal fade" id="modalConfirmDeleteCategory-<?php echo $cat_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
							aria-hidden="true">
							<div class="modal-dialog modal-sm modal-notify modal-danger">
								<!--Content-->
								<div class="modal-content text-center">
									<!--Header-->
									<div class="modal-header d-flex justify-content-center">
										<p class="heading">Voulez-vous supprimer cette catégorie?</p>
									</div>

									<!--Body-->
									<div class="modal-body">

										<i class="fas fa-times fa-4x animated rotateIn"></i>

									</div>

									<!--Footer-->
									<div class="modal-footer flex-center">

										<a href="delete-category-<?php echo $cat_id; ?>" class="btn  btn-outline-danger">Oui</a>
										<a type="button" class="btn  btn-danger waves-effect" data-dismiss="modal">Non</a>
									</div>
								</div>
								<!--/.Content-->
							</div>
						</div>
						<!--pop up: ConfirmDelete-->	
      </td> </tr>
		<?php	
		}
		?>

      
    </tbody>

  </table>
</div>

</section>


<section class="container bg-white p-5 m-5 mx-auto" id="gestion_authors" >
	

<div class="wrapper-row-editor text-center">
	<h2>Administration des articles </h2>

  <div class="d-flex justify-content-center buttonWrapper flex-wrap">
    <a href="create-post"><button id="" class="btn btn-sm btn-teal btn-rounded btn-success addNewColumn m-3">Ajouter un article</button></a>
  </div>
<!--   <div class="closeByClick d-none"></div> -->
<!--   <div class="showForm d-none" style="position: fixed; top: 20%; left:50%; transform: translate(-50%, -50%); z-index: 1100;">
    <form class="text-center border border-light p-5" style="background: white;">
      <button type="button" class="close position-relative button-x" style="top:-12%; right: -5%">
        <span aria-hidden="true" class="text-danger">×</span>
      </button>
      <h3 class="h3 my-3 text-danger font-weight-bold">Delete</h3>
      <hr class="mt-2 mb-3">
      <p class="text-center h5 py-2 pb-3">Are you sure to delete selected rows?</p>
      <hr class="mt-2 mb-3">
      <div class="d-flex justify-content-center buttonYesNoWrapper">
        <button type="button" class="btn btn-danger btnYes btn-sm" data-dismiss="modal">Yes</button>
        <button type="button" class="btn btn-primary btnNo btn-sm" data-dismiss="modal">No</button>
      </div>
    </form>
  </div> -->
  <table id="dt-more-row-col" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th class="th-sm">Titre
        </th>
        <th class="th-sm">Catégorie
        </th>
        <th class="th-sm">Auteur
        </th>
        <th class="th-sm">Date de création
        </th>
        <th class="th-sm">Date de modification
        </th>
        <th class="th-sm">Image
        </th>
        <th class="th-sm">Gestion
        </th>
      </tr>
    </thead>

    <tbody>
    	<?php
    	foreach ($all_posts as $datas) {?>
		<tr>
        <td class="align-middle"><?php echo utf8_encode($datas['title']); ?></td>
        <td class="align-middle"><?php echo utf8_encode($datas['name']); ?></td>
        <td class="align-middle"><?php echo utf8_encode($datas['firstname'].' '.utf8_encode($datas['lastname'])); ?></td>
        <td class="align-middle"><?php echo date('d-m-Y', strtotime($datas['created_date'])) ?></td>
        <td class="align-middle"><?php echo date('d-m-Y', strtotime($datas['updated_date'])) ?></td>
        <td class="align-middle"><img src="<?php echo ($datas['image']); ?>"></td>
        <td class="align-middle"><a href="edit-post-<?php echo utf8_encode($datas['id']); ?>"><button id="" class="btn btn-sm btn-teal btn-primary btn-rounded addNewColumn mb-2">Editer</button></a>
        <!-- bouton qui lance pop up supression-->
								<button type="button" class="btn btn-danger btn-rounded" data-toggle="modal" data-target="#modalConfirmDeletePost-<?php echo $datas['id']; ?>"><i class="fas fa-trash-alt"></i>Supprimer</button>
						</div>


							<!--pop up: ConfirmDelete-->
							<div class="modal fade" id="modalConfirmDeletePost-<?php echo $datas['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
										<a href="delete-post-<?php echo($datas['id']); ?>" class="btn  btn-outline-danger">Oui</a>
										<a type="button" class="btn  btn-danger waves-effect" data-dismiss="modal">Non</a>
									</div>
								</div>
								<!--/.Content-->
							</div>
						</div>
						<!--pop up: ConfirmDelete-->
       </tr>
		<?php	
		}
		?>

      
    </tbody>

  </table>
</div>

</section>