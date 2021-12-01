<?php require_once '../database.php';
$TITLE = "Show a appointment";


$appointments = $conn->prepare("SELECT * FROM comp353.appointment AS appointment WHERE appointment.id = :id");
$appointments->bindParam(":id", $_GET["id"]);
$appointments->execute();
$appointment = $appointments->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Id: <?= $appointment["id"] ?></title>
</head>
<body>
    <h1>Appointment Id: <?= $appointment["id"] ?></h1>
    <p>Facility Name: <?= $appointment["facility_name"] ?></p>
    <p>Employee Id: <?= $appointment["employee_id"] ?></p>
    <p>First Name: <?= $appointment["first_name"] ?></p>
    <p>Middle Initial: <?= $appointment["middle_initial"] ?></p>
    <p>Last Name: <?= $appointment["last_name"] ?></p>
    <p>Medicare Number: <?= $appointment["medicare_number"] ?></p>
    <p>Passport Number: <?= $appointment["passport_number"] ?></p>
    <p>Appointment Date: <?= $appointment["appointment_date"] ?></p>
    <p>Appointment Time: <?= $appointment["appointment_time"] ?></p>
    <p>Vaccine Type: <?= $appointment["vaccine_type"] ?></p>
    <p>Dose Number: <?= $appointment["dose_number"] ?></p>
    <p>Lot Number: <?= $appointment["lot"] ?></p>

    <a href="./">Back to Appointment List</a>
</body>
</html>