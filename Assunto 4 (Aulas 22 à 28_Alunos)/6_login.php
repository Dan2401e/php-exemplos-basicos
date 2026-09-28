<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login de Usuário</title>
</head>
<body>
    <form method="post" action="">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required><br>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" required><br>

        <button type="submit">Entrar</button>
    </form>

    <?php
    // Verifica se o formulário foi enviado
    if (($_SERVER['REQUEST_METHOD'] ?? '') == 'POST') {
        // Recebe os valores enviados pelo formulário
        $nome = $_POST['nome'] ?? '';
        $senha = $_POST['senha'] ?? '';

        // Abre o arquivo usuarios.txt para leitura
        $arquivo = @fopen(__DIR__ . '/../Assunto_3/usuarios.txt', 'r');
        $login_sucesso = false;

        if ($arquivo === false) {
            echo "<p style='color: red;'>Não foi possível ler o arquivo de usuários.</p>";
        } else {
            // Lê cada linha do arquivo
            while (($linha = fgets($arquivo)) !== false) {
                // Ignora linhas que não contêm usuário e senha
                if (!str_contains($linha, ':')) {
                    continue;
                }
                list($usuario_arquivo, $senha_arquivo) = explode(':', trim($linha), 2);

                // Verifica se o nome e a senha correspondem aos valores no arquivo
                if ($nome === $usuario_arquivo && $senha === $senha_arquivo) {
                    $login_sucesso = true;
                    break;
                }
            }

            // Fecha o arquivo
            fclose($arquivo);

            // Exibe a mensagem de sucesso ou erro
            if ($login_sucesso) {
                $nome_seguro = htmlspecialchars($nome, ENT_QUOTES, 'UTF-8');
                echo "<p>Login realizado com sucesso! Bem-vindo, $nome_seguro!</p>";
            } else {
                echo "<p style='color: red;'>Usuário ou senha incorretos.</p>";
            }
        }
    }
    ?>
</body>
</html>
