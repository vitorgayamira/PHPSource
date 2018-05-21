<html>
<head>

<Script Language="JavaScript">
function getStates(what) {
   if (what.selectedIndex != '') {
      var funcaochegando = what.value;
      document.location=(funcaochegando);
   }
}
</Script>


<style  type="text/css">
#envolve { width: 100%}
 #div_1 { position: relative; width: 30%; height: 100%; background-color: #FFFFFF; border:1;float: left; text-align: center; color: #E8E8E8;  }
 #div_2 { position: relative; width: 70%; height: 100%; background-color: #FFFFFF; float: right; text-align: center; color: #E8E8E8;}
 #clear { clear:both; }






 body{
         width:100%;
	     height:100%;
         background: url(imagemfundotela.jpg) no-repeat;
         background-color: white;

}



</style>

<script LANGUAGE="JavaScript">
function Botao1()
{
document.nome_formulario.action="pessoajuridicaversa4oracle.php";
document.forms.nome_formulario.submit();
}
</script>
<script LANGUAGE="JavaScript">
function Botao2()
{
document.nome_formulario.action="pessoajuridicaversa2oracle.php";
document.forms.nome_formulario.submit();
}
</script>







</head>
<form action="pessoajuridicaversa4oracle.php" method="POST" name="nome_formulario">


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
        $banco=$_POST['banco'];

		$datagravarinicio=$_POST['datagravarinicio'];
			$datagravarfinal=$_POST['datagravarfinal'];
			$quantaslinhas=$_POST['quantaslinhas'];
            $quantosmercado=$_POST['quantosmercado'];
			$mes1=$_POST['mes1'];
			$mes2=$_POST['mes2'];
			$tipoconsulta=$_POST['tipoconsulta'];
			$quantaslinhasmp=$_POST['quantaslinhasmp'];
			$quantaslinhasnutrientemp=$_POST['quantaslinhasnutrientemp'];
			$existenutriente=$_POST['existenutriente'];
			$telainiciarsimulacao=$_POST['telainiciarsimulacao'];
			$tipoconsulta2=$_POST['tipoconsulta2'];
            $gravandofinal=$_POST['gravandofinal'];
            $existenutriente=$_POST['existenutriente'];
            $diapesquisa=$_POST['diapesquisa'];
            $mespesquisa=$_POST['mespesquisa'];
            $anopesquisa=$_POST['anopesquisa'];
            $razaoescolha=$_POST['razaoescolha'];
            $escolhaatual=$_POST['escolhaatual'];
            $cep3=$_POST['cep3'];
            $cidadeescolha=$_POST['cidadeescolha'];
            $bairro3=$_POST['bairro3'];
            $email3=$_POST['email3'];
            $endereco3=$_POST['endereco3'];
            
            $banco=$_POST['banco'];





}



require("configuraoracle.php");
require("estilo2.css");





 if (!IsSet($anopesquisa)){
   $anopesquisa=date('Y');
  }

  if (!IsSet($mespesquisa)){
   $mespesquisa=date('m');

  }
  
  if (!IsSet($diapesquisa)){
   $diapesquisa=date('d');
  }
  

  if ($mespesquisa=="8"){$mespesquisamostra="Agosto";}
  if ($mespesquisa=="5"){$mespesquisamostra="Maio";}
  if ($mespesquisa=="1"){$mespesquisamostra="Janeiro";}
  if ($mespesquisa=="2"){$mespesquisamostra="Fevereiro";}
  if ($mespesquisa=="3"){$mespesquisamostra="Março";}
  if ($mespesquisa=="4"){$mespesquisamostra="Abril";}
  if ($mespesquisa=="6"){$mespesquisamostra="Junho";}
  if ($mespesquisa=="7"){$mespesquisamostra="Julho";}
  if ($mespesquisa=="9"){$mespesquisamostra="Setembro";}
  if ($mespesquisa=="10"){$mespesquisamostra="Outubro";}
  if ($mespesquisa=="11"){$mespesquisamostra="Novembro";}
  if ($mespesquisa=="12"){$mespesquisamostra="Dezembro";}




?>

<center><font style='font-size: 24px;color: red;text-align:center;bold: Negrito' >Novo Fornecedor</font>
</br></br>


     <font style='font-size: 15px;color: black;text-align:center;bold: Negrito' >
     

 <center><table>

 <tr>
 <td>Razão Social</td>
 <td><input type="txt" name="razaosocial3"  size="30" ></td>
 </tr>
 
 <tr>
 <td>Cnpj</td>
 <td><input type="txt" name="cnpj3"  size="30" ></td>
 </tr>



 <tr>
 <td>
  Endereço</td>
 <td><input type="txt" name="endereco3"  size="60">
 </td>
 </tr>

 <tr>
 <td>
  Bairro</td>
 <td><input type="txt" name="bairro3"  size="20" >
 </td>

 </tr>


 
 <tr>
 <td>Cidade</td>
 <td><select name="cidade3">
                 <option value=""></option>


 <?
				 $result2 = "SELECT a.cd_cidade CODIGO,a.ds_cidade DESCRICAO,b.sigla SIGLA FROM CIDADE_SADEGE a,
                 ESTADO_SADEGE b
                 where a.cd_estado=b.cd_estado
                  ";
				 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
					print "<option value=\"{$row["CODIGO"]}\">{$row["DESCRICAO"]}-{$row["SIGLA"]}</option>";
                 }
				 ?>
				 </select>



 </td>
 </tr>
 
 <tr>
 <td>
 Nr_Cep
 </td>
 <td><input type="txt" name="cep3"  size="30" value="<?echo $novocep;?>">
 </td>
 </tr>



 <tr>
 <td>
  Email</td>
 <td><input type="txt" name="email3"  size="60"value="<?echo $novoemail;?>">
 </td>
 </tr>

 <tr>
 <td>
  Telefone</td>
 <td><input type="txt" name="telefone3"  size="60"value="<?echo $novoemail;?>">
 </td>
 </tr>
 
 <tr>
 <td>
  Contato</td>
 <td><input type="txt" name="contato3"  size="60"value="<?echo $novoemail;?>">
 </td>
 </tr>
 
 <tr>
 <td>
  Telefone Comercial</td>
 <td><input type="txt" name="fone2"  size="60"value="<?echo $novoemail;?>">
 </td>
 </tr>
 
 <tr>
 <td>
  Celular</td>
 <td><input type="txt" name="fone3"  size="60"value="<?echo $novoemail;?>">
 </td>
 </tr>

 <tr>
 <td>
  Função</td>
 <td><input type="txt" name="funcao3"  size="60"value="<?echo $novoemail;?>">
 </td>
 </tr>
 
 <tr>
 <td>
  Home Page</td>
 <td><input type="txt" name="home3"  size="60"value="<?echo $novoemail;?>">
 </td>
 </tr>
 
 <tr>
 <td>
  Observação</td>
 <td><input type="txt" name="obs3"  size="60"value="<?echo $novoemail;?>">
 </td>
 </tr>



 </table>


 <input type="hidden" name="escolha" size="5" value="3" >
        <input type="hidden" name="continuarmesmatela" value="sim">
        <input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
  		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="banco" value="<?echo $banco;?>">
		<input type="hidden" name="ambiente" value="<?echo $ambiente;?>">
		<input type="hidden" name="localbanco" value="<?echo $localbanco;?>">
		<input type="hidden" name="escolhaatual" value="<?echo $escolhaatual;?>">
		
        <input  type="submit"      VALUE="GRAVAR" >


<?

if ($escolha=="3"){


$result2 = "select MAX(COD_FORNECEDOR) DISTR FROM
                 fornecedor_sadege";
                 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  $sequencia1=ociresult($result3, "DISTR") ;
                 }
                 IF ($sequencia1 >"0"){$maxima2=$sequencia1+1;}ELSE{$maxima2="1";}



$sgrava1= OCIParse($ora_conexao, "insert into  fornecedor_sadege (cod_fornecedor,
EMPRESA,
ENDERECO,
BAIRRO,
 CEP,
 TELEFONE,
 CONTATO,
  INSC_EST,
  FAX,
  FONE,
  TELEFONE_RESID,
  TELEFONE_CELULAR,
  FUNCAO,
  E_MAIL,
  HOME_PAGE,
  OBS,CGC,CD_CIDADE ) values ('$maxima2','$razaosocial3','$endereco3','$bairro3','$cep3','$telefone3','$contato3','$inscricao3','$fax3',
  '$fone1','$fone2','$fone3','$funcao3','$email','$home3','$obs3','$cnpj3','$cidade3')
 ");

 /*
 echo "insert into  fornecedor_sadege (cod_fornecedor,
EMPRESA,
ENDERECO,
BAIRRO,
 CEP,
 TELEFONE,
 CONTATO,
  INSC_EST,
  FAX,
  FONE,
  TELEFONE_RESID,
  TELEFONE_CELULAR,
  FUNCAO,
  E_MAIL,
  HOME_PAGE,
  OBS,CGC,CD_CIDADE ) values ('$maxima2','$razaosocial3','$endereco3','$bairro3','$cep3','$telefone3','$contato3','$inscricao3','$fax3',
  '$fone1','$fone2','$fone3','$funcao3','$email','$home3','$obs3','$cnpj3','$cidade3')";
  */
  
                            OCIExecute($sgrava1, OCI_DEFAULT);
                            oci_commit($ora_conexao);
                            



?><center><? echo "Atualizado.....Registro</br>";
?>

<input type="hidden" name="escolha" size="5" value="1" >
        <input type="hidden" name="continuarmesmatela" value="sim">
        <input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
  		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="banco" value="<?echo $banco;?>">
		<input type="hidden" name="ambiente" value="<?echo $ambiente;?>">
		<input type="hidden" name="localbanco" value="<?echo $localbanco;?>">

        <input type="SUBMIT" onclick="Botao1()" value="Novo"></input>

        <input type="button" onclick="Botao2()" value="Retornar"></input>


        

<?

}




?>


</form>
</html>






