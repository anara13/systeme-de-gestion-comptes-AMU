<?php
session_start();
$id = $_GET["user_id"];
$ch = curl_init();

$options = array(
    //The URL to fetch. This can also be set when initializing a session with curl_init()
    CURLOPT_URL => "https://gitlab.adms.dil.univ-mrs.fr/api/v4/users/$id/projects?access_token=" . $_SESSION['access_token'],
    CURLOPT_RETURNTRANSFER => true
);

curl_setopt_array($ch, $options);

$response = curl_exec($ch);

curl_close($ch);
// passing boolean true as the second argument, we will receive an associative array instead of a PHP object
$data = json_decode($response, true);

?>


<h1>Repositories</h1>
<table>
    <thead>
        <tr>
            <th style="color:red; font-size:larger">Name</th>
            <th style="color:red; font-size:larger">Description</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $repository) : ?>
        <tr>
            <td>
                <a href="lire.php?id=<?= $repository["id"] ?>">
                    <?= $repository["name"] ?>
                </a>
            </td>
            <td><?= htmlspecialchars($repository["description"]) ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

