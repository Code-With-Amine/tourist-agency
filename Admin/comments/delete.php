<?php
    if($_GET['id']){
        require_once '../../include/database.php';
        try{
             $sqlState = $pdo->prepare('DELETE FROM comments WHERE id=?');
            $sqlState->execute([$_GET['id']]);
            header('location: comment.php');
        }catch(Exception $err){
                header('location: comment.php?err=3');
        }
    }else{
        header('location: comment.php?err=3');
    }
?>