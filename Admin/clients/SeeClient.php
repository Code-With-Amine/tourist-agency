<?php
    include_once '../../include/database.php';
    include_once '../Inquiries/common_functions.php';
    $client = json_decode(urldecode($_GET['client']), true);
    Updatestatus($pdo, 'clients', 'Seen', $client['id']);

?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://kit.fontawesome.com/d83f7e2869.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/ccommonStyle.css">
    <link rel="stylesheet" href="../../css/client.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://kit.fontawesome.com/d83f7e2869.js" crossorigin="anonymous"></script>
    
    <!-- add the favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon_io/favicon-16x16.png">
    <link rel="manifest" href="favicon_io/site.webmanifest">
    <title>Order</title>
</head>
<body class="body">

<div class="container ">

<nav>
    <a href="All_clients.php">
            <img src="../../images/backwards_arrow.png" alt="backwards_arrow" class="backwards">
    </a>
</nav>

<div class="display-order box_shadow radius mx-auto p-4 mb-5">

    <form action="setUpdates.php?id=<?php echo $client['id']?>" method="post">

    <div class="form-group">
          <label>Paiment Amount:</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="bi bi-cash-coin"></i></span>
            </div>
            <input type="number" step=1 class="form-control" name="amount" placeholder=""><button type="submit" class="btn btn-primary" name="updateAmount">Update</button>
          </div>
        </div>

        <div class="form-group">
          <label>Is the client paid:</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="bi bi-credit-card-2-back-fill"></i></span>
            </div>
            <select class="form-control" name="isPaid">
            <option value="No">No</option>
            <option value="Yes">Yes</option> 
            </select>
            <button type="submit" class="btn btn-primary" name="updatePaid">Update</button>
          </div>
        </div>

        <div class="form-group">
          <label >Change The Coming Date:</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="bi bi-calendar-check-fill"></i></span>
            </div>
            <input type="date" class="form-control" name="date" placeholder="yyyy-mm-dd"><button type="submit" class="btn btn-primary" name="updateDate">Update</button>
          </div>
        </div>

    </form>
</div>

    <main class="display-order box_shadow radius mx-auto pb-4">
    <a href="delete.php?id=<?php echo $client['id']?>" onclick="return confirm('are you sure you whant to delete <?php echo $client['first_name']?>  <?php echo $client['last_name']?> Inquiry')" class="me-3 btn p-2"><i class="bi bi-x-lg"></i> </a>
    <a href="updateStauts.php?id=<?php echo $client['id']?>" class="btn p-2" title="make as unread" ><i class="bi bi-bookmark-x"></i></a>

        <h3 class="text-center fw-bold ">Client number  <?php echo $client['id']?></h3>
        <div class="row p-5">
            <div class="mt-5 col-12 col-sm-5">

            <div class="d-flex gap-4">
                  <i class="icon bi bi-person-fill"></i>
                        <p>First Name : <span><?php echo $client['first_name']?></span></p>
            </div>

            <div class="d-flex gap-4">
            <i class="icon bi bi-person-fill"></i>
                        <p>Last Name : <span><?php echo $client['last_name']?></span></p>
            </div>

        <div class="d-flex gap-4">
        <i class="icon bi bi-envelope-at-fill"></i>
                        <p>Email : <span><?php echo $client['email']?></span></p>
        </div>

        <div class="d-flex gap-4">
                  <i class="icon bi bi-telephone"></i>
                        <p>Phone number : <span><?php echo $client['phone']?></span></p>
        </div>

        <div class="d-flex gap-4">
                <i class="icon fa-solid fa-passport"></i>
                        <p>Passport : <span><?php echo $client['Passport']?></span></p>
        </div>

        <div class="d-flex gap-4">
            <i class="icon bi bi-people-fill"></i>
                        <p>companion : <span><?php echo $client['companion']?></span></p>
        </div>

        <div class="d-flex gap-4">
        <i class="bi bi-cash-coin"></i>
                        <p>Paument Amount : <span><?php echo $client['payment_amount']?>  DH</span></p>
        </div>

        <div class="d-flex gap-4">
        <i class="bi bi-credit-card-2-back-fill"></i>
                        <p>Did the Client Pay : <span><?php echo $client['Is_It_Paid']?></span></p>
        </div>

            </div>
            <div class="mt-5 col-12 col-sm-5 offset-2">
            <div class="d-flex gap-4">
            <i class="icon bi bi-calendar-minus-fill"></i>
                    <p>Date : <span><?php echo $client['order_date']?></span></p>

            </div>
            <div class="d-flex gap-2">
                  <i class="icon fa-solid fa-plane-arrival"></i>
                        <p>Date of coming : <span><?php echo $client['dateOfComing']?></span></p>
            </div>

            <div class="d-flex gap-4">
              <i class="icon bi bi-geo"></i>
                        <p>Adress : <span><?php echo $client['address']?></span></p>
            </div>

            <div class="d-flex gap-4">
                  <i class="icon bi bi-flag-fill"></i>
                        <p>Post Code : <span><?php echo $client['zip_code']?></span></p>
            </div>

            <div class="d-flex gap-4">
                  <i class="icon bi bi-flag-fill"></i>
                        <p>Country : <span><?php echo $client['country']?></span></p>
            </div>

            <div class="d-flex gap-4">
              <i class="icon bi bi-airplane"></i> 
                        <p>Need a visa : <span><?php echo $client['visa']?></span></p>
            </div>

            </div>
            </div>
            <h4 class="text-center fw-bold mt-2">SERVICES THIS CLIENT CHOSE</h4>
            <?php 
            $services = unserialize($client['services']);
            foreach($services as $service){
                echo '<p class="text-center m-3">' . $service . '</p>';
            }
            ?>
</main>
    </div>
</body>
