<?php require_once 'app/resources/views/site/components/header.php'; ?>

<main>
    <h1>Catalog</h1>
    <?php foreach ($products as $p) { ?>
        <figure>
            <figcaption>
                <picture>
                    <img src="<?= $p['image'] ?>" alt="">
                </picture>
                <h2><?= $p['title'] ?></h2>
                <p><?= $p['description'] ?></p>
                <p><?= $p['size'] ?></p>
                <p><?= $p['color'] ?></p>
                <p><?= $p['price'] ?></p>
                <p><a href="card?id=<?=$p['id']?>">Детальніше</a></p>

            </figcaption>
        </figure>
    <?php } ?>

</main>

<?php require_once 'app/resources/views/site/components/footer.php' ?>