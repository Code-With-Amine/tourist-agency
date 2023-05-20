<?php
    require_once 'data.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://kit.fontawesome.com/d83f7e2869.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
      <link rel="stylesheet" href="css/ccommonStyle.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <meta name="description" content=" is a tourist agency that helps tourists discover the hidden treasure of Morocco, we provide housing alongside other activities.">
    <meta name="keywords" content="Morocco travel, Hidden gems, Authentic experiences, Cultural exploration, Off-the-beaten-path, Local guides, Adventure tourism, Unique accommodations, Sightseeing, Outdoor activities, Desert tours, Mountain trekking, Medina exploration, Traditional cuisine, Souvenirs, Historical sites, Riads, Camel rides, Berber culture, Diverse landscapes">

    <!-- add the favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="images/favicon_io/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="images/favicon_io/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="images/favicon_io/favicon-16x16.png">
<link rel="manifest" href="images/favicon_io/site.webmanifest">
    <title>Tourist Agency</title>
</head>
<body id="page-content">
    <nav class="navbar navbar-expand-lg navbar-light bg-light m-0 p-0">
        <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarToggler">
          <img src="images/logo.png" alt="logo" class="navbar-brand logo">
          <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
            <li class="nav-item ">
              <a class="nav-link ml-lg-3" href="#">Home</a></li>
                <li class="nav-item">
                    <a class="nav-link ml-lg-4" href="#severcis">Our severcis</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link ml-lg-4" href="#Regional_Adventures">Places to visit</a>
                  </li>
            <li class="nav-item">
              <a class="nav-link nav-link ml-lg-4" href="#contact">Contact</a>
            </li>
          </ul>
          <div class="d-inline my-2 my-lg-0">
            <!-- Translation Code here -->
            <span class="translate px-2">
                        <div class="select-wrapper">
                    <i class="fa-solid fa-globe showTransalation"></i>

					    <div class="translate pe-3" id="google_translate_element"></div>
                            <script type="text/javascript" src="js/translatePage.js"></script>
                            <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                        </div>
                    </span>
					<!-- Translation Code End here -->
            </div>
            <a href="registration/client.php" class="btn text-light me-5 px-4 fw-bold CTA-client" type="button" style="background: #7451EB;">Start your journey</a>

            <a href="registration/admin.php" class="btn btn-light CTA">Log in</a> 
          </div>
        </div>
      </nav>
      <section class="intoduction row align-items-center">
        <div class="col-12 col-sm-6 px-5">
        <h2>LET'S DISCOVER <span class="text-danger"> MOROCCO </span></h2>
        <p>Don't wait until tomorrow, discover your adventure now 
          and feel the sensation of closeness to nature around you </p>

      <a href="registration/client.php" class="btn text-light me-5 mt-3 px-4 mb-3 fw-bold" type="button" style="background: #7451EB;">Start your journey</a>

        <a href="#contact" role="button" class="btn my-3 my-sm-0 CTA">
          Want to ask us a Question
        </a>
        </div>

    <div class="col-12 col-sm-6">
        <div class="slideshow-container h-100">

        <div class="mySlides fade">
          <img src="images/introSection/view.jpg">
        </div>

        <div class="mySlides fade">
          <img src="images/introSection/backyard.jpg">
        </div>

        <div class="mySlides fade">
          <img src="images/introSection/hotel front view.jpg">
        </div>

        <div class="mySlides fade">
          <img src="images/introSection/fountain.jpg">
        </div>

        </div>
      </div>
       
      </section>
        <!-- services section -->
     <section class="severcis container">

     <div class="d-flex mt-5"> 
         <h2 class="secTitle hidden animation-delay">Our services</h2>
     </div>
     <div class="row mt-5 mx-auto justify-content-center" id="severcis">
     <?php
            foreach($services as $service){
        ?>
        <div class="col-12 col-md-6 col-lg-4 mb-4 hidden animation-delay">
            <div class="card">
                <img class="card-img-top" src="Admin/add_services/<?php echo $service['image']?>" alt="<?php echo $service['name']?>" style="height:300px;">
                <div class="card-body">
                  <p class="card-text"><?php echo $service['name']?></p>
                </div>
              </div>
        </div>

        <?php
            }
        ?>

     </div>
    </section> 
      <!-- about us section -->
      <section class="mt-5 setBackground">
     

        <div class="d-flex mt-5 hidden animation-delay"> 
            <h2 class="secTitle mt-3">About us</h2>
        </div>

        <div class="d-flex justify-content-center align-items-center mt-5" style="flex-wrap: wrap;">

            <!-- set the image -->
            <div class="col-12 col-lg-6 hidden animation-delay">
                <div class="imgContainer">
                    <div class="bgImg"></div>
                    <img src="images/aboutUsImg.jpeg" alt="" class="s-block about_us_img">
                </div>
      </div>

              <!-- the story -->
              <div class="col col-12 col-md-5 text-center fw-bold hidden animation-delay">
                  <p>I'm a Moroccan man named Ahmed who had an insatiable thirst for adventure. From a young age, I dreamed of exploring the world and experiencing all that it had to offer. After completing my education, I set out on a journey that would take me to every corner of the globe.</p>

                  <p>Over the years, I had many incredible adventures. I met people from all walks of life and immersed myself in the culture of every country I visited.</p>

                  <p>Despite all the amazing experiences I had, I always felt a deep connection to my homeland of Morocco. I realized that Morocco had a unique atmosphere that was unlike anywhere else in the world. From the bustling medinas to the tranquil beaches, Morocco was a land of contrasts that offered something for everyone.</p>

                  <p>Upon returning home, I decided to share the beauty of Morocco with the world. therefore, I  founded a tourist agency that specializes in helping visitors discover the hidden gems of the country. my agency offers customised tours that allow visitors to experience the authentic culture and traditions of Morocco, from staying in a traditional riad to sampling the delicious local cuisine.</p>
                                  
            </div>
    </div>

      </section>

      <!-- why Morocco section -->
      <section class="mt-3">
        <div class="container">

            <div class="d-flex mt-5 hidden animation-delay"> 
                <h2 class="secTitle"> Why Morocco</h2>
            </div>

            <div class="row mt-5">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="d-flex flex-column responsive-WM">
                      <span class="reason hidden animation-delay"> <img src="images/Cultural-Heritage-icon.jpeg" alt="" class="WM-icons" > <!-- WM stands for "why Morocco" --> </span> 
                      <span class="reason hidden animation-delay"> <img src="images/cuisine-icon.jpeg" alt="" class="mt-3 WM-icons"></span> 
                      <span class="reason hidden animation-delay">  <img src="images/scenic-beauty-icon.jpeg" alt="" class="mt-3 WM-icons"></span> 
                      <span class="reason hidden animation-delay"> <img src="images/Hospitality-icon.webp" alt="" class="mt-3 WM-icons"></span> 

                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4 hidden animation-delay">
                    <img src="" alt="" class="reason-to-chose-Morroco-image w-100" id="img">

                </div>

                <div class="col-12 col-md-6 col-lg-4 mt-3 hidden animation-delay">
                        <h3 id="title"></h3>
                        <p id="text">
                        </p>

                </div>
            </div>

        </div>
      </section>

      <!-- SOCIAL NETWORKS section -->
      <section class="mt-5 py-5         
          <?php 
                if($rows['images'] > 0)
                          echo '';
                else
                  echo 'd-none';

            ?>" style="background-color: #C8D4E3;">
        <div class="container">
            
            <div class="d-flex mt-5"> 
                <h2 class="secTitle hidden animation-delay"> SOCIAL NETWORKS </h2>
            </div>

            <div class="row mt-3 g-3 justify-content-center">
            <?php
                foreach($SOCIAL_NETWORKS as $imgSrc){
            ?>
                <div class="col-12 col-md-6 col-lg-4">
                    <img src="Admin/social_networks/<?php echo $imgSrc['image']?>" alt="" class="w-100 hidden animation-delay">
                </div>
            <?php
                }
            ?>                
            </div>

        </div>
      </section>

              <!-- Regional Adventures section -->
     <section class="container ">

<div class="d-flex mt-5"> 
    <h2 class="secTitle scale" id="Regional_Adventures">Regional Adventures</h2>
</div>
<div class="row mt-5 justify-content-center" id="severcis">
<?php
      $cardId = 0;
       foreach($Regional_Adventures as $region){
   ?>
   <div class="col-12 col-md-6 col-lg-4 mb-4">
       <div class="card scale cards-number">
           <a href="<?php echo $region['Location'];?>" target="_blank"><img class="card-img-top" src="Admin/Regional_Adventures/<?php echo $region['image']?>" alt="<?php echo $region['city']?>" style="height:300px;"></a>
           <div class="card-body">
            <h5 class="card-title fw-bold" style="color: #1237F6;"><?php echo $region['city']?></h5>
            <p class="card-text cutOff-text" id="cutoff-<?php echo $cardId ?>">
            <?php echo $region['description']?>
            </p>
            <span class="expand-container btn-container-<?php echo $cardId ?>">
            <input type="checkbox" class="expand-btn" id="expand-btn-<?php echo $cardId ?>">
            </span>
          </div>
   </div>
   </div>
   <?php
      $cardId++;
       }
   ?>

</section> 
<!-- client comments -->
<section class="setBackground 
      <?php 
                if(count($comments) > 0)
                      echo '';
                else
                      echo 'd-none';
?>">
  <div class="container">
<div class="d-flex mt-5"> 
         <h2 class="secTitle scale my-4">WHAT TOURISTS SAY <span style="color: orange;">ABOUT US</span></h2>
     </div>
    <div class="row g-5 justify-content-center align-items-center">

    <div class="col-12 col-sm-6 scale">
    <?php 
        $cardNumbers = 1;
        foreach($comments as $comment){
    ?>
                <div class="comment card-<?php echo $cardNumbers++ ?> radius shadow p-5">
                      <cite class="fw-bold">"<?php echo $comment['comment']?>"</cite>
                      <!-- rating  -->
                      <div class="pt-3">
                            <?php
                                $starsRate = $comment['stars'];
                                for($i = 0 ; $i < 5 ; $i++){
                                    if($starsRate > 0){
                                        echo '<i class="bi bi-star-fill"></i>';
                                        $starsRate--;
                                    }else{
                                      echo '<i class="bi bi-star"></i>';
                                    }
                                }
                            ?>
                      </div>
                        <h4 class="py-2"><?php echo ucfirst($comment['first_name'])?> <?php echo ucfirst($comment['last_name'])?> </h4>
                      <div>
                        <p><?php echo $comment['country']?></p>
                      <div class="arrow arrow-left"><i class="bi bi-arrow-left-circle-fill"></i></div>
                      <div class="arrow arrow-right"><i class="bi bi-arrow-right-circle-fill"></i></div>
                      </div>
                      
              </div>
      <?php
        }
      ?>
        </div>

        <img src="images/commentsSecImg.png" alt="comment section image" class="col-12 col-sm-5 offset-1 scale drop-shadow"/>

    </div>
    </div>
</section>

      <!-- contact form -->
      <section class="mt-5 hidden">

        <div class="d-flex mt-5"> 
            <h2 class="secTitle"> Leave us a message </h2>
        </div>

        <div class="container mt-5">
        <?php
                          if(isset($_GET['err'])){
                            switch($_GET['err']){
                              case 0:
                                echo '<div class="alert alert-success text-center">We recived youe Inquiry we will contact you soon</div> ';
                                break;
                              case 1:
                                echo '<div class="alert alert-danger text-center">All fields are necessary Please fill them out</div>';
                                break;
                              case 2:
                                echo '<div class="alert alert-danger text-center">An inquiry with the same email or WhatsApp number already exists.</div>';
                                break;
                            }
                          }
                    ?>
            <div class="row">
              <div class="col-md-6 offset-md-3">
                <div class="card">
                  <div class="card-body" id="contact">
                    <form onsubmit="return isItValide()" class="p-2" method="POST" action="php_retrieve_data/inquiries.php">
                      <div class="row">
                      <div class="form-group col-12 col-md-6">
                        <label for="firstName">First Name</label>
                        <input type="text" class="form-control" id="firstName" placeholder="Enter your first name" name="First_name" value="<?php echo isset($_GET['fname'])?$_GET['fname']:'' ?>" required>
                      </div>

                      <div class="form-group col-12 col-md-6">
                        <label for="lastName">Last Name</label>
                        <input type="text" class="form-control" id="lastName" placeholder="Enter your last name" name="Last_name" value="<?php echo isset($_GET['lname'])?$_GET['lname']:'' ?>" required>
                      </div>
                    </div>
                      
                      <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter your email" name="email" value="<?php echo isset($_GET['lname'])?$_GET['lname']:'' ?>" required>
                      </div>
                      <div class="form-group">
                        <label for="phoneNumber">Whatsapp Number (Please add you contry code)</label>
                        <input type="tel" class="form-control" id="phoneNumber" placeholder="EX: +1-202-555-0108" name="whatsapp_number" value="<?php echo isset($_GET['whatsapp'])?$_GET['whatsapp']:'' ?>" required>                      
                      </div>

                      <div class="form-group">
                        <label for="message">Write your Inquiry</label>
                        <textarea class="form-control" id="message" rows="3" name="Inquiry"><?php echo isset($_GET['inquiry'])?$_GET['inquiry']:'' ?></textarea>
                        <div class="alert  alert-info alert-dismissible fade show mt-4" role="alert">
                        Notice that you are only allowed to write up to 4000 character :
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  <p id="chars"></p>
                  </div>
                      <button type="submit" class="btn btn-primary d-block mx-auto" name="submit">Submit</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </section>


      <!-- footer -->
      <footer class="mt-5">
        <div class="container">
          <div class="row d-flex align-items-center justify-content-center text-center">
            <div class="col-12 col-md-4 mb-4 mb-md-0">
            <div class="d-flex align-items-start flex-column">
              <a href="mailto:<?php echo $email ?>" class="btn text-light"><i class="fa-regular fa-envelope" style="color: #146aff;"></i> &nbsp;<?php echo $email ?></a>
              <a href="" class="btn text-light"><i class="fa-sharp fa-solid fa-phone" style="color: #146aff;"></i> &nbsp;<?php echo $phone?></a>
              <a href="https://earth.google.com/web/search/Ida/@29.83671161,-9.01945308,1431.5860287a,172.48593294d,35y,172.12592996h,0t,0r/data=CigiJgokCcdajbnAVTRAEcRajbnAVTTAGdG53e-hJElAIbo2HSUAz0nA"
               class="btn text-light" target="_blank"><i class="fa-solid fa-location-dot" style="color: #1f71ff;"></i> &nbsp;Agadir, Morocco</a>
              </div>      
            </div>
      
            <div class="col-12 col-md-4 mb-4 mb-md-0">
              <p>&copy; All Rights Reserved</p>
            </div>
      
            <div class="col-12 col-md-4 d-flex justify-content-center">
              <a href="<?php echo $youtube?>" target="_blank"><i class="fa-brands fa-youtube me-4" style="color: #c81609;font-size: 2.3rem;"></i></a>
              <a href="<?php echo $instagram?>" target="_blank"><i class="fa-brands fa-instagram me-4" style="color: #e00b7c;font-size: 2.3rem;"></i></a>
              <a href="<?php echo $facebook?>" target="_blank"><i class="fa-brands fa-facebook me-4" style="color: #216ae8;font-size: 2.3rem;"></i></a>
              <a href="<?php echo $linkedin?>" target="_blank"><i class="fa-brands fa-linkedin" style="color: #216ae8;font-size: 2.3rem;"></i></a>
            </div>
          </div>
        </div>
      </footer>

<!-- whatssap -->
<div class="whatsapp-container ">
  <img class="whatsapp-icon whatsap-shadow" src="images/whatssap-icon.png">
  <div class="message-box whatsap-shadow whatsapp-rounded">
    <div class="close-icon">&times;</div>
    <img src="images/whatssap chat.jpg" alt="whatsapp-icon" class="whatsapp-rounded">
    <a href="https://api.whatsapp.com/send?phone=<?php echo $whatsapp?>" target="_blank">
      <button class="chat-btn btn btn-success whatsapp-rounded">Chat Now</button>
    </a>
  </div>
</div>
      

    <script src="js/index.js"></script>
    <script src="js/animation.js"></script>
    <script src="js/displayCards.js"></script>
    <script src="js/validateInputs.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>
 </html>
