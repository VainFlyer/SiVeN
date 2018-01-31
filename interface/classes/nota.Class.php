<?php
Class Nota {
    public $ano;
    public $semestre;
    public $disciplina;
    public $notaPrimeiroBimestre;
    public $faltasPrimeiroBimestre;
    public $notaSegundoBimestre;
    public $faltasSegundoBimestre;
    public $notaTerceiroBimestre;
    public $faltasTerceiroBimestre;
    public $notaQuartoBimestre;
    public $faltasQuartoBimestre;
    public $recuperacaoFinal;
    public $notaFinal;
    public $notaTotal;
    public $situacao;
    function __construct( $ano, $semestre, $disciplina, $notaPrimeiroBimestre, $faltasPrimeiroBimestre, $notaSegundoBimestre, $faltasSegundoBimestre, $notaTerceiroBimestre, $faltasTerceiroBimestre, $notaQuartoBimestre, $faltasQuartoBimestre, $recuperacaoFinal, $notaFinal ) {
        $this->ano = $ano;
        $this->semestre = $semestre;
        $this->disciplina = $disciplina;
        $this->notaPrimeiroBimestre = $notaPrimeiroBimestre;
        $this->faltasPrimeiroBimestre = $faltasPrimeiroBimestre;
        $this->notaSegundoBimestre = $notaSegundoBimestre;
        $this->faltasSegundoBimestre = $faltasSegundoBimestre;
        $this->notaTerceiroBimestre = $notaTerceiroBimestre;
        $this->faltasTerceiroBimestre = $faltasTerceiroBimestre;
        $this->notaQuartoBimestre = $notaQuartoBimestre;
        $this->faltasQuartoBimestre = $faltasQuartoBimestre;
        $this->recuperacaoFinal = $recuperacaoFinal;
        $this->notaFinal = $notaFinal;
    }
    function getNotaTotal() {
        if ( $this->recuperacaoFinal == "" ) {
            return ( $this->notaPrimeiroBimestre + $this->notaSegundoBimestre + $this->notaTerceiroBimestre + $this->notaQuartoBimestre );
        }else if( $this->recuperacaoFinal != "" ){
            return ( (($this->notaPrimeiroBimestre + $this->notaSegundoBimestre + $this->notaTerceiroBimestre + $this->notaQuartoBimestre)+$this->recuperacaoFinal)/2 );
        }
    }
    function getFaltasTotal() {
        return ( $this->faltasPrimeiroBimestre + $this->faltasSegundoBimestre + $this->faltasTerceiroBimestre + $this->faltasQuartoBimestre );
    }
    function mostrarNotaProvaFinal() {
        $notaTotal = $this->getNotaTotal();
        if ( $this->recuperacaoFinal == "" ) {
            if ( $notaTotal >= 60 ) {
               
            } else {
                if ( $this->notaPrimeiroBimestre != "" && $this->notaSegundoBimestre != "" && $this->notaTerceiroBimestre != "" && $this->notaQuartoBimestre != "" ) {
                    if ( $notaTotal > 30 ) {
                        return "<hr><h5 class='text-center'><strong>Ainda n&atilde;o h&aacute; nota da recupera&ccedil;&atilde;o Final</strong></h5>";
                    } else {
                        
                    }
                }
            }
        } else if ($this->recuperacaoFinal != "" ){
            return "<hr><h5 class='text-center'><strong>Recupera&ccedil;&atilde;o Final: ".$this->recuperacaoFinal."</strong></h5>";
        }
    }

    function getSituacao() {
        $notaTotal = $this->getNotaTotal();
        if ( $this->recuperacaoFinal == "" ) {
            if ( $notaTotal >= 60 ) {
                return "Aprovado";
            } else {
                if ( $this->notaPrimeiroBimestre != "" && $this->notaSegundoBimestre != "" && $this->notaTerceiroBimestre != "" && $this->notaQuartoBimestre != "" ) {
                    if ( $notaTotal >= 30 ) {
                        return "Aguarde a recupera&ccedil;&atilde;o final. Voc&ecirc; precisa de " . ( 50 - ( $notaTotal / 2 ) ) * 2 . "pontos nela";
                    } else {
                        return "Voc&ecirc; n&atilde;o atingiu 30 pontos, e por isso n&atilde;o pode fazer a recupera&ccedil;&atilde;o final.<br>Boa sorte ano que vem e aproveite o SIGAA";
                    }
                } else {
                    return "Voc&ecirc; ainda precisa de " . ( 60 - $notaTotal ) . " pontos" /*." para n&atilde;o precisar de recupera&ccedil;&atilde;o final"*/ ;
                }
            }
        } else {
            $this->notaFinal = ( ( $notaTotal + $this->recuperacaoFinal ) / 2 );
            if ( $this->notaFinal > 50 ) {
                return "Aprovado";
            } else {
                return "Ent&atilde;o... N&atilde;o foi dessa vez.<br>Boa sorte ano que vem e aproveite o SIGAA";
            }
        }
    }
}
?>