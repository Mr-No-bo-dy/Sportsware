<?php require_once 'app/resources/views/site/components/header.php'; ?>

<main>
    <h1>Create category</h1>
   <form action="categorySave" method="post">
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

<?php require_once 'app/resources/views/site/components/footer.php' ?>