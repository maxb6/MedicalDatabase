<?php require_once '../database.php';
$TITLE = "Edit an Age Group";

$variants = $conn->prepare("SELECT * FROM comp353.infection_variant AS infection_variant WHERE infection_variant.id = :id");
$variants->bindParam(":id", $_GET["id"]);
$variants->execute();
$variant = $variants->fetch(PDO::FETCH_ASSOC);


if(isset($_POST["variant_name"]) && isset($_POST["id"])
    ) {  
    $statement = $conn->prepare("UPDATE comp353.infection_variant SET id = :id, 
                                                        variant_name = :variant_name 
                                                        WHERE id = :id;");
                                
    $statement->bindParam(':variant_name', $_POST["variant_name"]);
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
    <title>Edit Variant</title>
</head>
<body>
<h1>Edit Variant</h1>
    <form action="./edit.php" method="post">
        <label for="variant_name">Variant Name</label><br>
        <input type="text" name="variant_name" id="variant_name" value="<?= $variant["variant_name"] ?>"> <br>
        <input type="hidden" name="id" id="id" value="<?= $variant["id"] ?>"> <br>
        <button type="update">Update</button>
    </form>
    <a href="./">Back to Variant List</a>
</body>
</html>