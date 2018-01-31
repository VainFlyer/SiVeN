<?php
    session_start();

    if(isset($_SESSION['logado'])){
        if($_SESSION['logado']==1){
            header( "Location: ./interface/index.php");
            exit();
        }
    }

    $_SESSION["ativo"]=1;
    $_SESSION["logado"]=0;

    
?>
<!DOCTYPE html>
<html>
    <head>
        
        <title>SiVeN - Sistema de Verifica&ccedil;&atilde;o de Notas</title>
        
        <!--META TAGS-->
        <meta charset="UTF-8">
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
        <link href="./interface/imagens/logo.ico" rel="shortcut icon">

        <!--CSS-->
        <link rel="stylesheet" type="text/css" href="./interface/css/login.css">
        <!--<link rel="stylesheet" type="text/css" href="./interface/css/bootstrap.min.css">-->
        <link rel='stylesheet' type='text/css' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>

        <!--SCRIPTS JAVASCRIPT-->
        <!--<script type="text/javascript" src="./interface/js/jquery.min.js"></script>-->
        <script type='text/javascript' src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js'></script>

    </head>
    <body>
        <div class="container">
            <div class="card card-container">
                <img class="profile-img-card" id="logo" src="./interface/imagens/logo.png" />
                <h1 class="text-center" id="titulo" >SiVeN</h1>
                <h4 id="descricao" class="text-center">Sistema de Verifica&ccedil;&atilde;o de Notas</h4>
                <br>
                <script type="text/javascript">$("#descricao").hide();</script>
                <h3 class="text-center" id="carregando"><strong>Carregando <span id="tresPontos"></span></strong></h3>
                <script type="text/javascript">$("#carregando").hide();</script>
                <form class="form-signin" method="POST" action="./interface/index.php">
                    <span id="reauth-email" class="reauth-email sumir"></span>
                    <input type="text" id="inputEmail" class="form-control sumir" placeholder="matricula" name="matricula" autofocus>
                    <input type="password" id="inputPassword" class="form-control sumir" placeholder="senha" name="senha">
                    <button class="btn btn-lg btn-primary btn-block btn-signin sumir" type="submit" onclick="enviado()">Acessar</button>
                    
                    <a href="http://siga.jf.ifsudestemg.edu.br/index.php?module=common&amp;action=lostpass" class="forgot-password sumir">
                Esqueceu sua senha?
                </a>

               </form>
               
                
            </div>
            
        </div>
        
    </body>

		<!--SCRIPTS JAVASCRIPT-->
        <!--<script type="text/javascript" src="./interface/js/jQueryRotateCompressed.js"></script>-->
        <script type="text/javascript" src="http://beneposto.pl/jqueryrotate/js/jQueryRotateCompressed.js"></script>
        <script type="text/javascript" src="./interface/js/animacaoLogin.js"></script>
</html>