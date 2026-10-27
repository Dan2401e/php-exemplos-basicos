<?php
session_start();

$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'] ?? '';
    $senha = $_POST['senha'] ?? '';
    $cor_fundo = $_POST['cor_fundo'] ?? '';

    if (
        !is_string($usuario)
        || !is_string($senha)
        || !is_string($cor_fundo)
        || !preg_match('/\A#[0-9A-Fa-f]{6}\z/', $cor_fundo)
    ) {
        $erro = 'Preencha os campos corretamente.';
    } else {
        $servername = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'exercicio';

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die('Falha na conexão: ' . $conn->connect_error);
        }

        $stmt = $conn->prepare(
            'SELECT usuario FROM usuarios WHERE usuario = ? AND senha = ? LIMIT 1'
        );

        if (!$stmt) {
            die('Erro ao preparar a consulta: ' . $conn->error);
        }

        $stmt->bind_param('ss', $usuario, $senha);

        if (!$stmt->execute()) {
            die('Erro ao consultar o usuário: ' . $stmt->error);
        }

        $stmt->bind_result($usuario_encontrado);

        if ($stmt->fetch()) {
            session_regenerate_id(true);
            $_SESSION['usuario'] = $usuario_encontrado;
            $_SESSION['cor_fundo'] = $cor_fundo;

            $stmt->close();
            $conn->close();

            header('Location: 15d_perfil.php');
            exit();
        }

        $erro = 'Usuário ou senha incorretos.';
        $stmt->close();
        $conn->close();
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>

    <?php if ($erro !== ''): ?>
        <p style="color: red;"><?php echo htmlspecialchars($erro, ENT_QUOTES, 'UTF-8'); ?></p>
    <?php endif; ?>

    <form method="post" action="">
        <label for="usuario">Usuário:</label>
        <input type="text" id="usuario" name="usuario" required><br>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required><br>

        <label for="cor_fundo">Cor de Fundo:</label>
        <input type="color" id="cor_fundo" name="cor_fundo" value="#ffffff" required><br>

        <button type="submit">Entrar</button>
    </form>
</body>
</html>
