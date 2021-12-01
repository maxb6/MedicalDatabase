<?php require_once '../../database.php';
$TITLE = "Edit a Assignment";

$assignments = $conn->prepare("SELECT * FROM comp353.assignment AS assignment WHERE assignment.id = :id");
$assignments->bindParam(":id", $_GET["id"]);
$assignments->execute();
$assignment = $assignments->fetch(PDO::FETCH_ASSOC);


if(isset($_POST["worker_id"]) && isset($_POST["start_date"]) && isset($_POST["end_date"]) && isset($_POST["facility"]) 
    ) {  
    $statement = $conn->prepare("UPDATE comp353.assignment SET id = :id, 
                                                        start_date = :start_date, 
                                                        end_date = :end_date,
                                                        facility = :facility
                                                        WHERE id = :id;");
                                
    $statement->bindParam(':worker_id', $_POST["worker_id"]);
    $statement->bindParam(':start_date', $_POST["start_date"]);
    $statement->bindParam(':end_date', $_POST["end_date"]);
    $statement->bindParam(':facility', $_POST["facility"]);
    $statement->bindParam(':id', $_POST["id"]);

    if($statement->execute()){
        header("Location: ./index.php?id=".$_POST["worker_id"]);
    }else{
        header("Location: ./edit.php?id=".$_POST["id"]);
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Worker</title>
</head>
<body>
<h1>Edit Worker</h1>
    <form action="./edit.php" method="post">
    <label for="worker_id">Worker Id</label><br>
        <input type="text" name="worker_id" id="worker_id" value="<?= $assignment["worker_id"] ?>"> <br>
        <label for="start_date">Start Date</label><br>
        <input type="date" name="start_date" id="start_date" value="<?= $assignment["start_date"] ?>"> <br>
        <label for="end_date">End Date</label><br>
        <input type="date" name="end_date" id="end_date" value="<?= $assignment["end_date"] ?>"> <br>
        <label for="facility">Facility</label><br>
        <input type="text" name="facility" id="facility" value="<?= $assignment["facility"] ?>"> <br>
        <input type="hidden" name="id" id="id" value="<?= $assignment["id"] ?>"> <br>
        <button type="update">Update</button>
    </form>
    <a href="./index.php?id=<?=$assignment["worker_id"]?>" >Back to Assignment List</a>
</body>
</html>