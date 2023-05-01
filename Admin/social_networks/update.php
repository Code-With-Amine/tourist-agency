<?php

function updateImageDest($destination, $id, $pdo){
       $query = $pdo->prepare('UPDATE social_networks SET image = ? WHERE id = ?;');
       $query->execute([$destination, $id]);
}


    require_once '../../include/database.php';
    include_once '../add_services/update_Services/repetitive_functions.php';

    $id = $_GET['id'];
    $path = $_GET['path'];

    if(isset($_POST['submit'])){

        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileError = $_FILES['file']['error'];

        $fileExtention = explode('.',$fileName); // i will get an array conatins the name of the file and it's extention
        $fileActualExt = strtolower(end($fileExtention)); // end() a function gets the last element in the arry

        // arry contains the photo's extention that i want to allow
        $allowed = array('jpg', 'jpeg', 'png', 'gif', 'webp');

        if(in_array($fileActualExt, $allowed)){ // i check if the extention of the upoladed image inside of my allowed array it will return true
                if($fileError === 0){
                    //delete the old image
                    DeleteImage($path);

                    $fileNameNew = $id . "." . $fileActualExt;
                    $fileDestination = 'socials_images/'.$fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);
                    updateImageDest($fileDestination, $id, $pdo);
                    header('location: add.php');
    }
    else{
        $error = "please uploade an image";
    }
}else{
    $error = '<div class="alert-danger p-4 m-4"> wrong file extention </div>';
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://kit.fontawesome.com/d83f7e2869.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/ccommonStyle.css">
    <link rel="stylesheet" href="../../css/updatewebsite.css">
    <!-- add the favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon_io/favicon-16x16.png">
    <link rel="manifest" href="favicon_io/site.webmanifest">
    <title>SOCIAL NETWORKS</title>
</head>
<body>
    <div class="container ">

    <nav class="row">
        <a href="add.php" class="col-6">
                <img src="../../images/backwards_arrow.png" alt="backwards_arrow" class="backwards">
        </a>

        <img src="../../images/logo.png" alt="logo" class="col-6 logo">
    </nav>
<h2 class="text-center mt-4">Update Image</h2>

<form action="" method="post" class="shadow px-5 py-3 rounded" enctype="multipart/form-data">

<?php
// show error messages
if(isset($error)){
    echo '<div class="error">' . $error . '</div>';
}
?>

<div class="mt-5">
    
    <label for="" >Upload Image</label>
  <input type="file" class="form-control" name="file">
  </div>
  <div class="mt-5">
  <input type="submit" class="btn btn-primary d-block mx-auto" name="submit">
    </div>

</form>  

</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
</body>
</html>
