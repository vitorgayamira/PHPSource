<?session_start();
require("conexaoadodb_oracle.php");
require_once('manipulasql.class_oraclenovo.php');
require("estilo.css");


?>

<head>
<script language="JavaScript" type="text/javascript">
   function mascaraData(campoData){
              var data1 = campoData.value;
              if (data1.length == 2){
                  data1 = data1 + '/';
                  document.forms[0].data1.value = data1;
      return true;              
              }
              if (data1.length == 5){
                  data1 = data1 + '/';
                  document.forms[0].data1.value = data1;
                  return true;
              }
         }

     function mascaraData2(campoData){
              var data2 = campoData.value;
              if (data2.length == 2){
                  data2 = data2 + '/';
                  document.forms[0].data2.value = data2;
      return true;              
              }
              if (data2.length == 5){
                  data2 = data2 + '/';
                  document.forms[0].data2.value = data2;
                  return true;
              }
         }


function Mascara_Hora1(Hora1){ 
var hora01 = ''; 
hora01 = hora01 + Hora1; 
if (hora01.length == 2){ 
hora01 = hora01 + ':'; 
document.forms[0].Hora1.value = hora01; 
} 
if (hora01.length == 5){ 
Verifica_Hora1(); 
} 
} 
           
function Verifica_Hora1(){ 
hrs = (document.forms[0].Hora1.value.substring(0,2)); 
min = (document.forms[0].Hora1.value.substring(3,5)); 
               
estado = ""; 
if ((hrs < 00 ) || (hrs > 23) || ( min < 00) ||( min > 59)){ 
estado = "errada"; 
} 
               
if (document.forms[0].Hora1.value == "") { 
estado = "errada"; 
} 
 
if (estado == "errada") { 
alert("Hora inv�lida!"); 
document.forms[0].Hora1.focus(); 
} 
} 


function Mascara_Hora2(Hora2){ 
var hora02 = ''; 
hora02 = hora02 + Hora2; 
if (hora02.length == 2){ 
hora02 = hora02 + ':'; 
document.forms[0].Hora2.value = hora02; 
} 
if (hora02.length == 5){ 
Verifica_Hora2(); 
} 
} 
           
function Verifica_Hora2(){ 
hrs = (document.forms[0].Hora2.value.substring(0,2)); 
min = (document.forms[0].Hora2.value.substring(3,5)); 
               
estado = ""; 
if ((hrs < 00 ) || (hrs > 23) || ( min < 00) ||( min > 59)){ 
estado = "errada"; 
} 
               
if (document.forms[0].Hora2.value == "") { 
estado = "errada"; 
} 
 
if (estado == "errada") { 
alert("Hora inv�lida!"); 
document.forms[0].Hora2.focus(); 
} 
}

</script>


</head>



<form action="<?=$PHP_SELF?>" method="POST">

<?

$navegando=$_GET['navegando'];
$continuarmesmatela=$_POST['continuarmesmatela'];

if ($navegando=="sim"){
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
$codigoachou=$_GET['codigoachou'];


}
if ($continuarmesmatela=="sim"){
$codigoachou=$_POST['codigoachou'];
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

$quantidade=$_POST['quantidade'];
$semanainicio=$_POST['semanainicio'];
	$semanafinal=$_POST['semanafinal'];
    $turno=$_POST['turno'];
    $turno1=$_POST['turno1'];
	$primeirasemana=$_POST['primeirasemana'];
	$segundasemana=$_POST['segundasemana'];
	$diainicial=$_POST['diainicial'];
		
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
            $pessoasolicita=$_POST['pessoasolicita'];
            $solicitantenovo=$_POST['solicitantenovo'];
            $recomendacao=$_POST['recomendacao'];
			$programa=$_POST['programa'];
			$empresasolicita=$_POST['empresasolicita'];
			$codigoachou=$_POST['codigoachou'];





}


if (!IsSet($ano)){
$ano=date('Y');

}

if (!IsSet($mes)){
$mes=date('m');
}
$programa="NOVAAUTORIZACAOACESSO.php";



                                  $achaempesasolicita1 = "SELECT d.codigo CODIGO,d.descricao EMPRESA from  SOLICITACAO_MOTIVO_FUNC_ACESSO a,pessoa_bi d  
								  where a.nr_pedido='$codigoachou' and  a.CD_EMPRESA_SOLICITANTE=d.codigo ";
                                  echo "$usu18ussMAXPED36pri";
																  
								  $achaempesasolicita2= $conn->Execute($achaempesasolicita1);
                                  while ( !$achaempesasolicita2->EOF) {
                                     $razaosolicitante=$achaempesasolicita2->fields["EMPRESA"];
									 $codigoempresasolicitaagora=$achaempesasolicita2->fields["CODIGO"];
                                  $achaempesasolicita2->MoveNext();

								  }





?>

<div  style="display: block;" id="janelagrande1acesso">


        <table  width="100%"  border="0" background-image="sairmensagem.png" >
        <tr>
        <td  align=right>
        Usu�rio:<?echo $edusuario;?>-<?echo $nomepessoa4;?>
		Pedido:<?echo $codigoachou;?></br>
		Autorizando  Solicita��o de Acesso � <? echo "$razaoempresa";?> solitado por:<? echo "$razaosolicitante";?>
        <a href="NOVAAUTORIZACAOACESSO.php?navegando=sim&escolha=1">
        <IMG src="sairmensagem.png" width="38" height="38" ></a>
        </td> 
        </tr>
        </table>

<?




$today = date('d/m/y H:i:s'); 
?>




 </table>


  
</br></br> 
 
 <center><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="95%">

<tr>

  <th>Nome Pessoa</th>
  <th>Motivos</th>
  <th>Data Inicial</th>
  <th>Hora Inicial</th>
  <th>Data Final</th>
  <th>Hora Final</th>
  <th>Sele��o</th>


</tr>


<?
  $sql2teste = "SELECT a.NR_SEQUENCIA,c.descricao ,b.ds_motivo,a.DT_LIMITE_ACESSO_INICIAL DATA,a.HR_INICIO HORA1,a.DT_LIMITE_ACESSO_FINAL DATA2,
  a.HR_FINAL HORA2 from  SOLICITACAO_MOTIVO_FUNC_ACESSO a,motivo_solicitacao b,pessoa_bi c
  where a.nr_pedido='$codigoachou' and
  a.cd_motivo=b.cd_motivo and
  a.cd_funcionario=c.codigo and
  a.ID_LIBERADO='N'
  ";
  
 
  $resultTER = $conn->Execute($sql2teste);
  while ( !$resultTER->EOF) {

       $codigoS=$resultTER->fields["0"];
       
	   
       ?>
       <tr>
       
       
       <td><?echo $resultTER->fields["1"];;?> </td>
	   <td><?echo $resultTER->fields["2"];;?> </td>
	   <td><?echo $resultTER->fields["3"];;?> </td>
       <td><?echo $resultTER->fields["4"];;?> </td>
	   <td><?echo $resultTER->fields["5"];;?> </td>
	   <td><?echo $resultTER->fields["6"];;?> </td>


	 
	   <td><input type="checkbox" name="lista1[]" value="<?echo $codigoS;?>"></td>
       <tr>
	   <?



$resultTER->MoveNext();
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

  <input type="hidden" name="programa" value="<?echo $programa;?>">


      
		<input type="hidden" name="continuarmesmatela" value="sim">
		
		<input type="hidden" name="solicitantepesquisa" value="<?echo $solicitantepesquisa;?>">
		
		<input type="hidden" name="solicitantenovo" value="<?echo $codigofabricasolicitante;?>">
		
		<input type="hidden" name="codigoachou" value="<?echo $codigoachou;?>">
		
<table  width="100%"  border="0" background-image="sairmensagem.png" >
        <tr>
        <td  align=right>

        <a href="<?echo $programa;?>?navegando=sim&escolha=1">
        <IMG src="cancelarmensagem.png" width="92" height="48" ></a>

        <a href="#" onclick="document.forms[0].submit();return false;">
        <IMG src="okmensagem.png" width="62" height="45" ></a>



        </td>

        </tr>
        </table>
</div>

<?

                                  $usu18ussMAXPED36pri = "SELECT count(*) CONTADOR  FROM usuario_grupo_bi where id_libera_funcionario_acesso='S' AND  cd_empresa='$codigoempresasolicitaagora' and cd_usuario in (select cd_usuario from usuario_bi where nm_usuario='$edusuario')";
                                 
																  
								  $usu18ussMAXPED23pri= $conn->Execute($usu18ussMAXPED36pri);
                                  while ( !$usu18ussMAXPED23pri->EOF) {
                                     $liberaaqui=$usu18ussMAXPED23pri->fields["CONTADOR"];
                                  $usu18ussMAXPED23pri->MoveNext();

								  }

                                  $diahoje=date('d-m-Y');
                                  
								  $lista1=$_POST['lista1'];
								  $datainicial=$_POST['datainicial'];
								  $datafinal=$_POST['datafinal'];
								  $horainicial=$_POST['horainicial'];
								  $horafinal=$_POST['horafinal'];
  
   
      
if ($liberaaqui >"0")
{        
		   
                                 

								     $usu18ussMAXPED36 = "SELECT count(*) CONTADOR  FROM SOLICITACAO_MOTIVO_FUNC_ACESSO  where nr_pedido='$codigoachou' ";
                                     $usu18ussMAXPED23= $conn->Execute($usu18ussMAXPED36);
                                     while ( !$usu18ussMAXPED23->EOF) {
                                     $quantosmotivos=$usu18ussMAXPED23->fields["CONTADOR"];
                                     $usu18ussMAXPED23->MoveNext();
                                     }
								  
								  
								 
                                  for ($passa=0;$passa <$quantosmotivos;$passa++)
                                  {
                                   $acao1=$lista1[$passa];
								  

								  
                                   if ($acao1 >"0")
								   {
									  
                                      			  $query = "UPDATE SOLICITACAO_MOTIVO_FUNC_ACESSO SET ID_LIBERADO='S'";
                                                  
												  require("enviaemail.php");
                                                  $result = $conn->Execute($query);
												 
												  $escolha="1";
                                                  $erromostra=$conn->ErrorMsg();

                                                  require("logerrobi.php");
									
								   }//marcou os motivos
								  }//todos motivos analisados
								  
								  
								     $usu18ussMAXPED36qunatosabertos1 = "SELECT count(*) CONTADOR  FROM SOLICITACAO_MOTIVO_FUNC_ACESSO  where nr_pedido='$codigoachou' and ID_LIBERADO='N'  ";
                                     $usu18ussMAXPED36qunatosabertos2= $conn->Execute($usu18ussMAXPED36qunatosabertos1);
                                     while ( !$usu18ussMAXPED36qunatosabertos2->EOF) {
                                     $quantosABERTO=$usu18ussMAXPED36qunatosabertos2->fields["CONTADOR"];
                                     $usu18ussMAXPED36qunatosabertos2->MoveNext();
                                     }
                                     
									 IF($quantosABERTO=="0"){
                                          $queryG = "UPDATE SERV_TERC_PEDIDO_ACESSO SET ID_STATUS='FINA'  WHERE NR_PEDIDO='$codigoachou'";
                                          $result = $conn->Execute($queryG);
									 
									 }
			 
			 
			
              
}
else
{
		    echo "Este Usu�rio n�o Possue Privil�gio para liberar </br> Funcion�rios de Acesso da Empresa Solicitante..veja tela de Parametriza��o";
}
	    

?>







</form>



