<?php
require_once '../../include/database.php';
$id = $_GET['id'];


if(!empty($_POST['amount']) || !empty($_POST['isPaid']) || !empty($_POST['date'])){

            if(isset($_POST['updateAmount'])){

                        $update = $pdo->prepare('UPDATE clients set payment_amount = ? WHERE id = ?');
                        $update->execute([$_POST['amount'],$id]);

                        header('location: All_clients.php?err=0&id='.$id);

            }elseif(isset($_POST['updatePaid'])){
                $update = $pdo->prepare('UPDATE clients set Is_It_Paid = ? WHERE id = ?');
                $update->execute([$_POST['isPaid'],$id]);
                header('location: All_clients.php?err=0&id='.$id);
            
            }elseif(isset($_POST['updateDate'])){

                $update = $pdo->prepare('UPDATE clients set dateOfComing = ? WHERE id = ?');
                $update->execute([$_POST['date'],$id]);
                header('location: All_clients.php?err=0&id='.$id);
            }
}else{
    header('location: All_clients.php?err=1&id='.$id);
}
?>