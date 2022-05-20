<?php

class OrdersDB extends Database{
    protected $tableName = 'orders';

    public function create($args){
        $sql = 'INSERT INTO ' . $this->tableName.' (order_id, street, city, zip, shipping, user_id) VALUES (:id, :street, :city, :zip, :shipping, :user_id)';
        $statement = $this->pdo->prepare($sql);
        return $statement->execute([
            'id' => $args['id'],
            'street' => $args['street'],
            'city' => $args['city'],
            'zip' => $args['zip'],
            'shipping' => $args['shipping'],
            'user_id' => $args['user_id'],
        ]);
    }

    public function deleteById($id){
        $statement = $this->pdo->prepare('DELETE * FROM '.$this->tableName.' WHERE order_id = :id');
        $statement->execute(['id'=>$id]);
    }
}