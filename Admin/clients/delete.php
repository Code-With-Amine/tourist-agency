<?php
require_once '../../include/database.php';

if(isset($_GET['id'])){
  
    $id = $_GET['id'];
    try{
        //  to the database
        $sqlSate = $pdo->prepare('DELETE FROM clients WHERE id = ?');
        $sqlSate->execute([$id]);
        header('location: All_clients.php?err=0&id='.$id);
    }catch(Exception $err){
        header('location: All_clients.php?err=2&id='.$id);
    }
}
?>