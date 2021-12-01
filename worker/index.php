<?php require_once '../database.php';

$statement = $conn->prepare('SELECT * FROM comp353.worker AS worker');
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
    <h1>List of Workers </h1>
    <a href="./create.php">Add a new Worker</a>
    <table>
        <thead>
            <tr>
                <td>Worker Id </td>
                <td>First Name </td>
                <td>Last Name </td>
                <td>Social Security Number</td>
                <td>Hourly Wage</td>
                <td>Worker Type</td>
                <td>Allowed to Vaccinate</td>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $statement->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)) { ?>
                <tr>
                    <td><?= $row["id"] ?></td>
                    <td><?= $row["first_name"] ?></td>
                    <td><?= $row["last_name"] ?></td>
                    <td><?= $row["ssn"] ?></td>
                    <td><?= $row["hourly_wage"] ?></td>
                    <td><?= $row["worker_type"] ?></td>
                    <td><?= $row["is_eligible_to_vaccinate"] ?></td>
                    <td>
                        <a href="./show.php?id=<?=$row["id"]?>">Show</a>
                        <a href="assignments2/index.php?id=<?=$row["id"]?>">Assignments</a>
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
