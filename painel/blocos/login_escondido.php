<div id="login-escondido" uk-offcanvas>
    <div class="uk-offcanvas-bar uk-text-middle uk-text-center">
        <button class="uk-offcanvas-close" type="button" uk-close></button>
        <div><img src="img/logotipo_branca.png" alt="logotipo"/></div>
        <br/>
        <br/>
        <div class="meu-formulario">
            <form id="login-form" action="" method="post">
                <legend class="uk-legend subtitulo">Entre em sua conta :)</legend>
                <div class="uk-margin uk-text-left">
                    <input class="uk-input" type="email" required placeholder="E-mail" name="email">
                </div>
                <div class="uk-margin uk-text-left">
                    <input class="uk-input" type="password" required placeholder="Senha" name="senha">
                </div>
                <div class="uk-margin uk-text-left">
                    <label><a href="https://www.eyhe.com.br/recuperar-senha">Esqueci minha senha</a></label>
                </div>
                <div class="uk-margin">
                    <button type="submit" class="uk-button uk-button-default botao_branco" type="button">Entrar</button>
                </div>
            </form>
        </div>
        <h4>Primeira vez por aqui?</h4>
        <a onclick="showApresentacao();" class="chamadas">Se preferir, clique aqui para iniciar uma conta exclusiva Eyhe.</a>
    </div>
</div>

<script type="text/javascript">

            function showApresentacao() {
                window.location.href = "cad.php";
            }
</script>
