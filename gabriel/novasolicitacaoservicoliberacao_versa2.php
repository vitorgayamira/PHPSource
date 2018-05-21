<?session_start();?>
<html>

<body>

<head>

<script>
          function mascara_data(data){
              var mydata = '';
              mydata = mydata + data;
              if (mydata.length == 2){
                  mydata = mydata + '/';
                  document.forms[0].data.value = mydata;
              }
              if (mydata.length == 5){
                  mydata = mydata + '/';
                  document.forms[0].data.value = mydata;
              }
              if (mydata.length == 10){
                  verifica_data();
              }
          }

          function verifica_data () {

            dia = (document.forms[0].data.value.substring(0,2));
            mes = (document.forms[0].data.value.substring(3,5));
            ano = (document.forms[0].data.value.substring(6,10));

            situacao = "";
            // verifica o dia valido para cada mes
            if ((dia < 01)||(dia < 01 || dia > 30) && (  mes == 04 || mes == 06 || mes == 09 || mes == 11 ) || dia > 31) {
                situacao = "falsa";
            }

            // verifica se o mes e valido
            if (mes < 01 || mes > 12 ) {
                situacao = "falsa";
            }

            // verifica se e ano bissexto
            if (mes == 2 && ( dia < 01 || dia > 29 || ( dia > 28 && (parseInt(ano / 4) != ano / 4)))) {
                situacao = "falsa";
            }

            if (document.forms[0].data.value == "") {
                situacao = "falsa";
            }

            if (situacao == "falsa") {
                alert("Data inválida!");
                document.forms[0].data.focus();
            }
          }

          function mascara_hora(hora){
              var myhora = '';
              myhora = myhora + hora;
              if (myhora.length == 2){
                  myhora = myhora + ':';
                  document.forms[0].hora.value = myhora;
              }
              if (myhora.length == 5){
                  verifica_hora();
              }
          }

          function verifica_hora(){
              hrs = (document.forms[0].hora.value.substring(0,2));
              min = (document.forms[0].hora.value.substring(3,5));

              alert('hrs '+ hrs);
              alert('min '+ min);

              situacao = "";
              // verifica data e hora
              if ((hrs < 00 ) || (hrs > 23) || ( min < 00) ||( min > 59)){
                  situacao = "falsa";
              }

              if (document.forms[0].hora.value == "") {
                  situacao = "falsa";
              }

              if (situacao == "falsa") {
                  alert("Hora inválida!");
                  document.forms[0].hora.focus();
              }
          }
       </script>





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
document.nome_formulario.action="novasolicitacaoservicoliberacao_versa2.php.php";
document.forms.nome_formulario.submit();
}
</script>
<script LANGUAGE="JavaScript">
function Botao2()
{
document.nome_formulario.action="solicitacaoservicoliberacao_versa2.php";
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

<script type="text/javascript">
$(document).ready(function(){
	$("#cpf").mask("999.999.999-99");
});
</script>

</head>


<?
require("configuraoracle.php");
require("estilo2.css");
?>



<form action="novasolicitacaoservicoliberacao_versa2.php"  name="nome_formulario" id="nome_formulario" method="POST" >


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
            $solicitantepesquisainicial=$_POST['solicitantepesquisainicial'];
            $solicitantenovo=$_POST['solicitantenovo'];
            $recomendacao=$_POST['recomendacao'];





}


if (!IsSet($ano)){
$ano=date('Y');

}

if (!IsSet($mes)){
$mes=date('m');
}


require("configuramysql.php");



if (!IsSet($escolha) or ($escolha=="1")){
?>
<center><font style='font-size: 34px;color: black;text-align:left;bold: Negrito' >Abrindo Solicitação</font></br></center>
<?
   


$today = date('d/m/y H:i:s'); 

          echo "tipo solicita:$tiposolicita//tipo executor:$tipoexecutor";


          if ($tiposolicita=="unida"){

          $acha18 = "SELECT CD_UNIDANEGOCIO_ERP from pessoa_bi where codigo='$empresasolicita'";

          $res8 = mysql_db_query($banco,$acha18,$conexao);
          $valor68=mysql_fetch_array($res8);
          $codigoerp=$valor68["CD_UNIDANEGOCIO_ERP"];
          
          
          $achaempresasolicita1= "select a.cd_fabrica CODIGO from fabricas a,areas b,secaos c
           where a.cd_fabrica=b.cd_fabrica and
          b.cd_area=c.cd_area and
          c.cd_secao='$codigoerp'
                                  ";
                                  $achaempresasolicita2= @OCIParse($ora_conexao, $achaempresasolicita1);
				                  @OCIExecute($achaempresasolicita2, OCI_DEFAULT);
				                  while (OCIFetchInto($achaempresasolicita2,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				                  {
                                    $codigofabricasolicitante=ociresult($achaempresasolicita2, "CODIGO") ;
                                  }

         }
         
         if ($tiposolicita=="forne"){

          $acha18 = "SELECT CD_UNIDANEGOCIO_ERP from pessoa_bi where codigo='$empresasolicita'";

          $res8 = mysql_db_query($banco,$acha18,$conexao);
          $valor68=mysql_fetch_array($res8);
          $codigoerp=$valor68["CD_UNIDANEGOCIO_ERP"];


          $achaempresasolicita1= "select COD_FORNECEDOR from fornecedor_sadege where
          COD_FORNECEDOR='$codigoerp'
                                  ";
                                  $achaempresasolicita2= @OCIParse($ora_conexao, $achaempresasolicita1);
				                  @OCIExecute($achaempresasolicita2, OCI_DEFAULT);
				                  while (OCIFetchInto($achaempresasolicita2,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				                  {
                                    $codigofabricasolicitante=ociresult($achaempresasolicita2, "COD_FORNECEDOR") ;
                                  }

         }
         



echo "Usuario conexao:$usuario";

?>
<center>
Código Solicitante:<?echo $codigoerp;?>-<?echo $codigofabricasolicitante;?>







<table>

                 <?
                 $result2 = "select MAX(NR_PEDIDO) PEDIDO FROM SERV_TERC_PEDIDO";
                 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  $sequencia1P=ociresult($result3, "PEDIDO") ;
                 }
                 IF ($sequencia1P >"0"){$maxima2P=$sequencia1P+1;}ELSE{$maxima2P="1";}

   echo "</br>Nr.Pedido:$maxima2P";?>

   <tr>
   <td>Solicitante</td>
    <td>

                 <select name="solicitantepesquisainicial">

                 <?
                  if ($tiposolicita=="forne"){
                     $result2 = "SELECT CADASTRO,NOME FROM FUNCIONARIO_SADEGE where cd_fornecedor='$codigoerp'";
                  

                  }
                  
                  if ($tiposolicita=="unida"){
                     $result2 = "SELECT CADASTRO,NOME FROM FUNCIONARIO_SADEGE where cd_sec='$codigoerp'";

                  }
                  

				 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  print "<option value=\"{$row["CADASTRO"]}\">{$row["CADASTRO"]}-{$row["NOME"]}</option>";
                 }
				 ?>
				 </select>
    </td>
    </tr>
    






   
   <? if ($tipoexecutor=="forne"){?>
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
   <?}
   else
   {
   ?>
   
   <input type="hidden" name="fornecedor1"  value="99999" >
   <?
   }

   ?>
   
   <input type="hidden" name="servico1"  value="999" >

   <tr>
  <td>Obs</td>
  <td>
     <textarea  cols="76" rows="5" name="recomendacao" ></textarea>
  </td>
  </tr>
  
  




 </table>
 
 
 <center><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="600">

<tr>
  <th>Codigo</th>
  <th>Motivos</th>
  <th>Seleção</th>


</tr>


<?
 $s= OCIParse($ora_conexao, "SELECT CD_MOTIVO,DS_MOTIVO FROM MOTIVO_SOLICITACAO
 order by  DS_MOTIVO asc
              ");


              OCIExecute($s, OCI_DEFAULT);
              While (OCIFetch($s)){



          $codigoS=ociresult($s, "CD_MOTIVO") ;
          $descricaoS=ociresult($s, "DS_MOTIVO") ;



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

<input type="hidden" name="data" OnKeyUp="mascara_data(this.value)" maxlength="10">
<input type="hidden" name="hora" OnKeyUp="mascara_hora(this.value)" maxlength="5">



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
		
		<input type="hidden" name="solicitantenovo" value="<?echo $codigofabricasolicitante;?>">
		
		<input type="hidden" name="pedido1" value="<?echo $maxima2P;?>">
		
		<input type="hidden" name="localbanco" value="<?echo $localbanco;?>">






 <input type="hidden" name="entrada" size="5" value="<?echo "GRAVA1";?>" ></br>

<input  type="submit" VALUE="Gravar">





<?
}
?>








<center></br>

<?
if ($escolha=="atualizar5") {

if ($solicitantepesquisainicial >"0"){
    echo "Existe Solicitante</br>";


    if ($pedido1==null){
      echo "Não existe pedido</br>";
    }
    else
    {
     echo "Existe Pedido ";


       if ($fornecedor1>"0"){
         echo "Existe Fornecedor</br>";




                                  $diahoje=date('d-m-Y');
                                  $dataabertura=$diahoje;

                 
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
                                  ID_STATUS)
                                  VALUES ('$pedido1','$diahoje','$dataabertura','$fornecedor1','$solicitantenovo',
                                  '$maxima2','ABER')");
                                  
                                  echo "INSERT INTO
                                  SERV_TERC_PEDIDO(
                                  NR_PEDIDO,
                                  DATA_DIGITACAO,
                                  DATA_EMISSAO,
                                  COD_FORNECEDOR,
                                  CD_EMPRESA_SOLICITANTE,
                                  NR_SEQUENCIA,
                                  ID_STATUS)
                                  VALUES ('$pedido1','$diahoje','$dataabertura','$fornecedor1','$solicitantenovo',
                                  '$maxima2','ABER')";

                                  OCIExecute($sgrava1, OCI_DEFAULT);
                                  oci_commit($ora_conexao);
                                  
                                  
                                  $sgrava1= OCIParse($ora_conexao, "INSERT INTO SERV_TERC_ITENS(
                                      NR_PEDIDO,
                                      COD_FORNECEDOR,
                                      CD_EMPRESA,
                                      CD_SERVICO)
                                      values('$pedido1','$fornecedor1','$solicitantenovo','$servico1' )
                                      ");
                                     OCIExecute($sgrava1, OCI_DEFAULT);
                                     oci_commit($ora_conexao);
                                  

                                  
                                  
                                  
                                  $lista=$_POST['lista'];


                                  $result2xistevei89 = "select count(*) CONTADOR  FROM MOTIVO_SOLICITACAO";
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

                                     $result298 = "select MAX(NR_SEQUENCIA) REGIAO FROM SOLICITACAO_MOTIVO";
                                     $result398 = @OCIParse($ora_conexao, $result298);
				                     @OCIExecute($result398, OCI_DEFAULT);
				                     while (OCIFetchInto($result398,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				                     {
                                       $sequencia198=ociresult($result398, "REGIAO") ;
                                     }
                                     IF ($sequencia198 >"0"){$maxima298=$sequencia198+1;}ELSE{$maxima298="1";}




                                     $sgrava1= OCIParse($ora_conexao, "INSERT INTO SOLICITACAO_MOTIVO(nr_sequencia,
                                      NR_PEDIDO,
                                      COD_FORNECEDOR,
                                      CD_EMPRESA,
                                      CD_SERVICO,
                                      CD_MOTIVO,
                                      CD_FUNC_SOLICITANTE,DS_SOLICITANTE)
                                      values('$maxima298','$pedido1','$fornecedor1','$solicitantenovo','$servico1','$acao',
                                      '$solicitantepesquisainicial','$recomendacao' )
                                      ");
                                     OCIExecute($sgrava1, OCI_DEFAULT);
                                     oci_commit($ora_conexao);
                                     

                                     

                                   }

                                  }//final do loop
                                  
                                  
                                  
                                  
                                  echo "Gravado com Sucesso";



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





</form>


</body>
</html>


