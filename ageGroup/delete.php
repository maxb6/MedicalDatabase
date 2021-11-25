<?php require_once '../database.php';

$statement = $conn->prepare("DELETE FROM comp353.age_group WHERE age_group.id = :id; ");
$statement->bindParam(":id", $_GET["id"]);
$statement->execute();
header("Location: .");

?>