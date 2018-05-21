<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br">
<head>


<style  type="text/css">
#envolve { width: 1310px;}
 #div_1 { position: relative; width: 650px; height: 1200px; background-color: #CAE1FF; border:1;float: left; text-align: center; color: #E8E8E8;  }
 #div_2 { position: relative; width: 650px; height: 1200px; background-color: #CAE1FF; float: right; text-align: center; color: #E8E8E8;}
 #clear { clear:both; }
 
</style>

</head>

<meta http-equiv="refresh" content="90;URL=painelcorretivaversao3katextil.php?banco=<?echo $banco;?>&codigousuario=<?echo $codigousuario;?>&localbanco=<?echo $localbanco;?>">





<?

$navegando=$_GET['navegando'];
$continuarmesmatela=$_POST['continuarmesmatela'];


if ($navegando=="sim"){
$codigousuario=$_GET['codigousuario'];
}

if ($continuarmesmatela=="sim"){
$codigousuario=$_POST['codigousuario'];
}






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


                            /*$elimina55= OCIParse($ora_conexao, "DELETE FROM AUX_PAINEL_CORRETIVA2");
                            OCIExecute($elimina55, OCI_DEFAULT);
                            oci_commit($ora_conexao);

                            echo "DELETE FROM AUX_PAINEL_CORRETIVA</br>";
                            EXIT;
                            */
                            


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








// echo "Unidade de Negócio:$fabricapesquisa - Mês:$mes - Ano:$ano ";



                      $s = OCIParse($ora_conexao, "select  distinct a.NUMERO NRORDEM,a.CD_MANTENEDOR CD_MANTENEDOR,
                      a.MAQ_PARADA MAQ_PARADA,a.STATUS_ANDAMENTO_TIPO STATUS_ANDAMENTO_TIPO,NVL(a.STATUS_ANDAMENTO,'NAO') ANDAMENTO,
                      a.DATA_INICIO DATA_INICIO,a.CD_COMPONENTE CD_COMPONENTE,b.NOME NOME,c.DS_MOTIVO MOTIVO,
                      d.DS_COMPO DESCRICAOCOMPONENTE,a.cd_mao GRUPO,a.STATUS STATUS
                       FROM EMER_COMP a,FUNCIONARIO_SADEGE b,MOTIVO_ORDEM_PARADA c,COMPONENTE_AUXILIAR d
                       where ((a.STATUS='G') or (a.NUMERO in (select NR_ORDEM_AUX from AUX_PAINEL_CORRETIVA2 )))    AND
                       a.CD_MANTENEDOR=b.CADASTRO(+) AND
                       a.cd_fabrica='$fabricapesquisa' AND
                       a.cd_componente=d.cd_compo and
                       a.STATUS_ANDAMENTO_TIPO=c.cd_motivo(+)
                       order by a.NUMERO ASC
                       ");
                       

                       
                       
                       
                       
                       OCIExecute($s, OCI_DEFAULT);
                       While (OCIFetch($s)) {
                          $ordem=ociresult($s, "NRORDEM") ;
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
                          $status77=ociresult($s, "STATUS") ;
                          
                          if ($codigousuario=="1"){

                            echo "</br>ordem:$ordem//status:$status77//andamento:$andamento//mantenedor:$nome5//parada:$parada";
                            
                          }
                          
                          $sgrava1= OCIParse($ora_conexao, "UPDATE  AUX_PAINEL_CORRETIVA2 SET DS_MANTENEDOR='$nome5' WHERE
                                   NR_ORDEM_AUX='$ordem'");
                                   OCIExecute($sgrava1, OCI_DEFAULT);
                                   oci_commit($ora_conexao);
                          
                           IF ($andamento=="NAO")
                            {
                                   $sgrava1= OCIParse($ora_conexao, "UPDATE  AUX_PAINEL_CORRETIVA2 SET ID_ANDAMENTO='NAO' WHERE
                                   NR_ORDEM_AUX='$ordem'");
                                   OCIExecute($sgrava1, OCI_DEFAULT);
                                   oci_commit($ora_conexao);

                            }
                            
                            IF ($andamento=="EMANDAMENTO")
                            {
                                   $sgrava1= OCIParse($ora_conexao, "UPDATE  AUX_PAINEL_CORRETIVA2 SET ID_ANDAMENTO='EMANDAMENTO' WHERE
                                   NR_ORDEM_AUX='$ordem'");
                                   OCIExecute($sgrava1, OCI_DEFAULT);
                                   oci_commit($ora_conexao);

                            }
                          

                           IF (($status77=="B") OR ($status77=="C"))
                            {
                                   $sgrava1= OCIParse($ora_conexao, "UPDATE  AUX_PAINEL_CORRETIVA2 SET ID_ANDAMENTO='BC' WHERE
                                   NR_ORDEM_AUX='$ordem'");
                                   OCIExecute($sgrava1, OCI_DEFAULT);
                                   oci_commit($ora_conexao);

                            }


                          if ($andamento =="EMANDAMENTO"){$andamentog="EMANDAMENTO";}else{$andamentog="NAO";}


                            
                            $achanome5= OCIParse($ora_conexao, "SELECT  NVL(to_char(MIN(DATA_TROCA),'dd/mm->HH24:mi'),0) DATA
                            FROM HIST_MANTENEDOR WHERE ORDEM='$ordem'");
                            OCIExecute($achanome5, OCI_DEFAULT);
                            While (OCIFetch($achanome5)) {
                              $datafinalgrava=ociresult($achanome5, "DATA") ;
                            }


                            IF (($andamento=="BAIXADO") OR ($andamento=="CANCELADO"))
                            {
                                   $sgrava1= OCIParse($ora_conexao, "UPDATE  AUX_PAINEL_CORRETIVA2 SET ID_ANDAMENTO='BC' WHERE
                                   NR_ORDEM_AUX='$ordem'");
                                   OCIExecute($sgrava1, OCI_DEFAULT);
                                   oci_commit($ora_conexao);

                            }


                            IF ($andamento =="FINALIZADO")
                            {

                             //ATUALIZA ANDAMANTO

                                   $sgrava1= OCIParse($ora_conexao, "UPDATE  AUX_PAINEL_CORRETIVA2 SET ID_ANDAMENTO='FINALIZADO' WHERE
                                   NR_ORDEM_AUX='$ordem'");
                                   OCIExecute($sgrava1, OCI_DEFAULT);
                                   oci_commit($ora_conexao);
                            }
                            else
                            {
                            

                                //ATUALIZA DATA
                                 $sgrava1= OCIParse($ora_conexao, "UPDATE  AUX_PAINEL_CORRETIVA2 SET DATA_INICIO='$datafinalgrava' WHERE
                                 NR_ORDEM_AUX='$ordem'");
                                 OCIExecute($sgrava1, OCI_DEFAULT);
                                 oci_commit($ora_conexao);


                                 
                            
                              $achamaxima59= OCIParse($ora_conexao, "SELECT  COUNT(*) VALOR  FROM  AUX_PAINEL_CORRETIVA2 WHERE NR_ORDEM_AUX='$ordem'");
                              OCIExecute($achamaxima59, OCI_DEFAULT);
                              While (OCIFetch($achamaxima59)) {
                              $existeordem=ociresult($achamaxima59, "VALOR") ;
                              }
                                 IF ($existeordem=="0"){


                                 $achamaxima5= OCIParse($ora_conexao, "SELECT  NVL(MAX(NR_SEQUENCIA)+1,1) VALOR FROM  AUX_PAINEL_CORRETIVA2
                                 WHERE CD_GRUPO='$codigogrupo'");
                                 OCIExecute($achamaxima5, OCI_DEFAULT);
                                 While (OCIFetch($achamaxima5)) {
                                   $maxima66=ociresult($achamaxima5, "VALOR") ;
                                 }
                                 


                                 $sgrava1= OCIParse($ora_conexao, "INSERT INTO AUX_PAINEL_CORRETIVA2(NR_SEQUENCIA,
                                 NR_ORDEM_AUX,ID_ANDAMENTO,ID_PARADA,DS_OBSERVACAO,DATA_INICIO,CD_COMPONENTE,DS_MANTENEDOR,DS_MOTIVO,DS_COMPONENTE,CD_GRUPO)
                                 VALUES ('$maxima66','$ordem','$andamentog','$parada','$observacao','$datafinalgrava','$componente',
                                 '$nome5','$descricaomotivo','$descricaocomponente','$codigogrupo')");
                                 OCIExecute($sgrava1, OCI_DEFAULT);
                                 oci_commit($ora_conexao);

                                 //echo "</br>INSERT INTO AUX_PAINEL_CORRETIVA2(NR_SEQUENCIA,
                                 //NR_ORDEM_AUX,ID_ANDAMENTO,ID_PARADA,DS_OBSERVACAO,DATA_INICIO,CD_COMPONENTE,DS_MANTENEDOR,DS_MOTIVO,DS_COMPONENTE,CD_GRUPO)
                                 //VALUES ('$maxima66','$ordem','$andamentog','$parada','$observacao','$datafinalgrava','$componente',
                                 //'$nome5','$descricaomotivo','$descricaocomponente','$codigogrupo')";
                                 
                                 

                                 }//FINAL QUANDO NAO EXISTE AINDA ORDEM NA AUXILIAR

                            }


                       }

                      /*
                      $s99 = OCIParse($ora_conexao, "SELECT  NR_ORDEM_AUX ORDEM ,ID_ANDAMENTO ,NR_SEQUENCIA SEQUENCIA,
                      SUBSTR(NVL(ID_PARADA,'N'),0,1) PARA,DS_OBSERVACAO ,DATA_INICIO DATA,CD_COMPONENTE ,
                      DS_MANTENEDOR,DS_MOTIVO,DS_COMPONENTE,cd_grupo  GRUPO,ID_ANDAMENTO
                      FROM   AUX_PAINEL_CORRETIVA ");
                      OCIExecute($s99, OCI_DEFAULT);
                       While (OCIFetch($s99)) {
                          $ordem7=ociresult($s99, "ORDEM") ;
                          $grupo7=ociresult($s99, "GRUPO") ;
                          $sequencia7=ociresult($s99, "SEQUENCIA") ;
                          $andamento7=ociresult($s99, "ID_ANDAMENTO") ;

                          echo "sequencia:$sequencia7 -Ordem PARA PAINEL:$ordem7 - Grupo:$grupo7 -STATUS:$andamento7</br>";
                       }
                       */
                       
                       









 //=================================================================================================//



 

?>

</center>



<form>



<center><font style='font-size: 23px;color: BLACK;text-align:left;bold: Negrito' >Monitoramento Manutenção Corretiva </font></BR>
<img width=20 height=20 BORDER=0  src="legendamaximiza1.jpg" >Maq.Parada <img width=20 height=20 BORDER=0  src="legendamaximiza2.jpg" >Maq.Não Parada
 <img width=20 height=20 BORDER=0  src="legendamaximiza3.jpg" >Em Andamento</br>




<div id="envolve">


<div id="div_1">
<h1 style='font-size: 12px;color: black;text-align:center;bold: Negrito text-decoration: none'>Equipe Mecânica</h1>

<?

$achadiacontador7= OCIParse($ora_conexao, "SELECT  COUNT(*) VALOR
                      FROM   AUX_PAINEL_CORRETIVA2 where cd_grupo='01'   ");
                      OCIExecute($achadiacontador7, OCI_DEFAULT);
                      While (OCIFetch($achadiacontador7)) {
                         $totalordens=ociresult($achadiacontador7, "VALOR") ;
                      }







 $totalporlinha="5";;
 $intervalo="5";
 $acumulado="0";

?>


</br><center><table  width="500" class="bordasimples">

 <tr>
 <?
 for ($passa1=1;$passa1 <=$totalordens;$passa1++){


                      $achadiacontador755= OCIParse($ora_conexao, "SELECT  NR_ORDEM_AUX ,ID_ANDAMENTO ,
                      SUBSTR(NVL(ID_PARADA,'N'),0,1) PARA,DS_OBSERVACAO ,DATA_INICIO DATA,CD_COMPONENTE ,
                      DS_MANTENEDOR,DS_MOTIVO,DS_COMPONENTE
                      FROM   AUX_PAINEL_CORRETIVA2 WHERE  NR_SEQUENCIA='$passa1' AND cd_grupo='01'");

                      
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

                         //echo "ORDEM:$ordemmostra//parada:$paradamostra//ANDAMENTO:$andamento</br>";

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


                        

                        



                      }


if (($andamento=="NAO") or ($andamento=="EMANDAMENTO")){
$acumulado=$acumulado+1;

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
                        
                        $achanome5= OCIParse($ora_conexao, "SELECT  to_char(MIN(DATA_TROCA),'dd/mm->HH24:mi') DATA
                            FROM HIST_MANTENEDOR WHERE ORDEM='$ordemmostra'");
                            OCIExecute($achanome5, OCI_DEFAULT);
                            While (OCIFetch($achanome5)) {
                              $datafinalgrava=ociresult($achanome5, "DATA") ;
                            }



?>



      <td bgcolor="<? echo $cor;?>" width="100" height="140" valign="top" >
      
      <h1 style='font-size: 15px;color: black;text-align:left;bold: Negrito text-decoration: none'>
      <?echo "$ordemmostra</br>";?>
      <h1 style='font-size: 12px;color: black;text-align:left;bold: Negrito text-decoration: none'>
      <?echo "$descricacomponente</br>";?>
      <h1 style='font-size: 11px;color: black;text-align:left;bold: Negrito text-decoration: none'><?echo "$aberturamostra</br>";?>
      <h1 style='font-size: 12px;color: black;text-align:left;bold: Negrito text-decoration: none'>
      <?echo "$descricaomotivo</br>";?><?echo "$nome66</br>";?>
      <h1 style='font-size: 11px;color: black;text-align:left;bold: Negrito text-decoration: none'><?echo "$datafinalgrava</br>";?>
      </td>
      <?
}






if ($acumulado==$totalporlinha){?>
          </tr>
          <tr>
          <?
          $acumulado="0";
          //$totalporlinha7=$intervalo7+$passa17;

         }
         if ($passa1==$totalordens){

            if ($acumulado <$totalporlinha){?>
                 </tr>
            <?}

         }


}
?>
</table>

</div>

<div id="div_2">
<?
$achadiacontador7= OCIParse($ora_conexao, "SELECT  COUNT(*) VALOR
                      FROM   AUX_PAINEL_CORRETIVA2 where cd_grupo='02'");
                      OCIExecute($achadiacontador7, OCI_DEFAULT);
                      While (OCIFetch($achadiacontador7)) {
                         $totalordens7=ociresult($achadiacontador7, "VALOR") ;
                      }







 $totalporlinha7="5";
 $intervalo7="5";
 $acumulado="0";

?>


<h1 style='font-size: 12px;color: black;text-align:center;bold: Negrito text-decoration: none'>Equipe Elétrica</h1>

</br><center><table  width="500" class="bordasimples">

 <tr>
 <?
 for ($passa17=1;$passa17<=$totalordens7;$passa17++){
  //echo "</br>posicao:$passa1//total por linha:$totalporlinha";
      //if ($passa17 <=$totalporlinha7){

                      $achadiacontador755= OCIParse($ora_conexao, "SELECT  NR_ORDEM_AUX ,ID_ANDAMENTO ,
                      SUBSTR(NVL(ID_PARADA,'N'),0,1) PARA,DS_OBSERVACAO ,DATA_INICIO DATA,CD_COMPONENTE ,
                      DS_MANTENEDOR,DS_MOTIVO,DS_COMPONENTE
                      FROM   AUX_PAINEL_CORRETIVA2 WHERE  NR_SEQUENCIA='$passa17' AND cd_grupo='02'");


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








                      }


if (($andamento=="NAO") or ($andamento=="EMANDAMENTO")){
$acumulado=$acumulado+1;

                        $achadatainicio7= OCIParse($ora_conexao, "SELECT  distinct to_char(DATA_INICIO,'dd/mm') DATA,HORA_INICIO,MINUTO_INICIO FROM
                        EMER_COMP WHERE NUMERO='$ordemmostra'
                         ");
                         OCIExecute($achadatainicio7, OCI_DEFAULT);
                         While (OCIFetch($achadatainicio7)) {
                         $dataabertura=ociresult($achadatainicio7, "DATA") ;
                         $horaabertura=ociresult($achadatainicio7, "HORA_INICIO") ;
                         $minutoabertura=ociresult($achadatainicio7, "MINUTO_INICIO") ;
                         $aberturamostra=$dataabertura."->".$horaabertura.":".$minutoabertura;

                        }
                        
                        $achanome5= OCIParse($ora_conexao, "SELECT  to_char(MIN(DATA_TROCA),'dd/mm->HH24:mi') DATA
                            FROM HIST_MANTENEDOR WHERE ORDEM='$ordemmostra'");
                            OCIExecute($achanome5, OCI_DEFAULT);
                            While (OCIFetch($achanome5)) {
                              $datafinalgrava=ociresult($achanome5, "DATA") ;
                            }
                        
?>

      <td bgcolor="<? echo $cor;?>" width="100" height="140" valign="top" >

      <h1 style='font-size: 15px;color: black;text-align:left;bold: Negrito text-decoration: none'>
      <?echo "$ordemmostra</br>";?>
      <h1 style='font-size: 12px;color: black;text-align:left;bold: Negrito text-decoration: none'>
      <?echo "$descricacomponente</br>";?>

      <h1 style='font-size: 11px;color: black;text-align:left;bold: Negrito text-decoration: none'>

      <?echo "$aberturamostra</br>";?>
      <h1 style='font-size: 12px;color: black;text-align:left;bold: Negrito text-decoration: none'>
      <?echo "$descricaomotivo</br>";?><?echo "$nome66</br>";?>
      <h1 style='font-size: 11px;color: black;text-align:left;bold: Negrito text-decoration: none'><?echo "$datafinalgrava</br>";?>

      </td>
      <?
}


         if ($acumulado==$totalporlinha7){?>
          </tr>
          <tr>
          <?
          $acumulado="0";
          //$totalporlinha7=$intervalo7+$passa17;

         }
         if ($passa17==$totalordens7){

            if ($acumulado <$totalporlinha7){?>
                 </tr>
            <?}

         }

}
?>
</table>
</div>


</div>


	<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
	<input type="hidden" name="continuarmesmatela" value="sim">
</form>
</html>


