<?php
$conn = new mysqli("localhost", "root", "", "SuporteTecnico");

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

$sql = "SELECT Chamados.ID, Clientes.Nome AS Cliente, Chamados.Descricao, Chamados.Criticidade, Chamados.Status, Chamados.DataAbertura, Colaboradores.Nome AS Colaborador
        FROM Chamados
        LEFT JOIN Clientes ON Chamados.ClienteID = Clientes.ID
        LEFT JOIN Colaboradores ON Chamados.ColaboradorID = Colaboradores.ID";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>Cliente</th><th>Descrição</th><th>Criticidade</th><th>Status</th><th>Data de Abertura</th><th>Colaborador</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['ID']}</td>
                <td>{$row['Cliente']}</td>
                <td>{$row['Descricao']}</td>
                <td>{$row['Criticidade']}</td>
                <td>{$row['Status']}</td>
                <td>{$row['DataAbertura']}</td>
                <td>{$row['Colaborador']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "Nenhum chamado encontrado.";
}

$conn->close();
?>
