<?php
session_start();
if(!isset($_SESSION['admin'])){
            echo '<h2>Please Log in</h2>';
    }else{

if(isset($_POST['Update'])){
    require_once '../../include/database.php';
        if(!empty($_POST['ClientID']) && !empty($_POST['comment']) && isset($_POST['stars'])){
                   try{
                    $sqlState = $pdo->prepare('UPDATE comments SET client_id = ? , comment = ?, stars = ? WHERE id = ?');
                    $sqlState->execute([$_POST['ClientID'], $_POST['comment'], $_POST['stars'], $_GET['id']]);
                    header('location: comment.php');
                   }catch(Exception $err){
                    echo '<div class="alert alert-danger text-center">Somthing went wrong please try again later!</div>';
                }
            }else{
                echo '<div class="alert alert-danger text-center">All fields are necessary</div>';
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
    <title>Comments</title>
</head>
<body>
    <div class="container ">

    <nav class="row">
        <a href="comment.php" class="col-6">
                <img src="../../images/backwards_arrow.png" alt="backwards_arrow" class="backwards">
        </a>

        <img src="../../images/logo.png" alt="logo" class="col-6 logo">
    </nav>
<h2 class="text-center mt-4">UPDATE A COMMENT</h2>

<form action="" method="post" class="shadow px-5 py-3 rounded">
        <?php
        if(isset($_GET['err'])){
                switch($_GET['err']){
                    case 0 :
                        echo '<div class="alert alert-success">Sucessfully Added</div>';
                        break;
                    case 1:
                        echo '<div class="alert alert-danger">All fields are necessary</div>';
                        break;
                    case 2:
                        echo '<div class="alert alert-danger">Please Enter a valid ID </div>';
                        break;
                    case 3:
                        echo '<div class="alert alert-danger">Somthing went wrong please try again later!</div>';
                        break;
                }}
        ?>
<div class="mt-5">
    
    <label for="" >Client ID</label>
        <input type="text" class="form-control" name="ClientID" value="<?php echo isset($_GET['client_id'])?$_GET['client_id']:''?>">
  </div>

    <div class="mt-5">
        <label for="">Comment</label>
        <textarea class="form-control" name="comment"><?php echo isset($_GET['comment'])?$_GET['comment']:''?></textarea>
  </div>

  <div class="mt-5">
        <label for="">Rating</label>
        <input type="number" min=0 max=5 class="form-control" name="stars" placeholder="EX : 3" value="<?php echo isset($_GET['stars'])?$_GET['stars']:''?>">
  </div>

  <div class="mt-5">
        <input type="submit" class="btn btn-primary d-block mx-auto" name="Update" value="Update">
  </div>

</form>  

</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
</body>
</html>
           <?php  } ?>