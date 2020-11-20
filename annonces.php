<?php 

$is_annonces = true;

require 'header.php';

use App\Controllers\AdsController;
use App\Entities\Session;

require __DIR__ . '/vendor/autoload.php';

$controller = new AdsController();
$Session = new Session();

?>

<!-- Breadcrumb -->
<div class="container">
    <div class="row">
        <div class="col-12 d-flex align-items-center">
            <span class="gray">Annonces</span>
            <button class="btn btn-add" data-toggle="modal" data-target="#addModal">+</button>
        </div>
        </div>

    </div>
</div>

<!-- Content -->
<div class="container">
    <?php $Session->flash(); ?>
    <div class="row mt-4">
        <div class="col-12">         
        <?php 

            $ads = $controller->getAds();
            foreach ($ads as $ad) { ?>
            
            <div class="annonce-box">
                <div class="row">
                    <div class="col-12">
                        #<span class="id"><?= $ad->getId(); ?></span><h2><?= $ad->getTitle(); ?></h2>
                    </div>
                    <div class="col-10">
                        <p><?= $ad->getDescription(); ?></p>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-3">
                                <span class="id">user_id: <?= $ad->getUserId(); ?></span>
                                <span class="id">car_id: <?= $ad->getCarId(); ?></span>
                            </div>
                            <div class="col-9 text-right">
                                <a class="pl-4" href="#" data-toggle="modal" data-target="#updateModal">Modifier l'annonce</a>
                                <a class="pl-4 text-danger" href="#!" data-toggle="modal" data-target="#deleteModal">Supprimer l'annonce</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <?php } //endforeach ?>
                
        </div>
    </div>
</div>


<!-- Modal add -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Créer une annonce</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form method="post" action="ads_create.php" name ="adsCreateForm">
            <div class="form-group">
                <label for="title">Titre</label>
                <input class="form-control" type="text" name="title" id="title">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" id="description"></textarea>
            </div>
            <div class="form-group">
                <label for="user_id">Identifiant de l'utilisateur :</label>
                <input class="form-control" type="number" name="user_id" id="user_id">
            </div>
            <div class="form-group">
                <label for="car_id">Identifiant de la voiture :</label>
                <input class="form-control" type="number" name="car_id" id="car_id">
            </div>
            
            <div class="row">
                <div class="col-12 text-right">
                    <button type="submit" class="btn btn-success">Créer</button>
                    <button type="button" class="ml-2 btn btn-secondary" data-dismiss="modal">Fermer</button>
                </div>
            </div>    
            
            
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal update -->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLabel">
        
            Modifier l'annonce #
            
        
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">

        <form method="post" action="ads_update.php" name="adsUpdateForm" id="adsUpdateForm">
            <div class="form-group">
                <label for="id">Id de l'annonce que vous souhaitez modifier :</label>
                <input class="form-control" type="text" name="id">
            </div>
            <div class="form-group">
                <label for="title">Nouveau titre :</label>
                <input class="form-control" type="text" name="title">
            </div>
            <div class="form-group">
                <label for="description">Nouveau message :</label>
                <textarea class="form-control" name="description"></textarea>
            </div>
            <div class="form-group">
                <label for="user_id">Nouveau user_id :</label>
                <input class="form-control" type="text" name="user_id">
            </div>
            <div class="form-group">
                <label for="car_id">Nouveau car_id :</label>
                <input class="form-control" type="text" name="car_id">
            </div>
            <div class="row">
                <div class="col-12 text-right">
                    <button id="submit-update" type="submit" class="text-center btn btn-success" data-confirm="modal">Modifier</button>
                    <button type="button" class="ml-2 btn btn-secondary" data-dismiss="modal">Fermer</button>
                </div>
            </div>    
            
            
        </form>

      </div>

    </div>
  </div>
</div>

<!-- Modal delete -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Êtes-vous sûr ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-12">
                <p>Cette action supprimera toutes les réservation et les commentaires associés.</p>
            </div>
        </div>
        <form action="ads_delete.php" method="post" name="deleteAdForm" id="deleteAdForm">
                <div class="form-group">
                    <label for="id">Id de l'annonce que vous souhaitez effacer :</label>
                    <input type="text" name="id">
                </div>
        
      

            <div class="row">
                <div class="col-12 text-right">
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                    <button type="button" class="ml-2 btn btn-secondary" data-dismiss="modal">Annuler</button>
                </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>


<?php

require 'footer.php';

?>