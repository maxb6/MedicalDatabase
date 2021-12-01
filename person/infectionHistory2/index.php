<?php require_once '../../database.php';

$statement = $conn->prepare('SELECT distinct infection_history.id,person_id,variant_name,infection_date FROM comp353.infection_history, comp353.person WHERE infection_history.person_id = :id;');
$statement->bindParam(":id", $_GET["id"]);
$statement->execute();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Infection History for Person Id = <?=$_GET["id"]?></title>
</head>
<body>
    <h1>Infection History for Person Id = <?=$_GET["id"]?></h1>
    <a href="./create.php?id=<?=$_GET["id"]?>">Create an Infection </a>
    <table>
        <thead>
            <tr>
                <td>Id</td>
                <td>Person Id</td>
                <td>Variant Name</td>
                <td>Infection Date</td>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $statement->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)) { ?>
                <tr>
                    <td><?= $row["id"] ?></td>
                    <td><?= $row["person_id"] ?></td>
                    <td><?= $row["variant_name"] ?></td>
                    <td><?= $row["infection_date"] ?></td>
                    <td>
                        <a href="./show.php?id=<?=$row["id"]?>&person_id=<?=$row["person_id"]?>">Show</a>
                        <a href="./edit.php?id=<?=$row["id"]?>&person_id=<?=$row["person_id"]?>">Edit</a>
                        <a href="./delete.php?id=<?=$row["id"]?>&person_id=<?=$row["person_id"]?>">Delete</a>
                    </td>
                </tr>
            <?php } ?>

        </tbody>  
        
    </table>
    <a href="../">Back to Infection List</a>
</body>
</html>
