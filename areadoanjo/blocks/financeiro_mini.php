<?php
//calcula Saldo
    include 'enginePHP/conecta.php';
    $idanjo = $_SESSION['id_anjo'];
    $consulta = $conexao->query("SELECT saldo FROM anjos where id = $idanjo limit 1");
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
      $saldo = $linha['saldo'];
      if($saldo == ''){
        $saldo = 0.00;
      }
      $saldo = $saldo * 0.7;
    }
?>

<div class="card financeiro">
    <div class="card-body">
        <p class="h5">Financeiro</p>
        <div class="row justify-content-center flex-column align-items-center">
            <p class="h3">R$<?php echo $saldo; ?></p>
            <p>Acesse seu <a href="">Saldo,</a> seu <a href="">Histórico de Pagamentos</a> e <a href="">solicite seu dinheiro</a> de forma simples e rápida.</p>
        </div>
        <div class="divbtn d-flex justify-content-center">
            <a class="btn btn-blue" href="financeiro-anjo.php"><p>Ver tudo</p> <i class="mdi mdi-arrow-right ml-1"></i></a>
        </div>
    </div>
</div>
