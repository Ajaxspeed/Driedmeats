<?php require 'db/Database.php' ?>
<?php require 'db/UsersDB.php' ?>

<?php


$users="";
$email = "";
$password = "";

if(!empty($_POST)){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $usersDB = new UsersDB();
    $users = $usersDB->fetchById($email)[0];
    if (password_verify($password,$users['password'])){
        //session_set_cookie_params(0, '/');
        session_start();
        $_SESSION['lg_id'] = $users['user_id'];
        $_SESSION['lg_email'] = $users['email'];
        header('Location: index.php');
        exit();
    }
    else{
        header('Location: login.php?err=1');
    }
}
else{
        header('Location: login.php?err=1');
}

?>