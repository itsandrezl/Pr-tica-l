<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Email inválido!";
    } else {
        $conn = new mysqli("localhost", "root", "", "SuporteTecnico");

        if ($conn->connect_error) {
            die("Erro na conexão: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("INSERT INTO Clientes (Nome, Email, Telefone) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nome, $email, $telefone);

        if ($stmt->execute()) {
            echo "Cliente cadastrado com sucesso!";
        } else {
            echo "Erro ao cadastrar cliente!";
        }

        $stmt->close();
        $conn->close();
    }
}
?>
