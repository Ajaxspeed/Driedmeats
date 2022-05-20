<?php include 'inc/header.php'?>
<?php require "userRequired.php"?>
<?php require 'cartBuilder.php'?>
<?php require 'orderDetailsController.php'?>
<?php

if(empty($_POST['shipping'])){
    header('Location: orderDetails.php');
}

$productsDB = new ProductsDB();
$shipping = $productsDB->fetchById($_POST['shipping'])[0];

$usersDB = new UsersDB();
$user = $usersDB->fetchById($_SESSION['lg_email'])[0];

$total = 0;
$results = cartBuilder();


?>

<div class="container w-75 mx-auto text-black">
    <table class="table align-middle">
        <thead>
        <tr>
            <th scope="col">Položka</th>
            <th scope="col">ID</th>
            <th scope="col">Velikost</th>
            <th scope="col">Množství</th>
            <th scope="col">Cena za ks</th>
            <th scope="col">Cena celkem</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($results as $result): ?>
            <tr>
                <th scope="row"><?php echo $result['name']; ?></th>
                <td><?php echo $result['id']; ?></td>
                <td><?php echo $result['size']; ?></td>
                <td><?php echo $result['count']; ?></td>
                <td><?php echo $result['price']; ?> Kč</td>
                <td><?php echo ($result['price']*$result['count']); ?> Kč</td>
            </tr>
            <?php $total += ($result['price']*$result['count']); // Count total price?>
        <?php endforeach; ?>
            <tr>
                <th scope="row"><?php echo $shipping['prod_name']?></th>
                <td><?php echo $shipping['prod_id']?></td>
                <td></td>
                <td>1</td>
                <td><?php echo $shipping['price']?></td>
                <td><?php echo $shipping['price']?></td>
                <?php $total += $shipping['price'] // add shipping price to total?>
            </tr>
        </tbody>
        <tfoot>
        <tr>
            <th></th>
            <td></td>
            <td></td>
            <td></td>
            <td><h5>Celkem:</h5></td>
            <td><h5><?php echo $total ?> Kč</h5></td>
        </tr>
        </tfoot>
    </table>
    <div class="d-flex flex-column align-items-end">

            <form method="post" class="form-control-lg w-100" action="#">
                <h4 class="m-1">Dodací údaje</h4>
                <div class="form-group m-1 w-50">
                    <input disabled class="border-0 bg-white" style="width: 25%" name="f_name" id="f_name" value="<?php echo $user['f_name'] ?>">
                    <input disabled class="border-0 bg-white" style="width: 25%" name ="S_name" id="s_name" value="<?php echo $user['s_name'] ?>">
                </div>
                <div class="form-group m-1 w-50">
                    <input disabled class="border-0 bg-white" style="width: 25%" name="street" id="street" value="<?php echo $_POST['street'] ?>">
                    <input disabled class="border-0 bg-white" style="width: 25%" name ="number" id="number" value="<?php echo $_POST['number'] ?>">
                </div>
                <div class="form-group m-1">
                    <input disabled class="border-0 bg-white" name="city" value="<?php echo $_POST['city'] ?>">
                </div>
                <div class="form-group m-1">
                    <input disabled class="border-0 bg-white" name="zip" value="<?php echo $_POST['zip'] ?>">
                </div>
                <div class="form-group m-1">
                    <label class="mx-1">Doprava:</label>
                    <input disabled class="w-25 border-0 bg-white" name="shipping" value="<?php echo $shipping['prod_name']?>">
                </div>
                <div class="form-group m-1">
                    <label class="mx-1">Email:</label>
                    <input disabled class="w-25 border-0 bg-white" name="email" value="<?php echo $user['email'] ?>">
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary btn-lg m-1">Závázně objednat</button>
                </div>
            </form>
    </div>
</div>


<script>
    window.onload= function (){
    $('#f_name').css('width',$('#f_name').val().length + 'ch');
    $('#street').css('width',$('#street').val().length + 'ch');
    }
</script>


<?php include 'inc/footer.php'?>
