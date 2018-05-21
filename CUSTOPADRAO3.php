<?require("estilo2_sitenovo.css");
ini_set('display_errors', '0');// NÃƒO HABILITAD 

$edusuario=$_SESSION['edusuario'];
					 $edsenha=$_SESSION["edsenha"];
                     $db=$_SESSION["db"];
                     $bd=$_SESSION["bd"];
                     $host=$_SESSION["host"];
                     $user=$_SESSION["user"];
                     $pass=$_SESSION["pass"];
					 
					 $codigoempresa=$_SESSION["codigoempresa"];
                     $razaoempresa=$_SESSION["razaoempresa"];
					 $nomepessoa4=$_SESSION["nomepessoa4"];
                     $magemtopoinicial=$_SESSION["magemtopoinicial"];
					 $razaoempresa=$_SESSION['razaoempresa'];
					 $nomeempresaconexao=$_SESSION['nomeempresaconexao'];

                     $pagina_atual = $_GET['pagina_atual'];
					 
					 $escolha=$_GET['escolha'];

					 
require("conexaoadodb_oracle.php");
require_once('manipulasql.class_oraclenovo.php');
$programa="CUSTOPADRAO3.php";
$titulo="Consulta Custo Padrão ";
?>

<form  method="POST">
<?require("areasuperior2.php");

require("carregamenumilenionovo2.php");?>

<a href="CUSTOPADRAO3.php?pagina=1&escolha=pesquisa&programa=<?echo $programa;?>&passapesquisainicial=<?echo $passapesquisainicial;?>&numerocolunastela=<?echo $numerocolunastela;?>&campolista1=<?echo $campolista1;?>&campolista2=<?echo $campolista2;?>&seelctcampolista1=<?echo $seelctcampolista1;?>&seelctcampolista2=<?echo $seelctcampolista2;?>&nometabelaparapassar=<?echo $nometabelaparapassar;?>&titulojanelapesquisa=<?echo $titulojanelapesquisa;?>&campolista3=<?echo $campolista3;?>&seelctcampolista3=<?echo $seelctcampolista3;?>&campolista4=<?echo $campolista4;?>&seelctcampolista4=<?echo $seelctcampolista4;?>">
<img  src="novocalculo.png"  align="center" width='70' height='75' ></a>
<?


$navegando=$_GET['navegando'];
$continuarmesmatela=$_POST['continuarmesmatela'];

if ($navegando=="sim"){
$acao=$_GET['acao'];
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
$veiculo=$_GET['veiculo'];
$cadastro=$_GET['cadastro'];
$mudoumes=$_GET['mudoumes'];
$dataanterior=$_GET['dataanterior'];
$mesanterior=$_GET['mesanterior'];
$contador=$_GET['contador'];
$cadastropesquisa=$_GET['cadastropesquisa'];
$combustivelpesquisa=$_GET['combustivelpesquisa'];
$localbanco=$_GET['localbanco'];
$veiculocodigoe=$_GET['veiculocodigoe'];




}
if ($continuarmesmatela=="sim"){
$codigousuario=$_POST['codigousuario'];
$acao=$_POST['acao'];
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
            $acao=$_POST['acao'];
            $cordiv=$_POST['cordiv'];
            $krodado=$_POST['krodado'];
            $horimetro=$_POST['horimetro'];
            $veiculo=$_POST['veiculo'];
            $combustivel=$_POST['combustivel'];
            $quantidade=$_POST['quantidade'];
            $destinoestoque=$_POST['destinoestoque'];
            $data1=$_POST['data1'];
$data2=$_POST['data2'];
$novo=$_POST['novo'];
$month=$_POST['month'];
$contador=$_POST['contador'];
$cadastropesquisa=$_POST['cadastropesquisa'];
$combustivelpesquisa=$_POST['combustivelpesquisa'];
$veiculocodigoe=$_POST['veiculocodigoe'];
$year=$_POST['year'];
$datapesquisainicial=$_POST['datapesquisainicial'];
$datapesquisafinal=$_POST['datapesquisafinal'];

}

$grafico2="detalhegraficomaximizacustopart.php";
$grafico1="detalhegraficomaximizacustoequi.php";
$grafico3="detalhegraficomaximizacustomes.php";

if (!IsSet($escolha) or ($escolha=="1"))
{ 
?>
<a href="http://186.202.46.98:8080/osi/"><IMG src="iconesolicitacao.png" align="center" width="70" height="75" ></a>

<a href="classegraficocusto1.php?escolha=pesquisadografico&navegando=sim&grafico1=<?echo $grafico1;?>&grafico2=<?echo $grafico2;?>&grafico3=<?echo $grafico3;?>&programa=<?echo $programa;?>&data1=<?echo $data1;?>&data2=<?echo $data2;?>&fabrica=<?echo $solicitantepesquisa;?>&area=<?echo $areapesquisa;?>&secao=<?echo $secaopesquisa;?>&centro=<?echo $centropesquisa;?>&maquina=<?echo $maquina;?>"><IMG src="grafico.png" align="center" width='70' height='75' ></a>
 


<?
if(empty($fabricapesquisa)   or empty($anopesquisa))
{
	?>
						 <center><table  border=0
                         style='background:white;' width="80%" align="center">
						 <tr>
						 <td><titulogeral><? echo "$titulo";?></titulogeral></td>
						 <td>
						 <?$achaparametros66= "select vl_parametro  from parametro_grafico where ds_programa='$programa'  and ds_parametro='Unidade'";
						   $achaparametros662= $conn->Execute($achaparametros66);
						   $parametro=$achaparametros662->fields["0"];
						   echo "Unidade:$parametro";
						   
						   $achaparametros66= "select vl_parametro  from parametro_grafico where ds_programa='$programa'  and ds_parametro='Ano GeraÃ§Ã£o'";
						   $achaparametros662= $conn->Execute($achaparametros66);
						   $parametro2=$achaparametros662->fields["0"];
						   
						   echo " Ano Geração:$parametro2";
						 						   
						 ?>
						 </td>
						 <td>
						 <?$achaparametros= "select distinct ds_usuario,to_char(dt_geracao,'dd/mm/yyyy') from parametro_grafico where ds_programa='$programa'";
                         $achaparametros2= $conn->Execute($achaparametros);
		                 $usuariogerou=$achaparametros2->fields["0"];
						 $datagerou=$achaparametros2->fields["1"];
						 echo "Usuário Geração:$usuariogerou -->$datagerou";
						 ?>
						 
						 
						 </td>
						 </tr>
						 </table>
	
<?	
}
else
{
	
	
	

                               $usu18uss = "delete from AUX_CONSULTA_CUSTO_ANO";
					           $resultuss = $conn->Execute($usu18uss);
							   $usu18uss = "delete from AUX_CONSULTA_CUSTO_ANO_PART";
					           $resultuss = $conn->Execute($usu18uss);
							   $usu18uss = "delete from parametro_grafico where ds_programa='$programa'";
							   
					           $resultuss = $conn->Execute($usu18uss);
							   
							   

 $sqachames= "SELECT  CD_MES MES,QT_DIAS DIA from meses_bi order by cd_mes asc";
 $sqachames2= $conn->Execute($sqachames);
 while ( !$sqachames2->EOF)
 {
	  
                  $mesamostra=$sqachames2->fields["0"];
				  $ultimodia=$sqachames2->fields["1"];
 
                 $datapesquisainicial="01/".$mesamostra."/".$anopesquisa;
                 $datapesquisafinal=$ultimodia."/".$mesamostra."/".$anopesquisa;



  //grava a auxiliar

  $sm="select DISTINCT a.cd_componente CODIGOEQUIPAMENTO,d.cd_maquina MAQUINA
  from
  rot_compo_mt a,mat_pecas b,ORDEM_COMP c,componente_auxiliar d
  where a.cd_material=b.cd_material AND
  b.flag='M' and
  a.cd_componente=c.cd_componente and
  a.cd_componente=d.cd_compo and
  a.cd_atividade=c.cd_atividade and
  c.STATUS='G' and
  c.cd_fabrica='$fabricapesquisa' and
  c.data_plane >=to_date('$datapesquisainicial','dd/mm/YYYY') and
  c.data_plane <=to_date('$datapesquisafinal','dd/mm/YYYY')
  union
  select DISTINCT a.cd_componente CODIGOEQUIPAMENTO,d.cd_maquina MAQUINA
  from
  rot_compo_pc a,mat_pecas b,ORDEM_COMP c,componente_auxiliar d
  where a.cod_peca=b.cd_material AND
  b.flag='P' and
  a.cd_componente=c.cd_componente and
  a.cd_componente=d.cd_compo and
  a.cd_atividade=c.cd_atividade and
  c.STATUS='G' and
  c.cd_fabrica='$fabricapesquisa' and
  c.data_plane >=to_date('$datapesquisainicial','dd/mm/YYYY') and
  c.data_plane <=to_date('$datapesquisafinal','dd/mm/YYYY')
  ";
  
 
  
  
  $sm2 = $conn->Execute($sm);
  while ( !$sm2->EOF)
  {
	  
          
		 	  
          $codigoequipamento=$sm2->fields["CODIGOEQUIPAMENTO"];
          $codigomaquina=$sm2->fields["MAQUINA"];
          

          $usu18ussG = "insert into AUX_CONSULTA_CUSTO_ANO(CD_COMPONENTE,VL_CUSTO_MATERIAL,CD_MES,
                           VL_CUSTO_PECAS,VL_CUSTO_TOTAL,VL_PARTICIPACAO,cd_maquina) VALUES(
                          '$codigoequipamento','0','$mesamostra','0','0','0','$codigomaquina')";
				           
                               $resultussG = $conn->Execute($usu18ussG);
  $sm2->MoveNext();
  }
  
  
  $sm5M="select sum(a.quant*b.valor) VALOR,a.cd_componente CODIGOEQUIPAMENTO
  from
  rot_compo_mt a,mat_pecas b,ORDEM_COMP c
  where a.cd_MATERIAL=b.cd_material AND
  b.flag='M' and
  a.cd_componente=c.cd_componente and
  a.cd_atividade=c.cd_atividade and
  c.STATUS='G' and
  c.cd_fabrica='$fabricapesquisa' and
  c.data_plane >=to_date('$datapesquisainicial','dd/mm/YYYY') and
  c.data_plane <=to_date('$datapesquisafinal','dd/mm/YYYY')
  group by  a.cd_componente ORDER BY VALOR DESC
  ";
  
  
$sm25M = $conn->Execute($sm5M);
  while ( !$sm25M->EOF)
  {
	  
	  $valorcustoMAT=$sm25M->fields["VALOR"];
		
		  
          $codigoequipamento=$sm25M->fields["CODIGOEQUIPAMENTO"];
          $valorcustoMAT= str_replace(",", ".","$valorcustoMAT" );

          $usu18ussG = "UPDATE AUX_CONSULTA_CUSTO_ANO SET VL_CUSTO_MATERIAL=$valorcustoMAT
          WHERE
          CD_COMPONENTE='$codigoequipamento' AND CD_MES='$mesamostra'";
		 
		 $resultussG = $conn->Execute($usu18ussG);
  $sm25M->MoveNext();
  } 
  
  
  $sm5="select sum(a.quant*b.valor) VALOR,a.cd_componente CODIGOEQUIPAMENTO
  from
  rot_compo_pc a,mat_pecas b,ORDEM_COMP c
  where a.cod_peca=b.cd_material AND
  b.flag='P' and
  a.cd_componente=c.cd_componente and
  a.cd_atividade=c.cd_atividade and
  c.STATUS='G' and
  c.cd_fabrica='$fabricapesquisa' and
  c.data_plane >=to_date('$datapesquisainicial','dd/mm/YYYY') and
  c.data_plane <=to_date('$datapesquisafinal','dd/mm/YYYY')
  group by  a.cd_componente ORDER BY VALOR DESC
  ";
  
  
$sm25 = $conn->Execute($sm5);
  while ( !$sm25->EOF)
  {
	  
	  $valorcustopeca=$sm25->fields["VALOR"];
		
		  
          $codigoequipamento=$sm25->fields["CODIGOEQUIPAMENTO"];
          $valorcustopeca= str_replace(",", ".","$valorcustopeca" );

          $usu18ussG = "UPDATE AUX_CONSULTA_CUSTO_ANO SET VL_CUSTO_PECAS=$valorcustopeca
          WHERE
          CD_COMPONENTE='$codigoequipamento' AND CD_MES='$mesamostra'";
		 
		 $resultussG = $conn->Execute($usu18ussG);
  $sm25->MoveNext();
  } 
	
  
  
  $achazero1="select CD_COMPONENTE,VL_CUSTO_MATERIAL,VL_CUSTO_PECAS from  AUX_CONSULTA_CUSTO_ANO ";
  $sm256 = $conn->Execute($achazero1);
  while ( !$sm256->EOF)
  {
   $componente4=$sm256->fields["CD_COMPONENTE"];
   $custo14=$sm256->fields["VL_CUSTO_MATERIAL"];
   $custo15=$sm256->fields["VL_CUSTO_PECAS"];
   $custo14= str_replace(",", ".","$custo14" );
   $custo15= str_replace(",", ".","$custo15" );


   $custototal16=$custo14+$custo15;

                             $usu18ussG = "UPDATE AUX_CONSULTA_CUSTO_ANO SET VL_CUSTO_TOTAL=$custototal16 WHERE    CD_COMPONENTE='$componente4' AND CD_MES='$mesamostra'";
					         $resultussG = $conn->Execute($usu18ussG);
  $sm256->MoveNext();
  } 

  
  
  
  
                         $quantoss17mat="select TO_CHAR(SUM(VL_CUSTO_TOTAL),'99999999990.999')
                         VALOR
                         from AUX_CONSULTA_CUSTO_ANO";
                         $sm2567 = $conn->Execute($quantoss17mat);
                         $custototal7=$sm2567->fields["VALOR"];
	

  $sqachames2->MoveNext();
  }//termina calcular por mes 
  

  $gravapart="select CD_MAQUINA,SUM(VL_CUSTO_TOTAL) VALOR from AUX_CONSULTA_CUSTO_ANO GROUP BY CD_MAQUINA";
  $sm25678= $conn->Execute($gravapart);
  while ( !$sm25678->EOF)
  {
          $valorcusto44=$sm25678->fields["VALOR"];
		  $codigoequipamento=$sm25678->fields["CD_MAQUINA"];
         

         $participacao=($valorcusto44/$custototal7)*100;
         

                             $usu18ussG = "insert into AUX_CONSULTA_CUSTO_ANO_PART(CD_MAQUINA,
                           VL_PARTICIPACAO,ID_USO_GRAFICO) VALUES(
                          '$codigoequipamento',$participacao,'N')";
						  
					         $resultussG = $conn->Execute($usu18ussG);
						  



  $sm25678->MoveNext();
  }

 //grava parametros
				  $diahoje=date('d');
				  $meshoje=date('m');
				  $anohoje=date('Y');
				  
                  $datapesquisahoje=$diahoje."/".$meshoje."/".$anohoje;
				  	
				  $usu18ussMAXPED3opd = "SELECT MAX(NR_SEQUENCIA) SEQUENCIA FROM parametro_grafico";
                  $usu18ussMAXPED23opd= $conn->Execute($usu18ussMAXPED3opd);
                  $sequenciaparametro=$usu18ussMAXPED23opd->fields["0"];
                  if ($sequenciaparametro >"0"){$sequenciaparametrograva=$sequenciaparametro+1;}else{$sequenciaparametrograva="1";}
				  $usu18ussG7dgpa = "insert into parametro_grafico(nr_sequencia,ds_parametro,vl_parametro,ds_usuario,dt_geracao,ds_programa) values
				  ('$sequenciaparametrograva','Unidade','$fabricapesquisa','$edusuario',to_date('$datapesquisahoje','dd/mm/YYYY'),'$programa')";
			      $resultussG7= $conn->Execute($usu18ussG7dgpa);
				  
				  
				  
				  
				  $usu18ussMAXPED3opd = "SELECT MAX(NR_SEQUENCIA) SEQUENCIA FROM parametro_grafico";
                  $usu18ussMAXPED23opd= $conn->Execute($usu18ussMAXPED3opd);
                  $sequenciaparametro=$usu18ussMAXPED23opd->fields["0"];
				  $usu18ussG7dgpa6 = "insert into parametro_grafico(nr_sequencia,ds_parametro,vl_parametro,ds_usuario,dt_geracao,ds_programa) values
				  ('$sequenciaparametrograva','Ano GeraÃ§Ã£o','$anopesquisa','$edusuario',to_date('$datapesquisahoje','dd/mm/YYYY'),'$programa')";
			      $resultussG7= $conn->Execute($usu18ussG7dgpa6);
				  
	//mostra os parametros
    ?>
    <center><table  border=0
                         style='background:white;' width="80%" align="center">
						 <tr>
						 <td><titulogeral><? echo "$titulo";?></titulogeral></td>
						 <td>
						 <?$achaparametros66= "select vl_parametro  from parametro_grafico where ds_programa='$programa'  and ds_parametro='Unidade'";
						   $achaparametros662= $conn->Execute($achaparametros66);
						   $parametro=$achaparametros662->fields["0"];
						   echo "Unidade:$parametro";
						   
						   $achaparametros66= "select vl_parametro  from parametro_grafico where ds_programa='$programa'  and ds_parametro='Ano GeraÃ§Ã£o'";
						   $achaparametros662= $conn->Execute($achaparametros66);
						   $parametro2=$achaparametros662->fields["0"];
						   
						   echo " Ano Geração:$parametro2";
						 						   
						 ?>
						 </td>
						 <td>
						 <?$achaparametros= "select distinct ds_usuario,to_char(dt_geracao,'dd/mm/yyyy') from parametro_grafico where ds_programa='$programa'";
                         $achaparametros2= $conn->Execute($achaparametros);
		                 $usuariogerou=$achaparametros2->fields["0"];
						 $datagerou=$achaparametros2->fields["1"];
						 echo "Usuário Geração:$usuariogerou -->$datagerou";
						 ?>
						 
						 
						 </td>
						 </tr>
						 </table>	
  
  <?
  }//final quando gera o custo
?>

 <center><table  border=0
 style='background:white;' width="80%" align="center" class="tabela1">


  <th>Equipamento</th>
  <th>Jan</th>
  <th>Fev</th>
  <th>Mar</th>
  <th>Abr</th>
  <th>Mai</th>
  <th>Jun</th>
  <th>Jul</th>
  <th>Ago</th>
  <th>Set</th>
  <th>Out</th>
  <th>Nov</th>
  <th>Dez</th>
  <th>Custo Total(R$)</th>
  <th width="5%">%</th>
</tr>

<?
  $smpegaaux= "SELECT * from (select  CD_MAQUINA,TO_CHAR(VL_PARTICIPACAO,'999990.99') PART,rownum Id from AUX_CONSULTA_CUSTO_ANO_PART WHERE ID_USO_GRAFICO='N'  ORDER BY VL_PARTICIPACAO DESC)";
  //DEFINA PAGINACAO
  
                       $chacontadorgeralpagina="SELECT count(*) CONTADOR  FROM AUX_CONSULTA_CUSTO_ANO_PART";

    $registros = "38";
    require("paginacao_mi.php");
//FINAL PAGINACAO

if ($pagina_atual >"1"){$registros=$registros*$pagina_atual;}


$tabela=$smpegaaux;
$sql=$tabela." WHERE Id BETWEEN ".$inicio." and ".$registros;
  
  
  $smpegaaux2= $conn->Execute($sql);
  while ( !$smpegaaux2->EOF)
  {
        $equipamento9=$smpegaaux2->fields["CD_MAQUINA"];
		$valorpart=$smpegaaux2->fields["PART"];
        ?>
		<tr>
		<td><? echo $equipamento9;?></td>
		
		<?
         $sqachames66= "SELECT  CD_MES MES from meses_bi order by cd_mes asc";
         $sqachames667= $conn->Execute($sqachames66);
         while ( !$sqachames667->EOF)
         {
          $mesamostra7=$sqachames667->fields["MES"];
          ?>
          <td>
          <?
          $smpegaaux8= "select  TO_CHAR(SUM(VL_CUSTO_TOTAL),'999990.999') CUSTO3
          from AUX_CONSULTA_CUSTO_ANO
          WHERE CD_MES='$mesamostra7' AND CD_MAQUINA='$equipamento9' ";
          $smpegaaux81= $conn->Execute($smpegaaux8);
		  $valorcustototal=$smpegaaux81->fields["0"];
          $valorcustototalmostra=number_format($valorcustototal, 2, ',', '.');
          echo $valorcustototalmostra;
          
          ?></td>


         <?$sqachames667->MoveNext();
          }//final do mes
		  ?>
		  
		  <td>
          <?
          $smpegaaux88= "select  TO_CHAR(SUM(VL_CUSTO_TOTAL),'999990.999') CUSTO3
          from AUX_CONSULTA_CUSTO_ANO
          WHERE  CD_MAQUINA='$equipamento9' ";
		  $smpegaaux818= $conn->Execute($smpegaaux88);
		  $valorcustototal=$smpegaaux818->fields["0"];
		  $valorcustototalmostra=number_format($valorcustototal, 2, ',', '.');
          echo $valorcustototalmostra;
          ?>
		  </td>
		  <td style='font-size: 19px;color: black;text-align:left;bold: Negrito'><?
          $valorpart=number_format($valorpart, 2, ',', '.');
          echo $valorpart;?></td>
  
        </tr>
  <?
  $smpegaaux2->MoveNext();
  } //FINAL DO EQUIPAMENTO
  ?>
  
  
  <tr>

 <td>Totais</td>
   <?
         $sqachames669= "SELECT  CD_MES MES from meses_bi order by cd_mes asc";
         $sqachames6679= $conn->Execute($sqachames669);
         while ( !$sqachames6679->EOF)
         {
          $mesamostra7=$sqachames6679->fields["MES"];
          ?>
          <td>
          <?
          $smpegaaux89= "select  TO_CHAR(SUM(VL_CUSTO_TOTAL),'99999999990.999') CUSTO3
          from AUX_CONSULTA_CUSTO_ANO where cd_mes='$mesamostra7'";
          $smpegaaux819= $conn->Execute($smpegaaux89);
		  $valorcustototal9=$smpegaaux819->fields["0"];
          $valorcustototalmostra9=number_format($valorcustototal9, 2, ',', '.');
          echo $valorcustototalmostra9;
          
          ?></td>


         <?$sqachames6679->MoveNext();
          }//final do mes
		  ?>
        <td>
          <?
          $smpegaaux8total="select  TO_CHAR(SUM(VL_CUSTO_TOTAL),'99999999990.999') CUSTO3
          from AUX_CONSULTA_CUSTO_ANO";
          $smpegaaux8total2= $conn->Execute($smpegaaux8total);
		  $valorcustototal6=$smpegaaux8total2->fields["0"];
          $valorcustototalmostra6=number_format($valorcustototal6, 2, ',', '.');
          echo $valorcustototalmostra6;
		  ?>
       </td>
       <td></td>
  
  
  </tr>
  
  </table>




<?
require ("rodapepagina.php");
}//final primeira tela




if ($escolha=="pesquisa"){
?>
 
 <div  style="display: block;" id="telapesquisa">       
        <table  width="100%"  border="0" background-image="sairmensagem.png" >
        <tr>
        <td  align=right>
        <a href="<?echo $programa;?>?navegando=sim&escolha=1">
        <IMG src="sairmensagem.png" width="38" height="38" ></a>
        </td>
        </tr>
        </table>
		</br></br></br>
		
		<table>
		    
				<tr>
		        <td>
		        Unidade:
		        </td>
                <td>
				
     				 <?
					 
					 $datapegou1pe = "SELECT DS_FABRICA FROM   FABRICAS  WHERE CD_FABRICA='$fabricapesquisa'";
				     $datapegou2pe = $conn->Execute($datapegou1pe);
                     $fabricapesquisades=$datapegou2pe->fields["0"];

     				 

                     ?>

                     <select name="fabricapesquisa" style="background-color:#8B8378;color: white;" >
                     <option value="<?echo $fabricapesquisa;?>">Unidade:<? echo $fabricapesquisa;?>-<? echo $fabricapesquisades;?></option>
                     <?
				     $stmt1 = "SELECT CD_FABRICA,DS_FABRICA FROM FABRICAS ";
                     $result3 = $conn->Execute($stmt1);
                     while ( !$result3->EOF) {
                          print "<option value=\"{$result3->fields["0"]}\">{$result3->fields["0"]}-{$result3->fields["1"]}</option>";


                     $result3->MoveNext();
                     }
				 
				 ?>
				 		 
				 </select>
				 </td>
				 </tr>
				 
				 <tr>
				 <td>
		         Ano Geração
		         </td>
                 <td>
				   <input type="txt" name="anopesquisa" >
  				 </td>
				 </tr>
				 
		 
		 
	</table>	
		
		
		
		<input type="hidden" name="semanapegoumostrar" value="<?echo $semanapegoumostrar;?>">
		<input type="hidden" name="escolha" size="5" value="1" >
        <input type="hidden" name="continuarmesmatela" value="sim">
       	<input type="hidden" name="contadorfabrica" value="<?echo $contadorfabrica;?>">
		<input type="hidden" name="contador66" value="1">
		<input type="hidden" name="year" value="<?echo $year;?>">
		<input type="hidden" name="month" value="<?echo $month;?>">
		<input type="hidden" name="data1" value="<?echo $data1;?>">
		<input type="hidden" name="data2" value="<?echo $data2;?>">
        
		<a href="#" onclick="document.forms[0].submit();return false;">
        <IMG src="okmensagem.png" width="62" height="45" align="center" ></a>
		



</div>
<?}//FIAL DA PESQUISA?>

</form>



