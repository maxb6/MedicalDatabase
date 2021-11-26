<?php require_once '../database.php';

$statement = $conn->prepare("DELETE FROM comp353.infection_variant WHERE infection_variant.id = :id; ");
$statement->bindParam(":id", $_GET["id"]);
$statement->execute();
header("Location: .");

?>