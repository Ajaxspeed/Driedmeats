<?php  require 'db/Database.php'?>
<?php  require 'db/ProductsDB.php'?>

<?php
$productsDB = new ProductsDB();
$products = $productsDB->fetchAll();
?>

    <?php  include 'inc/header.php'?>

    <div class="d-flex w-75 m-auto min-vh-100 justify-content-center flex-wrap">
        <?php foreach ($products as $product):?>
            <div class="card m-5" style="width:300px;height: 500px">
                <img class="card-img-top" src="<?php echo $product['img_link'] ?>" alt="Náhled produktu">
                <div class="card-body" style="color: black">
                    <h4 class="card-title"><?php echo $product['prod_name'] ?></h4>
                    <p class="card-text"><?php echo $product['description'] ?></p>
                    <h5><?php echo $product['size'] ?></h5>
                    <h4><?php echo $product['price'] ?> Kč</h4>
                    <a href="#" class="btn btn-primary bg-primary border-0">Přidat do košíku</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <?php include "inc/footer.php";?>