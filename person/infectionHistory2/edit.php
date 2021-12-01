<?php require_once '../../database.php';
$TITLE = "Edit an Infection";

$infections = $conn->prepare("SELECT * FROM comp353.infection_history AS infection_history WHERE infection_history.id = :id");
$infections->bindParam(":id", $_GET["id"]);
$infections->execute();
$infection = $infections->fetch(PDO::FETCH_ASSOC);


if(isset($_POST["person_id"]) && isset($_POST["variant_name"]) && isset($_POST["infection_date"]) && isset($_POST["id"])
    ) {  
    $statement = $conn->prepare("UPDATE comp353.infection_history SET id = :id, 
                                                        person_id = :person_id, 
                                                        variant_name = :variant_name,
                                                        infection_date = :infection_date
                                                        WHERE id = :id;");
                                
    $statement->bindParam(':person_id', $_POST["person_id"]);
    $statement->bindParam(':variant_name', $_POST["variant_name"]);
    $statement->bindParam(':infection_date', $_POST["infection_date"]);
    $statement->bindParam(':id', $_POST["id"]);

    if($statement->execute()){
        header("Location: ./index.php?id=".$_POST["person_id"]);
    }else{
        header("Location: ./edit.php?id=".$_POST["person_id"]);
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Infection</title>
</head>
<body>
<h1>Edit Infection</h1>
    <form action="./edit.php" method="post">
        <label for="person_id">Person Id </label><br>
        <input type="number" name="person_id" id="person_id" value="<?= $infection["person_id"] ?>"> <br>
        <label for="variant_name">Variant Name</label><br>
        <input type="text" name="variant_name" id="variant_name" value="<?= $infection["variant_name"] ?>"> <br>
        <label for="infection_date">Infection Date</label><br>
        <input type="date" name="infection_date" id="infection_date" value="<?= $infection["infection_date"] ?>"> <br>
        <input type="hidden" name="id" id="id" value="<?= $infection["id"] ?>"> <br>
        <button type="update">Update</button>
    </form>
    <a href="./index.php?id=<?=$infection["person_id"]?>" >Back to Infection List</a>
</body>
</html>