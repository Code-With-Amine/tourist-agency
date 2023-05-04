<?php
if(isset($_GET['client'])){
  include_once '../../include/database.php';
  require_once 'common_functions.php';
  $visitor_inquiry = json_decode(urldecode($_GET['client']), true);

  // update status to seen
  Updatestatus($pdo, 'inquiries', 'Seen', $visitor_inquiry['id']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://kit.fontawesome.com/d83f7e2869.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/ccommonStyle.css">
    <link rel="stylesheet" href="../../css/client.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- add the favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon_io/favicon-16x16.png">
    <link rel="manifest" href="favicon_io/site.webmanifest">
    <title>Inquiriy</title>
</head>
<body>
    <div class="container ">

    <nav class="row">
        <a href="../dashboard.php" class="col-6">
                <img src="../../images/backwards_arrow.png" alt="backwards_arrow" class="backwards">
        </a>
    </nav>
    <div class="container wrap_client box_shadow mt-5">
   <span>
     <a href="delete.php?id=<?php echo $visitor_inquiry['id']?>" onclick="return confirm('are you sure you whant to delete <?php echo $visitor_inquiry['f_Name']?>  <?php echo $visitor_inquiry['L_Name']?> Inquiry')" class="me-3 btn"><i class="bi bi-x-lg"></i> </a>
    <a href="updateToPending.php?id=<?php echo $visitor_inquiry['id']?>" class="btn ms-3" title="make as unread" ><i class="bi bi-bookmark-x"></i></a>
    </span>
    <h1 class="text-center">Client Inquiry</h1>
    <div class="row">
      <div class="col-sm-6">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Name</h3>
          </div>
          <div class="panel-body">
            <p><strong>First Name:</strong> <?php echo $visitor_inquiry['f_Name']?></p>
            <p><strong>Last Name:</strong> <?php echo $visitor_inquiry['L_Name']?></p>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Contact Information</h3>
          </div>
          <div class="panel-body">
            <p><strong>Email:</strong> <a href="mailto:<?php echo $visitor_inquiry['email']?>" target="_blank" class="btn"><?php echo $visitor_inquiry['email']?></a></p>
            <p><strong>WhatsApp Number:</strong><a href="https://api.whatsapp.com/send?phone=<?php echo $visitor_inquiry['Whatsapp_Number']?>" target="_blank" class="btn"> <?php echo $visitor_inquiry['Whatsapp_Number']?></a></p>
          </div>
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Inquiry</h3>
      </div>
      <div class="panel-body">
        <p><?php echo $visitor_inquiry['Inquiry']?></p>
      </div>
    </div>
  </div>
</div>

  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Bootstrap JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script></body>
</html>
