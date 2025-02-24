<?php require_once 'app/resources/views/admin/components/header.php'; ?>

<main>
    <table>
    <?php foreach($users as $u) { ?>
        <tr>
            <td><?=$u['name']?></td>
            <td><?=$u['surname']?></td>
            <td><?=$u['email']?></td>
            <td><?=$u['phone']?></td>
            <td>
                <form action="users" method="post">
                    <select name="role">
                        <option value="customer" <?= ($u['role'] =='customer') ? 'selected' : ''; ?> >Customer</option>
                        <option value="admin" <?= ($u['role'] =='admin') ? 'selected' : '';?>>Admin</option>
                    </select>
                    <button type="submit" name="update_id" value="<?= $u['id'] ?>">Update</button>
                </form>
            </td>
            <td>
                <?php if($u['role'] != "admin") { ?>
                    <form action="users" method="post">
                        <button type="submit" name="delete_id" value="<?=$u['id']?>">delete</button>
                    </form>
                <?php } ?>
            </td> 
        </tr>
    <?php } ?>
    </table>
</main>

<?php require_once 'app/resources/views/admin/components/footer.php' ?>