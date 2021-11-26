<?php require_once '../database.php';
$TITLE = "Show an Infection";

$infections = $conn->prepare("SELECT * FROM comp353.infection_history AS infection_history WHERE infection_history.id = :id");
$infections->bindParam(":id", $_GET["id"]);
$infections->execute();
$infection = $infections->fetch(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Infection id <?= $infection["id"] ?></title>
</head>
<body>
        <h1>Infection Id <?= $infection["id"] ?></h1>
        <p>Person Id: <?= $infection["person_id"] ?></p>
        <p>Variant Name: <?= $infection["variant_name"] ?></p>
        <p>Infection Date: <?= $infection["infection_date"] ?></p>
        <a href="./">Back to Infection List</a>
</body>
</html>