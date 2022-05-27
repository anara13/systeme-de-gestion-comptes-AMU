<?php

session_start();
$id = $_GET["project_id"];
$ch = curl_init();

$options = array(
    //The URL to fetch. This can also be set when initializing a session with curl_init()
    CURLOPT_URL => "https://gitlab.adms.dil.univ-mrs.fr/api/v4/projects/$id/users?access_token=" . $_SESSION['access_token'],
    CURLOPT_RETURNTRANSFER => true
);

curl_setopt_array($ch, $options);

$response = curl_exec($ch);

curl_close($ch);
// passing boolean true as the second argument, we will receive an associative array instead of a PHP object
$data = json_decode($response, true);

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="../css/style.css">

    <title>gitlab-utilisateur</title>
  </head>
  <body>
  

  <div class="content">
    
    <div class="container">
      <h2 class="mb-5">Users of project <?= $id ?></h2>
      

      <div class="table-responsive">

        <table class="table table-striped custom-table">
          <thead>
            <tr>
              
              <th scope="col">id</th>
              <th scope="col">username</th>
              <th scope="col">name</th>
              <th scope="col">state</th>
              <th scope="col">avatar_url</th>
              <th scope="col">web_url</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($data as $user) : ?>

            <tr scope="row">
                      
                      <td>
                      <?= $user["id"] ?>
                      </td>
                      <td><a href="#"><?= htmlspecialchars($user["username"]) ?></a></td>
                      <td>
                      <?= htmlspecialchars($user["name"]) ?>
                      </td>
                      <td><?= $user["state"] ?></td>
                      <td><a href="<?= $user["avatar_url"] ?>"><?= $user["avatar_url"] ?></a></td>
                      <td><a href="<?= $user["web_url"] ?>" class="more"><?= $user["web_url"] ?></a></td>
            
            </tr>

            <?php endforeach; ?>
            
          </tbody>
        </table>
      </div>


    </div>

  </div>
    
            <button onclick="window.location.href = 'index.php';">
                retour
            </button>
    

  </body>
</html>



</body>
</html>

