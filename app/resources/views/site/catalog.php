<?php require_once 'app/resources/views/site/components/header.php'; ?>

<main class="wrapper">
    <h1>Catalog</h1>
    <div class="filter">
        <h2>Filters</h2>
        <form action="catalog" method="get">
            <p>
                <label>min price
                    <input type="text" name="minPrice" value="<?= $_GET["minPrice"] ?? "" ?>">
                </label>
                <label>max price
                    <input type="text" name="maxPrice" value="<?= $_GET["maxPrice"] ?? "" ?>">
                </label>
            </p>
            <p>
                <label>search
                    <input type="text" name="title" value="<?= $_GET["title"] ?? "" ?>">
                </label>
            </p>
            <p>
                <label>category
                    <select name="category_id">
                        <?php foreach($categories as $id => $title) { ?>
                            <option value="<?= $id ?>" <?= (!isset($_GET["category_id"]) || $id != $_GET['category_id']) ?: "selected" ?>><?= $title ?></option>
                        <?php } ?>
                    </select>
                </label>
            </p>
            <p>
                <label>Sort
                    <select name="sort">
                        <option value="priceAsc" <?= (!isset($_GET["sort"]) || "priceAsc" != $_GET['sort']) ?: "selected" ?>>Від найдешевшого до найдорожчого</option>
                        <option value="priceDesc" <?=  (!isset($_GET["sort"]) || "priceDesc" != $_GET['sort']) ?: "selected" ?>>Від дорожчого до дешевшого</option>
                        <option value="popularity" <?= (!isset($_GET["sort"]) || "popularity" != $_GET['sort']) ?: "selected" ?>>за популярністю</option>
                    </select>
                </label>
            </p>
            <p><button type="submit">submit</button></p>
            <a href="catalog">reset</a>
        </form>
    </div>
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
    <div class="pagination grid">
            <?php foreach ($links as $link) {?>
                <a href="?<?= isset($_GET['minPrice']) ? 'minPrice=' . $_GET['minPrice'] : ''?><?= isset($_GET['maxPrice']) ? '&maxPrice=' . $_GET['maxPrice'] : ''?><?= isset($_GET['title']) ? '&title=' . $_GET['title'] : ''?><?= isset($_GET['category_id']) ? '&category_id=' . $_GET['category_id'] : ''?><?= isset($_GET['sort']) ? '&sort=' . $_GET['sort'] : ''?>&page=<?= $link['page'] ?>"><?= $link['label'] ?></a>
            <?php } ?>
    </div>

</main>

<?php require_once 'app/resources/views/site/components/footer.php' ?>