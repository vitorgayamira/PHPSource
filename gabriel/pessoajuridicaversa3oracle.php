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
document.nome_formulario.action="pessoajuridicaversa3oracle.php";
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
<form action="pessoajuridicaversa3oracle.php" method="POST" name="nome_formulario">


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
            $cidade3=$_POST['cidade3'];





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

<center><font style='font-size: 24px;color: red;text-align:center;bold: Negrito' >Atualizando Fornecedores</font>
</br></br>


     <font style='font-size: 15px;color: black;text-align:center;bold: Negrito' >
     
     <?


if (!IsSet($escolha) or $escolha=="1"  ){?>




    
    Escolha Pessoa Jurídica:
    <select  style="background-color:#8B8378;color: white;"  name="escolhaatual">
                    <option value="<?echo $escolhaatual;?>"><? echo $escolhaatual;?></option>

                    <?
				 $result2 = "SELECT COD_FORNECEDOR,EMPRESA FROM fornecedor_sadege where
                 EMPRESA like '%$razaoescolha%' ";
				 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  print "<option value=\"{$row["COD_FORNECEDOR"]}\">{$row["COD_FORNECEDOR"]}-{$row["EMPRESA"]}</option>";
                 }
				 ?>
                 </select>
        <input type="hidden" name="escolha" value="2">
        <input type="hidden" name="banco" value="<?echo $banco;?>">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">
		<input type="hidden" name="mes2" value="12">
		<input type="hidden" name="tipoconsulta" value="<?echo $tipoconsulta;?>">
		<input type="hidden" name="banco" value="<?echo $banco;?>">
		<input type="hidden" name="variacao3" value="<?echo $variacao3;?>">
		<input type="hidden" name="descricaocurva" value="<?echo $descricaocurva;?>">
		<input type="hidden" name="valorpeso" value="<?echo $valorpeso;?>">
		<input type="hidden" name="numerolote" value="<?echo $numerolote;?>">
		





 <input type="SUBMIT"  value="Avançar">


<?
}

if ($escolha=="2"  ){


$achadiacontador7= OCIParse($ora_conexao, "SELECT a.COD_FORNECEDOR FORN,a.EMPRESA EMPRESA,a.CGC CGC,a.ENDERECO ENDERECO,
 a.BAIRRO BAIRRO, a.CEP CEP,a.TELEFONE TELEFONE,a.CONTATO CONTATO,a.E_MAIL EMAIL,b.ds_cidade CIDADE,c.SIGLA SIGLA,
 b.cd_cidade CODIGOCIDADE,a.INSC_EST INSC_EST,a.FAX FAX,a.TELEFONE_RESID TELEFONE_RESID,
 a.TELEFONE_CELULAR TELEFONE_CELULAR,a.FUNCAO FUNCAO,a.E_MAIL E_MAIL,a.HOME_PAGE HOME_PAGE,
 a.OBS OBS
 FROM fornecedor_sadege a,CIDADE_SADEGE b,ESTADO_SADEGE c
 WHERE a.EMPRESA like '%$razaoescolha%' and
 a.cd_cidade=b.cd_cidade(+) and
 b.cd_estado=c.cd_estado(+)
 and cod_fornecedor='$escolhaatual'");
                      OCIExecute($achadiacontador7, OCI_DEFAULT);
                      While (OCIFetch($achadiacontador7)) {
                         $novocep=ociresult($achadiacontador7, "CEP") ;
                         $descricao66=ociresult($achadiacontador7, "EMPRESA") ;
                         $novoendereco=ociresult($achadiacontador7, "ENDERECO") ;
                         $novobairro=ociresult($achadiacontador7, "BAIRRO") ;
                         $novotelefone=ociresult($achadiacontador7, "TELEFONE") ;
                         $novocontato=ociresult($achadiacontador7, "CONTATO") ;
                         $novainscricao=ociresult($achadiacontador7, "INSC_EST") ;
                         $novofax=ociresult($achadiacontador7, "FAX") ;
                         $novotelefone1=ociresult($achadiacontador7, "TELEFONE_RESID") ;
                         $novotelefone2=ociresult($achadiacontador7, "TELEFONE_CELULAR") ;
                         $novafuncao=ociresult($achadiacontador7, "FUNCAO") ;
                         $novoemail=ociresult($achadiacontador7, "E_MAIL") ;
                         $novoehome=ociresult($achadiacontador7, "HOME_PAGE") ;
                         $novoobs=ociresult($achadiacontador7, "OBS") ;
                         $codigocidade=ociresult($achadiacontador7, "CODIGOCIDADE") ;
                         $descricaocidade=ociresult($achadiacontador7, "CIDADE") ;

                         
                         
                         

                      }




?>

 </br></br></br></br>
 <center><table>

 <tr>
 <td>Razão Social</td>
 <td><?echo $descricao66;?></td>
 </tr>


  <tr>
 <td>Cidade</td>
 <td><select name="cidade3">
                 <option value="<?echo $codigocidade;?>"><?echo $descricaocidade;?></option>


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
  Bairro</td>
 <td><input type="txt" name="bairro3"  size="20" value="<?echo $novobairro;?>">
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
  Endereço</td>
 <td><input type="txt" name="endereco3"  size="60"value="<?echo $novoendereco;?>">
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
}

if ($escolha=="3"){



IF ($cep3 =="0"){}else{$cepgrava=$cep3;}


$sgrava1= OCIParse($ora_conexao, "update fornecedor_sadege SET cep='$cepgrava',endereco='$endereco3',
                            bairro='$bairro3',
                            E_MAIL='$email3',cd_cidade='$cidade3'
                            WHERE  cod_fornecedor='$escolhaatual'");
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

        <input type="SUBMIT" onclick="Botao1()" value="Trocar"></input>

        <input type="button" onclick="Botao2()" value="Retornar"></input>


        

<?

}




?>


</form>
</html>






