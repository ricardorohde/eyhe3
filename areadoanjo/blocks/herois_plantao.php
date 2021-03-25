<div class="card d-flex title">
    <p class="h5">Heróis do Plantão</p>

<?php
$cont = 0;
$consulta2 = $conexao->query("SELECT id,nome,avatar FROM tab_usuario WHERE (uber = 1) and (talking = 0)");
while ($linha2 = $consulta2->fetch(PDO::FETCH_ASSOC)) {
  $nomeheroi = $linha2['nome'];
  $idheroi = $linha2['id'];
  $avatar = $linha2['avatar'];

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
                <p class="t2">Acolher agora!</p>
            </div>
        </div>
        <div class="c-btn d-flex">
            <a href="#" class="btn btn-success atender-plantao" data-id="<?php echo $idheroi.'-'.$_SESSION['id_anjo']; ?>"data-toggle="modal" data-target="#atender">Acolher</a>
        </div>
    </div>

<?php  } ?>

<?php

  if($cont == 0){
    echo "<br/><center>Nenhum herói aguardando atendimento de plantão. Fique atendo a seu Whatsapp :)</center><br/>";
  }
?>


</div>
