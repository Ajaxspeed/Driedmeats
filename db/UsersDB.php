<?php

class UsersDB extends Database{
    protected $tableName = 'users';

    public function fetchById($id){
        $statement = $this->pdo->prepare("SELECT * FROM ".$this->tableName." WHERE email = :id LIMIT 1");
        $statement->execute(['id'=>$id]);
        return $statement->fetchAll();
    }

    public function create($args){
        $sql = 'INSERT INTO ' . $this->tableName . '(email, password, phone, f_name, s_name, privileges) VALUES (:email, :password, :phone, :f_name, :s_name, :privileges)';
        $statement = $this->pdo->prepare($sql);
        try{
        $statement->execute([
            'email' => $args[0],
            'password' => $args[1],
            'phone'=> $args[2],
            'f_name'=> $args[3],
            's_name'=> $args[4],
            'privileges'=> 1,

        ]);
        }
        catch (Exception $e){return $e->getMessage();}
    }

}

