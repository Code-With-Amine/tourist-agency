<?php
    require_once '../../../include/database.php';
    require_once '../../add_services/update_Services/repetitive_functions.php';

    if(isset($_POST['update'])){

      function upadte($destination, $desc,$city, $New_date, $id, $location, $pdo){
        $sqlState = $pdo->prepare('UPDATE places_to_visite set image = ? , description = ? , creation_date = ? , city = ?, Location = ? WHERE id = ?');
        $sqlState->execute([$destination, $desc, $New_date, $city, $location, $id]);

        header('location:../add_cities.php?r=');
}

      $id = $_GET['id'];
      $old_path = $_GET['path'];
      $date = date('y-m-d');
        
        if (isset($_FILES['file']) && $_FILES['file']['size'] > 0 && !empty($_POST['city']) && !empty($_POST['description']) && !empty($_POST['Location']) ) {// if there is an image
            $newfileDestination = uploadImage($_POST['city']);
            DeleteImage($old_path);
            upadte($newfileDestination, $_POST['description'], $_POST['city'] ,$date, $id, $_POST['Location'], $pdo);

            }

        elseif(isset($_FILES['file']) && !empty($_POST['city']) && !empty($_POST['description']) && !empty($_POST['Location']) ) {

            upadte($old_path, $_POST['description'], $_POST['city'] ,$date, $id, $_POST['Location'], $pdo);

          }
          else{
            header('location:../add_cities.php?err=1');
          }
      
    }

?>