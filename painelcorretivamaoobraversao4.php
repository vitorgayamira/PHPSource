<html>

<head>
<style  type="text/css">
#envolve { width: 1310px;}
 #div_1 { position: relative; width: 500px; height: 1200px; background-color: white; border:1;float: left; text-align: center; color: #E8E8E8;  }
 #div_2 { position: relative; width: 500px; height: 1200px; background-color: white; float: right; text-align: center; color: #E8E8E8;}
 #clear { clear:both; }

</style>

</head>

<meta http-equiv="refresh" content="30;URL=painelcorretivamaoobraversao4.php?banco=<?echo $banco;?>&codigousuario=<?echo $codigousuario;?>&localbanco=<?echo $localbanco;?>">

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




 ?>


<CENTER><font style='font-size: 23px;color: BLACK;text-align:left;bold: Negrito' >Painel Corretiva e Plano Semanal </font></BR>



 <img width=20 height=20 BORDER=0  src="legendamaximiza1.jpg" >Maq.Parada <img width=20 height=20 BORDER=0  src="legendamaximiza2.jpg" >Maq.Não Parada
 <img width=20 height=20 BORDER=0  src="legendamaximiza3.jpg" >Em Andamento</br>

 <hr>

<?
 $passa1="1";
 $totalporlinha="5";

/*
$achadiacontador755= OCIParse($ora_conexao, "SELECT  NRORDEM ,ANDAMENTO ,
                      MAQ_PARADA PARA,STATUS_ANDAMENTO_TIPO OBSERVACAO ,DATA_INICIO DATA,CD_COMPONENTE ,
                      NOME,MOTIVO,DESCRICAOCOMPONENTE
                      FROM   AUX_PAINEL_CORRETIVA_W WHERE NRORDEM in (select NUMERO FROM EMER_COMP WHERE CD_MAO='01') and fabrica='$fabricapesquisa'
                       ORDER BY NRORDEM ASC ");
                      OCIExecute($achadiacontador755, OCI_DEFAULT);
                      While (OCIFetch($achadiacontador755)) {
                         $ordemmostra=ociresult($achadiacontador755, "NRORDEM") ;
                         $componentemostra=ociresult($achadiacontador755, "CD_COMPONENTE") ;
                         $paradamostra=ociresult($achadiacontador755, "PARA") ;
                         $andamento=ociresult($achadiacontador755, "ANDAMENTO") ;
                         echo "ordem:$ordemmostra //andamento:$andamento//STATUS PARADA:$paradamostra</br>";
}
*/



$achadiacontador7= OCIParse($ora_conexao, "SELECT  count(*) CONTADOR
                      FROM   AUX_PAINEL_CORRETIVA_W a,EMER_COMP b
                      where a.NRORDEM=b.numero and
                      b.cd_mao='01' and fabrica='$fabricapesquisa' and andamento  not in ('FINALIZADO')
                      ");
                      OCIExecute($achadiacontador7, OCI_DEFAULT);
                      While (OCIFetch($achadiacontador7)) {
                         $totalordens=ociresult($achadiacontador7, "CONTADOR") ;
                      }
?>


<div style="width: 1200px; height: 370px; overflow-y: auto;">


<div id="div_1">
 <h1 style='font-size: 12px;color: black;text-align:center;bold: Negrito text-decoration: none'>Equipe Mecânica</h1>
</br><center><table  width="500" class="bordasimples">

 <tr>
 <?

 //for ($passa1=$contadoriteminicial;$passa1 <=$totalordens;$passa1++){
  //echo "</br>posicao:$passa1//total por linha:$totalporlinha";
      //if ($passa1 <=$totalporlinha){



                      $achadiacontador755= OCIParse($ora_conexao, "SELECT  NRORDEM ,ANDAMENTO ,
                      MAQ_PARADA PARA,STATUS_ANDAMENTO_TIPO OBSERVACAO ,DATA_INICIO DATA,CD_COMPONENTE ,
                      NOME,MOTIVO,DESCRICAOCOMPONENTE
                      FROM   AUX_PAINEL_CORRETIVA_W WHERE NRORDEM in (select NUMERO FROM EMER_COMP WHERE CD_MAO='01') and fabrica='$fabricapesquisa'
                      and andamento  not in ('FINALIZADO')  ORDER BY NRORDEM ASC ");
                      OCIExecute($achadiacontador755, OCI_DEFAULT);
                      While (OCIFetch($achadiacontador755)) {
                         $ordemmostra=ociresult($achadiacontador755, "NRORDEM") ;
                         $componentemostra=ociresult($achadiacontador755, "CD_COMPONENTE") ;
                         $paradamostra=ociresult($achadiacontador755, "PARA") ;
                         $andamento=ociresult($achadiacontador755, "ANDAMENTO") ;
                         $dataabertura=ociresult($achadiacontador755, "DATA") ;
                         $observacao=ociresult($achadiacontador755, "OBSERVACAO") ;
                         $nome66=ociresult($achadiacontador755, "NOME") ;
                         $descricaomotivo=ociresult($achadiacontador755, "MOTIVO") ;
                         $descricacomponente=ociresult($achadiacontador755, "DESCRICAOCOMPONENTE") ;
                         //echo "parada:$paradamostra//ANDAMENTO:$andamento</br>";

                         if (($andamento=="NAO") OR ($andamento=="PARADO")){
                            if ($paradamostra=="S"){$cor="red";}
                            if ($paradamostra=="N"){$cor="yellow";}
                            $dataaberturamostra="";
                         }
                         else
                         {
                          if ($paradamostra=="S" ){
                             $cor="#87CEEB";
                             //AZUL";

                          }
                          if ($paradamostra=="N"){
                             $cor="yellow";

                          }

                            $dataaberturamostra=$dataabertura;
                         }



                        $achadatainicio7= OCIParse($ora_conexao, "SELECT  to_char(DATA_INICIO,'dd/mm') DATA,HORA_INICIO,MINUTO_INICIO,
                        cd_mao GRUPO FROM
                        EMER_COMP WHERE NUMERO='$ordemmostra'
                         ");
                         OCIExecute($achadatainicio7, OCI_DEFAULT);
                         While (OCIFetch($achadatainicio7)) {
                         $dataabertura=ociresult($achadatainicio7, "DATA") ;
                         $horaabertura=ociresult($achadatainicio7, "HORA_INICIO") ;
                         $minutoabertura=ociresult($achadatainicio7, "MINUTO_INICIO") ;
                         $grupo=ociresult($achadatainicio7, "GRUPO") ;
                         $aberturamostra=$dataabertura."->".$horaabertura.":".$minutoabertura;

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
      <h1 style='font-size: 11px;color: black;text-align:left;bold: Negrito text-decoration: none'><?echo "$dataaberturamostra";?>
      </td>
      <?
       IF ($passa1==$totalporlinha){$passa1="0";?></tr><tr><?}
       IF ($passa1==$totalordens){?></tr><?}

       $passa1=$passa1+1;

      }//FINALDA ORDEM
      ?>



      </table>
</div>



<?
 $passa1="1";
 $totalporlinha="5";


$achadiacontador7= OCIParse($ora_conexao, "SELECT  count(*) CONTADOR
                      FROM   AUX_PAINEL_CORRETIVA_W a,EMER_COMP b
                      where a.NRORDEM=b.numero and
                      b.cd_mao='02' and fabrica='$fabricapesquisa' and andamento  not in ('FINALIZADO')");
                      OCIExecute($achadiacontador7, OCI_DEFAULT);
                      While (OCIFetch($achadiacontador7)) {
                         $totalordens=ociresult($achadiacontador7, "CONTADOR") ;
                      }
?>



<div id="div_2">
 <h1 style='font-size: 12px;color: black;text-align:center;bold: Negrito text-decoration: none'>Equipe Eletrica</h1>
</br><center><table  width="500" class="bordasimples">

 <tr>
 <?

 //for ($passa1=$contadoriteminicial;$passa1 <=$totalordens;$passa1++){
  //echo "</br>posicao:$passa1//total por linha:$totalporlinha";
      //if ($passa1 <=$totalporlinha){

                      $achadiacontador755= OCIParse($ora_conexao, "SELECT  NRORDEM ,ANDAMENTO ,
                      MAQ_PARADA PARA,STATUS_ANDAMENTO_TIPO OBSERVACAO ,DATA_INICIO DATA,CD_COMPONENTE ,
                      NOME,MOTIVO,DESCRICAOCOMPONENTE
                      FROM   AUX_PAINEL_CORRETIVA_W WHERE NRORDEM in (select NUMERO FROM EMER_COMP WHERE CD_MAO='02') and fabrica='$fabricapesquisa'
                      and andamento  not in ('FINALIZADO') ORDER BY NRORDEM ASC ");
                      OCIExecute($achadiacontador755, OCI_DEFAULT);
                      While (OCIFetch($achadiacontador755)) {
                         $ordemmostra=ociresult($achadiacontador755, "NRORDEM") ;
                         $componentemostra=ociresult($achadiacontador755, "CD_COMPONENTE") ;
                         $paradamostra=ociresult($achadiacontador755, "PARA") ;
                         $andamento=ociresult($achadiacontador755, "ANDAMENTO") ;
                         $dataabertura=ociresult($achadiacontador755, "DATA") ;
                         $observacao=ociresult($achadiacontador755, "OBSERVACAO") ;
                         $nome66=ociresult($achadiacontador755, "NOME") ;
                         $descricaomotivo=ociresult($achadiacontador755, "MOTIVO") ;
                         $descricacomponente=ociresult($achadiacontador755, "DESCRICAOCOMPONENTE") ;
                         //echo "parada:$paradamostra//ANDAMENTO:$andamento</br>";

                         if (($andamento=="NAO") OR ($andamento=="PARADO")){
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



                        $achadatainicio7= OCIParse($ora_conexao, "SELECT  to_char(DATA_INICIO,'dd/mm') DATA,HORA_INICIO,MINUTO_INICIO,
                        cd_mao GRUPO FROM
                        EMER_COMP WHERE NUMERO='$ordemmostra'
                         ");
                         OCIExecute($achadatainicio7, OCI_DEFAULT);
                         While (OCIFetch($achadatainicio7)) {
                         $dataabertura=ociresult($achadatainicio7, "DATA") ;
                         $horaabertura=ociresult($achadatainicio7, "HORA_INICIO") ;
                         $minutoabertura=ociresult($achadatainicio7, "MINUTO_INICIO") ;
                         $grupo=ociresult($achadatainicio7, "GRUPO") ;
                         $aberturamostra=$dataabertura."->".$horaabertura.":".$minutoabertura;

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
      <h1 style='font-size: 11px;color: black;text-align:left;bold: Negrito text-decoration: none'><?echo "$dataaberturamostra";?>
      </td>
      <?
       IF ($passa1==$totalporlinha){$passa1="0";?></tr><tr><?}
       IF ($passa1==$totalordens){?></tr><?}

       $passa1=$passa1+1;

      }//FINALDA ORDEM
      ?>



      </table>
</div>






</div>
</br></br>
<CENTER><font style='font-size: 20px;color: BLACK;text-align:left;bold: Negrito' >Plano Semanal </font></BR>


<?require ("mostrasemanapainel.php");?>

</form>
</body>

</html>


