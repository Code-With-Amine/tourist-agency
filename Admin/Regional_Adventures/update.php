<?php
    require_once '../../include/database.php';
    if(isset($_POST['submit'])){
        
        if (isset($_FILES['file']) && $_FILES['file']['size'] > 0 && !empty($_POST['city']) && !empty($_POST['description']) ) {// if there is an image
            $newfileDestination = uploadImage($newService);
            DeleteImage($old_path);
            update_Service_Name($newfileDestination, $newService ,$New_date, $id, $pdo);

            }

        elseif(isset($_FILES['file']) && !empty($_POST['city']) && !empty($_POST['description'])) {
              
              update_Service_Name($old_path, $newService ,$New_date, $id, $pdo);

          }
          else{
            $error = '<div class="alert-danger p-4 m-4"> you must fill out the service name </div>';
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
    <title>ADMIN</title>
</head>
<body>
    <div class="container ">

    <nav class="row">
        <a href="add_cities.php" class="col-6">
                <img src="../../images/backwards_arrow.png" alt="backwards_arrow" class="backwards">
        </a>

        <img src="../../images/logo.png" alt="logo" class="col-6 logo">
    </nav>
<h2 class="text-center mt-4">ADD A CITY</h2>

<form  action="" method="post" class="shadow px-5 py-3 rounded" enctype="multipart/form-data">

<?php
// show error messages
if(isset($_GET['err'])){
    switch($_GET['err']){
            case 1:
                echo '<div class="alert alert-danger"> all filleds are necessary </div>';
                break;
            case 2:
                echo '<div class="alert alert-danger">Description must not be above 250 character</div>';
                break;

    }
}
if(isset($_GET['error'])){
    echo $_GET['error'];
}
?>

<div class="mt-5">
    
    <label for="" >Upload Image</label>
  <input type="file" class="form-control" name="file" value="<?php echo $_GET['path']?>">
  </div>

    <div class="mt-5">
    <label for="">City name</label>
    <input type="text" class="form-control" name="city" id="service" value="<?php echo $_GET['city']?>">
  </div>

  <div class="mt-5">
    <label for="">Description</label>
    <textarea class="form-control" name="description" id="description"><?php 
    echo trim($_GET['description']);
    ?></textarea>

    <p class="text-secondary">Max 250 character</p>
    <p id="char"></p>
  </div>

  <div class="mt-5">
  <input type="submit" class="btn btn-primary d-block mx-auto" name="submit">
    </div>

</form>  

</div>

<script src="../js/checkInputs.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
</body>
</html>
