<?php require_once '../database.php';
$TITLE = "Add a person";

if(isset($_POST["first_name"]) && isset($_POST["last_name"]) && isset($_POST["date_of_birth"]) 
&& isset($_POST["medicare_number"]) && isset($_POST["medicare_issue"]) && isset($_POST["medicare_expiry"])
&& isset($_POST["phone_number"]) && isset($_POST["street_address"]) && isset($_POST["city"])
&& isset($_POST["province"]) && isset($_POST["postal_code"]) && isset($_POST["citizenship"])
&& isset($_POST["email"]) && isset($_POST["age_group"])
) {
    
    $person = $conn->prepare("INSERT INTO comp353.person (first_name, last_name, date_of_birth,medicare_number,medicare_issue, medicare_expiry,
    phone_number,street_address, city, province, postal_code, citizenship, email, age_group )
    VALUES (:first_name, :last_name, :date_of_birth, :medicare_number, :medicare_issue, :medicare_expiry,
    :phone_number, :street_address, :city, :province, :postal_code, :citizenship, :email, :age_group );");
    
    $person->bindParam(':first_name', $_POST["first_name"]);
    $person->bindParam(':last_name', $_POST["last_name"]);
    $person->bindParam(':date_of_birth', $_POST["date_of_birth"]);
    $person->bindParam(':medicare_number', $_POST["medicare_number"]);
    $person->bindParam(':medicare_issue', $_POST["medicare_issue"]);
    $person->bindParam(':medicare_expiry', $_POST["medicare_expiry"]);
    $person->bindParam(':phone_number', $_POST["phone_number"]);
    $person->bindParam(':street_address', $_POST["street_address"]);
    $person->bindParam(':city', $_POST["city"]);
    $person->bindParam(':province', $_POST["province"]);
    $person->bindParam(':postal_code', $_POST["postal_code"]);
    $person->bindParam(':citizenship', $_POST["citizenship"]);
    $person->bindParam(':email', $_POST["email"]);
    $person->bindParam(':age_group', $_POST["age_group"]);

    if($person->execute())
        header("Location: .");
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a Person</title>
</head>
<body>
<h1>Add a Person</h1>
    <form action="./create.php" method="post">
        <label for="first_name">First Name</label><br>
        <input type="text" name="first_name" id="first_name"> <br>
        <label for="last_name">Last Name</label><br>
        <input type="text" name="last_name" id="last_name"> <br>
        <label for="date_of_birth">Date of Birth</label><br>
        <input type="date" name="date_of_birth" id="date_of_birth"> <br>
        <label for="medicare_number">Medicare Number</label><br>
        <input type="text" name="medicare_number" id="medicare_number"> <br>
        <label for="medicare_issue">Medicare Issue Date</label><br>
        <input type="date" name="medicare_issue" id="medicare_issue"> <br>
        <label for="medicare_expiry">Medicare Expiry Date</label><br>
        <input type="date" name="medicare_expiry" id="medicare_expiry"> <br>
        <label for="phone_number">Phone Number</label><br>
        <input type="text" name="phone_number" id="phone_number"> <br>
        <label for="street_address">Street Address</label><br>
        <input type="text" name="street_address" id="street_address"> <br>
        <label for="city">City</label><br>
        <input type="text" name="city" id="city"> <br>
        <label for="province">Province</label><br>
        <input type="text" name="province" id="province"> <br>
        <label for="postal_code">Postal Code</label><br>
        <input type="text" name="postal_code" id="postal_code"> <br>
        <label for="city">City</label><br>
        <input type="text" name="city" id="city"> <br>
        <label for="citizenship">Citizenship</label><br>
        <input type="text" name="citizenship" id="citizenship"> <br>
        <label for="email">Email</label><br>
        <input type="text" name="email" id="email"> <br>
        <label for="age_group">Age Group</label><br>
        <input type="number" name="age_group" id="age_group" min="1" max="10"> <br>

        <button type="submit">Add</button>
    </form>
    <a href="./">Back to Book List</a>
</body>
</html>