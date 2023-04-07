<?php

session_start();

include_once("connection.php");
include_once("url.php");

$id;

if (!empty($_GET)) {
    $id = $_GET['id'];
}

if (!empty($_GET)) {
    // Puxando os dados de UM fornecedor
    $query = "SELECT * FROM contact WHERE id = :id";
    
    $stmt = $conn->prepare($query);

    $stmt->bindParam(":id", $id);

    $stmt->execute();

    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    
} else {
    // Puxando todos os fornecedores
    $contacts = [];

    $query = "SELECT * FROM contact";

    $stmt = $conn->prepare($query);

    $stmt->execute();

    $contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);

}

?>