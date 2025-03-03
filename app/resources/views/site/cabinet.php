<?php require_once 'app/resources/views/site/components/header.php'; ?>

<main class="wrapper">
    <h1>Hi, <?= $_SESSION['user']['name'] ?? 'guest' ?></h1>
    <form action="updateUser" method="post">
        <p>
            <label class="d-flex flex-center-col">
                Ваше імя
                <input type="text" placeholder="Enter your login" name="name" value="<?= $_SESSION['user']['name'] ?>">
            </label>
        </p>
        <p>
            <label class="d-flex flex-center-col">
                Ваше прізвище
                <input type="text" placeholder="Enter your login" name="surname" value="<?= $_SESSION['user']['surname'] ?>">
            </label>
        </p>
        <p>
            <label class="d-flex flex-center-col"> Ваш телефон
                <input type="tel" placeholder="Enter your phone number" name="phone" value="<?= $_SESSION['user']['phone'] ?>">
            </label>
        </p>
        <p>
            <label class="d-flex flex-center-col"> Ваш email
                <input type="email" placeholder="Enter your email" name="email" value="<?= $_SESSION['user']['email'] ?>">
            </label>
        </p>
        <p><button type="submit" name='id' value="<?= $_SESSION['user']['id'] ?>">Оновити дані</button></p>
    </form>
    <form action="deleteUser" method="post">
        <p><button type="submit" name='id' value="<?= $_SESSION['user']['id'] ?>">Видалити аккаунт</button></p>
    </form> 
</main>

<?php require_once 'app/resources/views/site/components/footer.php' ?>