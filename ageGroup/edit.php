<?php require_once '../database.php';
$TITLE = "Edit an Age Group";

$age_groups = $conn->prepare("SELECT * FROM comp353.age_group AS age_group WHERE age_group.id = :id");
$age_groups->bindParam(":id", $_GET["id"]);
$age_groups->execute();
$age_group = $age_groups->fetch(PDO::FETCH_ASSOC);


if(isset($_POST["group_number"]) && isset($_POST["age_range"])
    ) {  
    $statement = $conn->prepare("UPDATE comp353.age_group SET id = :id, 
                                                        group_number = :group_number, 
                                                        age_range = :age_range
                                                        WHERE id = :id;");
                                
    $statement->bindParam(':group_number', $_POST["group_number"]);
    $statement->bindParam(':age_range', $_POST["age_range"]);
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
    <title>Edit Age Group</title>
</head>
<body>
<h1>Edit Age Group</h1>
    <form action="./edit.php" method="post">
    <label for="group_number">Group Number </label><br>
        <input type="number" name="group_number" id="group_number" value="<?= $age_group["group_number"] ?>"> <br>
        <label for="age_range">Age Range</label><br>
        <input type="text" name="age_range" id="age_range" value="<?= $age_group["age_range"] ?>"> <br>
        <input type="hidden" name="id" id="id" value="<?= $age_group["id"] ?>"> <br>
        <button type="update">Update</button>
    </form>
    <a href="./">Back to Age Groups List</a>
</body>
</html>