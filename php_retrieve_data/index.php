<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

        if (isset($_POST['submit'])) {
        
          // Get form data
          $first_name = trim($_POST["First_name"]);
          $last_name = trim($_POST["Last_name"]);
          $email = trim($_POST["email"]);
          $phone = trim($_POST["phone_number"]);
          $message = trim($_POST["message"]);
        
          // Validate form data
          $errors = array();
          if (empty($first_name)) {
            $errors[] = "First name is required.";
          }
          if (empty($last_name)) {
            $errors[] = "Last name is required.";
          }
          if (empty($email)) {
            $errors[] = "Email is required.";
          } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalid email format.";
          }
          if (empty($country)) {
            $errors[] = "Country is required.";
          }
          if (empty($phone)) {
            $errors[] = "Phone number is required.";
          }
        
          // If there are no validation errors, send email
          if (empty($errors)) {
            $to = "contactmetocreateyoursite@gmail.com";
            $subject = "New meeting request from $first_name $last_name";
            $message = "Name: $first_name $last_name\n";
            $message .= "Email: $email\n";
            $message .= "Phone: $phone\n";
            $message .= "Free Time: $message\n";
            $headers = "From: $email\r\n" .
                       "Reply-To: $email\r\n" .
                       "X-Mailer: PHP/" . phpversion();
            mail($to, $subject, $message, $headers);
            header('location:index.html');
            echo "alert(<p class='alert alert-success'>Thank you for your meeting request. We will get back to you soon.</p>)";
          } else {
            header('location:index.html');
            // If there are validation errors, display error messages
            echo "<ul class='alert alert-danger'>";
            foreach ($errors as $error) {
              echo "<li>$error</li>";
            }
            echo "</ul>";
          }
        
          exit;
        }
        header('location:index.html');
        // If there are validation errors, display error messages
        echo "alert(somthing went wrong please try again)";
?>