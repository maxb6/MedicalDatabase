<?php require_once '../database.php';

$statement = $conn->prepare("DELETE FROM comp353.vaccine_type WHERE vaccine_type.id = :id; ");
$statement->bindParam(":id", $_GET["id"]);
$statement->execute();
header("Location: .");

?>