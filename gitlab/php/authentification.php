<?php
session_start();

if (isset($_POST['submit'])) {
    // get the username and password as the fields og login
    $name = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $pwd = htmlspecialchars($_POST['password']);

    $ch = curl_init();
    $options = array(
        CURLOPT_URL => 'https://gitlab.adms.dil.univ-mrs.fr/oauth/token',
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => "grant_type=password&username=$name&password=$pwd",
        CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($ch, $options);

    $response = curl_exec($ch);

    curl_close($ch);
    // passing boolean true as the second argument, we will receive an associative array instead of a PHP object
    $data = json_decode($response, true);

    $token = "invalid_grant";
    // get the access token as the first element
    foreach ($data as $value) {
        $token = $value;
        break;
    }

    //vérifier si le token est bien renovoyé
    if ($token === "invalid_grant") {
        echo "<script>alert('Votre mot de passe ou username est incorrect')</script>";
    } else {
        header('Location: index.php');
    }
    // passer le token vers les autres fichiers
    $_SESSION['access_token'] = $token;
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <link rel="stylesheet" href="../css/authentification.css">
</head>

<body>

    <div class="login-box">
        <h2>Login</h2>
            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" >
                <div class="user-box">
                <input type="username" name="username" id="username" value="<?= htmlspecialchars($_POST["username"] ?? "") ?>">
                <label for="username">username</label>
                </div>
                <div class="user-box">
                <input type="password" name="password" id="password">
                <label for="password">Password</label>
                </div>
                <input type="submit" name="submit" value="Log in">
                <input type="submit" name="back" value="back">
            </form>
    </div>

</body>

</html>