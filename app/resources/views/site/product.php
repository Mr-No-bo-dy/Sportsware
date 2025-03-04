<?php require_once 'app/resources/views/site/components/header.php'; ?>

<main class="wrapper">
    <div class="grid-card">
        <div>
            <picture>
                <img src="/sportsware/app/resources/img/products/<?=$product['image']?>" alt="">
            </picture>
        </div>
        <div>
            <h2><?= $product['title'] ?></h2>
            <p><?= $product['description'] ?></p>
            <p><?= $product['size'] ?></p>
            <p><?= $product['color'] ?></p>
            <p><?= $product['price'] ?></p>
            <form action="addToCart" method="post">
                <button type="submit" name="id" value="<?= $product['id'] ?>">add to cart</button>
            </form>
        </div>
    </div>
</main>

<?php require_once 'app/resources/views/site/components/footer.php' ?>