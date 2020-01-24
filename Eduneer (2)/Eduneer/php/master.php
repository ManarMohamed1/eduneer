<?php


require 'conf.php';

if($_SERVER['REQUEST_METHOD'] == "POST") {

    $first_name          = filter_var ( $_POST['first_name'], FILTER_SANITIZE_STRING);
    $last_name           = filter_var ( $_POST['last_name'], FILTER_SANITIZE_STRING) ;
    $email               = filter_var ( $_POST['email'], FILTER_SANITIZE_EMAIL);
    $password            = filter_var ( $_POST['password'], FILTER_SANITIZE_STRING);
    $confirm_password    = filter_var ( $_POST['confirm_password'], FILTER_SANITIZE_STRING);

    if($password == $confirm_password && $first_name != '' && $last_name != '' && $email != '') {

        $stmt = $con->prepare('SELECT email FROM users WHERE email= ?');
        $stmt->execute(array($email));
        // $row-> = $stmt->fetch();
        $count = $stmt->rowCount();

        if ( $count <= 0) {
            $password  = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $stmt = $con->prepare('INSERT INTO users (firstname, lastname, email, password) VALUES (:firstname, :lastname, :email, :password)');
            $stmt->bindParam(':firstname', $first_name);
            $stmt->bindParam(':lastname', $last_name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->execute();

            header('location:../eduneer.html');
        }else {
            echo 'Sorry The email has been taken';
        }
        
    }else {
        echo 'error in validation';
    }
    

}