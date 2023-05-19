<?php
session_start();
if(!isset($_SESSION['admin'])){
            echo '<h2>Please Log in</h2>';
    }else{
    include_once '../../include/database.php';
    include_once '../Inquiries/common_functions.php';
    $order = json_decode(urldecode($_GET['order']), true);
    Updatestatus($pdo, 'orders', 'Seen', $order['id']);

?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://kit.fontawesome.com/d83f7e2869.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/client.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../css/ccommonStyle.css">

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

<nav class="row">
    <a href="../dashboard.php" class="col">
            <img src="../../images/backwards_arrow.png" alt="backwards_arrow" class="backwards">
    </a>
                <!-- Translation Code here -->
                <span class="translate col mt-3">
                        <div class="select-wrapper">
                    <i class="fa-solid fa-globe showTransalation"></i>

					    <div class="translate pe-3" id="google_translate_element"></div>
                            <script type="text/javascript" src="../../js/translatePage.js"></script>
                            <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                        </div>
                    </span>
					<!-- Translation Code End here -->
</nav>

    <main class="display-order box_shadow radius mx-auto pb-4">
    <a href="delete.php?id=<?php echo $order['id']?>" onclick="return confirm('are you sure you whant to delete <?php echo $visitor_inquiry['f_Name']?>  <?php echo $visitor_inquiry['L_Name']?> Inquiry')" class="me-3 btn p-2"><i class="bi bi-x-lg"></i> </a>
    <a href="updateStauts.php?id=<?php echo $order['id']?>" class="btn p-2" title="make as unread" ><i class="bi bi-bookmark-x"></i></a>

        <h3 class="text-center fw-bold ">Order number  <?php echo $order['id']?></h3>
        <div class="row p-5">
            <div class="mt-5 col-12 col-sm-5">

            <div class="d-flex gap-4">
                  <i class="icon bi bi-person-fill"></i>
                        <p>First Name : <span><?php echo $order['first_name']?></span></p>
            </div>

            <div class="d-flex gap-4">
            <i class="icon bi bi-person-fill"></i>
                        <p>Last Name : <span><?php echo $order['last_name']?></span></p>
            </div>

        <div class="d-flex gap-4">
        <i class="icon bi bi-envelope-at-fill"></i>
                        <p>Email : <span><?php echo $order['email']?></span></p>
        </div>

        <div class="d-flex gap-4">
                  <i class="icon bi bi-telephone"></i>
                        <p>Phone number : <span><?php echo $order['phone']?></span></p>
        </div>

        <div class="d-flex gap-4">
                <i class="icon fa-solid fa-passport"></i>
                        <p>Passport : <span><?php echo $order['Passport']?></span></p>
        </div>

        <div class="d-flex gap-4">
            <i class="icon bi bi-people-fill"></i>
                        <p>companion : <span><?php echo $order['companion']?></span></p>
        </div>

            </div>
            <div class="mt-5 col-12 col-sm-5 offset-2">
            <div class="d-flex gap-4">
            <i class="icon bi bi-calendar-minus-fill"></i>
                    <p>Date : <span><?php echo $order['order_date']?></span></p>

            </div>
            <div class="d-flex gap-2">
                  <i class="icon fa-solid fa-plane-arrival"></i>
                        <p>Date of coming : <span><?php echo $order['dateOfComing']?></span></p>
            </div>

            <div class="d-flex gap-4">
              <i class="icon bi bi-geo"></i>
                        <p>Adress : <span><?php echo $order['address']?></span></p>
            </div>

            <div class="d-flex gap-4">
                  <i class="icon bi bi-flag-fill"></i>
                        <p>Post Code : <span><?php echo $order['zip_code']?></span></p>
            </div>

            <div class="d-flex gap-4">
                  <i class="icon bi bi-flag-fill"></i>
                        <p>Country : <span><?php echo $order['country']?></span></p>
            </div>

            <div class="d-flex gap-4">
              <i class="icon bi bi-airplane"></i> 
                        <p>Need a visa : <span><?php echo $order['visa']?></span></p>
            </div>

            </div>
            </div>
            <h4 class="text-center fw-bold mt-2">SERVICES THIS CLIENT CHOSE</h4>
            <?php 
            $services = unserialize($order['services']);
            foreach($services as $service){
                echo '<p class="text-center m-3">' . $service . '</p>';
            }
            ?>
</main>

        <a href="../clients/insetClient.php?order=<?php echo urlencode(json_encode($order))?>" role="button" class="d-block mx-auto btn btn-primary w-25 m-3" onclick="return confirm('Do you understand that after moving this person to the clients part it will be delete from the orders')">
        Move it as a client
        </a>
    </div>
</body>
<?php } ?>