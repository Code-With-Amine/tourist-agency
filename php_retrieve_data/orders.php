<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $selectedServices = $_POST['services'];
  foreach ($selectedServices as $selectedService) {
    echo $selectedService . '<br>';
  }
}

?>