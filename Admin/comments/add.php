<?php

function showErr($err){
    header('location: comment.php?err='.$err.'&client_id='.$_POST['ClientID'] .'&stars='.$_POST['stars'].'&comment='.$_POST['comment']);
}


if(isset($_POST['submit'])){
    require_once '../../include/database.php';
    if(!empty($_POST['ClientID']) && !empty($_POST['comment']) && isset($_POST['stars'])){
        $clientID = $pdo->prepare('SELECT * FROM comments WHERE client_id = ?');
        $id = $clientID->execute([$_POST['ClientID']]);
        if($clientID->rowCount() > 0){
            showErr(2);
        }else{
               try{
                 $sqlState = $pdo->prepare('INSERT INTO comments(client_id, comment, date, stars) VALUES(?, ? , ?, ?)');
                $date = date('y-m-d');
                $sqlState->execute([$_POST['ClientID'], $_POST['comment'], $date, $_POST['stars']]);
                showErr(0);
               }catch(Exception $err){
                showErr(3);
               }
        }
    }else{
        showErr(1);
    }
}

?>