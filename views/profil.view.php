<?php
$title = "Accueil";
require ('partials/header.php');
require ('partials/nav.php'); ?>

    <div class="container">
        <div class="card bg-dark">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body bg-secondary">
                                <div class="list-group">
                                    <a href="#" class="list-group-item list-group-item-dark active"><i class="fas fa-eye"></i> Votre Profil</a>
                                    <a href="#editprofil" class="list-group-item list-group-item-dark" data-toggle="modal" data-target="#editprofil"><i class="fas fa-user-edit"></i> Modifier le profil</a>
                                    <!-- Modal -->
                                    <div class="modal fade" id="editprofil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content" style="background:#d7d8d8;">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Mise a jour du profil</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">✘</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="" method="POST">
                                                        <!-- pseudo field -->
                                                        <div class="form-group">
                                                            <label for="pseudo" class="font-weight-bold">Pseudo : </label>
                                                            <input type="text" name="pseudo" value="<?= get_input($results->pseudo) ?>" id="pseudo" class="form-control" placeholder="Votre nouveau pseudo" required="required">
                                                        </div>
                                                        <!-- email field -->
                                                        <div class="form-group">
                                                            <label for="email" class="font-weight-bold">E-mail : </label>
                                                            <input type="text" name="email" value="<?= get_input($results->email) ?>" id="email" class="form-control" placeholder="Votre nouvel e-mail" required="required">
                                                        </div>
                                                        <!-- sexe field -->
                                                        <div class="form-group">
                                                            <label for="sexe" class="font-weight-bold">Sexe : </label>
                                                            <select class="form-control col-md-4" id="exampleFormControlSelect1" name="sexe">
                                                                <option value="Masculin" <?= ($results->sexe == "Masculin") ? "selected = 'selected'" : "" ?>>Masculin</option>
                                                                <option value="Feminin" <?= ($results->sexe == "Feminin") ? "selected = 'selected'" : "" ?>>Feminin</option>
                                                            </select>
                                                        </div>
                                                        <!-- date field -->
                                                        <div class="form-group">
                                                            <label for="date" class="font-weight-bold">Date : </label>
                                                                <?php $dat = date("Y-m-d", strtotime($results->date_nais)); ?>
                                                            <input type="date" name="date" value="<?= $dat; ?>" id="date" class="form-control col-md-7" required="required">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="description" class="font-weight-bold">Décrivez vous : </label>
                                                            <textarea cols="30" rows="6" name="description" class="form-control" placeholder="Quelque chose sur vous !"><?= get_input($results->about_you) ?></textarea><br/>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="reset" class="btn btn-dark" data-dismiss="modal">Annulé ✘</button>
                                                            <input type="submit" name="submit_profil" value="Confirmer ✓" class="btn btn-primary">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="#password" class="list-group-item list-group-item-dark" data-toggle="modal" data-target="#password"><i class="fas fa-key"></i> Mot de passe</a>
                                    <!-- Modal -->
                                    <div class="modal fade" id="password" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content"  style="background:#d7d8d8;">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Modifier le password</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">✘</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="POST" action="">
                                                        <!-- password field -->
                                                        <div class="form-group">
                                                            <label for="password" class="font-weight-bold"><i class="fas fa-unlock-alt"></i> Mot de passe Actuel : </label>
                                                            <input type="password" name="password" id="password" class="form-control" placeholder="Votre mot de passe actuel" required="required">
                                                        </div>
                                                        <!-- newpassword field -->
                                                        <div class="form-group">
                                                            <label for="new_password" class="font-weight-bold"><i class="fas fa-unlock-alt"></i> Nouveau mot de passe : </label>
                                                            <input type="password" name="new_password" id="new_password" class="form-control" placeholder="Votre nouveau mot de passe" required="required">
                                                        </div>
                                                        <!-- newpasswordconfir field -->
                                                        <div class="form-group">
                                                            <label for="new_password_confirm" class="font-weight-bold"><i class="fas fa-unlock-alt"></i> Confirmer nouveau mot de passe : </label>
                                                            <input type="password" name="new_password_confirm" id="new_password_confirm" class="form-control" placeholder="Votre nouveau mot de passe" required="required">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-dark" data-dismiss="modal">Annulé ✘</button>
                                                            <input type="submit" name="submit_pass" value="Confirmer ✓" class="btn btn-primary">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="#photoprofil" class="list-group-item list-group-item-dark" data-toggle="modal" data-target="#photoprofil"><i class="fas fa-image"></i> Photo de profil</a>
                                    <!-- Modal -->
                                    <div class="modal fade" id="photoprofil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content"  style="background:#d7d8d8;">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Modifier photo de profil</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">✘</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="POST" action="" enctype="multipart/form-data">
                                                        <span class="lead text-success">Modifier votre photo</span><br>
                                                        <?php if (isset($results->avatar)): ?>
                                                            <img src="assets/img/<?= $results->avatar; ?>" width="50" height="50">
                                                        <?php else: ?>
                                                            <i class="fas fa-user-tie fa-5x" ></i>
                                                        <?php endif; ?>
                                                        <br><br>
                                                        <input type="file" name="photo" >
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-dark" data-dismiss="modal">Annulé ✘</button>
                                                            <input type="submit" value="Confirmer ✓" name="submit_img" class="btn btn-primary">
                                                        </div>
                                                    </>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-body jumbotron" style="padding-top: 15px; padding-bottom: 15px; margin: 0px;">
                                <span class="card-title lead text-center">Information sur <span class="text-primary"><?= $results->pseudo; ?></span></span> <br><br>
                                <?php if (isset($results->avatar)): ?>
                                    <img src="assets/img/<?= $results->avatar; ?>" width="70" height="70">
                                <?php else: ?>
                                    <i class="fas fa-user-tie fa-5x" ></i>
                                <?php endif; ?>
                                <br><br>
                                <div class="alert alert-dark border border-dark" role="alert">
                                    <ul>
                                        <li><span class="font-weight-bold">Email <i class="fas fa-hand-point-right"></i></span> <a href="mailto:<?= $results->email; ?>"><?= $results->email; ?> </a></li>
                                        <li><span class="font-weight-bold">Sexe <i class="fas fa-hand-point-right"></i></span> <?= !isset($results->sexe) ? "Non defini ..." : $results->sexe; ?></li>
                                        <li><span class="font-weight-bold">Niveau <i class="fas fa-hand-point-right"></i></span> <?php set_level($results->niveau); ?>
                                        <li><span class="font-weight-bold">Nbre de sms suivie <i class="fas fa-hand-point-right"></i></span> <?php sms_suivie($_SESSION['id']) ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require ('partials/footer.php'); ?>