<?php require_once '../database.php';

$statement = $conn->prepare('SELECT * FROM comp353.facility AS facility');
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
    <h1>List of Facilities </h1>
    <a href="./create.php">Add a new Facility</a>
    <table>
        <thead>
            <tr>
                <td>Facility Name </td>
                <td>Street Address</td>
                <td>Phone Number</td>
                <td>Web Address</td>
                <td>Facility Type</td>
                <td>Capacity</td>
                <td>Operating Hours</td>
                <td>Operating Days</td>
                <td>Manager Id</td>
                <td>Appointment Type Allowed</td>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $statement->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)) { ?>
                <tr>
                    <td><?= $row["facility_name"] ?></td>
                    <td><?= $row["street_address"] ?></td>
                    <td><?= $row["phone_number"] ?></td>
                    <td><?= $row["web_address"] ?></td>
                    <td><?= $row["facility_type"] ?></td>
                    <td><?= $row["capacity"] ?></td>
                    <td><?= $row["operating_hours"] ?></td>
                    <td><?= $row["operating_days"] ?></td>
                    <td><?= $row["manager_id"] ?></td>
                    <td><?= $row["appointment_type"] ?></td>
                    <td>
                        <a href="./show.php?id=<?=$row["id"]?>">Show</a>
                        <a href="./edit.php?id=<?=$row["id"]?>">Edit</a>
                        <a href="./delete.php?id=<?=$row["id"]?>">Delete</a>
                    </td>
                </tr>
            <?php } ?>

        </tbody>  
        
    </table>
    <a href="../">Back to Homepage</a>
</body>
</html>
