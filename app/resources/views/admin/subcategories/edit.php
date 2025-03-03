<?php require_once 'app/resources/views/admin/components/header.php'; ?>

<main class="wrapper">
    <h1>Edit subcategory</h1>
   <form action="subcategoryUpdate" method="post">
        <label>
            Category
            <select name="category_id">
                <?php foreach ($categories as $с) { ?>
                    <option value="<?= $с['id'] ?>" <?= $subcategory['category_id'] == $с['id'] ? 'selected' : '' ?>><?= $с['title'] ?></option>
                <?php } ?>
            </select>
        </label>
        <label>
            Title
            <input type="text" name="title" value="<?= $subcategory['title'] ?>">
        </label>
        <label>
            Description
            <input type="text" name="description" value="<?= $subcategory['description'] ?>">
        </label>
        <input type="hidden" name="id" value="<?= $subcategory['id'] ?>">
        <button type='submit'>Submit</button>
   </form>
</main>

<?php require_once 'app/resources/views/admin/components/footer.php' ?>