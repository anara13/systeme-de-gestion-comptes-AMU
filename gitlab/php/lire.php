<?php
session_start();
$id = $_GET["id"];

$ch = curl_init();
$options = array(
    //The URL to fetch. This can also be set when initializing a session with curl_init()
    CURLOPT_URL => "https://gitlab.adms.dil.univ-mrs.fr/api/v4/projects/$id?access_token=" . $_SESSION['access_token'],
    CURLOPT_RETURNTRANSFER => true
);

curl_setopt_array($ch, $options);

$response = curl_exec($ch);

curl_close($ch);
// passing boolean true as the second argument, we will receive an associative array instead of a PHP object
$data = json_decode($response, true);

?>


  
<!DOCTYPE html>
<html lang="fr">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Tableau de board</title>


    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-breezed.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">

    </head>
    
    <body>


    <section class="products section" id="products">
        <h2 class="section__title section__title-gradient products__line">
        Repository with id:   <br> <?= $id ?>
        </h2>       
    </section>


    <!-- ***** About Area Starts ***** -->
    <section class="section" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="left-text-content">
                        <div class="section-heading">
                            <h2></h2>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="service-item">
                                    <img src="assets/images/service-item-01.png" alt="">
                                    <h4>id (Users of this project):</h4>
                                   <p> <a href="projet_utilisateurs.php?project_id=<?= $data["id"] ?>"><?= $data["id"] ?></a></p>   
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="service-item">
                                    <img src="assets/images/service-item-01.png" alt="">
                                    <h4>id (Groups of this project):</h4>
                                   <p><a href="projet_groupes.php?project_id=<?= $data["id"] ?>"><?= $data["id"] ?></a></p>
                                    
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="service-item">
                                    <img src="assets/images/contact-info-03.png" alt="">
                                    <h4>Visibility:</h4>
                                    <p><?= $data["visibility"] ?></p>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="service-item">
                                    <img src="assets/images/contact-info-03.png" alt="">
                                    <h4>Name:</h4>
                                    <p><?= $data["name"] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="right-text-content">
                        <p><a rel="nofollow noopener" href="https://templatemo.com/tm-543-breezed" target="_parent">Description:</a>
                        <br>
                        <?= htmlspecialchars($data["description"]) ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** About Area Ends ***** -->

    <!-- ***** Features Big Item Start ***** -->
    <section class="section" id="features">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12" data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                    <div class="features-item">
                        <div class="features-icon">
                            <img src="assets/images/features-icon-1.png" alt="">
                        </div>
                        <div class="features-content">
                            <h4>Name with namespace:</h4>
                            <p><?= htmlspecialchars($data["name_with_namespace"]) ?></p>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12" data-scroll-reveal="enter bottom move 30px over 0.6s after 0.4s">
                    <div class="features-item">
                        <div class="features-icon">
                            <img src="assets/images/features-icon-1.png" alt="">
                        </div>
                        <div class="features-content">
                            <h4>Path:</h4>
                            <p><?= $data["path"] ?></p>
                          
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12" data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                    <div class="features-item">
                        <div class="features-icon">
                            <img src="assets/images/features-icon-1.png" alt="">
                        </div>
                        <div class="features-content">
                            <h4>Date of creation:</h4>
                            <p><?= htmlspecialchars($data["created_at"]) ?></p>
                          
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12" data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                    <div class="features-item">
                        <div class="features-icon">
                            <img src="assets/images/features-icon-1.png" alt="">
                        </div>
                        <div class="features-content">
                            <h4>Default branch:</h4>
                            <p><?= $data["default_branch"] ?></p>
                           
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12" data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                    <div class="features-item">
                        <div class="features-icon">
                            <img src="assets/images/features-icon-1.png" alt="">
                        </div>
                        <div class="features-content">
                            <h4>SSH URL to repository:</h4>
                            <p><a href="<?= $data["ssh_url_to_repo"] ?>"><?= $data["ssh_url_to_repo"] ?></a></p>
                           
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12" data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                    <div class="features-item">
                        <div class="features-icon">
                            <img src="assets/images/features-icon-1.png" alt="">
                        </div>
                        <div class="features-content">
                            <h4>WEB URL:</h4>
                            <p><a href="<?= $data["web_url"] ?>"><?= $data["web_url"] ?></a</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12" data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                    <div class="features-item">
                        <div class="features-icon">
                            <img src="assets/images/features-icon-1.png" alt="">
                        </div>
                        <div class="features-content">
                            <h4>HTTP URL to repository:</h4>
                            <p> <a href="<?= $data["http_url_to_repo"] ?>"><?= $data["http_url_to_repo"] ?></a></p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12" data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                    <div class="features-item">
                        <div class="features-icon">
                            <img src="assets/images/features-icon-1.png" alt="">
                        </div>
                        <div class="features-content">
                            <h4>Readme URL:</h4>
                            <p> <a href="<?= $data["readme_url"] ?>"> <?= $data["readme_url"] ?></a></p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
   <div class="content">
    
    <div class="container">
      <h2 class="mb-5"> Our Projects Namespace:</h2>
      

      <div class="table-responsive">

        <table class="table table-striped custom-table">
          <thead>
            <tr>
              
              <th scope="col">id / Parent ID </th>
              <th scope="col">name</th>
              <th scope="col">Path / Full path</th>
              <th scope="col">Role</th>
              <th scope="col">Avatar URL</th>
              <th scope="col">WEB URL</th>
            </tr>
          </thead>
          <tbody>
            <tr scope="row">
                      
                      <td><a href="#"><?= $data["namespace"]["id"] ?> </td>
                      <td><a><?= $data["namespace"]["name"] ?></a></td>
                     
                      <td><a href="utilisateur_projets.php?user_id=<?= $data["namespace"]["path"] ?><?= $data["namespace"]["path"]  ?> "></td>
                      <td> <?= $data["namespace"]["kind"] ?></td>
                      <td><a href="<?= $data["namespace"]["avatar_url"] ?>" class="more"><?= $data["namespace"]["avatar_url"] ?></td>
                      <td><a href="<?= $data["namespace"]["web_url"] ?>" class="more"><?= $data["namespace"]["web_url"] ?></a></td>
            
            </tr>

            
          </tbody>
        </table>
      </div>


    </div>
</div>


<div class="container">
<form action="modifier.php" method="POST">
		
<input type="hidden" name="id" value="<?= $data['id'] ?>">
    <button type="submit">Edit</button>
</form>

<form action="supprimer.php" method="POST">
    <input type="hidden" name="id" value="<?= $data['id'] ?>">
    <button type="submit">Delete</button>
</form>

</div>



    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script> 
    <script src="assets/js/slick.js"></script> 
    <script src="assets/js/lightbox.js"></script> 
    <script src="assets/js/isotope.js"></script> 
    
    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>

    <script>

        $(function() {
            var selectedClass = "";
            $("p").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("."+selectedClass).fadeOut();
            setTimeout(function() {
              $("."+selectedClass).fadeIn();
              $("#portfolio").fadeTo(50, 1);
            }, 500);
                
            });
        });

    </script>




  </body>
</html>
