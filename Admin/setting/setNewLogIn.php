<?php
require_once '../../include/database.php';

if(isset($_POST['submit'])){
    if(!empty($_POST['new_logIn']) && !empty($_POST['current_logIn'])){
        
        $currLogin = $_POST['current_logIn'];
        $newLogin = $_POST['new_logIn'];
        $actulLogin = $pdo->query('SELECT login from admin')->fetch(PDO::FETCH_ASSOC);

        if($currLogin === $actulLogin['login']){
            if(strlen($newLogin) > 5){
            
                $pdo->prepare('UPDATE admin SET login = ? ')->execute([$newLogin]);
                header('location:logIn.php?err=4');
            }else{
                header('location:logIn.php?err=3&currLogin='.$_POST['current_logIn'].'&newLogin='.$_POST['new_logIn']);
            }
        }else{
            header('location:logIn.php?err=2&currLogin='.$_POST['current_logIn'].'&newLogin='.$_POST['new_logIn']);
        }
            
    }else{
        header('location:logIn.php?err=1&currLogin='.$_POST['current_logIn'].'&newLogin='.$_POST['new_logIn']);
    }
}
?>