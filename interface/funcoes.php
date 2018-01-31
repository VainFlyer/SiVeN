<?php

	function removeAcentos($string){
	    preg_replace(
	    	array(
	    		"/(á|à|ã|â|ä)/",
	    		"/(Á|À|Ã|Â|Ä)/",
	    		"/(é|è|ê|ë)/",
	    		"/(É|È|Ê|Ë)/",
	    		"/(í|ì|î|ï)/",
	    		"/(Í|Ì|Î|Ï)/",
	    		"/(ó|ò|õ|ô|ö)/",
	    		"/(Ó|Ò|Õ|Ô|Ö)/",
	    		"/(ú|ù|û|ü)/",
	    		"/(Ú|Ù|Û|Ü)/",
	    		"/(ñ)/",
	    		"/(Ñ)/",
	    		"/(ç)/",
	    		"/(Ç)/",
	 		),
	    	explode(" ",
	    		"a A e E i I o O u U n N c C"
	    	),
	    	$string
	    );

	    
    $string = preg_replace('/[^a-z0-9]/i', '', $string);
    str_replace(" ", "", $string); 
    
    return $string;
	}

	function verificaLogin($sessao, $matricula, $senha) {
		
	    
	    if ( ($sessao!=1) || (!isset($_POST['matricula']) && !isset($_POST['senha'])) || (empty($matricula) && empty($senha)) ){
	    	direcionaTelaLogin();
	    }

	}

	function direcionaTelaLogin() {
		header( "Location: ../index.php");
	    session_destroy();
	    exit();
	}

	function diferencaTempo($hora1, $hora2)
    {
       $hora1               =explode(":", $hora1);
       $hora2               =explode(":", $hora2);
       $acumulador1         =($hora1[0]*3600)+($hora1[1]*60);
       $acumulador2         =($hora2[0]*3600)+($hora2[1]*60);
       $resultado           =$acumulador2-$acumulador1;
       $hora_ponto          =floor($resultado/3600);
       $resultado           =$resultado-($hora_ponto*3600);
       $min_ponto           =floor($resultado/60);
       $tempo               =$hora_ponto . ":" . $min_ponto;
       $tempo               =explode(":", $tempo);
       $diferenca           =($tempo[0]*60)+$tempo[1];
       $quantidadeDeCreditos=(int) ($diferenca/50);
       return $quantidadeDeCreditos;
    }

?>

