<?php require_once '../database.php';
$TITLE = "Show a worker";

$workers = $conn->prepare("SELECT * FROM comp353.worker AS worker WHERE worker.id = :id");
$workers->bindParam(":id", $_GET["id"]);
$workers->execute();
$worker = $workers->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $worker["first_name"] ?> <?= $worker["last_name"] ?></title>
</head>
<body>
    <h1><?= $worker["first_name"] ?> <?= $worker["last_name"] ?></h1>
        <p>Social Security Number: <?= $worker["ssn"] ?></p>
        <p>Hourly Wage: <?= $worker["hourly_wage"] ?></p>
        <p>Worker Type: <?= $worker["worker_type"] ?></p>
        <p>Allowed to Vaccinate: <?= $worker["is_eligible_to_vaccinate"] ?></p>
        <a href="./">Back to Worker List</a>
</body>
</html>