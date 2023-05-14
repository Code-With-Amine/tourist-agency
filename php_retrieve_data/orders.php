<?php
require_once '../include/database.php';

$selectedServices = $_POST['services'];
$f_name = $_POST['first-name'];
$l_name = $_POST['last-name'];
$email = $_POST['email'];
$country = $_POST['country'];
$zip_code = $_POST['zip-code'];
$address = $_POST['address'];
$isVisaRequired = $_POST['visa'];
$phone = $_POST['phone'];
$dateOfComing = $_POST['dateOfComing'];
$comapning = $_POST['companion'];
$passport = $_POST['Passport'];


function errors($errNum){
      switch($errNum){
        case 0:
          return '<div class="alert alert-success text-center">We received your application we will contact you soon stay tuned</div>';
          break;
        case 1:
          return '<div class="alert alert-danger text-center">All the fields are required </div>';
          break;
        case 2:
          return '<div class="alert alert-danger text-center">Somthing went wrong please try again</div>';
          break;
        case 3:
          return '<div class="alert alert-danger text-center">Passport number or the email are already exsist please enter a valide informations </div>';
          break;
      }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['first-name']) && !empty($_POST['last-name']) && !empty($_POST['email']) && !empty($_POST['country']) && !empty($_POST['zip-code']) && !empty($_POST['address']) && !empty($_POST['visa']) && !empty($_POST['phone']) && !empty($_POST['dateOfComing']) && isset($_POST['companion']) && !empty($_POST['services']) && !empty($_POST['Passport']) ) {
  
     try{ 
                          //check if the email or Passport  number already exists in the database
                          $sqlCheck = $pdo->prepare('SELECT * FROM orders WHERE email = ? OR passport = ?');
                          $sqlCheck->execute([$email, $passport]);
      
                          if($sqlCheck->rowCount() > 0){
                            header('location: ../registration/client.php?selectedServices='.$selectedServices.'&firstName='.$f_name.'&lastName='.$l_name.'&email='.$email.'&country='.$country.'&zipCode='.$zip_code.'&address='.$address.'&isVisaRequired='.$isVisaRequired.'&phone='.$phone.'&dateOfComing='.$dateOfComing.'&companion='.$comapning.'&passport='.$passport.'&err='.errors(3));
      
                          } else {
                              //no similar email or Passport found, insert the new inquiry into the database
                              $date = date('y-m-d');
                              $status = 'Pending';
                              $sqlInsert = $pdo->prepare('INSERT INTO orders (first_name, last_name, email, country, zip_code, address, visa, phone, dateOfComing, companion, services, Passport, order_date, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
                              $sqlInsert->execute([$f_name, $l_name, $email, $country, $zip_code, $address, $isVisaRequired, $phone, $dateOfComing, $comapning, serialize($selectedServices), $passport, $date, $status]);
                              
                              header('location: ../registration/client.php?err='.errors(0));

                          }
     }catch(Exception $err){
      header('Location: ../registration/client.php?selectedServices='.$selectedServices.'&firstName='.$f_name.'&lastName='.$l_name.'&email='.$email.'&country='.$country.'&zipCode='.$zip_code.'&address='.$address.'&isVisaRequired='.$isVisaRequired.'&phone='.$phone.'&dateOfComing='.$dateOfComing.'&companion='.$comapning.'&passport='.$passport.'&err='.errors(2));

     }
                        }


    else{
          header('Location: ../registration/client.php?selectedServices='.$selectedServices.'&firstName='.$f_name.'&lastName='.$l_name.'&email='.$email.'&country='.$country.'&zipCode='.$zip_code.'&address='.$address.'&isVisaRequired='.$isVisaRequired.'&phone='.$phone.'&dateOfComing='.$dateOfComing.'&companion='.$comapning.'&passport='.$passport.'&err='.errors(1));
}

?>