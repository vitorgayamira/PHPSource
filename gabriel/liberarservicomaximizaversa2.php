<?session_start();?>
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
document.nome_formulario.action="novasolicitacaoservicoliberacao.php.php";
document.forms.nome_formulario.submit();
}
</script>
<script LANGUAGE="JavaScript">
function Botao2()
{
document.nome_formulario.action="solicitacaoservicoliberacao.php";
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



<Script Language="JavaScript">
function mascaraData(campoData){
              var data1 = campoData.value;
                            if (data1.length == 2){
                                              data1 = data1 + '/';
                                              document.forms[0].data1.value = data1;      return true;
                                               }
                                               if (data1.length == 5){
                                               data1 = data1 + '/';
                                               document.forms[0].data1.value = data1;
                                               return true;
                                                }         }


</script>

</head>


<?
require("configuraoracle.php");
require("estilo2.css");
?>



<form action="liberarservicomaximizaversa2.php"  name="nome_formulario"  method="POST" >


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
$secaosolicitante=$_GET['secaosolicitante'];
$localbanco=$_GET['localbanco'];
$destinoentrada=$_GET['destinoentrada'];


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
            $secaoliberacao=$_POST['secaoliberacao'];
            $localbanco=$_POST['localbanco'];





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
<center><font style='font-size: 24px;color: red;text-align:left;bold: Negrito' >Definindo Funcionários para Liberação</font></br></center>
<?
   



$today = date('d/m/y H:i:s'); 

          if ($destinoentrada=="Matriz"){
              $acha166s= "SELECT CODIGO from pessoa_bi where id_matriz='S'";

          }
          ELSE
          {
              $acha166s= "SELECT CODIGO from pessoa_bi where descricao='$destinoentrada'";

          }


          $res66s = mysql_db_query($banco,$acha166s,$conexao);
          $valor666s=mysql_fetch_array($res66s);
          $pessoa5=$valor666s["CODIGO"];




          $acha166= "SELECT id_libera_definir_funcionario LIBERA FROM usuario_grupo_bi
          WHERE CD_USUARIO='$codigousuario'  and  cd_pessoa='$pessoa5'";



          $res66 = mysql_db_query($banco,$acha166,$conexao);
          $valor666=mysql_fetch_array($res66);
          $libera5=$valor666["LIBERA"];
 if ($libera5=="N" ){

 ECHO "Usuário Não posue privilégio para Definir Funcionários";
 }
 else
 {


?>
<center>
Liberar para:<?echo $destinoentrada;?>-Pedido:<?echo $pedido;?>




 <center><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="600">

<tr>
  <th>Codigo</th>
  <th>Funcionario</th>
  <th>Data Inical Liberação</th>
  <th>Data Final Liberação</th>



</tr>


<?




  
 IF ($destinoentrada =="Matriz"){
 $s= OCIParse($ora_conexao, "SELECT a.CADASTRO CADASTRO,a.NOME NOME
 FROM FUNCIONARIO_SADEGE a,fornecedor_sadege b
 where a.cd_fornecedor=b.cod_fornecedor and
 b.tipo='L' ORDER BY a.NOME ASC
              ");
 
 }
 ELSE
 {


 $s= OCIParse($ora_conexao, "SELECT CADASTRO,NOME FROM FUNCIONARIO_SADEGE where cd_fornecedor in (
 select cod_fornecedor from fornecedor_sadege where empresa='$destinoentrada')
 order by NOME ASC");
 }

              OCIExecute($s, OCI_DEFAULT);
              While (OCIFetch($s)){



          $codigoS=ociresult($s, "CADASTRO") ;
          $descricaoS=ociresult($s, "NOME") ;



   ?>
   <tr>
   <td><?echo $codigoS;?> </td>
   <td><?echo $descricaoS;?> </td>
   


   <td><input type="txt" name="data1[]"  maxlength="10"  /></td>
   <td><input type="txt" name="data2[]"  maxlength="10"  /></td>
   <input type="hidden" name="lista[]"  value="<?echo $codigoS;?>">



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
		<input type="hidden" name="pedido" value="<?echo $pedido;?>">
		
		<input type="hidden" name="solicitantenovo" value="<?echo $codigofabricasolicitante;?>">
		
		<input type="hidden" name="secaoliberacao" value="<?echo $secaosolicitante;?>">
		<input type="hidden" name="localbanco" value="<?echo $localbanco;?>">


<input  type="submit" VALUE="Gravar">





<?


}
//final quando o usaurio tem privilegio de associr funcianrios




}




if ($escolha=="atualizar5") {



    if ($pedido==null){
      echo "Não existe pedido</br>";
    }
    else
    {





                                  $diahoje=date('d-m-Y');
                                  $dataabertura=$dia1."-".$mes1."-".$ano;
                                  
                                  
                                  $result2 = "select COD_FORNECEDOR,CD_SERVICO,CD_MOTIVO,CD_EMPRESA
                                  FROM solicitacao_motivo where nr_pedido='$pedido'";
                                  $result3 = @OCIParse($ora_conexao, $result2);
				                  @OCIExecute($result3, OCI_DEFAULT);
				                  while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				                  {
                                    $empresagrava=ociresult($result3, "CD_EMPRESA") ;
                                    $fornecedorgrava=ociresult($result3, "COD_FORNECEDOR") ;
                                    $servicograva=ociresult($result3, "CD_SERVICO") ;
                                    $motivograva=ociresult($result3, "CD_MOTIVO") ;



                                  }
                                  



                                  $data1=$_POST['data1'];
                                  $data2=$_POST['data2'];
                                  $lista=$_POST['lista'];


                                  $result2achaorigemfuncioanrio1= "select count(*) CONTADOR from
                                  solicitacao_motivo where nr_pedido='$pedido' and COD_FORNECEDOR not in('99999')";
                                  $result2achaorigemfuncioanrio12= @OCIParse($ora_conexao,$result2achaorigemfuncioanrio1);
				                  @OCIExecute($result2achaorigemfuncioanrio12, OCI_DEFAULT);
				                  while (OCIFetchInto($result2achaorigemfuncioanrio12,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				                  {
                                    $contador66=ociresult($result2achaorigemfuncioanrio12, "CONTADOR") ;
                                  }








                                  $result2achaorigemfuncioanrio18= "select DISTINCT COD_FORNECEDOR CONTADOR7 from
                                  solicitacao_motivo where nr_pedido='$pedido' ";
                                  $result2achaorigemfuncioanrio128= @OCIParse($ora_conexao,$result2achaorigemfuncioanrio18);
				                  @OCIExecute($result2achaorigemfuncioanrio128, OCI_DEFAULT);
				                  while (OCIFetchInto($result2achaorigemfuncioanrio128,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				                  {
                                    $pegaforne=ociresult($result2achaorigemfuncioanrio128, "CONTADOR7") ;
                                  }
                                  




                                  IF ($contador66 =="0"){
 $result2xistevei89= "SELECT count(*) CONTADOR  FROM FUNCIONARIO_SADEGE where cd_fornecedor is null";
 $result3ver89 = @OCIParse($ora_conexao, $result2xistevei89);
				                  @OCIExecute($result3ver89, OCI_DEFAULT);
				                  while (OCIFetchInto($result3ver89,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				                  {
                                    $ultimo=ociresult($result3ver89, "CONTADOR") ;
                                  }
 }
 ELSE
 {


 $result2xistevei89="SELECT count(*) CONTADOR  FROM FUNCIONARIO_SADEGE where cd_fornecedor='$pegaforne'";
 $result3ver89 = @OCIParse($ora_conexao, $result2xistevei89);
				                  @OCIExecute($result3ver89, OCI_DEFAULT);
				                  while (OCIFetchInto($result3ver89,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				                  {
                                    $ultimo=ociresult($result3ver89, "CONTADOR") ;
                                  }

 }





                                  for ($passa=0;$passa <=$ultimo;$passa++)
                                  {


                                   $datainicial=$data1[$passa];
                                   $datafinal=$data2[$passa];
                                   $acao=$lista[$passa];

                                   
                                   if (($datainicial==null) or ($datafinal==null))
                                   {

                                   }
                                   ELSE
                                   {

                                     $result298 = "select MAX(NR_SEQUENCIA) REGIAO FROM SOLICITACAO_MOTIVO_FUNC";
                                     $result398 = @OCIParse($ora_conexao, $result298);
				                     @OCIExecute($result398, OCI_DEFAULT);
				                     while (OCIFetchInto($result398,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				                     {
                                       $sequencia198=ociresult($result398, "REGIAO") ;
                                     }
                                     IF ($sequencia198 >"0"){$maxima298=$sequencia198+1;}ELSE{$maxima298="1";}



                                     $statusgrav5="FUNC";
                                      $sgrava1= OCIParse($ora_conexao, "INSERT INTO SOLICITACAO_MOTIVO_FUNC(nr_sequencia,
                                      NR_PEDIDO,
                                      COD_FORNECEDOR,
                                      CD_EMPRESA,
                                      CD_SERVICO,
                                      CD_MOTIVO,
                                      CD_FUNCIONARIO,DT_LIMITE_ACESSO_INICIAL,DT_LIMITE_ACESSO_FINAL,ID_LIBERADO)
                                      values('$maxima298','$pedido','$fornecedorgrava','$empresagrava','$servicograva',
                                      '$motivograva','$acao','$datainicial','$datafinal','N' ) ");
                                      OCIExecute($sgrava1, OCI_DEFAULT);
                                      oci_commit($ora_conexao);




                                      $sgrava1= OCIParse($ora_conexao, "update  SERV_TERC_PEDIDO
                                     set ID_STATUS='$statusgrav5' WHERE  nr_pedido='$pedido' ");
                                     OCIExecute($sgrava1, OCI_DEFAULT);
                                     oci_commit($ora_conexao);

                                     echo "Gravado com Sucesso</br>";
                                    }

                                  }//final do loop
                                  
                                  
                                  







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


