<?php require_once '../database.php';
$TITLE = "Add a province";

if(isset($_POST["province_name"]) && isset($_POST["age_group"])
) {
    
    $group = $conn->prepare("INSERT INTO comp353.province(province_name, age_group)
    VALUES (:province_name, :age_group);");
    
    $group->bindParam(':province_name', $_POST["province_name"]);
    $group->bindParam(':age_group', $_POST["age_group"]);


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
    <title>Add a Province</title>
</head>
<body>
<h1>Add a Province</h1>
    <form action="./create.php" method="post">
        <label for="province_name">Province Name</label><br>
        <input type="text" name="province_name" id="province_name"> <br>
        <label for="age_group">Age Group</label><br>
        <input type="number" name="age_group" id="age_group"> <br>
        <button type="submit">Add</button>
    </form>
    <a href="./">Back to Vaccine Type List</a>
</body>
</html>