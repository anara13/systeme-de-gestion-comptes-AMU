<?php
session_start();

// get the username and password as the fields og login
$id = $_POST['id'];

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://gitlab.adms.dil.univ-mrs.fr/api/v4/projects/$id?access_token=" . $_SESSION['access_token']);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");

$response = curl_exec($ch);

$status_code = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);

curl_close($ch);



?>


<h1>Delete Repository</h1>




<html>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/nouveau.css">
  </head>
    <style>
      body {
        text-align: center;
        padding: 40px 0;
      }
        h1 {
          color: #88B04B;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-weight: 900;
          font-size: 40px;
          margin-bottom: 10px;
        }
        p {
          color: #404F5E;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-size:20px;
          margin: 0;
        }
      i {
        color: #9ABC66;
        font-size: 100px;
        line-height: 200px;
        margin-left:-15px;
      }
      .card {
        background: white;
        padding: 60px;
        border-radius: 4px;
        box-shadow: 0 2px 3px #C8D0D8;
        display: inline-block;
        margin: 0 auto;
      }
      .lien a{
          color: black;
      }

    </style>
    <body>
      <div class="card">
      <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
        <i class="checkmark">✓</i>
      </div>
        <h1>Success</h1> 
        <p>Repository deleted successfully.</p>
        <p class="lien"><a href="index.php">retour</a></p>
      </div>
    </body>
</html>
