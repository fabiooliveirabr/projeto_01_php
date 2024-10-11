<?php
include "verificar_logado.php";
include "conexao.php";
$codigo = $_GET['cod'];

// 1º Passo - Comando SQL
$sql = "SELECT * FROM tb_inventarios
        WHERE codigo='$codigo'";

// 2º Passo - Preparar a conexão
$consultar = $pdo->prepare($sql);

// 3º Passo - Tentar executar
try{
    $consultar->execute();
    $resultado = $consultar->fetch(PDO::FETCH_ASSOC);
    $desc = $resultado['descricao'];
    $setor = $resultado['setor'];
    $cat = $resultado['categoria'];
}catch(PDOException $erro){
    echo "Falha ao consultar!" . $erro->getMessage();
}
?>

<h1>Editar item</h1>
    <form action="atualizar.php" method="post">
        <input type="text" name="codigo" value='<?php echo $codigo;?>' hidden><br>
        <label>Descrição: </label><br>
        <textarea name="descricao_digitada"
        cols="30" rows="3"><?php echo $desc;?></textarea><br><br>

        <label>Setor: </label><br>
        <select name="setor_escolhido">
            <option value="">Selecione</option>
            <option value="Administrativo" <?php echo $setor=="Administrativo"? "selected":""; ?> >Administrativo</option>
            <option value="Suporte" <?php echo $setor=="Suporte"? "selected":"";?> >Suporte</option>
            <option value="Atendimento" <?php echo $setor=="Atendimento"? "selected":"";?>>Atendimento</option>
            <option value="NAD" <?php echo $setor=="NAD"? "selected":"";?> >NAD</option>
            <option value="NEP" <?php echo $setor=="NEP"? "selected":"";?> >NEP</option>
        </select> <br><br>

        <label>Categoria: </label><br>
        <input type="text"
        name="categoria_digitada"
        value='<?php echo $cat;?>'> <br><br>

        <button type="submit">Salvar</button>   
    </form>
