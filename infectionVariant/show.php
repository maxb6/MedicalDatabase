<?php require_once '../database.php';
$TITLE = "Show a Variant";

$variants = $conn->prepare("SELECT * FROM comp353.infection_variant AS infection_variant WHERE infection_variant.id = :id");
$variants->bindParam(":id", $_GET["id"]);
$variants->execute();
$variant = $variants->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variant Id <?= $variant["id"] ?></title>
</head>
<body>
    <h1>Variant Id <?= $variant["id"] ?></h1>
        <p>Variant Name: <?= $variant["variant_name"] ?></p>
        <a href="./">Back to Variants List</a>
</body>
</html>