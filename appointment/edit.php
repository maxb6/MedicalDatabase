<?php require_once '../database.php';
$TITLE = "Edit an appointment";

$appointments = $conn->prepare("SELECT * FROM comp353.appointment AS appointment WHERE appointment.id = :id");
$appointments->bindParam(":id", $_GET["id"]);
$appointments->execute();
$appointment = $appointments->fetch(PDO::FETCH_ASSOC);


if(isset($_POST["facility_name"]) && isset($_POST["employee_id"]) && isset($_POST["first_name"]) && isset($_POST["middle_initial"]) 
&& isset($_POST["last_name"]) && isset($_POST["medicare_number"]) && isset($_POST["passport_number"]) && isset($_POST["appointment_date"]) 
&& isset($_POST["appointment_time"]) && isset($_POST["vaccine_type"]) && isset($_POST["dose_number"]) && isset($_POST["lot"]) && isset($_POST["id"])
) {

    $statement = $conn->prepare("UPDATE comp353.appointment SET facility_name = :facility_name, 
                                                        employee_id = :employee_id, 
                                                        first_name = :first_name,
                                                        middle_initial = :middle_initial,
                                                        last_name = :last_name,
                                                        medicare_number = :medicare_number, 
                                                        passport_number = :passport_number,
                                                        appointment_date = :appointment_date,
                                                        appointment_time = :appointment_time,
                                                        vaccine_type = :vaccine_type, 
                                                        dose_number = :dose_number, 
                                                        lot = :lot 
                                                        WHERE id = :id;");
                                
    $statement->bindParam(':facility_name', $_POST["facility_name"]);
    $statement->bindParam(':employee_id', $_POST["employee_id"]);
    $statement->bindParam(':first_name', $_POST["first_name"]);
    $statement->bindParam(':middle_initial', $_POST["middle_initial"]);
    $statement->bindParam(':last_name', $_POST["last_name"]);
    $statement->bindParam(':medicare_number', $_POST["medicare_number"]);
    $statement->bindParam(':passport_number', $_POST["passport_number"]);
    $statement->bindParam(':appointment_date', $_POST["appointment_date"]);
    $statement->bindParam(':appointment_time', $_POST["appointment_time"]);
    $statement->bindParam(':vaccine_type', $_POST["vaccine_type"]);
    $statement->bindParam(':dose_number', $_POST["dose_number"]);
    $statement->bindParam(':lot', $_POST["lot"]);
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
    <title>Edit Appointment</title>
</head>
<body>
<h1>Edit Appointment</h1>
    <form action="./edit.php" method="post">
        <label for="facility_name">Facility Name</label><br>
        <input type="text" name="facility_name" id="facility_name" value="<?= $appointment["facility_name"] ?>"> <br>
        <label for="employee_id">Employee Id</label><br>
        <input type="number" name="employee_id" id="employee_id" value="<?= $appointment["employee_id"] ?>"> <br>
        <label for="first_name">First Name</label><br>
        <input type="text" name="first_name" id="first_name" value="<?= $appointment["first_name"] ?>"> <br>
        <label for="middle_initial">Middle Initial</label><br>
        <input type="text" name="middle_initial" id="middle_initial" value="<?= $appointment["middle_initial"] ?>"> <br>
        <label for="last_name">Last Name</label><br>
        <input type="text" name="last_name" id="last_name" value="<?= $appointment["last_name"] ?>"> <br>
        <label for="medicare_number">Medicare Number</label><br>
        <input type="text" name="medicare_number" id="medicare_number" value="<?= $appointment["medicare_number"] ?>"> <br>
        <label for="passport_number">Passport Number</label><br>
        <input type="number" name="passport_number" id="passport_number" value="<?= $appointment["passport_number"] ?>"> <br>
        <label for="appointment_date">Appointment Date</label><br>
        <input type="date" name="appointment_date" id="appointment_date" value="<?= $appointment["appointment_date"] ?>"> <br>
        <label for="appointment_time">Appointment Time</label><br>
        <input type="time" name="appointment_time" id="appointment_time" value="<?= $appointment["appointment_time"] ?>"> <br>
        <label for="vaccine_type">Vaccine Type</label><br>
        <input type="text" name="vaccine_type" id="vaccine_type" value="<?= $appointment["vaccine_type"] ?>"> <br>
        <label for="dose_number">Dose Number</label><br>
        <input type="number" name="dose_number" id="dose_number" value="<?= $appointment["dose_number"] ?>"> <br>
        <label for="lot">Lot Number</label><br>
        <input type="number" name="lot" id="lot" value="<?= $appointment["lot"] ?>"> <br>
        <input type="hidden" name="id" id="id" value="<?= $appointment["id"] ?>" > <br>
        <button type="submit">Update</button>
    </form>
    <a href="./">Back to Appointment List</a>
</body>
</html>