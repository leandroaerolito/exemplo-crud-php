<?php
require_once "../src/funcoes-produtos.php";
require_once "../src/funcoes-utilitarias.php";

$listaDeProdutos = lerProdutos($conexao);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Visualização</title>

    <style>
        * { box-sizing: border-box; }

        .produtos {
            font-family: 'Segoe UI';
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            width: 80%;
            margin: auto;
        }

        .produto {
            background-color: #FFF5EE;
            padding: 1rem;
            width: 49%;
            box-shadow: rgba(0,0,0,0.3) 0 0 3px 1px;
        }
    </style>

</head>
<body>
    <h1>Produtos | SELECT - <a href="../index.php">Home</a> </h1>

    <hr>
    <h2>Lendo e carregando todos os produtos.</h2>

    <p><a href="inserir.php">
        Inserir novo produto</a></p>

    <div class="produtos">

    <?php foreach( $listaDeProdutos as $produto ){ ?>
        <article class="produto">
            <h3> <?=$produto["produto"]?> </h3>
            <h4> <?=$produto["fabricante"]?> </h4>
            <p><b>Preço:</b> <?=formatarPreco($produto["preco"])?> </p>
            <p><b>Quantidade:</b> <?=$produto["quantidade"]?> </p>
            
            <!-- Soluções possíveis para o Exercício/Desafio 2 -->
            
            <p><b>Total:</b> 
            <!-- 1) Fazer a conta diretamente e passar o resultado
            pra formatação do preço -->
            <?= formatarPreco($produto["preco"] * $produto["quantidade"]) ?> </p>

            <!-- 2) Fazer a conta direto na query SQL e pegar
            o resultado (coluna total) - além de passar pra formatação -->
            <p><b>Total:</b> <?=formatarPreco($produto["total"])?>  </p>
            
            <!-- 3) Fazer uma função de cálculo e pegar o 
            resultado dela já calculado e formatado -->
            <p><b>Total:</b> 
            <?=calcularTotal($produto["preco"], $produto["quantidade"])?></p>
        </article>
    <?php } ?>

    </div>

</body>
</html>