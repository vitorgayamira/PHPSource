<?
$cortopo="#828282";
$corfundo="#4682B4";
require("estilo2_sitenovo.css");

$codigousuario="MK";

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

<font style='font-size: 32px;color: black;text-align:center;bold: Negrito' >Funcionário Horas</font></br>
<font style='font-size: 12px;color: black;text-align:center;bold: Negrito' >
<?echo "$today</br>";?></font></br><hr>
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
<img  src="graf_rfg.php?tipo=utilizacaohora&turno=<?echo $turno;?>&ano=<?echo $ano;?>&mes=<?echo $mes;?>&baseoracle=<?echo $baseoracle;?>&localbanco=<?echo $localbanco;?>&banco=<?echo $banco;?>">
</BR>

Funcionários Horas Detalhado
<table  width="55%" ID="grid" >
          <tr class="difa">

  <td>Funcionário</th>
  <td>Nome</th>
  <td>Horas Planejadas</th>
  <td>Horas Não PLanejadas</th>
  <td>Total</th>


  </tr>
  <?

  $custototal="0";
  $diferencahoraacumulada="0";
  $diferencakmcumulada="0";

  $sm= OCIParse($ora_conexao, "SELECT CD_FUNCIONARIO, NM_FUNCIONARIO, NVL(VALOR_PL,0) VALOR_PL, 
NVL(VALOR_NP,0) VALOR_NP, NVL(VALOR_PL,0) + NVL(VALOR_NP,0) VALOR_TOT
FROM HIST_FUNCIONARIO_P_NP ORDER BY VALOR_TOT");






        OCIExecute($sm, OCI_DEFAULT);
        While (OCIFetch($sm)) {

          $total=ociresult($sm, "VALOR_TOT") ;
          $totalmostra= str_replace(",", ".",$total);
          $totalmostra=number_format($totalmostra, 2, ',', '.');
          
          $cdfunc=ociresult($sm, "CD_FUNCIONARIO") ;
		  $dsfunc=ociresult($sm, "NM_FUNCIONARIO") ;
		  
		  $vlpl=ociresult($sm, "VALOR_PL") ;
		  $vlplmostra= str_replace(",", ".",$vlpl);
		  $vlplmostra=number_format($vlplmostra, 2, ',', '.');          
		  
		  $vlnp=ociresult($sm, "VALOR_NP") ;
          $vlnpmostra= str_replace(",", ".",$vlnp);
          $vlnpmostra=number_format($vlnpmostra, 2, ',', '.');


   ?>
   <tr class="difa">
   <td><?echo $cdfunc;?> </td>
   <td><?echo $dsfunc;?></td>
   <td><?echo $vlplmostra;?></td>
   <td><?echo $vlnpmostra;?></td>
   <td><?echo $totalmostra;?></td>
   </tr>
   <?}?>

   <tr class="difa">
   <td>Total Geral</td>
   <td>
   <?$totalvalor= OCIParse($ora_conexao, "select sum(NVL(VALOR_PL,0) + NVL(VALOR_NP,0)) TOTAL
    from HIST_FUNCIONARIO_P_NP");
     OCIExecute($totalvalor, OCI_DEFAULT);
     While (OCIFetch($totalvalor)) {
     $totalgeralp=ociresult($totalvalor, "TOTAL") ;

     }
          $totalgeralpmostra= str_replace(",", ".",$totalgeralp);
          $totalgeralpmostra=number_format($totalgeralpmostra, 2, ',', '.');
     echo $totalgeralpmostra;?>
   </td>

   </tr>
   

</table>



