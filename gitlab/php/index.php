<?php
session_start();
$ch = curl_init();
$options = array(
    //The URL to fetch. This can also be set when initializing a session with curl_init()
    CURLOPT_URL => 'https://gitlab.adms.dil.univ-mrs.fr/api/v4/projects?access_token=' . $_SESSION['access_token'],
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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/index2.css">
    <title>API</title>
</head>
<body>
    <section class="products section" id="products">
        <h2 class="section__title section__title-gradient products__line">
            Choose <br> Your Repositories
        </h2>       
    </section>

    <section>
  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th>name</th>
          <th>Owner</th>
          <th>Description</th>
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody>
      <?php foreach ($data as $repository) : ?>
        <tr>
            <td> 
                <a href="lire.php?id=<?= $repository["id"] ?>">
                    <?= $repository["name"] ?>
                </a>
            </td>
            <td><?= htmlspecialchars($repository["namespace"]["name"]) ?></td>
            <td><?= htmlspecialchars($repository["description"]) ?></td>
            <?php endforeach; ?>
        </tr>
      </tbody>
    </table>
  </div>
</section>
    
<div class="button">
        <a href="nouveau.php">Ajouter un nouveau repository</a>
</div>




</body>
</html>