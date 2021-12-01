<?php require_once '../database.php';

$statement = $conn->prepare('SELECT appointment_date, facility_name, appointment_time FROM comp353.appointment 
                            WHERE appointment_date = :date  AND appointment.facility_name = :facility');
$statement->bindParam(":facility", $_GET["facility"]);
$statement->bindParam(":date", $_GET["date"]);
$statement->execute();
$appointment = $statement->fetch(PDO::FETCH_ASSOC);

$app = $conn->prepare('SELECT id, appointment_date, facility_name, appointment_time FROM comp353.appointment 
                            WHERE appointment_date = :date  AND appointment.facility_name = :facility');
$app->bindParam(":facility", $_GET["facility"]);
$app->bindParam(":date", $_GET["date"]);
$app->execute();

$alt = $conn->prepare('SELECT min(appointment_time) AS min_appointment FROM comp353.appointment 
                            WHERE appointment_date = :date  AND appointment.facility_name = :facility');
$alt->bindParam(":facility", $_GET["facility"]);
$alt->bindParam(":date", $_GET["date"]);
$alt->execute();
$earliest = $alt->fetch(PDO::FETCH_ASSOC);

$etime =  $earliest["min_appointment"];

$newTime = date('H:i:s',strtotime($etime)-20*60);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1>List of Appointments for <?= $appointment["facility_name"] ?> on <?= $appointment["appointment_date"] ?> </h1>
    <table>
        <tbody>
            <?php while ($row = $app->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)) { ?>        
                <tr>
                    <td>Id: <?= $row["id"] ?> Time: <?= $row["appointment_time"] ?></td>
                </tr>
            <?php } ?>
        </tbody>      
    </table>

    
    <p>Earliest Appointment Time: <?php echo $newTime?></p>
    

    <a href="././">Back to Appointment List</a>
</body>
</html>
