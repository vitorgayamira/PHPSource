<html>

<head>
<style  type="text/css">
#envolve { width: 1310px;}
 #div_1 { position: relative; width: 650px; height: 410px; background-color: #CAE1FF; border:1;float: left; text-align: center; color: #E8E8E8;  }
 #div_2 { position: relative; width: 650px; height: 410px; background-color: #CAE1FF; float: right; text-align: center; color: #E8E8E8;}
 #clear { clear:both; }
 






 
</style>

</head>

<meta http-equiv="refresh" content="30;URL=painelcorretivaversao3novamalharia.php?banco=<?echo $banco;?>&codigousuario=<?echo $codigousuario;?>&localbanco=<?echo $localbanco;?>">
<body>

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


<center><font style='font-size: 23px;color: BLACK;text-align:left;bold: Negrito' >Monitoramento Manutenção Corretiva </font></BR>
<img width=20 height=20 BORDER=0  src="legendamaximiza1.jpg" >Maq.Parada <img width=20 height=20 BORDER=0  src="legendamaximiza2.jpg" >Maq.Não Parada
 <img width=20 height=20 BORDER=0  src="legendamaximiza3.jpg" >Em Andamento</br></br></br>


<div id="envolve">



<?// echo "Unidade de Negócio:$fabricapesquisa - Mês:$mes - Ano:$ano ";

                            $elimina55= OCIParse($ora_conexao, "DELETE FROM AUX_PAINEL_CORRETIVA");
                            OCIExecute($elimina55, OCI_DEFAULT);
                            oci_commit($ora_conexao);


                      $s = OCIParse($ora_conexao, "select  a.NUMERO NRORDEM,a.CD_MANTENEDOR CD_MANTENEDOR,
                      a.MAQ_PARADA MAQ_PARADA,a.STATUS_ANDAMENTO_TIPO STATUS_ANDAMENTO_TIPO,a.STATUS_ANDAMENTO ANDAMENTO,
                      a.DATA_INICIO DATA_INICIO,a.CD_COMPONENTE CD_COMPONENTE,b.NOME NOME,c.DS_MOTIVO MOTIVO,
                      d.DS_COMPO DESCRICAOCOMPONENTE,a.cd_mao GRUPO
                       FROM EMER_COMP a,FUNCIONARIO_SADEGE b,MOTIVO_ORDEM_PARADA c,COMPONENTE_AUXILIAR d
                       where a.STATUS='G'    AND
                       a.CD_MANTENEDOR=b.CADASTRO(+) AND
                       a.cd_fabrica='$fabricapesquisa' AND
                       a.cd_componente=d.cd_compo and
                       a.STATUS_ANDAMENTO_TIPO=c.cd_motivo(+)
                       order by a.cd_mao ASC
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
                          $descricaocomponente=ociresult($s, "DESCRICAOCOMPONENTE") ;
                          $codigogrupo=ociresult($s, "GRUPO") ;
                          
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

                            IF ($andamento =="FINALIZADO")
                            {

                            }
                            else
                            {
                            

                            
                            $sgrava1= OCIParse($ora_conexao, "INSERT INTO AUX_PAINEL_CORRETIVA(NR_SEQUENCIA,
                            NR_ORDEM_AUX,ID_ANDAMENTO,ID_PARADA,DS_OBSERVACAO,DATA_INICIO,CD_COMPONENTE,DS_MANTENEDOR,DS_MOTIVO,DS_COMPONENTE,CD_GRUPO)
                            VALUES ('$maxima66','$ordem','$andamentog','$parada','$observacao','$datafinalgrava','$componente',
                            '$nome5','$descricaomotivo','$descricaocomponente','$codigogrupo')");
                            OCIExecute($sgrava1, OCI_DEFAULT);
                            oci_commit($ora_conexao);
                            }
                       }

 //=================================================================================================//


 $achadiacontador7= OCIParse($ora_conexao, "SELECT  MAX(NR_SEQUENCIA) VALOR
                      FROM   AUX_PAINEL_CORRETIVA where cd_grupo='MEC' ");
                      OCIExecute($achadiacontador7, OCI_DEFAULT);
                      While (OCIFetch($achadiacontador7)) {
                         $totalordens=ociresult($achadiacontador7, "VALOR") ;
                      }

 //echo "Total de Ordens:$totalordens</BR>";

 $achadiacontador766= OCIParse($ora_conexao, "SELECT  MIN(NR_SEQUENCIA) VALOR
                      FROM   AUX_PAINEL_CORRETIVA where cd_grupo='MEC' ");
                      OCIExecute($achadiacontador766, OCI_DEFAULT);
                      While (OCIFetch($achadiacontador766)) {
                         $contadoriteminicial=ociresult($achadiacontador766, "VALOR") ;
                      }



 $totalporlinha=$contadoriteminicial+4;
 $intervalo="5";
 

?>

</center>


<div id="envolve">


<div id="div_1">
<h1 style='font-size: 12px;color: black;text-align:center;bold: Negrito text-decoration: none'>Equipe Mecânica</h1>



</br><center><table  width="500" class="bordasimples">

 <tr>
 <?
 for ($passa1=$contadoriteminicial;$passa1 <=$totalordens;$passa1++){
  //echo "</br>posicao:$passa1//total por linha:$totalporlinha";
      if ($passa1 <=$totalporlinha){

                      $achadiacontador755= OCIParse($ora_conexao, "SELECT  NR_ORDEM_AUX ,ID_ANDAMENTO ,
                      SUBSTR(NVL(ID_PARADA,'N'),0,1) PARA,DS_OBSERVACAO ,DATA_INICIO DATA,CD_COMPONENTE ,
                      DS_MANTENEDOR,DS_MOTIVO,DS_COMPONENTE
                      FROM   AUX_PAINEL_CORRETIVA WHERE NR_SEQUENCIA='$passa1' and  cd_grupo='MEC'  ");

                      
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
                         $descricacomponente=ociresult($achadiacontador755, "DS_COMPONENTE") ;
                         

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
      ?>
      
      <td bgcolor="<? echo $cor;?>" width="100" height="140" valign="top" >
      
      <h1 style='font-size: 9px;color: black;text-align:left;bold: Negrito text-decoration: none'>
      <?echo "$ordemmostra</br>";?><?echo "$descricacomponente</br>";?><?echo "$aberturamostra</br>";?>
      <?echo "$descricaomotivo</br>";?><?echo "$nome66</br>";?>
      <?echo "$dataaberturamostra";?>
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


</div>

<div id="div_2">
<?
$achadiacontador7= OCIParse($ora_conexao, "SELECT  MAX(NR_SEQUENCIA) VALOR
                      FROM   AUX_PAINEL_CORRETIVA where cd_grupo='ELE' ");
                      OCIExecute($achadiacontador7, OCI_DEFAULT);
                      While (OCIFetch($achadiacontador7)) {
                         $totalordens=ociresult($achadiacontador7, "VALOR") ;
                      }

 //echo "Total de Ordens:$totalordens</BR>";
 
 $achadiacontador766= OCIParse($ora_conexao, "SELECT  MIN(NR_SEQUENCIA) VALOR
                      FROM   AUX_PAINEL_CORRETIVA where cd_grupo='ELE' ");
                      OCIExecute($achadiacontador766, OCI_DEFAULT);
                      While (OCIFetch($achadiacontador766)) {
                         $contadoriteminicial=ociresult($achadiacontador766, "VALOR") ;
                      }



 $totalporlinha=$contadoriteminicial+4;
 $intervalo="5";
?>


<h1 style='font-size: 12px;color: black;text-align:center;bold: Negrito text-decoration: none'>Equipe Elétrica</h1>

</br><center><table  width="500" class="bordasimples">

 <tr>
 <?
 for ($passa1=$contadoriteminicial;$passa1 <=$totalordens;$passa1++){
  //echo "</br>posicao:$passa1//total por linha:$totalporlinha";
      if ($passa1 <=$totalporlinha){

                      $achadiacontador755= OCIParse($ora_conexao, "SELECT  NR_ORDEM_AUX ,ID_ANDAMENTO ,
                      SUBSTR(NVL(ID_PARADA,'N'),0,1) PARA,DS_OBSERVACAO ,DATA_INICIO DATA,CD_COMPONENTE ,
                      DS_MANTENEDOR,DS_MOTIVO,DS_COMPONENTE
                      FROM   AUX_PAINEL_CORRETIVA WHERE NR_SEQUENCIA='$passa1' and  cd_grupo='ELE'  ");


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
                         $descricacomponente=ociresult($achadiacontador755, "DS_COMPONENTE") ;


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
      ?>

      <td bgcolor="<? echo $cor;?>" width="100" height="140" valign="top" >

      <h1 style='font-size: 9px;color: black;text-align:left;bold: Negrito text-decoration: none'>
      <?echo "$ordemmostra</br>";?><?echo "$descricacomponente</br>";?><?echo "$aberturamostra</br>";?>
      <?echo "$descricaomotivo</br>";?><?echo "$nome66</br>";?>
      <?echo "$dataaberturamostra";?>
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
</div>



</div>



</form>
</body>

</html>


