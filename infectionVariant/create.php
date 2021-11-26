<?php require_once '../database.php';
$TITLE = "Add a variant";

if(isset($_POST["variant_name"])
) {
    
    $group = $conn->prepare("INSERT INTO comp353.infection_variant(variant_name)
    VALUES (:variant_name);");
    
    $group->bindParam(':variant_name', $_POST["variant_name"]);

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
    <title>Add an Variant</title>
</head>
<body>
<h1>Add an Variant</h1>
    <form action="./create.php" method="post">
        <label for="variant_name">Variant Name</label><br>
        <input type="text" name="variant_name" id="variant_name"> <br>
        <button type="submit">Add</button>
    </form>
    <a href="./">Back to Variant List</a>
</body>
</html>