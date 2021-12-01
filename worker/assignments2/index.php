<?php require_once '../../database.php';

$statement = $conn->prepare('SELECT * FROM comp353.assignment WHERE assignment.worker_id = :id;');
$statement->bindParam(":id", $_GET["id"]);
$statement->execute();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignments</title>
</head>
<body>
    <h1>List of Assignments for Worker Id = <?=$_GET["id"]?></h1>
    <a href="./create.php?id=<?=$_GET["id"]?>">Add a new Assignment</a>
    <table>
        <thead>
            <tr>
                <td>Assignment Id </td>
                <td>Worker Id</td>
                <td>Start Date </td>
                <td>End Date</td>
                <td>Facility</td>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $statement->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)) { ?>
                <tr>
                    <td><?= $row["id"] ?></td>
                    <td><?= $row["worker_id"] ?></td>
                    <td><?= $row["start_date"] ?></td>
                    <td><?= $row["end_date"] ?></td>
                    <td><?= $row["facility"] ?></td>
                    <td>
                        <a href="./show.php?id=<?=$row["id"]?>&worker_id=<?=$row["worker_id"]?>">Show</a>
                        <a href="./edit.php?id=<?=$row["id"]?>&worker_id=<?=$row["worker_id"]?>">Edit</a>
                        <a href="./delete.php?id=<?=$row["id"]?>&worker_id=<?=$row["worker_id"]?>">Delete</a>
                    </td>
                </tr>
            <?php } ?>

        </tbody>  
        
    </table>
    <a href="../">Back to Worker List</a>
</body>
</html>
