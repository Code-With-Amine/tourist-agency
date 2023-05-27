<?php
require_once '../../include/database.php';

function update($name, $link, $db){
    $sqlState = $db->prepare('UPDATE social_media SET link = ? WHERE name = ?');
    $sqlState->execute([$link, $name]);
    header('location:index.php?err=0');
}


function isNotItEmpty($var){
    if(!empty($var))
        return true;
    else
        header('location:index.php?err=1');
}

try{

if(isset($_POST['updateFacebook']) && isNotItEmpty($_POST['facebook'])){

        $link = $_POST['facebook'];
        $name = 'facebook';
        update($name, $link, $pdo);
        

}elseif(isset($_POST['updateLinkedin']) && isNotItEmpty($_POST['linkedin'])){

    $link = $_POST['linkedin'];
    $name = 'linkedin';
    
    update(trim($name), trim($link), $pdo);   

}elseif(isset($_POST['updateInstagram']) && isNotItEmpty($_POST['instagram'])){

    $link = $_POST['instagram'];
    $name = 'instagram';
    
        update(trim($name), trim($link), $pdo);

}elseif(isset($_POST['updateYoutube']) && isNotItEmpty($_POST['youtube'])){

    $link = $_POST['youtube'];
    $name = 'youtube';

    update(trim($name), trim($link), $pdo);
    


}elseif(isset($_POST['updatePhone']) && isNotItEmpty($_POST['phone'])){

    $link = $_POST['phone'];
    $name = 'phone';
    update(trim($name), trim($link), $pdo);

}elseif(isset($_POST['updateWhatsapp']) && isNotItEmpty($_POST['whatsapp'])){

    $link = $_POST['whatsapp'];
    $name = 'whatsapp';
    update(trim($name), trim($link), $pdo);

}elseif(isset($_POST['updateEmail']) && isNotItEmpty($_POST['email'])){

    $link = $_POST['email'];
    $name = 'email';
    update(trim($name), trim($link), $pdo);

}
}catch(Exception $err){
    header('location:index.php?err=3');
}

?>