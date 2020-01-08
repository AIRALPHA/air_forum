<?php
$title = "Forum ● Message";
require ('partials/header.php');
require ('partials/nav.php'); ?>

<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <table class="table table-striped" style="margin-bottom: 0px;">
                <thead>
                <tr>
                    <th><a href="like.php?t=<?= e($_GET['t']) ?>"><?= set_number_like($_GET['t']) ?> <i class="far fa-thumbs-up"></i></a> | <a href=""><i class="fas fa-share-alt"></i> Partager</a></th>
                    <th class="text-success pagination justify-content-end"><a href="profil.php" class="text-success"><?= $user_connect->pseudo ?></a></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <a href=""><?= $autor->pseudo; ?></a><br/>
                        <?php if (isset($autor->avatar)): ?>
                            <img src="assets/img/<?= $autor->avatar; ?>" width="50" height="50">
                        <?php else: ?>
                            <i class="fas fa-user-tie fa-5x" ></i>
                        <?php endif; ?>
                        <br>
                        <?php set_level($autor->niveau); ?><br/> Messages : <?php sms_suivie($autor->id) ?><br>
                        <?php $date_ins = date("F Y", strtotime($autor->create_at)) ?>
                        Inscription: <i class="fas fa-calendar-alt"></i> <?= $date_ins ?> <br>
                        Sexe: <?php if ($autor->sexe == "Masculin"): ?>
                                <i class="fas fa-male"></i>
                              <?php else: ?>
                                <i class="fas fa-female"></i>
                              <?php endif; ?>
                    </td>
                    <td>
                        <i class="fas fa-calendar-alt"></i> <?= $topic->date_creation; ?><br>
                        <a href="" class="lead"><?= $topic->sujet; ?></a> <br>
                        <div class="alert alert-dark border border-dark" style="margin-bottom: 0px;">
                            <p><?= $topic->contenu; ?></p>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <a href="#repondre" class="btn btn-outline-primary">Repondre <i class="fas fa-chevron-circle-right"></i></a>
                            </div>
                            <?php if($_SESSION['id'] == $topic->id_createur): ?>
                                <div class="col-md-4">
                                    <a href="edit.php?t=<?= $topic->id; ?>" class="btn btn-outline-primary"><i class='fas fa-edit'></i> Editer</a>
                                </div>
                            <?php elseif ($_SESSION['id'] == $topic->id_createur && $solved != 1): ?>
                                <div class="col-md-4">
                                    <a href="resolu.php?t=<?= $topic->id; ?>" class="btn btn-outline-primary"><i class='fas fa-toggle-on'></i> Sujet Resolu</a>
                                </div>
                            <?php endif; ?>
                            <?php if ($solved == 1): ?>
                                <div class="col-md-4">
                                    <div class="alert alert-success p-2">Ce sujet est resolue <i class="fas fa-check-square"></i></div>
                                </div>
                            <?php elseif ($_SESSION['id'] == $topic->id_createur && $solved != 1): ?>
                                <div class="col-md-4">
                                    <a href="resolu.php?t=<?= $topic->id; ?>" class="btn btn-outline-primary"><i class='fas fa-toggle-on'></i> Sujet Resolu</a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </td>
                </tr>
                <?php while ($r = $reponses->fetch(PDO::FETCH_OBJ)) { ?>
                <tr>
                    <?php $id = $r->id_posteur; ?>
                    <td>
                        <?= get_pseudo($id); ?>
                        <br>
                        <?php if (isset($r->avatar)): ?>
                            <img src="assets/img/<?= $r->avatar; ?>" width="45" height="45">
                        <?php else: ?>
                            <i class="fas fa-user-tie fa-3x" ></i>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?= $r->contenu ?>
                    </td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
            <nav aria-label="Page navigation example" style="margin-top: 0px;">
                <ul class="pagination justify-content-end">
                    <!--
                    <li class="page-item">
                        <a class="page-link" href="#"><i class="fas fa-backward"></i></a>
                    </li>-->
                    <?php for ($i=1; $i <= $pages_total ; $i++) { ?>
                    <li class="page-item"><a class="page-link" href="sms.php?t=<?= $id_topic ?>&page=<?= $i ?>"><?= $i ?></a></li>
                    <?php } ?>
                    <!--
                    <li class="page-item">
                        <a class="page-link" href="#"><i class="fas fa-forward"></i></a>
                    </li>-->
                </ul>
            </nav>
            <hr>
            <br>
            <i class="fab fa-php"></i>
            <i class="fab fa-python"></i>
            <i class="fab fa-java"></i>
            <i class="fab fa-css3"></i>
            <i class="fab fa-js"></i>
            <i class="fab fa-node"></i>
            <i class="fab fa-bootst"></i>
            <form method="POST" class="card alert-dark" style="margin-bottom: 10px;">
                <div class="card-header text-primary font-weight-bold text-uppercase">
                    Repondre
                </div>
                <div class="card-body" id="repondre">
                    <div class="form-group">
                        <label for="reponse">Repondez-ici !</label>
                        <textarea class="form-control" name="reponse" id="reponse" rows="10" placeholder="Votre Reponse"></textarea>
                    </div>
                    <br>
                    <input type="submit" name="submit_rep" value="Repondre" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>

<?php require ('partials/footer.php'); ?>