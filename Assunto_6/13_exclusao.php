<!-- Passar id via URL -->
<!-- http://localhost/php-basicos/13_exclusao.php?id=5-->


<?php
// Credenciais para acesso
$servername = "localhost";
$username = "root";
$password = "Senai@118";
$dbname = "exercicio";

// Acessando de fato (BD exercicio)
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificando conexão
if ($conn->connect_error) {
    die("Falha na conexão: " .$conn->connect_error);
}

//Verifica se um ID foi passado via URL para exclusão
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    // Sql de exclusão
    $sql = "DELETE FROM clientes WHERE id='$id'";

    // Mensagem (Feedback para o usuário)
    if($conn->query($sql) === TRUE) {
        echo "<p>Cliente excluído com sucesso!!</p>";
    } else {
        echo "<p>Erro ao excluir cliente: " .$conn->error . "</p>";
    }
}

// Fechando conexão
$conn->close();

?>