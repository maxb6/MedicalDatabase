<?php require_once '../database.php';
$TITLE = "Edit a worker";

$workers = $conn->prepare("SELECT * FROM comp353.worker AS worker WHERE worker.id = :id");
$workers->bindParam(":id", $_GET["id"]);
$workers->execute();
$worker = $workers->fetch(PDO::FETCH_ASSOC);


if(isset($_POST["first_name"]) 
    && isset($_POST["last_name"]) 
    && isset($_POST["ssn"]) 
    && isset($_POST["hourly_wage"]) 
    && isset($_POST["worker_type"]) 
    && isset($_POST["is_eligible_to_vaccinate"])
    && isset($_POST["id"])
    ) {  
    $statement = $conn->prepare("UPDATE comp353.worker SET first_name = :first_name, 
                                                        last_name = :last_name, 
                                                        ssn = :ssn,
                                                        hourly_wage = :hourly_wage,
                                                        worker_type = :worker_type, 
                                                        is_eligible_to_vaccinate = :is_eligible_to_vaccinate
                                                        WHERE id = :id;");
                                
    $statement->bindParam(':first_name', $_POST["first_name"]);
    $statement->bindParam(':last_name', $_POST["last_name"]);
    $statement->bindParam(':ssn', $_POST["ssn"]);
    $statement->bindParam(':hourly_wage', $_POST["hourly_wage"]);
    $statement->bindParam(':worker_type', $_POST["worker_type"]);
    $statement->bindParam(':is_eligible_to_vaccinate', $_POST["is_eligible_to_vaccinate"]);
    $statement->bindParam(':id', $_POST["id"]);

    if($statement->execute()){
        header("Location: .");
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
    <label for="first_name">First Name</label><br>
        <input type="text" name="first_name" id="first_name" value="<?= $worker["first_name"] ?>"> <br>
        <label for="last_name">Last Name</label><br>
        <input type="text" name="last_name" id="last_name" value="<?= $worker["last_name"] ?>"> <br>
        <label for="ssn">Social Security Number</label><br>
        <input type="number" name="ssn" id="ssn" value="<?= $worker["ssn"] ?>"> <br>
        <label for="hourly_wage">Hourly Wage</label><br>
        <input type="text" name="hourly_wage" id="hourly_wage" value="<?= $worker["hourly_wage"] ?>"> <br>
        <label for="worker_type">Worker Type</label><br>
        <input type="text" name="worker_type" id="worker_type" value="<?= $worker["worker_type"] ?>"> <br>
        <label for="is_eligible_to_vaccinate">Allowed to Vaccinate</label><br>
        <input type="text" name="is_eligible_to_vaccinate" id="is_eligible_to_vaccinate" value="<?= $worker["is_eligible_to_vaccinate"] ?>"> <br>
        <input type="hidden" name="id" id="id" value="<?= $worker["id"] ?>"> <br>
        <button type="update">Update</button>
    </form>
    <a href="./">Back to Worker List</a>
</body>
</html>