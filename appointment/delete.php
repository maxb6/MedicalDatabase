<?php require_once '../database.php';

$statement = $conn->prepare("DELETE FROM comp353.appointment WHERE appointment.id = :id; ");
$statement->bindParam(":id", $_GET["id"]);
$statement->execute();
header("Location: .");

?>