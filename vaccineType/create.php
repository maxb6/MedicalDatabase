<?php require_once '../database.php';
$TITLE = "Add a vaccine type";

if(isset($_POST["vaccine_name"])
) {
    
    $group = $conn->prepare("INSERT INTO comp353.vaccine_type(vaccine_name)
    VALUES (:vaccine_name);");
    
    $group->bindParam(':vaccine_name', $_POST["vaccine_name"]);

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
    <title>Add a vaccine type</title>
</head>
<body>
<h1>Add an vaccine type</h1>
    <form action="./create.php" method="post">
        <label for="vaccine_name">Vaccine Name</label><br>
        <input type="text" name="vaccine_name" id="vaccine_name"> <br>
        <button type="submit">Add</button>
    </form>
    <a href="./">Back to Vaccine Type List</a>
</body>
</html>