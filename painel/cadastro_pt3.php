<?php
$nome = $_GET['nome'];
$grupo = $_GET['grupo'];

if($grupo == 1){
  $frase = "Relacionamento é um exercício constante de adaptação e muita paciência.";
}
else if($grupo == 2){
  $frase = "Sempre haverá um caminho para encontrarmos as respostas que buscamos.";
}
else if($grupo == 3){
  $frase = "Estabilidade financeira não é uma tarefa fácil, mas, podemos superar esse desafio!";
}
else if($grupo == 4){
  $frase = "Muito bem, chegou a hora de cuidar um pouco mais de você mesmo.";
}else{
  $frase = "Ok! Aproveite este ótimo momento em sua vida para conhecer o nosso projeto.";
}

?>

<html>
    <head>
        <title>EYHE</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/uikit.min.css" />
        <link rel="shortcut icon" href="favicon/pp_EYHE_favicon_180px.png" />

        <link rel="stylesheet" href="css/style_teste.css" />
        <link rel="stylesheet" href="painel/vendor/sweetalert/dist/sweetalert.css">
        <script src="js/uikit.min.js"></script>
        <script src="js/uikit-icons.min.js"></script>
    </head>
    <body>

      <style>
        .texto-modal{
          height: 300px;
          max-height: 300px;
          overflow: auto;
        }
      </style>

      <!-- MENU -->

      <?php include ('repeat/menu.php'); ?>

        <!-- CONTEUDO -->
        <div class="uk-section@m uk-section-default uk-animation-fade" style="display: block;" id="pergunta_idade">
            <div class="uk-container uk-container-small uk-text-middle uk-text-center cad3">
                <!--<h1><?php echo $frase; ?></h1> FRASE DINÂMICA--> 
                <h1>Muito bem, chegou
a hora de cuidar um pouco mais de você mesmo.</h1>
                <h2 style="color: #808080;" class="uk-margin-small-bottom">Preencha os campos
abaixo para concluir
o seu cadastro:</h2>
                <br/>
                <form class="resposta_pergunta" id="form-cadastro" method="post">
                    <div class="bloco uk-flex uk-flex-center uk-flex-none@m">
                        <div class="labels_form uk-margin-medium-bottom" >
                        <div uk-grid class="uk-child-width-1-2@m">
                        <input class="uk-input" type="hidden" required name="nome_completo" value="<?php echo $nome; ?>" >
                        <input class="uk-input" type="hidden" required name="grupo" value="<?php echo $grupo ?>" >
                        <div>
                            <label class=" uk-flex uk-flex-center uk-flex-left@m">E-mail:</label>
                            <input class="uk-input" type="email" required name="email">
                        </div>
                      
                        <div>
                            <label class=" uk-flex uk-flex-center uk-flex-left@m">Data de nascimento:</label>
                            <div class="labels_cadastroNasc uk-flex uk-flex-center">
                                <div uk-grid class="uk-child-width-expand uk-flex uk-flex-center">
                                    <div>
                                        <select name="dia" uk-form-custom="target: true">
                                            <option value="01">01</option>
                                            <option value="02">02</option>
                                            <option value="03">03</option>
                                            <option value="04">04</option>
                                            <option value="05">05</option>
                                            <option value="06">06</option>
                                            <option value="07">07</option>
                                            <option value="08">08</option>
                                            <option value="09">09</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                            <option value="21">21</option>
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                            <option value="24">24</option>
                                            <option value="25">25</option>
                                            <option value="26">26</option>
                                            <option value="27">27</option>
                                            <option value="28">28</option>
                                            <option value="29">29</option>
                                            <option value="30">30</option>
                                            <option value="30">31</option>
                                        </select>
                                     
                                    </div>
                                    <div>
                                        <select name="mes" uk-form-custom="target: true">
                                            <option value="01">Janeiro</option>
                                            <option value="02">Fevereiro</option>
                                            <option value="03">Março</option>
                                            <option value="04">Abril</option>
                                            <option value="05">Maio</option>
                                            <option value="06">Junho</option>
                                            <option value="07">Julho</option>
                                            <option value="08">Agosto</option>
                                            <option value="09">Setembro</option>
                                            <option value="10">Outubro</option>
                                            <option value="11">Novembro</option>
                                            <option value="12">Dezembro</option>
                                        </select>
                                   
                                    </div>
                                    <div>
                                        <select name="ano" uk-form-custom="target: true">
                                            <option value="2018">2018</option>
                                            <option value="2017">2017</option>
                                            <option value="2016">2016</option>
                                            <option value="2015">2015</option>
                                            <option value="2014">2014</option>
                                            <option value="2013">2013</option>
                                            <option value="2012">2012</option>
                                            <option value="2011">2011</option>
                                            <option value="2010">2010</option>
                                            <option value="2009">2009</option>
                                            <option value="2008">2008</option>
                                            <option value="2007">2007</option>
                                            <option value="2006">2006</option>
                                            <option value="2005">2005</option>
                                            <option value="2004">2004</option>
                                            <option value="2003">2003</option>
                                            <option value="2002">2002</option>
                                            <option value="2001">2001</option>
                                            <option value="2000">2000</option>
                                            <option value="1999">1999</option>
                                            <option value="1998">1998</option>
                                            <option value="1997">1997</option>
                                            <option value="1996">1996</option>
                                            <option value="1995">1995</option>
                                            <option value="1994">1994</option>
                                            <option value="1993">1993</option>
                                            <option value="1992">1992</option>
                                            <option value="1991">1991</option>
                                            <option value="1990">1990</option>
                                            <option value="1989">1989</option>
                                            <option value="1988">1988</option>
                                            <option value="1987">1987</option>
                                            <option value="1986">1986</option>
                                            <option value="1985">1985</option>
                                            <option value="1984">1984</option>
                                            <option value="1983">1983</option>
                                            <option value="1982">1982</option>
                                            <option value="1981">1981</option>
                                            <option value="1980">1980</option>
                                            <option value="1979">1979</option>
                                            <option value="1978">1978</option>
                                            <option value="1977">1977</option>
                                            <option value="1976">1976</option>
                                            <option value="1975">1975</option>
                                            <option value="1974">1974</option>
                                            <option value="1973">1973</option>
                                            <option value="1972">1972</option>
                                            <option value="1971">1971</option>
                                            <option value="1970">1970</option>
                                            <option value="1969">1969</option>
                                            <option value="1968">1968</option>
                                            <option value="1967">1967</option>
                                            <option value="1966">1966</option>
                                            <option value="1965">1965</option>
                                            <option value="1964">1964</option>
                                            <option value="1963">1963</option>
                                            <option value="1962">1962</option>
                                            <option value="1961">1961</option>
                                            <option value="1960">1960</option>
                                            <option value="1959">1959</option>
                                            <option value="1958">1958</option>
                                            <option value="1957">1957</option>
                                            <option value="1956">1956</option>
                                            <option value="1955">1955</option>
                                            <option value="1954">1954</option>
                                            <option value="1953">1953</option>
                                            <option value="1952">1952</option>
                                            <option value="1951">1951</option>
                                            <option value="1950">1950</option>
                                            <option value="1949">1949</option>
                                            <option value="1948">1948</option>
                                            <option value="1947">1947</option>
                                            <option value="1946">1946</option>
                                            <option value="1945">1945</option>
                                            <option value="1944">1944</option>
                                            <option value="1943">1943</option>
                                            <option value="1942">1942</option>
                                            <option value="1941">1941</option>
                                            <option value="1940">1940</option>
                                            <option value="1939">1939</option>
                                            <option value="1938">1938</option>
                                            <option value="1937">1937</option>
                                            <option value="1936">1936</option>
                                            <option value="1935">1935</option>
                                            <option value="1934">1934</option>
                                            <option value="1933">1933</option>
                                            <option value="1932">1932</option>
                                            <option value="1931">1931</option>
                                            <option value="1930">1930</option>
                                            <option value="1929">1929</option>
                                            <option value="1928">1928</option>
                                            <option value="1927">1927</option>
                                            <option value="1926">1926</option>
                                            <option value="1925">1925</option>
                                            <option value="1924">1924</option>
                                            <option value="1923">1923</option>
                                            <option value="1922">1922</option>
                                            <option value="1921">1921</option>
                                            <option value="1920">1920</option>
                                            <option value="1919">1919</option>
                                            <option value="1918">1918</option>
                                            <option value="1917">1917</option>
                                            <option value="1916">1916</option>
                                            <option value="1915">1915</option>
                                            <option value="1914">1914</option>
                                            <option value="1913">1913</option>
                                            <option value="1912">1912</option>
                                            <option value="1911">1911</option>
                                            <option value="1910">1910</option>
                                            <option value="1909">1909</option>
                                            <option value="1908">1908</option>
                                            <option value="1907">1907</option>
                                            <option value="1906">1906</option>
                                            <option value="1905">1905</option>
                                        </select>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div> 
                                <label class=" uk-flex uk-flex-center uk-flex-left@m">Crie uma senha:</label>
                                <input class="uk-input" type="password" required name="senha" id="senha">
                            </div>
                            <div>
                                <label class=" uk-flex uk-flex-center uk-flex-left@m">Confirme a sua senha:</label>
                                <input class="uk-input" type="password" required name="senha_repeat"  id="senha_repeat">
                            </div>

                            <div class="uk-margin-small-bottom@m uk-margin-small-top@m uk-hidden@m uk-text-center">
                                <input required type="checkbox" ><span class="legendas">Li e concordo com os <a href="termos.php" target="_blank">Termos de uso</a> e <a href="privacidade.php" target="_blank">Políticas de Privacidade</a> Eyhe.</span>
                            </div>
                        </div>
                    </div>
                  </div>
                            <div class="uk-margin-small-bottom@m uk-margin-small-top@m uk-visible@m">
                                <input required type="checkbox" ><span class="legendas">Li e concordo com os <a href="termos.php" target="_blank">Termos de uso</a> e <a href="privacidade.php" target="_blank">Políticas de Privacidade</a> Eyhe.</span>
                            </div>
                    <br/>
                    <div class="uk-margin-medium-top uk-margin-medium-bottom">
                        <div class="uk-visible@m">

                            
                            <a class="uk-button uk-button-default botao margemResp" href="index.php">Voltar</a>
                            <button type="submit" class="uk-button uk-button-default botao_roxo">Finalizar cadastro</button>
                
                            
                        </div>
                        <div class="uk-hidden@m">

                            
                            
                            <button type="submit" class="uk-button uk-button-default botao_roxo ">Finalizar cadastro</button><br>
                            <a class="uk-button uk-button-default botao margemResp " style="margin-top: 20px;" href="index.php">Voltar</a> 
                            
                        </div>
                        <div class="frase_canto">
                            <p class="legendas">"Um dia você aprende que falar pode aliviar dores emocionais" William Shakespeare.</p>
                        
                        </div>
                  </div>
                </form>
            </div>
        </div>


<!--

        <div class="uk-section uk-section-default">
            <div class="uk-container uk-position-center uk-text-middle uk-text-center">

                <h3 class="titulo">Lugar de inspiração, conexão e evolução pessoal.</h3>
                <h4 class="pergunta">Vamos conversar?</h4>
                <br/>
                <div>
                    <a class="uk-button uk-button-default botao" href="">Sim</a>
                    <a class="uk-button uk-button-default botao" href="">Saber Mais</a>
                </div>

            </div>
        </div> -->

        <!-- TELA LOGIN ESCONDIDA -->

        <div id="login-escondido" uk-offcanvas>
        <div class="uk-offcanvas-bar uk-text-middle uk-text-center">
            <button class="uk-offcanvas-close" type="button" uk-close></button>
            <div><img src="img/logotipo_branca.png" alt="logotipo"/></div>
            <br/>
            <br/>
            <div class="meu-formulario">
                <form id="login-form">
                    <legend class="uk-legend subtitulo">Entre em sua conta :)</legend>
                    <div class="uk-margin uk-text-left">
                        <input class="uk-input" type="email" placeholder="E-mail" name="email">
                    </div>
                    <div class="uk-margin uk-text-left">
                        <input class="uk-input" type="password" placeholder="Senha" name="senha">
                    </div>
                    <div class="uk-margin uk-text-left">
                        <label><a href="">Esqueci minha senha</a></label>
                    </div>
                    <div class="uk-margin">
                        <button type="submit" class="uk-button uk-button-default botao_branco">Entrar</button>
                    </div>
                </form>
            </div>
            <h4>Primeira vez por aqui?</h4>
            <a href="" class="chamadas">Se preferir, clique aqui para iniciar uma conta exclusiva Eyhe.</a>
        </div>
    </div>

    <!-- This is the modal -->
    <div id="termos" uk-modal>
        <div class="uk-modal-dialog uk-modal-body">
            <h2 class="uk-modal-title">Termos e Condições de Uso</h2>
            <div class="texto-modal">

                <p style="font-size: 13px;"> Olá! Somos pessoas de verdade, de diferentes profissões e lugares. Estamos aqui pela inspiração e evolução pessoal.Juntos podemos construir um caminho de superação e aprendizado! Conversar, de forma leve e livre de
    julgamentos, nos traz novas perspectivas sobre a vida. Mantenha contato com alguém que superou um desafio parecido com o seu, pode ser revigorante e inspirador.
    Convidamos você (USUÁRIO) a ler atentamente as Condições de Utilização e Termos de Uso para participarem da plataforma EYHE. Ao tornar-se usuário da plataforma EYHE, você compromete-se a respeitar as Condições de Utilização
    e Termos de Uso. O objetivo deste Termos e Condições de Uso é definir as condições sob as quais os Usuários podem acessar e usar os Serviços.</p>

                <p style="font-size: 13px;">
                  Listamos o glossário com alguns termos visando facilitar o entendimento do usuário. <br/>
    • Anjo: usuário com histórias e experiências de superação que podem inspirar o seu dia e transformar a
    sua vida.
    • Anti-spam: sistema que bloqueia correspondências não desejadas;
    • Centro de Valorização da Vida (CVV) - é uma associação civil sem fins lucrativos que trabalha com
    prevenção ao suicídio.
    • Cookies: pequenos arquivos de texto que são enviados ou acessados a partir do seu navegador web ou da
    memória do seu dispositivo;
    • Eyhe: empresa responsável pelos serviços da plataforma;
    • Herói: usuário que busca a plataforma em busca de um caminho de superação e aprendizado;
    • Plataforma: é o ambiente online que os Usuários terão acesso e qualquer outro website ou aplicativos
    mantidos ou administrados pela EYHE, que oferece serviços equivalentes;
    • Senha: sequência de letras e números escolhida pelo USUÁRIO, composta de no mínimo 6 (seis)
    caracteres, a qual deverá ser previamente informada pelo USUÁRIO quando do acesso ao SITE. Cabe
    ressaltar que a Eyhe não terá acesso a esta senha, portanto se o USUÁRIO quiser recuperar seu acesso, a
    Eyhe encaminhará um email para o email cadastrado na plataforma Eyhe para, a partir deste, gerar uma
    nova SENHA. Sendo assim, com este procedimento, a SENHA poderá ser alterada a qualquer momento
    pelo USUÁRIO;
    • Link: terminologia para endereço de internet;
    • Upload: é o simples ato de transferir dados de um computador local para um servidor.
    • Usuário: qualquer pessoa que utiliza e deu o seu aceite nos termos de uso e política de privacidade.

    1. ACEITAÇÃO DOS TERMOS E CONDIÇÕES DE USO
Como condição para usar nossa plataforma, VOCÊ ACEITA E CONSENTE com os Termos e Condições de
Uso e Política de Privacidade e Proteção de Dados, através do clique no botão “LI E ACEITO OS TERMOS
DE USO” da página de cadastro complementar a esta. Ainda, você declara que fez a leitura completa e atenta do
presente Termos e Condições de Uso, estando plenamente ciente, conferindo, assim, sua livre e expressa
concordância.
SE VOCÊ NÃO ACEITAR E CONSENTIR COM OS TERMOS E CONDIÇÕES DE USO DA
PLATAFORMA E POLÍTICA DE PRIVACIDADE E PROTEÇÃO DE DADOS, VOCÊ NÃO
PODERÁ USAR OS NOSSOS SERVIÇOS.
A inscrição na plataforma e a utilização dos serviços supõem a aceitação plena e completa dos termos e condições
de uso por parte do Usuário.
NÃO USE OS NOSSOS SERVIÇOS PARA NECESSIDADES EMERGENCIAIS. SE VOCÊ ESTIVER
EM UMA SITUAÇÃO DE RISCO DE VIDA OU AINDA, ESTIVER PENSANDO EM SUICÍDIO,
LIGUE PARA O CENTRO DE VALORIZAÇÃO DA VIDA- (CVV), ATRAVÉS DO NÚMERO 188 OU
PARA AUTORIDADES COMPETENTES. (Serviço de Atendimento Móvel de Urgência - SAMU
(pronto-socorro) - 192 - Corpo de Bombeiros – 193).

Página 3 de 15

2. RECURSOS DA PLATAFORMA
2.1. A PLATAFORMA EYHE APENAS FACILITA A CONEXÃO ENTRE OS USUÁRIOS (HERÓIS
E ANJOS), NÃO TENDO NENHUMA RESPONSABILIDADE COM RELAÇÃO AO CONTEÚDO
(ACONSELHAMENTO, INFORMAÇÕES FORNECIDAS OU QUAISQUER OUTRAS AÇÕES OU
OMISSÕES) REALIZADA ENTRE OS MESMOS.
2.2. O CONTEÚDO DA PLATAFORMA NÃO É E NÃO DEVE SER CONSIDERADO UM
ATENDIMENTO REALIZADO POR UM PROFISSIONAL DA SAÚDE (MÉDICO, PSICÓLOGO,
TERAPEUTA, ETC). VOCÊ DEVE SEMPRE PROCURAR UM PROFISSIONAL LEGALMENTE
CAPACITADO PARA OBTER DIAGNÓSTICO E TRATAMENTO, INCLUINDO INFORMAÇÕES
SOBRE QUAIS MEDICAMENTOS OU TRATAMENTO SERÁ APROPRIADO PARA VOCÊ.
2.3. O USUÁRIO HERÓI MANIFESTA CIÊNCIA E CONCORDÂNCIA QUE OS “USUÁRIOS
ANJOS” NÃO SÃO FUNCIONÁRIOS DA PLATAFORMA EYHE, NEM AGENTES, NEM
REPRESENTANTES.
2.4. OS USUÁRIOS ANJOS RECONHECEM QUE ESSE TERMOS DE USO, POLÍTICA DE
PRIVACIDADE E O CADASTRO NA PLATAFORMA EYHE, NÃO ESTABELECEM QUALQUER
TIPO DE VÍNCULO EMPREGATÍCIO, SOCIETÁRIO, COOPERATIVO OU ASSOCIATIVO COM
A EMPRESA EYHE.
2.5. OS USUÁRIOS RECONHECEM E CONCORDAM QUE A EMPRESA EYHE NÃO PODERÁ
SER RESPONSABILIZADA, POR QUALQUER ATO, OMISSÃO OU AÇÃO DE QUALQUER
USUÁRIO (ANJO OU HERÓI).
2.6. OS USUÁRIOS RECONHECEM E ACEITAM, QUE AO REALIZAR INTERAÇÕES ENTRE
(ANJOS E HERÓIS), O FAZEM POR SUA CONTA E RISCO, RECONHECENDO A EMPRESA
EYHE COMO UMA MERA PLATAFORMA PARA AGENDAMENTO DE CONSULTAS.
2.7. NÃO HÁ QUALQUER RELAÇÃO DE VÍNCULO EMPREGATÍCIO ENTRE A PLATAFORMA
EYHE E OS USUÁRIOS (ANJOS E HERÓIS), NÃO HAVENDO, POIS, QUAISQUER
OBRIGAÇÕES DE ORDEM FISCAL, CIVIL, TRABALHISTA OU PREVIDENCIÁRIA.

Página 4 de 15

3. INSCRIÇÃO NA PLATAFORMA:
3.1. A inscrição na plataforma Eyhe é gratuita. Atualmente, os serviços prestados pela plataforma também são
gratuitos.
3.2. Reservamo-nos o direito de futuramente monetizar a utilização dos serviços fornecidos pela
plataforma Eyhe. Se decidirmos monetizar a plataforma, informaremos você e permitiremos que você
continue ou encerre sua conta.
3.3. Para se inscrever na plataforma e utilizar os serviços, O USUÁRIO DEVERÁ TER, NO MÍNIMO,
18 (DEZOITO) ANOS DE IDADE, deve ter lido e aceitado as presentes Condições de Uso e Política de
Privacidade e Proteção de Dados, e ter preenchido o conjunto dos campos obrigatórios que constam no
formulário de inscrição, ou seja, os campos relativos às informações pessoais seguintes:
1. Nome completo
2. E-mail válido
3. Telefone
4. Data de Nascimento
5. Foto para o Perfil
6. Biografia Resumida (somente o Usuário “Anjo” deverá preencher esse campo)
Importante salientar que o usuário poderá alterar, revisar, atualizar, corrigir, bloquear ou excluir os dados pessoais.
3.4. Ao finalizar o preenchimento da Conta de Usuário (campos obrigatórios), o usuário deverá criar e confirmar
uma senha de 6 a 10 caracteres com letras e números, de maneira segura, conforme recomendação no
item “8 – Segurança”.
3.5. É necessário concordar com os “Termos e Condições de Uso e Política de Privacidade e Proteção de Dados”
para continuar.
3.6. Dando continuidade, você entrara na etapa final do cadastro, com a seguinte seqüência:
1. Você receberá um e-mail para confirmar sua conta.
2. Se você já se cadastrou, mas não recebeu mensagem de confirmação, insira seu e-mail e clique em enviar.
Em algum instante você receberá uma mensagem para ativar o seu cadastro. Caso não receba a mensagem
na caixa de entrada, verifique a caixa de spam.

Página 5 de 15
3. Recebendo a mensagem, basta ativar o seu cadastro. Pronto! Seu cadastro foi realizado e validado com
sucesso. Você receberá mais um e-mail de confirmação de cadastro.
3.7. Os campos relativos às informações pessoais acima, são coletados quando inseridos voluntariamente pelo
usuário ao realizar seu cadastro ou ainda, quando realiza à atualização dos dados.
3.8. O usuário deverá forneça informações precisas e verdadeiras durante o processo de registro. AO REALIZAR
O CADASTRO, VOCÊ DECLARA E GARANTE QUE TODAS AS INFORMAÇÕES PESSOAIS
FORNECIDAS DURANTE ESSE PROCESSO SÃO VERDADEIRAS E CORRETAS.
3.9. Reservamo-nos o direito de recusar ou cancelar seu registro ou uso da plataforma, se for verificado que você
não forneceu informações completas e precisas sobre sua identidade.
3.10. O USUÁRIO PODERÁ RESPONDER CIVIL OU CRIMINALMENTE POR INFORMAÇÕES
INDEVIDAS, INCOMPLETAS, EQUIVOCAS OU FRAUDULENTAS, E AINDA, PODERÁ TER
SUA CONTA INABILITADA TEMPORARIAMENTE OU DEFINITIVAMENTE.
3.11. A EYHE NÃO SE RESPONSABILIZARÁ POR QUALQUER USUÁRIO QUE PRESTAR
INFORMAÇÕES INCOMPLETAS, INEXATAS, ERRÔNEAS OU FRAUDULENTAS.
3.12. A UTILIZAÇÃO DA PLATAFORMA ESTÁ LIMITADA A PESSOAS COM PLENA
CAPACIDADE CIVIL NO MOMENTO QUE SE CADASTRAREM. NÃO SERÁ PERMITIDA A
UTILIZAÇÃO DA PLATAFORMA POR PESSOAS QUE NÃO GOZEM DA CAPACIDADE CIVIL
PLENA, PESSOAS QUE TENHAM SIDO INABILITADAS TEMPORARIAMENTE OU
DEFINITIVAMENTE POR VIOLAÇÃO AOS TERMOS E CONDIÇÕES DE USO.
3.13. VOCÊ “USUÁRIO” DECLARA E ASSUME O COMPROMISSO DE ATUALIZAR OS DADOS
INSERIDOS EM SEU CADASTRO SEMPRE QUE FOR NECESSÁRIO, CONSENTINDO COM A
COLETA, USO, ARMAZENAMENTO E TRATAMENTO DOS DADOS PESSOAIS PARA OS FINS
PREVISTOS NAS CONDIÇÕES.
3.14. Se você ficou com dúvida sobre o motivo na coleta dos seus dados e processamento dos mesmos, basta
acessar nossa POLÍTICA DE PRIVACIDADE E PROTEÇÃO DE DADOS, onde estará mais detalhado.
3.15. RESERVAMO-NOS NO DIREITO DE UTILIZAR TODOS OS MEIOS VÁLIDOS E POSSÍVEIS
PARA IDENTIFICAR OS USUÁRIOS, PODENDO SOLICITAR DADOS ADICIONAIS E

Página 6 de 15
DOCUMENTOS QUE ESTIME SEREM IDÔNEOS A CONFERIR OS DADOS PESSOAIS
INFORMADOS, ASSIM COMO DE INABILITAR, TEMPORÁRIA OU DEFINITIVAMENTE, O
USUÁRIO QUE APRESENTAR QUALQUER INFORMAÇÃO INVERÍDICA.
4. RESPONSABILIDADE E OBRIGAÇÕES DOS USUÁRIOS
4.1. Os Usuários são responsáveis e se obrigam a:
1. Respeitar outros usuários, ser ético, agindo de acordo com as regras que orientam a sociedade, sob pena
de indenizar a quem causarem danos e ter a conta de acesso excluída.
2. Respeitar todos os direitos de propriedade intelectual de titularidade da EYHE, incluindo direitos
referentes a terceiros que porventura estejam, ou estiveram, disponíveis.
3. Salvaguardar e manter a confidencialidade de seu login e senha e concorda em não divulgar sua senha a
terceiros. O Usuário será o único responsável por quaisquer atividades ou ações tomadas em sua conta,
independentemente de ter autorizado tais atividades ou ações.
4. Não escolher ou usar um nome de usuário que pertença à outra pessoa, ou seja, usado com a intenção de
se passar por outra pessoa.
5. Fornecer dados cadastrais corretos, completos e atualizados. Caso seja constatado que o Usuário forneceu
dados falsos ou não condizentes com a realidade, a EYHE reserva-se no direito de suspender ou cancelar
o seu cadastro, sem prejuízo de adotar as medidas que entender cabíveis.
6. Ter dispositivos e equipamentos compatíveis, serviço de conexão à internet com antivírus e firewall
capacitados e softwares devidamente atualizados.
7. Criar uma senha de 6 a 10 caracteres com letras e números, de maneira segura, conforme
recomendação no item “8 – Segurança”.
8. Adotar medidas em seus dispositivos tecnológicos para evitar acesso físico e lógico por terceiros não
autorizados.
9. Tomar cuidado especial ao acessar sua conta em computadores e redes públicas, para que terceiros não
possam visualizar, gravar ou interceptar sua senha ou outras informações pessoais.
10. Deixar seus sistemas de anti-spam, filtros similares ou configurações de redirecionamento de mensagens
ajustados, para que o mesmo não interfira no recebimento de mensagens, comunicados e materiais da
EYHE, não sendo aceitável nenhuma escusa caso não tenha tido acesso a algum e-mail ou mensagem
eletrônica em virtude dos recursos mencionados.
4.2. A EYHE não pode e não será responsável por qualquer perda ou dano decorrente de sua falha em cumprir
com os requisitos acima.

Página 7 de 15
4.3. O descumprimento de quaisquer obrigações estipuladas poderá acarretar na suspensão total ou parcial das
funcionalidades da plataforma, ou ainda, na exclusão da conta do usuário, sem aviso prévio, conforme previsto
neste documento, sem prejuízo da adoção de medidas judiciais cabíveis na forma da legislação em vigor.
4.4. O LOGIN e a SENHA para acesso a plataforma EYHE, são de uso pessoal e intransferível, razão pela qual
a EYHE não se responsabiliza por eventual manipulação não autorizada dessas informações por terceiros, e
devendo, portanto, o USUÁRIO tomar todas as medidas necessárias para manter em sigilo as referidas
informações.
4.5. VOCÊ CONCORDA QUE PODEREMOS ACESSAR, PRESERVAR E DIVULGAR AS
INFORMAÇÕES DA SUA CONTA E CONTEÚDO SE EXIGIDO POR LEI OU SE ACREDITAR,
DE BOA FÉ, QUE O ACESSO, PRESERVAÇÃO OU DIVULGAÇÃO SEJA RAZOAVELMENTE
NECESSÁRIO PARA:
• Cumprir com um processo judicial;
• Fazer cumprir este Contrato;
• Responder a reivindicações de qualquer Conteúdo que viole os direitos de terceiros;
• Responder às suas solicitações de atendimento ao cliente; ou
• Proteger os direitos, bens ou segurança pessoal da Empresa ou de qualquer outra pessoa.
5. CONDUTA DO USUÁRIO - DA PROIBIÇÃO E PUNIÇÃO
5.1. Os serviços podem ser usados e acessados apenas para propósitos legais. Você concorda em cumprir todas
as leis, tratados e regulamentos locais, estaduais, nacionais e estrangeiros aplicáveis relacionados ao uso dos
serviços.
5.2. Você concorda em agir com cautela em todas as interações com outros usuários, especialmente ao decidir se
comunicar fora do serviço ou pessoalmente.
5.3. Além disso, sem limitação, você concorda em não realizar nenhuma das ações a seguir ao usar ou acessar os
serviços:
• Usar os serviços para coletar ou armazenar dados pessoais sobre outros usuários sem sua permissão expressa,
violando a privacidade de quaisquer usuários;

Página 8 de 15
• Tentar decifrar, descompilar, desmontar, fazer engenharia reversa ou tentar descobrir ou determinar o
código-fonte de qualquer software ou algoritmo proprietário usado para fornecer os serviços da plataforma
EYHE, com a finalidade de copiar, modificar, reproduzir, alugar, sublicenciar, publicar, divulgar, emprestar,
transmitir ou distribuir;
• Para fazer upload, postar, enviar por e-mail, transmitir ou disponibilizar qualquer conteúdo que seja
considerado ilegal, prejudicial, ameaçador, abusivo, ofensivo, fraudulento, difamatório, vulgar, obsceno ou
invasivo, da privacidade de outra pessoa ou que seja odioso, e/ou racialmente, etnicamente ou de outra
forma censurável;
• Ter mais de uma conta de Usuário;
• Utilizar robô, bot, spider, rastreador, scraper, aplicativo de busca/recuperação de site, proxy ou outro
dispositivo aqui não tipificado, mas que atue de modo automatizado; método ou processo manual ou
automático para acessar, recuperar, indexar, minerar, realizar “data mine” ou, de outra forma, reproduzir ou
contornar a estrutura de navegação ou apresentação do serviço ou conteúdos, tanto para realizar operações
massificadas ou para quaisquer outras finalidades, bem como, utilizar materiais que contenham qualquer
vírus, worm, malware e outros programas de computador que possam causar danos à plataforma ou aos
usuários da plataforma;
• Solicitar senhas e informações de identificação pessoal de outros usuários, para qualquer propósito, para fins
comerciais ou ilegais, ou divulgar informações pessoais de outra pessoa sem a permissão dela;
• Usar o serviço com o propósito de prejudicar a plataforma EYHE;
• Se passar por qualquer usuário; conscientemente incluir ou usar qualquer informação falsa ou imprecisa em
qualquer perfil;
• Usar os serviços para coletar ou armazenar dados pessoais sobre outros usuários sem sua permissão expressa;
• Fazer upload, postar, enviar por e-mail ou transmitir qualquer publicidade não solicitada ou não autorizada,
materiais promocionais, lixo eletrônico, spam, correntes, “esquemas de pirâmide” ou qualquer outra forma
de solicitação;
• Burlar, desabilitar ou interferir de qualquer outra forma nos recursos relacionados à segurança da plataforma,
serviços ou recursos que impeçam ou restrinjam o uso ou a cópia de qualquer conteúdo;
• Tentar sondar, verificar ou testar a vulnerabilidade de qualquer sistema ou rede da plataforma EHYE ou
violar, prejudicar ou burlar quaisquer medidas de segurança ou autenticação que protejam os Serviços;
5.4. A Plataforma EYHE reserva-se no direito de investigar e/ou cancelar a sua conta, se você violar este termo,
utilizar o serviço de forma inadequada ou se comportar de uma forma que a EYHE considere inadequada ou
ilegal, incluindo ações ou comunicações que ocorram dentro ou fora do serviço.

Página 9 de 15
5.5. O USUÁRIO concorda em indenizar e/ou isentar a EYHE e seus representantes em caso de quaisquer
reclamações, processos, perdas, responsabilidades, danos e despesas, incluindo honorários advocatícios razoáveis
e custas judiciais resultantes dos danos que causar à EYHE ou a terceiros.
6. INSENÇÃO DE RESPONSABILIDADE
6.1. OS USUÁRIOS ANJOS NÃO SÃO NOSSOS FUNCIONÁRIOS, NEM AGENTES, NEM
REPRESENTANTES. ALÉM DISSO, NÃO ASSUMIMOS QUALQUER RESPONSABILIDADE
POR QUALQUER ATO, OMISSÃO OU AÇÃO DE QUALQUER USUÁRIO (ANJO E HERÓI).
6.2. A EYHE APENAS FACILITA A CONEXÃO ENTRE OS USUÁRIOS (HERÓIS E ANJOS), NÃO
TENDO NENHUMA RESPONSABILIDADE COM RELAÇÃO AO CONTEÚDO
(ACONSELHAMENTO, INFORMAÇÕES FORNECIDAS OU QUAISQUER OUTRAS AÇÕES OU
OMISSÕES) REALIZADA ENTRE OS MESMOS.
6.3. OS USUÁRIOS RECONHECEM E ACEITAM, AO REALIZAR INTERAÇÕES ENTRE OS
MESMOS (ANJOS E HERÓIS) QUE O FAZEM POR SUA CONTA E RISCO, RECONHECENDO
A PLATAFORMA EYHE COMO MERA PRESTADORA DE SERVIÇOS DE DISPONIBILIZAÇÃO
DE PLATAFORMA VIRTUAL.
6.4. A plataforma EYHE não se responsabiliza por qualquer dano, prejuízo ou perda ocasionada no equipamento
do Usuário por falhas na internet, no sistema ou no servidor utilizado pelo Usuário, seja decorrente de condutas
de terceiros, caso fortuito ou força maior. Também não se responsabiliza por qualquer vírus que possa atacar o
equipamento do Usuário em decorrência do acesso, utilização ou navegação na internet ou como conseqüência
da transferência de dados, arquivos, imagens ou textos.
6.5. Quaisquer interrupções e indisponibilidades, ações danosas de terceiros que impeçam a prestação dos serviços
ou a continuidade da plataforma (casos fortuitos ou de força maior, hacker, vírus, etc.); manutenções técnicas
periódicas; falta de energia elétrica; falhas nas redes de transmissão de dados; etc, que ocorram na plataforma,
quando ocasionadas por motivos técnicos ou operacionais, não possuem, por parte da EYHE, a garantia de
continuidade e disponibilidade integral dos serviços, pelo que se deflui que a mesma não se responsabiliza por
danos, prejuízos e/ou frustração de expectativas daí decorrentes.

Página 10 de 15
6.6. A EYHE comprometesse a envidar os seus melhores esforços nas hipóteses de interrupções e
indisponibilidades, bem como se compromete a tentar viabilizar comunicado prévio aos usuários, assim que a
falha for detectada.
7. MODIFICAÇÕES DOS TERMOS DE USO, SERVIÇO E SISTEMA
7.1. Podemos alterar este Contrato e o serviço periodicamente, por diversas razões, inclusive para refletir as
alterações ou exigências legais, novos recursos ou mudanças nas práticas comerciais. A versão mais recente deste
Contrato será publicada na plataforma. CABE AO USUÁRIO CONSULTAR A VERSÃO MAIS RECENTE
REGULARMENTE. A VERSÃO MAIS RECENTE É A QUE SE APLICA.
7.2. Se as alterações incluírem emendas significativas que afetam os seus direitos ou obrigações, você será
notificado antecipadamente a respeito, por meios razoáveis, o que pode incluir notificação por meio do serviço
ou por e-mail. SE VOCÊ CONTINUAR A UTILIZAR O SERVIÇO APÓS AS ALTERAÇÕES
ENTRAREM EM VIGOR, ISSO SIGNIFICA QUE VOCÊ CONCORDA COM AS ALTERAÇÕES,
MODIFICAÇÕES REALIZADAS NOS TERMOS DE USO E SERVIÇOS PRESTADOS.
7.3. Estamos buscando sempre a melhora da plataforma, dos serviços prestados, oferecendo funcionalidades
adicionais que possam ser úteis e interessantes para você. Isso significa que podemos incluir novos recursos ou
aprimorar nossos serviços ao longo do tempo, bem como remover alguns recursos e, se essas ações não afetarem
os seus direitos e obrigações significativamente, talvez não forneceremos aviso prévio antes de removê-los.
Podemos até mesmo suspender totalmente o serviço, caso em que você será notificado com antecedência, a menos
que circunstâncias atenuantes, como questões de segurança, impeçam-nos de fazê-lo.
7.4. Você concorda, confirma e reconhece que podemos modificar, suspender, interromper ou descontinuar a
plataforma, qualquer parte da plataforma ou o uso da plataforma, com ou sem aviso prévio. Você concorda e
reconhece que não seremos responsáveis por nenhuma das ações mencionadas anteriormente ou por quaisquer
perdas ou danos causados por qualquer uma das ações mencionadas anteriormente
7.5. Atualizaremos a data da "Última revisão" na parte superior deste termo de uso, caso seja realizada alterações.

8. SEGURANÇA

Página 11 de 15
8.1. Não somos responsáveis pela conduta do usuário dentro ou fora da plataforma. Você concorda em agir com
cautela em todas as interações com outros usuários, especialmente ao decidir se comunicar fora do serviço ou
pessoalmente.
8.2. VOCÊ É O ÚNICO RESPONSÁVEL POR SUAS INTERAÇÕES COM OUTROS USUÁRIOS.
NÃO INVESTIGAMOS OS ANTECEDENTES CRIMINAIS DOS USUÁRIOS, NEM
VERIFICAMOS O HISTÓRICO DOS USUÁRIOS.
8.3. Nossa plataforma possui os sistemas de segurança mais avançados em termos de armazenamento e
gerenciamento de dados. Adotamos medidas tecnológicas aptas a reduzir ao máximo o risco de destruição, perda,
acesso não autorizado ou de tratamento não permitido pelo USUÁRIO.
8.4. CONSIDERANDO QUE NENHUM SISTEMA DE SEGURANÇA É IRREFRAGÁVEL (100%
SEGURO), NOS EXIMIMOS DE QUAISQUER RESPONSABILIDADES POR EVENTUAIS
DANOS E/OU PREJUÍZOS DECORRENTES DE FALHAS, VÍRUS OU INVASÕES DO NOSSO
BANCO DE DADOS, SALVO NOS CASOS EM QUE TIVER DOLO OU CULPA.
8.5. Os acessos ao servidor e ao banco de dados são protegidos por nome de usuário e senha. Todas as
informações são criptografadas no banco de dados, no entanto, é impossível discriminar se as informações que
você está fornecendo são precisas e verdadeiras.
8.6. Você é o único responsável pelo fato de que as informações inseridas no sistema são verdadeiras e por
quaisquer danos que possam surgir em caso de erros, defeitos ou omissões das informações fornecidas.
8.7. Procure não utilizar senhas obvias e troque sua senha regularmente e nunca compartilhe com
terceiros.
8.8. Recomendamos adotar uma senha forte com pelo menos 6 caracteres, contendo letras maiúsculas,
minúsculas e números, bem como, não utilizar senhas óbvias de fácil dedução. Ainda, recomendamos
que não reutilize a mesma senha para outras plataformas e também para que tome cuidado especial ao
acessar sua conta em computadores e redes públicas, para que terceiros não possam visualizar, gravar
ou interceptar sua senha ou outras informações pessoais.
8.9. Com relação a mensagens eletrônicas (e-mails) é importante verificar o conteúdo de todo o e-mail, sempre
desconfiando de e-mails que contenham um cabeçalho e campo de remetente suspeito ou com conteúdo estranho,
com erros de português e logos com falha.

Página 12 de 15
8.10. Você deve nos notificar imediatamente se souber ou suspeitar que qualquer pessoa não autorizada está
usando sua senha ou sua conta (por exemplo, sua senha foi perdida ou roubada, alguém tentou usar os Serviços
por meio de sua conta sem o seu consentimento ou sua conta foi acessada sem a sua permissão). É altamente
recomendável que você não use os Serviços em computadores públicos. Também recomendamos que você não
armazene sua senha através de seu navegador da web ou outro software.
8.11. É OBRIGAÇÃO DO USUÁRIO, NOTIFICAR IMEDIATAMENTE A PLATAFORMA EYHE,
SOBRE QUALQUER USO NÃO AUTORIZADO DE SEU NOME DE USUÁRIO OU SENHA OU
QUALQUER OUTRA VIOLAÇÃO DE SEGURANÇA CONHECIDA OU SUSPEITA. NÓS NÃO
SEREMOS RESPONSÁVEIS POR QUALQUER PERDA OU DANO DECORRENTE DE SUA
FALHA EM CUMPRIR ESTA DISPOSIÇÃO. VOCÊ DEVE TOMAR CUIDADO ESPECIAL AO
ACESSAR SUA CONTA EM UM COMPUTADOR PÚBLICO, PARA QUE OUTROS NÃO POSSAM
VISUALIZAR, GRAVAR OU INTERCEPTAR SUA SENHA OU OUTRAS INFORMAÇÕES
PESSOAIS.
8.12. O USUÁRIO CONCORDA EM SER TOTALMENTE RESPONSÁVEL PELAS
CONSEQUÊNCIAS ECONÔMICAS E QUAISQUER OUTRAS CONSEQUÊNCIAS
DECORRENTES DE QUALQUER USO IRRESPONSÁVEL DO LOGIN E SENHAS NA
PLATAFORMA OU PELO USO POR TERCERIOS NÃO AUTORIZADOS.
9. EU POSSO TER ACESSO, REVISAR, ATUALIZAR, CORRIGIR, BLOQUEAR OU EXCLUIR
MEU CADASTRO E DADOS PESSOAIS?
9.1. Sim, você poderá ter acesso, revisar, atualizar, bloquear, corrigir e excluir seu cadastro e dados pessoais,
acessando seu cadastro (MINHA CONTA).
9.2. DO TÉRMINO OU BLOQUEIO DO TRATAMENTO DOS DADOS PESSOAIS, NÓS
PODEREMOS CONSERVÁ-LOS OU COMPARTILHÁ-LOS COM TERCEIROS, SOMENTE
QUANDO TAIS PRÁTICAS SEJAM ADOTADAS PARA FINALIDADES HISTÓRICAS,
ESTATÍSTICAS OU DE PESQUISA CIENTÍFICA.
10. DIREITOS AUTORAIS E PROPRIEDADE INTELECTUAL E LICENÇA DE USO
10.1. O site, os serviços e todas as informações e/ou conteúdos que você vê, ouve ou de outra forma experimenta
no site, são protegidos por leis de direitos autorais, marcas comerciais e outras leis brasileiras e internacionais.

Página 13 de 15
10.2. Nós possuímos ou temos a licença para usar todos os direitos de propriedade intelectual relacionados a
plataforma EYHE, os serviços, o site e o conteúdo, incluindo, sem limitação, todos os direitos de propriedade
intelectual protegidos como invenções de patente pendente ou patenteadas, segredos comerciais, direitos autorais,
marcas registradas, marcas de serviço, imagem comercial ou informações proprietárias ou confidenciais e se elas
foram ou não registradas.
10.3. O usuário não adquirirá nenhum direito de propriedade intelectual da plataforma EYHE por meio do uso
dos Serviços ou do Site.
10.4. Quando você usa nossa plataforma e serviços, concedemos a você uma licença limitada, não exclusiva,
intransferível e revogável, sem o direito de sublicenciar, acessar e usar os serviços e baixar e imprimir qualquer
conteúdo fornecido pela EYHE unicamente para fins pessoais e não comerciais.
10.5. Nenhuma licença ou direitos são concedidos a você por implicação ou de qualquer outra forma sob quaisquer
direitos de propriedade intelectuais pertencentes ou controlados pela EYHE ou seus licenciadores, exceto pelas
licenças e direitos expressamente concedidos nestes termos.
10.6. Quaisquer usos não contemplados no presente termos poderão ser considerados como atos ilícitos e sujeitos
às penas previstas nas legislações em vigor.
11. DISPOSIÇÕES GERAIS
11.1. A tolerância do eventual descumprimento de quaisquer das cláusulas e condições do presente instrumento
não constituirá novação das obrigações aqui estipuladas e tampouco impedirá ou inibirá a exigibilidade das mesmas
a qualquer tempo.
11.2. Caso alguma disposição destes termos de uso seja considerada ilegítima por autoridade da localidade que o
usuário acessa a plataforma, ou mantém vínculo, as demais condições permanecerão em pleno vigor e efeito até
segunda ordem.
11.3. Podemos alterar os critérios de utilização da plataforma ou da realização de atividades nela a qualquer
momento. Também, possuímos a faculdade de a qualquer tempo, recusar a conceder, suspender ou cancelar a
conta de aceso de qualquer Usuário que utilizar de forma fraudulenta, violar ou tentar violar os presentes Termos
de Uso e Política de Privacidade e Proteção de Dados, ou qualquer conteúdo legal ou materiais disponibilizados
na plataforma

Página 14 de 15
11.4. A EYHE poderá exibir publicidades e indicar links externos na plataforma, para acesso do Usuário, mas, não
realiza qualquer verificação, controle, aprovação ou garantia de adequação ou exatidão das informações e dados
disponíveis nas publicidades e links, não podendo ser responsável por quaisquer danos decorrentes do acesso dos
usuários a estas publicidades e links.
11.5. Podemos utilizar todos os canais de comunicação fornecidos e autorizados pelos Usuários, para entrar em
contato com os usuários, sendo de responsabilidade dos usuários o fornecimento dos dados corretos e precisos,
além de manter atualizados.
11.6. A Eyhe poderá alterar os critérios de utilização de sua plataforma ou da realização de atividades nela a
qualquer momento. A mesma terá duração indeterminada, podendo ser suspensa ou interrompida a qualquer
momento, podendo ser extinto sem representar qualquer direito adquirido ao Usuário
11.7. Não garantimos que nossa plataforma estará disponível ininterruptamente e/ou que estará sempre livre de
erros, não podendo, por conseguinte, ser responsabilizada por danos causados aos Usuários em virtude de
qualquer interrupção no funcionamento dos mesmos, ainda, eventualmente os mesmos poderão não estar
disponível por motivos técnicos ou falhas da internet, ou por qualquer outro caso fortuito ou de força maior,
alheios ao nosso controle.
11.8. A EYHE poderá ceder este contrato a qualquer momento para qualquer matriz, subsidiária ou qualquer
empresa afiliada, ou como parte da venda para, fusão, incorporação, com ou outra transferência da nossa empresa
para uma outra entidade. Colocaremos um aviso na plataforma sobre qualquer mudança de propriedade para que
você tenha a oportunidade de interromper o uso da plataforma ou cancelar o seu registro, se você não quiser
continuar a utilizar a plataforma e os serviços de acordo com a nova titularidade.
11.9. O Usuário não poderá ceder, transferir ou sublicenciar estes termos de uso para qualquer pessoa e qualquer
tentativa de fazê-lo em violação do presente ponto deve ser nula e sem efeito.
11..10. Caso o Usuário acredite que algum conteúdo da plataforma tenha alguma irregularidade, o mesmo poderá
entrar em contato com a empresa EYHE, através do e-mail contato@eyhe.com.br.
11.10. A plataforma EYHE é administrada no Brasil e destinada a usuários do Brasil e qualquer uso fora do Brasil
é por conta e risco do próprio usuário e o usuário é responsável pelo cumprimento das leis locais aplicáveis à sua
utilização dos serviços.
12. LEI APLICÁVEL E JURISDIÇÃO

Página 15 de 15
12.1. O presente Termo de Uso e a Política de Privacidade e Proteção de Dados, aqui descritos, são interpretados
segundo a legislação brasileira, no idioma português, sendo eleito o Foro da Comarca de Pato Branco no Estado
do Paraná, para dirimir qualquer litígio, questão ou dúvida superveniente, com expressa renúncia de qualquer
outro, por mais privilegiado que seja.
13. SUPORTE AO USUÁRIO, DÚVIDAS OU RECLAMAÇÕES
13.1. Se você precisar de um suporte técnico, tiver dúvidas ou preocupações sobre como processamos seus dados
pessoais, ou se quiser exercer qualquer um dos seus direitos descritos nos termos de uso e política de privacidade,
fique à vontade para entrar em contato através e-mail: contato@eyhe.com.br.
13.2. Ao utilizar tais canais para denúncias e reclamações, o Usuário deverá descrever a situação detalhadamente,
para que possamos verificar quais as medidas cabíveis, observando sempre as garantias constitucionais, em especial
a ampla defesa e o contraditório, nos casos que necessários.
13.3. Ao se comunicar com os nossos representantes de atendimento ao cliente, você concorda em agir com
respeito e gentileza. Se considerarmos que o seu comportamento em relação a qualquer de nossos representantes
de atendimento ao cliente ou outros funcionários revele-se, em qualquer momento, ameaçador ou ofensivo,
reservamo-nos o direito de cancelar a sua conta imediatamente.
14. DECLARAÇÃO FINAL DO USUÁRIO – CONSENTIMENTO
O USUÁRIO DECLARA QUE FEZ A LEITURA COMPLETA E ATENTA DO PRESENTE TERMO
E CONDIÇÕES DE USO, ESTANDO PLENAMENTE CIENTE, CONFERINDO, ASSIM, SUA
LIVRE E EXPRESSA CONCORDÂNCIA COM OS TERMOS AQUI ESTIPULADOS, DE ACORDO
COM AS LEIS EM VIGOR.
EYHE INTERMEDIAÇÃO DE NEGOCIOS LTDA, pessoa jurídica de direito privado, inscrita no CNPJ
sob o no.30.847.484/0001-70, com sede na Rua Paraná, no 1670, Centro, na cidade de Pato Branco, Paraná, Brasil.
                </p>
            </div>
            <p class="uk-text-right">
                <button class="uk-button uk-button-default botao_roxo uk-modal-close" type="button">LIDO</button>
            </p>
        </div>
    </div>

    <!-- This is the modal -->
    <div id="privacidade" uk-modal>
        <div class="uk-modal-dialog uk-modal-body">
            <h2 class="uk-modal-title">Política de Privacidade</h2>
            <div class="texto-modal">
            <p style="font-size: 13px;">Bem-vindo à Política de Privacidade e Proteção de Dados Eyhe.
A sua privacidade é muito importante para Eyhe. Projetamos nossa Política de Privacidade para fazer divulgações
importantes sobre como você pode usar a nossa plataforma de forma segura e também para informar a maneira
como utilizamos, coletamos, armazenamos e compartilhamos os seus dados, conteúdos e informações, bem como
a forma de você solicitar a exclusão dos seus dados.
Nós encorajamos você a ler a Política de Privacidade em sua totalidade.
Como condição para usar os nossos serviços, VOCÊ ACEITA E CONSENTE o uso de suas informações
conforme descrito nesta política. Ainda, você declara que fez a leitura completa e atenta da presente
Política de Privacidade e Proteção de Dados e Termos de Uso, estando plenamente ciente, conferindo,
assim, sua livre e expressa concordância com os termos aqui estipulados.
SE VOCÊ USUÁRIO NÃO ACEITA E CONSENTE COM OS TERMOS E CONDIÇÕES DE USO
DA PLATAFORMA E POLÍTICA DE PRIVACIDADE E PROTEÇÃO DE DADOS, VOCÊ NÃO
PODERÁ USAR OS NOSSOS SERVIÇOS.
Os seus dados serão tratados com lealdade e boa fé, atendendo ao legítimo interesse dos seus titulares.
Está Política de Privacidade e Proteção de Dados entram em vigor em 04 de outubro de 2018, sendo a mesma a 1o
versão.

GLOSSÁRIO

Listamos o glossário com alguns termos visando facilitar o entendimento do usuário.
• Anjo: usuário com histórias e experiências de superação que podem inspirar o seu dia e transformar a
sua vida.
• Anti-spam: sistema que bloqueia correspondências não desejadas;
• Centro de Valorização da Vida (CVV) - é uma associação civil sem fins lucrativos que trabalha com
prevenção ao suicídio.
• Cookies: pequenos arquivos de texto que são enviados ou acessados a partir do seu navegador web ou da
memória do seu dispositivo;
• Eyhe: empresa responsável pelos serviços da plataforma;

Página 2 de 10
• Google Analytics: é um sistema gratuito de monitoramento de tráfego que pode ser instalado em qualquer
site, loja virtual ou blog.
• Herói: usuário que busca a plataforma em busca de um caminho de superação e aprendizado;
• Plataforma: é o ambiente online que os Usuários terão acesso e qualquer outro website ou aplicativos
mantidos ou administrados pela EYHE, que oferece serviços equivalentes;
• Senha: sequência de letras e números escolhida pelo USUÁRIO, composta de no mínimo 6 (seis)
caracteres, a qual deverá ser previamente informada pelo USUÁRIO quando do acesso ao SITE. Cabe
ressaltar que a Eyhe não terá acesso a esta senha, portanto se o USUÁRIO quiser recuperar seu acesso, a
Eyhe encaminhará um email para o email cadastrado na plataforma Eyhe para, a partir deste, gerar uma
nova SENHA. Sendo assim, com este procedimento, a SENHA poderá ser alterada a qualquer momento
pelo USUÁRIO;
• Link: terminologia para endereço de internet;
• Upload: é o simples ato de transferir dados de um computador local para um servidor.
• Usuário: qualquer pessoa que utiliza e aderiu através do termos de uso da plataforma EYHE;
1. O que é uma política de privacidade e qual é o seu objetivo?
É um documento que informa quais dados pessoais nós coletamos de você “USUÁRIO”, por que e como nós os
manteremos privados e seguros.
O objetivo da política de privacidade é informar sobre como os seus dados estão sendo tratados, explicar os tipos
de informações obtidas sobre você, como as informações são obtidas, usadas e divulgadas e ainda, a forma de
como você poderá obter acesso a essas informações, e as escolhas que você tem em relação ao nosso uso e à sua
capacidade de revisar e corrigir as informações.
2. Quais informações coletamos?
Coletamos Dados Pessoais e os Dados do Navegador, por meio de sistemas automatizados ou livremente inseridos
por você em nossa plataforma “site”.
VOCÊ PODE DECIDIR QUAIS INFORMAÇÕES, SE HOUVER, GOSTARIA DE
COMPARTILHAR CONOSCO, MAS ALGUMAS FUNÇÕES DA PLATAFORMA PODEM NÃO
ESTAR DISPONÍVEIS PARA VOCÊ SEM NOS FORNECER AS INFORMAÇÕES NECESSÁRIAS.
AO DECIDIR FORNECER AS INFORMAÇÕES, VOCÊ CONCORDA COM NOSSOS MÉTODOS
DE COLETA E USO, BEM COMO COM OUTROS TERMOS E PROVISÕES DESTA POLÍTICA

Página 3 de 10
DE PRIVACIDADE. OS DIFERENTES TIPOS DE INFORMAÇÃO QUE COLETAMOS E COMO
PRETENDEMOS USÁ-LOS SÃO DETALHADOS ABAIXO.
Quando você efetua o cadastro em nosso site, coletamos e processamos os seguintes dados “pessoalmente
identificável”:
a) Nome Completo;
b) E-mail válido;
c) Telefone;
d) Data de Nascimento;
e) Foto para o perfil
f) Biografia Resumida (somente o Usuário “Anjo” deverá preencher esse campo)
Os dados acima são coletados quando inseridos voluntariamente pelo USUÁRIO ao realizar seu cadastro ou
quando efetua a atualização dos dados.
VOCÊ SEMPRE DEVERÁ PREZAR PELA VERACIDADE E EXATIDÃO DOS DADOS ACIMA
INFORMADO POR VOCÊ VOLUNTARIAMENTE. FICA DESTACADO QUE VOCÊ PODERÁ
RESPONDER CIVIL OU CRIMINALMENTE POR INFORMAÇÕES INDEVIDAS OU
EQUIVOCADAS.
Nos reservamos no direito de utilizar todos os meios legais e possíveis para identificar os USUÁRIOS da
plataforma, bem como de solicitar, a qualquer momento, dados adicionais e documentos que considere
necessários, com a finalidade de verificar os dados cadastrais informados.
3. Qual é o propósito na coleta e processamento dos dados do cadastro do USUÁRIO?
a) Nome completo e apelido: Personalização e Identificação do usuário;
b) Telefone - Para entrar em contato com o usuário, caso seja necessário;
c) E-mail - Encaminhar link de confirmação; notificação sobre uma possível mudança nos termos de uso e
política de privacidade; informar sobre novidades, funcionalidades, conteúdos, notícias e demais eventos
relevantes para a manutenção do relacionamento com os nossos USUÁRIOS.
d) Data Nascimento - a fim de promover a segurança de menores de acordo com a legislação aplicável;
e) Foto e Biografia – Personalização, identificação.
Você nos concede permissão para usar os dados acima elencados para utilização da plataforma.

Página 4 de 10
4. Quais são os dados (pessoais identificáveis ou não), as quais coletamos a partir da navegação?
Além dos dados mencionados acima, também coletamos dados automaticamente, alguns dos quais podem ser
dados pessoais. Isso inclui:
a) Coletamos informações do seu computador, telefone, tablet ou outros dispositivos que você usar para
acessar os nossos serviços. Isto pode incluir a configuração de idioma, endereço IP, localização,
configurações do dispositivo, sistema operacional do dispositivo, informações de registro, tempo de uso,
URL solicitada, relatório de status, user agent (informações da versão do navegador), sistema operacional,
resultado (visitante ou hóspede), histórico de navegação, ID de USUÁRIO, e tipos de dados visualizados.
b) Cookies, por meio da ferramenta Google Analytics, que coleta as seguintes informações do
USUÁRIO, de forma anônima e para efeitos analíticos: Endereço de IP; Navegador utilizado;
Configurações de idioma, Páginas acessadas.
Quanto ao Google Analytics, o USUÁRIO poderá saber mais detalhes sobre as informações de privacidade do
Google Analytics em: “Como o Google utiliza os dados quando o usuário usa sites ou aplicativos dos nossos
parceiros”, localizado em <google.com/intl/pt-BR/policies/privacy/partners/>.
Caso o USUÁRIO NÃO CONCORDE COM A COLETA DE DADOS PELO GOOGLE ANALYTICS
poderá desativá-lo por meio do Add-on do seu navegador, disponível no link
<https://tools.google.com/dlpage/gaoptout?hl=pt-BR>.
Você poderá escolher quais dados pessoais (se houver) você quer nos fornecer, no entanto, se você não quiser
fornecer determinados dados, isso poderá ter impacto na utilização do aplicativo, em algumas das suas transações.
5. Por que precisamos coletar e processar esses dados?
a) Para saber quem é você;
b) Para promover os nossos serviços e melhoria dos mesmos;
c) Entrar em contato via e-mail marketing, mala direta, anúncios customizados, mobile marketing (SMS,
WhatsApp), se necessário ou se assim solicitado;
d) Informar sobre novidades, funcionalidades, conteúdos, notícias e demais eventos relevantes para a
manutenção do relacionamento com os nossos USUÁRIOS;
e) Analisar suas informações de forma não identificável e para fins estatísticos ou para estudos, pesquisas e
levantamentos pertinentes às atividades de seus comportamentos ao utilizar a Plataforma;

Página 5 de 10
f) Segurança, detecção de fraude e prevenção - Podemos usar dados pessoais para analisar o risco e para
propósitos de segurança, incluindo a autenticação dos usuários. Para isso, dados pessoais poderão ser
compartilhados com terceiros, como autoridades, de acordo com a lei, e consultores externos;
g) Para defesa em processos administrativos ou judiciais movidos em face da Eyhe;
h) Para cumprimento de Ordem Judicial ou Requisição Administrativa.
6. Essas informações são compartilhadas?
Nós somos uma plataforma de conexão, inspiração e evolução pessoal. Desta forma, quando o Usuário
“Herói” se conectar com o Usuário “Anjo”, alguns dados pessoais serão compartilhados com o Herói e
com o Anjo, como:
• Dados que o Anjo compartilha com o Herói: “nome, foto do perfil e biografia”.
• Dados que o Herói compartilha com o Anjo: “nome e foto do perfil”.
DE MANEIRA ALGUMA A EMPRESA EYHE IRÁ COMPARTILHAR COM OUTROS USUÁRIOS
O “E-MAIL, TELEFONE E DATA DE NASCIMENTO” OU OUTROS DADOS FORNECIDOS. É
DE INTEIRA RESPONSABILIDADE DOS USUÁRIOS AO FORNECER ESSAS INFORMAÇÕES
DENTRE OUTRAS AOS USUÁRIOS ATRAVÉS DA COMUNICAÇÃO ENTRE OS MESMOS.
OS USUÁRIOS RECONHECEM E CONCORDAM QUE A EMPRESA EYHE NÃO PODERÁ SER
RESPONSABILIZADA, POR QUALQUER ATO, OMISSÃO OU AÇÃO DE QUALQUER USUÁRIO
(ANJO OU HERÓI).
Os usuários reconhecem e concordam que podemos compartilhar seus dados nos seguintes casos:
a) Com empresas e autoridades públicas para combater fraudes e atividades ilegais, podemos trocar dados
com outras empresas e organizações e fornecê-las a autoridades públicas em resposta a solicitações legais.
b) Com as autoridades judiciais, administrativas ou governamentais competentes, sempre que houver
requerimento, requisição ou ordem judicial. Também podemos divulgar seus dados com base em seu
consentimento, em conformidade com a lei ou para proteger os direitos, propriedade ou segurança de
nossa plataforma, nossos usuários ou outro.
c) De forma automática em caso de movimentações societárias, como fusão, aquisição e incorporação.
d) Podemos compartilhar informações agregadas ou desidentificadas com terceiros para pesquisa, marketing,
análise e outros fins, desde que tais informações não identifiquem um indivíduo em particular.

Página 6 de 10

7. Por quanto tempo será mantido meus dados (fornecidos no cadastro)?
Os dados pessoais coletados/fornecidos pelo USUÁRIO serão mantidos pelo período que o mesmo permaneça
ativo na plataforma.
Quando sua conta se tornar inativa ou a seu pedido, excluiremos seus dados pessoais. Destaca-se que poderemos
guardar obrigatoriamente os seus registros, conforme prevê as Leis brasileiras, em especial o Marco Civil da
Internet (artigo 7o, X) e a Lei Geral de Proteção de Dados.
8. Da utilização de cookies
Cookie é um pequeno pacote de dados colocados no navegador do seu computador, disco rígido ou em seu
dispositivo móvel.
Utilizamos cookies para:
• permitir a operação técnica da plataforma, para administrar, facilitar o seu login na sua conta;
• para permitir que você personalize e armazene suas configurações;
• coletar informações de uso, quantos usuários visitaram o site, as páginas que acessaram e se ocorreu algum
problema técnico no carregamento das páginas ou na navegação pelo site.
Os tipos de informação que coletamos através de cookies incluem: endereço de IP; ID do dispositivo; páginas
visualizadas; busca de informações; tipo de navegador; sistema operacional; provedor de serviços de internet;
registro de data/hora.
9. O Usuário pode desabilitar os cookies?
Sim, você pode permitir, bloquear ou excluir os cookies instalados no seu computador, configurando as opções
do navegador instaladas no seu computador ou dispositivo móvel. Cada navegador utilizado por você, poderá ter
parâmetros diferentes, sendo comum que se configure no menu de "Preferências" ou "Ferramentas". Para obter
mais detalhes sobre a configuração dos cookies, consulte o menu "Ajuda" do seu navegador.
Destaca-se que caso você opte por não aceitar determinados cookies, algumas partes do nosso site, bem
como da maioria dos outros sites, não funcionarão corretamente caso opte por fazê-lo.

Página 7 de 10

10. Links para site de terceiros
No momento nossa plataforma não irá conduzir você para qualquer site de terceiro. Futuramente, poderemos
utilizar de links para site de terceiros. Assim, caso seja realizada essa alteração, afetando você e sua privacidade,
iremos notificar você sobre tais alterações através de nossa plataforma, com razoável antecipação de sua
implementação. A utilização contínua da plataforma Eyhe, após a divulgação de eventuais mudanças, inclusões
e/ou alterações, confirmará a aceitação destas por você USUÁRIO.
11. Privacidade e Proteção de Dados de Menores
Conforme disposto nos termos de uso, os nossos serviços estão limitados a usuários de idade igual ou superior a
18 anos. Não é permitido a utilização da nossa plataforma por usuários menores de 18 anos e não coletamos de
forma consciente informações pessoais de pessoas menores de 18 anos.
SE VOCÊ SUSPEITAR QUE UM USUÁRIO TENHA MENOS DE 18 ANOS, UTILIZE OS NOSSOS
CANAIS DE COMUNICAÇÃO DISPONÍVEL PARA NOS ALERTAR.
12. Segurança dos dados
Nossa plataforma possui os sistemas de segurança mais avançados em termos de armazenamento e gerenciamento
de dados. Adotamos medidas tecnológicas aptas a reduzir ao máximo o risco de destruição, perda, acesso não
autorizado ou de tratamento não permitido pelo USUÁRIO.
CONSIDERANDO QUE NENHUM SISTEMA DE SEGURANÇA É IRREFRAGÁVEL (100%
SEGURO), NOS EXIMIMOS DE QUAISQUER RESPONSABILIDADES POR EVENTUAIS
DANOS E/OU PREJUÍZOS DECORRENTES DE FALHAS, VÍRUS OU INVASÕES DO NOSSO
BANCO DE DADOS, SALVO NOS CASOS EM QUE TIVER DOLO OU CULPA.
Os acessos ao servidor e ao banco de dados são protegidos por nome de usuário e senha. Todas as informações
são criptografadas no banco de dados, no entanto, é impossível discriminar se as informações que você está
fornecendo são precisas e verdadeiras.
Você é o único responsável pelo fato de que as informações inseridas no sistema são verdadeiras e por quaisquer
danos que possam surgir em caso de erros, defeitos ou omissões das informações fornecidas.
TAMBÉM, VOCÊ É RESPONSÁVEL POR MANTER A CONFIDENCIALIDADE DE SEU NOME
DE USUÁRIO E SENHA DESIGNADOS DURANTE O PROCESSO DE REGISTRO E É

Página 8 de 10
TOTALMENTE RESPONSÁVEL POR TODAS AS ATIVIDADES QUE OCORRAM SOB SEU
NOME DE USUÁRIO E SENHA.
Procure não utilizar senhas obvias e troque sua senha regularmente e nunca compartilhe com terceiros.
Com relação a mensagens eletrônicas (e-mails) é importante verificar o conteúdo de todo o e-mail,
sempre desconfiando de e-mails que contenham um cabeçalho e campo de remetente suspeitos ou com
conteúdo estranho, com erros de português e logos com falha.
É OBRIGAÇÃO DO USUÁRIO, NOTIFICAR IMEDIATAMENTE A PLATAFORMA EYHE,
SOBRE QUALQUER USO NÃO AUTORIZADO DE SEU NOME DE USUÁRIO OU SENHA OU
QUALQUER OUTRA VIOLAÇÃO DE SEGURANÇA CONHECIDA OU SUSPEITA. NÓS NÃO
SEREMOS RESPONSÁVEIS POR QUALQUER PERDA OU DANO DECORRENTE DE SUA
FALHA EM CUMPRIR ESTA DISPOSIÇÃO. VOCÊ DEVE TOMAR CUIDADO ESPECIAL AO
ACESSAR SUA CONTA EM UM COMPUTADOR PÚBLICO, PARA QUE OUTROS NÃO POSSAM
VISUALIZAR, GRAVAR OU INTERCEPTAR SUA SENHA OU OUTRAS INFORMAÇÕES
PESSOAIS.
O USUÁRIO CONCORDA EM SER TOTALMENTE RESPONSÁVEL PELAS CONSEQUÊNCIAS
ECONÔMICAS E QUAISQUER OUTRAS CONSEQÜÊNCIAS DECORRENTES DE QUALQUER
USO IRRESPONSÁVEL DE SENHAS NO SITE OU PELO USO POR TERCEIROS NÃO
AUTORIZADOS.
NO CASO IMPROVÁVEL DE UMA VIOLAÇÃO DE DADOS, VOCÊ SERÁ NOTIFICADO ASSIM
QUE RAZOAVELMENTE POSSÍVEL, DE ACORDO COM A LEI APLICÁVEL. ALÉM DISSO,
NÃO SOMOS RESPONSÁVEIS POR QUALQUER VIOLAÇÃO DE SEGURANÇA OU POR
QUAISQUER AÇÕES DE TERCEIROS QUE RECEBAM AS INFORMAÇÕES.
13. Eu posso ter acesso, revisar, atualizar, corrigir, bloquear ou excluir meus dados pessoais?
Sim, você poderá ter acesso, revisar, atualizar, bloquear, corrigir e excluir seu cadastro e dados pessoais, acessando
seu cadastro (MINHA CONTA).
DO TÉRMINO OU BLOQUEIO DO TRATAMENTO DOS DADOS PESSOAIS, NÓS
PODEREMOS CONSERVÁ-LOS OU COMPARTILHÁ-LOS COM TERCEIROS, SOMENTE
QUANDO TAIS PRÁTICAS SEJAM ADOTADAS PARA FINALIDADES HISTÓRICAS,
ESTATÍSTICAS OU DE PESQUISA CIENTÍFICA.

Página 9 de 10

14. Mudanças na Política de Privacidade
Reservamos no direito de modificar esta política de privacidade para adaptá-la à nova legislação ou jurisprudência,

bem como às práticas negociais, comerciais, sem necessidade de notificação prévia. Dessa forma, você deve revisá-
lo periodicamente para estar atualizado sobre nossas políticas e práticas atuais.

Caso as alterações afetem você, sua privacidade (por exemplo: caso haja a necessidade de processar os seus dados
para outros fins, quais não se encontram nesta Política de Privacidade), iremos notificar você sobre tais alterações
através da plataforma, com razoável antecipação de sua implementação. A utilização contínua de nossa plataforma
após a divulgação de eventuais mudanças, inclusões e/ou alterações, confirmará a aceitação destas pelo Usuário.
Atualizaremos a data da "Última revisão" na parte inferior desta Política de privacidade, caso seja realizada
alterações nesta Política de privacidade.
15. Disposições Gerais
A tolerância do eventual descumprimento de quaisquer das cláusulas e condições do presente instrumento não
constituirá novação das obrigações aqui estipuladas e tampouco impedirá ou inibirá a exigibilidade das mesmas a
qualquer tempo.
Caso alguma disposição desta Política de Privacidade e Proteção de Dados seja considerada ilegítima por
autoridade da localidade que o usuário acessa a plataforma, ou mantém vínculo, as demais condições permanecerão
em pleno vigor e efeito até segunda ordem.
Podemos alterar os critérios de utilização de sua plataforma ou da realização de atividades nela a qualquer
momento. Também, possui a faculdade de se recusar a conceder conta de acesso a qualquer pessoa ou entidade
que tiver descumprido previamente os Termos de Uso e Política de Privacidade e Proteção de Dados, que teve
sua conta de acesso suspensa, excluída ou banida por esta razão.
16. LEI APLICÁVEL E JURISDIÇÃO
A Política de Privacidade e Proteção de Dados, aqui descritos são interpretados segundo a legislação brasileira, no
idioma português, sendo eleito o Foro da Comarca de Pato Branco no Estado do Paraná, para dirimir qualquer
litígio, questão ou dúvida superveniente, com expressa renúncia de qualquer outro, por mais privilegiado que seja.
17. SUPORTE AO USUÁRIO, DÚVIDAS OU RECLAMAÇÕES

Página 10 de 10
Se você precisar de um suporte técnico, tiver dúvidas ou preocupações sobre como processamos seus dados
pessoais, ou se quiser exercer qualquer um dos seus direitos descritos nos termos de uso e política de privacidade,
fique à vontade para entrar em contato através e-mail: contato@eyhe.com.br.
Ao utilizar tais canais para denúncias e reclamações, o Usuário deverá descrever a situação detalhadamente, para
que possamos verificar quais as medidas cabíveis, observando sempre as garantias constitucionais, em especial a
ampla defesa e o contraditório, nos casos que necessários.
Ao se comunicar com os nossos representantes de atendimento ao cliente, você concorda em agir com respeito e
gentileza. Se considerarmos que o seu comportamento em relação a qualquer de nossos representantes de
atendimento ao cliente ou outros funcionários revele-se, em qualquer momento, ameaçador ou ofensivo,
reservamo-nos o direito de cancelar a sua conta imediatamente.
18. DECLARAÇÃO FINAL DO USUÁRIO – CONSENTIMENTO
O USUÁRIO DECLARA QUE FEZ A LEITURA COMPLETA E ATENTA DA PRESENTE
POLÍTICA DE PRIVACIDADE, ESTANDO PLENAMENTE CIENTE, CONFERINDO, ASSIM,
SUA LIVRE E EXPRESSA CONCORDÂNCIA COM OS TERMOS AQUI ESTIPULADOS, QUAIS
FORAM REALIZADAS COM A FINALIDADE DE DEMONSTRAR SEU COMPROMISSO COM A
PRIVACIDADE E A PROTEÇÃO DOS DADOS COLETADOS DENTRO DO ESCOPO DOS
SERVIÇOS E FUNCIONALIDADES DO PORTAL, DE ACORDO COM AS LEIS EM VIGOR.
EYHE INTERMEDIAÇÃO DE NEGOCIOS LTDA, pessoa jurídica de direito privado, inscrita no CNPJ
sob o no. 30.847.484/0001-70, com sede na Rua Paraná, no 1670, Centro, na cidade de Pato Branco, Paraná, Brasil.</p>
</div>
            <p class="uk-text-right">
                  <button class="uk-button uk-button-default botao_roxo uk-modal-close" type="button">LIDO</button>
            </p>
        </div>
    </div>

    <div class="footer_inicial"></div>

        <script type="text/javascript">

			function showApresentacao() {
				document.getElementById("pergunta_nome").style.display="block";
				document.getElementById("ilustracao1").style.display="none";
				//document.getElementById("ilustracao2").style.display="none";
				document.getElementById("pergunta_idade").style.display="none";
			}

			function showIdade() {
				document.getElementById("pergunta_idade").style.display="block";
				document.getElementById("pergunta_nome").style.display="none";
				document.getElementById("ilustracao1").style.display="none";

			}

        </script>

        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="painel/vendor/sweetalert/dist/sweetalert.min.js"></script>
        <script type="text/javascript">
        jQuery(document).ready(function(){
            jQuery('#form-cadastro').submit(function(){

                //testando se as senhas são iguais!
                var senha1 = $('#senha').val();
                var senha2 = $('#senha_repeat').val();
                if ( senha1 != senha2) {
                   swal('Ops..', 'As senhas não são iguais. Tente novamente!', 'error');
                   $("#form-cadastro").trigger("reset");
                   return false;
                }


                var dados = jQuery( this ).serialize();
                jQuery.ajax({
                    type: "POST",
                    url: "painel/engine/recebe_novo_cadastro_heroi.php",
                    data: dados,
                    beforeSend: function() {
                        swal({
                            title: 'Aguarde..!',
                            text: 'Aguarde enquanto trabalhamos..',
                            imageUrl: 'images/avatar.jpg'
                          });
                    },
                    success: function(data)
                    {
                        if(data == 'Cadastro realizado com sucesso!'){
                            swal('Muito bem! Verifique seu e-mail', data, 'success');
                            setTimeout(function(){
                              jQuery.ajax({
                                type: "POST",
                                url: "scripts_g/PHP/login.php",
                                data: dados,
                                beforeSend: function() {

                                },
                                success: function(data)
                                {
                                  if(data == 'LOGADO'){
                                     window.location.href = "dashboard.php";
                                  }else{
                                    alert(data);

                                  }
                                },

                              });
                            }, 1500);
                        }else{
                            swal('Ops..', data, 'error');

                        }
                        //alert(data);
                    },

                });
                $("#form-cadastro").trigger("reset");
                return false;
                });
        });
      </script>


        <script type="text/javascript" src="scripts_g/js/index.js"></script>

    </body>
</html>
