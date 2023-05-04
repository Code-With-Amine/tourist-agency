<?php
require_once 'Inquiries/common_functions.php';
    require_once '../include/database.php';
    $inquires = $pdo->query('SELECT * FROM inquiries order by day(date) desc , f_Name asc ')->fetchAll(PDO::FETCH_ASSOC);

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
<body>
<section>
<div class="container">
    <a href="../index.php" class="col-6">
        <img src="../images/backwards_arrow.png" alt="backwards_arrow" class="backwards">
</a>

<div class="row">

    <div class="col offset-4">
        <h1>Dashboard</h1>
        <h3>Welcome back to the Dashboard.</h3>
        <p>Here you have the ability to update your website containt</p>
    </div>

    <div class="col">
        <!-- here add the website viwers later-->
    </div>
</div>


</div>

</section>

<section class="row">
    <nav class="col-3 dashboard_navBar rounded">
        <img src="../images/logo.png" alt="logo" class="col-6 logo">
        <h5 class="text-center">IDOFTASSILA</h5>
        <ul class="navbar-nav flex-column px-5 py-4">
            <li class="nav-item">
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

    <div class="col mt-4">
        <div href="" class="row gap-5 m-4 justify-content-center">
            <!-- new order -->
                <div class="box_shadow radius card p-3 col row">

                <div class="col-6"><img src="../images/order.jpeg" alt="people icon" class="Dashboard_icons" style="background-color: #AAA3FE"></div>
                <div class="col-6 mt-5 Dashboard_desc">
                    <p class="text-center fw-bold">445</p>
                    <p class="text-center fw-bold">new orders</p>
                </div>

                </div>
            <!-- inquiries -->
            <div class="box_shadow radius card p-3 col row">
                <div class="col-6"><img src="../images/inquiry_icon.png" alt="order icon" class="Dashboard_icons" style="background-color: #FFE7CB"></div>
                <div class="col-6 mt-5 Dashboard_desc">
                    <p class="text-center fw-bold"><?php echo count($inquires) ?></p>
                    <p class="text-center fw-bold">Inquiries</p>
            </div>
        </div>
            <!-- visitors -->
            <div class="box_shadow radius card p-3 col row">

            <div class="col-6"><img src="../images/people.png" alt="icon" class="Dashboard_icons" style="background-color: #DE608E"></div>
                <div class="col-6  mt-5 Dashboard_desc">
                    <p class="text-center fw-bold"> 4444</p>
                    <p class="text-center fw-bold">visitors</p>
                </div>

            </div>    
    
    </div>
    
    <?php
        // show err message
        if(isset($_GET['err'])){
            showMessage($_GET['err']);
    }
    ?>

    <div class="d-flex flex-column mt-5">
             <!-- New registers -->
             <div href="" class="box_shadow radius card p-3 m-3">
                <h3>New register</h3>
</div>   
        <!-- Client inquiries -->
        <div href="" class="box_shadow radius card p-3 m-3">
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

<script src="js/searchbar.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>
 </html>
