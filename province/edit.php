<?php require_once '../database.php';
$TITLE = "Edit an Vaccine type";

$variants = $conn->prepare("SELECT * FROM comp353.province AS province WHERE province.id = :id");
$variants->bindParam(":id", $_GET["id"]);
$variants->execute();
$variant = $variants->fetch(PDO::FETCH_ASSOC);


if(isset($_POST["province_name"]) && isset($_POST["age_group"]) && isset($_POST["id"])
    ) {  
    $statement = $conn->prepare("UPDATE comp353.province SET id = :id, 
                                                        province_name = :province_name,
                                                        age_group = :age_group
                                                        WHERE id = :id;");
                                
    $statement->bindParam(':province_name', $_POST["province_name"]);
    $statement->bindParam(':age_group', $_POST["age_group"]);
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
        <label for="province_name">Province Name</label><br>
        <input type="text" name="province_name" id="province_name" value="<?= $variant["province_name"] ?>"> <br>
        <label for="age_group">Age Group</label><br>
        <input type="text" name="age_group" id="age_group" value="<?= $variant["age_group"] ?>"> <br>
        <input type="hidden" name="id" id="id" value="<?= $variant["id"] ?>"> <br>
        <button type="update">Update</button>
    </form>
    <a href="./">Back to Variant List</a>
</body>
</html>