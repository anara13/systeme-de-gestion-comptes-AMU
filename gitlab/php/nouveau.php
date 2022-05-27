
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/nouveau.css">
    <title>nouveau</title>
</head>
<body>

<section class="products section" id="products">
        <h2 class="section__title section__title-gradient products__line">
        Ajouter <br> Repositories
        </h2>       
    </section>

<!--  

<form action="ajouter.php" method="POST">
    <label for="name"><b>Name</b></label>
    <input type="text" name="name" id="name">
    <label for="description"><b>Description</b></label>
    <textarea name="description" id="description" cols="30" rows="10"></textarea>
    <input type="submit" name="submit" value="Submit">
</form>
-->

<div class="container">
	<form action="ajouter.php" method="POST">
		<div class="field" tabindex="1">
			<label for="username">
				<i class="far fa-user"></i>Votre nom
			</label>
			<input name="name" type="text" placeholder="entrer votre nom" id="name" required>
		</div>
		<div class="field" tabindex="3">
			<label for="message">
				<i class="far fa-edit"></i>Commentaire
			</label>
			<textarea name="description" id="description" placeholder="type here" required></textarea>
		</div>
        
        <div>
            <input type="submit" name="submit" value="enregistrer">
        </div>

        <div class="button">
		<button type="reset"><a href="index.php">retour</a></button>
        </div>
	</form>
</div>

<!-- This is not part of Pen -->
<a class="me" href="https://codepen.io/uzcho_/pens/popular/?grid_type=list" target="_blank" style="color:#000"></a>


</body>
</html>


