<?php
  $meuid = $_SESSION['id'];
  $eu =  'h_'.$meuid;
  include ('painel/engine/conecta.php');
  $consulta = $conexao->query("SELECT * FROM conversas WHERE (idheroi=$meuid) AND (offheroi IS NULL)  ORDER BY ultimamsg DESC");
  while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
    $tabela = $linha['tabela'];
    $idanjo = $linha['idanjo'];
    $idtalk = $linha['id'];

    $consulta2 = $conexao->query("SELECT id,nome, avatar FROM anjos WHERE id=$idanjo LIMIT 1");
    while ($linha2 = $consulta2->fetch(PDO::FETCH_ASSOC)) {
      $nomeanjo = $linha2['nome'];
      $idanjo = $linha2['id'];
      $avatar = $linha2['avatar'];
    }

    $qtd_nao_lida = 0;
    //agora, vou saber aqui, quantas mensagens não lidas tem!
    $consulta3 = $conexao->query(" SELECT count(id) as quantidade FROM $tabela WHERE leitura IS NULL AND SUBSTRING(remetente, 1, 1) != 'h' ");
    while ($linha3 = $consulta3->fetch(PDO::FETCH_ASSOC)) {
        $qtd_nao_lida = $linha3['quantidade'];
    }

?>

<div class="uk-child-width-1-1@l uk-child-width-1-1 engloba_retomar_conversa">
  <div style="float: left;" class="uk-flex uk-flex-middle">
    <div class="engloba_imagem_notificacao">
      <?php
        if($qtd_nao_lida != 0)
          echo"<span class='uk-badge uk-badge-danger'>$qtd_nao_lida</span>";
      ?>
      <img src="painel/<?php echo $avatar; ?>" alt="woman" class="foto_conversa_notificacao"/>
		</div>
		<div class="infoAnjo">
			<h6><?php echo $nomeanjo; ?></h6>
			<p class="legendas"><?php echo date('d/m/Y H:i:s', strtotime($linha['ultimamsg'])); ?></p>
		</div>
  </div>
  <div class="uk-width-1-1 uk-width-1-2@s uk-width-1-1@m uk-child-width-1-3  uk-child-width-1-6@m espaco_mobile uk-margin-large-top " uk-grid>
      <div>
            <div>
              <a class="uk-button uk-button-default botao_roxo" href="chat.php?myid=<?php echo $meuid;?>&idanjo=<?php echo $idanjo;?>&room=<?php echo $linha['session'];?>&where=<?php echo $linha['tabela'];?>">Retomar</a>
            </div>
     </div>
     <div><a class="uk-button uk-button-default botao_avaliar espaco avaliar" data-id="<?php echo $idtalk; ?>" uk-icon="icon: star" uk-tooltip="Avaliar" uk-toggle="target: #modal_avaliacao"></a></div>
     <div><a class="uk-button uk-button-default botao_avaliar  excluir" data-id="<?php echo $idtalk; ?>" uk-icon="icon: trash" uk-tooltip="Excluir" ></a></div>
  </div>
</div> <!--FECHA O PRIMEIRO DIV -->
<br/>
<?php } ?>

<!-- MODAL DE AVALIAÇÃO DO ANJO -->

        <div id="modal_avaliacao" uk-modal>
		    <div class="uk-modal-dialog uk-modal-body">
		        <h4 class="uk-modal-title titulo_modal_avaliacao">Sua opinião é muito importante para nós. Obrigado!</h4>
		        <p class="pergunta_modal_avaliacao">Como você se sentiu durante essa conversa?</p>
		        <div class="emoticons_modal">
					<form class="avaliacao">

                <input type="hidden" name="idconversa" class="idconversa" value=""/>
                <input type="hidden" name="idheroi" class="idheroi" value=""/>

			        	<div>
			        		<label class="clicou">
							  <input type="radio" name="radio_emocoes" value="triste">
							  <img src="img/SVG/emoji_triste.svg">
							  <p class="legendas"> Triste </p>
							</label>

			        	</div>
			        	<div>
			        		<label class="clicou">
							  <input type="radio" required name="radio_emocoes" value="indiferente">
							  <img src="img/SVG/emoji_indiferente.svg">
							  <p class="legendas"> Indiferente </p>
							</label>

			        	</div>
			        	<div>
			        		<label class="clicou">
							  <input type="radio" name="radio_emocoes" value="relaxado">
							  <img src="img/SVG/emoji_relaxado.svg">
							  <p class="legendas"> Relaxado </p>
							</label>

			        	</div>
			        	<div>
			        		<label class="clicou">
							  <input type="radio" name="radio_emocoes" value="feliz">
							  <img src="img/SVG/emoji_feliz.svg">
							  <p class="legendas"> Feliz </p>
							</label>

			        	</div>
			        	<div>
			        		<label class="clicou">
							  <input type="radio" name="radio_emocoes" value="inspirado">
							  <img src="img/SVG/emoji_inspirado.svg">
							  <p class="legendas"> Inspirado </p>
							</label>

			        	</div>
		        </div>
		        <p class="pergunta_modal_avaliacao">Como foi o tempo de resposta do seu Anjo?</p>
		        <div class="estrelas_modal">

			        	<div>
			        		<label class="clicou_e">
								<input type="radio" name="radio_estrelas" value="ausente">
			        			<a uk-icon="icon:star"></a>
			        			<p class="legendas"> Ausente </p>
			        		</label>
			        	</div>
			        	<div>
			        		<label class="clicou_e">
								<input type="radio" name="radio_estrelas" value="lento">
			        			<a uk-icon="icon:star"></a>
			        			<p class="legendas"> Lento </p>
			        		</label>
			        	</div>
			        	<div>
			        		<label class="clicou_e">
								<input type="radio" name="radio_estrelas" value="regular">
			        			<a uk-icon="icon:star"></a>
			        			<p class="legendas"> Regular </p>
			        		</label>
			        	</div>
			        	<div>
			        		<label class="clicou_e">
								<input type="radio" name="radio_estrelas" value="bom">
			        			<a uk-icon="icon:star"></a>
			        			<p class="legendas"> Bom </p>
			        		</label>
			        	</div>
			        	<div>
			        		<label class="clicou_e">
								<input type="radio" name="radio_estrelas" value="atencioso">
			        			<a uk-icon="icon:star"></a>
			        			<p class="legendas"> Atencioso </p>
			        		</label>
			        	</div>
		        </div>
		        <p class="pergunta_modal_avaliacao">Gostaria de deixar alguma sugestão?</p>
		        <div class="textarea_modal">
		        		<textarea name="observacoes"></textarea>
		        </div>
		        <p class="uk-text-right">
		            <button class="uk-button botao_confirmar" type="submit">Confirmar</button>
		            <button class="uk-button uk-modal-close botao" type="button" style="padding: 0 30px;">Cancelar</button>
		        </p>
          </form>
		    </div>
		</div>
