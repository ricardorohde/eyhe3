<?php
    include ('painel/engine/conecta.php');
    $anjos_do_chat = array();
    $meuid = $_SESSION['id'];
    #antes de tudo, vou armazenar num vetor todos os anjos que faz parte do meu chat!
    $consulta = $conexao->query("SELECT idanjo FROM conversas WHERE idheroi = $meuid");
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
      array_push($anjos_do_chat, $linha['idanjo']);
    }
    //print_r($anjos_do_chat);
    $consulta = $conexao->query("SELECT * FROM anjos WHERE status = 1 AND online = 1 ORDER BY nome ASC");
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
?>
    <li>
        <img src="painel/<?php echo $linha['avatar']; ?>" alt="man_1" class="foto_anjo" />
        <h3 class="titulo" style="padding-left: 0;"><?php echo $linha['nome']; ?></h3>
        <p class="ultimo_texto"><?php echo substr($linha['biografia'],0,400); ?>...</p>
        <h4>Desafios</h4>
        <p> <?php echo $linha['desafio1']; ?>  <?php echo $linha['desafio2']; ?>  <?php echo $linha['desafio3']; ?></p>
        <h4 style="margin-top: 20px;">Interesses</h4>
        <p> <?php echo $linha['interesse1']; ?>   <?php echo $linha['interesse2']; ?>  <?php echo $linha['interesse3']; ?></p>

        <div>
            <?php
              $meuid = $_SESSION['id'];
              $idanjo = $linha['id'];
              //função que verifica se anjo já pertence aos anjos do meu chat
              if (in_array($linha['id'], $anjos_do_chat)){
                //se ele pertence, vou pegar sessao e tabela do registro
                $consulta = $conexao->query("SELECT session, tabela FROM conversas WHERE idheroi = $meuid AND idanjo = $idanjo LIMIT 1");
                while ($linha3 = $consulta->fetch(PDO::FETCH_ASSOC)) {
                  $sessao  = $linha3['session'];
                  $tabela = $linha3['tabela'];
                }
                echo "<a class='uk-button uk-button-default botao_roxo' href='chat.php?myid=$meuid&idanjo=$idanjo&room=$sessao&where=$tabela'>Retomar Conversa</a>";
              }else{
                echo "<a class='uk-button uk-button-default botao_roxo' href='painel/engine/gera_novo_chat.php?heroi=$meuid&anjo=$idanjo'>Clique aqui para conversar</a>";
              }

            ?>
            <a class="uk-button uk-button-default botao" href="perfil_anjo.php?q=<?php echo $linha['id'] ?>">Ver perfil completo</a>
        </div>
    </li>
<?php } ?>
