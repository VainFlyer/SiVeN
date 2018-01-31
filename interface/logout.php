<?php

session_start();

curl_init();

curl_setopt($conexao, CURLOPT_URL, 'http://siga.jf.ifsudestemg.edu.br/index.php?module=common&action=logout');
curl_setopt ($conexao, CURLOPT_COOKIEFILE, $_SESSION['cookie']);    
$resultadoSair=curl_exec($conexao);

curl_close($conexao);

session_destroy();

header("Location: ../index.php");

?>