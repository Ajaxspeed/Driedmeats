<?php

class Ordered_itemsDB extends Database{
    private $tableName = 'ordered_items';

    public function create($args){
        $sql = 'INSERT INTO ' . $this->tableName.'(prod_id, order_id, prod_name, count, price) VALUES (:prod_id, :order_id, :prod_name, :count, :price)';
        $statement = $this->pdo->prepare($sql);
        return $statement->execute([
            'prod_id' => $args['prod_id'],
            'order_id' => $args['order_id'],
            'prod_name' => $args['prod_name'],
            'count' => $args['count'],
            'price' => $args['price'],
        ]);
    }}