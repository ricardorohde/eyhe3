<?php
  $meuid = $_SESSION['id'];
  include ('painel/engine/conecta.php');
  $consulta = $conexao->query("SELECT * FROM conversas WHERE idheroi=$meuid ORDER BY ultimamsg DESC");

  while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
    $idanjo = $linha['idanjo'];
    $consulta2 = $conexao->query("SELECT id,nome, avatar FROM anjos WHERE id=$idanjo LIMIT 1");
    while ($linha2 = $consulta2->fetch(PDO::FETCH_ASSOC)) {
      $nomeanjo = $linha2['nome'];
      $idanjo = $linha2['id'];
      $avatar = $linha2['avatar'];
    }
?>

<div class="uk-child-width-1-2@m uk-child-width-1-1@s" style="margin-bottom: 15px;">
  <h4 class="corpo" style="float: left;"><b><?php echo $nomeanjo; ?></b> <br/> <i><?php echo date('d/m/Y H:i:s', strtotime($linha['ultimamsg'])); ?></i></h4>
  <div class="uk-child-width-1-2 uk-text-center" uk-grid>
<div>
  <div>
    <a class="uk-button uk-button-default botao_roxo" href="chat.php?myid=<?php echo $meuid;?>&idanjo=<?php echo $idanjo;?>&room=<?php echo $linha['session'];?>&where=<?php echo $linha['tabela'];?>">Retomar</a>
  </div>
</div>
  <div></div>
</div>
</div>

<?php } ?>
