<?php require_once '../database.php';
$TITLE = "Show a Vaccine Type";

$vaccines = $conn->prepare("SELECT * FROM comp353.vaccine_type AS vaccine_type WHERE vaccine_type.id = :id");
$vaccines->bindParam(":id", $_GET["id"]);
$vaccines->execute();
$vaccine = $vaccines->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vaccine Id <?= $vaccine["id"] ?></title>
</head>
<body>
    <h1>Vaccine Id <?= $vaccine["id"] ?></h1>
        <p>Vaccine Name: <?= $vaccine["vaccine_name"] ?></p>
        <a href="./">Back to Vaccine types List</a>
</body>
</html>