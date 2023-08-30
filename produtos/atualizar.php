<?php
require_once "../src/funcoes-produtos.php";
require_once "../src/funcoes-fabricantes.php";
$listaDeFabricantes = lerFabricantes($conexao);

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

$produto = lerUmProduto($conexao, $id);
?>

<pre>
    <?=var_dump($produto)
     ?>
</pre>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Atualização</title>
</head>
<body>
    <h1>Produtos | SELECT/UPDATE</h1>
    <hr>

    <form action="" method="post">
        <p>
            <label for="nome">Nome:</label>
            <input value="<?=$produto['nome']?>" required type="text" name="nome" id="nome" required>
        </p>
        <p>
            <label for="preco">Preço:</label>
            <input value="<?=$produto['preco']?>" type="number" min="10" max="10000" step="0.01"
             name="preco" id="preco" required>
        </p>
        <p>
            <label for="quantidade">Quantidade:</label>
            <input value="<?=$produto['quantidade']?>" type="number" min="1" max="100"
             name="quantidade" id="quantidade" required>
        </p>
        <p>
            <label for="fabricante">Fabricante:</label>
            <select name="fabricante" id="fabricante" required>
                <option value=""></option>
                
                <?php foreach( $listaDeFabricantes as $fabricante) { 
                    /* Lógica/Algoritmo da seleção do fabricante
                        Se a chave estrangeira for idêntica à chave primária, ou seja, se o id do fabricante do produto 
                        (coluna 'fabricante_id' da tabela 'produtos')  for igual ao 'id do fabricante' (coluna id da tabela fabricantes),
                        então coloque o atrivuto "selected" no <option> */
                ?>
                
                    <option 
                    <?php 
                    // Chave estrangeira === chave primária
                    if($produto['fabricante_id'] === $fabricante["id"]) echo " selected ";
                     ?>
                    value="<?=$fabricante['id']?>">
                      <?=$fabricante['nome']?>
                    </option>
                <?php }
                 ?>


            </select>
        </p>
        <p>
            <label for="descricao">Descrição:</label> <br>
            <textarea name="descricao" id="descricao" cols="30" rows="3"><?=$produto['descricao']?></textarea>
        </p>
        <button type="submit" name="atualizar">Atualizar produto</button>
    </form>

    <hr>
    <p><a href="visualizar.php">Voltar</a></p>
    
</body>
</html>