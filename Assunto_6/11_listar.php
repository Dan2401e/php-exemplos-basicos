<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "Senai@118";
$dbname = "exercicio";

// Conecta ao banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica se a conexão foi bem-sucedida
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Consulta para listar os clientes da tabela "clientes" (READ)
$sql = "SELECT id, nome, email FROM clientes";
$result = $conn->query($sql);

// Exibir os resultados (Cadastros armazenados no banco de dados)
if ($result->num_rows > 0) {
    echo "<table border='1'>";
    // Titulos das colunas da tabela
    echo "<tr><th>ID</th><th>Nome</th><th>Email</th></tr>";
    // Linhas da tabela usando: fetch_assoc() - Método nativo do PHP que retorna em linha os registros "Arry associativo" (Como: id, nome, email)
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["nome"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Nenhum cliente encontrado.";
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
