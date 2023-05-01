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
    <title>ADMIN</title>
</head>
<body>
    <div class="container ">

    <nav class="row">
        <a href="../dashboard.php" class="col-6">
                <img src="../../images/backwards_arrow.png" alt="backwards_arrow" class="backwards">
        </a>

        <img src="../../images/logo.png" alt="logo" class="col-6 logo">
    </nav>
<h2 class="text-center mt-4">ADD A SERVICE</h2>

<form onsubmit="return validateInput()" action="upload.php" method="post" class="shadow px-5 py-3 rounded" enctype="multipart/form-data">

<?php
// show error messages
if(isset($_GET['error'])){
    $error = urldecode($_GET['error']);
    echo '<div class="error">' . $error . '</div>';
}
?>

<div class="mt-5">
    
    <label for="" >Upload Image</label>
  <input type="file" class="form-control" name="file">
  </div>

    <div class="mt-5">
    <label for="">Add Service name</label>
    <input type="text" class="form-control" name="service" id="service">
  </div>

  <div class="mt-5">
  <input type="submit" class="btn btn-primary d-block mx-auto" name="submit">
    </div>

</form>  

</div>

<!-- update or delete a service -->
<table class="table table-striped table-responsive-sm mt-5">
        <thead>
            <tr>
                <th>Service name</th>
                <th>Service Image</th>
                <th>Date of creation</th>
                <th>Operationa</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if($row_count['offers'] > 0){
                    foreach($services as $service){
                        ?>
                            <tr>
                                <td><?php echo $service['name'] ?></td>
                                <td><img src="<?= $service['image'] ?>" style="width:200px; height:100px"> </td>
                                <td><?= $service['creation_date'] ?></td>
                                <td>
                                    <a href="update_Services/update.php?service_info=<?php echo $service['id']."_".$service['name']."_".$service['image']?>" class="btn btn-primary">Update</a>

                                    <a href="update_Services/delete.php?idAndPath=<?php echo $service['id']."_".$service['image'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete <?php echo $service['name']?>?')" name="delete">Delete</a>

                                </td>
                            </tr>
                        
                        <?php
                    }
                }
            ?>
        </tbody>

</table>
<script src="../js/main.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
</body>
</html>
