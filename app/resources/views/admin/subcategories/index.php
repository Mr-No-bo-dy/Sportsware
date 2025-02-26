<?php require_once 'app/resources/views/admin/components/header.php'; ?>

<main>
    <div><a href="subcategoriesCreate">Create subcategory</a></div>
    <table>
    <?php foreach($subcategories as $s) { ?>
        <tr>
            <td><?=$s['title']?></td>
            <td><?=$s['description']?></td>
            <td><?=$s['category_title']?></td>
            <!-- get param -->
            <td><a href="subcategoryEdit?id=<?=$s['id']?>">edit</a></td> 
            <td>
                <form action="subcategoryDelete" method="post">
                    <button type="submit" name="id" value="<?=$s['id']?>">delete</button>
                </form>
            </td> 
        </tr>
    <?php } ?>
    </table>
</main>

<?php require_once 'app/resources/views/admin/components/footer.php' ?>