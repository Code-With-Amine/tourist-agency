<?php


if(isset($_POST['submit'])){

require_once '../../include/database.php';

        if(isset($_FILES['file']) && $_FILES['file']['size'] > 0) {

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
                            // first let's insert an empty file destination just to get an id
                            $date = date("Y-m-d");
                            $sqlState = $pdo->prepare('INSERT social_networks(image, creation_date) VALUES (?, ?)');
                            $sqlState->execute(['', $date]);
                            // get the last id in the assocation array
                            $id = $pdo->prepare('select id from social_networks order by id desc limit 1');
                            $id->execute();
                            $id = $id->fetch()['id'];

                            $fileNameNew = $id . "." . $fileActualExt;
                            $fileDestination = 'socials_images/'.$fileNameNew;
                            move_uploaded_file($fileTmpName, $fileDestination);// first argument is the temprorary location of the file the second one is where i want the fille to move in
                            
                                // update the image destination
                                $sqlState = $pdo->prepare('UPDATE social_networks set image = ? WHERE id = ?');
                                $sqlState->execute([$fileDestination, $id]);

                            header('location: add.php?uploadSuccess');
                        }else{
                            $error = '<div class="alert-danger p-4 m-4"> there was an error uploading your img! </div>';
                            header('location: add.php?error=' . urlencode($error));
                        }
                }else{
                    $extentions = '';
                    foreach($allowed as $extention){
                        $extentions .='&nbsp &nbsp' .$extention; 
                    }
                    $error = '<div class="alert-danger p-4 m-4">  you cannot upload files of this type! only '.$extentions.' are allowed </div>' ;
                    header('location: add.php?error=' . urlencode($error));

                }
            }
            else{
                $error = '<div class="alert-danger p-4 m-4">  Please upload a file </div>';
                header('location: add.php?error=' . urlencode($error));

            }
        }
?>