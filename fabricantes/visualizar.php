<?php
/* Importando as funções de manipulação de fabricantes */
require_once "../src/funcoes-fabricantes.php";

/* Guardando o retorno/resultado da função lerFabricantes */
$listaDeFabricantes = lerFabricantes($conexao);

/* Contando quantos fabricantes temos na matriz $listaDeFabricantes */
$quantidade = count($listaDeFabricantes);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fabricantes - Visualização</title>
</head>
<body>
    <h1>Fabricantes | SELECT - 
        <a href="../index.php">Home</a>
    </h1>

    <hr>
    <h2>Lendo e carregando todos os fabricantes.</h2>

     <table>
        <caption>Lista de Fabricantes</caption>   
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Operações</th>
            </tr>
        </thead>
        <tbody>
        
        <?php foreach($listaDeFabricantes as $fabricante) { ?>
            <tr>
                <td> <?=$fabricante["id"]?>  </td>
                <td> <?=$fabricante["nome_do_fabricante"]?>  </td>
                <td> 
                    <a href="">Editar</a>
                    <a href="">Excluir</a>
                </td>
            </tr>
<?php } ?>
        </tbody> 
    
    </table>


    <p><a href="inserir.php">
        Inserir novo fabricante</a></p>

    
    <!-- Feedback/Mensagem para o usuário indicando que o 
    processo deu certo. -->
    <?php if(isset($_GET["status"]) && $_GET["status"] === "sucesso"){ ?>
        <h2 style="color:blue">Fabricante atualizado com sucesso!</h2>
    <?php } ?>

    <table>
        <caption>Lista de Fabricantes: <b><?=$quantidade?></b></caption>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Operações</th>
            </tr>
        </thead>
        <tbody>

<?php foreach($listaDeFabricantes as $fabricante) { ?>
            <tr>
                <td> <?=$fabricante["id"]?>  </td>
                <td> <?=$fabricante["nome"]?> </td>
                <td>
<!-- Link DINÂMICO
A URL do href precisa de parâmetro com dados
dinâmicos (no caso, o ID de cada fabricante) -->
<a href="atualizar.php?id=<?=$fabricante["id"]?>">Editar</a>

<a class="excluir" href="excluir.php?id=<?=$fabricante["id"]?>">Excluir</a>
                </td>
            </tr>
<?php } ?>
        </tbody>
    </table>

    <script src="../js/confirma-exclusao.js"></script>

</body>
</html>