<?php


    //Conectando ao banco de dados
    include "conecta.php";
    include ("log/log.php");

    $tabela = $_POST['nome_tabela'];
    $meuID = $_POST['meuID'];


    //vamos atualizar as leituras!
    /* se eu estou carregando o historico, eu estou visualizando as mensagens! Então
    vamos atualizar todos os campos leitura em que o remetente != $meuid com a data de agora! */

    date_default_timezone_set('America/Sao_Paulo');
    $dataleitura = date('Y-m-d H:i');


    try{

      $stmt = $conexao->prepare("UPDATE $tabela
      SET leitura = :dataleitura
      WHERE (remetente != :meuid AND leitura IS NULL ) ");
      $stmt->bindParam(':dataleitura', $dataleitura);
      $stmt->bindParam(':meuid', $meuID);
      $executa = $stmt->execute();

    }
    catch(PDOException $e){
      GeraLog::getInstance()->inserirLog("Erro: Código: " . $e->getCode() . " Mensagem: " . $e->getMessage());
      echo $e->getMessage();
    }

    //fim da confiramação de leitura!!

    $consulta = $conexao->query("SELECT * FROM $tabela ORDER BY datahora ASC");
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
      $vetor[] = array_map('htmlentities', $linha);
    }

    //Passando vetor em forma de json
    echo json_encode($vetor);

?>
