
<div uk-grid class="uk-child-width-1-3">
<?php
    include ('painel/engine/conecta.php');
    $consulta = $conexao->query("SELECT * FROM blog WHERE rascunho = 'nao' ORDER BY data_liberacao desc LIMIT 3 ");
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
?>

<!-- repeat-->
<a href="blog_i.php?r=<?php echo $linha['url'];?>&q=<?php echo $linha['id'];?>" class="cada_artigo">

    <div class="texto_artigo">
        <span style="color:#a239ff; font-size: 14px; padding-bottom: 4px;">
          <b> Por <?php echo $linha['autor'];  ?> | <?php echo date('d/m/Y', strtotime($linha['data_criacao'])); ?>
          | <u> <?php echo $linha['categoria']; ?> </u> </b>
        </span>
        <div class="titulo_artigo"><?php echo $linha['titulo']; ?></div> <br/>
        <div class="resumo_artigo line-clamp"><?php echo strip_tags($linha['conteudo']); ?></div>
    </div>
</a>
<!--- rereat -->

<?php } ?>

    </div>
