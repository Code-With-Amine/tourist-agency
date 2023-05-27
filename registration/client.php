<?php
require_once '../include/database.php';
$services = $pdo->query('SELECT * FROM services')->fetchAll(PDO::FETCH_ASSOC); // services array

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://kit.fontawesome.com/d83f7e2869.js" crossorigin="anonymous"></script>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <script src="https://kit.fontawesome.com/d83f7e2869.js" crossorigin="anonymous"></script>
  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">  

  <!-- Bootstrap Select CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css">

    <link rel="stylesheet" href="../css/ccommonStyle.css">
    <link rel="stylesheet" href="styleForm.css">

    <!-- add the favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon_io/favicon-16x16.png">
    <link rel="manifest" href="favicon_io/site.webmanifest">
    <title>Client</title>
</head>
<body id="page-content">
    <div class="container ">

    <nav class="row align-items-center">
        <a href="../index.php" class="col-6">
                <img src="../images/backwards_arrow.png" alt="backwards_arrow" class="backwards">
        </a>

       <!-- <img src="../images/logo.png" alt="logo" class="col-6 logo"> -->
        <!-- Translation Code here -->
        <span class="translate px-2 col-6">
                        <div class="select-wrapper">
                    <i class="fa-solid fa-globe showTransalation"></i>

					    <div class="translate pe-3" id="google_translate_element"></div>
                            <script type="text/javascript" src="../js/translatePage.js"></script>
                            <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                        </div>
                    </span>
					<!-- Translation Code End here -->
    </nav>

<div class="form radius">
          <p class="lead text-center my-4 text-success fw-bold">Fill out this form and we will get back to you</p>
          <form action="../php_retrieve_data/orders.php" method="post">

            <?php
              echo isset($_GET['err'])?$_GET['err']:'';
            ?>
          
            <div class="mb-5">
                <label for="first-name" class="form-label text-center">First Name:</label>
                  <div class="d-flex">
                  <i class="icon bi bi-person-fill"></i>
                <input type="text" class="" id="first-name" name="first-name" value="<?php echo isset($_GET['firstName'])?$_GET['firstName']:'' ?>"/>
                </div>
            </div>

        <div class="mb-5">
            <label for="last-name" class="form-label">Last Name:</label>
            <div class="d-flex">
                  <i class="icon bi bi-person-fill"></i>
            <input type="text" class="" id="last-name" name="last-name" value="<?php echo isset($_GET['lastName'])?$_GET['lastName']:'' ?>"/>
            </div>
          </div>

    <div class="mb-5">
        <label for="email" class="form-label">Email:</label>
        <div class="d-flex">
                <i class="icon bi bi-envelope-at-fill"></i>
                <input type="email" class="" id="email" name="email" value="<?php echo isset($_GET['email'])?$_GET['email']:'' ?>"/>
    </div>
      </div>
  
    <div class="mb-5">
  
      <label for="chooseCountry" class="form-label">Choose a country:</label>
      <div class="d-flex">
                  <i class="icon bi bi-flag-fill"></i>
                  <input type="text" id="chooseCountry" list="countries" class="" name="country"  value="<?php echo isset($_GET['country'])?$_GET['country']:'' ?>">
      <datalist id="countries"></datalist>
      </div>
    </div>
    
    <div class="mb-5">
  <label for="zip-code" class="form-label">Zip Code:</label>
  <div class="d-flex">
                  <i class="icon bi bi-flag-fill"></i>
                  <input type="number" id="zip-code" class="" name="zip-code"  value="<?php echo isset($_GET['zipCode'])?$_GET['zipCode']:'' ?>">
    </div>
    </div>

  <div class="mb-5">
    <label for="address" class="form-label">Home Address street house number :</label>
    <div class="d-flex">
              <i class="icon bi bi-geo"></i>
              <input type="text" id="address" class="" name="address"  value="<?php echo isset($_GET['address'])?$_GET['address']:'' ?>">
    </div>
    </div>


  <div class="mb-5">
    <label for="visa" class="form-label">Do you need a visa in order to visite morocco:</label>
    <div class="d-flex gap-5">
              <i class="icon bi bi-airplane"></i> 
              <select class="form-select" id="visa" name="visa" aria-label="visa"  value="<?php echo isset($_GET['isVisaRequired'])?$_GET['isVisaRequired']:'' ?>">
                      <option>yes</option>
                      <option>no</option>
                    </select>
    </div>
  </div>

    <div class="mb-5">
        <label for="phone" class="form-label">Phone Number:</label>
        <div class="d-flex">
                  <i class="icon bi bi-telephone"></i>
                  <input type="tel" class="" id="phone" name="phone" value="<?php echo isset($_GET['phone'])?$_GET['phone']:'' ?>"/>
        </div>
      </div>

    <div class="mb-5">
      <label for="dateOfComing" class="form-label">Please select the date you expect of coming to morocco :</label>
      <div class="d-flex gap-2">
                  <i class="icon fa-solid fa-plane-arrival"></i>
                  <input type="date" class="" id="dateOfComing" name="dateOfComing"  value="<?php echo isset($_GET['dateOfComing'])?$_GET['dateOfComing']:'' ?>"/>
        </div>
    </div>

  <div class="mb-5">
      <label for="Passport" class="form-label">Passport Number :</label>
      <div class="d-flex gap-2">
                <i class="icon fa-solid fa-passport"></i>
                <input type="text" class="" id="Passport" name="Passport"  value="<?php echo isset($_GET['passport'])?$_GET['passport']:'' ?>"/>
      </div>
    </div>

  <div class="mb-5">
    <label for="companion" class="form-label">Please Tell us how many people will accompany with you :</label>
    <div class="d-flex">
            <i class="icon bi bi-people-fill"></i>
            <input type="number" class="" id="companion" name="companion"  min=0 value="<?php echo isset($_GET['companion'])?$_GET['companion']:'' ?>"/>
    </div>
  </div>

<div class="mb-5">
      <label for="" class="form-label">SELECT SERVICES</label>

      <select name="services[]" id="services" class="form-control selectpicker"  value="<?php echo isset($_GET['lastName'])?$_GET['lastName']:'' ?>" multiple>
<?php
    foreach($services as $service){
?>
      <option value="<?php echo $service['name']?>"><?php echo $service['name']?></option>
<?php
    }
?>
      </select>
      </div>

<div class="mb-5">
        <input type="submit" value="submit" name="submit" class="fw-bold rounded">
</div>
  </form>
  </div>
</div>
</div>
    

  <script src="../js/setCountries.js"></script>
  <!-- Bootstrap and jQuery JS -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.0/js/bootstrap.bundle.min.js"></script>
  
  <!-- Bootstrap Select JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js"></script>
  
  <script>
$(document).ready(function() {
  $('#services').selectpicker();
});

// Add a hidden input for each selected option
$('#services').on('changed.bs.select', function (e, clickedIndex, isSelected, previousValue) {
  if (isSelected) {
    var selectedOption = $('#services option')[clickedIndex].value;
    var inputName = 'services_' + selectedOption;
    var inputValue = selectedOption;
    var inputHtml = '<input type="hidden" name="' + inputName + '" value="' + inputValue + '">';

    $(this).parent().append(inputHtml);
  } else {
    var selectedOption = $('#services option')[clickedIndex].value;
    var inputName = 'services_' + selectedOption;

    $(this).parent().find('input[name="' + inputName + '"]').remove();
  }
});


  </script>
</body>
</html>
