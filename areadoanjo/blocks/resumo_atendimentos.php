<?php
$meuid = $_SESSION['id_anjo'];
$consulta = $conexao->query("SELECT count(id) as qtd FROM conversas WHERE (idanjo=$meuid)");
while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
  $atendimentos = $linha['qtd'];
}

$consulta = $conexao->query("SELECT count(id) as qtd FROM pagamentos WHERE (idanjo=$meuid) and (status = 'Pagamento confirmado')");
while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
  $pagamentos = $linha['qtd'];
}

$consulta = $conexao->query("SELECT count(id) as qtd FROM conversas WHERE (idanjo=$meuid) and (status = 'Perdida')");
while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
  $perdidas = $linha['qtd'];
}

$consulta = $conexao->query("SELECT count(id) as qtd FROM avaliacoes_new WHERE (idanjo=$meuid)");
while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
  $avaliacoes = $linha['qtd'];
}


?>
<div class="card resumo">
    <div class="card-body">
        <p class="h5">Resumo de atendimentos</p>
        <div class="row">
            <div class="col-lg-12">
                <div class="l1 d-flex blue">
                    <div class="divOne"><i class="far fa-comments"></i><p>Atendimentos:</p></div>
                    <div class="divTwo"><p><strong><?php echo $atendimentos; ?></strong></p></div>
                </div>
                <div class="l1 d-flex green">
                    <div class="divOne"><i class="fas fa-dollar-sign"></i><p>Pagamentos:</p></div>
                    <div class="divTwo"><p><strong><?php echo $pagamentos; ?></strong></p></div>
                </div>
                <div class="l1 d-flex red">
                    <div class="divOne"><i class="fas fa-times"></i><p>Perdidas:</p></div>
                    <div class="divTwo"><p><strong><?php echo $perdidas; ?></strong></p></div>
                </div>
                <div class="l1 d-flex purple">
                    <div class="divOne"><i class="far fa-star"></i><p>Avaliações:</p></div>
                    <div class="divTwo"><p><strong><?php echo $avaliacoes; ?></strong></p></div>
                </div>
            </div>
        </div>
    </div>
</div>
