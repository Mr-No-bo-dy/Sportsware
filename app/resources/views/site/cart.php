<?php require_once 'app/resources/views/site/components/header.php'; ?>

<main class="wrapper">
    <h1>Кошик</h1>
    <?php if(isset($_SESSION['cart']))  { ?>
        <div class="d-flex">
            <div>
                <?php foreach($_SESSION['cart'] as $prod => $p ) { ?>
                        <div class="grid-cart">
                            <p>
                                <picture>
                                    <img src="/sportsware/app/resources/img/products/<?= $p['image'] ?>" alt="">
                                </picture>
                            </p>
                            <div>
                                <p><?= $p['title'] ?></p>
                                <p><?= $p['color'] ?></p>
                                <p><?= $p['size'] ?></p>
                            </div>
                            <div class="d-flex">
                                <form action="quantity" method="post" >
                                    <input type="hidden" name="id" value="<?= $p['id'] ?>">
                                    <button type="submit" name="minus" <?= ($p['quantity'] <= 0) ? "disabled" : "" ?>>-</button>
                                </form>
                                <label>
                                    <input type="number" name="quantity" min="1" value="<?= $p['quantity'] ?>">
                                </label>
                                <form action="quantity" method="post">
                                    <input type="hidden" name="id" value="<?= $p['id'] ?>">
                                    <button type="submit" name="plus">+</button>
                                </form>
                            </div>
                            <div>
                                <p><?= $p['total_price'] ?>$</p>
                            </div>
                            <form action="delete" method="post">
                                <input type="hidden" name="id" value="<?= $p['id'] ?>">
                                <button type="submit" name="delete">delete</button>
                            </form>
                        </div>
                    <?php } ?>
            </div>
            <div>
                <h2>Create order</h2>
                <form action="orderSave" method="post">
                    <div>
                        <p>
                            <label class="d-flex flex-center-col">
                                Ваше імя
                                <input type="text" placeholder="Enter your login" name="name" value="<?= $_SESSION['user']['name'] ?? '' ?>">
                            </label>
                        </p>
                        <p>
                            <label class="d-flex flex-center-col">
                                Ваше прізвище
                                <input type="text" placeholder="Enter your surname" name="surname" value="<?= $_SESSION['user']['surname'] ?? '' ?>">
                            </label>
                        </p>
                        <p>
                            <label class="d-flex flex-center-col"> Ваш телефон
                                <input type="tel" placeholder="Enter your phone number" name="phone" value="<?= $_SESSION['user']['phone'] ?? '' ?>">
                            </label>
                        </p>
                    </div>
                
                    <div class="d-flex">
                        <p>Total price</p>
                        <p>
                            <?php
                                $totalSum = 0;
                                foreach($_SESSION['cart'] as $prod => $p ) {
                                    $totalSum += $p['total_price'];
                                } ?>
                            <?= $totalSum ?>
                        </p>
                    </div>
                    <button type="submit">Create</button>
                </form>
            </div>
        </div>
    <?php } else { ?>
        <p>Кошик порожній</p>
    <?php } ?>
    
</main>

<?php require_once 'app/resources/views/site/components/footer.php' ?>