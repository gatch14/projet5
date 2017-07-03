    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Code</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">

            <?php if (logged()): ?> 
              <li class="<?= class_active('home') ?>">
                <a href="?page=home&id=<?= $_SESSION['user_id']?>">Accueil</a>
              </li>

              <?php if ($user->role == "roleUser"): ?>
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
                    <li>
                       <a href="?page=update-account&id=<?= $_SESSION['user_id']?>">Modifier mon profil</a>
                    </li>
                  </ul>
              </li>
              <li><a href="?page=logout">Se déconnecter</a></li>

              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="account.php?id=<?= $_SESSION['user_id']?>">Compte</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li role="separator" class="divider"></li>
                    <li class="dropdown-header">Nav header</li>
                    <li><a href="#">Separated link</a></li>
                    <li><a href="?page=logout">Se déconnecter</a></li>
                  </ul>
              </li>

            <?php else: ?>
              <li class="<?= class_active('login') ?>"><a href="?page=login">Login</a></li>
              <li class="<?= class_active('register') ?>"><a href="?page=register">Inscription</a></li>
            <?php endif; ?>

          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>