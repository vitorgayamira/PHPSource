<?
$cortopo="#828282";
$corfundo="#4682B4";
require("estilo.css");

//require("estilo2.css");

//$codigousuario=$_GET['codigousuario'];

$codigousuario="MK";
//$codigousuario="27549-5";
//$codigousuario="27423-8";


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


<font style='font-size: 32px;color: black;text-align:center;bold: Negrito' >Custo Manutenção</font></br>
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
<img  src="detalhegrafico0055.php?tipo=utilizacaohora&turno=<?echo $turno;?>&ano=<?echo $ano;?>&mes=<?echo $mes;?>&baseoracle=<?echo $baseoracle;?>&localbanco=<?echo $localbanco;?>&banco=<?echo $banco;?>">
</BR>

<?
$achausuario= OCIParse($ora_conexao, "select CD_MAQUINA,
	DS_MAQUINA FROM FILTRO where cd_usuario='$codigousuario'");
     OCIExecute($achausuario, OCI_DEFAULT);
     While (OCIFetch($achausuario)) {
     $codigomaquinam=ociresult($achausuario, "CD_MAQUINA") ;
     $descricaomaquinam=ociresult($achausuario, "DS_MAQUINA") ;

     }

 echo "Máquina:$codigomaquinam Descrição:$descricaomaquinam";
?>


<table  width="55%" ID="grid" >
          <tr class="difa">

  <td>Mes/Ano</th>
  <td>Mão Obra(R$)</th>
  <td>Materiais(R$)</th>
  <td>Peças(R$)</th>
  <td>Serviços Terceiros(R$)</th>
  <td>Custo Parada(R$)</th>
  <td>Total(R$)</th>


  </tr>
  <?

  $custototal="0";
  $diferencahoraacumulada="0";
  $diferencakmcumulada="0";

  $sm= OCIParse($ora_conexao, "SELECT MAQ, DESCRICAO, MES_ANO, MAO_OBRA,  MATERIAL, PECAS,
SERV_TERC,MAQ_PARADA, TOTAL
FROM RELAT_01
ORDER BY MES_ANO");






        OCIExecute($sm, OCI_DEFAULT);
        While (OCIFetch($sm)) {

          $total=ociresult($sm, "TOTAL") ;
          $totalmostra= str_replace(",", ".",$total);
          $totalmostra=number_format($totalmostra, 2, ',', '.');


          $maom=ociresult($sm, "MAO_OBRA") ;
          $maommostra= str_replace(",", ".",$maom);
          $maommostra=number_format($maommostra, 2, ',', '.');
          
          
          $maomat=ociresult($sm, "MATERIAL") ;
          $maomatm= str_replace(",", ".",$maomat);
          $maomatm=number_format($maomatm, 2, ',', '.');
          
          $peca1=ociresult($sm, "PECAS") ;
          $peca1m= str_replace(",", ".",$peca1);
          $peca1m=number_format($peca1m, 2, ',', '.');
          
          $servico1=ociresult($sm, "SERV_TERC") ;
          $servico1m= str_replace(",", ".",$servico1);
          $servico1m=number_format($servico1m, 2, ',', '.');
          
          $parada1=ociresult($sm, "MAQ_PARADA") ;
          $parada1m= str_replace(",", ".",$parada1);
          $parada1m=number_format($parada1m, 2, ',', '.');
          
          
          
          $mesnao=ociresult($sm, "MES_ANO") ;



   ?>
   <tr class="difa">

   <td><?echo $mesnao;?> </td>
   <td><?echo $maommostra;?></td>
   <td><?echo $maomatm;?></td>
   <td><?echo $peca1m;?></td>
   <td><?echo $servico1m;?></td>
   <td><?echo $parada1m;?></td>
   
   <td><?echo $totalmostra;?></td>
   </tr>
   <?}?>

   <tr class="difa">
   <td>Total Geral</td>

   <?$totalvalor= OCIParse($ora_conexao, "select sum(total) TOTAL,sum(MAO_OBRA) TOTAL1,
   sum(PECAS) TOTAL2,sum(MATERIAL) TOTAL3,sum(SERV_TERC) TOTAL4,sum(MAQ_PARADA) TOTAL5
    from relat_01");
     OCIExecute($totalvalor, OCI_DEFAULT);
     While (OCIFetch($totalvalor)) {
     $totalgeralp=ociresult($totalvalor, "TOTAL") ;
     $totalp=ociresult($totalvalor, "TOTAL1") ;
     $totalmt=ociresult($totalvalor, "TOTAL3") ;
     $totalp=ociresult($totalvalor, "TOTAL2") ;
     $totalter=ociresult($totalvalor, "TOTAL4") ;
     $totalparada=ociresult($totalvalor, "TOTAL5") ;


     }
          $totalgeralpmostra= str_replace(",", ".",$totalgeralp);
          $totalgeralpmostra=number_format($totalgeralpmostra, 2, ',', '.');

          $totalppmostra= str_replace(",", ".",$totalp);
          $totalppmostra=number_format($totalppmostra, 2, ',', '.');
          
          $totalmmostra= str_replace(",", ".",$totalmt);
          $totalmmostra=number_format($totalmmostra, 2, ',', '.');
          
          
          $totalpm= str_replace(",", ".",$totalp);
          $totalpm=number_format($totalpm, 2, ',', '.');
          
          $totalterpm= str_replace(",", ".",$totalter);
          $totalterpm=number_format($totalterpm, 2, ',', '.');
          
          $totalparadam= str_replace(",", ".",$totalparada);
          $totalparadam=number_format($totalparadam, 2, ',', '.');



    ?>
    <td><?echo $totalppmostra;?></td>
    <td><?echo $totalmmostra;?></td>
    <td><?echo $totalpm;?></td>
    <td><?echo $totalterpm;?></td>
    <td><?echo $totalparadam;?></td>
    <td><?echo $totalgeralpmostra;?></td>

   </tr>
   

</table>



