<?php
require_once '../include/database.php';



    if(isset($_POST['submit'])){
            if(!empty($_POST['First_name']) && !empty($_POST['Last_name']) && !empty($_POST['email']) && !empty($_POST['whatsapp_number']) && !empty($_POST['Inquiry'])){
                    $first_name = $_POST['First_name'];
                    $last_name = $_POST['Last_name'];
                    $email = $_POST['email'];
                    $whatssap = $_POST['whatsapp_number'];
                    $inquiry = $_POST['Inquiry'];

                    //check if the email or WhatsApp number already exists in the database
                    $sqlCheck = $pdo->prepare('SELECT * FROM inquiries WHERE email = ? OR whatsapp_number = ?');
                    $sqlCheck->execute([$email, $whatssap]);

                    if($sqlCheck->rowCount() > 0){
                         header('location:../index.php?err=2&fname'.$_POST['First_name'].'&lname'.$_POST['Last_name'].'&email'.$_POST['email'].'&inquiry'.$_POST['Inquiry'].'&whatsapp'.$_POST['whatsapp_number']);

                    } else {
                        //no similar inquiry found, insert the new inquiry into the database
                        $date = date('y-m-d');
                        $sqlInsert = $pdo->prepare('INSERT INTO inquiries (f_Name, L_Name, Whatsapp_Number, email, inquiry, date, status) VALUES(?, ?, ?, ?, ?, ?, ?)');
                        $sqlInsert->execute([$first_name, $last_name, $whatssap, $email, $inquiry, $date, 'Pending']);
                        header('location: ../index.php?err=0');
                    }
            }else{
                    header('location:../index.php?err=1&fname'.$_POST['First_name'].'&lname'.$_POST['Last_name'].'&email'.$_POST['email'].'&inquiry'.$_POST['Inquiry'].'&whatsapp'.$_POST['whatsapp_number']);
            }
    }
?>