<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="app/resources/css/styles.css">
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="home">Main</a></li>
                <li><a href="categories">Categories</a></li>
                <?php if(!isset($_SESSION['user'])) { ?>
                    <li><a href="register">Sing Up</a></li>
                    <li><a href="login">Sing In</a></li>
                <?php } else { ?>
                    <li><a href="cabinet">Cabinet</a></li>
                    <li><a href="logout">Logout</a></li>
                <?php }?>
            </ul>
        </nav>
    </header>