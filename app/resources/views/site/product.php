<?php require_once 'app/resources/views/site/components/header.php'; ?>

<main>
    <picture>
        <!-- <img src="<?= $product['img']?>" alt=""> -->
    </picture>
    <h1><?= $product['title'] ?></h1>
    <p><?= $product['description'] ?></p>
    <p><?= $product['size'] ?></p>
    <p><?= $product['color'] ?></p>
    <p><?= $product['price'] ?></p>
</main>

<?php require_once 'app/resources/views/site/components/footer.php' ?>