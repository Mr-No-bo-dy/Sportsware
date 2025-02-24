<?php require_once 'app/resources/views/admin/components/header.php'; ?>

<main>
    <div><a href="categoryCreate">Create</a></div>
    <table>
    <?php foreach($categories as $c) { ?>
        <tr>
            <td><?=$c['title']?></td>
            <td><?=$c['description']?></td>
            <!-- get param -->
            <td><a href="categoryEdit?id=<?=$c['id']?>">edit</a></td> 
            <td>
                <form action="categoryDelete" method="post">
                    <button type="submit" name="id" value="<?=$c['id']?>">delete</button>
                </form>
            </td> 
        </tr>
    <?php } ?>
    </table>
</main>

<?php require_once 'app/resources/views/admin/components/footer.php' ?>