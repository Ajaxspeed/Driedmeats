<?php  require 'db/ProductsDB.php'?>
<?php

function cartBuilder(){
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    $products = $_SESSION['cart'];
    $productsDB = new ProductsDB();
    $results = [];

    foreach($products as $val){
        if(!empty( $productsDB->fetchById($val['id'])[0])){
            $item = $productsDB->fetchById($val['id'])[0];
            $result = [
                'id'=>$val['id'],
                'name'=>$item['prod_name'],
                'size'=>$item['size'],
                'count'=>$val['count'],
                'price'=>$item['price'],
                'date_edited'=>$item['date_edited']
            ];
            array_push($results,$result);
        }
    }
    return $results;
}
