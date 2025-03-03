<?php require_once 'app/resources/views/site/components/header.php'; ?>

<main class="wrapper">
    <form action="login" method="post">
        <p class="error"><?= $errorReg ?? '' ?></p>
        <p>
            <label>
                <input type="text" placeholder="Введіть ім'я або email" name="login" value="<?= $_POST['login'] ?? '' ?>">
            </label>
        </p>
        <p>
            <label>
                <input type="password" placeholder="Введіть пароль" name="password">
            </label>
        </p>
        <p class="error"><?= $loginError ?? '' ?></p>
        <a href="registrUser">Реєстрація</a>
        <button type="submit">Увійти</button>
    </form>
    
</main>

<?php require_once 'app/resources/views/site/components/footer.php' ?>