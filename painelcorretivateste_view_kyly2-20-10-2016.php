<?require("estilo2_sitenovo.css");
ini_set('display_errors', '1');// NÃO HABILITAD 

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

                     //$pagina_atual = $_GET['pagina_atual'];
					 

					 
require("conexaoadodb_oracle.php");
require_once('manipulasql.class_oraclenovo.php');
?>
<html>

<head>
<style  type="text/css">
#envolve { width: 100%;}
 #div_1 { position: relative; width: 49.9%; height: 1200px; background-color: #CAE1FF; border:1;float: left; text-align: center; color: #E8E8E8; z-index:-1; }
 #div_2 { position: relative; width: 49.9%; height: 1200px; background-color: #CAE1FF; float: right; text-align: center; color: #E8E8E8; z-index:-1;}
 #clear { clear:both; }

</style>

</head>

<meta http-equiv="refresh" content="30;URL=painelcorretivateste_view_kyly2.php?banco=<?echo $banco;?>&codigousuario=<?echo $codigousuario;?>&localbanco=<?echo $localbanco;?>">

<form>
<?require("areasuperior2.php");?>


<?

?><titulogeral><? echo "$titulo";?></titulogeral></br>




<?




if (!IsSet($mes)){
$mes=date('m');
}

if (!IsSet($ano)){
$ano=date('Y');
}


$codigoproximoregitro1 = "SELECT DESCRICAO from PESSOA_BI WHERE
    CODIGO IN (SELECT CD_EMPRESA FROM USUARIO_BI  WHERE nm_usuario='$edusuario')";
$codigoproximoregitro2= $conn->Execute($codigoproximoregitro1);
while ( !$codigoproximoregitro2->EOF)
{
$unidadelotacao1=$codigoproximoregitro2->fields["0"];
$codigoproximoregitro2->MoveNext();
}


$codigoproximoregitro1 = "select CD_FABRICA FROM  FABRICAS WHERE DS_FABRICA='$unidadelotacao1'";
$codigoproximoregitro2= $conn->Execute($codigoproximoregitro1);
while ( !$codigoproximoregitro2->EOF)
{
$fabricapesquisa=$codigoproximoregitro2->fields["0"];
$codigoproximoregitro2->MoveNext();
}

$fabricapesquisa="02";
    


 ?>


<CENTER><font style='font-size: 23px;color: BLACK;text-align:left;bold: Negrito' >Monitoramento da Manutenção </font></BR>



 <img width=20 height=20 BORDER=0  src="legendamaximiza1.jpg" >Maq.Parada <img width=20 height=20 BORDER=0  src="legendamaximiza2.jpg" >Maq.Não Parada
 <img width=20 height=20 BORDER=0  src="legendamaximiza3.jpg" >Em Andamento<img width=20 height=20 BORDER=0  src="legendamaximiza9.png" >Preventiva</br>

 <hr>

<?
 $passa1="1";
 $totalporlinha="5";
 
 $codigoproximoregitro1 = "SELECT  count(*) CONTADOR
                      FROM   AUX_PAINEL_CORRETIVA_W a,EMER_COMP b
                      where a.NRORDEM=b.numero and
                      b.cd_mao='01' and fabrica='$fabricapesquisa' and andamento  not in ('FINALIZADO')";
$codigoproximoregitro2= $conn->Execute($codigoproximoregitro1);
while ( !$codigoproximoregitro2->EOF)
{
$totalordens=$codigoproximoregitro2->fields["0"];
$codigoproximoregitro2->MoveNext();
}

 


?>


<div id="envolve">


<div id="div_1">
 <h1 style='font-size: 12px;color: black;text-align:center;bold: Negrito text-decoration: none'>Equipe Mecânica</h1>
</br><center><table class="bordasimples">

 <tr>
 <?

                      $achaordens1 = "SELECT  NRORDEM ,ANDAMENTO ,
                      MAQ_PARADA PARA,STATUS_ANDAMENTO_TIPO OBSERVACAO ,to_char(DATA_INICIO,'dd/mm/yyyy') DATA,CD_COMPONENTE ,
                      NOME,MOTIVO,DESCRICAOCOMPONENTE
                      FROM   AUX_PAINEL_CORRETIVA_W WHERE NRORDEM in (select NUMERO FROM EMER_COMP WHERE CD_MAO='01') and fabrica='$fabricapesquisa'
                      and andamento  not in ('FINALIZADO')  ORDER BY NRORDEM DESC";
                      $achaordens2= $conn->Execute($achaordens1);
                      while ( !$achaordens2->EOF)
                      {
                      
                         $ordemmostra=$achaordens2->fields["NRORDEM"];
						 $paradamostra=$achaordens2->fields["PARA"];
						 $componentemostra=$achaordens2->fields["CD_COMPONENTE"];
						 $andamento=$achaordens2->fields["ANDAMENTO"];
						 $dataabertura=$achaordens2->fields["DATA"];
						 $observacao=$achaordens2->fields["OBSERVACAO"];
						 $nome66=$achaordens2->fields["NOME"];
						 $descricaomotivo=$achaordens2->fields["MOTIVO"];
						 $descricacomponente=$achaordens2->fields["DESCRICAOCOMPONENTE"];
                        
                         
						    $achaordens3zz = "SELECT  CD_TIPO from  EMER_COMP WHERE NUMERO='$ordemmostra'";
                             //echo "$achaordens3zz</br>";
							 $achaordens4zz= $conn->Execute($achaordens3zz);
							 $pegoutipo6=$achaordens4zz->fields["0"];
							 
					 if ($pegoutipo6=="P")
					 {
						 $cor="green";
					 }
					 else
					 {
						
						 

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
                             //$achaordens3zz = "SELECT  CD_TIPO from  EMER_COMP WHERE NUMERO='$ordemmostra'";
                             //echo "$achaordens3zz</br>";
							 //$achaordens4zz= $conn->Execute($achaordens3zz);
							 //$pegoutipo6=$achaordens4zz->fields["0"];
							 
							 $cor="yellow";
							 
							  //if ($pegoutipo6=="P"){$cor="green";}else{$cor="yellow";}
							 
							 

                          }

                            $dataaberturamostra=$dataabertura;
                         }
					 }//quando termina de analisar diferente de preventiva
					 
                         $achaordens3 = "SELECT  to_char(DATA_INICIO,'dd/mm') DATA,HORA_INICIO,MINUTO_INICIO,
                        cd_mao GRUPO,to_char(MANTENEDOR_HORA,'dd/mm hh24:mi')MANTENEDOR_HORA FROM
                        EMER_COMP WHERE NUMERO='$ordemmostra'";
                      $achaordens4= $conn->Execute($achaordens3);
                      while ( !$achaordens4->EOF)
                      {
                      
                         $dataabertura=$achaordens4->fields["DATA"];
						 $horaabertura=$achaordens4->fields["HORA_INICIO"];
						 $minutoabertura=$achaordens4->fields["MINUTO_INICIO"];
						 $grupo=$achaordens4->fields["GRUPO"];
						 $aberturamostra=$dataabertura."->".$horaabertura.":".$minutoabertura;
						 $manthora=$achaordens4->fields["MANTENEDOR_HORA"];
                       $achaordens4->MoveNext();
                       }  
						 ?>

                        <td bgcolor="<? echo $cor;?>" width="100" height="140" valign="top" >

      <h1 style='font-size: 15px;color: black;text-align:left;bold: Negrito text-decoration: none'>
      <?echo "$ordemmostra</br>";?>
	  <h1 style='font-size: 11px;color: black;text-align:left;bold: Negrito text-decoration: none'><?echo "$aberturamostra</br>";?>
      <h1 style='font-size: 12px;color: black;text-align:left;bold: Negrito text-decoration: none'>
      <?echo "$descricacomponente</br>";?>      
      <h1 style='font-size: 12px;color: black;text-align:left;bold: Negrito text-decoration: none'>
      <?echo "$nome66</br>";?><?echo "$manthora</br>";?>
	  <?if ($paradamostra=="N"){?>
		  <h1 style='font-size: 12px;color: red;text-align:left;bold: Negrito text-decoration: none'>
		  <?echo "$descricaomotivo</br>";?>   
	  <?}else{?>
	      <h1 style='font-size: 12px;color: yellow;text-align:left;bold: Negrito text-decoration: none'>
		  <?echo "$descricaomotivo</br>";?>   
	  <?}?>
      </td>
      <?
       IF ($passa1==$totalporlinha){$passa1="0";?></tr><tr><?}
       IF ($passa1==$totalordens){?></tr><?}

       $passa1=$passa1+1;

      $achaordens2->MoveNext();
      }//FINALDA ORDEM
      ?>



      </table>
</div>



<?
 $passa1="1";
 $totalporlinha="5";


$codigoproximoregitro1 = "SELECT  count(*) CONTADOR
                      FROM   AUX_PAINEL_CORRETIVA_W a,EMER_COMP b
                      where a.NRORDEM=b.numero and
                      b.cd_mao='02' and fabrica='$fabricapesquisa' and andamento  not in ('FINALIZADO')";
$codigoproximoregitro2= $conn->Execute($codigoproximoregitro1);
while ( !$codigoproximoregitro2->EOF)
{
$totalordens=$codigoproximoregitro2->fields["0"];
$codigoproximoregitro2->MoveNext();
}
?>



<div id="div_2">
 <h1 style='font-size: 12px;color: black;text-align:center;bold: Negrito text-decoration: none'>Equipe Eletrica</h1>
</br><center><table class="bordasimples">

 <tr>
 <?


                      $achaordens1 = "SELECT  NRORDEM ,ANDAMENTO ,
                      MAQ_PARADA PARA,STATUS_ANDAMENTO_TIPO OBSERVACAO ,to_char(DATA_INICIO,'dd/mm/yyyy') DATA,CD_COMPONENTE ,
                      NOME,MOTIVO,DESCRICAOCOMPONENTE
                      FROM   AUX_PAINEL_CORRETIVA_W WHERE NRORDEM in (select NUMERO FROM EMER_COMP WHERE CD_MAO='02') and fabrica='$fabricapesquisa'
                      and andamento  not in ('FINALIZADO')  ORDER BY NRORDEM DESC";
                      $achaordens2= $conn->Execute($achaordens1);
                      while ( !$achaordens2->EOF)
                      {
                      
                         $ordemmostra=$achaordens2->fields["NRORDEM"];
						 $paradamostra=$achaordens2->fields["PARA"];
						 $componentemostra=$achaordens2->fields["CD_COMPONENTE"];
						 $andamento=$achaordens2->fields["ANDAMENTO"];
						 $dataabertura=$achaordens2->fields["DATA"];
						 $observacao=$achaordens2->fields["OBSERVACAO"];
						 $nome66=$achaordens2->fields["NOME"];
						 $descricaomotivo=$achaordens2->fields["MOTIVO"];
						 $descricacomponente=$achaordens2->fields["DESCRICAOCOMPONENTE"];
                        
                      $achaordens3zz = "SELECT  CD_TIPO from  EMER_COMP WHERE NUMERO='$ordemmostra'";
                             //echo "$achaordens3zz</br>";
							 $achaordens4zz= $conn->Execute($achaordens3zz);
							 $pegoutipo6=$achaordens4zz->fields["0"];
							 
					 if ($pegoutipo6=="P")
					 {
						 $cor="green";
					 }
					 else
					 {   
						 

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
                    }//quando termina de analisar diferente de preventiva
                         $achaordens3 = "SELECT  to_char(DATA_INICIO,'dd/mm') DATA,HORA_INICIO,MINUTO_INICIO,
                        cd_mao GRUPO,to_char(MANTENEDOR_HORA,'dd/mm hh24:mi')MANTENEDOR_HORA FROM
                        EMER_COMP WHERE NUMERO='$ordemmostra'";
                      $achaordens4= $conn->Execute($achaordens3);
                      while ( !$achaordens4->EOF)
                      {
                      
                         $dataabertura=$achaordens4->fields["DATA"];
						 $horaabertura=$achaordens4->fields["HORA_INICIO"];
						 $minutoabertura=$achaordens4->fields["MINUTO_INICIO"];
						 $grupo=$achaordens4->fields["GRUPO"];
						 $aberturamostra=$dataabertura."->".$horaabertura.":".$minutoabertura;
						 $manthora=$achaordens4->fields["MANTENEDOR_HORA"];
                       $achaordens4->MoveNext();
                       }  

                        ?>

                        <td bgcolor="<? echo $cor;?>" width="100" height="140" valign="top" >

      <h1 style='font-size: 15px;color: black;text-align:left;bold: Negrito text-decoration: none'>
      <?echo "$ordemmostra</br>";?>
	  <h1 style='font-size: 11px;color: black;text-align:left;bold: Negrito text-decoration: none'><?echo "$aberturamostra</br>";?>
      <h1 style='font-size: 12px;color: black;text-align:left;bold: Negrito text-decoration: none'>
      <?echo "$descricacomponente</br>";?>      
      <h1 style='font-size: 12px;color: black;text-align:left;bold: Negrito text-decoration: none'>
      <?echo "$nome66</br>";?><?echo "$manthora</br>";?>
	  <?if ($paradamostra=="N"){?>
		  <h1 style='font-size: 12px;color: red;text-align:left;bold: Negrito text-decoration: none'>
		  <?echo "$descricaomotivo</br>";?>   
	  <?}else{?>
	      <h1 style='font-size: 12px;color: yellow;text-align:left;bold: Negrito text-decoration: none'>
		  <?echo "$descricaomotivo</br>";?>   
	  <?}?>
      </td>
      <?
       IF ($passa1==$totalporlinha){$passa1="0";?></tr><tr><?}
       IF ($passa1==$totalordens){?></tr><?}

       $passa1=$passa1+1;

      $achaordens2->MoveNext();
      }//FINALDA ORDEM
      ?>



      </table>
</div>
</div>


</form>
</html>


