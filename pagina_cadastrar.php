<?php
include "verificar_logado.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Formulário de cadastro</h1>
    <form action="inserir.php" method="post">
        <label>Descrição: </label><br>
        <textarea name="descricao_digitada" cols="30" rows="3"></textarea><br><br>

        <label>Setor: </label><br>
        <select name="setor_escolhido">
            <option value="">Selecione</option>
            <option value="Administrativo">Administrativo</option>
            <option value="Suporte">Suporte</option>
            <option value="Atendimento">Atendimento</option>
            <option value="NAD">NAD</option>
            <option value="NEP">NEP</option>
        </select> <br><br>

        <label>Categoria: </label><br>
        <input type="text" name="categoria_digitada"> <br><br>

        <button type="submit">Salvar</button>   
    </form>
</body>
</html>