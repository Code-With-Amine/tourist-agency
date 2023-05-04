<?php
    require_once '../../../include/database.php';
    require_once '../../add_services/update_Services/repetitive_functions.php';
    $id = $_GET['id'];
    $old_path = $_GET['path'];
    $date = date('y-m-d');

    function upadte($destination, $desc,$city, $New_date, $id, $pdo){
                $sqlState = $pdo->prepare('UPDATE places_to_visite set image = ? , description = ? , creation_date = ? , city = ? WHERE id = ?');
                $sqlState->execute([$destination, $desc, $New_date, $city, $id]);
                header('location:../add_cities.php');
    }

    if(isset($_POST['update'])){
        
        if (isset($_FILES['file']) && $_FILES['file']['size'] > 0 && !empty($_POST['city']) && !empty($_POST['description']) ) {// if there is an image
            $newfileDestination = uploadImage($_POST['city']);
            DeleteImage($old_path);
            upadte($newfileDestination, $_POST['description'], $_POST['city'] ,$date, $id, $pdo);

            }

        elseif(isset($_FILES['file']) && !empty($_POST['city']) && !empty($_POST['description'])) {
              
            upadte($old_path, $_POST['description'], $_POST['city'] ,$date, $id, $pdo);

          }
          else{
            $error = '<div class="alert-danger p-4 m-4"> you must fill out all the fields </div>';
            header('location:../update.php');
          }
      
    }

?>