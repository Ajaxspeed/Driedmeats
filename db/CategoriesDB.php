<?php

class CategoriesDB extends Database{
    private $tableName = 'categories';

    public function fetchAll(){
        $statement = $this->pdo->prepare("SELECT * FROM ".$this->tableName);
        $statement->execute();
        return $statement->fetchAll();
    }

}