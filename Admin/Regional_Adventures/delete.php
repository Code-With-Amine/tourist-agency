<?php
require_once '../add_services/update_Services/repetitive_functions.php';
require_once '../../include/database.php';   
   $id = $_GET['id'];
   $path = $_GET['Path'];
   DeleteImage($path);

    $sqlStat = $pdo->prepare('DELETE FROM places_to_visite WHERE id = ?');
    $sqlStat->execute([$id]);
    header('location:add_cities.php');

?>