<?php require_once '../database.php';
$TITLE = "Show a province Type";

$provinces = $conn->prepare("SELECT * FROM comp353.province AS province WHERE province.id = :id");
$provinces->bindParam(":id", $_GET["id"]);
$provinces->execute();
$province = $provinces->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Province Id <?= $province["id"] ?></title>
</head>
<body>
    <h1>Province Id <?= $province["id"] ?></h1>
        <p>Province Name: <?= $province["province_name"] ?></p>
        <p>Age Group: <?= $province["age_group"] ?></p>
        <a href="./">Back to province types List</a>
</body>
</html>