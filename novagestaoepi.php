<html>

<body>

<head>

<script language="javascript">


function Mascara_Hora2(Hora2){ 
var hora01 = ''; 
hora01 = hora01 + Hora2; 
if (hora01.length == 2){ 
hora01 = hora01 + ':'; 
document.forms[0].Hora2.value = hora01; 
} 
if (hora01.length == 5){ 
Verifica_Hora2(); 
} 
} 

function Mascara_Hora(Hora){ 
var hora01 = ''; 
hora01 = hora01 + Hora; 
if (hora01.length == 2){ 
hora01 = hora01 + ':'; 
document.forms[0].Hora.value = hora01; 
} 
if (hora01.length == 5){ 
Verifica_Hora(); 
} 
} 
           
function Verifica_Hora(){ 
hrs = (document.forms[0].Hora.value.substring(0,2)); 
min = (document.forms[0].Hora.value.substring(3,5)); 
               
estado = ""; 
if ((hrs < 00 ) || (hrs > 23) || ( min < 00) ||( min > 59)){ 
estado = "errada"; 
} 
               
if (document.forms[0].Hora.value == "") { 
estado = "errada"; 
} 

if (estado == "errada") { 
alert("Hora inválida!"); 
document.forms[0].Hora.focus(); 
} 
} 


function Verifica_Hora2(){ 
hrs = (document.forms[0].Hora.value.substring(0,2)); 
min = (document.forms[0].Hora.value.substring(3,5)); 
               
estado = ""; 
if ((hrs < 00 ) || (hrs > 23) || ( min < 00) ||( min > 59)){ 
estado = "errada"; 
} 
               
if (document.forms[0].Hora2.value == "") { 
estado = "errada"; 
} 

if (estado == "errada") { 
alert("Hora inválida!"); 
document.forms[0].Hora.focus(); 
} 
} 


function Certeza1()
{
   
   document.teste.submit();
}
 



function Certeza()
{
   
   
    if (document.forms[0].setor.value == "0") 
    {
      
	   alert("Deve Escolher um setor");
	   return ;
	   
	  
	}
	else
	{
	
	  if (document.forms[0].turno1.value == "0") 
      {
	   alert("Deve Escolher um Turno");
	   return ;
	  }
	  else
	  { 
	   
	   if (document.forms[0].data1.value == "0") 
       {
	   alert("Deve Escolher uma Data");
	   return ;
	   }
	   else
	   {  
		
		  if (document.forms[0].mes.value == "0") 
          {
	      alert("Deve Escolher um Mes");
	      return ;
	      }
	      else
	      {  
		  	  document.teste.submit();
		  }
		  
		  
       }
		  
		
      }
    
    }

}




</script>

<style  type="text/css">
#envolve { width: 1310px;}
 #div_1 { position: relative; width: 650px; height: 1200px; background-color: #CAE1FF; border:1;float: left; text-align: center; color: #E8E8E8;  }
 #div_2 { position: relative; width: 650px; height: 1200px; background-color: #CAE1FF; float: right; text-align: center; color: #E8E8E8;}
 #clear { clear:both; }




 body{
         width:100%;
	     height:100%;
         background: url(imagemfundotelamaximiza.jpg) no-repeat;

}



</style>

<script LANGUAGE="JavaScript">
function Botao1()
{
document.nome_formulario.action="novagestaoepi.php";
document.forms.nome_formulario.submit();
}
</script>
<script LANGUAGE="JavaScript">
function Botao2()
{
document.nome_formulario.action="gestaoepi.php";
document.forms.nome_formulario.submit();
}
</script>

<script>
function Oculta(cxa){
if (document.getElementById(cxa).style.display=='none'){
document.getElementById(cxa).style.display='block';
}else{
document.getElementById(cxa).style.display='none';
}
}
</script>

</head>


<?
require("configuraoracle.php");
require("estilo2.css");
?>



<form action="novagestaoepi.php"  name="nome_formulario"  method="POST" >


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
$solicitantepesquisa=$_GET['solicitantepesquisa'];
$fornecedor1=$_GET['fornecedor1'];
$year=$_GET['year'];


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
$data1=$_POST['data1'];
$dia2=$_POST['dia2'];
$quantidade=$_POST['quantidade'];
$semanainicio=$_POST['semanainicio'];
	$semanafinal=$_POST['semanafinal'];
    $turno=$_POST['turno'];
    $turno1=$_POST['turno1'];
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

			$mes2=$_POST['mes2'];
			$tipoconsulta=$_POST['tipoconsulta'];
			$quantaslinhasmp=$_POST['quantaslinhasmp'];
			$criterio=$_POST['criterio'];
			$banco=$_POST['banco'];
			$entrada=$_POST['entrada'];
			$motivo=$_POST['motivo'];
			$hora=$_POST['hora'];
            $hora2=$_POST['hora2'];
            $setor=$_POST['setor'];
            $horainteirainicio=$_POST['horainteirainicio'];
            $horainteirafinal=$_POST['horainteirafinal'];
            $usuariosolicitante=$_POST['usuariosolicitante'];
            $sequenciamotivo=$_POST['sequenciamotivo'];
            $criterioparada=$_POST['criterioparada'];
            $unidadenegocio=$_POST['unidadenegocio'];
            
            $item1=$_POST['item1'];
            $fornecedor1=$_POST['fornecedor1'];
            $mes1=$_POST['mes1'];
            $dia1=$_POST['dia1'];
            $ordem1=$_POST['ordem1'];
            $certificado=$_POST['certificado'];
            $classificacao=$_POST['classificacao'];
            $year=$_POST['year'];
            $tolerancia=$_POST['tolerancia'];
            $unidade=$_POST['unidade'];
            $valormaximodia=$_POST['valormaximodia'];
            $statusdevolucao=$_POST['statusdevolucao'];
            $statususoobri=$_POST['statususoobri'];








}


if (!IsSet($ano)){
$ano=date('Y');

}

if (!IsSet($mes)){
$mes=date('m');
}






if (!IsSet($escolha) or ($escolha=="1")){
?>
<center><font style='font-size: 34px;color: black;text-align:left;bold: Negrito' >Definindo Equipamentos de EPI</font></br></center>
<?
   


$today = date('d/m/y H:i:s');



 


?>
<center>
Solicitante:<?echo $solicitantepesquisa;?>







<table>

   <tr>
   <td>Ano Vencimento</td>
   <td><input type="TXT" SIZE="10" name="year" value="<?echo $year;?>" style="background-color:#8B8378;color: white;"></td>
   </tr>


   <tr>
   <td>Mes</td>
   <td>




   <select style="background-color:#8B8378;color: white;"  name="mes1" >
    <option value="<?echo $month;?>"><?echo $month;?></option>
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


	</select><a href="javascript:Oculta('primeiro');">Calendário</a>

   </td>
   </tr>

   <tr>
   <td>Dia</td>
   <td>


   <input type="TXT" SIZE="3" name="dia1" value="<?echo $dia;?>" style="background-color:#8B8378;color: white;">

   </td>
   </tr>

   <tr>
   <td>Tolerância(Dias)</td>
   <td><input type="TXT" SIZE="10" name="tolerancia" value="0" style="background-color:#8B8378;color: white;"></td>
   </tr>





   <tr>
   <td>Nr.Certificado</td>
   <td><input type="TXT" SIZE="10" name="certificado"  style="background-color:#8B8378;color: white;"></td>
   </tr>


   
   <tr>
  <td>Fornecedor</td>
  <td>
  <select    name="fornecedor1">
                     <option value="0"></option>

					 <?
                 $result2 = "SELECT COD_FORNECEDOR,EMPRESA FROM FORNECEDOR_SADEGE order by EMPRESA asc ";
				 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  print "<option value=\"{$row["COD_FORNECEDOR"]}\">{$row["EMPRESA"]}</option>";
                 }
                     ?>
					 </select>
   </td>
   </tr>

   
  <tr>
  <td>Ítem de Estoque</td>
  <td>
  <select    name="item1">

					 <option value=""></option>
					 <?
                     $result2 = "select  CD_MATERIAL,DS_MATERIAL FROM MAT_PECAS where
                     CD_MATERIAL IN (SELECT CD_MATERIAL FROM MAT_PECAS_FABRICA WHERE
                       cd_fabrica='$solicitantepesquisa')
                       order by DS_MATERIAL asc";
				     $result3 = @OCIParse($ora_conexao, $result2);
				     @OCIExecute($result3, OCI_DEFAULT);
				     while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				     {
                      print "<option value=\"{$row["CD_MATERIAL"]}\">{$row["DS_MATERIAL"]}</option>";
                     }
                     ?>
					 </select>
   </td>
   </tr>
   
   

   <tr>
  <td>Classificação de EPI</td>
  <td>
  <select    name="classificacao">

					 <option value=""></option>
					 <?
                     $result2 = "select  CD_CLASSIFICACAO,DS_CLASSIFICACAO FROM CLASSIFICACAO_EPI
                       order by DS_CLASSIFICACAO asc";
				     $result3 = @OCIParse($ora_conexao, $result2);
				     @OCIExecute($result3, OCI_DEFAULT);
				     while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				     {
                      print "<option value=\"{$row["CD_CLASSIFICACAO"]}\">{$row["DS_CLASSIFICACAO"]}</option>";
                     }
                     ?>
					 </select>
   </td>
   </tr>
   
   <tr>
   <td>Valor Máximo de Utilização(Dias)</td>
   <td>


   <input type="TXT" SIZE="3" name="valormaximodia" value="365" style="background-color:#8B8378;color: white;">

   </td>
   </tr>
   
   <tr>
   <td>Obrigatório Devolução</td>
   <td>
    <select style="background-color:#8B8378;color: white;"  name="statusdevolucao" >
    <option value="N">Não</option>
    <option value="S">Sim</option>
   	</select>

   </td>
   </tr>
   
   <tr>
   <td>Obrigatório Uso Diário pelo Mantenedor</td>
   <td>
    <select style="background-color:#8B8378;color: white;"  name="statususoobri" >
    <option value="S">Sim</option>
    <option value="N">Não</option>
   	</select>

   </td>
   </tr>

   

 </table>
 
 





 <input type="hidden" name="ano"  value="<?echo $ano;?>" >
  <input type="hidden" name="curva" size="5" value="<?echo $curva;?>" >
  <input type="hidden" name="simulacao" size="5" value="<?echo $sequencia3;?>" >


  <input type="hidden" name="escolha" value="atualizar5">
   <input type="hidden" name="pesomedio" value="<?echo $pesomedio;?>">
   <input type="hidden" name="datagravarinicio" value="<?echo $datagravarinicio;?>">
  <input type="hidden" name="datagravarfinal" value="<?echo $datagravarfinal;?>">

  <input type="hidden" name="quantaslinhasamostra" value="<?echo $quantaslinhasamostra;?>">
  <input type="hidden" name="quantaslinhas2" value="<?echo $quantaslinhas2;?>">
  <input type="hidden" name="quantosmercado" value="<?echo $quantosmercado;?>">
  <input type="hidden" name="primeirasemana" value="<?echo $primeirasemana;?>">
  <input type="hidden" name="segundasemana" value="<?echo $segundasemana;?>">


        <input type="hidden" name="banco" value="<?echo $banco;?>">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">
		<input type="hidden" name="pagina" value="<?echo $pagina;?>">
		<input type="hidden" name="solicitantepesquisa" value="<?echo $solicitantepesquisa;?>">



 <input type="hidden" name="entrada" size="5" value="<?echo "GRAVA1";?>" ></br>

<input  type="submit" VALUE="Gravar">





<?
}
?>








<center></br>

<?
if ($escolha=="atualizar5") {

if ($solicitantepesquisa >"0"){

    if ($item1==null){
      echo "Defina um Item de Estoque válido..</br>";
    }
    else
    {

       if ($fornecedor1>"0"){


         if ($certificado==null){
          echo "Defina um Certificado válido..</br>";

         }
         else
         {

            IF ($classificacao >"0")
            {

               if ($dia1>"0" and $mes1>"0" and $year>"0"){
                 $diahoje=date('d-m-Y');
                 $dataabertura=$dia1."-".$mes1."-".$year;
                                  
                 $result2 = "select MAX(CD_EPI) MAXIMO FROM EPI";
                 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  $sequencia1=ociresult($result3, "MAXIMO") ;
                 }
                 IF ($sequencia1 >"0"){$maxima2=$sequencia1+1;}ELSE{$maxima2="1";}
                                  




                                  $result2achaitem = "select CD_UNIDADE,SALDO_ESTOQUE from mat_pecas where cd_material='$item1'";
                                  $result3achaitem = @OCIParse($ora_conexao, $result2achaitem);
				                  @OCIExecute($result3achaitem, OCI_DEFAULT);
				                  while (OCIFetchInto($result3achaitem,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				                  {
                                    $unidadegrava=ociresult($result3achaitem, "CD_UNIDADE") ;
                                    $saldograva=ociresult($result3achaitem, "SALDO_ESTOQUE") ;
                                  }


                                  $sgrava1= OCIParse($ora_conexao, "INSERT INTO
                                  EPI(
                                  CD_EPI,
                                  CD_FORNECEDOR,
                                  CD_ITEM,
                                  CD_FABRICA,
                                  NR_CERTIFICADO,
                                  CD_CLASSIFICACAO,
                                  QT_DISPONIVEL,
                                  DT_VENCIMENTO,
                                  VL_TOLERANCIA_USO,
                                  CD_UNIDADE_ITEM,
                                  DT_LIBERACAO_USO,
                                  ID_STATUS,
                                  ID_STATUS_USO,
                                  VL_TEMPO_USO_DIA,
                                  ID_OBRIGATORIO_DEVOLUCAO,
                                  ID_OBRIGATORIO_USO
                                  )
                                  VALUES ('$maxima2','$fornecedor1','$item1','$solicitantepesquisa','$certificado','$classificacao',
                                  '$saldograva','$dataabertura','$tolerancia','$unidadegrava','$diahoje','VA','S',
                                  '$valormaximodia','$statusdevolucao','$statususoobri')");
                                  OCIExecute($sgrava1, OCI_DEFAULT);
                                  oci_commit($ora_conexao);



                                  echo "Gravado com Sucesso";

                 }
                 else
                 {
                  echo "Falta definir Data de Vencimento...";

                 }

             }
             ELSE
             {
             
              echo "Falta definir Classificação...";

             }



         }//FINAL DO CERTIFICADO


       }
       else
       {
          echo "Falta Definir Fornecedor";
       }//FINAL DO FORNCEDOR

    } //FINAL TESTE DO ITEM
    

}//fina de testar as entradas
else
{
 echo "Não existe Unidade de Negócio";

}

?>
        <input type="hidden" name="escolha" size="5" value="1" >
        <input type="hidden" name="continuarmesmatela" value="sim">
        <input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
  		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="banco" value="<?echo $banco;?>">
		<input type="hidden" name="ambiente" value="<?echo $ambiente;?>">
		<input type="hidden" name="localbanco" value="<?echo $localbanco;?>">
		<input type="hidden" name="solicitantepesquisa" value="<?echo $solicitantepesquisa;?>">
		

		
        <input type="SUBMIT" onclick="Botao1()" value="Retornar"></input>

        <input type="button" onclick="Botao2()" value="Consulta"></input>
        

<?
}//FINAL QUANDO grava



?>

<div style="display: none;" id="primeiro">

<hr>



<?
     if (isset($show_month)) {
        if ($show_month==">") {
          if($month==12) {
             $month=1;
             $year++;
             } else {
             $month++;
             }
             }
        if ($show_month=="<") {
          if($month==1) {
             $month=12;
             $year--;
             } else {
             $month--;
             }
             }
        }
        if (isset($day)) {
        if ($day<="9"&ereg("(^[1-9]{1})",$day)) {
          $day="0".$day;
          }
        }
        if (isset($month)) {
        if ($month<="9"&ereg("(^[1-9]{1})",$month)) {
          $month="0".$month;
          }
        }
        if (!isset($year)) {

               $year=date('Y');




		  //$year=date("Y",mktime());
          }
        if (!isset($month)) {
          $month=date("m",mktime());

		  }
        if (!isset($day)) {
          $day=date("d",mktime());
          }
        $thisday="$year-$month-$day";


        $day_name=array(Seg,Ter,Qua,Qui,Sex,Sáb,"<font color=\"#FF0000\">Dom</font>");
        $cp = "By";
        $month_abbr=array("",Janeiro,Fevereiro,Março,Abril,Maio,Junho,Julio,Agosto,Setembro,Outubro,Novembro,Dezembro);

        $y=date("Y");
           switch ($month) {
            case 1:  $month_name = Janeiro;	break;
            case 2:  $month_name = Fevereiro;	break;
            case 3:  $month_name = Março;	break;
            case 4:  $month_name = Abril;	break;
            case 5:  $month_name = Maio;	break;
            case 6:  $month_name = Junho;	break;
            case 7:  $month_name = Julho;	break;
            case 8:  $month_name = Agosto;	break;
            case 9:  $month_name = Setembro;break;
            case 10: $month_name = Outubro;	break;
            case 11: $month_name = Novembro;break;
            case 12: $month_name = Dezembro;break;
           }
           $cp .= " W";
        ?>

        <td>
        <table border="0" width="176" align="center" style="border-width:1px">
        <tr>
        <td  style="border-width:1px">
        <table width="175" border="0" cellspacing="1" cellpadding="0" align="center" bgcolor="silver">
        <tr bgcolor="#f5f5f5">
            <td colspan="7" align="left"><font size="2" face="verdana">


            <b><? echo "$month_name $year"; ?></b></font>
            <?$proximo=$year+1;$anterior=$year-1;?>

            <a href="novagestaoepi.php?navegando=sim&codigoempresa=<?ECHO $codigoempresa;?>
             &banco=<?ECHO $banco;?>&codigousuario=<?ECHO $codigousuario;?>&year=<?ECHO $proximo;?>&localbanco=<?ECHO $localbanco;?>&solicitantepesquisa=<?echo $solicitantepesquisa;?>">+</a>

             <a href="novagestaoepi.php?navegando=sim&codigoempresa=<?ECHO $codigoempresa;?>
             &banco=<?ECHO $banco;?>&codigousuario=<?ECHO $codigousuario;?>&year=<?ECHO $anterior;?>&localbanco=<?ECHO $localbanco;?>&solicitantepesquisa=<?echo $solicitantepesquisa;?>">-</a>


             </br>


             <a href="novagestaoepi.php?navegando=sim&codigoempresa=<?ECHO $codigoempresa;?>
             &banco=<?ECHO $banco;?>&codigousuario=<?ECHO $codigousuario;?>&sequencia=<?ECHO $simulacaopassa;?>&ano=<?ECHO $ano;?>
             &tipoconsulta=<?ECHO $tipoconsulta;?>&month=1&mudoumes=<?ECHO $mudoumes;?>&dataanterior=<?ECHO "$dataanterior";?>&mesanterior=<?ECHO $mesanterior;?>&localbanco=<?ECHO $localbanco;?>&veiculo=<?ECHO $veiculo;?>&veiculocodigoe=<?ECHO $veiculocodigoe;?>&solicitantepesquisa=<?echo $solicitantepesquisa;?>&year=<?echo $year;?>">Jan</a>
             <a href="novagestaoepi.php?navegando=sim&codigoempresa=<?ECHO $codigoempresa;?>
             &banco=<?ECHO $banco;?>&codigousuario=<?ECHO $codigousuario;?>&sequencia=<?ECHO $simulacaopassa;?>&ano=<?ECHO $ano;?>
             &tipoconsulta=<?ECHO $tipoconsulta;?>&month=2&mudoumes=<?ECHO $mudoumes;?>&dataanterior=<?ECHO "$dataanterior";?>&mesanterior=<?ECHO $mesanterior;?>&localbanco=<?ECHO $localbanco;?>&veiculo=<?ECHO $veiculo;?>&solicitantepesquisa=<?echo $solicitantepesquisa;?>&year=<?echo $year;?>">Fev</a>

             <a href="novagestaoepi.php?navegando=sim&codigoempresa=<?ECHO $codigoempresa;?>
             &banco=<?ECHO $banco;?>&codigousuario=<?ECHO $codigousuario;?>&sequencia=<?ECHO $simulacaopassa;?>&ano=<?ECHO $ano;?>
             &tipoconsulta=<?ECHO $tipoconsulta;?>&month=3&mudoumes=<?ECHO $mudoumes;?>&dataanterior=<?ECHO "$dataanterior";?>&mesanterior=<?ECHO $mesanterior;?>&localbanco=<?ECHO $localbanco;?>&veiculo=<?ECHO $veiculo;?>&solicitantepesquisa=<?echo $solicitantepesquisa;?>&year=<?echo $year;?>">Mar</a>

             <a href="novagestaoepi.php?navegando=sim&codigoempresa=<?ECHO $codigoempresa;?>
             &banco=<?ECHO $banco;?>&codigousuario=<?ECHO $codigousuario;?>&sequencia=<?ECHO $simulacaopassa;?>&ano=<?ECHO $ano;?>
             &tipoconsulta=<?ECHO $tipoconsulta;?>&month=4&mudoumes=<?ECHO $mudoumes;?>&dataanterior=<?ECHO "$dataanterior";?>&mesanterior=<?ECHO $mesanterior;?>&localbanco=<?ECHO $localbanco;?>&veiculo=<?ECHO $veiculo;?>&solicitantepesquisa=<?echo $solicitantepesquisa;?>&year=<?echo $year;?>">Abr</a>

             <a href="novagestaoepi.php?navegando=sim&codigoempresa=<?ECHO $codigoempresa;?>
             &banco=<?ECHO $banco;?>&codigousuario=<?ECHO $codigousuario;?>&sequencia=<?ECHO $simulacaopassa;?>&ano=<?ECHO $ano;?>
             &tipoconsulta=<?ECHO $tipoconsulta;?>&month=5&mudoumes=<?ECHO $mudoumes;?>&dataanterior=<?ECHO "$dataanterior";?>&mesanterior=<?ECHO $mesanterior;?>&localbanco=<?ECHO $localbanco;?>&veiculo=<?ECHO $veiculo;?>&solicitantepesquisa=<?echo $solicitantepesquisa;?>&year=<?echo $year;?>">Mai</a>

             <a href="novagestaoepi.php?navegando=sim&codigoempresa=<?ECHO $codigoempresa;?>
             &banco=<?ECHO $banco;?>&codigousuario=<?ECHO $codigousuario;?>&sequencia=<?ECHO $simulacaopassa;?>&ano=<?ECHO $ano;?>
             &tipoconsulta=<?ECHO $tipoconsulta;?>&month=6&mudoumes=<?ECHO $mudoumes;?>&dataanterior=<?ECHO "$dataanterior";?>&mesanterior=<?ECHO $mesanterior;?>&localbanco=<?ECHO $localbanco;?>&veiculo=<?ECHO $veiculo;?>&solicitantepesquisa=<?echo $solicitantepesquisa;?>&year=<?echo $year;?>">Jun</a>

             <a href="novagestaoepi.php?navegando=sim&codigoempresa=<?ECHO $codigoempresa;?>
             &banco=<?ECHO $banco;?>&codigousuario=<?ECHO $codigousuario;?>&sequencia=<?ECHO $simulacaopassa;?>&ano=<?ECHO $ano;?>
             &tipoconsulta=<?ECHO $tipoconsulta;?>&month=7&mudoumes=<?ECHO $mudoumes;?>&dataanterior=<?ECHO "$dataanterior";?>&mesanterior=<?ECHO $mesanterior;?>&localbanco=<?ECHO $localbanco;?>&veiculo=<?ECHO $veiculo;?>&solicitantepesquisa=<?echo $solicitantepesquisa;?>&year=<?echo $year;?>">Jul</a>


             <a href="novagestaoepi.php?navegando=sim&codigoempresa=<?ECHO $codigoempresa;?>
             &banco=<?ECHO $banco;?>&codigousuario=<?ECHO $codigousuario;?>&sequencia=<?ECHO $simulacaopassa;?>&ano=<?ECHO $ano;?>
             &tipoconsulta=<?ECHO $tipoconsulta;?>&month=8&mudoumes=<?ECHO $mudoumes;?>&dataanterior=<?ECHO "$dataanterior";?>&mesanterior=<?ECHO $mesanterior;?>&localbanco=<?ECHO $localbanco;?>&veiculo=<?ECHO $veiculo;?>&solicitantepesquisa=<?echo $solicitantepesquisa;?>&year=<?echo $year;?>">Ago</a>

             <a href="novagestaoepi.php?navegando=sim&codigoempresa=<?ECHO $codigoempresa;?>
             &banco=<?ECHO $banco;?>&codigousuario=<?ECHO $codigousuario;?>&sequencia=<?ECHO $simulacaopassa;?>&ano=<?ECHO $ano;?>
             &tipoconsulta=<?ECHO $tipoconsulta;?>&month=9&mudoumes=<?ECHO $mudoumes;?>&dataanterior=<?ECHO "$dataanterior";?>&mesanterior=<?ECHO $mesanterior;?>&localbanco=<?ECHO $localbanco;?>&veiculo=<?ECHO $veiculo;?>&solicitantepesquisa=<?echo $solicitantepesquisa;?>&year=<?echo $year;?>">Set</a>

              <a href="novagestaoepi.php?navegando=sim&codigoempresa=<?ECHO $codigoempresa;?>
             &banco=<?ECHO $banco;?>&codigousuario=<?ECHO $codigousuario;?>&sequencia=<?ECHO $simulacaopassa;?>&ano=<?ECHO $ano;?>
             &tipoconsulta=<?ECHO $tipoconsulta;?>&month=10&mudoumes=<?ECHO $mudoumes;?>&dataanterior=<?ECHO "$dataanterior";?>&mesanterior=<?ECHO $mesanterior;?>&localbanco=<?ECHO $localbanco;?>&veiculo=<?ECHO $veiculo;?>&solicitantepesquisa=<?echo $solicitantepesquisa;?>&year=<?echo $year;?>">Out</a>

             <a href="novagestaoepi.php?navegando=sim&codigoempresa=<?ECHO $codigoempresa;?>
             &banco=<?ECHO $banco;?>&codigousuario=<?ECHO $codigousuario;?>&sequencia=<?ECHO $simulacaopassa;?>&ano=<?ECHO $ano;?>
             &tipoconsulta=<?ECHO $tipoconsulta;?>&month=11&mudoumes=<?ECHO $mudoumes;?>&dataanterior=<?ECHO "$dataanterior";?>&mesanterior=<?ECHO $mesanterior;?>&localbanco=<?ECHO $localbanco;?>&veiculo=<?ECHO $veiculo;?>&solicitantepesquisa=<?echo $solicitantepesquisa;?>&year=<?echo $year;?>">Nov</a>

             <a href="novagestaoepi.php?navegando=sim&codigoempresa=<?ECHO $codigoempresa;?>
             &banco=<?ECHO $banco;?>&codigousuario=<?ECHO $codigousuario;?>&sequencia=<?ECHO $simulacaopassa;?>&ano=<?ECHO $ano;?>
             &tipoconsulta=<?ECHO $tipoconsulta;?>&month=12&mudoumes=<?ECHO $mudoumes;?>&dataanterior=<?ECHO "$dataanterior";?>&mesanterior=<?ECHO $mesanterior;?>&localbanco=<?ECHO $localbanco;?>&veiculo=<?ECHO $veiculo;?>&solicitantepesquisa=<?echo $solicitantepesquisa;?>&year=<?echo $year;?>">Dez</a>

            </td>
            </tr>
            <tr  align="center">
            <?
            $cp .= "ender";
            for ($i=0;$i<7;$i++) { ?>
            <td width="25" align="center" bgColor="ffffff"><? echo "$day_name[$i]"; ?></td>
                   <? } ?>
            </tr>
            <tr  align="center">
            <?
            $cp .= " F";
            if (date("w",mktime(0,0,0,$month,1,$year))==0) {
            $start=7;
            } else {
            $start=date ("w",mktime(0,0,0,$month,1,$year));
            }
            for($a=($start-2);$a>=0;$a--)
             {
              $d=date("t",mktime(0,0,0,$month,0,$year))-$a;
            ?>
            <td bgcolor="#ffffff" align="center"><font color="#ffffff"><?=$d?></font></td>
            <? }
            for($d=1;$d<=date("t",mktime(0,0,0,($month+1),0,$year));$d++)
                {
            if($month==date("m")&$year==date("Y")&$d==date("d")) {
              $bg="bgcolor=\"#B0E2FF\"";
        	} else {
              $bg="bgcolor=\"#F5DEB3\"";
              }
            ?>
           <?
           $evento = "$d";
           $month_name = str_replace('ç','c',$month_name);
           $evento.= "$month_name$year.php";
           ?>
           <?
           if (file_exists("eventos/$evento"))
           {
           ?>
           <td bgcolor="#00FF7F" align="center" onClick=javaScript:window.open('<? echo "eventos/$evento" ?>','','scrollbars=yes,width=700,height=350,top=100,left=80');history.go(9) style="cursor:hand"><?=$d?></a></td>
           <?
           }
           else
           {
           if ($contador=="2"){
           ?>
          <td <?=$bg?> align="center"><font color=#0000CD><?=$d?></a></td>
          <?
           }


           $programa="novagestaoepi.php";
           $numeroregistropagina="1";
           $programa2="?";
           $programa3="programapai=";
           $programa9="DIRAentradasistema.php";
           $programa10="&dia=";
           $programa11="&escolha=1";
           $programa12="&contador=";
           $programa13="&data1=";
           $programa14="&data2=";
           $programa15="&month=";
           $programa16="&year=";
           $programa17="&banco=";
           $programa18="&navegando=sim";
           $programa19="&codigousuario=";
           $programa20="&fabricapesquisa=";
           $programa21="&veiculo=";
           $programa22="&destino=";
           $programa23="&dataanterior=";
           $programa24="&mesanterior=";
           $programa25="&localbanco=";
           $programa26="&veiculo=";
           $programa27="&solicitantepesquisa=";
           $programa28="&fornecedor1=";





            $programa=$programa.$programa2.$programa3.$programa.$programa10.$d.$programa11.$programa12.$valorcontador.$programa13.$data1.$programa14.$data2.$programa15.$month.$programa16.$year.$programa17.$banco.$programa18.$programa19.$codigousuario.$programa20.$fabricapesquisa.$programa21.$veiculo.$programa22.$destino.$programa23.$dataanterior.$programa24.$mesanterior.$programa25.$localbanco.$programa26.$veiculo.$programa27.$solicitantepesquisa.$programa28.$fornecedor1;

           ?>
          <td <?=$bg?> align="center"><font color=#0000CD><a href="<?echo $programa;?>"><?=$d?></a></td>

          <?
          }


          if(date("w",mktime(0,0,0,$month,$d,$year))==0&date("t",mktime(0,0,0,($month+1),0,$year))>$d)
          {
          ?>
         </tr>
         <tr align="center">
          <?
          }
          }

          $cp .= "ernandes";
          $da=$d+1;
              if(date("w",mktime(0,0,0,$month+1,1,$year))<>1)
              {
                  $d=1;
                  while(date("w",mktime(0,0,0,($month+1),$d,$year))<>1)
                  {
                      ?>
                      <td bgcolor="#ffffff" align="center" title="<? echo $cp; ?>" ><font color="#ffffff"><?=$d?></font></td>
                      <?
                      $d++;
                  }
                }

              ?>
           </tr>
           </table>


</div>



</form>


</body>
</html>


