<html>

<head>
<style  type="text/css">
#envolve { width: 1310px; margin-top: 20px;}
 #div_1 { position: relative; width: 40%; height: 1200px; background-color: white; border:1;float: left; text-align: center; color: #E8E8E8;  }
 #div_2 { position: relative; width: 60%; height: 1200px; background-color: white; float: right; text-align: center; color: #E8E8E8;}
 #clear { clear:both; }

</style>



<script LANGUAGE="JavaScript">
function Botao1()
{
document.nome_formulario.action="baixamamateriais.php";
document.forms.nome_formulario.submit();
}
</script>
<script LANGUAGE="JavaScript">
function Botao2()
{
document.nome_formulario.action="incluirmateriais1.php";
document.forms.nome_formulario.submit();
}
</script>

<script LANGUAGE="JavaScript">
function Botao3()
{
document.nome_formulario.action="deletamateriais1.php";
document.forms.nome_formulario.submit();
}
</script>










</head>


<form action="baixamamateriais.php" method="post" name="nome_formulario">


<?


$navegando=$_GET['navegando'];


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
$modelopesquisa=$_GET['modelopesquisa'];
$anopesquisa=$_GET['anopesquisa'];
$fabricantepesquisa=$_GET['fabricantepesquisa'];
$ativopesquisa=$_GET['ativopesquisa'];
$seriepesquisa=$_GET['seriepesquisa'];
$patrimoniopesquisa=$_GET['patrimoniopesquisa'];
$localizacaopesquisa=$_GET['localizacaopesquisa'];
$familiapesquisa=$_GET['familiapesquisa'];
$baseoracle=$_GET['baseoracle'];
$month=$_GET['month'];
$year=$_GET['year'];
$dia=$_GET['dia'];
$fabricapesquisa=$_GET['fabricapesquisa'];
$usuario=$_GET['usuario'];
$banco=$_GET['banco'];
$pagina=$_GET['pagina'];
$ambiente=$_GET['ambiente'];
$localbanco=$_GET['localbanco'];
$listaordemselecionada=$_GET['listaordemselecionada'];
$fabricaescolha=$_GET['fabricaescolha'];
$componente=$_GET['componente'];
$acaoeliminar=$_GET['acaoeliminar'];
$acaogravar=$_GET['acaogravar'];
$atividadegrava=$_GET['atividadegrava'];
$fabricapesquisa=$_GET['fabricapesquisa'];
$atividadegrava=$_GET['atividadegrava'];
$componente=$_GET['componente'];



}
if ($continuarmesmatela=="sim"){
$codigousuario=$_POST['codigousuario'];
$codigoempresa=$_POST['codigoempresa'];
$escolha=$_POST['escolha'];
$tela=$_POST['tela'];
$curva=$_POST['curva'];
$pesomedio=$_POST['pesomedio'];
$turnopesquisa1=$_POST['turnopesquisa1'];
$turnopesquisa2=$_POST['turnopesquisa2'];
$turno=$_POST['turno'];
$ano=$_POST['ano'];
$ano2=$_POST['ano2'];
$mes=$_POST['mes'];

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
            $itempesquisa2=$_POST['itempesquisa2'];
            $itempesquisa1=$_POST['itempesquisa2'];
            $tipoconsulta1=$_POST['tipoconsulta1'];
            $modelopesquisa=$_POST['modelopesquisa'];
            $anopesquisa=$_POST['anopesquisa'];
            $fabricapesquisa=$_POST['fabricapesquisa'];
            $ativopesquisa=$_POST['ativopesquisa'];
            $seriepesquisa=$_POST['seriepesquisa'];
            $patrimoniopesquisa=$_POST['patrimoniopesquisa'];
            $localizacaopesquisa=$_POST['localizacaopesquisa'];
            $familiapesquisa=$_POST['familiapesquisa'];
            $fabricapesquisa=$_POST['fabricapesquisa'];
            $selecaofabrica=$_POST['selecaofabrica'];
            $contadorlinha=$_POST['contadorlinha'];
            $contadorfamilia=$_POST['contadorfamilia'];
            $contadorfabrica=$_POST['contadorfabrica'];
            $contadorregiao=$_POST['contadorregiao'];
            $contadordistrito=$_POST['contadordistrito'];


            $listamodelo=$_POST['listamodelo'];
            $listafamilia=$_POST['listafamilia'];
            $lista=$_POST['lista'];
            $listafabricante=$_POST['listafabricante'];
            $listaano=$_POST['listaano'];
            $listaregiao=$_POST['listaregiao'];
            $listadistrito=$_POST['listadistrito'];
            $listafabrica=$_POST['listafabrica'];
            $baseoracle=$_POST['baseoracle'];
            $habilita=$_POST['habilita'];

            $usuario=$_POST['usuario'];
            $usuarioinicio=$_POST['usuarioinicio'];
            $senha=$_POST['senha'];
            $senhanova=$_POST['senhanova'];

            $contador66=$_POST['contador66'];
            $listaordem=$_POST['listaordem'];
            $contadorordem=$_POST['contadorordem'];
            $peca=$_POST['peca'];
            $quantidadepeca=$_POST['quantidadepeca'];
            $ordematual=$_POST['ordematual'];
            $atual=$_POST['atual'];
            $datapesquisa1=$_POST['datapesquisa1'];
            $fabricapequisa=$_POST['fabricapequisa'];
            $ordembaixa=$_POST['ordembaixa'];
            $databaixa=$_POST['databaixa'];
            $grupoordens=$_POST['grupoordens'];
            $tipo=$_POST['tipo'];
            $codigomaquina=$_POST['codigomaquina'];
            $fabricaescolha=$_POST['fabricaescolha'];
            $numeroordempesquisa=$_POST['numeroordempesquisa'];
            $modalidade=$_POST['modalidade'];
            $acaogravar=$_POST['acaogravar'];
            $listaordemselecionada=$_POST['listaordemselecionada'];
            $cadastro=$_POST['cadastro'];
            $hora=$_POST['hora'];
            $hora2=$_POST['hora2'];
            $componente=$_POST['componente'];
            $recomendacao=$_POST['recomendacao'];
            $atividadegrava=$_POST['atividadegrava'];
            $contadoreliminar=$_POST['contadoreliminar'];
            $edicao=$_POST['edicao'];
            $atividadepequisa=$_POST['atividadepequisa'];
            $solicitantepesquisainicial=$_POST['solicitantepesquisainicial'];
            $requisicao=$_POST['requisicao'];
            $datasolicitacao=$_POST['datasolicitacao'];
            $solicitante=$_POST['solicitante'];
            $item=$_POST['item'];
            $quantidade=$_POST['quantidade'];
            $materialpesquisa=$_POST['materialpesquisa'];
            $listaordemselecionada=$_POST['listaordemselecionada'];
            $descricaomaterialpesquisa=$_POST['descricaomaterialpesquisa'];

}

echo "Banco:$banco";

$programa="conexao_baixaordem.php";
require("configuraoracle.php");
require("estilo2.css");

require("configuramysql.php");


  if (!IsSet($ano)){
   $ano=date('Y');
  }

  if (!IsSet($mes)){
$mes=date('m');
}


?>





<center><font style='font-size: 32px;color: black;text-align:left;bold: Negrito' >Baixa de Ordens - Materiais</br>
<?
echo "Ordem:$listaordemselecionada</br>";
?>
</font></center>

 <font style='font-size: 13px;color: black;text-align:left;bold: Negrito' >
 Codigo Material:<input type="TXT"  name="materialpesquisa"  value= "<?echo $materialpesquisa;?>" size="10">
 Descrição:<input type="TXT" name="descricaomaterialpesquisa"  value= "<?echo $descricaomaterialpesquisa;?>" size="10">

 Defeito:<select name="defeitopesquisa" style="background-color:#8B8378;color: white;">
                 <option value="<?echo $defeitopesquisa;?>"><? echo $defeitopesquisa;?></option>
                 <option value="">Sem Defeito</option>
                 <?
                 $result2 = "SELECT CD_DEFEITO ,DS_DEFEITO FROM defeitos order by ds_defeito asc";
				 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
					print "<option value=\"{$row["CD_DEFEITO"]}\">{$row["CD_DEFEITO"]}-{$row["DS_DEFEITO"]}</option>";
                 }
				 ?>
				 </select>
				 
				 Motivo:<select name="motivopesquisa" style="background-color:#8B8378;color: white;">
                 <option value="<?echo $motivopesquisa;?>"><? echo $motivopesquisa;?></option>
                 <option value="">Sem Defeito</option>
                 <?
                 $result2 = "SELECT CD_MOTIVO,DS_MOTIVO FROM MOTIVO order by ds_motivo asc";
				 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
					print "<option value=\"{$row["CD_MOTIVO"]}\">{$row["CD_MOTIVO"]}-{$row["DS_MOTIVO"]}</option>";
                 }
				 ?>
				 </select>

                      Mes:<input type="txt" name="mes"  size="5" value="<?echo $mes;?>">
			          Ano:<input type="txt" name="ano"  size="5" value="<?echo $ano;?>">



 
 <input type="SUBMIT" onclick="Botao1()" value="Definir Parâmtros"></input>
 <input type="button" onclick="Botao3()" value="Eliminar"></input>
 <input type="button" onclick="Botao2()" value="Gravar"></input>

 		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="banco" value="<?echo $banco;?>">
		<input type="hidden" name="listaordemselecionada" value="<?echo $listaordemselecionada;?>">
		 <input type="hidden" name="baseoracle" value="<?echo $baseoracle;?>">
		<input type="hidden" name="localbanco" value="<?echo $localbanco;?>">
		<input type="hidden" name="ambiente" value="<?echo $ambiente;?>">

        <input type="hidden" name="atividadegrava" value="<?echo $atividadegrava;?>">
        <input type="hidden" name="componente" value="<?echo $componente;?>">




<hr>


<div id="envolve">
<div id="div_1">


   <center><font style='font-size: 15px;color: black;text-align:left;bold: Negrito' >Materiais  Associados</br>
 <table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="90%">

<tr>

                <th>Codigo</th>
				<th>Materiais</th>
    			<th>Unid</th>
                <th>Quant</th>
                <th>Data</th>










</tr>


<?
//novosregistros
         $s = OCIParse($ora_conexao, "SELECT a.CD_MATERIAL CODIGOMAT,b.ds_material DESCRICAOMAT,b.cd_unidade UNIDADE,
         a.data_baixa_individual DATA,a.quant  VALOR,a.numero OS
         FROM comp_mat_emer a,mat_pecas b
         where a.cd_material=b.cd_material
         order by  a.CD_MATERIAL,a.data_baixa_individual desc
         ");


         OCIExecute($s, OCI_DEFAULT);
    While (OCIFetch($s)) {
      $codigomaterial7=ociresult($s, "CODIGOMAT") ;
      $descricaomaterial7=ociresult($s, "DESCRICAOMAT") ;
      $descricaounid=ociresult($s, "UNIDADE") ;
      $quanti=ociresult($s, "VALOR") ;
      $databaixa=ociresult($s, "DATA") ;
      $os=ociresult($s, "OS") ;





               ?>

			       <tr>



					<td  align="left"><?echo $codigomaterial7;?></td>
                    <td  align="left"><?echo $descricaomaterial7;?></td>

       			    <td  align="left"><?echo $descricaounid;?></td>

                    <td  align="left"><?echo $quanti;?></td>


                    <td  align="left"><?echo $databaixa;?></td>

					</tr><?


                    }

 ?>
 </table>




 <center><font style='font-size: 15px;color: black;text-align:left;bold: Negrito' >Materiais e Defeitos Associados</br>
 <table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="90%">

<tr>

                <th>Codigo</th>
				<th>Materiais</th>
    			<th>Unid</th>
                <th>Quant</th>
                <th>Data</th>
                <th>Defeito</th>
                <th>Motivo</th>









</tr>


<?
//novosregistros
         $s = OCIParse($ora_conexao, "SELECT a.CD_MATERIAL CODIGOMAT,b.ds_material DESCRICAOMAT,b.cd_unidade UNIDADE,
         a.data_baixa_individual DATA,a.quant  VALOR,a.numero OS,d.DS_DEFEITO DEFEITO,e.DS_MOTIVO MOTIVO
         FROM comp_mat_emer a,mat_pecas b,DEFEITOS d,MOTIVO e,DEFEITO_MATERIAL c
         where a.cd_material=b.cd_material and
         a.numero=c.numero and
         b.cd_material=c.CD_MATERIAL and
         a.data_baixa_individual=c.data_baixa_individual and
         c.cd_defeito=d.cd_defeito and
         c.cd_motivo=e.cd_motivo order by  a.CD_MATERIAL,a.data_baixa_individual desc
         ");
         $quebralinha="sim";

         OCIExecute($s, OCI_DEFAULT);
    While (OCIFetch($s)) {
      $codigomaterial7=ociresult($s, "CODIGOMAT") ;
      $descricaomaterial7=ociresult($s, "DESCRICAOMAT") ;
      $descricaounid=ociresult($s, "UNIDADE") ;
      $quanti=ociresult($s, "VALOR") ;
      $databaixa=ociresult($s, "DATA") ;
      $os=ociresult($s, "OS") ;
      $defeito77=ociresult($s, "DEFEITO") ;
            $motivo77=ociresult($s, "MOTIVO") ;

            if ($materialquesta==$codigomaterial7 and $dataquestao==$databaixa){

             $quebralinha="nao";
            }
            else
            {

              $quebralinha="sim";

            }



               ?>

			       <tr>

                    <?
                    if ($quebralinha=="sim"){?>
					<td  align="left"><?echo $codigomaterial7;?></td>
                    <td  align="left"><?echo $descricaomaterial7;?></td>
                    
       			    <td  align="left"><?echo $descricaounid;?></td>

                    <td  align="left"><?echo $quanti;?></td>


                    <?}
                    else
                    {
                    ?>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>

                    <?
                    }
                    ?>
                    <td  align="left"><?echo $databaixa;?></td>
                    <td  align="left"><?echo $defeito77;?></td>
       			    <td  align="left"><?echo $motivo77;?></td>

					</tr><?

                    $materialquesta=$codigomaterial7;
                    $dataquestao=$databaixa;

                    }

 ?>
 </table>




 
 </div>
 
 <div id="div_2">
 <center><font style='font-size: 22px;color: black;text-align:left;bold: Negrito' >Novos Registros</br>


			          
<CENTER><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="600">

<tr>
                <th>Codigo</th>
				<th>Materiais</th>
    			<th>Unid</th>
                <th>Quant</th>
                <th>Dia</th>

                <th>Cod Defeito</th>
                <th>Cod Motivo</th>
                <th>Localização</th>









</tr>


<?
//novosregistros
         $s = OCIParse($ora_conexao, "SELECT CD_MATERIAL,DS_MATERIAL,CD_UNIDADE FROM mat_pecas where cd_material like '%$materialpesquisa%' and
                       DS_MATERIAL like '%$descricaomaterialpesquisa%'
                       order by CD_MATERIAL ASC
                       ");

         OCIExecute($s, OCI_DEFAULT);
    While (OCIFetch($s)) {
      $codigomaterial7=ociresult($s, "CD_MATERIAL") ;
      $descricaomaterial7=ociresult($s, "DS_MATERIAL") ;
      $unidade7=ociresult($s, "CD_UNIDADE") ;

               ?>

			       <tr>

					<td  align="left"><?echo $codigomaterial7;?></td>
				    <td  align="left"><?echo $descricaomaterial7;?></td>
       			    <td  align="left"><?echo $unidade7;?></td>

                    <td  align="left"><input type="TXT" SIZE="3" name="quantidade[]" value="0" >
                    <input type="hidden" name="lista[]" value="<?echo $codigomaterial7;?>"></td>
                     <td  align="left"><input type="TXT" SIZE="3" name="data[]"  size="2" value="0" ></td>
                    
                    <td  align="left"><input type="TXT" SIZE="3" name="defeito[]" value="<?echo $defeitopesquisa;?>" ></td>
                    <td  align="left"><input type="TXT" SIZE="3" name="motivo[]" value="<?echo $motivopesquisa;?>" ></td>
                    <td  align="left"><input type="TXT" SIZE="3" name="localizacao[]" value="" size="40" ></td>





                    <?

                    ?>








					</tr><?
					}

 ?>
 </table>









</div>

</div>

<?



?>
</form>


</html>
