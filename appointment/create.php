<?php require_once '../database.php';
$TITLE = "Add a appointment";

if(isset($_POST["facility_name"]) && isset($_POST["employee_id"]) && isset($_POST["first_name"]) 
&& isset($_POST["last_name"]) && isset($_POST["medicare_number"]) && isset($_POST["appointment_date"]) 
&& isset($_POST["appointment_time"]) && isset($_POST["vaccine_type"]) && isset($_POST["dose_number"]) && isset($_POST["lot"])
) {
    
    $appointment = $conn->prepare("INSERT INTO comp353.appointment (facility_name, employee_id, first_name, last_name, medicare_number, appointment_date, appointment_time, vaccine_type, dose_number, lot)
    VALUES (:facility_name, :employee_id, :first_name, :last_name, :medicare_number, :appointment_date, :appointment_time, :vaccine_type, :dose_number, :lot);");
    
    $appointment->bindParam(':facility_name', $_POST["facility_name"]);
    $appointment->bindParam(':employee_id', $_POST["employee_id"]);
    $appointment->bindParam(':first_name', $_POST["first_name"]);
    $appointment->bindParam(':last_name', $_POST["last_name"]);
    $appointment->bindParam(':medicare_number', $_POST["medicare_number"]);
    $appointment->bindParam(':appointment_date', $_POST["appointment_date"]);
    $appointment->bindParam(':appointment_time', $_POST["appointment_time"]);
    $appointment->bindParam(':vaccine_type', $_POST["vaccine_type"]);
    $appointment->bindParam(':dose_number', $_POST["dose_number"]);
    $appointment->bindParam(':lot', $_POST["lot"]);

    if($appointment->execute())
        header("Location: .");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a Appointment</title>
</head>
<body>
<h1>Add a Appointment</h1>
    <form action="./create.php" method="post">
        <label for="facility_name">Facility Name</label><br>
        <input type="text" name="facility_name" id="facility_name"> <br>
        <label for="employee_id">Employee Id</label><br>
        <input type="number" name="employee_id" id="employee_id"> <br>
        <label for="first_name">First Name</label><br>
        <input type="text" name="first_name" id="first_name"> <br>
        <label for="last_name">Last Name</label><br>
        <input type="text" name="last_name" id="last_name"> <br>
        <label for="medicare_number">Medicare Number</label><br>
        <input type="text" name="medicare_number" id="medicare_number"> <br>
        <label for="appointment_date">Appointment Date</label><br>
        <input type="date" name="appointment_date" id="appointment_date"> <br>
        <label for="appointment_time">Appointment Time</label><br>
        <input type="number" name="appointment_time" id="appointment_time"> <br>
        <label for="vaccine_type">Vaccine Type</label><br>
        <input type="text" name="vaccine_type" id="vaccine_type"> <br>
        <label for="dose_number">Dose Number</label><br>
        <input type="number" name="dose_number" id="dose_number"> <br>
        <label for="lot">Lot Number</label><br>
        <input type="number" name="lot" id="lot"> <br>
        <button type="submit">Add</button>
    </form>
    <a href="./">Back to Appointment List</a>
</body>
</html>