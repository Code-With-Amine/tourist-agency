<?php
     session_start();

    if(!isset($_SESSION['admin'])){
        echo '<h2>Please Log in</h2>';
}else{
    require_once '../../include/database.php';

    $plalces = $pdo->query('select * from places_to_visite')->fetchAll(PDO::FETCH_ASSOC);
    $row_count = $pdo->query('select count(*) as offers FROM places_to_visite')->fetch(PDO::FETCH_ASSOC);

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

    <title>ADD A PLACE</title>
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
<h2 class="text-center mt-4">ADD A CITY</h2>

<form  action="insertData.php" method="post" class="shadow px-5 py-3 rounded" enctype="multipart/form-data">

<?php
// show error messages
if(isset($_GET['err'])){
    switch($_GET['err']){
            case 1:
                echo '<div class="alert alert-danger"> all filleds are necessary </div>';
                break;
            case 2:
                echo '<div class="alert alert-danger">Description must not be above 400 character</div>';
                break;

    }
}
if(isset($_GET['error'])){
    echo $_GET['error'];
}
?>

<div class="mt-5">
    
    <label for="" >Upload Image</label>
  <input type="file" class="form-control" name="file">
  </div>

    <div class="mt-5">
    <label for="">Place name</label>
    <input type="text" class="form-control" name="city" id="service" value="<?php echo isset($_GET['city'])? $_GET['city']:''?>">
  </div>

  <div class="mt-5">
    <label for="">Location</label>
    <input type="text" class="form-control" name="Location" id="service" value="<?php echo isset($_GET['location'])? $_GET['location']:''?>">
  </div>

  <div class="mt-5">
    <label for="">Description</label>
    <textarea class="form-control" name="description" id="description"></textarea>

    <p class="text-secondary">Max 400 character</p>
    <p id="char"></p>
  </div>

  <div class="mt-5">
  <input type="submit" class="btn btn-primary d-block mx-auto" name="submit">
    </div>

</form>  

</div>

<!-- update or delete a place -->
<table class="table table-striped table-responsive-sm mt-5" style="max-width: 1000px;">
        <thead>
            <tr>
                <th>City name</th>
                <th>Image</th>
                <th>Description</th>
                <th>Date of creation</th>
                <th>Operationa</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if($row_count['offers'] > 0){
                    foreach($plalces as $place){
                        ?>
                            <tr>
                                <td><?php echo $place['city'] ?></td>
                                <td><img src="<?= $place['image'] ?>" style="width:200px; height:100px"> </td>
                                <th><?php echo $place['description']?></th>
                                <td><?= $place['creation_date'] ?></td>
                                <td>
                                    <a href="update.php?id=<?php echo $place['id']?>&city=<?php echo $place['city']?>&path=<?php echo $place['image']?>&description=<?php echo $place['description']?>&id=<?php echo $place['id']?>&location=<?php echo $place['Location']?>" class="btn btn-primary">Update</a>

                                    <a href="delete.php?Path=<?php echo $place['image']?>&id=<?php echo $place['id'] ?>" class="btn btn-danger mt-4" onclick="return confirm('Are you sure you want to delete <?php echo $place['city']?>?')" name="delete">Delete</a>

                                </td>
                            </tr>
                        
                        <?php
                    }
                }
            ?>
        </tbody>

</table>
<script src="../js/checkInputs.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
</body>
</html>
<?php } ?>