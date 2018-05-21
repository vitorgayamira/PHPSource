<?



$navegando=$_GET['navegando'];
$continuarmesmatela=$_POST['continuarmesmatela'];

if ($navegando=="sim"){
$banco=$_GET['banco'];
$baseoracle=$_GET['baseoracle'];
$usuario=$_GET['usuario'];


}
if ($continuarmesmatela=="sim"){

$banco=$_POST['banco'];
$usuario=$_POST['usuario'];
}



require("configuraoracle.php");
require("estilo2.css");

require("configuramysql.php");



?>





</head>

<form action="conexao_baixaordem.php" method="POST" NAME="message">










<?
$navegando=$_GET['navegando'];
$continuarmesmatela=$_POST['continuarmesmatela'];

if ($navegando=="sim"){
$codigousuario=$_GET['codigousuario'];
$codigoempresa=$_GET['codigoempresa'];
$escolha=$_GET['escolha'];
$tela=$_GET['tela'];
$mes=$_GET['mes'];
$ano=$_GET['ano'];
$ano=$_GET['ano'];
$banco=$_GET['banco'];
$pagina=$_GET['pagina'];
$mes1=$_GET['mes1'];
$tipoconsulta=$_GET['tipoconsulta'];
$usuario=$_GET['usuario'];


}
if ($continuarmesmatela=="sim"){
$codigousuario=$_POST['codigousuario'];
$codigoempresa=$_POST['codigoempresa'];
$escolha=$_POST['escolha'];
$tela=$_POST['tela'];
$mes=$_POST['mes'];
$ano=$_POST['ano'];
$curva=$_POST['curva'];
$pesomedio=$_POST['pesomedio'];
$turnopesquisa=$_POST['turnopesquisa'];
$turno=$_POST['turno'];

$tipo=$_POST['tipo'];
$novo=$_POST['novo'];
$pagina=$_POST['pagina'];
$dia1=$_POST['dia1'];
$dia2=$_POST['dia2'];
$quantidade=$_POST['quantidade'];
$semanainicio=$_POST['semanainicio'];
	$semanafinal=$_POST['semanafinal'];
    $turno=$_POST['turno'];
	$primeirasemana=$_POST['primeirasemana'];
	$segundasemana=$_POST['segundasemana'];
	$diainicial=$_POST['diainicial'];
		$diafinal=$_POST['diafinal'];
		$sequencia3=$_POST['sequencia3'];
        $simulacao=$_POST['simulacao'];

		$datagravarinicio=$_POST['datagravarinicio'];
			$datagravarfinal=$_POST['datagravarfinal'];
			$quantaslinhas=$_POST['quantaslinhas'];
            $quantosmercado=$_POST['quantosmercado'];
			$mes1=$_POST['mes1'];
			$mes2=$_POST['mes2'];
			$tipoconsulta=$_POST['tipoconsulta'];
			$quantaslinhas2=$_POST['quantaslinhas2'];
			$volumeano=$_POST['volumeano'];
			$quantidadedia=$_POST['quantidadedia'];
			$semanahoje=$_POST['semanahoje'];
			$tempo2=$_POST['tempo2'];
			$volume2=$_POST['volume2'];
			$destino=$_POST['destino'];
			$idade2=$_POST['idade2'];
			$semanaotimizacao=$_POST['semanaotimizacao'];
			$tempo3=$_POST['tempo3'];
                 $tempo4=$_POST['tempo4'];
                   $tempo5=$_POST['tempo5'];
                    $cabeca5=$_POST['cabeca5'];
                    $dataamostra=$_POST['dataamostra'];
                    $quantaslinhasamostra=$_POST['quantaslinhasamostra'];
                    $intervalo=$_POST['intervalo'];
                    $quantaslinhasfaixa=$_POST['quantaslinhasfaixa'];
                    $sexagem=$_POST['sexagem'];
                    $quantaslinhasvolume=$_POST['quantaslinhasvolume'];
                    $custototalsimulacao=$_POST['custototalsimulacao'];
                    $quantidadetotal5=$_POST['quantidadetotal5'];
                    $consumo5=$_POST['consumo5'];
                    $consumo6=$_POST['consumo6'];
                    $consumo7=$_POST['consumo7'];
                    $novoveiculo=$_POST['novoveiculo'];
                    $banco=$_POST['banco'];
                    $descricaoveiculo=$_POST['descricaoveiculo'];
                    $capacidade=$_POST['capacidade'];
                    $novoveiculo=$_POST['novoveiculo'];
                    $descricaoplaca=$_POST['descricaoplaca'];
                    $grupo8=$_POST['grupo8'];
                    $motoristapesquisa=$_POST['motoristapesquisa'];
                    $listaveiculo=$_POST['listaveiculo'];
                    $senhanova=$_POST['senhanova'];
                    $fabricapesquisa=$_POST['fabricapesquisa'];



}


require("baixamanutencao_versao2.php");

?>




</form>


