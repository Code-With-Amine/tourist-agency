<?php
    require_once '../../include/database.php';
    $services = $pdo->query('select * from services')->fetchAll(PDO::FETCH_ASSOC);
    $row_count = $pdo->query('select count(*) as offers FROM services')->fetch(PDO::FETCH_ASSOC);
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
    <title>Change Log In</title>
</head>
<body>
    <div class="container ">

    <nav class="row">
        <a href="../dashboard.php" class="col-6">
                <img src="../../images/backwards_arrow.png" alt="backwards_arrow" class="backwards">
        </a>

        <img src="../../images/logo.png" alt="logo" class="col-6 logo">
    </nav>
<h2 class="text-center mt-4">Change Your Log In</h2>

<form action="setNewLogIn.php" method="post" class="shadow px-5 py-3 rounded">

<?php
// show error messages
if(isset($_GET['err'])){
    switch($_GET['err']){
        case 1:
            echo '<div class="alert alert-danger">All fields are necessary</div>';
            break;
        case 2:
            echo '<div class="alert alert-danger">Your current Log in is wrong </div>';
            break;
        case 3:
            echo '<div class="alert alert-danger">Your new Log in is too short it must contain at least 5 characters </div>';
            break;
        case 4:
            echo '<div class="alert alert-success"> successfully login changed</div>';
    }
}
?>

<div class="mt-5">

    <div class="mt-5">
        <label for="">Current Log In</label>
        <input type="text" class="form-control" name="current_logIn" id="" value="<?php echo isset($_GET['currLogin'])? $_GET['currLogin']:''?>">
  </div>


    <div class="mt-5">
    <label for="">New Log In</label>
    <input type="text" class="form-control" name="new_logIn" id="" value="<?php echo isset($_GET['newLogin'])? $_GET['newLogin']:''?>">
  </div>

  <div class="mt-5">
  <input type="submit" class="btn btn-primary d-block mx-auto" name="submit" onclick="return confirm('Are you sure you want to change your Log In')">
    </div>

</form>  

</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
</body>
</html>
