<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://kit.fontawesome.com/d83f7e2869.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/ccommonStyle.css">
    <link rel="stylesheet" href="styleForm.css">
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
        <a href="../index.php" class="col-6">
                <img src="../images/backwards_arrow.png" alt="backwards_arrow" class="backwards">
        </a>

        <img src="../images/logo.png" alt="logo" class="col-6 logo">
    </nav>

<div class="form radius mt-5">        
      <form action="../php_retrieve_data/admin_data.php" method="post">
        <?php // show errors
                if(isset($_GET['err'])){
                    switch($_GET['err']){
                        case 1:
                            echo '<div class="alert alert-danger text-center">Both fields are necessary</div>';
                            break;
                        case 2:
                            echo '<div class="alert alert-danger text-center"> password or log in is wrong </div>';
                            break;
                        default:
                            echo '';
                    }
                }
        ?>
            
            <div class="mb-5">
                <label for="logIn" class="form-label text-center">Log in:</label>
                <input type="text" class="" id="logIn" name="logIn"/>
            </div>

            <div class="mb-5">
                <label for="password" class="form-label text-center">password:</label>
                <input type="password" class="" id="password" name="password"/>
            </div>

<div class="mb-5">
        <input type="submit" value="submit" name="submit" class="fw-bold rounded">
</div>

  </form>
  </div>
</div>
</div>
    
  <script src="../js/setCountries.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
</body>
</html>
