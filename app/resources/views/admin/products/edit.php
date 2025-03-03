<?php require_once 'app/resources/views/admin/components/header.php'; ?>

<main class="wrapper">
    <h1>Edit products</h1>
   <form action="productUpdate" method="post" enctype="multipart/form-data">
        <p>
            <label>
                Category
                <select name="subcategory_id">
                    <?php foreach ($subcategory as $s) { ?>
                        <option value="<?= $s['id'] ?>" <?= $product['subcategory_id'] == $s['id'] ? 'selected' : '' ?>><?= $s['title'] ?></option>
                    <?php } ?>
                </select>
            </label>
        </p>
        <p>
            <label>
                <input type="file" name="image" value="<?= $product['image'] ?>">
            </label>
        </p>
        <p>
            <label>
                Title
                <input type="text" name="title" value="<?= $product['title'] ?>">
            </label>
        </p>
        <p>
            <label>
                Description
                <input type="text" name="description" value="<?= $product['description'] ?>">
            </label>
        </p>
        <p>
            <label>
                Price
                <input type="text" name="price" value="<?= $product['price'] ?>">
            </label>
        </p>
        <p>
            <label>
                Color
                <input type="text" name="color" value="<?= $product['color'] ?>">
            </label>
        </p>
        <p>
            <label>
                Size
                <input type="text" name="size" value="<?= $product['size'] ?>">
            </label>
        </p>
        <button type='submit' name="id" value="<?= $product['id'] ?>">Submit</button>
   </form>
</main>

<?php require_once 'app/resources/views/admin/components/footer.php' ?>