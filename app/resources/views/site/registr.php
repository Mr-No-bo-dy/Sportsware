<?php require_once 'app/resources/views/site/components/header.php'; ?>

<main class="wrapper">
    <form action="register" method="post">
        <p>
            <label class="d-flex flex-center-col">
                Ваше імя
                <input type="text" placeholder="Enter your login" name="name" value="<?= $_POST['name'] ?? '' ?>">
            </label>
        </p>
        <p>
            <label class="d-flex flex-center-col">
                Ваше прізвище
                <input type="text" placeholder="Enter your login" name="surname" value="<?= $_POST['surname'] ?? '' ?>">
            </label>
        </p>
        <p>
            <label class="d-flex flex-center-col"> Ваш телефон
                <input type="tel" placeholder="Enter your phone number" name="phone" value="<?= $_POST['phone'] ?? '' ?>">
            </label>
        </p>
        <p>
            <label class="d-flex flex-center-col"> Ваш email
                <input type="email" placeholder="Enter your email" name="email" value="<?= $_POST['email'] ?? '' ?>">
            </label>
        </p>
        <p>
            <label class="d-flex flex-center-col"> Ваш пароль
                <input type="password" placeholder="Enter your password" name="password">
            </label>
        </p>
        <p class="error"><?= $errorReg ?? '' ?></p>
        <p><button type="submit">Submit</button></p>
    </form>
<?php require_once 'app/resources/views/site/components/footer.php' ?>