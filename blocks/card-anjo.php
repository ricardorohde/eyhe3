

<?php
include "painel/engine/conecta.php";

$key = $_GET['c'];
if(!empty($key)){
  $query = "SELECT count(id) as qtd  FROM anjos WHERE
  CONCAT_WS( ' ', nome, desafio1, desafio2, desafio3) LIKE '%$key%' AND status = 1";
}else{
  $query = "SELECT count(id) as qtd FROM anjos WHERE status = 1";
}


/* PAGINACAO */
$pagina = (isset($_GET['p']))? $_GET['p'] : 1;
$consulta = $conexao->query($query);
while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
  $total = $linha['qtd'];
}
$registros = 5;
$numPaginas = ceil($total/$registros);
$inicio = ($registros*$pagina)-$registros;
/* FIM DA PAGINA */


if(!empty($key)){
  $query = "SELECT * FROM anjos WHERE
  CONCAT_WS( ' ', nome, desafio1, desafio2, desafio3, interesse1, interesse2, interesse3) LIKE '%$key%' AND status = 1 ORDER BY online desc LIMIT $inicio,$registros";
}else{
  $query = "SELECT * FROM anjos WHERE status = 1  ORDER BY online desc LIMIT $inicio,$registros";
}

$consulta = $conexao->query($query);
while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
      $idanjo = $linha['id'];
      $ids = $_SESSION['id_heroi'].'-'.$idanjo;

      //nº de atendimentos
      $query = "SELECT count(id) as qtd FROM conversas WHERE idanjo = $idanjo  ";
      $consulta2 = $conexao->query($query);
      while ($linha2 = $consulta2->fetch(PDO::FETCH_ASSOC)) {
        $n_atendimentos = $linha2['qtd'];
      }

      //nº de avaliações!
      $query = "SELECT count(id) as qtd FROM avaliacoes_new WHERE idanjo = $idanjo  ";
      $consulta3 = $conexao->query($query);
      while ($linha3 = $consulta3->fetch(PDO::FETCH_ASSOC)) {
        $n_avaliacoes = $linha3['qtd'];
      }


      //classe do botao conversar muda dependendo da disponibilidade do anjo
      if($linha['online'] == 1){
        $classe = 'iniciar-atendimento';
        $classe_status = 'colorGreen';
      }
      else{
        $classe = 'anjo-indisponivel';
        $classe_status = 'colorRed';
      }

?>


            <div class="card desktop">
                <div class="c-1">
                    <a href="perfil-anjo.php?q=<?php echo $idanjo; ?>">
                        <picture class="avatar">
                            <source type="image/jpg" src="https://eyhe.com.br/painel/<?php echo $linha['avatar']; ?>" />
                            <img src="https://eyhe.com.br/painel/<?php echo $linha['avatar']; ?>"/>
                        </picture>
                    </a>
                    <div class="text">
                        <div class="line d-flex justify-content-start align-items-center">
                          <div id="<?php echo $classe_status; ?>"></div>
                          <h3><?php echo $linha['nome']; ?></h3>
                        </div>
                        <small>
                            (<?php echo $n_avaliacoes; ?> avaliações)
                            <picture>
                                <source type="image/png" src="assets/images/star.png" />
                                <img src="assets/images/star.png" />
                            </picture>
                        </small>
                        <p>Esse Anjo já ajudou <b><?php echo $n_atendimentos; ?></b> pessoas</p>
                        <a href="perfil-anjo.php?q=<?php echo $idanjo; ?>" class="btn btn-primary btn-white completo">Ver perfil completo</a>
                    </div>
                    <div class="theme">
                        <p><strong>Este Anjo conversa sobre:</strong></p>
                        <div class="theme_one d-flex">
                            <p id="greyTag" class="p1"><?php echo $linha['desafio1']; ?></p>
                            <p id="greyTag" ><?php echo $linha['desafio2']; ?></p>
                        </div>
                        <div class="theme_one d-flex">
                            <p id="greyTag" class="p1"><?php echo $linha['desafio3']; ?></p>

                        </div>
                    </div>
                </div>
                <div class="c-2">
                    <div class="talk">
                        <p>Converse por:</p>
                        <div class="foto">
                            <!--<picture>
                                <source type="image/png" src="assets/images/audio.png" />
                                <img src="assets/images/audio.png" />
                            </picture>-->
                            <picture>
                                <source type="image/png" src="assets/images/video.png" />
                                <img src="assets/images/video.png" />
                            </picture>
                            <picture>
                                <source type="image/png" src="assets/images/texto.png" />
                                <img src="assets/images/texto.png" />
                            </picture>
                        </div>
                    </div>
                    <p class="c2-p2">
                        <?php echo $linha['textovitrini']; ?>
                    </p>
                    <div class="buttons">
                        <a class="btn btn-primary btn-blue <?php echo $classe; ?>" data-id="<?php echo $ids; ?>">Quero conversar agora!</a>
                        <a class="btn btn-primary agend" href="agendar-hora.php?idanjo=<?php echo $idanjo; ?>">Quero agendar um horário</a>
                    </div>
                    <div class="value">
                        <p style="font-size: 17px;"><strong>R$24,90</strong> / 40 minutos + </p>
                        <p  class="strong"><strong><u>10 minutos grátis no ínicio da conversa</u></strong></p>
                    </div>
                </div>
            </div>


            <div class="card desktop mobile">
                <div class="c-1">
                    <a href="perfil-anjo.php?q=<?php echo $idanjo; ?>">
                        <picture class="avatar">
                            <source type="image/jpg" src="https://eyhe.com.br/painel/<?php echo $linha['avatar']; ?>" />
                            <img src="https://eyhe.com.br/painel/<?php echo $linha['avatar']; ?>"/>
                        </picture>
                    </a>
                    <div class="text">
                        <div class="title d-flex align-items-center">
                            <div id="<?php echo $classe_status; ?>"></div>
                            <h3><?php echo $linha['nome']; ?></h3>
                        </div>
                        <p class="c2-p2">
                            <?php echo $linha['textovitrini']; ?>
                        </p>
                        <div class="buttons">
                            <a class="btn btn-blue <?php echo $classe; ?>" data-id="<?php echo $ids ?>">Quero conversar agora!</a>
                            <a class="btn btn-primary" href="agendar-hora.php?idanjo=<?php echo $idanjo; ?>">Quero agendar um horário</a>
                        </div>
                        <div class="value">
                            <p><strong>R$24,90</strong> / 40 minutos</p>
                            <p  class="strong"><strong>10 primeiros minutos são grátis</strong></p>
                        </div>
                        <div class="theme">
                            <p><strong>Este Anjo conversa sobre:</strong></p>
                            <div class="theme_one d-flex">
                                <p id="greyTag" class="p1"><?php echo $linha['desafio1']; ?></p>
                                <p id="greyTag" ><?php echo $linha['desafio2']; ?></p>
                            </div>
                            <div class="theme_one d-flex">
                                <p id="greyTag" class="p1 t2"><?php echo $linha['desafio3']; ?></p>
                            </div>
                        </div>
                        <p>Esse Anjo já ajudou <strong><?php echo $n_atendimentos; ?> pessoas</strong></p>
                        <p class="ava"><?php echo $n_avaliacoes; ?> Avaliações</p>
                        <picture class="star d-flex justify-content-center">
                            <source type="image/png" src="assets/images/star.png" />
                            <img src="assets/images/star.png" />
                        </picture>
                        <hr>
                        <a href="perfil-anjo.php?q=<?php echo $idanjo; ?>" class="btn btn-primary btn-white">Ver perfil completo -></a>
                    </div>
                </div>
            </div>
<?php } ?>

<br/>

<nav aria-label="Page navigation example">
     <ul class="pagination justify-content-center">
         <li class="page-item <?php if($pagina == 1) echo "disabled";?> ">
             <a class="page-link" href="nossos-anjos.php?p=<?php echo $pagina-1;?>" tabindex="-1">Anterior</a>
         </li>
         <?PHP for($i = 1; $i < $numPaginas + 1; $i++) {
             if($i == $pagina){
                  echo "<li class='page-item active'><a class='page-link active' href='nossos-anjos.php?p=$i&c=$key'>".$i."</a></li> ";
             }else{
                  echo "<li class='page-item'><a class='page-link' href='nossos-anjos.php?p=$i&c=$key'>".$i."</a></li> ";
             }
         }?>
         <li class="page-item <?php if($pagina == $numPaginas) echo "disabled";?>">
             <a class="page-link" href="nossos-anjos.php?p=<?php echo $pagina+1;?>">Próxima</a>
         </li>
     </ul>
 </nav>
