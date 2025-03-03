<?php require_once 'app/resources/views/admin/components/header.php'; ?>

<main class="wrapper">
    <div><a href="productCreate">Create products</a></div>
    <table>
    <?php foreach($products as $p) { ?>
        
        <tr>
            <td class="img_container">
                <img src="/sportsware/app/resources/img/products/<?=$p['image']?>" alt="">    
            </td>
            <td><?=$p['title']?></td>
            <td><?=$p['description']?></td>
            <td><?=$p['subcategory']?></td>
            <td><?=$p['price']?></td>
            <td><?=$p['color']?></td>
            <td><?=$p['size']?></td>
            <!-- get param -->
            <td><a href="productEdit?id=<?=$p['id']?>">edit</a></td> 
            <td>
                <form action="productDelete" method="post">
                    <button type="submit" name="id" value="<?=$p['id']?>">delete</button>
                </form>
            </td> 
        </tr>
    <?php } ?>
    </table>
</main>

<?php require_once 'app/resources/views/admin/components/footer.php' ?>