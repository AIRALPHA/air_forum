<?php
$title = "Forum ● Topic";
require ('partials/header.php');
require ('partials/nav.php'); ?>

<div class="container">
    <div id="invoice">
        <div class="invoice overflow-auto">
            <div>
                <main>
                    <table border="0" cellspacing="0" cellpadding="0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th class="text-left">Liste des Topic</th>
                            <th class="text-right">Reponses</th>
                            <th class="text-right">Dernier message</th>
                            <th class="text-right">Date Creation</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        while ($t = $topics->fetch(PDO::FETCH_OBJ)) { ?>
                            <tr>
                                <td class="no"><?= $t->id_topic; ?></td>

                                <td class="text-left">
                                    <h3>
                                        <a href="sms.php?t=<?= $t->id_topic; ?>">
                                            <?= $t->sujet; ?>
                                        </a>
                                    </h3>
                                </td>
                                <td class="total"><?= nb_answer($t->id_topic) ?></td>
                                <td class="text-left"><?= last_answer($t->id_topic) ?></td>
                                <td class="total"><?= $t->date_creation; ?> par <?= $t->pseudo; ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                    <a class="btn btn-outline-dark" href="new.php?c=<?= $id_categorie; ?>&sc=<?= isset($id_souscategorie) ? $id_souscategorie : " "; ?>">Poser une question ?</a>
                </main>
            </div>
        </div>
    </div>
</div>

<div class="">
    <?php require ('partials/footer.php'); ?>
</div>
