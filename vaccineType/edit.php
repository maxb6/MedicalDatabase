<?php require_once '../database.php';
$TITLE = "Edit an Vaccine type";

$variants = $conn->prepare("SELECT * FROM comp353.vaccine_type AS vaccine_type WHERE vaccine_type.id = :id");
$variants->bindParam(":id", $_GET["id"]);
$variants->execute();
$variant = $variants->fetch(PDO::FETCH_ASSOC);


if(isset($_POST["vaccine_name"]) && isset($_POST["id"])
    ) {  
    $statement = $conn->prepare("UPDATE comp353.vaccine_type SET id = :id, 
                                                        vaccine_name = :vaccine_name
                                                        WHERE id = :id;");
                                
    $statement->bindParam(':vaccine_name', $_POST["vaccine_name"]);
    $statement->bindParam(':id', $_POST["id"]);
    



    if($statement->execute()){
        header("Location: .");
    }else{
        header("Location: ./edit.php?id=".$_POST["id"]);
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Vaccine Type</title>
</head>
<body>
<h1>Edit Vaccine Type</h1>
    <form action="./edit.php" method="post">
        <label for="vaccine_name">Vaccine Name</label><br>
        <input type="text" name="vaccine_name" id="vaccine_name" value="<?= $variant["vaccine_name"] ?>"> <br>
        <input type="hidden" name="id" id="id" value="<?= $variant["id"] ?>"> <br>
        <button type="update">Update</button>
    </form>
    <a href="./">Back to Variant List</a>
</body>
</html>