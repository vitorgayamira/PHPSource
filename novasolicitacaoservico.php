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
document.nome_formulario.action="novasolicitacaoservico.php";
document.forms.nome_formulario.submit();
}
</script>
<script LANGUAGE="JavaScript">
function Botao2()
{
document.nome_formulario.action="solicitacaoservicoterceiro.php";
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



<form action="novasolicitacaoservico.php"  name="nome_formulario"  method="POST" >


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
            
            $pedido1=$_POST['pedido1'];
            $fornecedor1=$_POST['fornecedor1'];
            $mes1=$_POST['mes1'];
            $dia1=$_POST['dia1'];
            $ordem1=$_POST['ordem1'];





}


if (!IsSet($ano)){
$ano=date('Y');

}

if (!IsSet($mes)){
$mes=date('m');
}






if (!IsSet($escolha) or ($escolha=="1")){
?>
<center><font style='font-size: 34px;color: black;text-align:left;bold: Negrito' >Abrindo Solicitação</font></br></center>
<?
   


$today = date('d/m/y H:i:s'); 


?>
<center>
Solicitante:<?echo $solicitantepesquisa;?>







<table>
   <tr>
   <td>Nr.Pedido</td>
   <td>
                 <?
                 $result2 = "select MAX(NR_PEDIDO) PEDIDO FROM SERV_TERC_PEDIDO";
                 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  $sequencia1P=ociresult($result3, "PEDIDO") ;
                 }
                 IF ($sequencia1P >"0"){$maxima2P=$sequencia1P+1;}ELSE{$maxima2P="1";}
                 ?>
   
   <input type="TXT" SIZE="10" name="pedido1" value="<?echo $maxima2P;?>" style="background-color:#8B8378;color: white;">

   </td>
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
  <td>Fornecedor</td>
  <td>
  <select    name="fornecedor1">
                     <option value="<?echo $fornecedor1;?>"><?echo $fornecedor1;?></option>

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
  <td>ordem Serviço Corretiva</td>
  <td>
  <select    name="ordem1">

					 <option value="">Sem ordem Associada</option>
					 <?
                     $result2 = "select  NUMERO,CD_COMPONENTE COMPONENTE,DATA_INICIO DATA FROM EMER_COMP
                       where STATUS='G'   and
                       cd_fabrica='$solicitantepesquisa'
                       order by DATA_INICIO DESC ";
				     $result3 = @OCIParse($ora_conexao, $result2);
				     @OCIExecute($result3, OCI_DEFAULT);
				     while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				     {
                      print "<option value=\"{$row["NUMERO"]}\">{$row["DATA"]}-Componente:{$row["COMPONENTE"]}-Numero Ordem:{$row["NUMERO"]}</option>";
                     }
                     ?>
					 </select>
   </td>
   </tr>

 </table>
 
 
 <center><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="600">

<tr>
  <th>Codigo</th>
  <th>Serviço</th>
  <th>Seleção</th>


</tr>


<?
 $s= OCIParse($ora_conexao, "SELECT CD_SERVICO,DS_SERVICO FROM SERVICO_GERAIS_SADEGE
 order by  DS_SERVICO asc
              ");


              OCIExecute($s, OCI_DEFAULT);
              While (OCIFetch($s)){



          $codigoS=ociresult($s, "CD_SERVICO") ;
          $descricaoS=ociresult($s, "DS_SERVICO") ;



   ?>
   <tr>
   <td><?echo $codigoS;?> </td>
   <td><?echo $descricaoS;?> </td>



   <td><input type="checkbox" name="lista[]" value="<?echo $codigoS;?>"></td>

   </tr>
 <?
 }
 ?>

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
    echo "Existe Solicitante</br>";
    if ($pedido1==null){
      echo "Não existe pedido</br>";
    }
    else
    {
     echo "Existe Pedido -";
       if ($fornecedor1>"0"){
         echo "Existe Fornecedor</br>";

         if ($mes1>"0" and $dia1>"0"){
          echo "Existem Datas</br>";

                                  $diahoje=date('d-m-Y');
                                  $dataabertura=$dia1."-".$mes1."-".$ano;
                                  
                 $result2 = "select MAX(NR_SEQUENCIA) REGIAO FROM SERV_TERC_PEDIDO";
                 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  $sequencia1=ociresult($result3, "REGIAO") ;
                 }
                 IF ($sequencia1 >"0"){$maxima2=$sequencia1+1;}ELSE{$maxima2="1";}
                                  







                                  $sgrava1= OCIParse($ora_conexao, "INSERT INTO
                                  SERV_TERC_PEDIDO(
                                  NR_PEDIDO,
                                  DATA_DIGITACAO,
                                  DATA_EMISSAO,
                                  COD_FORNECEDOR,
                                  CD_EMPRESA_SOLICITANTE,
                                  NR_SEQUENCIA,
                                  NR_ORDEM_SERVICO,
                                  ID_STATUS)
                                  VALUES ('$pedido1','$diahoje','$dataabertura','$fornecedor1','$solicitantepesquisa',
                                  '$maxima2','$ordem1','ABER')");
                                  OCIExecute($sgrava1, OCI_DEFAULT);
                                  oci_commit($ora_conexao);
                                  
                                  
                                  $lista=$_POST['lista'];


                                  $result2xistevei89 = "select count(*) CONTADOR  FROM SERVICO_GERAIS_SADEGE";
                                  $result3ver89 = @OCIParse($ora_conexao, $result2xistevei89);
				                  @OCIExecute($result3ver89, OCI_DEFAULT);
				                  while (OCIFetchInto($result3ver89,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				                  {
                                    $ultimo=ociresult($result3ver89, "CONTADOR") ;
                                  }

                                  for ($passa=0;$passa <=$ultimo;$passa++)
                                  {
                                   $acao=$lista[$passa];
                                   if ($acao >"0"){

                                     $sgrava1= OCIParse($ora_conexao, "INSERT INTO SERV_TERC_ITENS(
                                      QUANTIDADE,
                                      VL_UNITARIO,
                                      DATA_DIGITACAO,
                                      NR_PEDIDO,
                                      COD_FORNECEDOR,
                                      CD_EMPRESA,
                                      CD_SERVICO)
                                      values('0','0','$diahoje','$pedido1','$fornecedor1','$solicitantepesquisa','$acao' )
                                      ");
                                     OCIExecute($sgrava1, OCI_DEFAULT);
                                     oci_commit($ora_conexao);
                                     
                                     echo "INSERT INTO SERV_TERC_ITENS(
                                      QUANTIDADE,
                                      VL_UNITARIO,
                                      DATA_DIGITACAO,
                                      NR_PEDIDO,
                                      COD_FORNECEDOR,
                                      CD_EMPRESA,
                                      CD_SERVICO)
                                      values('0','0','$diahoje','$pedido1','$fornecedor1','$solicitantepesquisa','$acao' )</br>";

                                   }

                                  }//final do loop
                                  
                                  
                                  
                                  
                                  echo "Gravado com Sucesso";

         }
         else
         {
          echo "Não existe Dia e Mes para o Pedido</br>";
         }

       }
       else
       {
        echo "Não existe Fornecedor Definido</br>";
       }

    }
    

}//fina de testar as entradas
else
{
 echo "Não existe Solicitante definido";

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
		

		
        <input type="SUBMIT" onclick="Botao1()" value="Nova Solicitação"></input>

        <input type="button" onclick="Botao2()" value="Retornar"></input>
        

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

               $year="2013";


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
             </br>


             <a href="novasolicitacaoservico.php?navegando=sim&codigoempresa=<?ECHO $codigoempresa;?>
             &banco=<?ECHO $banco;?>&codigousuario=<?ECHO $codigousuario;?>&sequencia=<?ECHO $simulacaopassa;?>&ano=<?ECHO $ano;?>
             &tipoconsulta=<?ECHO $tipoconsulta;?>&month=1&mudoumes=<?ECHO $mudoumes;?>&dataanterior=<?ECHO "$dataanterior";?>&mesanterior=<?ECHO $mesanterior;?>&localbanco=<?ECHO $localbanco;?>&veiculo=<?ECHO $veiculo;?>&veiculocodigoe=<?ECHO $veiculocodigoe;?>&solicitantepesquisa=<?echo $solicitantepesquisa;?>">Jan</a>
             <a href="novasolicitacaoservico.php?navegando=sim&codigoempresa=<?ECHO $codigoempresa;?>
             &banco=<?ECHO $banco;?>&codigousuario=<?ECHO $codigousuario;?>&sequencia=<?ECHO $simulacaopassa;?>&ano=<?ECHO $ano;?>
             &tipoconsulta=<?ECHO $tipoconsulta;?>&month=2&mudoumes=<?ECHO $mudoumes;?>&dataanterior=<?ECHO "$dataanterior";?>&mesanterior=<?ECHO $mesanterior;?>&localbanco=<?ECHO $localbanco;?>&veiculo=<?ECHO $veiculo;?>&solicitantepesquisa=<?echo $solicitantepesquisa;?>">Fev</a>

             <a href="novasolicitacaoservico.php?navegando=sim&codigoempresa=<?ECHO $codigoempresa;?>
             &banco=<?ECHO $banco;?>&codigousuario=<?ECHO $codigousuario;?>&sequencia=<?ECHO $simulacaopassa;?>&ano=<?ECHO $ano;?>
             &tipoconsulta=<?ECHO $tipoconsulta;?>&month=3&mudoumes=<?ECHO $mudoumes;?>&dataanterior=<?ECHO "$dataanterior";?>&mesanterior=<?ECHO $mesanterior;?>&localbanco=<?ECHO $localbanco;?>&veiculo=<?ECHO $veiculo;?>&solicitantepesquisa=<?echo $solicitantepesquisa;?>">Mar</a>

             <a href="novasolicitacaoservico.php?navegando=sim&codigoempresa=<?ECHO $codigoempresa;?>
             &banco=<?ECHO $banco;?>&codigousuario=<?ECHO $codigousuario;?>&sequencia=<?ECHO $simulacaopassa;?>&ano=<?ECHO $ano;?>
             &tipoconsulta=<?ECHO $tipoconsulta;?>&month=4&mudoumes=<?ECHO $mudoumes;?>&dataanterior=<?ECHO "$dataanterior";?>&mesanterior=<?ECHO $mesanterior;?>&localbanco=<?ECHO $localbanco;?>&veiculo=<?ECHO $veiculo;?>&solicitantepesquisa=<?echo $solicitantepesquisa;?>">Abr</a>

             <a href="novasolicitacaoservico.php?navegando=sim&codigoempresa=<?ECHO $codigoempresa;?>
             &banco=<?ECHO $banco;?>&codigousuario=<?ECHO $codigousuario;?>&sequencia=<?ECHO $simulacaopassa;?>&ano=<?ECHO $ano;?>
             &tipoconsulta=<?ECHO $tipoconsulta;?>&month=5&mudoumes=<?ECHO $mudoumes;?>&dataanterior=<?ECHO "$dataanterior";?>&mesanterior=<?ECHO $mesanterior;?>&localbanco=<?ECHO $localbanco;?>&veiculo=<?ECHO $veiculo;?>&solicitantepesquisa=<?echo $solicitantepesquisa;?>">Mai</a>

             <a href="novasolicitacaoservico.php?navegando=sim&codigoempresa=<?ECHO $codigoempresa;?>
             &banco=<?ECHO $banco;?>&codigousuario=<?ECHO $codigousuario;?>&sequencia=<?ECHO $simulacaopassa;?>&ano=<?ECHO $ano;?>
             &tipoconsulta=<?ECHO $tipoconsulta;?>&month=6&mudoumes=<?ECHO $mudoumes;?>&dataanterior=<?ECHO "$dataanterior";?>&mesanterior=<?ECHO $mesanterior;?>&localbanco=<?ECHO $localbanco;?>&veiculo=<?ECHO $veiculo;?>&solicitantepesquisa=<?echo $solicitantepesquisa;?>">Jun</a>

             <a href="novasolicitacaoservico.php?navegando=sim&codigoempresa=<?ECHO $codigoempresa;?>
             &banco=<?ECHO $banco;?>&codigousuario=<?ECHO $codigousuario;?>&sequencia=<?ECHO $simulacaopassa;?>&ano=<?ECHO $ano;?>
             &tipoconsulta=<?ECHO $tipoconsulta;?>&month=7&mudoumes=<?ECHO $mudoumes;?>&dataanterior=<?ECHO "$dataanterior";?>&mesanterior=<?ECHO $mesanterior;?>&localbanco=<?ECHO $localbanco;?>&veiculo=<?ECHO $veiculo;?>&solicitantepesquisa=<?echo $solicitantepesquisa;?>">Jul</a>


             <a href="novasolicitacaoservico.php?navegando=sim&codigoempresa=<?ECHO $codigoempresa;?>
             &banco=<?ECHO $banco;?>&codigousuario=<?ECHO $codigousuario;?>&sequencia=<?ECHO $simulacaopassa;?>&ano=<?ECHO $ano;?>
             &tipoconsulta=<?ECHO $tipoconsulta;?>&month=8&mudoumes=<?ECHO $mudoumes;?>&dataanterior=<?ECHO "$dataanterior";?>&mesanterior=<?ECHO $mesanterior;?>&localbanco=<?ECHO $localbanco;?>&veiculo=<?ECHO $veiculo;?>&solicitantepesquisa=<?echo $solicitantepesquisa;?>">Ago</a>

             <a href="novasolicitacaoservico.php?navegando=sim&codigoempresa=<?ECHO $codigoempresa;?>
             &banco=<?ECHO $banco;?>&codigousuario=<?ECHO $codigousuario;?>&sequencia=<?ECHO $simulacaopassa;?>&ano=<?ECHO $ano;?>
             &tipoconsulta=<?ECHO $tipoconsulta;?>&month=9&mudoumes=<?ECHO $mudoumes;?>&dataanterior=<?ECHO "$dataanterior";?>&mesanterior=<?ECHO $mesanterior;?>&localbanco=<?ECHO $localbanco;?>&veiculo=<?ECHO $veiculo;?>&solicitantepesquisa=<?echo $solicitantepesquisa;?>">Set</a>

              <a href="novasolicitacaoservico.php?navegando=sim&codigoempresa=<?ECHO $codigoempresa;?>
             &banco=<?ECHO $banco;?>&codigousuario=<?ECHO $codigousuario;?>&sequencia=<?ECHO $simulacaopassa;?>&ano=<?ECHO $ano;?>
             &tipoconsulta=<?ECHO $tipoconsulta;?>&month=10&mudoumes=<?ECHO $mudoumes;?>&dataanterior=<?ECHO "$dataanterior";?>&mesanterior=<?ECHO $mesanterior;?>&localbanco=<?ECHO $localbanco;?>&veiculo=<?ECHO $veiculo;?>&solicitantepesquisa=<?echo $solicitantepesquisa;?>">Out</a>

             <a href="novasolicitacaoservico.php?navegando=sim&codigoempresa=<?ECHO $codigoempresa;?>
             &banco=<?ECHO $banco;?>&codigousuario=<?ECHO $codigousuario;?>&sequencia=<?ECHO $simulacaopassa;?>&ano=<?ECHO $ano;?>
             &tipoconsulta=<?ECHO $tipoconsulta;?>&month=11&mudoumes=<?ECHO $mudoumes;?>&dataanterior=<?ECHO "$dataanterior";?>&mesanterior=<?ECHO $mesanterior;?>&localbanco=<?ECHO $localbanco;?>&veiculo=<?ECHO $veiculo;?>&solicitantepesquisa=<?echo $solicitantepesquisa;?>">Nov</a>

             <a href="novasolicitacaoservico.php?navegando=sim&codigoempresa=<?ECHO $codigoempresa;?>
             &banco=<?ECHO $banco;?>&codigousuario=<?ECHO $codigousuario;?>&sequencia=<?ECHO $simulacaopassa;?>&ano=<?ECHO $ano;?>
             &tipoconsulta=<?ECHO $tipoconsulta;?>&month=12&mudoumes=<?ECHO $mudoumes;?>&dataanterior=<?ECHO "$dataanterior";?>&mesanterior=<?ECHO $mesanterior;?>&localbanco=<?ECHO $localbanco;?>&veiculo=<?ECHO $veiculo;?>&solicitantepesquisa=<?echo $solicitantepesquisa;?>">Dez</a>
             <hr><a href="consulta1gestao_combustivel_sadege.php?navegando=sim&codigoempresa=<?ECHO $codigoempresa;?>
             &banco=<?ECHO $banco;?>&codigousuario=<?ECHO $codigousuario;?>&ano=<?ECHO "$ano";?>&month=1&mudoumes=sim&dataanterior=<?ECHO "$data1";?>&mesanterior=<?ECHO $month;?>&localbanco=<?ECHO $localbanco;?>">Pular Mês</a>

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


           $programa="novasolicitacaoservico.php";
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


