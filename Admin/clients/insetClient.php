<?php
require_once '../../include/database.php';
    if(isset($_GET['order'])){
        $client =  json_decode(urldecode($_GET['order']), true); 
        $date = date('y-m-d');
        $status = 'Pending';
         //check if the email or Passport  number already exists in the database
         $sqlCheck = $pdo->prepare('SELECT * FROM clients WHERE email = ?');
        $sqlCheck->execute([$client['email']]);
            
        if($sqlCheck->rowCount() > 0){
          header('location: All_clients.php');
            
        } else {
            //no similar email or Passport found, insert the new inquiry into the database
        $sqlInsert = $pdo->prepare('INSERT INTO clients (first_name, last_name, email, country, zip_code, address, visa, phone, dateOfComing, companion, services, Passport, order_date, status, payment_amount, Is_It_Paid) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
        $sqlInsert->execute([$client['first_name'], 
                                $client['last_name'], 
                                $client['email'], 
                                $client['country'], 
                                $client['zip_code'], 
                                $client['address'], 
                                $client['visa'], 
                                $client['phone'], 
                                $client['dateOfComing'], 
                                $client['companion'], 
                                $client['services'], 
                                $client['Passport'], 
                                $client['order_date'],
                                $status ,
                                0,
                                'no']);

            // delete the order
            $sqlSate = $pdo->prepare('DELETE FROM orders WHERE id = ?');
            $sqlSate->execute([$client['id']]);

            header('location: All_clients.php');

        }

    }
?>
