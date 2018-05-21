<html>

<head>
</head>


<form action="incluirmateriais1.php" method="post">


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





<center><font style='font-size: 32px;color: black;text-align:left;bold: Negrito' >Baixa de Ordens - Materiais</font>
<font style='font-size: 15px;color: black;text-align:left;bold: Negrito' ><?
echo "Ordem:$listaordemselecionada</br>";


ECHO "Gravando Registros";


                 $gravamat1= "select count(*) CONTADOR FROM mat_pecas where cd_material like '%$materialpesquisa%' and
                       DS_MATERIAL like '%$descricaomaterialpesquisa%'";
                 $gravamat12= @OCIParse($ora_conexao, $gravamat1);
				 @OCIExecute($gravamat12, OCI_DEFAULT);
				 while (OCIFetchInto($gravamat12,&$row8, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  $totalregistros=ociresult($gravamat12, "CONTADOR") ;


                 }





  $lista=$_POST['lista'];
  $quantidade=$_POST['quantidade'];
  $localizacao=$_POST['localizacao'];
  $data=$_POST['data'];
  $defeito=$_POST['defeito'];
  $motivo=$_POST['motivo'];



 for ($passa=0;$passa <=$totalregistros;$passa++)
 {

 $quantidade2=$quantidade[$passa];
 $material28=$lista[$passa];
 $localizacao2=$localizacao[$passa];
 $data2=$data[$passa];
 $defeito2=$defeito[$passa];
 $motivo2=$motivo[$passa];


     if ($quantidade2 >"0"){

               $datapesquisa1=$data2."/".$mes."/".$ano;

                                  if ($tipograva=="Ordem Não Planejada"){


                                  $sgrava1= OCIParse($ora_conexao, "insert into COMP_MAT_EMER(cd_atividade,
                                  cd_componente,
                                  numero,
                                  cd_material,
                                  quant,
                                  localizacao,data_baixa_individual) values
                                  ('$atividadegrava','$componente',$listaordemselecionada,'$material28',
                                  $quantidade2,'$localizacao2','$datapesquisa1')
                                  ");
                                  OCIExecute($sgrava1, OCI_DEFAULT);
                                  oci_commit($ora_conexao);


                                  if ($defeito2 >"0" and $motivo2>"0"){
                                  $sgrava1= OCIParse($ora_conexao, "insert into DEFEITO_MATERIAL(cd_atividade,
                                  cd_componente,
                                  numero,
                                  cd_defeito,
                                  cd_motivo,
                                  CD_MATERIAL,
                                  data_baixa_individual
                                  ) values
                                  ('$atividadegrava','$componente',$listaordemselecionada,'$defeito2','$motivo2',
                                  '$material28','$datapesquisa1')
                                  ");
                                  OCIExecute($sgrava1, OCI_DEFAULT);
                                  oci_commit($ora_conexao);
                                  }
                                  else
                                  {
                                  echo "Defeito e Motivo não Associado ao Material";
                                  }


                                  }//ordem nao planejada
                                  echo "Material:$material28 Gravado com Sucesso..";

     }
     else
     {
     echo "Necessita Definir Quantidade";
     }

 }

?>
</br>

<a href="baixamamateriais.php?escolha=Baixar final&tela=0&mes=<?echo $mes;?>&ano=<?echo $ano;?>&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>&ano=<?echo $ano;?>&componente=<?echo $componente;?>&codigousuario=<?echo $codigousuario;?>&listaordemselecionada=<? echo $listaordemselecionada;?>&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&banco=<?echo $banco;?>&ambiente=<?ECHO $ambiente;?>&baseoracle=<?ECHO $baseoracle;?>&localbanco=<?ECHO $localbanco;?>&atividadegrava=<?ECHO $atividadegrava;?>&acaogravar=novarequisicaomaterial&atividadegrava=<?ECHO $atividadegrava;?>&componente=<?ECHO $componente;?>">
                                         Retornar</a>
</form>
</form>

</html>
