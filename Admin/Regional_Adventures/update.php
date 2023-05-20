<?php 
          session_start();
            if(!isset($_SESSION['admin'])){
                echo '<h2>Please Log in</h2>';
        }else{
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
            
            <?php include '../../include/favivcon.php'?>

            <title>UPDATE CITY</title>
        </head>
        <body>
            <div class="container ">
            <nav class="row align-items-center">
        <a href="../dashboard.php" class="col">
                <img src="../../images/backwards_arrow.png" alt="backwards_arrow" class="backwards">
        </a>

        <img src="../../images/logo.png" alt="logo" class="col logo">
            <!-- Translation Code here -->
					<span class="translate col">
                        <div class="select-wrapper">
                    <i class="fa-solid fa-globe showTransalation"></i>

					    <div class="translate pe-3" id="google_translate_element"></div>
                            <script type="text/javascript" src="../../js/translatePage.js"></script>
                            <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                        </div>
                    </span>
					<!-- Translation Code End here -->
    </nav>
        <h2 class="text-center mt-4">ADD A PLACE</h2>

        <form  action="updates/setUpdates.php?id=<?php echo $_GET['id']?>&path=<?php echo $_GET['path']?>" method="post" class="shadow px-5 py-3 rounded" enctype="multipart/form-data">

        <div class="mt-5">
            
            <label for="" >Upload Image</label>
        <input type="file" class="form-control" name="file" value="<?php echo $_GET['path']?>">
        </div>

            <div class="mt-5">
            <label for="">City name</label>
            <input type="text" class="form-control" name="city" id="service" value="<?php echo $_GET['city']?>">
        </div>

        <div class="mt-5">
            <label for="">Location</label>
            <input type="text" class="form-control" name="Location" id="service" value="<?php echo $_GET['location']?>">
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
        <input type="submit" class="btn btn-primary d-block mx-auto" name="update">
            </div>

        </form>  

        </div>

        <script src="../js/checkInputs.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        </body>
        </html>
        <?php } ?>