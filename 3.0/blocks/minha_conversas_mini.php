<?php
$meuid = $_SESSION['id_heroi'];
$consulta = $conexao->query("SELECT * FROM conversas WHERE (idheroi=$meuid) AND (offheroi IS NULL)  ORDER BY ultimamsg DESC LIMIT 3");
while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {

$tabela = $linha['tabela'];
$idanjo = $linha['idanjo'];
$idtalk = $linha['id'];

$consulta2 = $conexao->query("SELECT id,nome, avatar FROM anjos WHERE id=$idanjo LIMIT 1");
while ($linha2 = $consulta2->fetch(PDO::FETCH_ASSOC)) {
  $nomeanjo = $linha2['nome'];
  $idanjo = $linha2['id'];
  $avatar = $linha2['avatar'];
}

$qtd_nao_lida = 0;
//agora, vou saber aqui, quantas mensagens não lidas tem!
$consulta3 = $conexao->query(" SELECT count(id) as quantidade FROM $tabela WHERE leitura IS NULL AND SUBSTRING(remetente, 1, 1) != 'h' ");
while ($linha3 = $consulta3->fetch(PDO::FETCH_ASSOC)) {
    $qtd_nao_lida = $linha3['quantidade'];
}
?>

<div class="l1">
  <picture>
      <source type="image/png" src="https://eyhe.com.br/painel/<?php echo $avatar;?>" />
      <img src="https://eyhe.com.br/painel/<?php echo $avatar;?>" />
  </picture>
    <div class="np" style='padding: 0px 3px 0px 3px'>
      <p><?php echo $nomeanjo ?></p>
    </div>
    <div class="dropdown">
        <a class="btn btn-primary btn-white dropdown-toggle"href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Opções  <i class="bx bx-chevron-down"></i></a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" href="chat.php?myid=<?php echo $meuid;?>&idanjo=<?php echo $idanjo;?>&room=<?php echo $linha['session'];?>&where=<?php echo $linha['tabela'];?>">Acessar Chat</a>
            <a class="dropdown-item" href="#">Avaliar</a>
            <a href="#" class="dropdown-item excluir_conversa" data-id="<?php echo $idtalk; ?>">Excluir</a>
        </div>
    </div>
</div><hr>

<?php } ?>
