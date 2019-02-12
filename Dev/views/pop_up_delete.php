<!-- bouton qui lance pop up supression-->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalConfirmDelete">Suprimer</button>

<!--pop up: ConfirmDelete-->
<div class="modal fade" id="modalConfirmDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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