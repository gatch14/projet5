<?php $title = 'Journal de bord M-A-I'; ?>

<?php include('partials/header.php'); ?>    

<div class="flashMessage text-center col-sm-offset-2 col-sm-8">
            <?php
                include('partials/errors.php');
            ?>

            <?php include('partials/flash.php'); ?>      
            </div>

    <div class="container">
        <div class="row">
            <div class="banner-info">
                <div class="banner-text text-center">                       

                    <h1 class="white">5 minutes par jour suffisent!!</h1>
                    <p>Journal de bord pour les maladies auto-immunes. <br>2 formulaires à remplir par jour pour se souvenir de tout.</p>
                </div>
                <div class="overlay-detail text-center">
                   <a href="#service"><i class="fa fa-angle-down"></i></a>
               </div>     
           </div>
        </div>
    </div>
    </div>
</section>  

<!--service-->
<section id="service" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-4">
                <h2 class="ser-title">Fonctionnement</h2>
                <hr class="botm-line">
                <p>Le but est de permettre un suivi simple de votre état de santé au jour le jour en remplissant au moins le premier formulaire ( mois de 5 minutes par jour ). Le but est de rester simple le plus possible pour éviter toute contrainte tout en essayant de récolter les bonnes données pouvant être utiles.</p>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="service-info">
                    <div class="icon">
                        <i class="fa fa-stethoscope"></i>
                    </div>
                    <div class="icon-info">
                        <h4>Médecin</h4>
                        <p>Votre ou vos médecins pourra avoir accès à vos données si vous ajoutez son adresse email dans votre compte utilisateur.</p>
                    </div>
                </div>
                <div class="service-info">
                    <div class="icon">
                        <i class="fa fa-heart-o"></i>
                    </div>
                    <div class="icon-info">
                        <h4>Statistiques visuelles</h4>
                        <p>Pour le moment nous utilisons un code couleur simple: rouge, orange et vert.<br>Le code couleur sera visible sur un calendrier et vous permettra de voir a partir de quand votre état à commencer à changer.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="service-info">
                    <div class="icon">
                        <i class="fa fa-user-md"></i>
                    </div>
                    <div class="icon-info">
                        <h4>Se rassurer</h4>
                        <p>Certains symptômes peuvent revenir régulièrement et faire stresser l'utilisateur. La plupart du temps ces symptômes sont mineurs mais font quand même stresser le patient. Avec une trace du symptôme vous allez pouvoir vous souvenir que c'était mineur et éviter d'augmenter votre stress qui est néfaste.</p>
                    </div>
                </div>
                <div class="service-info">
                    <div class="icon">
                        <i class="fa fa-plus-square"></i>
                    </div>
                    <div class="icon-info">
                        <h4>Données anonymes</h4>
                        <p>Vos données vont pouvoir être exploitées par des data-analystes mais resteront anonymes.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ service-->
<!--cta 2-->
<section id="cta-2" class="section-padding">
    <div class="container">
        <div class=" row">
            <div class="col-md-2"></div>
            <div class="text-right-md col-md-4 col-sm-4">
              <h2 class="section-title white lg-line">« Quelques mots »</h2>
          </div>
          <div class="col-md-4 col-sm-5">
              Si vous avez une idée d'amélioration tout en restant dans l'objectif de simplicité mais de récolter des données pouvant servir à vous et à la recherche
              <p class="text-right text-primary"><i>— <a href="mailto:contact@123456.hosting1976.fr" class="text-primary">Envoyez nous un email</a></i></p>
          </div>
          <div class="col-md-2"></div>
      </div>
  </div>
</section>
<!--cta-->

<!-- register -->
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" >
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-info">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>                        
            </div>
            <div class="modal-body modal-spa">
                <div class="login-grids">
                    <div class="login-bottom">
                        <h3>Formulaire d'inscription</h3>

                        <form id="formRegister" method="post">
                            <!-- Champ role-->
                            <div class="sign-up">
                                <label class="control-label" for="role"><h4>Vous etes ?</h4></label>
                                <select name="role">
                                    <option value="roleUser">Utilisateur</option>
                                    <option value="roleMedic">Medecin</option>
                                </select>                                              
                            </div>
                            <!-- Champ pseudo -->
                            <div class="sign-up">
                                <label class="control-label" for="pseudo"><h4>Pseudo:</h4></label>
                                <input type="text" value="<?= input_data('pseudo') ?>" class="form-control" name="pseudo" id="pseudo" required="required">    
                            </div>
                            <!-- Champ email -->
                            <div class="sign-up">
                                <label class="control-label" for="email"><h4>Adresse email (pas de hotmail, les mails n'arrivent pas):</h4></label>
                                <input type="text" value="<?= input_data('email') ?>" class="form-control" name="email" id="email" required="required">    
                            </div>
                            <!-- Champ password -->
                            <div class="sign-up">
                                <label class="control-label" for="password"><h4>Mot de passe:</h4></label>
                                <input type="password" class="form-control" name="password" id="password" required="required">                                              
                            </div>
                            <!-- Champ password confirmation-->
                            <div class="sign-up">
                                <label class="control-label" for="password"><h4>Confirmer votre mot de passe:</h4></label>
                                <input type="password" class="form-control" name="password_confirm" id="password_confirm" data-parsley-equalto="#password"  required="required" >                                              
                            </div>
                            <div class="sign-up">
                                <input type="submit" value="inscription" name="register">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //register -->



<!-- login -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" >
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-info">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>                        
            </div>
            <div class="modal-body modal-spa">
                <div class="login-grids">

                    <div class="login-right">
                        <h3>Connectez vous</h3>

                        <form id="formLogin" method="post" >
                            <div class="sign-in">
                                <label class="control-label" for="identifiant"><h4>Pseudo ou adresse email:</h4></label>
                                <input type="text"  value="<?= input_data('identifiant') ?>" class="form-control" name="identifiant" id="identifiant" required="required">    
                            </div>
                            <div class="sign-in">
                                <label class="control-label" for="password"><h4>Mot de passe:</h4></label>
                                <input type="password" class="form-control" name="password" id="password" required="required">
                                <a href="index.php?page=password-recovery" class="text-muted pull-right">Mot de passe oublié?</a>
                            </div>
                            <div class="sign-in">
                                <input type="submit" value="Connexion" name="login">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //login -->
<?php include('partials/footer.php'); ?>