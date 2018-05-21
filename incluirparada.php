<html>

<head>
</head>


<form action="incluirparada.php" method="post">


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


                                  $achamaxp= OCIParse($ora_conexao, "select MAX(NR_SEQUENCIA) MAXIMA FROM horas_paradas ");
                        OCIExecute($achamaxp, OCI_DEFAULT);
                        While (OCIFetch($achamaxp)) {
                         $sequenciamaximaparada77=ociresult($achamaxp, "MAXIMA") ;
                        }

                        if ($sequenciamaximaparada77 >"0"){
                            $sequenciamaximaparada=$sequenciamaximaparada77+1;
                        }
                        else
                        {
                           $sequenciamaximaparada="1";
                        }

                        if ($hora =="00:00"){
                        $horagravainicio="00:00";
                        }
                        else
                        {
                         $horagravainicio=$hora;
                        }


                        $diachega=substr($data,0,2);
                        $meschega=substr($data,4,2);
                        $anochega=substr($data,6,4);



                        if ($data ==null){

                        }
                        else
                        {

                          
                          $achadata33= OCIParse($ora_conexao, "SELECT to_char(max(data_servico),'dd/mm/yyyy') DATA,
                             hora_fim  HORA FROM horas_paradas
                             WHERE ORDEM='$listaordemselecionada' group by hora_fim ");
                             OCIExecute($achadata33, OCI_DEFAULT);
                             While (OCIFetch($achadata33)) {
                               $datapegou1x=ociresult($achadata33, "DATA") ;
                               $horapegou1x=ociresult($achadata33, "HORA") ;
                             }

                             $diapega=substr($datapegou1x,0,2);
                             $mespega=substr($datapegou1x,4,2);
                             $anopega=substr($datapegou1x,6,4);

                             $diahoje=date('d');
                             $meshoje=date('m');
                             $anohoje=date('Y');


                       
                       
                         if ($anochega  >=$anopega){

                            if ($anochega >$anopega){
                             $podegrvar="sim";
                            }
                            else
                            {
                              if ($meschega >=$mespega){
                                  if ($meschega >$mespega){
                                  $podegrvar="sim";
                                  }
                                  else
                                  {
                                   if ($diachega >=$diapega){
                                         if ($diachega >$diapega){
                                          $podegrvar="sim";
                                         }
                                         else
                                         {
                                            if ($horagravainicio >=$horapegou1x)
                                            {
                                             $podegrvar="sim";
                                            }
                                            else
                                            {
                                              echo "Hora Esta Fora";
                                             $podegrvar="nao";
                                            }

                                         }

                                   }
                                   else
                                   {
                                    echo "Dia esta fora";
                                    $podegrvar="nao";
                                   }



                                  }


                              }
                              else
                              {
                               echo "Mes esta fora";
                               $podegrvar="nao";
                              }


                            }

                         }
                         else
                         {
                         echo "Ano esta fora";
                         $podegrvar="nao";
                         }


                        if ($anochega>=$anohoje and $meschega>=$meshoje and $diachega>$diahoje){

                          $podegrvar="nao";
                          echo "Dia Superior ao dia Atual";
                        }
                        
                        if ($hora2 <=$horagravainicio){

                          $podegrvar="nao";
                          echo "Hora Fim nao Pode ser ..";
                        }

                            if ($podegrvar=="sim"){

                            $sgrava1= OCIParse($ora_conexao, "insert into horas_paradas (nr_sequencia,ordem,data_servico,hora_inicio,
                            hora_fim,id_volta_operar)
                            values('$sequenciamaximaparada','$listaordemselecionada','$data','$horagravainicio','$hora2','$libera')");
                            OCIExecute($sgrava1, OCI_DEFAULT);
                            oci_commit($ora_conexao);
                            }

                       }//existe data





?>
</br>

<a href="paradaordens.php?escolha=Baixar final&tela=0&mes=<?echo $mes;?>&ano=<?echo $ano;?>&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>&ano=<?echo $ano;?>&componente=<?echo $componente;?>&codigousuario=<?echo $codigousuario;?>&listaordemselecionada=<? echo $listaordemselecionada;?>&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&banco=<?echo $banco;?>&ambiente=<?ECHO $ambiente;?>&baseoracle=<?ECHO $baseoracle;?>&localbanco=<?ECHO $localbanco;?>&atividadegrava=<?ECHO $atividadegrava;?>&acaogravar=novarequisicaomaterial&atividadegrava=<?ECHO $atividadegrava;?>&componente=<?ECHO $componente;?>">
                                         Retornar</a>
</form>
</form>

</html>
