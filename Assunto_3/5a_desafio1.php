<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Verificador de Maioridade</title>
</head>
<body>
    <h2>Verificador de Maioridade</h2>

    <!--
        Formulário enviado pelo método POST para a própria página.
        O atributo required torna obrigatório o preenchimento dos campos.
    -->
    <form method="post" action="">
        <label for="nome">Nome:</label><br>
        <input type="text" name="nome" id="nome" required><br><br>

        <label for="ano_nascimento">Ano de Nascimento:</label><br>
        <input type="number" name="ano_nascimento" id="ano_nascimento" min="1900" max="2100" required><br><br>

        <button type="submit">Verificar</button>
    </form>

    <?php
    // Verifica se a página foi acessada por meio do envio do formulário.
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Recebe os valores informados nos campos do formulário.
        $nome = $_POST['nome'];
        $ano_nascimento = $_POST['ano_nascimento'];

        // Obtém o ano atual e calcula a idade aproximada do usuário.
        $ano_atual = date('Y');
        $idade = $ano_atual - $ano_nascimento;

        // Permite o acesso apenas para usuários com 18 anos ou mais.
        if ($idade >= 18) {
            echo "<p>Acesso permitido, $nome!</p>";

            // Abre (ou cria) o arquivo de log no modo de acréscimo.
            $arquivo = fopen('log_acessos.txt', 'a');

            // Monta e grava uma linha com o nome e a idade separados por ponto e vírgula.
            $linha = $nome . ';' . $idade . "\n";
            fwrite($arquivo, $linha);

            // Fecha o arquivo depois da gravação para liberar o recurso.
            fclose($arquivo);
        } else {
            // Informa que o acesso foi negado quando o usuário é menor de idade.
            echo "<p>Acesso negado, $nome!</p>";
        }
    }
    ?>
</body>
</html>
