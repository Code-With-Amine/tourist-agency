<?php 
require_once '../../include/database.php';

$error = '';
// the below code is jut to display errors
ini_set('display_errors', 1); 
error_reporting(E_ALL);

    if(isset($_POST['submit'])){
        if(isset($_FILES['file']) && $_FILES['file']['size'] > 0 && !empty($_POST['service'])) {

                $service = $_POST['service'];
                $file = $_FILES['file'];

                $fileName = $_FILES['file']['name'];
                $fileTmpName = $_FILES['file']['tmp_name'];
                $fileSize = $_FILES['file']['size'];
                $fileError = $_FILES['file']['error'];
                $fileType = $_FILES['file']['type'];


                $fileExtention = explode('.',$fileName); // i will get an array conatins the name of the file and it's extention
                $fileActualExt = strtolower(end($fileExtention)); // end() a function gets the last element in the arry

                // arry contains the photo's extention that i want to allow
                $allowed = array('jpg', 'jpeg', 'png', 'gif', 'webp');

                if(in_array($fileActualExt, $allowed)){ // i check if the extention of the upoladed image inside of my allowed array it will return true
                        if($fileError === 0){

                            $fileNameNew = $service . "." . $fileActualExt;
                            $fileDestination = 'uploads/'.$fileNameNew;
                            move_uploaded_file($fileTmpName, $fileDestination);// first argument is the temprorary location of the file the second one is where i want the fille to move in
                            
                                // send data to the data base
                                $date = date("Y-m-d");
                                $sqlState = $pdo->prepare('INSERT services(image, name, creation_date) VALUES (?, ?, ?)');
                                $sqlState->execute([$fileDestination, $service, $date]);
                                


                            header('location: services.php?uploadSuccess');
                        }else{
                            $error = '<div class="alert-danger p-4 m-4"> there was an error uploading your img! </div>';
                            header('location: services.php?error=' . urlencode($error));
                        }
                }else{
                    $extentions = '';
                    foreach($allowed as $extention){
                        $extentions .='&nbsp &nbsp' .$extention; 
                    }
                    $error = '<div class="alert-danger p-4 m-4">  you cannot upload files of this type! only '.$extentions.' are allowed </div>' ;
                    header('location: services.php?error=' . urlencode($error));

                }
            }
            else{
                $error = '<div class="alert-danger p-4 m-4"> both fileds MUST be filled </div>';
                header('location: services.php?error=' . urlencode($error));

            }
            }
?>
