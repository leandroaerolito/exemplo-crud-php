<?php
/* Importando o script de conexão
require_once garante que a importação
é feita somente uma vez. */
require_once "conecta.php";

// Usada em fabricantes/visualizar.php
function lerFabricantes( PDO $conexao ){
    $sql = "SELECT * FROM fabricantes ORDER BY nome_do_fabricante";
    
    try {
        /* Método prepare():
        Faz uma preparação/pré-config do comando SQL e guarda em memória (variável consulta). */
        $consulta = $conexao->prepare($sql);
    
        /* Método execute():  
        Executa o comando SQL no banco de dados */
        $consulta->execute();
    
    
        /* Método fetchALL():
          Busca todos os dados da conslta como um array associativo. */
        $resultado = $consulta-> fetchAll(PDO::FETCH_ASSOC);
       
    } catch (Exception $erro) {
        die("Erro: ".$erro->getMessage());
    }
    return $resultado;
}

// Teste
$dados = lerFabricantes($conexao);
var_dump($dados);