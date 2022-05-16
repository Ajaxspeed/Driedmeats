<?php  require 'db/Database.php'?>
<?php  require 'db/ProductsDB.php'?>

<?php

$productsDB = new ProductsDB();
$products = $productsDB->fetchAll();

?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <title>Driedmeats</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.js"></script>
</head>
<body style="color: white">
    <nav class="navbar navbar-dark navbar-expand-sm sticky-top bg-primary"">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="res/logo.png" alt="logo">
            </a>
            <ul class="navbar-nav d-flex h5" style="">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Kategorie</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Hovězí</a></li>
                        <li><a class="dropdown-item" href="#">Vepřové</a></li>
                        <li><a class="dropdown-item" href="#">Krůtí</a></li>
                        <li><a class="dropdown-item" href="#">Zvěřinové</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Přihlásit se</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Registrace</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Košík</a>
                </li>
            </ul>
        </div>
    </nav>

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

    <footer>
        <div class="container-fluid text-center p-5 bg-primary"> _placeholder_</div>
        <div class="container-fluid text-center p-3 bg-secondary"> &copy; 2022 Matěj Zavadil</div>
    </footer>
</body>
</html>