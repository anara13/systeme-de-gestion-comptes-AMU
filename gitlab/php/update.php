<?php
session_start();

// get the username and password as the fields og login
$id = $_POST["id"];
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

$ch = curl_init();

$endpoint = json_encode(array("name" => "$name", "description" => "$description"));
curl_setopt($ch, CURLOPT_URL, "https://gitlab.adms.dil.univ-mrs.fr/api/v4/projects/$id?access_token=" . $_SESSION['access_token']);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
curl_setopt($ch, CURLOPT_POSTFIELDS, $endpoint);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

$status_code = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);

curl_close($ch);

$data = json_decode($response, true);

if ($status_code === 422) {

    echo "Invalid data: ";
    print_r($data["errors"]);
    exit;
}

if ($status_code !== 200) {

    echo "Unexpected status code: $status_code";
    var_dump($data);
    exit;
}

?>







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
        <p>Repository updated successfully.</p>
        <p class="lien"><a href="lire.php?id=<?= $data["id"] ?>">Show</a></p>
      </div>
    </body>
</html>
