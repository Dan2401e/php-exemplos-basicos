<?php
session_start();

if (
    !isset($_SESSION['usuario'], $_SESSION['cor_fundo'])
    || !is_string($_SESSION['usuario'])
    || !is_string($_SESSION['cor_fundo'])
    || !preg_match('/\A#[0-9A-Fa-f]{6}\z/', $_SESSION['cor_fundo'])
) {
    header('Location: 15d_login.php');
    exit();
}

$usuario = htmlspecialchars($_SESSION['usuario'], ENT_QUOTES, 'UTF-8');
$cor_fundo = htmlspecialchars($_SESSION['cor_fundo'], ENT_QUOTES, 'UTF-8');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
</head>
<body style="background-color: <?php echo $cor_fundo; ?>;">
    <h1>Bem-vindo, <?php echo $usuario; ?>!</h1>
    <a href="15d_logout.php">Sair do sistema</a>
</body>
</html>
