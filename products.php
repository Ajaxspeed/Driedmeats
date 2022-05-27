<?php  include 'inc/header.php'; ?>
<?php  require 'db/ProductsDB.php'?>

<?php
$productsDB = new ProductsDB();
$cat_id = 2;
$cat_name = 'Hovězí jerky';
$itemsPerPage = 6;

if(!empty($_GET['category'])){
    if($_GET['category']=='hovezi'){
        $cat_id = 2;
        $cat_name = 'Hovězí jerky';
    }
    if($_GET['category']=='veprove'){
        $cat_id = 3;
        $cat_name = 'Vepřové jerky';
    }
    if($_GET['category']=='kruti'){
        $cat_id = 4;
        $cat_name = 'Krůtí jerky';
    }
    if($_GET['category']=='zverinove'){
        $cat_id = 5;
        $cat_name = 'Zvěřinové jerky';
    }

}


if (isset($_GET['offset'])) {
    $offset = (int)$_GET['offset'];
} else {
    $offset = 0;
}

if($offset % $itemsPerPage != 0){
    $offset = floor($offset/$itemsPerPage)*$itemsPerPage;
}

$count = $productsDB->countItems($cat_id);

$products = $productsDB->fetchByCategory($cat_id, $offset, $itemsPerPage);
?>
<h1 class="text-center text-black mt-5"><?php echo $cat_name?></h1>
<div class="d-flex w-75 mx-auto justify-content-center flex-wrap">

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
                        <input type="hidden" name="url" value="<?php echo getcwd() ?>">
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
<div class="d-flex justify-content-center">
        <ul class="pagination">
            <li class="page-item">
                <a class="page-link <?php echo $offset-$itemsPerPage< 0 ? "disabled" : "";?>" href="products.php?offset=<?php echo ($offset-$itemsPerPage); ?>">
                    Předchozí
                </a>
            </li>

           <?php for ($i = 1; $i <= ceil($count / $itemsPerPage); $i++): ?>
               <li class="page-item">
                   <a class="page-link <?php echo $offset / $itemsPerPage + 1 == $i ? "active" : ""; ?>" href="products.php?offset=<?php echo ($i - 1) * $itemsPerPage; ?>">
                       <?php echo $i; ?>
                   </a>
               </li>
            <?php endfor; ?>

            <li class="page-item">
                <a class="page-link <?php echo $offset+$itemsPerPage>= $count ? "disabled" : "";?>" href="products.php?offset=<?php echo ($offset+$itemsPerPage); ?>">
                    Další
                </a>
            </li>
        </ul>
</div>
<?php include "inc/footer.php";?>
