<?php require_once '../database.php';

$statement = $conn->prepare("DELETE FROM comp353.assignment WHERE assignment.id = :id; ");
$statement->bindParam(":id", $_GET["id"]);
$statement->execute();
header("Location: .");

?>