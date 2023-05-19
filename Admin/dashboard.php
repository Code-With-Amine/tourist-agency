<?php
    require_once 'Inquiries/common_functions.php';
    require_once '../include/database.php';
    session_start();
    if(!isset($_SESSION['admin'])){
            header('location:../index.php');
    }

    $inquires = $pdo->query('SELECT * FROM inquiries order by day(date) desc , f_Name asc ')->fetchAll(PDO::FETCH_ASSOC);
    $orders = $pdo->query('SELECT * from orders')->fetchAll(PDO::FETCH_ASSOC);
    $clients = $pdo->query('SELECT * FROM clients');
    // Retrieve visitor count
    $select_query = "SELECT COUNT(*) as visitor_count FROM visitors";
    $stmt = $pdo->query($select_query);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $visitor_count = $row['visitor_count'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://kit.fontawesome.com/d83f7e2869.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/ccommonStyle.css">
    <link rel="stylesheet" href="../css/styleAdmin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    
    <!-- add the favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon_io/favicon-16x16.png">
    <link rel="manifest" href="favicon_io/site.webmanifest">
    <title>Dashboard</title>
</head>

<body id="page-content">
<main class="d-flex w-100">
    <nav class="dashboard_navBar rounded">
        <img src="../images/logo.png" alt="logo" class="col-6 logo mt-5">
        <h5 class="text-center">IDOFTASSILA</h5>
        <ul class="navbar-nav flex-column px-5 py-4">
            <li class="nav-item ">
                <a class="nav-link py-3 text-center" href="add_services/services.php">Add Services</a>
              </li>
              <li class="nav-item">
                <a class="nav-link py-3 text-center" href="Regional_Adventures/add_cities.php">Regional Adventures</a>
              </li>
              <li class="nav-item">
                <a class="nav-link py-3 text-center" href="social_networks/add.php">Social Networks</a>
              </li>
              <li class="nav-item">
                <a class="nav-link py-3 text-center" href="social_Media/index.php">Socail Media</a>
              </li>
              <li class="nav-item">
                <a class="nav-link py-3 text-center" href="clients/All_clients.php">Clients</a>
              </li>
              <li class="nav-item">
                <a class="nav-link py-3 text-center" href="comments/comment.php">Add a Comment</a>
              </li>
              <li class="nav-item">
              <div class="d-flex justify-content-center">
                <div class="btn-group dropend mx-auto">
                    <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    settings
                    </button>
                    <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="setting/logIn.php">Change Log in</a></li>
                    <li><a class="dropdown-item" href="setting/password.php">Change Password</a></li>
                    </ul>
                </div>
                </div>
              </li>
            </ul>
        </ul>
    </nav>

<section>
    <!-- second nav bar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light ps-5">
            <a class="navbar-brand" href="../index.php"><i class="bi bi-house-door-fill"></i></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Dashboard</span></a>
                </li>

                </ul>
                <form class="form-inline my-2 my-lg-0">
                <!-- Translation Code here -->
					<span class="translate">
                        <div class="select-wrapper">
                    <i class="fa-solid fa-globe showTransalation"></i>

					    <div class="translate pe-3" id="google_translate_element"></div>
                            <script type="text/javascript" src="../js/translatePage.js"></script>
                            <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                        </div>
                    </span>
					<!-- Translation Code End here -->

                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="search-bar">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>

            </div>
            </nav>


        <div href="" class="row gap-5 m-4 justify-content-center">
            <!-- new order -->
                <div class="box_shadow radius card p-3 col row statistics">

                <div class="col-6"><img src="../images/order.jpeg" alt="people icon" class="Dashboard_icons" style="background-color: #AAA3FE"></div>
                <div class="col-6 Dashboard_desc">
                    <p class="text-center fw-bold"><?php echo count($orders)?></p>
                    <p class="text-center fw-bold">new orders</p>
                </div>

                </div>
            <!-- inquiries -->
            <div class="box_shadow radius card p-3 col row statistics">
                <div class="col-6"><img src="../images/inquiry_icon.png" alt="order icon" class="Dashboard_icons" style="background-color: #FFE7CB"></div>
                <div class="col-6 Dashboard_desc">
                    <p class="text-center fw-bold"><?php echo count($inquires) ?></p>
                    <p class="text-center fw-bold">Inquiries</p>
            </div>
        </div>
            <!-- clients -->
            <div class="box_shadow radius card p-3 col row statistics">
                <div class="col-6"><img src="../images/clients.svg" alt="icon" class="Dashboard_icons py-2" style="background-color: #DE608E"></div>
                 <div class="col-6  Dashboard_desc">
                    <p class="text-center fw-bold"><?php echo $clients->rowCount()?></p>
                    <p class="text-center fw-bold">Clients</p>
                </div>
            </div>
            <!-- visitors -->
            <div class="box_shadow radius card p-3 col row statistics">

            <div class="col-6"><img src="../images/people.png" alt="icon" class="Dashboard_icons" style="background-color: #DE608E"></div>
                <div class="col-6 Dashboard_desc">
                    <p class="text-center fw-bold"><?php echo $visitor_count; ?></p>
                    <p class="text-center fw-bold">visitors</p>
                </div>

            </div> 
    

    
    <?php
        // show err message
        if(isset($_GET['err'])){
            showMessage($_GET['err']);
    }
    ?>

    <div class="d-flex flex-column">
             <!-- New registers -->
             <div class="box_shadow radius card p-3 m-3">
                <div class="row">
                <div class="col"><h2>New Orders</h2></div>
                
                <div class="col">
                    <input class="form-control me-2" type="search" id="search-input-orders" placeholder="Search" aria-label="Search" data-search>
                </div>



                <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                    <th scope="col">user</th>
                    <th scope="col">email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Date</th>
                    <th scope="col">country</th>
                    <th scope="col">Status</th>
                    <th scope="col">Check</th>
                    <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach($orders as $order){
                    ?>
                        <tr class="tr-orders">
                                <th scope="row"><?php echo $order['id'] ?></th>
                                <td data-name><?php echo $order['first_name']?>  <?php echo $order['last_name']?></td>
                                <td data-email><?php echo $order['email']?></td>
                                <td data-whatssap=""><?php echo $order['phone']?></td>
                                <td data-date><?php echo $order['order_date']?></td>
                                <td data-country=""><?php echo $order['country']?></td>
                                <td data-status><span class="<?php echo $order['status'] == 'Pending' ? 'pending' :'seen' ?>"><?php echo $order['status']?></span></td> <!-- show if the inquiry is been read to not -->
                                <td><a href="orders/order.php?order=<?php echo urlencode(json_encode($order))?>" class="ms-4"><i class="bi bi-send"></i></a></td>  <!-- send the admin to  a page to see the full inquiry and change the status to seen  -->
                                <td><a href="orders/delete.php?id=<?php echo $order['id']?>" onclick="return confirm('are you sure you whant to delete <?php echo $order['first_name']?>  <?php echo $order['last_name']?> order')"> <i class="bi bi-archive-fill"></i> </a> </td> <!-- delete the inquiry from  the data base -->
                        </tr>
                    <?php
                        }
                    ?>
                </tbody>

                </table>

                </div>
</div>   
        <!-- Client inquiries -->
        <div  class="box_shadow radius card p-3 m-3">
        <div class="row">    
        
        <div class="col"><h2>Recent Inquiries</h2></div>
        
        <div class="col">
            <input class="form-control me-2" type="search" id="search-input" placeholder="Search" aria-label="Search" data-search>
        </div>

        </div>


<table class="table">
  <thead>
    <tr>
        <th>ID</th>
      <th scope="col">user</th>
      <th scope="col">email</th>
      <th scope="col">whatsapp</th>
      <th scope="col">Date</th>
      <th scope="col">Status</th>
      <th scope="col">Check</th>
      <th></th>
    </tr>
    </thead>
    <tbody>
    <?php
        $numberOfInquiries = 1;
        foreach($inquires as $inquiry){
    ?>
        <tr class="tr">
                <th scope="row"><?php echo $numberOfInquiries++ ?></th>
                <td data-name><?php echo $inquiry['f_Name']?>  <?php echo $inquiry['L_Name']?></td>
                <td data-email><?php echo $inquiry['email']?></td>
                <td data-whatssap=""><?php echo $inquiry['Whatsapp_Number']?></td>
                <td data-date><?php echo $inquiry['date']?></td>
                <td data-status><span class="<?php echo $inquiry['status'] == 'Pending' ? 'pending' :'seen' ?>"><?php echo $inquiry['status']?></span></td> <!-- show if the inquiry is been read to not -->
                <td><a href="Inquiries/seeInquiry.php?client=<?php echo urlencode(json_encode($inquiry))?>" class="ms-4"><i class="bi bi-send"></i></a></td>  <!-- send the admin to  a page to see the full inquiry and change the status to seen  -->
                <td><a href="Inquiries/delete.php?id=<?php echo $inquiry['id']?>" onclick="return confirm('are you sure you whant to delete <?php echo $inquiry['f_Name']?>  <?php echo $inquiry['L_Name']?> Inquiry')"> <i class="bi bi-archive-fill"></i> </a> </td> <!-- delete the inquiry from  the data base -->
        </tr>
    <?php
        }
    ?>
</tbody>

</table>
        </div>

    </div>
    </div>

</section>
</main>

<script src="js/searchbar.js"></script>
<script src="js/serach_orders.js"></script>
<script src="js/searchPage.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>
 </html>
