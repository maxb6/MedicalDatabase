<?php require_once '../database.php';

$statement = $conn->prepare("DELETE FROM comp353.infection_history WHERE infection_history.id = :id; ");
$statement->bindParam(":id", $_GET["id"]);
$statement->execute();
header("Location: .");

?>