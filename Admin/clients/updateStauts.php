<?php
include_once '../Inquiries/common_functions.php';
include_once '../../include/database.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];
    Updatestatus($pdo, 'clients', 'Pending', $id);
    header('location: All_clients.php');
}
?>