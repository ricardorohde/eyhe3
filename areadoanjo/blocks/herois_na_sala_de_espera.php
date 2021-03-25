<div class="card d-flex title hero">
    <p class="h5">Heróis na sala de espera</p>

<?php
$cont = 0;
$meuid = $_SESSION['id_anjo'];
$consulta = $conexao->query("SELECT * FROM conversas WHERE (  (idanjo=$meuid) AND (status = 'Em espera') )  ORDER BY datainicio DESC");
while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {

  $tabela = $linha['tabela'];
  $idheroi = $linha['idheroi'];
  $idtalk = $linha['id'];


  $consulta2 = $conexao->query("SELECT id,nome, avatar FROM tab_usuario WHERE id=$idheroi LIMIT 1");
  while ($linha2 = $consulta2->fetch(PDO::FETCH_ASSOC)) {
    $nomeheroi = $linha2['nome'];
    $idheroi = $linha2['id'];
    $avatar = $linha2['avatar'];
  }

  $cont++;

?>


    <div class="control2">
        <div class="control d-flex">
            <picture>
              <source type="image/png" src="https://eyhe.com.br/painel/<?php echo $avatar;?>" />
              <img src="https://eyhe.com.br/painel/<?php echo $avatar;?>" />
            </picture>
            <div class="texto">
                <p class="t1"><strong><?php echo $nomeheroi; ?></strong></p>
                <p class="t2">Atenda agora!</p>
            </div>
        </div>
        <div class="c-btn d-flex">
            <a href="#" class="btn btn-success atender-sala-de-espera" data-id="<?php echo $idtalk; ?>"data-toggle="modal" data-target="#atender">Atender</a>
        </div>
    </div>

<?php  } ?>

<?php

  if($cont == 0){
    echo "<br/><center>Nenhum herói na sala de espera. Fique atendo a seu Whatsapp :)</center><br/>";
  }
?>


</div>
