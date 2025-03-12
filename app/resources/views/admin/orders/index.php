<?php require_once 'app/resources/views/admin/components/header.php'; ?>

<main class="wrapper">
    <table>
    <?php foreach($orders as $o) { ?>
        
        <tr>
            <td><?=$o['customer']?></td>
            <td><?=$o['product']?></td>
            <td><?=$o['count']?></td>
            <td><?=$o['total_price']?></td>
            <td><?=$o['date']?></td>
        </tr>
    <?php } ?>
    </table>
</main>

<?php require_once 'app/resources/views/admin/components/footer.php' ?>