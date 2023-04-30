<?php

function update_Service_Name($newfileDestination, $newService ,$New_date, $id, $db){
    // send data to the data base
    $sqlState = $db->prepare('UPDATE services set image = ? , name = ?, creation_date = ? WHERE id = ?');
    $sqlState->execute([$newfileDestination, $newService, $New_date ,$id]);

    header('location: ../services.php?updated_Success');
}


function DeleteImage($path){

        if (file_exists($path)) { // check if the file exists
        unlink($path); // delete the file
         echo '<div class="alert-danger p-4 m-4"> File '.$path.' has been deleted.</div>';
        } else {
         echo '<div class="alert-danger p-4 m-4"> File '.$path.' does not exist.</div>';
        }

}


function uploadImage($newService){

    $file = $_FILES['file'];

    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileError = $_FILES['file']['error'];

    $fileExtention = explode('.',$fileName); // i will get an array conatins the name of the file and it's extention
    $fileActualExt = strtolower(end($fileExtention)); // end() a function gets the last element in the arry

    // arry contains the photo's extention that i want to allow
    $allowed = array('jpg', 'jpeg', 'png', 'gif', 'webp');

    if(in_array($fileActualExt, $allowed)){ // i check if the extention of the upoladed image inside of my allowed array it will return true
            if($fileError === 0){

                $fileNameNew = $newService . "." . $fileActualExt;
                $fileDestination = '../uploads/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);// first argument is the temprorary location of the file the second one is where i want the fille to move in
                return 'uploads/'.$fileNameNew;
                            }
    }else{
      echo '<div class="alert-danger p-4 m-4"> wrong file extention </div>';
    }

  }

?>