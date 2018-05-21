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
document.nome_formulario.action="paradaordens.php";
document.forms.nome_formulario.submit();
}
</script>
<script LANGUAGE="JavaScript">
function Botao2()
{
document.nome_formulario.action="incluirparada.php";
document.forms.nome_formulario.submit();
}
</script>

<script LANGUAGE="JavaScript">
function Botao3()
{
document.nome_formulario.action="deletaparadas.php";
document.forms.nome_formulario.submit();
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



function Mascara_Hora2(Hora2)
{
         var hora01 = '';
         hora01 = hora01 + Hora2;
         if (hora01.length == 2){
              hora01 = hora01 + ':';
              document.forms[0].Hora2.value = hora01;
          }
          if (hora01.length == 5){
             Verifica_Hora2();
          }
}

function Mascara_Hora(Hora)
{
         var hora01 = '';
         hora01 = hora01 + Hora;
         if (hora01.length == 2){
           hora01 = hora01 + ':';
           document.forms[0].Hora.value = hora01;
         }
         if (hora01.length == 5){
            Verifica_Hora();
         }
}

function Verifica_Hora()
{
        hrs = (document.forms[0].Hora.value.substring(0,2));
        min = (document.forms[0].Hora.value.substring(3,5));
        estado = "";
       if ((hrs < 00 ) || (hrs > 23) || ( min < 00) ||( min > 59)){
            estado = "errada";
       }

       if (document.forms[0].Hora.value == "") {
          estado = "errada";
       }

        if (estado == "errada") {
            alert("Hora inválida!");
            document.forms[0].Hora.focus();
        }
}


function Verifica_Hora2()
{
           hrs = (document.forms[0].Hora2.value.substring(0,2));
           min = (document.forms[0].Hora2.value.substring(3,5));
           hrsinicio = (document.forms[0].Hora.value.substring(0,2));

           estado = "";
           if ((hrs < 00 ) || (hrs > 23) || ( min < 00) ||( min > 59)){
              estado = "errada";
           }

           if (document.forms[0].Hora2.value == "") {
              estado = "errada";
           }

           if (hrsinicio >= hrs) {
              estado = "errada";
           }

           if (estado == "errada") {
                  document.getElementById('Gravacaofuncionario').disabled = true;
                  alert("Hora inválida!");
                  document.forms[0].Hora2.focus();

           }
           else
           {
           document.getElementById('Gravacaofuncionario').disabled = false;
           document.getElementById('fecharordem').disabled = false;
           }



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
            $libera=$_POST['libera'];

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

                      $achadiacontador7= OCIParse($ora_conexao, "select data_inicio DIA,maq_parada PARA,hora_inicio HORA1,minuto_inicio MINUTO1 from
                      emer_comp where numero='$listaordemselecionada' ");
                      OCIExecute($achadiacontador7, OCI_DEFAULT);
                      While (OCIFetch($achadiacontador7)) {
                         $parada=ociresult($achadiacontador7, "PARA") ;
                         $diap=ociresult($achadiacontador7, "DIA") ;
                         $horap=ociresult($achadiacontador7, "HORA1") ;
                         $minutop=ociresult($achadiacontador7, "MINUTO1") ;


                      }

                      $achaexisteparada1= OCIParse($ora_conexao, "select count(*) CONTADOR from
                      horas_paradas
                      WHERE ORDEM='$listaordemselecionada' ");
                      OCIExecute($achaexisteparada1, OCI_DEFAULT);
                      While (OCIFetch($achaexisteparada1)) {
                         $existeregistroarada=ociresult($achaexisteparada1, "CONTADOR") ;
                      }

                      $achavoltamax= OCIParse($ora_conexao, "select id_volta_operar  VOLTA from
                      horas_paradas
                      WHERE ORDEM='$listaordemselecionada' and nr_sequencia in (select MAX(NR_SEQUENCIA) FROM
                      horas_paradas
                      WHERE ORDEM='$listaordemselecionada'
                      ) ");
                      OCIExecute($achavoltamax, OCI_DEFAULT);
                      While (OCIFetch($achavoltamax)) {
                         $existevolta=ociresult($achavoltamax, "VOLTA") ;
                      }




                      IF ($existeregistroarada=="0" and $parada=="Sim"){
                        $horainiciott=$horap.":".$minutop;


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


                        $sgrava1= OCIParse($ora_conexao, "insert into horas_paradas (nr_sequencia,ordem,data_servico,
                        hora_inicio,id_volta_operar)
                        values('$sequenciamaximaparada','$listaordemselecionada','$diap','$horainiciott','N')");
                            OCIExecute($sgrava1, OCI_DEFAULT);
                            oci_commit($ora_conexao);


                      }




?>





<center><font style='font-size: 22px;color: black;text-align:left;bold: Negrito' >Parada de Equipamentos</br></font>
<?

$achadesccompo1= OCIParse($ora_conexao, "SELECT  DS_COMPO from componente_auxiliar where cd_compo='$componente'");
                      OCIExecute($achadesccompo1, OCI_DEFAULT);
                      While (OCIFetch($achadesccompo1)) {
                         $descr6754=ociresult($achadesccompo1, "DS_COMPO") ;
                      }

?>
<font style='font-size: 14px;color: black;text-align:left;bold: Negrito' >
<?
echo "Equipamento:$componente - $descr6754 ";
echo "Ordem:$listaordemselecionada</br>";
?>
</font>



                      <input type="hidden" name="mes"  size="5" value="<?echo $mes;?>">
			          <input type="hidden" name="ano"  size="5" value="<?echo $ano;?>">




 <input type="SUBMIT" onclick="Botao1()" value="Consultar"></input>
 <input type="button" onclick="Botao3()" value="Eliminar"></input>
 <input type="button" onclick="Botao2()" value="Gravar"></input>
 </center>
 
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


 <center><font style='font-size: 15px;color: black;text-align:left;bold: Negrito' >Registros de Parada</br>
 <table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:white;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="90%">

<tr>

                <th>Data</th>
				<th>Hora Inicio</th>
    			<th>Hora Fim</th>
    			<th>Situação</br>Equipamento</th>
    			<th>Horas</th>











</tr>


<?
//novosregistros

         $totalhorageral="0";
         
         $s = OCIParse($ora_conexao, "SELECT to_char(data_servico,'dd/mm/yyyy') DATA,
         to_char(data_servico,'yyyy-mm-dd') DATA33,hora_inicio HORA1,hora_fim HORA2 ,id_volta_operar LIBERA
         FROM horas_paradas
         WHERE ORDEM='$listaordemselecionada'
         order by data_servico desc
         ");


         OCIExecute($s, OCI_DEFAULT);
    While (OCIFetch($s)) {
      $datamostra1=ociresult($s, "DATA") ;
      $datamostra16=ociresult($s, "DATA33") ;
      
      $iniciomostra1=ociresult($s, "HORA1") ;
      $fimmostra1=ociresult($s, "HORA2") ;
      $situacaoeq=ociresult($s, "LIBERA") ;

      if ($situacaoeq=="N"){$situacaoeqmostra="Parado";}else{$situacaoeqmostra="Liberado";}



               ?>

			       <tr>



					<td  align="left"><?echo $datamostra1;?></td>
                    <td  align="left"><?echo $iniciomostra1;?></td>

       			    <td  align="left"><?echo $fimmostra1;?></td>
       			    <td><center><font style='font-size: 12px;color: red;text-align:center;bold: Negrito' ><?echo $situacaoeqmostra;?></td>
                    <?


                    if ($situacaoeq=="S"){
                    
                           IF ($iniciomostra1=="00:00"){

                             $achadata33= OCIParse($ora_conexao, "SELECT to_char(min(data_servico),'yyyy-mm-dd') DATA,
                             hora_inicio  HORA FROM horas_paradas
                             WHERE ORDEM='$listaordemselecionada'
                             and  data_servico < '$datamostra1' group by hora_inicio ");
                             OCIExecute($achadata33, OCI_DEFAULT);
                             While (OCIFetch($achadata33)) {
                               $datapegou1=ociresult($achadata33, "DATA") ;
                               $horapegou1=ociresult($achadata33, "HORA") ;
                               $horapegou1=$horapegou1.":00";
                               
                               $datapegou2=$datamostra16;
                               $horapegou2=$fimmostra1;
                               $horapegou2=$horapegou2.":00";

                             }

                              $data1t = $datapegou1.$horapegou1;
                              $data2t = $datapegou2.$horapegou2;

                              $unix_data1 = strtotime($data1t);
                              $unix_data2 = strtotime($data2t);
                              $nHoras   = ($unix_data2 - $unix_data1) / 3600;
                              $nMinutos = (($unix_data2 - $unix_data1) % 3600) / 60;
                              $total = sprintf('%02d:%02d', $nHoras , $nMinutos);
                              ?>
                              <td  align="right"><?echo $total;?></td>
                              <?
                              $totalhorageral=$totalhorageral+$nHoras;
                           }
                           else
                           {
                            $datapegou1=$datamostra1;
                            $datapegou2=$datamostra1;
                            $horapegou1=$iniciomostra1.":00";
                            $horapegou2=$fimmostra1.":00";
                            $data1t = $datapegou1.$horapegou1;
                              $data2t = $datapegou2.$horapegou2;

                              $unix_data1 = strtotime($data1t);
                              $unix_data2 = strtotime($data2t);
                              $nHoras   = ($unix_data2 - $unix_data1) / 3600;
                              $nMinutos = (($unix_data2 - $unix_data1) % 3600) / 60;
                              $total = sprintf('%02d:%02d', $nHoras , $nMinutos);
                              ?>
                              <td  align="right"><?echo $total;?></td>
                              <?
                              $totalhorageral=$totalhorageral+$nHoras;

                           }
                    



                    }
                    else
                    {
                    ?>

                          <td align="right">-</td>
                    <?
                    }
                    ?>
					</tr>
                    <?


                    }
                    ?>
                    <tr>
                    <td>Total Hora</td><td></td><td></td><td></td>
                    <td align="right"><?
                     $totalhorageral2=number_format($totalhorageral, 2, ',', '.');
                    echo "$totalhorageral2";?></td>
                    </tr>

 </table>


 
 </div>
 
 <div id="div_2">
 <center><font style='font-size: 22px;color: black;text-align:left;bold: Negrito' >Novos Registros</br></font>
 <font style='font-size: 12px;color: red;text-align:left;bold: Negrito' >
  <?
                      //$achadiacontador78= OCIParse($ora_conexao, "select HR_PARADA from parametros ");
                      //OCIExecute($achadiacontador78, OCI_DEFAULT);
                      //While (OCIFetch($achadiacontador78)) {
                        // $formaapontamento=ociresult($achadiacontador78, "HR_PARADA") ;
                         //1-automatico//2-apontamento
                         //if ($formaapontamento=="1"){$formaapontamentomostra="Automático";}
                        // else{$formaapontamentomostra="Apontamento";}

                      //}




                         echo "Parada Maquina:$parada- Dia:$diap -".$horap.":".$minutop;?></br>


 </font>
 <font style='font-size: 13px;color: black;text-align:left;bold: Negrito' >


                      <?
                      if (($existevolta=="S") or ($parada=="NÃO") ){
                      ?>
                      
                      Liberar Equipamento:<select   name="libera" >
                      <option value="S">Sim</option>
                      <option value="N">Não</option>
    	              </select>
    	              
                      Hora Inicio:<input type="TXT" name="hora"  id="Hora" OnKeyUp="Mascara_Hora(this.value)" size="5" maxlength="5" value="00:00">
                      Hora Fim:<input type="txt" name="hora2"  id="Hora2" OnKeyUp="Mascara_Hora2(this.value)" size="5" maxlength="5" value="00:00">

                      Data:
                      <input type="text" name="data"  OnKeyUp="mascaraData(this);" maxlength="10"  / VALUE="<?echo $dataplanejadamostra5;?>" >
                      <?}
                      else
                      {
                      ?>
                      
                      Liberar Equipamento:<select   name="libera" >
                      <option value="N">Não</option>
                      <option value="S">Sim</option>
    	              </select>
                      Hora Fim:<input type="txt" name="hora2"  id="Hora2" OnKeyUp="Mascara_Hora2(this.value)" size="5" maxlength="5" value="00:00">
                      <input type="hidden" name="hora"  id="Hora"  value="00:00">


                      Data:
                      <input type="text" name="data"  OnKeyUp="mascaraData(this);" maxlength="10"  / VALUE="<?echo $dataplanejadamostra5;?>" >
                      <?
                      }
                      ?>


</font>
</div>

</div>

<?



?>
</form>


</html>
