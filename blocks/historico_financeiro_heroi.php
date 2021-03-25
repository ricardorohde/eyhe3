<?php include 'painel/engine/EBANX/retorna_infos_by_hash.php'; ?>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Histórico do Financeiro</h4>
                <div class="table-responsive">
                    <table class="table table-centered table-nowrap mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th>ID</th>
                                <th>Tipo da Transação</th>
                                <th>Formato</th>
                                <th>Valor</th>
                                <th>Status</th>
                                <th>Data Transação</th>
                                <th>Data Conclusão</th>
                                <th>Opções</th>
                            </tr>
                        </thead>
                        <tbody>

                          <?php
                              include 'painel/engine/conecta.php';
                              $idheroi = $_SESSION['id_heroi'];
                              $consulta = $conexao->query("SELECT * FROM financeiroH where idheroi = $idheroi order by id desc");
                              while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {

                                $id_transacao = $linha['id'];
                                $id_heroi = $linha['idheroi'];
                                $data_confirmacao = $linha['data_c'];

                                $status = $linha['status'];
                                if($linha['status'] == 'Aguardando'){
                                  //vamos usar a api do ebanx para verificar se houve mudança de status do aguardando
                                  //caso sim, vamos fazer update e atualizar a pagina.
                                  $token = $linha['token'];
                                  //$token  = '5f6e3e693b3c3b2af520f22c5cd1b9517366978f85c4bb21';
                                  $status_new = retorna_status_by_hash($token);

                                  if($status_new != 'PE'){
                                    //se entrou aqui, mudou o status!
                                    //mas eai, é cancelado ou confirmado?
                                    if($status_new == 'CO'){
                                      $status = 'Confirmado';
                                      $data_confirmacao = retorna_data_conclusao_by_hash($token);
                                      $link = '';

                                      //atualiza saldo do heroi & atualiza a pagina
                                      $consulta2 = $conexao->query("SELECT saldo FROM tab_usuario where id = $id_heroi limit 1");
                                      while ($linha2 = $consulta2->fetch(PDO::FETCH_ASSOC)) {
                                        $saldo = $linha2['saldo'];
                                        if($saldo == ''){
                                          $saldo = 0.00;
                                        }
                                      }
                                      $saldo = $saldo + $linha['valor'];
                                      $stmt = $conexao->prepare("UPDATE tab_usuario
                                      SET saldo = :saldo WHERE (id = :id_heroi)");
                                      $stmt->bindParam(':saldo', $saldo);
                                      $stmt->bindParam(':id_heroi', $id_heroi);
                                      $executa = $stmt->execute();

                                      //atualiza Banco do financeiro
                                        $stmt = $conexao->prepare("UPDATE financeiroH
                                        SET status = :status, data_c = :data_confirmacao
                                        WHERE (id = :id_transacao) ");
                                        $stmt->bindParam(':status', $status);
                                        $stmt->bindParam(':data_confirmacao', $data_confirmacao);
                                        $stmt->bindParam(':id_transacao', $id_transacao);
                                        $executa = $stmt->execute();

                                      //recarrega a pagina
                                      echo "<meta HTTP-EQUIV='refresh' CONTENT='0'>";
                                    }

                                    if($status_new == 'CA'){
                                      $status = 'Cancelado';
                                      $link = '';

                                      //atualiza Banco do financeiro
                                        $stmt = $conexao->prepare("UPDATE financeiroH
                                        SET status = :status, data_c = :data_confirmacao
                                        WHERE (id = :id_transacao) ");
                                        $stmt->bindParam(':status', $status);
                                        $stmt->bindParam(':data_confirmacao', $data_confirmacao);
                                        $stmt->bindParam(':id_transacao', $id_transacao);
                                        $executa = $stmt->execute();
                                    }



                                  }else{
                                    $status = 'Aguardando';
                                    $link = $linha['link'];
                                    $data_confirmacao = '';
                                  }
                                }

                           ?>


                            <tr>
                                <td class="dez">
                                    <b>#00<?php echo $linha['id'];?> </b>
                                </td>
                                <td class="dez7">
                                   <?php echo $linha['tipo'];?>
                                </td>
                                <td class="dez">
                                  <?php
                                    if($linha['formato'] == 'Boleto Bancário'){
                                      echo "<i class='fas fa-barcode mr-1'></i>".$linha['formato'];
                                    }
                                    else if($linha['formato'] == 'Cartão de Crédito'){
                                      echo "<i class='fab fa-cc-mastercard mr-1'></i>".$linha['formato'];
                                    }
                                    else{
                                      echo $linha['formato'];
                                    }

                                  ?>
                                </td>
                                <td class="dez">
                                  R$ <?php echo $linha['valor'];?>
                                </td>
                                <td class="dez7">
                                    <?php
                                        if($status ==  'Aguardando'){
                                          echo "<span class='badge badge-pill badge-soft-warning font-size-12'>Aguardando</span>";
                                        }else if($status ==  'Confirmado'){
                                          echo "<span class='badge badge-pill badge-soft-success font-size-12'>Confirmado</span>";
                                        }else{
                                          echo "<span class='badge badge-pill badge-soft-danger font-size-12'>Cancelado</span>";
                                        }
                                     ?>
                                </td>
                                <td class="dez7">
                                    <?php echo $linha['data_t'];?>
                                </td>
                                <td>
                                  <?php
                                        if($data_confirmacao == '') echo "-";
                                        else echo $data_confirmacao;
                                  ?>
                                </td>

                                <td>
                                    <?php

                                      if($linha['formato'] == 'Boleto Bancário' && $status ==  'Aguardando'){
                                        echo "<a  target='_blank' href=".$link.">Acessar boleto</a>";
                                      }

                                     ?>
                                </td>
                            </tr>

                          <?php } ?>


                        </tbody>
                    </table>
                </div>
                <!-- end table-responsive -->
            </div>
        </div>
    </div>
</div>
