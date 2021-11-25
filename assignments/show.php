<?php require_once '../database.php';
$TITLE = "Show a worker";

$assignments = $conn->prepare("SELECT * FROM comp353.assignment AS assignment WHERE assignment.id = :id");
$assignments->bindParam(":id", $_GET["id"]);
$assignments->execute();
$assignment = $assignments->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignments for worker id = <?= $assignment["worker_id"] ?></title>
</head>
<body>
    <h1>Assignments for Worker id = <?= $assignment["worker_id"] ?></h1>
        <p>Assignment Id: <?= $assignment["id"] ?></p>
        <p>Start Date: <?= $assignment["start_date"] ?></p>
        <p>End Date: <?= $assignment["end_date"] ?></p>
        <p>Facility: <?= $assignment["facility"] ?></p>
        <a href="./">Back to Assignment List</a>
</body>
</html>