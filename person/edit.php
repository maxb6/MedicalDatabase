<?php require_once '../database.php';
$TITLE = "Edit a person";

$people = $conn->prepare("SELECT * FROM comp353.person AS person WHERE person.id = :id");
$people->bindParam(":id", $_GET["id"]);
$people->execute();
$person = $people->fetch(PDO::FETCH_ASSOC);


if(isset($_POST["first_name"]) && isset($_POST["last_name"]) && isset($_POST["date_of_birth"]) 
    && isset($_POST["medicare_number"]) && isset($_POST["medicare_issue"]) && isset($_POST["medicare_expiry"])
    && isset($_POST["phone_number"]) && isset($_POST["street_address"]) && isset($_POST["city"])
    && isset($_POST["province"]) && isset($_POST["postal_code"]) && isset($_POST["citizenship"])
    && isset($_POST["email"]) && isset($_POST["age_group"]) && isset($_POST["id"])
    ) {  

    $statement = $conn->prepare("UPDATE comp353.person SET first_name = :first_name, 
                                                        last_name = :last_name, 
                                                        date_of_birth = :date_of_birth,
                                                        medicare_number = :medicare_number,
                                                        medicare_issue = :medicare_issue, 
                                                        medicare_expiry = :medicare_expiry,
                                                        phone_number = :phone_number,
                                                        street_address = :street_address, 
                                                        city = :city, 
                                                        province = :province, 
                                                        postal_code = :postal_code, 
                                                        citizenship = :citizenship,
                                                        email = :email, 
                                                        age_group = :age_group
                                                        WHERE id = :id;");
                                
    $statement->bindParam(':first_name', $_POST["first_name"]);
    $statement->bindParam(':last_name', $_POST["last_name"]);
    $statement->bindParam(':date_of_birth', $_POST["date_of_birth"]);
    $statement->bindParam(':medicare_number', $_POST["medicare_number"]);
    $statement->bindParam(':medicare_issue', $_POST["medicare_issue"]);
    $statement->bindParam(':medicare_expiry', $_POST["medicare_expiry"]);
    $statement->bindParam(':phone_number', $_POST["phone_number"]);
    $statement->bindParam(':street_address', $_POST["street_address"]);
    $statement->bindParam(':city', $_POST["city"]);
    $statement->bindParam(':province', $_POST["province"]);
    $statement->bindParam(':postal_code', $_POST["postal_code"]);
    $statement->bindParam(':citizenship', $_POST["citizenship"]);
    $statement->bindParam(':email', $_POST["email"]);
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
    <title>Edit Person</title>
</head>
<body>
<h1>Edit Person</h1>
    <form action="./edit.php" method="post">
        <label for="first_name">First Name</label><br>
        <input type="text" name="first_name" id="first_name" value="<?= $person["first_name"] ?>"> <br>
        <label for="last_name">Last Name</label><br>
        <input type="text" name="last_name" id="last_name" value="<?= $person["last_name"] ?>"> <br>
        <label for="date_of_birth">Date of Birth</label><br>
        <input type="date" name="date_of_birth" id="date_of_birth" value="<?= $person["date_of_birth"] ?>"> <br>
        <label for="medicare_number">Medicare Number</label><br>
        <input type="text" name="medicare_number" id="medicare_number" value="<?= $person["medicare_number"] ?>"> <br>
        <label for="medicare_issue">Medicare Issue Date</label><br>
        <input type="date" name="medicare_issue" id="medicare_issue" value="<?= $person["medicare_issue"] ?>"> <br>
        <label for="medicare_expiry">Medicare Expiry Date</label><br>
        <input type="date" name="medicare_expiry" id="medicare_expiry" value="<?= $person["medicare_expiry"] ?>"> <br>
        <label for="phone_number">Phone Number</label><br>
        <input type="text" name="phone_number" id="phone_number" value="<?= $person["phone_number"] ?>"> <br>
        <label for="street_address">Street Address</label><br>
        <input type="text" name="street_address" id="street_address" value="<?= $person["street_address"] ?>"> <br>
        <label for="city">City</label><br>
        <input type="text" name="city" id="city" value="<?= $person["city"] ?>"> <br>
        <label for="province">Province</label><br>
        <input type="text" name="province" id="province" value="<?= $person["province"] ?>"> <br>
        <label for="postal_code">Postal Code</label><br>
        <input type="text" name="postal_code" id="postal_code" value="<?= $person["postal_code"] ?>"> <br>
        <label for="citizenship">Citizenship</label><br>
        <input type="text" name="citizenship" id="citizenship" value="<?= $person["citizenship"] ?>"> <br>
        <label for="email">Email</label><br>
        <input type="text" name="email" id="email" value="<?= $person["email"] ?>"> <br>
        <label for="age_group">Age Group</label><br>
        <input type="number" name="age_group" id="age_group" value="<?= $person["age_group"] ?>"> <br>
        <input type="hidden" name="id" id="id" value="<?= $person["id"] ?>"> <br>
        <button type="submit">Update</button>
    </form>+
    <a href="./">Back to Person List</a>
</body>
</html>