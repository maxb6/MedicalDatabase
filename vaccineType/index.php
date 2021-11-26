<?php require_once '../database.php';

$statement = $conn->prepare('SELECT * FROM comp353.vaccine_type AS vaccine_type');
$statement->execute();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Age Groups</title>
</head>
<body>
    <h1>List of Vaccine Types</h1>
    <a href="./create.php">Add a new vaccine type</a>
    <table>
        <thead>
            <tr>
                <td>Vaccine Id</td>
                <td>Vaccine type</td>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $statement->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)) { ?>
                <tr>
                    <td><?= $row["id"] ?></td>
                    <td><?= $row["vaccine_name"] ?></td>
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
