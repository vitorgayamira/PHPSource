<html>

<head>
<?
function tempoData($dataini, $datafim)
{
# Split para dia, mes, ano, hora, minuto e segundo da data inicial
$_split_datehour = explode(' ',$dataini);
$_split_data = explode("/", $_split_datehour[0]);
$_split_hour = explode(":", $_split_datehour[1]);
 # Coloquei o parse (integer) caso o timestamp nao tenha os segundos, dai ele fica como 0
 $dtini = mktime ($_split_hour[0], $_split_hour[1], (integer)$_split_hour[2], $_split_data[1], $_split_data[0], $_split_data[2]);
  # Split para dia, mes, ano, hora, minuto e segundo da data final
  $_split_datehour = explode(' ',$datafim);
  $_split_data = explode("/", $_split_datehour[0]);
  $_split_hour = explode(":", $_split_datehour[1]);
  $dtfim = mktime ($_split_hour[0], $_split_hour[1], (integer)$_split_hour[2], $_split_data[1], $_split_data[0], $_split_data[2]);
  # Diminui a datafim que é a maior com a dataini
    $time = ($dtfim - $dtini);
    # Recupera os dias $days  = floor($time/86400);
    #  Recupera as horas
    $hours = floor(($time-($days*86400))/3600);
    # Recupera os minutos
    $mins  = floor(($time-($days*86400)-($hours*3600))/60);
    # Recupera os segundos
    $secs  = floor($time-($days*86400)-($hours*3600)-($mins*60));
    # Monta o retorno no formato # 5d 10h 15m 20s # somente se os itens forem maior que zero
    $retorno  = "";
    $retorno .= ($days>0)  ?  $days .'d ' : ""  ;
    $retorno .= ($hours>0) ?  $hours .':': ""  ;
    $retorno .= ($mins>0)  ?  $mins .' ' : ""  ;
    //$retorno .= ($secs>0)  ?  $secs .'s ' : ""  ;
    # Se o dia for maior que 3 fica vermelho
    if($days > 3){ return "<span style='color:red'>".$retorno."</span>"; }
    return $retorno;
}
?>

<style>

table.bordasimples tr td {border:1px solid black;}
</style>

</head>

<meta http-equiv="refresh" content="30;URL=painelcorretivaversao2.php?banco=<?echo $banco;?>&codigousuario=<?echo $codigousuario;?>&localbanco=<?echo $localbanco;?>">

<form>





<?



if (!IsSet($mes)){
$mes=date('m');
}

if (!IsSet($ano)){
$ano=date('Y');
}




//ECHO "Base Oracle:$banco - Local:$localbanco - Ambiente:$ambiente</br>";
require("configuraoracle.php");
require("estilo2.css");
require("configuramysql.php");

if (!IsSet($fabricapesquisa)){
//acha uniddae de lotacao

    $achaunidade = "SELECT DESCRICAO from PESSOA_BI WHERE
    CODIGO IN (SELECT CD_EMPRESA FROM USUARIO_BI  WHERE CD_USUARIO='$codigousuario')";
    $achaunidade2 = mysql_db_query($banco,$achaunidade,$conexao);
    $achaunidade3=mysql_fetch_array($achaunidade2);
    $unidadelotacao1=$achaunidade3["DESCRICAO"];


    

    $result28 = "select CD_FABRICA FROM  FABRICAS WHERE DS_FABRICA='$unidadelotacao1'";
                 $result38 = @OCIParse($ora_conexao, $result28);
				 @OCIExecute($result38, OCI_DEFAULT);
				 while (OCIFetchInto($result38,&$row8, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  $fabricapesquisa=ociresult($result38, "CD_FABRICA") ;
                 }
}



 ?>


<CENTER><font style='font-size: 23px;color: BLACK;text-align:left;bold: Negrito' >Monitoramento Manutenção Corretiva </font></BR>
<?// echo "Unidade de Negócio:$fabricapesquisa - Mês:$mes - Ano:$ano ";

                            $elimina55= OCIParse($ora_conexao, "DELETE FROM AUX_PAINEL_CORRETIVA");
                            OCIExecute($elimina55, OCI_DEFAULT);
                            oci_commit($ora_conexao);


                      $s = OCIParse($ora_conexao, "select  a.NUMERO NRORDEM,a.CD_MANTENEDOR CD_MANTENEDOR,
                      a.MAQ_PARADA MAQ_PARADA,a.STATUS_ANDAMENTO_TIPO STATUS_ANDAMENTO_TIPO,a.STATUS_ANDAMENTO ANDAMENTO,
                      a.DATA_INICIO DATA_INICIO,a.CD_COMPONENTE CD_COMPONENTE,b.NOME NOME,c.DS_MOTIVO MOTIVO
                       FROM EMER_COMP a,FUNCIONARIO_SADEGE b,MOTIVO_ORDEM_PARADA c
                       where a.STATUS='G'    AND
                       a.CD_MANTENEDOR=b.CADASTRO(+) AND
                       a.cd_fabrica='$fabricapesquisa' AND
                       a.STATUS_ANDAMENTO_TIPO=c.cd_motivo(+)
                       order by a.NUMERO ASC
                       ");
                       

                       
                       OCIExecute($s, OCI_DEFAULT);
                       While (OCIFetch($s)) {
                          $ordem=ociresult($s, "NRORDEM") ;
                          $andamento=ociresult($s, "ANDAMENTO") ;
                          $andamento=ociresult($s, "ANDAMENTO") ;
                          $mantenedor=ociresult($s, "CD_MANTENEDOR") ;
                          $parada=ociresult($s, "MAQ_PARADA") ;
                          $observacao=ociresult($s, "STATUS_ANDAMENTO_TIPO") ;
                          $data6=ociresult($s, "DATA_INICIO") ;
                          $componente=ociresult($s, "CD_COMPONENTE") ;
                          $nome5=ociresult($s, "NOME") ;
                          $descricaomotivo=ociresult($s, "MOTIVO") ;
                          
                          if ($andamento =="EMANDAMENTO"){$andamentog="EMANDAMENTO";}else{$andamentog="NAO";}

                            $achamaxima5= OCIParse($ora_conexao, "SELECT  NVL(MAX(NR_SEQUENCIA)+1,1) VALOR FROM  AUX_PAINEL_CORRETIVA");
                            OCIExecute($achamaxima5, OCI_DEFAULT);
                            While (OCIFetch($achamaxima5)) {
                              $maxima66=ociresult($achamaxima5, "VALOR") ;
                            }
                            
                            $achanome5= OCIParse($ora_conexao, "SELECT  NVL(to_char(MIN(DATA_TROCA),'dd/mm->HH24:mi'),0) DATA
                            FROM HIST_MANTENEDOR WHERE ORDEM='$ordem'");
                            OCIExecute($achanome5, OCI_DEFAULT);
                            While (OCIFetch($achanome5)) {
                              $datafinalgrava=ociresult($achanome5, "DATA") ;
                            }

                            IF ($andamento =="FINALIZADO"){

                            }
                            else
                            {
                            $sgrava1= OCIParse($ora_conexao, "INSERT INTO AUX_PAINEL_CORRETIVA(NR_SEQUENCIA,
                            NR_ORDEM_AUX,ID_ANDAMENTO,ID_PARADA,DS_OBSERVACAO,DATA_INICIO,CD_COMPONENTE,DS_MANTENEDOR,DS_MOTIVO )
                            VALUES ('$maxima66','$ordem','$andamentog','$parada','$observacao','$datafinalgrava','$componente','$nome5','$descricaomotivo')");
                            OCIExecute($sgrava1, OCI_DEFAULT);
                            oci_commit($ora_conexao);
                            }
                       }

 //=================================================================================================//



 
 $achadiacontador7= OCIParse($ora_conexao, "SELECT  count(*) CONTADOR
                      FROM   AUX_PAINEL_CORRETIVA ");
                      OCIExecute($achadiacontador7, OCI_DEFAULT);
                      While (OCIFetch($achadiacontador7)) {
                         $totalordens=ociresult($achadiacontador7, "CONTADOR") ;
                      }

 //echo "Total de Ordens:$totalordens</BR>";
 ?>


 <img width=20 height=20 BORDER=0  src="legendamaximiza1.jpg" >Maq.Parada <img width=20 height=20 BORDER=0  src="legendamaximiza2.jpg" >Maq.Não Parada
 <img width=20 height=20 BORDER=0  src="legendamaximiza3.jpg" >Em Andamento</br>

 <hr>

 <?

 $totalporlinha="10";
 $contadoriteminicial="1";
 $intervalo="10";
?>



</br><center><table  width="1100" class="bordasimples">

 <tr>
 <?
 for ($passa1=$contadoriteminicial;$passa1 <=$totalordens;$passa1++){
  //echo "</br>posicao:$passa1//total por linha:$totalporlinha";
      if ($passa1 <=$totalporlinha){

                      $achadiacontador755= OCIParse($ora_conexao, "SELECT  NR_ORDEM_AUX ,ID_ANDAMENTO ,
                      SUBSTR(NVL(ID_PARADA,'N'),0,1) PARA,DS_OBSERVACAO ,DATA_INICIO DATA,CD_COMPONENTE ,
                      DS_MANTENEDOR,DS_MOTIVO
                      FROM   AUX_PAINEL_CORRETIVA WHERE NR_SEQUENCIA='$passa1'");

                      
                      OCIExecute($achadiacontador755, OCI_DEFAULT);
                      While (OCIFetch($achadiacontador755)) {
                         $ordemmostra=ociresult($achadiacontador755, "NR_ORDEM_AUX") ;
                         $componentemostra=ociresult($achadiacontador755, "CD_COMPONENTE") ;
                         $paradamostra=ociresult($achadiacontador755, "PARA") ;
                         $andamento=ociresult($achadiacontador755, "ID_ANDAMENTO") ;
                         $dataabertura=ociresult($achadiacontador755, "DATA") ;
                         $observacao=ociresult($achadiacontador755, "DS_OBSERVACAO") ;
                         $andamento=ociresult($achadiacontador755, "ID_ANDAMENTO") ;
                         $nome66=ociresult($achadiacontador755, "DS_MANTENEDOR") ;
                         $descricaomotivo=ociresult($achadiacontador755, "DS_MOTIVO") ;
                         //echo "parada:$paradamostra//ANDAMENTO:$andamento</br>";

                         if ($andamento=="NAO"){
                            if ($paradamostra=="S"){$cor="red";}
                            if ($paradamostra=="N"){$cor="yellow";}
                            $dataaberturamostra="";
                         }
                         else
                         {
                          if ($paradamostra=="S" ){
                             $cor="#87CEEB";
                             //$cor="red";

                          }
                          if ($paradamostra=="N"){
                             $cor="yellow";
                             //$cor="BLUE";
                          }

                            $dataaberturamostra=$dataabertura;
                         }


                        
                        $achadatainicio7= OCIParse($ora_conexao, "SELECT  to_char(DATA_INICIO,'dd/mm') DATA,HORA_INICIO,MINUTO_INICIO FROM
                        EMER_COMP WHERE NUMERO='$ordemmostra'
                         ");
                         OCIExecute($achadatainicio7, OCI_DEFAULT);
                         While (OCIFetch($achadatainicio7)) {
                         $dataabertura=ociresult($achadatainicio7, "DATA") ;
                         $horaabertura=ociresult($achadatainicio7, "HORA_INICIO") ;
                         $minutoabertura=ociresult($achadatainicio7, "MINUTO_INICIO") ;
                         $aberturamostra=$dataabertura."->".$horaabertura.":".$minutoabertura;

                        }
                        



                      }

                      $datahoje1=date("d/m/Y");
                      $datahoje2=date("H:i:s");

                      
                      $datahoje=$datahoje1." ".$datahoje2;
                      

                      
                      $achalinhaordem1= OCIParse($ora_conexao, "SELECT  SUBSTR(NVL(ID_PARADA,'N'),0,1) PARA
                      FROM   AUX_PAINEL_CORRETIVA WHERE NR_ORDEM_AUX='$ordemmostra'");

                      OCIExecute($achalinhaordem1, OCI_DEFAULT);
                      While (OCIFetch($achalinhaordem1)) {

                         $paradamostra=ociresult($achalinhaordem1, "PARA") ;
                      }
                      
                      $achadatainicio7= OCIParse($ora_conexao, "SELECT  to_char(DATA_INICIO,'dd/mm/YYYY') DATA,HORA_INICIO,MINUTO_INICIO FROM
                        EMER_COMP WHERE NUMERO='$ordemmostra'
                         ");
                         OCIExecute($achadatainicio7, OCI_DEFAULT);
                         While (OCIFetch($achadatainicio7)) {
                         $dataabertura=ociresult($achadatainicio7, "DATA") ;
                         $horaabertura=ociresult($achadatainicio7, "HORA_INICIO") ;
                         $minutoabertura=ociresult($achadatainicio7, "MINUTO_INICIO") ;

                         $dataaberturafinal=$dataabertura." ".$horaabertura.":".$minutoabertura.":00";
                        }


                        if ($paradamostra=="S"){
                            $diferencaparada = tempoData($dataaberturafinal,$datahoje);
                        }
                        else
                        {
                        $diferencaparada="00:00";
                        }
                        
                 $achacontador6= OCIParse($ora_conexao, "SELECT  count(*) VALOR
                 FROM  COMP_FUNC_EMER
                 WHERE NUMERO='$ordemmostra'
                 ");
                 OCIExecute($achacontador6, OCI_DEFAULT);
                 While (OCIFetch($achacontador6)) {
                   $contadorexiste7=ociresult($achacontador6, "VALOR") ;
                 }
                 if ($contadorexiste7 > "0"){
                 
                         $achamenordatafuncionario1= OCIParse($ora_conexao, "SELECT  MIN(DATA_BAIXA_INDIVIDUAL) DATA
                         FROM  COMP_FUNC_EMER
                         WHERE NUMERO='$ordemmostra'
                         ");
                         OCIExecute($achamenordatafuncionario1, OCI_DEFAULT);
                         While (OCIFetch($achamenordatafuncionario1)) {
                         $datainiciotrabalahda=ociresult($achamenordatafuncionario1, "DATA") ;

                             $achamenorhora77= OCIParse($ora_conexao, "SELECT  HR_INI FROM
                             COMP_FUNC_EMER
                             WHERE NUMERO='$ordemmostra' AND DATA_BAIXA_INDIVIDUAL='$datainiciotrabalahda'
                             ");
                             OCIExecute($achamenorhora77, OCI_DEFAULT);
                             While (OCIFetch($achamenorhora77)) {
                                    $hora7=ociresult($achamenorhora77, "HR_INI") ;

                                    $dataanalise7=$datainiciotrabalahda." ".$hora7;
                             }
                             $diferencatrabalhada = tempoData($dataanalise7,$datahoje);

                         }
                 }
                 else
                 {
                          $diferencatrabalhada="00:00";
                 }



                         //echo "</br>ordem:$ordemmostra//parada:$paradamostra//inico:$dataaberturafinal//hoje:$datahoje//diferenca parada:$diferencaparada//hora inicio mantenedores:$datainiciotrabalahda//diferenca trabalhada:$diferencatrabalhada";







      ?>
      <td bgcolor="<? echo $cor;?>" width="110" height="140" valign="top" >

      <h1 style='font-size: 16px;color: black;text-align:center;bold: Negrito text-decoration: none valign:top'>
      <?echo "$componentemostra</br>";?>
      <?echo "$ordemmostra</br>";?>
      </h1>

      </br>
      <h1 style='font-size: 16px;color: black;text-align:center;bold: Negrito text-decoration: none valign:top'>
      <b><?echo "$diferencatrabalhada</br>";?></b>
      </h1>
      
      <h1 style='font-size: 16px;color: black;text-align:center;bold: Negrito text-decoration: none valign:top'>
      <?echo "$diferencaparada</br>";?>
      </h1>

      <h1 style='font-size: 10px;color: black;text-align:center;bold: Negrito text-decoration: none' >
      <?


                        $achafunc1= OCIParse($ora_conexao, "SELECT  a.NOME NOME FROM FUNCIONARIO_SADEGE a,
                        COMP_FUNC_EMER b
                         WHERE b.NUMERO='$ordemmostra' and
                         b.cadastro=a.cadastro
                         ");
                         OCIExecute($achafunc1, OCI_DEFAULT);
                         While (OCIFetch($achafunc1)) {
                         $descricaofunc=ociresult($achafunc1, "NOME") ;
                         echo "$descricaofunc</br>";

                        }



      ?></h1>
      
      </td>
      <?
      }
      if ($passa1 ==$totalporlinha){

      ?>

      </tr>
      <tr>
      <?
      $totalporlinha=$intervalo+$passa1;

      }
      if ($passa1 ==$totalordens){
      ?>
      </tr>
      </table>
      <?
      }
}//final das ordens
?>



</form>
</html>


