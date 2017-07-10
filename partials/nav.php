    <!--banner-->
    <section id="<?= idBanner() ?>" class="banner">
      <div class="bg-color<?= bgColor() ?>">
        <nav class="navbar navbar-default navbar-fixed-top">
          <div class="container">
            <div class="col-md-12">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbarResponsive">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Journal M-A-I</a>
              </div>
              <div class="collapse navbar-collapse navbar-right" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">

                  <?php if (logged()): ?> 
                    <li class="<?= class_active('home') ?>">
                      <a href="?page=home&id=<?= $_SESSION['user_id']?>">Accueil</a>
                    </li>

                    <?php if (logged() AND $user->role == "roleUser"): ?>
                      <li class="<?= class_active('journal') ?>">
                        <a href="?page=journal&id=<?= $_SESSION['user_id']?>">Journal de bord</a>
                      </li>
                    <?php endif; ?>

                    <li class="dropdown <?= class_active('account') ?><?= class_active('update-account') ?>">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Profil <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <?php if ($user->role == "roleUser"): ?>
                          <li>
                           <a href="?page=add-medic&id=<?= $_SESSION['user_id']?>">Ajouter médecin</a>
                         </li>
                       <?php endif; ?>

                        <?php if ($user->role != "roleAdmin"): ?>
                       <li>
                         <a href="?page=update-account&id=<?= $_SESSION['user_id']?>">Modifier mon profil</a>
                       </li>
                       <?php endif; ?>
                     </ul>
                   </li>
                   <li><a href="?page=logout">Se déconnecter</a></li>

                 <?php else: ?>
                  <li><a href="#" data-toggle="modal" data-target="#loginModal"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Connexion</a></li>
                  <li><a href="#" data-toggle="modal" data-target="#registerModal"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Inscription</a></li>
                <?php endif; ?>

              </ul>
            </div>
<!-- menu responsive--><div id="resp">
<div class="collapse navbar-collapse navbar-right" id="myNavbarResponsive">
  <ul class="nav navbar-nav navbar-right navbar-responsive">

    <?php if (logged()): ?> 
      <li class="<?= class_active('home') ?>">
        <a href="?page=home&id=<?= $_SESSION['user_id']?>" class="text-center">Accueil</a>
      </li>

      <?php if (logged() AND $user->role == "roleUser"): ?>
        <li class="<?= class_active('journal') ?>">
          <a href="?page=journal&id=<?= $_SESSION['user_id']?>" class="text-center">Journal de bord</a>
        </li>
      <?php endif; ?>

      <?php if ($user->role == "roleUser"): ?>
        <li class="<?= class_active('add-medic') ?>">
         <a href="?page=add-medic&id=<?= $_SESSION['user_id']?>" class="text-center">Ajout médecin</a>
       </li>
     <?php endif; ?>

     <li class="<?= class_active('update-account') ?>">
       <a href="?page=update-account&id=<?= $_SESSION['user_id']?>" class="text-center">Mon profil</a>
     </li>
 <li><a href="?page=logout" class="text-center">Se déconnecter</a></li>
   </ul>

</div>
<?php endif; ?>

<!-- fin menu responsive-->

          </div>
        </div>
      </nav> 
      <!--/ banner-->

