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
    <h1>Show Appointments within Time Interval </h1>
    <form action="./showGiven.php?date1=<?php echo $date1 ?> date2=<?php echo $date2 ?>" method="get">
        <label for="date1">Enter Starting Date</label><br>
        <input type="date" name="date1" id="date1"> <br>
        <label for="date2">Enter End Date</label><br>
        <input type="date" name="date2" id="date2"> <br>
        <button type="submit">Search</button>
    </form>

</tbody>  
        
    <a href="./">Back to Appointments</a>
</body>
</html>
