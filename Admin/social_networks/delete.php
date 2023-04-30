<?php
include_once '../../include/database.php';
include_once '../add_services/update_Services/repetitive_functions.php';
$path = $_GET['path'];
$id = $_GET['id'];
DeleteImage($path);

$sqlState = $pdo->prepare('DELETE FROM social_networks WHERE id = ?');
$sqlState->execute([$id]);
header('location:add.php');
?>