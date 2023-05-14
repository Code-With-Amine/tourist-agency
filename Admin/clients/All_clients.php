<?php
    include_once '../../include/database.php';
    $clients = $pdo->query('SELECT * FROM clients order by dateOfComing')->fetchAll(PDO::FETCH_ASSOC);
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://kit.fontawesome.com/d83f7e2869.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../css/styleAdmin.css">
    <link rel="stylesheet" href="../../css/ccommonStyle.css">
    
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
    <a href="../dashboard.php" >
            <img src="../../images/backwards_arrow.png" alt="backwards_arrow" class="backwards">
    </a>
</nav>
<div class="box_shadow radius p-3 m-3" style="height: 100vh;background: white;">
                <div class="row">
                    <?php
                            if(isset($_GET['err'])){
                                switch($_GET['err']){
                                    case 0:
                                        echo '<div class="alert alert-success text-center">Successfully updated the client with the id = '.$_GET['id'] .'</div>';
                                        break;

                                    case 1:
                                        echo '<div class="alert alert-danger text-center"> the field cannot be empty for the client with the id = '.$_GET['id'] .' </div>';
                                        break;
                                    case 2:
                                        echo '<div class="alert alert-danger text-center">Failed to delete the client with the id = '.$_GET['id'] .' please try again </div>';
                                        break;
                                }

                            }
                    ?>
                <div class="col"><h2>Clients</h2></div>
                
                <div class="col">
                    <input class="form-control me-2" type="search" id="search-input" placeholder="Search" aria-label="Search" data-search>
                </div>



                <table class="table table-responsive">
                <thead>
                    <tr>
                        <th>ID</th>
                    <th scope="col">user</th>
                    <th scope="col">email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Date</th>
                    <th scope="col">country</th>
                    <th scope="col">Payment Amount</th>
                    <th scope="col">Paid</th>
                    <th scope="col">Status</th>
                    <th scope="col"></th>
                    <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach($clients as $client){
                    ?>
                        <tr class="tr">
                                <th scope="row"><?php echo $client['id'] ?></th>
                                <td data-name><?php echo $client['first_name']?>  <?php echo $client['last_name']?></td>
                                <td data-email><?php echo $client['email']?></td>
                                <td data-whatssap><?php echo $client['phone']?></td>
                                <td data-date><?php echo $client['order_date']?></td>
                                <td data-country><?php echo $client['country']?></td>
                                <td data-payment class="text-center"><?php echo $client['payment_amount']?> DH</td>
                                <td data-paid><?php echo $client['Is_It_Paid']?></td>
                                <td data-status><span class="<?php echo $client['status'] == 'Pending' ? 'pending' :'seen' ?>"><?php echo $client['status']?></span></td> <!-- show if the inquiry is been read to not -->
                                <td><a href="SeeClient.php?client=<?php echo urlencode(json_encode($client))?>" class="ms-4"><i class="bi bi-send"></i></a></td>  <!-- send the admin to  a page to see the full inquiry and change the status to seen  -->
                                <td><a href="delete.php?id=<?php echo $client['id']?>" onclick="return confirm('are you sure you whant to delete <?php echo $client['first_name']?>  <?php echo $client['last_name']?> order')"> <i class="bi bi-archive-fill"></i> </a> </td> <!-- delete the inquiry from  the data base -->
                        </tr>
                    <?php
                        }
                    ?>
                </tbody>

                </table>

                </div>
</div>   
    </div>

<script src="../js/searchClients.js"></script>
</body>
