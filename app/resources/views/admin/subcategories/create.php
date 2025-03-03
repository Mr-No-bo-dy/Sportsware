<?php require_once 'app/resources/views/admin/components/header.php'; ?>

<main class="wrapper">
    <h1>Create subcategory</h1>
   <form action="subcategorySave" method="post">
        <label>
            Category
            <select name="category_id">
                <?php foreach ($categories as $с) { ?>
                    <option value="<?= $с['id'] ?>"><?= $с['title'] ?></option>
                <?php } ?>
            </select>
        </label>
        <label>
            Title
            <input type="text" name="title">
        </label>
        <label>
            Description
            <input type="text" name="description">
        </label>
        <button type='submit'>Submit</button>
   </form>
</main>

<?php require_once 'app/resources/views/admin/components/footer.php' ?>