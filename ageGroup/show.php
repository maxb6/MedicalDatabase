<?php require_once '../database.php';
$TITLE = "Show an Age Group";

$age_groups = $conn->prepare("SELECT * FROM comp353.age_group AS age_group WHERE age_group.id = :id");
$age_groups->bindParam(":id", $_GET["id"]);
$age_groups->execute();
$age_group = $age_groups->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Age Group <?= $age_group["group_number"] ?></title>
</head>
<body>
    <h1>Age Group <?= $age_group["group_number"] ?></h1>
        <p>Age Group Id: <?= $age_group["id"] ?></p>
        <p>Age Range: <?= $age_group["age_range"] ?></p>
        <a href="./">Back to Age Groups List</a>
</body>
</html>