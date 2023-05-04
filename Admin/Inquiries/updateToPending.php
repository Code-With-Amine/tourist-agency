<?php
include_once 'common_functions.php';
include_once '../../include/database.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];
    Updatestatus($pdo, 'inquiries', 'Pending', $id);
    header('location: ../dashboard.php');
}
?>