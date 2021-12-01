<?php require_once '../database.php';

$statement = $conn->prepare('SELECT * FROM comp353.appointment AS appointment WHERE appointment_date > :date1  AND :date2 > appointment_date');
$statement->bindParam(":date1", $_GET["date1"]);
$statement->bindParam(":date2", $_GET["date2"]);
$statement->execute();

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

    <h1>List of Appointments </h1>
    <table>
        <thead>
            <tr>
                <td>Appointment Id </td>
                <td>Facility Name </td>
                <td>Employee Id </td>
                <td>First Name </td>
                <td>Middle Initial </td>
                <td>Last Name </td>
                <td>Medicare Number</td>
                <td>Passport Number</td>
                <td>Appointment Date</td>
                <td>Appointment Time</td>
                <td>Vaccine Type</td>
                <td>Dose Number</td>
                <td>Lot Number</td>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $statement->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)) { ?>
                <tr>
                    <td><?= $row["id"] ?></td>
                    <td><?= $row["facility_name"] ?></td>
                    <td><?= $row["employee_id"] ?></td>
                    <td><?= $row["first_name"] ?></td>
                    <td><?= $row["middle_initial"] ?></td>
                    <td><?= $row["last_name"] ?></td>
                    <td><?= $row["medicare_number"] ?></td>
                    <td><?= $row["passport_number"] ?></td>
                    <td><?= $row["appointment_date"] ?></td>
                    <td><?= $row["appointment_time"] ?></td>
                    <td><?= $row["vaccine_type"] ?></td>
                    <td><?= $row["dose_number"] ?></td>
                    <td><?= $row["lot"] ?></td>
                    <td>
                </tr>
            <?php } ?>

        </tbody>  
        
    </table>
    <a href="././">Back to Appointment List</a>
</body>
</html>
