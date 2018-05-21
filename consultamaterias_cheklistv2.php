<?require("estilo2_sitenovo.css");
ini_set('display_errors', '0');// NÃO HABILITAD 

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
					 

					 
require("conexaoadodb_oracle.php");
require_once('manipulasql.class_oraclenovo.php');




if (!IsSet($month)){
$month=date('m');
}
if (!IsSet($mes)){
$mes=date('m');
}

if (!IsSet($turno)){
$turno="1";
}
if (!IsSet($diasemana)){
$diasemana=date('d');
}
if (!IsSet($contador)){
$contador="1";
}
if (!IsSet($mudoumes)){
$mudoumes="nao";
}

//if (!IsSet($year)){
//$year=date('Y');
//}

//echo "Local banco:$localbanco";

//if (!IsSet($anoescolha)){$anoescolha=date('Y');}

if (!IsSet($mesescolha)){$mesescolha=date('m');}

$mes=$mesescolha;


$elimina1 = "delete from  AUX_CONSULTA_CUSTO";
$elimina12= $conn->Execute($elimina1);





if (!IsSet($fabricapesquisa)){
//acha uni  dae de lotacao

    $achaunidade= "SELECT DESCRICAO from PESSOA_BI WHERE
    CODIGO='$codigoempresa'";
	$achaunidade2= $conn->Execute($achaunidade);
    $unidadelotacao1=$achaunidade2->fields["0"];
	
    
    $achaunidade= "select CD_FABRICA FROM  FABRICAS WHERE DS_FABRICA='$unidadelotacao1'";
	$achaunidade2= $conn->Execute($achaunidade);
    $fabricapesquisa=$achaunidade2->fields["0"];
	
}

//if (!IsSet($ano)){
//$ano=date('Y');
//}

if (!IsSet($mes)){
$mes=date('m');
}



?>
<CENTER>
 </br>
<font style='font-size: 22px;color: RED;text-align:left;bold: Negrito' >Consulta Custo Padrão </font>
<hr>

<table>

<tr>


<td>

<table>

<tr>
<td>Unidade</td><td>
    <select name="fabricapesquisa">
                    <option value="<?echo $fabricapesquisa;?>"><? echo $fabricapesquisa;?></option>
                 <option value="">Todas</option>
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
<input type="hidden" name="year" value="<?echo $year;?>">
<td>Ano</td><td><input type="txt" name="ano" value="<?echo $yearacha;?>"></td>
</tr>
</table>


<?


if (!IsSet($data1)){
$data1="1";
}


if ($dataanterior >"0"){
$primeirodia=$dataanterior;
$mesachou1=$mesanterior;
}
else
{
   if ($data1 >"0"){
   $primeirodia=$data1;
   }
   else
   {
   $primeirodia="1";
   $data1="1";
   }
$mesachou1=$month;
}

   if ($data2 >"0"){
    $ultimodia=$data2;
   }
   else
   {
     $ultimodia= date("t", mktime(0,0,0,$month,'01',$ano));
    $data2=$ultimodia;
   }
   $mesachou2=$month;


  $datapesquisainicial=$primeirodia."/".$mesachou1."/".$ano;
 $datapesquisafinal=$ultimodia."/".$mesachou2."/".$ano;

 ?>
 <center>
 </br></br></br>

<?


echo "Intervalo:".$datapesquisainicial." Até ".$datapesquisafinal; ?>

<a href="consultamaterias_cheklist.php?navegando=sim&codigoempresa=<?ECHO $codigoempresa;?>
             &banco=<?ECHO $banco;?>&codigousuario=<?ECHO $codigousuario;?>&ano=<?ECHO "$ano";?>&localbanco=<?ECHO "$localbanco";?>&veiculo=<?ECHO "$veiculo";?>">Limpar Datas</a>

</td>



<?

echo "Em Manutenção2";
exit;

//echo "Data Selecionada:".$datapesquisainicial." Até ".$datapesquisafinal;



  //grava a auxiliar

  $sm= OCIParse($ora_conexao, "select sum(a.quant*b.valor) VALOR,a.cd_componente CODIGOEQUIPAMENTO,d.cd_maquina MAQUINA
  from
  rot_compo_mt a,mat_pecas b,ORDEM_COMP c,componente_auxiliar d
  where a.cd_material=b.cd_material AND
  b.flag='M' and
  a.cd_componente=c.cd_componente and
  a.cd_componente=d.cd_compo and
  a.cd_atividade=c.cd_atividade and
  c.STATUS='G' and
  c.cd_fabrica='$fabricapesquisa' and
  c.data_plane >='$datapesquisainicial' and
  c.data_plane <='$datapesquisafinal'
  group by  a.cd_componente,d.cd_maquina ORDER BY VALOR DESC
  ");



  OCIExecute($sm, OCI_DEFAULT);
        While (OCIFetch($sm)) {

          $valorcusto=ociresult($sm, "VALOR") ;
          $codigoequipamento=ociresult($sm, "CODIGOEQUIPAMENTO") ;
          $codigomaquina=ociresult($sm, "MAQUINA") ;

          $valorcusto= str_replace(",", ".","$valorcusto" );






          $sgrava1= OCIParse($ora_conexao, "insert into AUX_CONSULTA_CUSTO(CD_COMPONENTE,VL_CUSTO_MATERIAL,
          VL_CUSTO_PECAS,VL_CUSTO_TOTAL,VL_PARTICIPACAO,cd_maquina) VALUES(
                           '$codigoequipamento',$valorcusto,'0','0','0','$codigomaquina')");
                           OCIExecute($sgrava1, OCI_DEFAULT);
                           oci_commit($ora_conexao);



  }

  $sm= OCIParse($ora_conexao, "select sum(a.quant*b.valor) VALOR,a.cd_componente CODIGOEQUIPAMENTO
  from
  rot_compo_pc a,mat_pecas b,ORDEM_COMP c
  where a.cod_peca=b.cd_material AND
  b.flag='P' and
  a.cd_componente=c.cd_componente and
  a.cd_atividade=c.cd_atividade and
  c.STATUS='G' and
  c.cd_fabrica='$fabricapesquisa' and
  c.data_plane >='$datapesquisainicial' and
  c.data_plane <='$datapesquisafinal'
  group by  a.cd_componente ORDER BY VALOR DESC
  ");
  

  OCIExecute($sm, OCI_DEFAULT);
        While (OCIFetch($sm)) {

          $valorcustopeca=ociresult($sm, "VALOR") ;
          $codigoequipamento=ociresult($sm, "CODIGOEQUIPAMENTO") ;

          $valorcustopeca= str_replace(",", ".","$valorcustopeca" );




          $sgrava1= OCIParse($ora_conexao, "UPDATE AUX_CONSULTA_CUSTO SET VL_CUSTO_PECAS=$valorcustopeca
          WHERE
          CD_COMPONENTE='$codigoequipamento'");

                           OCIExecute($sgrava1, OCI_DEFAULT);
                           oci_commit($ora_conexao);
                           



  }
  
  
  
  $achazero1= OCIParse($ora_conexao, "select CD_COMPONENTE,VL_CUSTO_MATERIAL,VL_CUSTO_PECAS from
  AUX_CONSULTA_CUSTO  ");
  OCIExecute($achazero1, OCI_DEFAULT);
  While (OCIFetch($achazero1))
  {
   $componente4=ociresult($achazero1, "CD_COMPONENTE") ;
   $custo14=ociresult($achazero1, "VL_CUSTO_MATERIAL") ;
   $custo15=ociresult($achazero1, "VL_CUSTO_PECAS") ;
   $custo14= str_replace(",", ".","$custo14" );
   $custo15= str_replace(",", ".","$custo15" );


   $custototal16=$custo14+$custo15;




   $sgrava1= OCIParse($ora_conexao, "UPDATE AUX_CONSULTA_CUSTO SET VL_CUSTO_TOTAL=$custototal16 WHERE
          CD_COMPONENTE='$componente4'");
                           OCIExecute($sgrava1, OCI_DEFAULT);
                           oci_commit($ora_conexao);


  }
  
  
  
                         $quantoss17mat= OCIParse($ora_conexao, "select TO_CHAR(SUM(VL_CUSTO_TOTAL),'999990.999')
                         VALOR, TO_CHAR(SUM(VL_CUSTO_MATERIAL),'999990.999') VALOR2,
                         TO_CHAR(SUM(VL_CUSTO_PECAS),'999990.999') VALOR3
                         from AUX_CONSULTA_CUSTO");
                         

                         
                         OCIExecute($quantoss17mat, OCI_DEFAULT);
                         While (OCIFetch($quantoss17mat)) {

                           $custototal7=ociresult($quantoss17mat, "VALOR") ;
                           $custototal7MAT=ociresult($quantoss17mat, "VALOR2") ;
                           $custototal7PECA=ociresult($quantoss17mat, "VALOR3") ;

                         }
  

   

  $gravapart= OCIParse($ora_conexao, "select CD_COMPONENTE,VL_CUSTO_TOTAL from AUX_CONSULTA_CUSTO ");
  OCIExecute($gravapart, OCI_DEFAULT);
  While (OCIFetch($gravapart))
  {
          $valorcusto44=ociresult($gravapart, "VL_CUSTO_TOTAL") ;
          $codigoequipamento=ociresult($gravapart, "CD_COMPONENTE") ;

         $participacao=($valorcusto44/$custototal7)*100;

                           $sgrava1= OCIParse($ora_conexao, "UPDATE AUX_CONSULTA_CUSTO SET VL_PARTICIPACAO=$participacao
                           WHERE  CD_COMPONENTE='$codigoequipamento'");
                           OCIExecute($sgrava1, OCI_DEFAULT);
                           oci_commit($ora_conexao);


  }


  ?>
  <center><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
   style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
   solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
   mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="60%">
   <tr>


  <th style='font-size: 11px;color: white;text-align:left;bold: Negrito'>Equipamento</th>
  <th style='font-size: 11px;color: white;text-align:right;bold: Negrito'>Custo Materiais (R$)</th>
  <th style='font-size: 11px;color: white;text-align:right;bold: Negrito'>Custo Peças (R$)</th>
  <th style='font-size: 11px;color: white;text-align:right;bold: Negrito'>Custo Total(R$)</th>
  <th style='font-size: 11px;color: white;text-align:right;bold: Negrito'>Participação(%)</th>





  </tr>
  <?



  $smpegaaux= OCIParse($ora_conexao, "select CD_MAQUINA, TO_CHAR(SUM(VL_CUSTO_MATERIAL),'999990.999')
  CUSTO, TO_CHAR(SUM(VL_CUSTO_PECAS),'999990.999') CUSTO2, TO_CHAR(SUM(VL_CUSTO_TOTAL),'999990.999') CUSTO3,
         TO_CHAR(SUM(VL_PARTICIPACAO),'999990.999')  PART from AUX_CONSULTA_CUSTO GROUP BY CD_MAQUINA
          order by PART desc");

  OCIExecute($smpegaaux, OCI_DEFAULT);
        While (OCIFetch($smpegaaux)) {

        $equipamento9=ociresult($smpegaaux, "CD_MAQUINA") ;
        $valorcustomat=ociresult($smpegaaux, "CUSTO") ;
        $valorcustopeca=ociresult($smpegaaux, "CUSTO2") ;
        $valorcustototal=ociresult($smpegaaux, "CUSTO3") ;
        $valorpart=ociresult($smpegaaux, "PART") ;



   ?>
   <tr>

   <td><?echo $equipamento9;?></td>
   <td style='font-size: 11px;color: black;text-align:right;bold: Negrito'><? $valorcustomatmostra=number_format($valorcustomat, 2, ',', '.');

   echo $valorcustomatmostra;?></td>
   <td style='font-size: 11px;color: black;text-align:right;bold: Negrito'><? $valorcustopecamostra=number_format($valorcustopeca, 2, ',', '.');

   echo $valorcustopecamostra;?></td>
   <td style='font-size: 11px;color: black;text-align:right;bold: Negrito'><?  $valorcustototalmostra=number_format($valorcustototal, 2, ',', '.');

   echo $valorcustototalmostra;?></td>
   <td style='font-size: 11px;color: black;text-align:right;bold: Negrito'><?
    $valorpart=number_format($valorpart, 2, ',', '.');
   echo $valorpart;?></td>



   <?}?>


</tr>
<tr bgcolor="green">

<td><font style='font-size: 12px;color: white;text-align:right;bold: Negrito' >Total</td>

<td style='font-size: 12px;color: white;text-align:right;bold: Negrito'><?
$custototal7M5=number_format($custototal7MAT, 2, ',', '.');
echo $custototal7M5;?>
</td>

<td style='font-size: 12px;color: white;text-align:right;bold: Negrito'>
<?
$custototal7P5=number_format($custototal7PECA, 2, ',', '.');
echo $custototal7P5;?>
</td>


<td style='font-size: 12px;color: white;text-align:right;bold: Negrito'>
<?
$custototal7= str_replace(",", ".","$custototal7" );

$custototal7=number_format($custototal7, 2, ',', '.');
echo $custototal7;?>
</td>
<td></td>
</tr>


</TABLE>







