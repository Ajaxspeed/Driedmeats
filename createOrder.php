
<?php session_start();?>
<?php require 'db/Database.php'?>
<?php require "userRequired.php" ?>
<?php require 'cartBuilder.php'?>
<?php require "db/OrdersDB.php" ?>
<?php require "db/Ordered_itemsDB.php"?>


<?php
if(empty($_SESSION['cart'])){
    header('Location: index.php');
}

if(empty($_SESSION['od_values'])){
    header('Location: orderDetails.php');
}

$time = $_SESSION['od_values']['time'];

$usersDB = new UsersDB();
$user = $usersDB->fetchById($_SESSION['lg_email'])[0];

$orderID = ($user['user_id']*1000000)+(date("is")*100)+rand(0,99);

$orderValues = $_SESSION['od_values'];
$ordersDB = new OrdersDB();
$orderDetails = [
    'id' => $orderID,
    'street'=>$orderValues['street']." ".$orderValues['number'],
    'city'=>$orderValues['city'],
    'zip'=>$orderValues['zip'],
    'shipping'=>$orderValues['shipping'],
    'user_id'=>$user['user_id'],
        ];

if(!$ordersDB->create($orderDetails)){
    $_SESSION['od_errorMsg']= "Něco se pokazilo, zkuste to prosím znovu";
    header('Location: orderDetails.php');
}

$ordered_itemsDB = new Ordered_itemsDB();
$items = cartBuilder();

foreach ($items as $item){
    if($item['date_edited']<$time){
        $ordered_itemsDetails =[
            'prod_id' => $item['id'],
            'order_id' => $orderID,
            'prod_name' => $item['name'],
            'count' =>  $item['count'],
            'price' =>  $item['price']
        ];
        if(!$ordered_itemsDB->create($ordered_itemsDetails)){
            $ordersDB->deleteById($orderID);
            array_push($_SESSION['od_errorMsg'], "Něco se pokazilo, zkuste to prosím znovu");
            header('Location: orderDetails.php?err=1');
            exit();
        }
    }
    else{
        array_push($_SESSION['od_errorMsg'], "Došlo ke změně údajů o položkách ve vašem košíku. Zkontrolujte prosím svou objednávku");
        $ordersDB->deleteById($orderID);
        header('Location: orderDetails.php?err=2');
        exit();
    }
}

$_SESSION['cart'] = [];
$_SESSION['od_values'] = [];
header('Location: orderSuccess.php');

?>
