<?
$cortopo="#000080";
$corfundo="#F0FFFF";


?>

<center><div class="noticia">

<head>
<script language="javascript">
function Certeza()
{
 if (!confirm ("Você Tem Certeza" ))
 {
    	return false;
    
 }
 else
 {
   
	return true;
    document.teste.submit();

 }
}




function Mascara_Hora2(Hora2){ 
var hora01 = ''; 
hora01 = hora01 + Hora2; 
if (hora01.length == 2){ 
hora01 = hora01 + ':'; 
document.forms[0].hora.value = hora01; 
} 
if (hora01.length == 5){ 
Verifica_Hora2(); 
} 
} 


function Verifica_Hora2(){ 
hrs = (document.forms[0].hora.value.substring(0,2)); 
min = (document.forms[0].hora.value.substring(3,5)); 
               
estado = ""; 
if ((hrs < 00 ) || (hrs > 23) || ( min < 00) ||( min > 59)){ 
estado = "errada"; 
} 
               
if (document.forms[0].Hora2.value == "") { 
estado = "errada"; 
} 

if (estado == "errada") { 
alert("Hora inválida!"); 
document.forms[0].hora.focus(); 
} 
} 


</script>

</head>

<form name='teste' action='PESSOAJURIDICA2.php'  method="POST">

<div id="mostratitulo">

<font style='font-size: 21px;color: white;text-align:left;bold: Negrito' >Cadastrando Pessoa Jurídica</font></br>
</br></br>
</div>
</br></br></br></br></br></br></br></br></br></br>


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
$banco=$_GET['banco'];
$CNPJ=$_GET['CNPJ'];
$turno=$_GET['turno'];

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
            $CNPJ=$_POST['CNPJ'];
			$banco=$_POST['banco'];
			$kgrecebido=$_POST['kgrecebido'];
				$nova1=$_POST['nova1'];
				$hora=$_POST['hora'];
				$ano=$_POST['ano'];
				$data1=$_POST['data1'];
				$vlfiscal=$_POST['vlfiscal'];
				$cidade=$_POST['cidade'];
				$classificacao=$_POST['classificacao'];
				$razao=$_POST['razao'];
				$logradouro=$_POST['logradouro'];
				$bairro=$_POST['bairro'];
				$cep=$_POST['cep'];
				$email=$_POST['email'];
                 $razao=$_POST['razao'];
                 $cidade=$_POST['cidade'];
                 $ambiente=$_POST['ambiente'];
                 $localbanco=$_POST['localbanco'];
                 $codigoerp=$_POST['codigoerp'];



}

require("configuramysql.php");
require("estilo2.css");
require("estilonavegacaofundo.css");



//acha VARIACAO PADRAO
$usu18 = "SELECT CD_VARIACAO VARIACAO FROM variacao_animal_bi WHERE CD_VARIACAO IN (SELECT CD_VARIACAO FROM
usuario_bi where CD_USUARIO='$codigousuario')";

$res8 = mysql_db_query($banco,$usu18,$conexao);
$valor87=mysql_fetch_array($res8);
$variacao3=$valor87["VARIACAO"];

//acha VARIACAO PADRAO
$usu18 = "SELECT CD_EMPRESA FROM parametro_bi";
//echo "$usu18";
$res8 = mysql_db_query($banco,$usu18,$conexao);
$valor87=mysql_fetch_array($res8);
$codigoempresa=$valor87["CD_EMPRESA"];




if (!IsSet($escolha)){ 

$sql = "select count(*) CONTADOR from pessoa_bi  where NR_CNPJ='$CNPJ'";
$res = mysql_db_query($banco,$sql,$conexao);
$valor7=mysql_fetch_array($res);
//$valor2=$valor7["CONTADOR"];
$valor2="0";

   IF ($valor2=="0"){
   ?>
 <table>


 <tr>
 <td>
  Cidade</td>
  <td>
 <select    name="cidade" style='font-size: 10px;color: blue;text-align:right;bold: Negrito'>
					<option value=""></option>

					<?
					 $stmt1 = "SELECT CD_CIDADE CODIGO,DS_CIDADE DESCRICAO from cidade_bi ";
					 $res98 = mysql_db_query($banco,$stmt1,$conexao);

                     while ($res9=mysql_fetch_array($res98)){


					 print "<option value=\"{$res9["CODIGO"]}\">{$res9["DESCRICAO"]}</option>";

					 }
					 ?>



					 </select>

 </td>

 </tr>


 <tr>
 <td>
 Classificação Jurídica
 </td>
 <td>
 <select name="classificacao">
                 <option value="99">Sem Classificacao</option>
                 <option value="FO">Fornecedor Materias</option>
                 <option value="FS">Fornecedor Serviço</option>
                 <option value="FI">Filial</option>
                 <option value="FR">Filial Frigorifico</option>
				 <option value="IT">Integrado</option>
				 <option value="RA">Filial Fábrica de Ração</option>
				 <option value="IN">Filial Incubátorio</option>


                 </select>
 </td>
 </tr>
 
 <tr>
 <td>
 Código Correspondente no ERP
 </td>
 <td>
 <input  style="background-color:#8B8378;color: white;" type="txt" name="codigoerp"
     size="25" >
  </td>
 </tr>
 

 </table>


    <input type="hidden" name="escolha" value="grava">
    <input type="hidden" name="CNPJ" value="<?echo $CNPJ;?>">
    <input type="hidden" name="turno" value="<?echo $turno;?>">
    <input type="hidden" name="banco" value="<?echo $banco;?>">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">
		
		<input type="hidden" name="logradouro" value="<?echo $logradouro;?>">
		<input type="hidden" name="cep" value="<?echo $cep;?>">
		<input type="hidden" name="bairro" value="<?echo $bairro;?>">
        <input type="hidden" name="email" value="<?echo $email;?>">
        <input type="hidden" name="razao" value="<?echo $razao;?>">
        <input type="hidden" name="ambiente" value="<?echo $ambiente;?>">
        <input type="hidden" name="localbanco" value="<?echo $localbanco;?>">



    <input  type="submit"     VALUE="Gravar">
    <?
    }
    else
	{
    ?><center><?echo "Empresa ja cadastrada na Base</br>";
 	}

}


if ($escolha=="grava"){

if ($classificacao=="99"){
echo "Defina uma classificação";

}
else
{


if ($classificacao=="FO"){
$filial="N";
$fabricaracao="N";
$frigorifico="N";
$fornecedor="S";
$incubatorio="N";
$integrado="N";
}

if ($classificacao=="FS"){
$filial="N";
$fabricaracao="N";
$frigorifico="N";
$fornecedor="N";
$fornecedorservivo="S";
$incubatorio="N";
$integrado="N";
}

if ($classificacao=="FR"){
$filial="S";
$fabricaracao="N";
$frigorifico="S";
$fornecedor="N";
$incubatorio="N";
$integrado="N";
}

if ($classificacao=="FI"){
$filial="S";
$fabricaracao="N";
$frigorifico="N";
$fornecedor="N";
$incubatorio="N";
$integrado="N";
}

if ($classificacao=="IT"){
$filial="N";
$fabricaracao="N";
$frigorifico="N";
$fornecedor="N";
$integrado="S";
$incubatorio="N";
}

if ($classificacao=="IN"){
$filial="S";
$fabricaracao="N";
$frigorifico="N";
$fornecedor="N";
$integrado="N";
$incubatorio="S";
}

if ($classificacao=="RA"){
$filial="S";
$fabricaracao="S";
$frigorifico="N";
$fornecedor="N";
$integrado="N";
$incubatorio="N";
}






$sql99 = "SELECT MAX(CODIGO)+1 MAXIMA FROM pessoa_bi";
$res = mysql_db_query($banco,$sql99,$conexao);
$valor8=mysql_fetch_array($res);
$MAXIMA=$valor8["MAXIMA"];


if (empty($razao)) // verifica se o campo nome esta em branco
{
echo "<script>
alert('Falta Razão');
</script>";
}
else
{



$grava = "INSERT INTO pessoa_bi(CODIGO,DESCRICAO,ID_TIPO_PESSOA,ID_MATRIZ,ID_FILIAL,ID_BASE,NR_CNPJ,
cd_cidade,id_integrado,id_fabrica_racao,id_frigorifico,id_fornecedor,id_incubatorio,NM_LOGRADOURO,NR_CEP,NM_BAIRRO,
DS_EMAIL,ID_FORNECEDOR_SERVICO,CD_UNIDANEGOCIO_ERP)
values ('$MAXIMA','$razao','2','N','$filial','N','$CNPJ','$cidade','$integrado','$fabricaracao','$frigorifico',
'$fornecedor','$incubatorio','$logradouro','$cep','$bairro','$email','$fornecedorservivo','$codigoerp')";


$res7 = mysql_db_query($banco,$grava,$conexao);

}



echo "Registo inserido com sucesso";

}


}//final quando grava


?>


</form>
