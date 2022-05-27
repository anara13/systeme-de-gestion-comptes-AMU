<?php
session_start();
$id = $_POST['id'];

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://gitlab.adms.dil.univ-mrs.fr/api/v4/projects/$id?access_token=" . $_SESSION['access_token']);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

curl_close($ch);
// passing boolean true as the second argument, we will receive an associative array instead of a PHP object
$data = json_decode($response, true);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/nouveau.css">
    <title>modifier</title>
</head>
<body>



<section class="products section" id="products">
        <h2 class="section__title section__title-gradient products__line">
        Edit Repository with id: <br> <?= $id ?>
        </h2>       
</section>

<div class="container">
	<form action="update.php" method="POST">
		<div class="field" tabindex="1">


        <input type="hidden" name="id" value="<?= $data["id"] ?>">

			<label for="username">
				<i class="far fa-user"></i>Votre nom
			</label>
			<input type="text" name="name" id="name" value="<?= $data["name"] ?>">
		</div>
		<div class="field" tabindex="3">
			<label for="message">
				<i class="far fa-edit"></i>Commentaire
			</label>
			<textarea name="description" id="description">

            <?= htmlspecialchars($data["description"]) ?>

            </textarea>
		</div>
        
        <div>
            <input type="submit" name="submit" value="enregistrer">
        </div>

        <div class="button">
		<button type="reset"><a href="lire.php?id=<?= $data["id"] ?>">retour</a></button>
        </div>
	</form>
</div>

</body>
</html>