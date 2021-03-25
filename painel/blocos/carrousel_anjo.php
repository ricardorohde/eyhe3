
<?php

include ('painel/engine/conecta.php');

//antes de tudo, vou verificar quem são os anjos que eu já converso!
$anjos_do_chat = array();
$meuid = $_SESSION['id'];
#antes de tudo, vou armazenar num vetor todos os anjos que faz parte do meu chat!
$consulta = $conexao->query("SELECT idanjo FROM conversas WHERE idheroi = $meuid ");
while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
  array_push($anjos_do_chat, $linha['idanjo']);
}

$query = "SELECT * FROM anjos WHERE status = 1 ORDER BY rand();";

?>

<div class="uk-section uk-animation-fade uk-text-center" style="padding: 0 3% 3% 3%;">
    <div id="dicas_de_anjo">
      <div uk-slider>
          <div class="uk-position-relative">
              <div class="uk-slider-container resultado_anjos">
                  <ul class="uk-slider-items uk-child-width-1-2@m uk-child-width-1-3@l uk-child-width-1-1@s ">
                      <?php
                        $consulta = $conexao->query($query);
                        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                      ?>
                      <li>
                          <div class="uk-panel painel_anjo">
                              <a href="perfil_anjo.php?q=<?php echo $linha['id'] ?>">
                                <img src="painel/<?php echo $linha['avatar']; ?>" alt="">
                                <h3  class="nome_anjo_slider"><?php echo $linha['nome']; ?></h3>
                              </a>
                              <br/>
                              <p class="ultimo_texto texto_perfil_anjo"><?php echo  substr($linha['biografia'],0,250); ?>...</p>
                              <br/>


                              <h5>Desafios</h5>
                              <p class="legendas">
                                  <?php echo "<a href='pesquisar_anjo.php?key=".$linha['desafio1']."'>".$linha['desafio1']."</a><br/>"?>
                                  <?php echo "<a href='pesquisar_anjo.php?key=".$linha['desafio2']."'>".$linha['desafio2']."</a><br/>"?>
                                  <?php echo "<a href='pesquisar_anjo.php?key=".$linha['desafio3']."'>".$linha['desafio3']."</a><br/>"?>
                              </p>
                              <h5>Interesses</h5>
                              <p class="legendas">
                                  <?php echo "<a href='pesquisar_anjo.php?key=".$linha['interesse1']."'>".$linha['interesse1']."</a><br/>"?>
                                  <?php echo "<a href='pesquisar_anjo.php?key=".$linha['interesse2']."'>".$linha['interesse2']."</a><br/>"?>
                                  <?php echo "<a href='pesquisar_anjo.php?key=".$linha['interesse3']."'>".$linha['interesse3']."</a><br/>"?>
                              </p>
                              <br/>
                              <?php
                                $meuid = $_SESSION['id'];
                                $idanjo = $linha['id'];
                                //função que verifica se anjo já pertence aos anjos do meu chat
                                if (in_array($linha['id'], $anjos_do_chat)){
                                  //se ele pertence, vou pegar sessao e tabela do registro
                                  $consulta2 = $conexao->query("SELECT session, tabela FROM conversas WHERE idheroi = $meuid AND idanjo = $idanjo LIMIT 1");
                                  while ($linha3 = $consulta2->fetch(PDO::FETCH_ASSOC)) {
                                    $sessao  = $linha3['session'];
                                    $tabela = $linha3['tabela'];
                                  }
                                  echo "<a class='uk-button uk-button-default botao_roxo' href='chat.php?myid=$meuid&idanjo=$idanjo&room=$sessao&where=$tabela'>Retomar</a><br/>";
                                }else{
                                  echo "<a class='uk-button uk-button-default botao_roxo' href='painel/engine/gera_novo_chat.php?heroi=$meuid&anjo=$idanjo'>Conversar</a><br/>";
                                }
                              ?>
                              <a class="uk-button uk-button-default botao" href="perfil_anjo.php?q=<?php echo $linha['id'] ?>"  style="margin-bottom: 15px;">Ver Perfil</a>
                          </div>
                      </li>
                      <?php } ?>
                  </ul>
              </div>

              <div>
                  <a class="uk-position-center-left uk-slidenav-large" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
                  <a class="uk-position-center-right uk-slidenav-large" href="#" uk-slidenav-next uk-slider-item="next"></a>
              </div>
          </div>
          <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>
      </div>
    </div>
</div>
