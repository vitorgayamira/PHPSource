<?require("estilo2_sitenovo.css");
ini_set('display_errors', '0');// N�O HABILITAD 

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
$programa="CUSTOPADRAO2.php";
$titulo="Consulta Custo Padr�o ";
?>

<form  method="POST">
<?require("areasuperior2.php");
?>
<div id="mostraconteudo33" >
<?
require("carregamenumilenionovo2.php");?>

<a href="CUSTOPADRAO2.php?pagina=1&escolha=pesquisa&programa=<?echo $programa;?>&passapesquisainicial=<?echo $passapesquisainicial;?>&numerocolunastela=<?echo $numerocolunastela;?>&campolista1=<?echo $campolista1;?>&campolista2=<?echo $campolista2;?>&seelctcampolista1=<?echo $seelctcampolista1;?>&seelctcampolista2=<?echo $seelctcampolista2;?>&nometabelaparapassar=<?echo $nometabelaparapassar;?>&titulojanelapesquisa=<?echo $titulojanelapesquisa;?>&campolista3=<?echo $campolista3;?>&seelctcampolista3=<?echo $seelctcampolista3;?>&campolista4=<?echo $campolista4;?>&seelctcampolista4=<?echo $seelctcampolista4;?>">
<img  src="consulta.png"  align="center" width='70' height='75' ></a>
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




if (!IsSet($mes)){
$mes=date('m');
}
if (!IsSet($ano)){
$ano=date('Y');
}




if (!IsSet($datapesquisainicial) and !IsSet($datapesquisafinal)){

$diahoje=date('d-m-Y');
$ultimodia=date("t", mktime(0, 0, 0, $mes, 1, $ano));
                 
                 
$datapesquisainicial="01/".$mes."/".$ano;
$datapesquisafinal=$ultimodia."/".$mes."/".$ano;
}
else
{
	$anodata1=substr($datapesquisainicial,0,4);
	$mesdata1=substr($datapesquisainicial,5,2);
	$diadata1=substr($datapesquisainicial,8,2);
		
	$anodata2=substr($datapesquisafinal,0,4);
	$mesdata2=substr($datapesquisafinal,5,2);
	$diadata2=substr($datapesquisafinal,8,2);
	
	
	$datapesquisainicial=$diadata1."/".$mesdata1."/".$anodata1;
	$datapesquisafinal=$diadata2."/".$mesdata2."/".$anodata2;
	
}	




if (!IsSet($escolha) or ($escolha=="1"))
{ 
?>
<a href="http://186.202.46.98:8080/osi/"><IMG src="iconesolicitacao.png" align="center" width="70" height="75" ></a></br>
<titulogeral><? echo "$titulo";?>- <?echo "Intervalo:".$datapesquisainicial." At� ".$datapesquisafinal;?></titulogeral>


<?

                               $usu18uss = "delete aux_consulta_custo";
					           $resultuss = $conn->Execute($usu18uss);

	

//grava a auxiliar

  $sminicial="select DISTINCT a.cd_componente CODIGOEQUIPAMENTO,d.cd_maquina MAQUINA
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
  
  //echo "$sm";
  
  
  
  $sm2inicial2 = $conn->Execute($sminicial);
  while ( !$sm2inicial2->EOF)
  {
	  
          $valorcusto=$sm2inicial2->fields["VALOR"];
		 	  
              $codigoequipamento=$sm2inicial2->fields["CODIGOEQUIPAMENTO"];
              $codigomaquina=$sm2inicial2->fields["MAQUINA"];
         
              $usu18ussG8 = "insert into aux_consulta_custo(CD_COMPONENTE,VL_CUSTO_MATERIAL,
              VL_CUSTO_PECAS,VL_CUSTO_TOTAL,VL_PARTICIPACAO,cd_maquina) VALUES('$codigoequipamento','0','0','0','0','$codigomaquina')";
			  $resultussG = $conn->Execute($usu18ussG8);
  $sm2inicial2->MoveNext();
  }




  //material e pecas

  $sm="select sum(a.quant*b.valor) VALOR,a.cd_componente CODIGOEQUIPAMENTO,d.cd_maquina MAQUINA
  from
  rot_compo_mt a,mat_pecas b,ORDEM_COMP c,componente_auxiliar d
  where a.cd_material=b.cd_material AND
  b.flag='M' and
  a.cd_componente=c.cd_componente and
  a.cd_componente=d.cd_compo and
  a.cd_atividade=c.cd_atividade and
  c.STATUS='G' and
  c.cd_fabrica LIKE '%$fabricapesquisa%' and
  c.data_plane >=to_date('$datapesquisainicial','dd/mm/YYYY') and
  c.data_plane <=to_date('$datapesquisafinal','dd/mm/YYYY')
  group by  a.cd_componente,d.cd_maquina ORDER BY VALOR DESC
  ";
  
  //echo "$sm";
  
  
  
  $sm2 = $conn->Execute($sm);
  while ( !$sm2->EOF)
  {
	  
          $valorcusto=$sm2->fields["VALOR"];
		 	  
          $codigoequipamento=$sm2->fields["CODIGOEQUIPAMENTO"];
          $codigomaquina=$sm2->fields["MAQUINA"];
          $valorcusto= str_replace(",", ".","$valorcusto" );
		  
		  $usu18ussG = "UPDATE AUX_CONSULTA_CUSTO SET VL_CUSTO_MATERIAL=$valorcusto
          WHERE
          CD_COMPONENTE='$codigoequipamento'";
		  $resultussG = $conn->Execute($usu18ussG);
  $sm2->MoveNext();
  }
  
  
  
  
  $sm5="select sum(a.quant*b.valor) VALOR,a.cd_componente CODIGOEQUIPAMENTO
  from
  rot_compo_pc a,mat_pecas b,ORDEM_COMP c
  where a.cod_peca=b.cd_material AND
  b.flag='P' and
  a.cd_componente=c.cd_componente and
  a.cd_atividade=c.cd_atividade and
  c.STATUS='G' and
  c.cd_fabrica like '%$fabricapesquisa%' and
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

          $usu18ussG = "UPDATE AUX_CONSULTA_CUSTO SET VL_CUSTO_PECAS=$valorcustopeca
          WHERE
          CD_COMPONENTE='$codigoequipamento'";
					           
                               $resultussG = $conn->Execute($usu18ussG);
  $sm25->MoveNext();
  } 
	
  
  
  $achazero1="select CD_COMPONENTE,VL_CUSTO_MATERIAL,VL_CUSTO_PECAS from  AUX_CONSULTA_CUSTO ";
  $sm256 = $conn->Execute($achazero1);
  while ( !$sm256->EOF)
  {
   $componente4=$sm256->fields["CD_COMPONENTE"];
   $custo14=$sm256->fields["VL_CUSTO_MATERIAL"];
   $custo15=$sm256->fields["VL_CUSTO_PECAS"];
   $custo14= str_replace(",", ".","$custo14" );
   $custo15= str_replace(",", ".","$custo15" );


   $custototal16=$custo14+$custo15;

   $usu18ussG = "UPDATE AUX_CONSULTA_CUSTO SET VL_CUSTO_TOTAL=$custototal16 WHERE
          CD_COMPONENTE='$componente4'";
					           
                               $resultussG = $conn->Execute($usu18ussG);
  $sm256->MoveNext();
  } 

  
  
  
  
                         $quantoss17mat="select TO_CHAR(SUM(VL_CUSTO_TOTAL),'999990.999')
                         VALOR, TO_CHAR(SUM(VL_CUSTO_MATERIAL),'999990.999') VALOR2,
                         TO_CHAR(SUM(VL_CUSTO_PECAS),'999990.999') VALOR3
                         from AUX_CONSULTA_CUSTO";
                         $sm2567 = $conn->Execute($quantoss17mat);
                         while ( !$sm2567->EOF)
                         {

                            $custototal7=$sm2567->fields["VALOR"];
							$custototal7MAT=$sm2567->fields["VALOR2"];
							$custototal7PECA=$sm2567->fields["VALOR3"];

                           

                         $sm2567->MoveNext();
                         } 
  

   

  $gravapart="select CD_COMPONENTE,VL_CUSTO_TOTAL from AUX_CONSULTA_CUSTO ";
  $sm25678= $conn->Execute($gravapart);
                         while ( !$sm25678->EOF)
                         {
							 $valorcusto44=$sm25678->fields["VL_CUSTO_TOTAL"];
							 $codigoequipamento=$sm25678->fields["CD_COMPONENTE"];
                             $participacao=($valorcusto44/$custototal7)*100;
							 
							 $usu18ussG = "UPDATE AUX_CONSULTA_CUSTO SET VL_PARTICIPACAO=$participacao
                             WHERE  CD_COMPONENTE='$codigoequipamento'";
					         $resultussG = $conn->Execute($usu18ussG);
   
  $sm25678->MoveNext();
  } 


  ?>
  <table  border=0
 style='background:white;' width="100%" align="center" class="tabela1">


  <th>Equipamento</th>
  <th>Custo Materiais (R$)</th>
  <th>Custo Pe�as (R$)</th>
  <th>Custo Total(R$)</th>
  <th>Participa��o(%)</th>





  </tr>
  <?
  $smpegaaux="select CD_MAQUINA, TO_CHAR(SUM(VL_CUSTO_MATERIAL),'999990.999')
  CUSTO, TO_CHAR(SUM(VL_CUSTO_PECAS),'999990.999') CUSTO2, TO_CHAR(SUM(VL_CUSTO_TOTAL),'999990.999') CUSTO3,
  TO_CHAR(SUM(VL_PARTICIPACAO),'999990.999')  PART from aux_consulta_custo GROUP BY CD_MAQUINA
  order by PART desc";

  $smpegaaux2= $conn->Execute($smpegaaux);
  while ( !$smpegaaux2->EOF)
  {
	    $equipamento9=$smpegaaux2->fields["CD_MAQUINA"];
		$valorcustomat=$smpegaaux2->fields["CUSTO"];
		$valorcustopeca=$smpegaaux2->fields["CUSTO2"];
		$valorcustototal=$smpegaaux2->fields["CUSTO3"];
		$valorpart=$smpegaaux2->fields["PART"];
      ?>
   <tr>

   <td><?echo $equipamento9;?></td>
   <td><? $valorcustomatmostra=number_format($valorcustomat, 2, ',', '.');

   echo $valorcustomatmostra;?></td>
   <td><?$valorcustopecamostra=number_format($valorcustopeca, 2, ',', '.');

   echo $valorcustopecamostra;?></td>
   <td><?  $valorcustototalmostra=number_format($valorcustototal, 2, ',', '.');

   echo $valorcustototalmostra;?></td>
   <td>
    <?$valorpart=number_format($valorpart, 2, ',', '.');
   echo $valorpart;?></td>



<?$smpegaaux2->MoveNext();
}?>


</tr>
<tr>

<td>Total</td>

<td><?
$custototal7M5=number_format($custototal7MAT, 2, ',', '.');
echo $custototal7M5;?>
</td>

<td>
<?
$custototal7P5=number_format($custototal7PECA, 2, ',', '.');
echo $custototal7P5;?>
</td>


<td>
<?
$custototal7= str_replace(",", ".","$custototal7" );

$custototal7=number_format($custototal7, 2, ',', '.');
echo $custototal7;?>
</td>
<td></td>
</tr>


</TABLE>



  <?

}//final quando contador=1 ou 2




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
		         Intervalo
		         </td>
                 <td>
				   <input type=date name="datapesquisainicial" >At� <input type=date name="datapesquisafinal" >
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



