<?php require_once '../database.php';
$TITLE = "Add a worker";

if(isset($_POST["first_name"]) && isset($_POST["last_name"]) && isset($_POST["ssn"]) 
&& isset($_POST["hourly_wage"]) && isset($_POST["worker_type"]) && isset($_POST["is_eligible_to_vaccinate"])
) {
    
    $worker = $conn->prepare("INSERT INTO comp353.worker (first_name, last_name, ssn, hourly_wage, worker_type, is_eligible_to_vaccinate)
    VALUES (:first_name, :last_name, :ssn, :hourly_wage, :worker_type, :is_eligible_to_vaccinate);");
    
    $worker->bindParam(':first_name', $_POST["first_name"]);
    $worker->bindParam(':last_name', $_POST["last_name"]);
    $worker->bindParam(':ssn', $_POST["ssn"]);
    $worker->bindParam(':hourly_wage', $_POST["hourly_wage"]);
    $worker->bindParam(':worker_type', $_POST["worker_type"]);
    $worker->bindParam(':is_eligible_to_vaccinate', $_POST["is_eligible_to_vaccinate"]);

    if($worker->execute())
        header("Location: .");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a Worker</title>
</head>
<body>
<h1>Add a Worker</h1>
    <form action="./create.php" method="post">
        <label for="first_name">First Name</label><br>
        <input type="text" name="first_name" id="first_name"> <br>
        <label for="last_name">Last Name</label><br>
        <input type="text" name="last_name" id="last_name"> <br>
        <label for="ssn">Social Security Number</label><br>
        <input type="number" name="ssn" id="ssn"> <br>
        <label for="hourly_wage">Hourly Wage</label><br>
        <input type="text" name="hourly_wage" id="hourly_wage"> <br>
        <label for="worker_type">Worker Type</label><br>
        <input type="text" name="worker_type" id="worker_type"> <br>
        <label for="is_eligible_to_vaccinate">Allowed to Vaccinate</label><br>
        <input type="text" name="is_eligible_to_vaccinate" id="is_eligible_to_vaccinate"> <br>
        <button type="submit">Add</button>
    </form>
    <a href="./">Back to Worker List</a>
</body>
</html>