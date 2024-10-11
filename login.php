<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="fazer_login.php" method="post">
        <h1>Entrar no sistema</h1>
        <input type="text" name='usuario_digitado' placeholder='username'><br><br>
        <input type="password" name="senha_digitada" placeholder='password'><br><br>
        <?php echo isset($_GET['erro1'])? "Usuário/Senha incorretos<br>":"";?>
        <?php echo isset($_GET['erro2'])? "Você precisar estar logado<br>":"";?>
        <?php echo isset($_GET['erro3'])? "Você desconectou!<br>":"";?>
        <br>
        <button type="submit">Entrar</button>
    </form>
</body>
</html>