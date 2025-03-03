<?php require_once 'app/resources/views/admin/components/header.php'; ?>

<main class="wrapper">
    <h1>Create products</h1>
   <form action="productSave" method="post" enctype="multipart/form-data">
        <label>
            Category
            <select name="subcategory_id">
                <?php foreach ($subcategories as $s) { ?>
                    <option value="<?= $s['id'] ?>"><?= $s['title'] ?></option>
                <?php } ?>
            </select>
        </label>
        <label>
            <input type="file" name="image">
        </label>
        <label>
            Title
            <input type="text" name="title">
        </label>
        <label>
            Description
            <input type="text" name="description">
        </label>
        <label>
            Price
            <input type="text" name="price">
        </label>
        <label>
            Color
            <input type="text" name="color">
        </label>
        <label>
            Size
            <input type="text" name="size">
        </label>
        <button type='submit'>Submit</button>
   </form>
</main>

<?php require_once 'app/resources/views/admin/components/footer.php' ?>