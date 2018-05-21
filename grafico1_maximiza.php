<?
$cortopo="#828282";
$corfundo="#4682B4";




//$banco="maker";



require("estilo2.css");



$titulografico=$_GET['titulografico'];
//$codigousuario=$_GET['codigousuario'];

$codigousuario="27657-5";
//$codigousuario="27549-5";
//$codigousuario="27423-8";



$banco=$_GET['banco'];
$labelcoluna=$_GET['labelcoluna'];
$labellinha=$_GET['labellinha'];
$tipo=$_GET['tipo'];
$banco=$_GET['banco'];
$ano=$_GET['ano'];
$mes=$_GET['mes'];


require("configuraoracle.php");


if ($localbanco==null){$localbanco="Nuvem Maximiza";}

?>


<center><font style='font-size: 32px;color: black;text-align:center;bold: Negrito' >Disponibilidade de Máquinas</font></br>
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
      $datafim=ociresult($s, "DATA_FIM") ;


      if ($codigofabrica >"0"){ ECHO "Fábrica:$descricaofabrica";   }
      if ($codigoarea >"0"){ ECHO "-Area:$descricaoarea</br>";   }
      if ($codigosecao >"0"){ ECHO "-Seção:$descricaosecao</br>";   }
      if ($codigocentro >"0"){ ECHO "-Centro Trabalho:$descricaocentro";   }
       
      if ($datainicio >"0"){ ECHO "-Data inicio:$datainicio</br>";   }
      
      


    }

 ECHO "BANCO=$banco";


?>
<center><img  src="detalhegrafico1.php?banco=<?echo $banco;?>&labelcoluna=Mil Cab.&labellinha=Dias&titulografico=<?echo $titulografico1;?>&tipo=utilizacaohora&turno=<?echo $turno;?>&ano=<?echo $ano;?>&mes=<?echo $mes;?>&baseoracle=<?echo $baseoracle;?>&localbanco=<?echo $localbanco;?>">
</BR>




 

