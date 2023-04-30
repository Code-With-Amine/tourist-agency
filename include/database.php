<?php
    try{

        $pdo = new PDO("mysql:host=localhost;dbname=Tourist_Agency", 'root' , '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);

    }catch(Exception $err){
        die('Connection failed : '.$err->getMessage());
    }
?>
