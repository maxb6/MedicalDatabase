<?php require_once '../database.php';

$statement = $conn->prepare('SELECT * FROM comp353.person AS person');
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
    <h1>List of People </h1>
    <a href="./create.php">Add a new person</a>
    <table>
        <thead>
            <tr>
                <td>Person Id </td>
                <td>First Name </td>
                <td>Last Name </td>
                <td>Date of Birth</td>
                <td>Medicare Number</td>
                <td>Medicare Issue Date</td>
                <td>Medicare Expiry Date</td>
                <td>Phone Number</td>
                <td>Address</td>
                <td>City</td>
                <td>Province</td>
                <td>Postal Code</td>
                <td>Citizenship</td>
                <td>Email</td>
                <td>Age Group</td>

            </tr>
        </thead>
        <tbody>
            <?php while ($row = $statement->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)) { ?>
                <tr>
                    <td><?= $row["id"] ?></td>
                    <td><?= $row["first_name"] ?></td>
                    <td><?= $row["last_name"] ?></td>
                    <td><?= $row["date_of_birth"] ?></td>
                    <td><?= $row["medicare_number"] ?></td>
                    <td><?= $row["medicare_issue"] ?></td>
                    <td><?= $row["medicare_expiry"] ?></td>
                    <td><?= $row["phone_number"] ?></td>
                    <td><?= $row["street_address"] ?></td>
                    <td><?= $row["city"] ?></td>
                    <td><?= $row["province"] ?></td>
                    <td><?= $row["postal_code"] ?></td>
                    <td><?= $row["citizenship"] ?></td>
                    <td><?= $row["email"] ?></td>
                    <td><?= $row["age_group"] ?></td>
                    <td>
                        <a href="./show.php?id=<?=$row["id"]?>">Show</a>
                        <a href="./infectionHistory2/index.php?id=<?=$row["id"]?>">Infection History</a>
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
