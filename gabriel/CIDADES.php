<?
//session_start();
$cortopo="#828282";
$corfundo="#4682B4";

require("configuramysql.php");
require("estilo2.css");
require("estilonavegacaofundo.css");


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
$setorpesquisa=$_POST['setorpesquisa'];
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
			$cidade=$_POST['cidade'];
			$estado=$_POST['estado'];
			$banco=$_POST['banco'];



}

$ano=date('Y');
$mes=date('m');
?>






<body> 

<form name='teste' action='CIDADES.php'  method="POST">

<div id="mostratitulo">

<center><font style='font-size: 19px;color: white;text-align:left;bold: Negrito' >Cadastrando Cidades</font></center>


</div>
</br></br></br></br></br></br></br></br></br></br>


<center>

<?
//acha VARIACAO PADRAO
$usu18 = "SELECT CD_VARIACAO VARIACAO FROM VARIACAO_ANIMAL_BI WHERE CD_VARIACAO IN (SELECT CD_VARIACAO FROM USUARIO_BI where CD_USUARIO='$codigousuario')";
//echo "$usu18";
$res8 = mysql_db_query($banco,$usu18,$conexao);
$valor87=mysql_fetch_array($res8);
$variacao3=$valor87["VARIACAO"];

//acha VARIACAO PADRAO
$usu18 = "SELECT CD_EMPRESA FROM PARAMETRO_BI";
//echo "$usu18";
$res8 = mysql_db_query($banco,$usu18,$conexao);
$valor87=mysql_fetch_array($res8);
$codigoempresa=$valor87["CD_EMPRESA"];


if ($escolha=="gravando"){

$sql99 = "SELECT MAX(CD_CIDADE)+1 MAXIMA FROM CIDADE_BI";
$res = mysql_db_query($banco,$sql99,$conexao);
$valor8=mysql_fetch_array($res);
$maxima=$valor8["MAXIMA"];


                       $grava1 = "INSERT INTO CIDADE_BI (CD_CIDADE,DS_CIDADE,CD_ESTADO) VALUES ('$maxima','$cidade','$estado')";
	                   //echo "$grava1";
	                   $res = mysql_db_query($banco,$grava1,$conexao);
}

if (!IsSet($escolha) or ($escolha=="gravando" ) or  ($escolha=="1" )){


?>



<table>
 <tr>
 <td>
 Nome
 </td>
 <td>
 <input type='text' size=48 name='cidade' >
 </td>
 </tr>
 <tr>
 <td>
 Estado
 </td>
 <td>
 <select   style='font-size: 10px;color: blue;text-align:right;bold: Negrito'  name="estado">
					<option value="">Nenhuma</option>

					<?
					 $stmt1 = "SELECT CD_ESTADO,DS_ESTADO from ESTADO_BI";
					 $res = mysql_db_query($banco,$stmt1,$conexao);
                     while ($stmt12=mysql_fetch_array($res)){
					 print "<option value=\"{$stmt12["CD_ESTADO"]}\">{$stmt12["DS_ESTADO"]}</option>";
					 }
					 ?>
					 </select>

  </td>
  </tr>



    </table>
<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="banco" value="<?echo $banco;?>">
		<input type="hidden" name="mes" value="<?echo $mes;?>">
		<input type="hidden" name="ano" value="<?echo $ano;?>">
		<input type="hidden" name="dia" value="<?echo $dia;?>">
		<input type="hidden" name="escolha" value="gravando">


<input  type="submit"     VALUE="Confirma">

  
 

<?}?>


</form> 
</body>

</html> 
</div>
