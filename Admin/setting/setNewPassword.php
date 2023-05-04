<?php
require_once '../../include/database.php';

function checkPassword($password){
    $uppercase = preg_match('@[A-Z]@', $password); // At least one uppercase letter
    $lowercase = preg_match('@[a-z]@', $password); // At least one lowercase letter
    $number    = preg_match('@[0-9]@', $password); // At least one number
    $specialChars = preg_match('@[^\w]@', $password); // At least one special character

    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
        return false;
    } else {
        return true;
    }

}


if(isset($_POST['submit'])){
    if(!empty($_POST['current_password']) && !empty($_POST['new_Password']) && !empty($_POST['confirmed_password'])){
        
        $currPassword = $_POST['current_password'];
        $newPassword = $_POST['new_Password'];
        $confirmed = $_POST['confirmed_password'];
        $actulPassword = $pdo->query('SELECT password from admin')->fetch(PDO::FETCH_ASSOC);

        if(password_verify($currPassword, $actulPassword['password'])){ // i checked if the current password is the same one in my database
            if($newPassword === $confirmed){

                if(checkPassword($newPassword)){

                    // Hash the password using the bcrypt algorithm with a cost factor of 12
                    $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT, ['cost' => 12]);
                    $pdo->prepare('UPDATE admin SET password = ? ')->execute([$hashedPassword]);
                    header('location:password.php?err=5');

                }else{
                    header('location:password.php?err=3');
                }
            }else{
                header('location:password.php?err=4');
            }
        }else{
            header('location:password.php?err=2');
        }
            
    }else{
        header('location:password.php?err=1');
    }
}
?>