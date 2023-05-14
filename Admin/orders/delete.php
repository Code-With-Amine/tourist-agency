<?php
require_once '../../include/database.php';

if(isset($_GET['id'])){
  
    $id = $_GET['id'];
    try{
        //  to the database
        $sqlSate = $pdo->prepare('DELETE FROM orders WHERE id = ?');
        $sqlSate->execute([$id]);
        header('location:../dashboard.php?err=0');
    }catch(Exception $err){
        header('location:../dashboard.php?err=1');
    }
}
?>