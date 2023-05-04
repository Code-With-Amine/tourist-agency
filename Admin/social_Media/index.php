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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- add the favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon_io/favicon-16x16.png">
    <link rel="manifest" href="favicon_io/site.webmanifest">
    <title>EDIT SOCAIL MEDIA</title>
</head>
<body>
    <div class="container ">

    <nav class="row">
        <a href="../dashboard.php" class="col-6">
                <img src="../../images/backwards_arrow.png" alt="backwards_arrow" class="backwards">
        </a>

        <img src="../../images/logo.png" alt="logo" class="col-6 logo">
    </nav>

<form action="SetSocialMedia.php" method="post" class="shadow px-5 py-3 rounded mt-5">

<h2 class="text-center mt-4">EDIT YOUR SOCAIL MEDIA</h2>

<?php
if(isset($_GET['err'])){
    switch($_GET['err']){
            case 0:
                echo '<div class="alert alert-success">Successfully updated</div>';
                break;
            case 1:
                echo '<div class="alert alert-danger">the field must not be empty</div>';
                break;
            case 2:
                echo '<div class="alert alert-danger">It semms that you entered invalide URL </div>';
                break;
                case 3:
                    echo '<div class="alert alert-danger">somthing went wrong please try again</div>';
            }
}
?>

<div class="mt-5">

  <div class="row justify-content-center">
    <div class="col-12">

        <div class="form-group">
          <label for="facebook">Facebook:</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fab fa-facebook"></i></span>
            </div>
            <input type="text" class="form-control" id="facebook" name="facebook" placeholder="Facebook Profile Link"><button type="submit" class="btn btn-primary" name="updateFacebook">Update</button>
          </div>
        </div>

        <div class="form-group">
          <label for="instagram">linkedin:</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fab fa-linkedin"></i></span>
            </div>
            
            <input type="text" class="form-control" id="linkedin" name="linkedin" placeholder="linkedin Profile Link"><button type="submit" class="btn btn-primary" name="updateLinkedin">Update</button>
          </div>
        </div>

        <div class="form-group">
          <label for="instagram">Instagram:</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fab fa-instagram"></i></span>
            </div>
            
            <input type="text" class="form-control" id="instagram" name="instagram" placeholder="Instagram Profile Link"><button type="submit" class="btn btn-primary" name="updateInstagram">Update</button>
          </div>
        </div>

        <div class="form-group">
          <label for="instagram">Youtube:</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fab fa-youtube"></i></span>
            </div>
        
            <input type="text" class="form-control" id="Youtube" name="youtube" placeholder="Youtube Profile Link"><button type="submit" class="btn btn-primary" name="updateYoutube">Update</button>
          </div>
        </div>

        <div class="form-group">
          <label for="instagram">Phone Number:</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="bi bi-telephone"></i></span>
            </div>     
            <input type="phone" class="form-control" id="phone" name="phone" placeholder="Phone Number "><button type="submit" class="btn btn-primary" name="updatePhone">Update</button>
          </div>
        </div>

        <div class="form-group">
          <label for="instagram">Whatssap:</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="bi bi-whatsapp"></i></i></span>
            </div> 
            <input type="phone" class="form-control" id="whatsapp" name="whatsapp" placeholder="EX: 0798760987"><button type="submit" class="btn btn-primary" name="updateWhatsapp">Update</button>
          </div>
        </div>

        <div class="form-group">
          <label for="instagram">Email:</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="bi bi-envelope"></i></span>
            </div>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email"><button type="submit" class="btn btn-primary" name="updateEmail">Update</button>
          </div>
        </div>

    </div>
</div>
</form>  

</div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
</body>
</html>
