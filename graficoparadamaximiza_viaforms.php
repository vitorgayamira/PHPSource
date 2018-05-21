<?
$cortopo="#828282";
$corfundo="#4682B4";
require("estilo2.css");

$codigousuario=$_GET['codigousuario'];



$banco=$_GET['banco'];
$labelcoluna=$_GET['labelcoluna'];
$labellinha=$_GET['labellinha'];
$tipo=$_GET['tipo'];
$ano=$_GET['ano'];
$mes=$_GET['mes'];


require("configuraoracle.php");



     $achausuario= OCIParse($ora_conexao, "select NOME FROM funcionario_sadege where cadastro='$codigousuario'");
     OCIExecute($achausuario, OCI_DEFAULT);
     While (OCIFetch($achausuario)) {
     $nomeusuario=ociresult($achausuario, "NOME") ;

     }

$today = date('d/m/Y H:i:s');

?>


<center><font style='font-size: 32px;color: black;text-align:center;bold: Negrito' >Horas Máquinas Parada Mensal</font></br>
<font style='font-size: 12px;color: black;text-align:center;bold: Negrito' >
<?echo "Usuário:$nomeusuario - $today</br>";?></font></br><hr>
</center>
<font style='font-size: 19px;color: red;text-align:center;bold: Negrito' >Parâmetros</font></br>
<font style='font-size: 12px;color: black;text-align:center;bold: Negrito' >

<?
$s = OCIParse($ora_conexao, "select CD_FABRICA,DS_FABRICA,CD_AREA,DS_AREA,CD_SECAO,DS_SECAO,CD_CENTRO_TRABALHO,
	DS_CENTRO_TRABALHO,
	CD_CENTRO_CUSTO,
	DS_CENTRO_CUSTO,
	CD_FAMILIA,
	DS_FAMILIA,
	CD_MAQUINA,
	DS_MAQUINA,
	CD_UNID_MAQ,
	DS_UNID_MAQ,
	CD_COMPONENTE,
	DS_COMPONENTE,
	CD_ATIVIDADE,
	DS_ATIVIDADE,
	CD_TIPO,
	DS_TIPO,
	CD_MAO_OBRA,
	DS_MAO_OBRA,
	DATA_INICIO,
	DATA_FIM FROM FILTRO where cd_usuario='$codigousuario'
        ");



 OCIExecute($s, OCI_DEFAULT);
    While (OCIFetch($s)) {

      $descricaofabrica=ociresult($s, "DS_FABRICA") ;
      $codigofabrica=ociresult($s, "CD_FABRICA") ;

      $descricaoarea=ociresult($s, "DS_AREA") ;
      $codigoarea=ociresult($s, "CD_AREA") ;

      $descricaosecao=ociresult($s, "DS_SECAO") ;
      $codigosecao=ociresult($s, "CD_SECAO") ;
      $datainicio=ociresult($s, "DATA_INICIO") ;

      $codigocentro=ociresult($s, "CD_CENTRO_TRABALHO") ;
      $descricaocentro=ociresult($s, "DS_CENTRO_TRABALHO") ;
      
      $codigofamilia=ociresult($s, "CD_FAMILIA") ;
      $descricaofamilia=ociresult($s, "DS_FAMILIA") ;



      $datafim=ociresult($s, "DATA_FIM") ;


      if ($codigofabrica >"0"){ ECHO "Fábrica:$descricaofabrica";   }
      if ($codigoarea >"0"){ ECHO "- Area:$descricaoarea</br>";   }

      if ($codigocentro >"0"){ ECHO "- Centro Trabalho:$descricaocentro";   }
      if ($codigofamilia >"0"){ ECHO "- Família:$descricaofamilia";   }



      if ($datainicio >"0" and $datafim>"0"){ ECHO "- Período:$datainicio";?> Até <?ECHO "$datafim</br>";   }





    }
?>
<center><img  src="detalhegraficoparada.php?banco=<?echo $banco;?>&labelcoluna=Mil Cab.&labellinha=Dias&titulografico=<?echo $titulografico1;?>&tipo=utilizacaohora&turno=<?echo $turno;?>&ano=<?echo $ano;?>&mes=<?echo $mes;?>&baseoracle=<?echo $baseoracle;?>&localbanco=<?echo $localbanco;?>">
</BR>

Horas de Manutenção
<center><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
   style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
   solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
   mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="50%">
   <tr>

  <th style='text-align:right;bold: Negrito text-decoration: none'>Mes/Ano</th>
  <th style='text-align:right;bold: Negrito text-decoration: none'>Preventiva</th>
  <th style='text-align:right;bold: Negrito text-decoration: none'>Corretiva</th>
  <th style='text-align:right;bold: Negrito text-decoration: none'>Total</th>


  </tr>
  <?

  $custototal="0";
  $diferencahoraacumulada="0";
  $diferencakmcumulada="0";

  $sm= OCIParse($ora_conexao, "select mes_ano DATA, ( Nvl(preventiva,0) +  Nvl(corretiva,0) ) TOTAL,
          Nvl(preventiva,0) PREVENTIVA, Nvl(corretiva,0) CORRETIVA
  from grafico_horas_parada
 order by mes_ano");






        OCIExecute($sm, OCI_DEFAULT);
        While (OCIFetch($sm)) {

          $total=ociresult($sm, "TOTAL") ;
          $totalmostra= str_replace(",", ".",$total);
          $totalmostra=number_format($totalmostra, 2, ',', '.');

          $preventiva=ociresult($sm, "PREVENTIVA") ;
          $preventivamostra= str_replace(",", ".",$preventiva);
          $preventivamostra=number_format($preventivamostra, 2, ',', '.');
          
          $corretiva=ociresult($sm, "CORRETIVA") ;
          $corretivamostra= str_replace(",", ".",$corretiva);
          $corretivamostra=number_format($corretivamostra, 2, ',', '.');
          
          $mesnao=ociresult($sm, "DATA") ;



   ?>
   <tr>

   <td style='font-size: 12px;color: black;text-align:right;bold: Negrito text-decoration: none'><?echo $mesnao;?> </td>
   <td style='font-size: 12px;color: black;text-align:right;bold: Negrito text-decoration: none'><?echo $preventivamostra;?></td>
   <td style='font-size: 12px;color: black;text-align:right;bold: Negrito text-decoration: none'><?echo $corretivamostra;?> </td>
   <td style='font-size: 12px;color: black;text-align:right;bold: Negrito text-decoration: none'><?echo $totalmostra;?></td>
   </tr>
   <?}?>

   <tr>
   <td style='font-size: 12px;color: black;text-align:right;bold: Negrito text-decoration: none'>Total Geral</td>
   <td style='font-size: 12px;color: black;text-align:right;bold: Negrito text-decoration: none'>
   <?$totalvalor= OCIParse($ora_conexao, "select nvl(Sum(preventiva),0) TOTAL  from grafico_horas_parada");
     OCIExecute($totalvalor, OCI_DEFAULT);
     While (OCIFetch($totalvalor)) {
     $totalgeralp=ociresult($totalvalor, "TOTAL") ;

     }
          $totalgeralpmostra= str_replace(",", ".",$totalgeralp);
          $totalgeralpmostra=number_format($totalgeralpmostra, 2, ',', '.');
     echo $totalgeralpmostra;?>
   </td>

   <td style='font-size: 12px;color: black;text-align:right;bold: Negrito text-decoration: none'>
   <?$totalvalor= OCIParse($ora_conexao, "select nvl(Sum(corretiva),0) TOTAL  from grafico_horas_parada");
     OCIExecute($totalvalor, OCI_DEFAULT);
     While (OCIFetch($totalvalor)) {
     $totalgeralc=ociresult($totalvalor, "TOTAL") ;

     }
          $totalgeralcmostra= str_replace(",", ".",$totalgeralc);
          $totalgeralcmostra=number_format($totalgeralcmostra, 2, ',', '.');
     echo $totalgeralcmostra;?>
   </td>


   <td style='font-size: 12px;color: black;text-align:right;bold: Negrito text-decoration: none'>
   <?$totalvalor= OCIParse($ora_conexao, "select nvl(Sum(corretiva+preventiva),0) TOTAL  from grafico_horas_parada");
     OCIExecute($totalvalor, OCI_DEFAULT);
     While (OCIFetch($totalvalor)) {
     $totalgeralt=ociresult($totalvalor, "TOTAL") ;

     }
          $totalgeraltmostra= str_replace(",", ".",$totalgeralt);
          $totalgeraltmostra=number_format($totalgeraltmostra, 2, ',', '.');
     echo $totalgeraltmostra;?>
   </td>


   </tr>
   

</TABLE>



