<?php  include 'inc/header.php'; ?>
<?php  require 'db/ProductsDB.php'?>

<?php
$productsDB = new ProductsDB();
$products = $productsDB->fetchAll();
?>

    <div class="d-flex w-75 m-auto justify-content-center flex-wrap">
        <?php foreach ($products as $product):?>
            <div class="card m-5" style="width:300px;height: auto">
                <div class="container w-100 p-0">
                    <img class="card-img-top" src="<?php echo $product['img_link'] ?>" alt="Náhled produktu " width="300" height="auto">
                </div>
                <div class="card-body text-black">
                    <h4 class="card-title"><?php echo $product['prod_name'] ?></h4>
                    <p class="card-text overflow-hidden" style="height: 4.5em"><?php echo $product['description'] ?></p>
                    <h5><?php echo $product['size'] ?></h5>
                    <h4><?php echo $product['price'] ?> Kč</h4>
                    <form method="post" action="addToCart.php">
                        <div class="d-flex justify-content-between mt-4">
                        <input type="hidden" name="id" value="<?php echo $product['prod_id']?>">
                        <button type="submit" class="btn btn-primary">Přidat do košíku</button>
                         <?php if(!empty($_SESSION['lg_privileges'])&&$_SESSION['lg_privileges'] == 2):?>
                         <a href="#" class="btn btn-warning"><img src="res/icons/edit.svg" title="Upravit produkt" alt="Upravit produkt"></a>
                         <a href="#" class="btn btn-secondary"><img src="res/icons/delete.svg" title="Smazat produkt" alt="Smazat produkt"></a>
                         <?php endif; ?>
                        </div>
                    </form>



                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <?php include "inc/footer.php";?>

