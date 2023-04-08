<?php

session_start();

include_once("connection.php");
include_once("url.php");

$data = $_POST;

if (!empty($data)) {
//MODIFICAÇÃO DE DADOS

    if ($data['type'] === "create") {
        $name = $_POST["name"];
        $phone = $_POST["phone"];
        $observations = $_POST["observations"];

        $query = "INSERT INTO contact (name, phone, observations) VALUES (:name, :phone, :observations)";

        $stmt = $conn->prepare($query);

        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":phone", $phone);
        $stmt->bindParam(":observations", $observations);

        try {
            $stmt->execute();
            $_SESSION["msg"] = "Contato criado com sucesso!";
        } catch(PDOException $e) {
            // Erro na Execução
            $error = $e->getMessage();
            echo "Erro: " . $error;
        }
    } else if ($data['type'] === "edit") {
        $id = $_POST["id"];
        $name = $_POST["name"];
        $phone = $_POST["phone"];
        $observations = $_POST["observations"];

        $query = "UPDATE contact SET 
        name = :name,
        phone = :phone,
        observations = :observations 
        WHERE id = :id";

        $stmt = $conn->prepare($query);

        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":phone", $phone);
        $stmt->bindParam(":observations", $observations);
        $stmt->bindParam(":id", $id);

        try {
            $stmt->execute();
            $_SESSION["msg"] = "Contato atualizado com sucesso!";
        } catch(PDOException $e) {
            // Erro na Execução
            $error = $e->getMessage();
            echo "Erro: " . $error;
        }
    } else if ($data['type'] === "delete") {
        $id = $_POST["id"];

        $query = "DELETE FROM contact WHERE id = :id";

        $stmt = $conn->prepare($query);

        $stmt->bindParam(":id", $id);

        try {
            $stmt->execute();
            $_SESSION["msg"] = "Contato deletado com sucesso!";
        } catch(PDOException $e) {
            // Erro na Execução
            $error = $e->getMessage();
            echo "Erro: " . $error;
        }
    }

    // Redirect HOME
    header("Location:" . $BASE_URL . "../index.php");
   
} else {
    // SELEÇÃO DE DADOS 
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
}

// Fechar Conexão
$conn = null;
?>