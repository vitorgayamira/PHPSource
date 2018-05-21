<?
$cortopo="#828282";
$corfundo="#4682B4";

require("configuramysql.php");
require("estilo2.css");
require("estilonavegacaofundo.css");

require("configuraoracle.php");


//require_once("estilo2.css");
?>
<HEAD>
<Script Language="JavaScript">
function pegavalores(){


    document.getElementById('cadastrodestino').value = document.getElementById('cadastroorigem').value;
    document.getElementById('bancodestino').value = document.getElementById('bancoorigem').value;
  document.Form1.submit();
}

function mascaraData(campoData){
              var data = campoData.value;
                            if (data.length == 2){
                                              data = data + '/';
                                              document.forms[0].data.value = data;      return true;
                                               }
                                               if (data.length == 5){
                                               data = data + '/';
                                               document.forms[0].data.value = data;
                                               return true;
                                                }         }


</script>
</HEAD>

<form name=Form1 action="<? echo $programa;?>" method="POST">

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
$tipoconsulta=$_GET['tipoconsulta'];
$escolha=$_GET['escolha'];
$desejaacao=$_GET['desejaacao'];
$quantidadedias=$_GET['quantidadedias'];
$quantidadediasacumulado=$_GET['quantidadediasacumulado'];


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
            $dias5w=$_POST['dias5w'];
            $desejaacao=$_POST['desejaacao'];
            $responsavel4=$_POST['responsavel4'];
            $item4=$_POST['item4'];
            $quantdia=$_POST['quantdia'];
            $datafechamento=$_POST['datafechamento'];
            $bancoconexao=$_POST['bancoconexao'];


}


?>

<center><h2><font style='font-size: 32px;color: black;text-align:left;bold: Negrito' >Parametrização De Estoque</font></h2>




<?

if ($escolha=="muda1"){





              $result28MODA = "select count(*) CONTADOR  FROM PARAMETRO_ESTOQUE_SADEGE WHERE ID_EXISTE_INTEGRACAO_ERP='S' ";
                 $result38MODA = @OCIParse($ora_conexao, $result28MODA);
				 @OCIExecute($result38MODA, OCI_DEFAULT);
				 while (OCIFetchInto($result38MODA,&$row8MODA, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  $contador66=ociresult($result38MODA, "CONTADOR") ;
                 }
               IF ($contador66=="1"){
                           $sgrava1= OCIParse($ora_conexao, "update PARAMETRO_ESTOQUE_SADEGE set ID_EXISTE_INTEGRACAO_ERP='N'");
                            OCIExecute($sgrava1, OCI_DEFAULT);
                            oci_commit($ora_conexao);
               }
               ELSE
               {
                 $sgrava1= OCIParse($ora_conexao, "update PARAMETRO_ESTOQUE_SADEGE set ID_EXISTE_INTEGRACAO_ERP='S'");
                            OCIExecute($sgrava1, OCI_DEFAULT);
                            oci_commit($ora_conexao);
               }

             
}
if ($escolha=="muda3"){
$sgrava1= OCIParse($ora_conexao, "update PARAMETRO_ESTOQUE_SADEGE set ID_BANCO_ERP='$bancoconexao'");
                            OCIExecute($sgrava1, OCI_DEFAULT);
                            oci_commit($ora_conexao);

}






if (!IsSet($escolha) or ($escolha=="1") OR ($escolha=="muda1") OR ($escolha=="muda3") OR ($escolha=="muda5")  ){



?>

<CENTER><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="550">
 
 <td width="50%">
  Empresa:
 </td>
 <td width="50%">
 		 
				 <? 
				 
				 $result28MODA = "select CD_EMPRESA  FROM  PARAMETRO_ESTOQUE_SADEGE";
                 $result38MODA = @OCIParse($ora_conexao, $result28MODA);
				 @OCIExecute($result38MODA, OCI_DEFAULT);
				 while (OCIFetchInto($result38MODA,&$row8MODA, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  $mostraempresa=ociresult($result38MODA, "CD_EMPRESA") ;
                 }
				 


				 echo "$mostraempresa";
				 ?> 
				 
 </tr>
 
 <tr>
 <td width="50%">
 
 Integração de Estoque com ERP
 </td>
 <td width="50%">
             <?

				 $result28MODA = "select ID_EXISTE_INTEGRACAO_ERP FROM PARAMETRO_ESTOQUE_SADEGE";
                 $result38MODA = @OCIParse($ora_conexao, $result28MODA);
				 @OCIExecute($result38MODA, OCI_DEFAULT);
				 while (OCIFetchInto($result38MODA,&$row8MODA, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  $modainte=ociresult($result38MODA, "ID_EXISTE_INTEGRACAO_ERP") ;
                 }
                 ?>
                 <a href="#" onClick="window.open('parametrizacaoestoque.php?banco=<?ECHO $banco;?>&escolha=muda1&navegando=sim&codigoempresa=<?ECHO $codigoempresa;?>&codigousuario=<?ECHO $codigousuario;?>&sequencia=<?ECHO $simulacaopassa;?>&mes1=<?ECHO $mes1;?>&ano=<?ECHO $ano;?>&tipoconsulta=<?ECHO $tipoconsulta;?>','tela01','toolbar=no,location=no,directories=yes,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=1000,height=550')">
                 <?echo "$modainte";?></a>



  </tr>




 <tr>
 <td width="50%">Banco de Dados para Integração</td>
 <td><?

				 $result28MODA = "select ID_BANCO_ERP FROM PARAMETRO_ESTOQUE_SADEGE";
                 $result38MODA = @OCIParse($ora_conexao, $result28MODA);
				 @OCIExecute($result38MODA, OCI_DEFAULT);
				 while (OCIFetchInto($result38MODA,&$row8MODA, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  $modainte=ociresult($result38MODA, "ID_BANCO_ERP") ;
                 }
                 ?>
                 <a href="#" onClick="window.open('parametrizacaoestoque.php?banco=<?ECHO $banco;?>&escolha=muda2&navegando=sim&codigoempresa=<?ECHO $codigoempresa;?>&codigousuario=<?ECHO $codigousuario;?>&sequencia=<?ECHO $simulacaopassa;?>&mes1=<?ECHO $mes1;?>&ano=<?ECHO $ano;?>&tipoconsulta=<?ECHO $tipoconsulta;?>','tela01','toolbar=no,location=no,directories=yes,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=1000,height=550')">
                 <?echo "$modainte";?></a>
 

 </tr>
 


 



 
 </table>


<?


}

if ($escolha=="muda2"){
?>

<table>

                     <tr>
					 <td>Banco de Conexao</td>
                        <td>
                        <select style='font-size: 10px;color: blue;text-align:right;bold: Negrito'  name="bancoconexao" >

    <option value="ORACLE">Oracle</option>
    <option value="SQLSERVER">SqlServer</option>
     	</select>
                        </td>
                     </tr>

</table>

<input type="hidden" name="escolha" size="5" value="muda3" >
        <input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="banco" value="<?echo $banco;?>">





<input  type="submit"    VALUE="GRAVAR">


<?
}

?>
 
 </form>

  




