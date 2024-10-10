<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
  <h1>Gerenciar itens cadastrados</h1>
  <?php
    include "conexao.php";
    // 1º Passo - Comando SQL
    $sql = "SELECT * FROM tb_inventarios";

    // 2º Passo - Preparar a conexão
    $consultar = $pdo->prepare($sql);

    // 3º Passo - Tentar executar e mostrar na página
    try{
        $consultar->execute();
        $resultados = $consultar->fetchAll(PDO::FETCH_ASSOC);
        foreach($resultados as $item){
            $codigo = $item['codigo'];
            $descricao = $item['descricao'];
            $setor = $item['setor'];
            $categoria = $item['categoria'];

            echo "
                <div class='cartoes'>
                    <h1> Nº $codigo </h1> <br>
                    <p> $descricao </p>
                    <p> Setor: $setor </p>
                    <p> Categoria: $categoria </p>  
                </div>
            ";
        }
    }catch(PDOException $erro){
        echo "Falha ao consultar!".$erro->getMessage();
    }



  ?>    

</body>
</html>