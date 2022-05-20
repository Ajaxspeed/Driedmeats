<?php  include 'inc/header.php'; ?>
<?php  require 'db/ProductsDB.php'?>

<?php
$productsDB = new ProductsDB();
$products = $productsDB->fetchAll();
?>

    <div class="d-flex w-75 m-auto justify-content-center flex-wrap">
        <?php foreach ($products as $product):?>
            <div class="card m-5" style="width:300px;height: 500px">
                <img class="card-img-top" src="<?php echo $product['img_link'] ?>" alt="Náhled produktu">
                <div class="card-body text-black">
                    <h4 class="card-title"><?php echo $product['prod_name'] ?></h4>
                    <p class="card-text"><?php echo $product['description'] ?></p>
                    <h5><?php echo $product['size'] ?></h5>
                    <h4><?php echo $product['price'] ?> Kč</h4>
                    <form method="post" action="addToCart.php">
                        <input type="hidden" name="id" value="<?php echo $product['prod_id']?>">
                        <button type="submit" class="btn btn-primary bg-primary border-0 m-1">Přidat do košíku</button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <?php include "inc/footer.php";?>

