<?php require_once '../database.php';

$statement = $conn->prepare("DELETE FROM comp353.province WHERE province.id = :id; ");
$statement->bindParam(":id", $_GET["id"]);
$statement->execute();
header("Location: .");

?>