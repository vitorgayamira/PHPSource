<html>

<head>
</head>


<form action="deletamateriais1.php" method="post">


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
            $grupoordens=$_POST['grupoordens'];

}



$programa="conexao_baixaordem.php";
require("configuraoracle.php");
require("estilo2.css");

require("configuramysql.php");


                      $achatipoordem = OCIParse($ora_conexao, "SELECT COUNT(*) VALOR FROM EMER_COMP WHERE NUMERO='$listaordemselecionada'");
                      OCIExecute($achatipoordem, OCI_DEFAULT);
                        While (OCIFetch($achatipoordem)) {
                            $existetipocorretiva=ociresult($achatipoordem, "VALOR") ;

                        }
                        IF ($existetipocorretiva=="1"){

                        $tipograva="Ordem Não Planejada";
                        }
                        else
                        {
                        $tipograva="Ordem Planejada";

                        }


echo "Banco:$banco - Tipo :$tipograva- Atividade:$atividadegrava - Componente:$componente</br>";
?>





<center><font style='font-size: 32px;color: black;text-align:left;bold: Negrito' >Eliminando  Materiais</font>
<font style='font-size: 15px;color: black;text-align:left;bold: Negrito' ><?
echo "Ordem:$listaordemselecionada</br>";

?>


<center><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="600">

<tr>
  <th>Codigo</th>
				<th>Materiais</th>
    			<th>Unid</th>
                <th>Quant</th>
                <th>Data</th>
                <th>Seleçaõ</th>
</tr>


<?

 $sachavei= OCIParse($ora_conexao, "SELECT a.CD_MATERIAL CODIGOMAT,b.ds_material DESCRICAOMAT,b.cd_unidade UNIDADE,
         a.data_baixa_individual DATA,a.quant  VALOR,a.numero OS
         FROM comp_mat_emer a,mat_pecas b
         where a.cd_material=b.cd_material
         order by  a.CD_MATERIAL,a.data_baixa_individual desc");
         OCIExecute($sachavei, OCI_DEFAULT);
         While (OCIFetch($sachavei)){



      $codigomaterial7=ociresult($sachavei, "CODIGOMAT") ;
      $descricaomaterial7=ociresult($sachavei, "DESCRICAOMAT") ;
      $descricaounid=ociresult($sachavei, "UNIDADE") ;
      $quanti=ociresult($sachavei, "VALOR") ;
      $databaixa=ociresult($sachavei, "DATA") ;


   ?>
   <tr>
                    <td  align="left"><?echo $codigomaterial7;?></td>
                    <td  align="left"><?echo $descricaomaterial7;?></td>

       			    <td  align="left"><?echo $descricaounid;?></td>

                    <td  align="left"><?echo $quanti;?></td>
                    <td  align="left"><?echo $databaixa;?></td>

   <td><input type="checkbox" name="lista[]" value="<?echo $codigomaterial7;?>">
   <input type="hidden" name="lista2[]" value="<?echo $databaixa;?>"></td>
   </tr>
 <?}

 ?>

</table>



<input type="hidden" name="escolha" size="5" value="CONFIRMAELIMINA" >

<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="banco" value="<?echo $banco;?>">
		<input type="hidden" name="valorcalculo" value="<?echo $valorcalculo;?>">
		<input type="hidden" name="mes" value="<?echo $mes;?>">
		<input type="hidden" name="ano" value="<?echo $ano;?>">
		
		<input type="hidden" name="listaordemselecionada" value="<?echo $listaordemselecionada;?>">
		



<input type="submit"    value="Confirma">

<?
if ($escolha=="CONFIRMAELIMINA")
{
$listamate=$_POST['lista'];
$listadata=$_POST['lista2'];

         $result2xistevei89 = "select count(*) CONTADOR  FROM comp_mat_emer a,mat_pecas b
         where a.cd_material=b.cd_material ";

                                  $result3ver89 = @OCIParse($ora_conexao, $result2xistevei89);
				                  @OCIExecute($result3ver89, OCI_DEFAULT);
				                  while (OCIFetchInto($result3ver89,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				                  {
                                    $ultimo=ociresult($result3ver89, "CONTADOR") ;
                                  }




 for ($passa=0;$passa <=$ultimo;$passa++)
 {


	     $acao=$listamate[$passa];
	     $acao2=$listadata[$passa];



             if ($acao >"0" and $acao2 >"0"){
             
             echo "delete from   COMP_MAT_EMER  WHERE numero='$listaordemselecionada'
             and cd_material='$acao' and data_baixa_individual='$acao2'";

             $sgrava1= OCIParse($ora_conexao, "delete from   COMP_MAT_EMER  WHERE numero='$listaordemselecionada'
             and cd_material='$acao' and data_baixa_individual='$acao2'
             ");
             OCIExecute($sgrava1, OCI_DEFAULT);
             oci_commit($ora_conexao);
             
             $sgrava1= OCIParse($ora_conexao, "delete from   DEFEITO_MATERIAL  WHERE numero='$listaordemselecionada'
             and cd_material='$acao' and data_baixa_individual='$acao2'
             ");
             OCIExecute($sgrava1, OCI_DEFAULT);
             oci_commit($ora_conexao);

             }

}//final do loop
?><center><? ECHO "Ação Eliminada";
}//FIANL DA TELA
?>

</br>

<a href="baixamamateriais.php?escolha=Baixar final&tela=0&mes=<?echo $mes;?>&ano=<?echo $ano;?>&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>&ano=<?echo $ano;?>&componente=<?echo $componente;?>&codigousuario=<?echo $codigousuario;?>&listaordemselecionada=<? echo $listaordemselecionada;?>&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&banco=<?echo $banco;?>&ambiente=<?ECHO $ambiente;?>&baseoracle=<?ECHO $baseoracle;?>&localbanco=<?ECHO $localbanco;?>&atividadegrava=<?ECHO $atividadegrava;?>&acaogravar=novarequisicaomaterial&atividadegrava=<?ECHO $atividadegrava;?>&componente=<?ECHO $componente;?>">
                                         Retornar</a>
</form>


</html>
