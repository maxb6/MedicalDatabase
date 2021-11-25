<?php require_once '../database.php';
$TITLE = "Add a Age Group";

if(isset($_POST["group_number"]) && isset($_POST["age_range"])
) {
    
    $group = $conn->prepare("INSERT INTO comp353.age_group (group_number, age_range)
    VALUES (:group_number, :age_range);");
    
    $group->bindParam(':group_number', $_POST["group_number"]);
    $group->bindParam(':age_range', $_POST["age_range"]);

    if($group->execute())
        header("Location: .");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add an Age Group</title>
</head>
<body>
<h1>Add an Age Group</h1>
    <form action="./create.php" method="post">
        <label for="group_number">Group Number</label><br>
        <input type="text" name="group_number" id="group_number"> <br>
        <label for="age_range">Age Range</label><br>
        <input type="text" name="age_range" id="age_range"> <br>
        <button type="submit">Add</button>
    </form>
    <a href="./">Back to Age Groups List</a>
</body>
</html>