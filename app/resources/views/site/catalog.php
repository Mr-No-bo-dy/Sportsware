<?php require_once 'app/resources/views/site/components/header.php'; ?>

<main class="wrapper">
    <h1>Catalog</h1>
    <div class="grid">
        <?php foreach ($products as $p) { ?>
            <figure>
                <figcaption>
                    <picture>
                        <img src="/sportsware/app/resources/img/products/<?=$p['image']?>" alt="">
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
    </div>

</main>

<?php require_once 'app/resources/views/site/components/footer.php' ?>