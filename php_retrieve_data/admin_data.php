<?php


if(isset($_POST['submit'])){
    if(!empty($_POST['password']) && !empty($_POST['logIn'])){
        require_once '../include/database.php';
        $logIN = $pdo->query('SELECT login FROM admin')->fetch(PDO::FETCH_ASSOC);
        $password = $pdo->query('SELECT password FROM admin')->fetch(PDO::FETCH_ASSOC);

            if(password_verify($_POST['password'], $password['password']) && $_POST['logIn'] === $logIN['login']){
                // start a session and store the admin information
                session_start();
                $_SESSION['admin'] = $pdo->query('SELECT * FROM admin')->fetch(PDO::FETCH_ASSOC);
                header('location:../Admin/dashboard.php');

            }else{

                header('location: ../registration/admin.php?err=2&log_in='.$_POST['logIn']);
            }

    }else{

        header('location: ../registration/admin.php?err=1&log_in='.$_POST['logIn'].'&pass='.$_POST['password']);
    }
}
?>