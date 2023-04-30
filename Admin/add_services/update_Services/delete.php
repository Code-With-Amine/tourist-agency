<?php
    require_once '../../../include/database.php';
    require_once 'repetitive_functions.php';

                $id_path = explode('_',$_GET['idAndPath']);
                $id = $id_path[0];
                
                $path = "../".$id_path[1];

                // deleting the image
                DeleteImage($path);
            
             // delete the service from the database
             $sqlState = $pdo->prepare("DELETE FROM services WHERE id =? ");
             $sqlState->execute([$id]);
             header('location: ../services.php');
?>
