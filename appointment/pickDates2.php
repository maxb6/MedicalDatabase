<?php require_once '../database.php';

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
    <h1>Show Earliest Appointment </h1>
    <form action="./showEarliest.php?facility=<?php echo $facility ?>& date=<?php echo $date ?>" method="get">
        <label for="facility">Enter Appointment Facility</label><br>
        <input type="text" name="facility" id="facility"> <br>
        <label for="date">Enter Appointment Date</label><br>
        <input type="date" name="date" id="date"> <br>
        <button type="submit">Search</button>
    </form>

</tbody>  
        
    <a href="./">Back to Appointments</a>
</body>
</html>
