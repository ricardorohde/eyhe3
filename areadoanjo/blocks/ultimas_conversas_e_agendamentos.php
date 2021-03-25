<div class="row justify-content-between">
    <div class="card lastTalk">
        <div class="card-body">
            <p class="h5">Últimas Conversas</p>
            <div class="row">
                <div class="col-lg-12">
                    <?php
                    $meuid = $_SESSION['id_anjo'];
                    $consulta = $conexao->query("SELECT * FROM conversas WHERE (idanjo=$meuid) AND (offanjo IS NULL) AND (status = 'Em andamento')  ORDER BY ultimamsg DESC LIMIT 2");
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

                    $qtd_nao_lida = 0;
                    //agora, vou saber aqui, quantas mensagens não lidas tem!
                    $consulta3 = $conexao->query(" SELECT count(id) as quantidade FROM $tabela WHERE leitura IS NULL AND SUBSTRING(remetente, 1, 1) != 'a' ");
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
                          <p><?php echo $nomeheroi; ?></p>
                        </div>
                        <div class="dropdown">
                            <a class="btn btn-primary btn-white dropdown-toggle"href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Opções  <i class="bx bx-chevron-down"></i></a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="chat.php?myid=<?php echo $meuid;?>&idother=<?php echo $idheroi;?>&room=<?php echo $linha['session'];?>&where=<?php echo $linha['tabela'];?>">Acessar Chat</a>
                                <a href="#" class="dropdown-item excluir_conversa" data-id="<?php echo $idtalk; ?>">Excluir</a>
                            </div>
                        </div>
                    </div>

                    <?php } ?>
                    <hr/>
                    <a class="btn btn-primary btn-blue" href="conversas-anjo.php"> Ver minhas conversas <i class="mdi mdi-arrow-right ml-1"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="card agendamento">
        <div class="card-body">
            <p class="h5">Agendamentos</p>
            <div class="row">
                <div class="col-lg-12">

                    <?php
                    $meuid = $_SESSION['id_anjo'];
                    $consulta = $conexao->query("SELECT * FROM agendamentos WHERE (idanjo=$meuid) ORDER BY id DESC LIMIT 2");
                    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {

                      $idheroi = $linha['idheroi'];

                      $consulta2 = $conexao->query("SELECT id,nome, avatar FROM tab_usuario WHERE id=$idheroi LIMIT 1");
                      while ($linha2 = $consulta2->fetch(PDO::FETCH_ASSOC)) {
                        $nomeheroi = $linha2['nome'];
                        $idheroi = $linha2['id'];
                        $avatar = $linha2['avatar'];
                      }



                    ?>

                    <div class="l1">
                        <picture>
                            <source type="image/png" src="../painel/<?php echo $avatar;?>" />
                            <img src="../painel/<?php echo $avatar;?>" />
                        </picture>
                        <div class="np">
                            <p><?php echo $nomeheroi;?></p>
                            <p><?php echo date('d/m/Y ', strtotime($linha['dataagendamento']));?></p>
                        </div>
                        <!--<div class="dropdown">
                            <a class="btn btn-primary btn-white dropdown-toggle"href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Detalhes  <i class="bx bx-chevron-down"></i></a>
                            <div class="dropdown-menu" id="editar2" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="#"><i class="fas fa-pencil-alt"></i>Editar</a>
                                <a class="dropdown-item" href="#"><i class="far fa-calendar-alt"></i>Alterar Data</a>
                            </div>
                        </div>-->
                    </div>
                    <hr>

                  <?php }?>


                    <div class="divbtn d-flex justify-content-center">
                        <a class="btn btn-primary btn-blue" href="agendamento-anjo.php"> Ver agendamentos <i class="mdi mdi-arrow-right ml-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
