<?php require_once '../database.php';
$TITLE = "Show a book";


$facilities = $conn->prepare("SELECT * FROM comp353.facility AS facility WHERE facility.id = :id");
$facilities->bindParam(":id", $_GET["id"]);
$facilities->execute();
$facility = $facilities->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $facility["facility_name"] ?></title>
</head>
<body>
    <h1><?= $facility["facility_name"] ?></h1>
    <p>Street Address: <?= $facility["street_address"] ?></p>
    <p>Phone Number: <?= $facility["phone_number"] ?></p>
    <p>Web Address: <?= $facility["web_address"] ?></p>
    <p>Facility Type: <?= $facility["facility_type"] ?></p>
    <p>Capacity: <?= $facility["capacity"] ?></p>
    <p>Operating Hours: <?= $facility["operating_hours"] ?></p>
    <p>Operating Days: <?= $facility["operating_days"] ?></p>
    <p>Manager Id: <?= $facility["manager_id"] ?></p>
    <p>Appointment Type: <?= $facility["appointment_type"] ?></p>

    <a href="./">Back to Facility List</a>
</body>
</html>