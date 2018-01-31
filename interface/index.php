<?php
    header("Content-Type: text/html; charset=ISO-8859-1", true);

    include_once "./funcoes.php";
    
    if(isset($_COOKIE['PrimeiroAcessoVersao2-3'])){
        $exibirNovidades=false;
    }else{
    	$tempo=time() + (360 * 24 * 3600);
        setcookie("PrimeiroAcessoVersao2-3", "false", $tempo, "/SiVeN/");
        $exibirNovidades=true;
    }

    session_start();
    if($_SESSION['logado']==0){
    	verificaLogin($_SESSION['ativo'], $_POST['matricula'], $_POST['senha']);
    }

?>
<!DOCTYPE html>
<html>
    <!--
           SSSSSSSSSSSSSSS   iiii VVVVVVVV           VVVVVVVV                                  
         SS:::::::::::::::S i::::iV::::::V           V::::::V                                  
        S:::::SSSSSS::::::S  iiii V::::::V           V::::::V                                  
        S:::::S     SSSSSSS       V::::::V           V::::::V                                  
        S:::::S            iiiiiii V:::::V           V:::::V eeeeeeeeeeee    nnnn  nnnnnnnn    
        S:::::S            i:::::i  V:::::V         V:::::Vee::::::::::::ee  n:::nn::::::::nn  
         S::::SSSS          i::::i   V:::::V       V:::::Ve::::::eeeee:::::een::::::::::::::nn 
          SS::::::SSSSS     i::::i    V:::::V     V:::::Ve::::::e     e:::::enn:::::::::::::::n
            SSS::::::::SS   i::::i     V:::::V   V:::::V e:::::::eeeee::::::e  n:::::nnnn:::::n
               SSSSSS::::S  i::::i      V:::::V V:::::V  e:::::::::::::::::e   n::::n    n::::n
                    S:::::S i::::i       V:::::V:::::V   e::::::eeeeeeeeeee    n::::n    n::::n
                    S:::::S i::::i        V:::::::::V    e:::::::e             n::::n    n::::n
        SSSSSSS     S:::::Si::::::i        V:::::::V     e::::::::e            n::::n    n::::n
        S::::::SSSSSS:::::Si::::::i         V:::::V       e::::::::eeeeeeee    n::::n    n::::n
        S:::::::::::::::SS i::::::i          V:::V         ee:::::::::::::e    n::::n    n::::n
         SSSSSSSSSSSSSSS   iiiiiiii           VVV            eeeeeeeeeeeeee    nnnnnn    nnnnnn
        -->
    <head>
        <title>SiVeN - Sistema de Verifica&ccedil;&atilde;o de Notas</title>
        
        <!--META TAGS-->
        <meta charset="ISO-8859-1">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Sistema pra verificar as notas do SIGA do IF Sudeste MG - Campus Juiz de Fora">
        <meta name="author" content="Pedro Henrique Ferreira da Costa Damião">
        <meta property="og:title" content="SiVeN - Sistema de Verificação de Notas"/>
        <meta property="og:description" content="Sistema pra verificar as notas do SIGA do IF Sudeste MG - Campus Juiz de Fora"/>
        <meta property="og:url" content="http://pedrocosta.esy.es/SiVeN"/>
        <meta property="og:image" content="http://pedrocosta.esy.es/SiVeN/interface/imagens/logod.jpg"/>
        <meta property="og:image:type" content="image/jpeg">
        <meta property="og:image:width" content="600" />
        <meta property="og:image:height" content="400" />
        <meta property="og:image:alt" content="Logo do SiVeN" />
        <meta property="og:type" content="website" />
        <meta property="og:site_name" content="SiVeN - Sistema de Verificação de Notas"/>

        <!--ICONE-->
        <link href="./interface/logo.ico" rel="shortcut icon">
        
        <!--CSS-->
        <link rel="stylesheet" type="text/css" href="./css/interface.css">
        <link rel="stylesheet" type="text/css" href="./css/material-dashboard.css"/>
        <!--<link rel="stylesheet" type="text/css" href="./css/font-awesome.min.css" >-->
        <link rel="stylesheet" type="text/css" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">
        <!--<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">-->
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="./css/circle.css">

        <!--SCRIPTS JAVASCRIPT-->
        <script type="text/javascript" src="./js/jquery.min.js"></script>
        <script type="text/javascript" src="./js/bootstrap.min.js"></script>
        <script type="text/javascript" src="./js/Chart.bundle.min.js"></script>
        <script type="text/javascript" src="./js/Chart.min.js"></script>
        
    </head>
    <body <?php if($exibirNovidades==true)echo "onLoad='exibirNovidades()'"; ?>>
        <nav id="menucabecalho" class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar">
                    </span>
                    <span class="icon-bar">
                    </span>
                    <span class="icon-bar">
                    </span>
                    </button>
                    <a class="navbar-brand slideanim text-responsive slow" href="#"><span id="logo_texto"> SiVeN</span></a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="#notas" id="menuNotas" class="slow">NOTAS</a>
                        </li>
                        <li>
                            <a href="#frequencia" id="menuFrequencia" class="slow">FREQU&Ecirc;NCIA</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <script type='text/javascript'>
            $("#menucabecalho").hide();
        </script> 

        <!-- HEADER -->
        <div class="jumbotron">
          <div class="container-fluid">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8 text-center">
                    <img  id="logo" src="./imagens/logo.png" style="width: auto; height: auto; max-width: 30%; max-height: 30%;">
                    <h1 id="titulo">
                        SiVeN
                    </h1>
                    <p id="tagline">
                        Sistema de Verifica&ccedil;&atilde;o de Notas
                    </p>
                    <br>
                    <br>
                </div>
                <div class="col-md-2"></div>
            </div>
            <div class="row" id="fixNav">
                <div class="col-md-1"></div>
                <div class="col-md-10 text-center" >
                    <div>
                        <a  href="#notas" class="btn btn-lg btn-default menuFixo slow" class="botaoMenu">Notas</a>
                        <a href="#frequencia" class="btn btn-lg btn-default menuFixo slow" class="botaoMenu">Frequ&ecirc;ncia</a>

                    </div>
                    <br>
                    <br>
                </div>
            </div>
          </div>
        </div>

<?php
    
    if($_SESSION['logado']==0){   
        $_SESSION['cookie'] = tempnam ("./cookies/", "CURLCOOKIE");
 
        //RECEBENDO DADOS DO ALUNO
        $_SESSION['matricula']=$matricula=$_POST['matricula'];
        $senha=$_POST['senha'];

        //REQUISITANDO UMA PÁGINA DO SIGA PARA OBTER DADOS VÁLIDOS PARA REALIZAR LOGIN
        $dom=new DOMDocument();
        $dom->loadHTMLFile('http://siga.jf.ifsudestemg.edu.br');
        foreach($dom->getElementsByTagName('input') as $tag) {
            $name =$tag->getAttribute('name');
            $value=$tag->getAttribute('value');
            if($name=="challenge") {
               $challenge=$value;
            }
        }
        foreach($dom->getElementsByTagName('form') as $tag) {
           $_SESSION['formSubmit']=$formSubmit=$tag->getAttribute('id');
        }
        
        //CODIFICANDO DADOS PARA ENVIO PARA O SERVIDOR DURANTE O LOGIN
        $response=md5($matricula . ':' . md5($senha) . ':' . $challenge);
    
	}
    
    //INICIANDO cURL
    $conexao=curl_init();
    curl_setopt($conexao, CURLOPT_POST, 1);
    curl_setopt($conexao, CURLOPT_ENCODING, 'gzip');
    curl_setopt($conexao, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($conexao, CURLOPT_COOKIEJAR, $_SESSION['cookie']);
    
     if($_SESSION['logado']==0){
        //REALIZANDO LOGIN NO SIGA
        $url='http://siga.jf.ifsudestemg.edu.br/index.php?module=common&amp;action=main';
        $_SESSION['action']=$action=$formSubmit . '_action';
        
        $postfields=array(
            'uid'=>"$matricula",
            'pwd'=>'',
            'btnLogin'=>'Entrar',
            'tries'=>'',
            'return_to'=>'',
            'challenge'=>"$challenge",
            'response'=>"$response",
            "$action"=>'http://siga.jf.ifsudestemg.edu.br/index.php?module=common&action=main',
            '__VIEWSTATE'=>'',
            '__ISPOSTBACK'=>'yes',
            '__EVENTTARGETVALUE'=>'btnLogin:click',
            '__EVENTARGUMENT'=>'',
            '__FORMSUBMIT'=>"$formSubmit"
        );
        curl_setopt($conexao, CURLOPT_URL, $url);
        curl_setopt($conexao, CURLOPT_POSTFIELDS, $postfields);
        $store=curl_exec($conexao);
        //RETORNA PARA A TELA DE LOGIN CASO O LOGIN NO SIGA FALHE
        if($store!=""){
            header("Location: ../index.php");
            exit();
        }

    }else{
        $formSubmit=$_SESSION['formSubmit'];
        $action=$_SESSION['action'];
    }
   	
    //REQUISINTANDO A PÁGINA DE NOTAS
    curl_setopt($conexao, CURLOPT_URL, 'http://siga.jf.ifsudestemg.edu.br/index.php?module=ensino&action=main:ctu:boletimalunoctu');
    curl_setopt ($conexao, CURLOPT_COOKIEFILE, $_SESSION['cookie']);
	$paginaDeNotas=curl_exec($conexao);
   

    if($_SESSION['logado']==0){
        //REQUISINTANDO A PÁGINA DE DADOS PARA OBTER O NOME DO ALUNO
        curl_setopt($conexao, CURLOPT_URL, 'http://siga.jf.ifsudestemg.edu.br/index.php?module=common&action=dadospessoais');
        $paginaDeDados=curl_exec($conexao);
        
        //REQUISINTANDO A PÁGINA DE CRÉDITOS PARA CALCULAR AS FALTAS NECESSÁRIAS PARA REPROVAÇÃO
        $urlPaginaDeCreditos="http://siga.jf.ifsudestemg.edu.br/index.php?module=ensino&action=main:ctu:relatoriomatricula";
        $postfields2=array(
            'ano'=>'2017',
            'semestre'=>'1',
            'btnPost'=>'Enviar',
            "$action"=>'http://siga.jf.ifsudestemg.edu.br/index.php?module=ensino&action=main:ctu:relatoriomatricula',
            '__VIEWSTATE'=>'',
            '__ISPOSTBACK'=>'yes',
            '__EVENTTARGETVALUE'=>'btnPost:click',
            '__EVENTARGUMENT'=>'',
            '__FORMSUBMIT'=>"$formSubmit"
        );
        curl_setopt($conexao, CURLOPT_URL, $urlPaginaDeCreditos);
        curl_setopt($conexao, CURLOPT_POSTFIELDS, $postfields2);
        $store=curl_exec($conexao);
        
        //RECEBENDO A PÁGINA DE CRÉDITOS
        curl_setopt($conexao, CURLOPT_URL, 'http://siga.jf.ifsudestemg.edu.br/index.php?module=ensino&action=main:ctu:relatoriomatricula');
        $paginaDeCreditos=curl_exec($conexao);
        
        

        //EXTRAINDO O NOME DO ALUNO DA PÁGINA DE DADOS
        preg_match_all("@<input  type=\"text\" id=\"txfPessoaNome\" class=\"m-text-field m-readonly\" name=\"txfPessoaNome\" value=\"(.*?)\" size=\"55\" readonly>@s", $paginaDeDados, $resultadoPaginaDeDados);
        $_SESSION['nome']=$nome=ucwords(strtolower($resultadoPaginaDeDados[1][0]));
    }

    curl_close($conexao);
    //EXTRAINDO AS NOTAS DA PÁGINA DE NOTAS
    preg_match_all("@<td.(.*?)>(.*?)<\/td>@s", $paginaDeNotas, $matches);
    $extraido=array();
    $notas   =array();
    foreach($matches[2] as $key=>$value) {
        $extraido[]=trim(strip_tags($value));
    }
    if(!isset($key)){
            header("Location: ../logout.php");
            exit();
        }
    for($contador=0; $contador<$key; $contador++) {
        $chave=array_search('&nbsp;', $extraido);
        unset($extraido[$chave]);
    }
    foreach($extraido as $value) {
        $notas[]=$value;
    }
    unset($extraido);
    end($notas);
    $ultimaPosicao=key($notas);
    $disciplinas  =array();
    
    //TRANSFORMANDO AS DISCIPLINAS E SEUS DADOS EM UM OBJETO
    include_once './classes/nota.Class.php';
    for($contador=0; $contador<=$ultimaPosicao; $contador++) {
        $ano=$notas[$contador];
        $contador++;
        $semestre=$notas[$contador];
        $contador++;
        $disciplina=$notas[$contador];
        $contador++;
        $notaPrimeiroBimestre=$notas[$contador];
        $contador++;
        $faltasPrimeiroBimestre=$notas[$contador];
        $contador++;
        $notaSegundoBimestre=$notas[$contador];
        $contador++;
        $faltasSegundoBimestre=$notas[$contador];
        $contador++;
        $notaTerceiroBimestre=$notas[$contador];
        $contador++;
        $faltasTerceiroBimestre=$notas[$contador];
        $contador++;
        $notaQuartoBimestre=$notas[$contador];
        $contador++;
        $faltasQuartoBimestre=$notas[$contador];
        $contador++;
        $recuperacaoFinal=$notas[$contador];
        $contador++;
        $notaFinal=$notas[$contador];
        $contador++;
        $situacao=$notas[$contador];
        $identificador=removeAcentos($disciplina);
        $$identificador=new Nota($ano, $semestre, $disciplina, $notaPrimeiroBimestre, $faltasPrimeiroBimestre, $notaSegundoBimestre, $faltasSegundoBimestre, $notaTerceiroBimestre, $faltasTerceiroBimestre, $notaQuartoBimestre, $faltasQuartoBimestre, $recuperacaoFinal, $notaFinal);
        $disciplinas[]=$identificador;
    }
    if($_SESSION['logado']==0){
        //EXTRAINDO A QUANTIDADE DE CRÉDITOS DA PÁGINA DE CRÉDITOS
        preg_match_all("@<span class=\"m-label\">(.*?)</span>@s", $paginaDeCreditos, $matches);
        $dados   =array();
        $horarios=array();
        foreach($matches[1] as $key=>$value) {
            $dados[]=trim($value);
        }
        for($i=0; $i<$key; $i++) {
            $i++;
            $i++;
            $i++;
            $horarios[]=chunk_split("$dados[$i]", 2, ':');
            $i++;
            $horarios[]=chunk_split("$dados[$i]", 2, ':');
            $i++;
        }
        end($horarios);
        $ultimaChave=key($horarios);
        $quantidadeDeCreditosTotal=0;
        for($i=0; $i<=$ultimaChave; $i+=2) {
            $quantidadeDeCreditosTotal+=diferencaTempo($horarios[$i], $horarios[$i+1]);
        }

        //CALCULANDO A QUANTIDADE MÁXIMA DE FALTAS PARA EVITAR REPROVAÇÃO
        $_SESSION['faltasMaximas']=$faltasMaximas=((($quantidadeDeCreditosTotal*40)/100)*25);
    }

    if($_SESSION['logado']==1){
        $nome=$_SESSION['nome'];
        $matricula=$_SESSION['matricula'];
        $faltasMaximas=$_SESSION['faltasMaximas'];
    }

    //SALVANDO DADOS DE ACESSOS NO LOG
    date_default_timezone_set('America/Sao_Paulo');
    $data = date("d-m-y");
    $hora = date("H:i:s");
    $ip = $_SERVER['REMOTE_ADDR'];
    $user = $_SERVER['HTTP_USER_AGENT'];
    $name = 'log.txt';
    if($_SESSION['logado']==0){
        $text = "[".$data."][".$hora."][".$user."][".$ip."]> ".$nome." (".$_POST['matricula'].") \r\n";
    }else if($_SESSION['logado']==1){
        $text = "[".$data."][".$hora."][".$user."][".$ip."]> ".$nome." (".$_POST['matricula'].") ((recarregado)) \r\n";
    }
    $file = fopen($name, 'a');
    fwrite($file, $text);
    fclose($file);
    
    if($_SESSION['logado']==0){
        $_SESSION['logado']=1;
    }

    

    ?>
    <div class='container tex-center' id="topo" >
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-11">
                    <h5>
                        <?php echo $nome.'  ('.$matricula.')';?> 
                    </h5>
                </div>
                <div class="col-lg-1 text-right">
                    <h5><a href="./logout.php" class="link">SAIR</a></h5>
                </div>
            </div>
        </div>
    </div>
    <BR><BR>
    <div class='container' id="notas">
        <br>
        <br>
        <h1 class="text-center tit" >NOTAS</h1>
        <br>
        <div class='container-fluid'>
            <?php
                $faltasTotal=0;
                $faltasTotaal=0;
                $i=0;
                foreach($disciplinas as $value) {
                 
                    if($$value->ano=='2017') {
                        $i+=1;
                        if($i==1  || $i%4==1){
                            echo "<div class='row'>";
                        }
                   
                        echo "
                              
                            <div class='col-lg-3'>
                                <div class='card' style='margin-top:10%;'>
                                    <div class='card-header' style='margin-top:-5%;' data-background-color='green'>
                                        <h4 class='title text-center'>
                                           ".$$value->disciplina."
                                            </h4>
                                    </div>
                                    <div class='card-content table-responsive'>
                                        <table class='table table-hover'>
                                            <thead class='text-danger text-center'>
                                                <th class='text-center' style='color:#33543A'>
                                                    Bimestre
                                                </th>
                                                <th class='text-center' style='color:#33543A'>
                                                    Nota
                                                </th>
                                                <th class='text-center' style='color:#33543A'>
                                                    Faltas
                                                </th>
                                            </thead>
                                            <tbody class='text-center'>
                                                <tr>
                                                    <td>
                                                        1
                                                    </td>
                                                    <td>
                                                        ".$$value->notaPrimeiroBimestre."
                                                    </td>
                                                    <td>
                                                        ".$$value->faltasPrimeiroBimestre."
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        2
                                                    </td>
                                                    <td>
                                                        ".$$value->notaSegundoBimestre."
                                                    </td>
                                                    <td>
                                                        ".$$value->faltasSegundoBimestre."   
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        3
                                                    </td>
                                                    <td>
                                                        ".$$value->notaTerceiroBimestre."
                                                    </td>
                                                    <td>
                                                        ".$$value->faltasTerceiroBimestre."
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        4
                                                    </td>
                                                    <td>
                                                        ".$$value->notaQuartoBimestre."
                                                    </td>
                                                    <td>
                                                        ".$$value->faltasQuartoBimestre."
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        ". $$value->mostrarNotaProvaFinal()."
                                        <hr>
                                        <h4 class='text-center'><strong>Nota Total: ".$$value->getNotaTotal()."</strong></h4>
                                        <h4 class='text-center'><strong>Total de Faltas: ".$$value->getFaltasTotal()."</strong></h4>
                                        <hr>
                                        <h5 class='text-center'><strong>".$$value->getSituacao()."</strong></h5>
                                        <hr>
                                    </div>
                                    <div class='card-header' data-background-color='green' style='margin-bottom:-5%;'  background-color:#70B77E;' >
                                           
                                        <canvas id='".$value."' width='400' height='200'></canvas>
                                        <script>
                                            Chart.defaults.global.defaultFontColor = 'white';
                                            var ctx = document.getElementById('".$value."').getContext('2d');
                                            var ".$value." = new Chart(ctx, {
                                                type: 'line',
                                                data: {
                                                    labels: ['Primeiro', 'Segundo', 'Terceiro', 'Quarto'],
                                                    datasets: [{
                                                        data: [
                                                            ".$$value->notaPrimeiroBimestre.",
                                                            ".$$value->notaSegundoBimestre.",
                                                            ".$$value->notaTerceiroBimestre.",
                                                            ".$$value->notaQuartoBimestre."],
                                                        color:'#fff',
                                                        backgroundColor: [
                                                            'rgba(255, 255, 255, 0.2)',
                                                        ],
                                                        borderColor: [
                                                            'rgba(255,255,255,1)'
                                                        ],
                                                        borderWidth: 1
                                                    }]  
                                                },
                                                options: {
                                                    legend: {
                                                        display: false
                                                    },
                                                    animation: {
                                                        easing:'linear'
                                                    },
                                                    scales: {
                                                        yAxes: [{
                                                            ticks: {
                                                                beginAtZero: true,
                                                                max: 25,    
                                                                stepValue: 5,
                                                                steps: 5
                                                            }
                                                        }]
                                                    }
                                                }
                                            });
                                        </script>
                                    </div>
                                </div>
                            </div>
                            
                            
                        ";   
                        $faltasTotal+=$$value->getFaltasTotal();
                               
                        if($i%4==0){
                            echo "</div>";
                        }
                    }
                }
                echo "</div>";
            ?> 
        </div>
    </div>
    <br><br>
    <div class='container' id="frequencia">
        <BR>
        <h1 class="text-center tit" >FREQU&Ecirc;NCIA</h1>
        <br>
        <div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Cuidado!</strong> Alguns professores n&atilde;o lan&ccedil;aram a frequ&ecirc;ncia.
        </div>

        <div class='row text-center'>
            <div class='col-sm-7'>
                <br>
                <br>
                <h3>Quantidade de faltas at&eacute; o momento: <?php echo $faltasTotal; ?></h3>
                <br>
                <h3>Quantidade de faltas que gera repet&ecirc;ncia: <?php echo $faltasMaximas; ?></h3>
                <br>
            </div>
            <div class='col-sm-1'>
            </div>
            <div class='col-sm-3'>
                <?php  
                    (int) $porcentagemDeFaltas=($faltasTotal/$faltasMaximas)*100;
                    if($porcentagemDeFaltas>=0 && $porcentagemDeFaltas<=60){
                        $cor="green";
                    }elseif($porcentagemDeFaltas>60 && $porcentagemDeFaltas<=80){
                        $cor="yellow";
                    }elseif($porcentagemDeFaltas>80 && $porcentagemDeFaltas<=100){
                        $cor="red";
                    }elseif($porcentagemDeFaltas>100){
                        $cor="dark";
                    }
                    echo " <div class='c100 p".round($porcentagemDeFaltas)." big ".$cor."' style='margin-left:auto; margin-right:auto; float:none;'>";
                    echo "<span>".round($porcentagemDeFaltas)."%</span>";
                ?>
                <div class="slice">
                    <div class="bar"></div>
                    <div class="fill"></div>
                </div>
            </div>
        </div>
        <div class='col-sm-1'>
        </div>
    </div>
</div>
    <br><br><br><br>
    <!-- FOOTER -->

    
    <footer class="footer-basic-centered">
        <p class="footer-company-motto">SiVeN - Sistema de Verifica&ccedil;&atilde;o de Notas</p>
        <p class="footer-links">
            <a href="#notas">NOTAS</a>
            &bull;
            <a href="#frequencia">FREQU&Ecirc;NCIA</a>
            &bull;
            <a  data-toggle="modal" data-target="#esclarecimentoModal">SOBRE</a>
        </p>
        <p class="footer-company-name">Pedro Henrique Ferreira - 3&ordm; Inform&aacute;tica 2017</p>
    </footer>

    
    <!-- Modal de Esclarecimento -->
    <div class="modal fade" id="esclarecimentoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLabel">Contato e Esclarecimento</h2>
                </div>
                <div class="modal-body">
                    <h3>Esclarecimento</h3>
                        Este site foi criado com o intuito de apresentar as notas do SIGA do IF Sudeste MG - Campus Juiz de Fora de maneira mais din&acirc;mica e visualmente agradavel.<br>
                        As informa&ccedil;&otilde;es aqui apresentadas n&atilde;o s&atilde;o armazenadas em nenhum servidor, estando somente no computador de acesso. Por isso, incetivo que, como medida de seguran&ccedil;a, voc&ecirc; acesse esta p&aacute;gina em modo an&ocirc;nimo, caso esteja em um computado p&uacute;blico, pois seus coleguinhas podem ser zueiros e postar suas notas por a&iacute;.<br><br>
                        O c&oacute;digo se encontra dispon&iacute;vel neste reposit&oacute;rio: <a href="https://github.com/pedrohcd/SiVeN">https://github.com/pedrohcd/SiVeN</a><br>
                        Por favor, utilize o c&oacute;digo com responsabilidade e n&atilde;o se esque&ccedil;a dos cr&eacute;ditos ao desenvolvedor (eu).
                        <hr>
                        <h3>Contato</h3>
                        Pedro Henrique Ferreira - 3&ordm; Inform&aacute;tica Integrado<br>
                        Email: pedrohfcd@hotmail.com<br>
                        Whatsapp: +55 (32) 9 8805-5367
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal de CHANGELOG -->
    <div class="modal fade" id="novidadesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLabel">Vers&otilde;es do Sistema</h2>
                </div>
                <div class="modal-body">
					<h4><a href="http://pedrocosta.esy.es/SiVeN1-0/" target="_blank">v1.0</a></h4>
					<p>&bull; Primeira vers&atilde;o est&aacute;vel do sistema</p>
					<h4><a href="http://pedrocosta.esy.es/SiVeN2-0/" target="_blank">v2.0</a></h4>
					<p>&bull; Grande Atualiza&ccedil;&atilde;o da interface</p>
					<p>&bull; Supress&atilde;o tempor&aacute;ria da exibi&ccedil;&atilde;o da nota da prova de recupera&ccedil;&atilde;o final</p>
					<h4><a href="http://pedrocosta.esy.es/SiVeN2-1/" target="_blank">v2.1</a></h4>
					<p>&bull; Inclus&atilde;o da exibi&ccedil;&atilde;o da nota da prova de recupera&ccedil;&atilde;o final</p>
					<p>&bull; Inclus&atilde;o da p&aacute;gina de carregamento da interface principal</p>
					<h4><a href="http://pedrocosta.esy.es/SiVeN2-2/" target="_blank">v2.2</a></h4>
					<p>&bull; Melhorias na perfomance</p>
					<h4>v2.3 (Vers&atilde;o Atual)</h4>
					<p>&bull; Agora &eacute; poss&iacute;vel atualizar a p&aacute;gina sem a necessidade se se autenticar novamente</p>

					<h3>Fun&ccedil;&otilde;es futuras</h3>
					<p>&bull; Inclus&atilde;o da fun&ccedil;&atilde;o de informar quando novas notas forem adicionadas desde a &uacute;ltima visita</p>
					<p>&bull; Sugest&otilde;es?<a  data-toggle="modal" data-target="#esclarecimentoModal">Entre em contato!</a></p>
                        
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
    <script type='text/javascript'>
        
        var offset = $('#fixNav').offset().top;
        var $fixNav = $('#fixNav');
        
        $(document).on('scroll', function () {
            if (offset <= $(window).scrollTop()) {
                $("#menucabecalho").fadeIn();
            } else {
                $("#menucabecalho").fadeOut();
            }
        });
         
        function exibirNovidades(){
     		$('#novidadesModal').modal('show');
		}

    </script>

    </body>
</html>

