<?
      $tabela = $_POST["tabela"];
      include ("conecta.php");
      $consulta = $conexao->prepare("SELECT id FROM $tabela");
      $consulta->execute();
      echo $consulta->rowCount();
?>
