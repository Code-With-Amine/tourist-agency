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
<body>
    <div class="container ">

    <nav class="row">
        <a href="../index.php" class="col-6">
                <img src="../images/backwards_arrow.png" alt="backwards_arrow" class="backwards">
        </a>

        <img src="../images/logo.png" alt="logo" class="col-6 logo">
    </nav>

<div class="form radius">
          <p class="lead text-center my-4 text-success fw-bold">Fill out this form and we will get back to you</p>
          <form action="../php_retrieve_data/orders.php" method="post">
            
            <div class="mb-5">
                <label for="first-name" class="form-label text-center">First Name:</label>
                <input type="text" class="" id="first-name" name="first-name"/>
            </div>

        <div class="mb-5">
            <label for="last-name" class="form-label">Last Name:</label>
            <input type="text" class="" id="last-name" name="last-name"/>
        </div>

    <div class="mb-5">
        <label for="email" class="form-label">Email:</label>
        <input type="email" class="" id="email" name="email"/>
    </div>
  
    <div class="mb-5">
  
      <label for="chooseCountry" class="form-label">Choose a country:</label>
      <input type="text" id="chooseCountry" list="countries" class="" name="country">
      <datalist id="countries"></datalist>
      
    </div>
    
    <div class="mb-5">
        <label for="phone" class="form-label">Phone Number:</label>
        <input type="tel" class="" id="phone" />
    </div>

    <div class="mb-5">
      <label for="dateOfComing" class="form-label">Please select the date you expect of coming to morocco :</label>
      <input type="date" class="" id="dateOfComing" name="dateOfComing"/>
  </div>

  <div class="mb-5">
    <label for="companing" class="form-label">Please Tell us how many people will accompany with you :</label>
    <input type="number" class="" id="companing" name="companing"/>
</div>

<div class="mb-5">
      <label for="" class="form-label">SELECT SERVICES</label>
      <select name="services[]" id="services" class="form-control selectpicker" multiple>
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
