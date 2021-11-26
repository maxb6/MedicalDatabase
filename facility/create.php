<?php require_once '../database.php';
$TITLE = "Add a Facility";

if(isset($_POST["facility_name"]) && isset($_POST["street_address"]) && isset($_POST["phone_number"]) 
    && isset($_POST["web_address"]) && isset($_POST["facility_type"]) && isset($_POST["capacity"])
    && isset($_POST["operating_hours"]) && isset($_POST["operating_days"]) && isset($_POST["manager_id"])
    && isset($_POST["appointment_type"])
    ) {
    
    $statement = $conn->prepare("INSERT INTO comp353.facility (facility_name, street_address, phone_number,web_address,facility_type, capacity,
    operating_hours,operating_days, manager_id, appointment_type)
    VALUES (:facility_name, :street_address, :phone_number, :web_address, :facility_type, :capacity,
    :operating_hours, :operating_days, :manager_id, :appointment_type);");
    
    $statement->bindParam(':facility_name', $_POST["facility_name"]);
    $statement->bindParam(':street_address', $_POST["street_address"]);
    $statement->bindParam(':phone_number', $_POST["phone_number"]);
    $statement->bindParam(':web_address', $_POST["web_address"]);
    $statement->bindParam(':facility_type', $_POST["facility_type"]);
    $statement->bindParam(':capacity', $_POST["capacity"]);
    $statement->bindParam(':operating_hours', $_POST["operating_hours"]);
    $statement->bindParam(':operating_days', $_POST["operating_days"]);
    $statement->bindParam(':manager_id', $_POST["manager_id"]);
    $statement->bindParam(':appointment_type', $_POST["appointment_type"]);

    if($statement->execute())
        header("Location: .");
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a Facility</title>
</head>
<body>
<h1>Add a Facility</h1>
    <form action="./create.php" method="post">
        <label for="facility_name">Facility Name</label><br>
        <input type="text" name="facility_name" id="facility_name"> <br>
        <label for="phone_number">Phone Number</label><br>
        <input type="text" name="phone_number" id="phone_number"> <br>
        <label for="web_address">Web Address</label><br>
        <input type="text" name="web_address" id="web_address"> <br>
        <label for="facility_type">Facility Type</label><br>
        <input type="text" name="facility_type" id="facility_type"> <br>
        <label for="capacity">Capacity</label><br>
        <input type="number" name="capacity" id="capacity"> <br>
        <label for="operating_hours">Operating Hours</label><br>
        <input type="text" name="operating_hours" id="operating_hours"> <br>
        <label for="operating_days">Operating Days</label><br>
        <input type="text" name="operating_days" id="operating_days"> <br>
        <label for="manager_id">Manager ID</label><br>
        <input type="number" name="manager_id" id="manager_id"> <br>
        <label for="appointment_type">Appointment Type</label><br>
        <input type="text" name="appointment_type" id="appointment_type"> <br>
        <button type="submit">Add</button>
    </form>
    <a href="./">Back to Facility List</a>
</body>
</html>