<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Cadastro - Status Codex</title>
</head>
<body>

	<h1>Cadastro de Aluno (com Status Codex)</h1>

	<form method="post" action="">
		<label for="nome">Nome:</label>
		<input type="text" name="nome" required><br><br>

		<label for="idade">Idade:</label>
		<input type="text" name="idade" required><br><br>

		<button type="submit">Enviar</button>
	</form>

	<hr>

<?php
    // Verifica se o formulário foi enviado (POST) ou se é só uma visita normal (GET)
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Pega os valores digitados pelo aluno no formulário
        $nome = $_POST['nome'];
        $idade = $_POST['idade'];

        // Status 400: o aluno esqueceu de preencher algum campo
        if ($nome == '' || $idade == '') {
            http_response_code(400);
            echo "<h2>Status 400 - Faltou nome ou idade</h2>";

        // Status 400: idade foi preenchida, mas não é um número
        } elseif (!is_numeric($idade)) {
            http_response_code(400);
            echo "<h2>Status 400 - Idade precisa ser número</h2>";

        // Status 201: nome e idade preenchidos corretamente, cadastro "criado"
        } else {
            http_response_code(201);
            echo "<h2>Status 201 - Criado - $nome, $idade anos</h2>";
        }

    } else {
        // Status 200: aluno só entrou na página, ainda não enviou nada
        http_response_code(200);
        echo "<p>Preencha o formulário acima e envie.</p>";
    }
    ?>

</body>
</html>