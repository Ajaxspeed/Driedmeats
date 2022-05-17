<?php require 'db/Database.php' ?>
<?php require 'db/UsersDB.php' ?>
<?php
session_start();

if (!empty($_POST)) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $phone = $_POST['phone'];
    $f_name = $_POST['f_name'];
    $s_name = $_POST['s_name'];

    // if (strlen($password) < 8) {

    // }
    // validace vstupu, pomoci regex

    $usersDB = new UsersDB();
    echo($usersDB->create([$email, $hashedPassword, $phone, $f_name, $s_name,]));
    $usersDB->create([$email, $hashedPassword, $phone, $f_name, $s_name,]);


    //header('Location: index.php');
}


?>
