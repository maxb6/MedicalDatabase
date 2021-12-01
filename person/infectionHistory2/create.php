<?php require_once '../../database.php';
$TITLE = "Add an Infection";

if(isset($_POST["person_id"]) && isset($_POST["variant_name"]) && isset($_POST["infection_date"])
) {
    
    $infection = $conn->prepare("INSERT INTO comp353.infection_history (person_id, variant_name, infection_date)
    VALUES (:person_id, :variant_name, :infection_date);");
    
    $infection->bindParam(':person_id', $_POST["person_id"]);
    $infection->bindParam(':variant_name', $_POST["variant_name"]);
    $infection->bindParam(':infection_date', $_POST["infection_date"]);

    if($infection->execute())
        header("Location: ./index.php?id=".$_POST["person_id"]);
}

$person_id = $_GET["id"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add an Infection</title>
</head>
<body>

<h1>Add an Infection</h1>
    <form action="./create.php" method="post">
        <label for="person_id">Person Id</label><br>
        <input type="number" name="person_id" id="person_id" value="<?php echo $person_id?>"> <br>
        <label for="variant_name">Variant Name</label><br>
        <input type="text" name="variant_name" id="variant_name"> <br>
        <label for="infection_date">Infection date</label><br>
        <input type="date" name="infection_date" id="infection_date"> <br>
        <button type="submit">Add</button>
    </form>
    <a href="./index.php?id=<?php echo $person_id?>" >Back to Infection List</a>
</body>
</html>