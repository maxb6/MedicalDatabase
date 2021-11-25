<?php require_once '../database.php';
$TITLE = "Show a book";


$people = $conn->prepare("SELECT * FROM comp353.person AS person WHERE person.id = :id");
$people->bindParam(":id", $_GET["id"]);
$people->execute();
$person = $people->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $person["first_name"] ?> <?= $person["last_name"] ?></title>
</head>
<body>
    <h1><?= $person["first_name"] ?> <?= $person["last_name"] ?></h1>
    <p>Date of Birth: <?= $person["date_of_birth"] ?></p>
    <p>Medicare Number: <?= $person["medicare_number"] ?></p>
    <p>Medicare Issue: <?= $person["medicare_issue"] ?></p>
    <p>Medicare Expiry: <?= $person["medicare_expiry"] ?></p>
    <p>Phone Number: <?= $person["phone_number"] ?></p>
    <p>Street Address: <?= $person["street_address"] ?></p>
    <p>City: <?= $person["city"] ?></p>
    <p>Province: <?= $person["province"] ?></p>
    <p>Postal Code: <?= $person["postal_code"] ?></p>
    <p>Citizenship: <?= $person["citizenship"] ?></p>
    <p>Email: <?= $person["email"] ?></p>
    <p>Age Group: <?= $person["age_group"] ?></p>

    <a href="./">Back to Person List</a>
</body>
</html>