<?php

session_start();

include_once("connection.php");
include_once("url.php");

// Puxando todos os fornecedores
$query = "SELECT * FROM contact";

$stmt = $conn->prepare($query);

$stmt->execute();

$contacts = $stmt->fetchAll();

?>