<?session_start();?>
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
         background: url(imagemfundotelamaximiza.jpg) no-repeat;
         background-color: white;

}

#primeiro{
position:absolute;

top:170;
left:20;
background-color:#CDC5BF;
width: 30%;
height: 60%;


}





</style>

<script LANGUAGE="JavaScript">
function Botao1()
{
document.nome_formulario.action="itensunidadenegociosadege.php";
document.forms.nome_formulario.submit();
}
</script>
<script LANGUAGE="JavaScript">
function Botao2()
{
document.nome_formulario.action="novoitensunidadenegociosadege.php";
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


<form action="itensunidadenegociosadege.php" method="POST" name="nome_formulario">

<?



//echo "Usuario conexao:$usuario";




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
$contador=$_GET['contador'];
$data1=$_GET['data1'];
$data2=$_GET['data2'];
$year=$_GET['year'];
$month=$_GET['month'];
$dia=$_GET['dia'];
$mudoumes=$_GET['mudoumes'];
$dataanterior=$_GET['dataanterior'];
$mesanterior=$_GET['mesanterior'];
$sequenciarecebe=$_GET['sequenciarecebe'];
$statusacao=$_GET['statusacao'];
$padraoexecucao=$_GET['padraoexecucao'];
$solicitantepesquisa=$_GET['solicitantepesquisa'];
$pedidoaltera=$_GET['pedidoaltera'];
$secaosolicitante=$_GET['secaosolicitante'];
$localbanco=$_GET['localbanco'];


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
			$quantaslinhasmp=$_POST['quantaslinhasmp'];
			$data1=$_POST['data1'];
$data2=$_POST['data2'];
$novo=$_POST['novo'];
$month=$_POST['month'];
$executor=$_POST['executor'];
$ordem=$_POST['ordem'];
$banco=$_POST['banco'];
$acao=$_POST['acao'];
$sequenciarecebe=$_POST['sequenciarecebe'];
$hora=$_POST['hora'];
$hora2=$_POST['hora2'];
$meutexto=$_POST['meutexto'];
$fecharsoli=$_POST['fecharsoli'];
$velocidade1=$_POST['velocidade1'];
$velocidadepadrao=$_POST['velocidadepadrao'];
$solicitantepesquisa=$_POST['solicitantepesquisa'];
$tipoexecutor=$_POST['tipoexecutor'];
$codigoerp=$_POST['codigoerp'];
$empresasolicita=$_POST['empresasolicita'];
$localbanco=$_POST['localbanco'];






}


require("configuraoracle.php");
require("estilo2.css");

require("configuramysql.php");





$acha1 = "SELECT A.CODIGO CODIGOEMPRESA,A.DESCRICAO EMPRESA,B.DESCRICAO NOME,E.DESCRICAO NOMEEMPRESA,D.ID_MASTER MASTER
          FROM PESSOA_BI A,PESSOA_BI B,USUARIO_GRUPO_BI C,USUARIO_BI D,PESSOA_BI E
          WHERE C.CD_PESSOA=A.CODIGO AND
          C.CD_USUARIO=D.CD_USUARIO AND
          D.CD_PESSOA=B.CODIGO AND
          D.CD_USUARIO='$usuario' AND
		  D.CD_EMPRESA=E.CODIGO
          ";

          $res = mysql_db_query($banco,$acha1,$conexao);
          $valor6=mysql_fetch_array($res);
          $nome2=$valor6["NOME"];


		  $acha1 = "SELECT E.DESCRICAO NOMEEMPRESA
          FROM PESSOA_BI E
          WHERE
		  E.CODIGO in (select CD_EMPRESA from PARAMETRO_BI)
          ";

          $res = mysql_db_query($banco,$acha1,$conexao);
          $valor6=mysql_fetch_array($res);

          $nomeempresa88=$valor6["NOMEEMPRESA"];

echo "Usuário:".$nome2." -".$nomeempresa88." ";
?>


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
		<input type="hidden" name="localbanco" value="<?echo $localbanco;?>">







<?


if (!IsSet($escolha) or ($escolha=="1") or ($escolha=="atualizar4") or ($escolha=="atualizar5")  ){






if (!IsSet($solicitantepesquisa)){
                 $result2 = "select CD_FABRICA,DS_FABRICA FROM FABRICAS WHERE CD_FABRICA IN (SELECT MIN(CD_FABRICA)
                 FROM FABRICAS)";
                 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  $solicitantepesquisa=ociresult($result3, "CD_FABRICA") ;
                  $descricaosolicitante=ociresult($result3, "DS_FABRICA") ;
                 }

  }
  else
  {

     $result2 = "select CD_FABRICA,DS_FABRICA FROM FABRICAS WHERE CD_FABRICA='$solicitantepesquisa'";
                 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  $solicitantepesquisa=ociresult($result3, "CD_FABRICA") ;
                  $descricaosolicitante=ociresult($result3, "DS_FABRICA") ;
                 }

  }





?>
<center><font style='font-size: 24px;color: red;text-align:left;bold: Negrito' >Associar Itens por Unidade de Negócio</font></br>
<font  style='font-size: 13px;color: black;text-align:center;bold: Negrito' >


Empresa: <select name="solicitantepesquisa" style="background-color:#8B8378;color: white;">
                 <option value="<?echo $solicitantepesquisa;?>"><? echo $descricaosolicitante;?></option>

                 <option value="">Todas</option>
				 <?
                 $result2 = "SELECT CD_FABRICA,DS_FABRICA FROM FABRICAS order by DS_FABRICA asc ";
				 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  print "<option value=\"{$row["CD_FABRICA"]}\">{$row["DS_FABRICA"]}</option>";
                 }
				 ?>
				 </select>
				 
				 
				 <input  type="submit" VALUE="Consultar">




    <input type="button" onclick="Botao2()" value="Nova Associação"></input>
    


<hr>



<center><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:white;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="80%">

              <tr>
         	  <th>Item</th>
	          <th>Descricao</th>
	          <th>Unidade</th>
              <th>Estoque Mínimo</th>
              <th>Saldo Inicial</th>
              <th>Valor (R$)</th>
              </tr>
              <?
               $s = OCIParse($ora_conexao, " select a.CD_MATERIAL CD_MATERIAL,a.DS_MATERIAL DS_MATERIAL,
               a.CD_UNIDADE CD_UNIDADE,a.VALOR VALOR,a.SALDO_ESTOQUE SALDO_ESTOQUE,a.ESTOQUE_MINIMO ESTOQUE_MINIMO
               FROM MAT_PECAS a,MAT_PECAS_FABRICA b
               where a.cd_material=b.cd_material  and
               b.cd_fabrica='$solicitantepesquisa'
               order by a.DS_MATERIAL asc");
              OCIExecute($s, OCI_DEFAULT);
              While (OCIFetch($s)) {
                 $codigomaterial=ociresult($s, "CD_MATERIAL") ;
                 $descricaomaterial=ociresult($s, "DS_MATERIAL") ;
                 $valoritem=ociresult($s, "VALOR") ;
                 $saldoritem=ociresult($s, "SALDO_ESTOQUE") ;
                 $saldoritem=number_format($saldoritem, 0, ',', '.');
                 $minimoitem=ociresult($s, "ESTOQUE_MINIMO") ;
                 $unidadeitem=ociresult($s, "CD_UNIDADE") ;
                 ?>
                <tr>
                <td><center><? echo $codigomaterial;?></td>
                <td><center><? echo $descricaomaterial;?></td>
                <td><center><? echo $unidadeitem;?></td>
                <td style='font-size: 11px;color: red;text-align:RIGHT;bold: Negrito text-decoration: none'><? echo $minimoitem;?></td>
                <td style='font-size: 11px;color: red;text-align:RIGHT;bold: Negrito text-decoration: none'><? echo $saldoritem;?></td>
                <td style='font-size: 11px;color: red;text-align:RIGHT;bold: Negrito text-decoration: none'><? echo $valoritem;?></td>

                </tr>
                <?
              }
              ?>
              </table>







<?
}//final da tela de abertura


?>




</form>
</html>


