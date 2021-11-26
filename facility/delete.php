<?php require_once '../database.php';

$statement = $conn->prepare("DELETE FROM comp353.facility WHERE facility.id = :id; ");
$statement->bindParam(":id", $_GET["id"]);
$statement->execute();
header("Location: .");

?>