<?php require_once '../../database.php';
$TITLE = "Add a Assignment";

if(isset($_POST["worker_id"]) && isset($_POST["start_date"]) && isset($_POST["end_date"]) && isset($_POST["facility"]) 
) {
    
    $assignment = $conn->prepare("INSERT INTO comp353.assignment (worker_id, start_date, end_date, facility)
    VALUES (:worker_id, :start_date, :end_date, :facility);");
    
    $assignment->bindParam(':worker_id', $_POST["worker_id"]);
    $assignment->bindParam(':start_date', $_POST["start_date"]);
    $assignment->bindParam(':end_date', $_POST["end_date"]);
    $assignment->bindParam(':facility', $_POST["facility"]);

    if($assignment->execute())
        header("Location: ./index.php?id=".$_POST["worker_id"]);
}

$worker_id = $_GET["id"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a Assignment</title>
</head>
<body>
<h1>Add a Assignment</h1>
    <form action="./create.php" method="post">
        <label for="worker_id">Worker ID</label><br>
        <input type="text" name="worker_id" id="worker_id" value="<?php echo $worker_id?>"> <br>
        <label for="start_date">Start Date</label><br>
        <input type="date" name="start_date" id="start_date"> <br>
        <label for="end_date">End Date</label><br>
        <input type="date" name="end_date" id="end_date"> <br>
        <label for="facility">Facility</label><br>
        <input type="text" name="facility" id="facility"> <br>
        <button type="submit">Add</button>
    </form>
    <a href="./index.php?id=<?php echo $worker_id?>" >Back to Assignment List</a>
</body>
</html>