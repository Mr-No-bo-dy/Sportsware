<?php require_once 'app/resources/views/admin/components/header.php'; ?>

<main>
    <h1>Edit category</h1>
   <form action="categoryUpdate" method="post">
        <label>
            Title
            <input type="text" name="title" value="<?= $category['title'] ?>">
        </label>
        <label>
            Description
            <input type="text" name="description" value="<?= $category['description'] ?>">
        </label>
        <input type="hidden" name="id" value="<?= $category['id'] ?>">
        <button type='submit'>Submit</button>
   </form>
</main>

<?php require_once 'app/resources/views/admin/components/footer.php' ?>