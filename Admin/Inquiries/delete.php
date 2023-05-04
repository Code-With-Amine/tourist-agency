<?php
require_once '../../include/database.php';
require_once 'common_functions.php';

if(isset($_GET['id'])){
  
    $id = $_GET['id'];
    try{
        //  to the database
        $sqlSate = $pdo->prepare('DELETE FROM inquiries WHERE id = ?');
        $sqlSate->execute([$id]);
        header('location:../dashboard.php?err=0');
    }catch(Exception $err){
        header('location:../dashboard.php?err=1');
    }
}
?>