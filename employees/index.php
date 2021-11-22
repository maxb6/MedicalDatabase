<?php require_once '../database.php';

$statement = $conn->prepare('SELECT * FROM rnc353_2.EmployeeInformation AS employees');
$statement->execute();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>List of employees</h1>
    <table>
        <thead>
            <tr>
                <td>Employee Id </td>
                <td>Current facilities </td>
                <td>Work start date </td>
                <td>Work end date</td>
                <td>Worker type</td>
                <td>Vaccination status </td>
            </tr>
        </thead>
        <tbody>
        </tbody>  
        
    </table>

    <a href="./book/">Employees Section</a>
</body>
</html>
