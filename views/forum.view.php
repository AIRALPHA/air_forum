<?php
$title = "Forum ● Accueil";
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
                            <th class="text-left">Categories</th>
                            <th class="text-right">Messages</th>
                            <th class="text-right">Dernier message</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        while ($c = $categories->fetch(PDO::FETCH_OBJ)) {
                              $souscat->execute([$c->id]);
                        ?>
                        <tr>
                            <td class="no"><?= $c->id; ?></td>
                            <td class="text-left">
                                <h3>
                                    <a href="topic.php?c=<?= $c->id; ?>">
                                        <?= $c->nom; ?>
                                    </a>
                                </h3>
                                <br>
                                <p>
                                <?php
                                    while($sc = $souscat->fetch(PDO::FETCH_OBJ))
                                    {
                                        echo "<a href='topic.php?c=$c->id&sc=$sc->id'>".$sc->nom . '</a> | ';
                                    }
                                ?>
                                </p>
                            </td>
                            <td class="unit"><?= nbr_messages_catego($c->id) ?></td>
                            <td class="total"><?= date_last_message($c->id) ?></td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </main>
            </div>
        </div>
    </div>
</div>

<div class="">
    <?php require ('partials/footer.php'); ?>
</div>
