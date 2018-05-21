<?


$navegando=$_GET['navegando'];
$continuarmesmatela=$_POST['continuarmesmatela'];



if ($navegando=="sim"){

$codigoempresaerp=$_GET['codigoempresaerp'];
$codigoempresa=$_GET['codigoempresa'];
$banco=$_GET['banco'];
$modelo=$_GET['modelo'];


}


if ($continuarmesmatela=="sim"){
$codigoempresaerp=$_POST['codigoempresaerp'];
$codigoempresa=$_POST['codigoempresa'];
$banco=$_POST['banco'];
$modelo=$_POST['modelo'];


}


echo "Empresa:$codigoempresaerp- Modelo:$modelo";




require("configuraoracle_averama.php");
$conexao = mysql_connect('mysql20.redehost.com.br', 'tonera2','rogerio2013') ;

?>

<form action="averamasincronizando3.php"  method="POST">

<?

if (!IsSet($escolha)){

                                   $sql = "delete from aux_produto_sincronizacao_bi";
                                   $res = mysql_db_query($banco,$sql,$conexao);
 



 //acha os parametros gerais para gravar
 $sql = "SELECT CD_GRUPO_PRODUTO,CD_UNIDADE_PRODUTO,CD_FAMILIA,CD_PROCESSO,CD_FORMULA,CD_MOEDA
 FROM parametro_bi
  ";
  $res = mysql_db_query($banco,$sql,$conexao);
  $valor81=mysql_fetch_array($res);

	  $unidade=$valor81["CD_UNIDADE_PRODUTO"];
	  $familia=$valor81["CD_FAMILIA"];
      $grupo=$valor81["CD_GRUPO_PRODUTO"];

      $moeda=$valor81["CD_MOEDA"];
      $formula=$valor81["CD_FORMULA"];
      $processo=$valor81["CD_PROCESSO"];
      

$s = OCIParse($ora_conexao, "SELECT  CD_ITEM,DS_ITEM from
VIEW_MILENIO_PRODUTOS  where cd_empresa='$codigoempresaerp'   order by CD_ITEM asc
");
OCIExecute($s, OCI_DEFAULT);
While (OCIFetch($s)) {

 $codigo=ociresult($s, "CD_ITEM") ;
 $descricao=ociresult($s, "DS_ITEM") ;
 
 //echo "empresa:$codigoempresaerp//codigo:$codigo//descricao:$descricao</br>";







			$contador1 = "select count(*) CONTADOR from produto_bi
            where cd_produto_erp='$codigo' AND CD_EMPRESA='$codigoempresa'
            ";

			$res = mysql_db_query($banco,$contador1,$conexao);
            $valor81=mysql_fetch_array($res);

            $contador6=$valor81["CONTADOR"];


      

      if ($contador6 =="0"){//nao existe ainda na base
      
        $ultimo99 = "SELECT MAX(NR_SEQUENCIA) SEQUENCIA FROM aux_produto_sincronizacao_bi";
        $res79 = mysql_db_query($banco,$ultimo99,$conexao);
        $totallinha359=mysql_fetch_array($res79);
        $sequencia55=$totallinha359["SEQUENCIA"];

        IF ($sequencia55 >"0"){
           $sequencia55=$sequencia55+1;
	    }
	    ELSE
	    {
          $sequencia55="1";
	    }


       $grava = "insert into  aux_produto_sincronizacao_bi(NR_SEQUENCIA,CD_PRODUTO_ERP,DS_PRODUTO)
       values ('$sequencia55','$codigo','$descricao')";
       //echo "$grava</br>";
       $res = mysql_db_query($banco,$grava,$conexao);
      
      
       }
      


}// final da view




$sql99 = "SELECT NR_SEQUENCIA SEQUENCIA,cd_produto_erp CODIGO,ds_produto DESCRICAO
         FROM
         aux_produto_sincronizacao_bi  ";
?>

<CENTER>
Seleção de Produtos
<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="500">

<tr>

     <th>Codigo</th>
     <th>Descrição</th>
     <th style='font-size: 9px;text-align:left;bold: Negrito'>Selecionar</th>


</tr>


<?

			$res = mysql_db_query($banco,$sql99,$conexao);

            while ($valor=mysql_fetch_array($res)){

               ?>

			        <tr>

					<td><?echo $valor["CODIGO"];?></td>


					<td  align="left"><?echo $valor["DESCRICAO"];?></td>



					<td ><input type="checkbox" name="lista[]" value="<?echo $valor["SEQUENCIA"];?>"></td>


			 <?

			 }

 ?>
 </table>

  <input type="hidden" name="escolha" size="5" value="<?echo "GRAVAPRODUTO";?>" >

  <input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="banco" value="<?echo $banco;?>">
		
		<input type="hidden" name="modelo" value="<?echo $modelo;?>">


<input  type="submit"     VALUE="GRAVAR">




<?

}
else
{
?>
<font style='font-size: 16px;color: red;bold: Negrito'>
<?

$lista=$_POST['lista'];
$novafamilia1=$_POST['novafamilia1'];


		 $achacontador = "SELECT count(*) CONTADOR
         FROM
        aux_produto_sincronizacao_bi ";


         $res = mysql_db_query($banco,$achacontador  ,$conexao);
         $valor8=mysql_fetch_array($res);
         $ultimo=$valor8["CONTADOR"];



 for ($passa=0;$passa <=$ultimo;$passa++)
 {



 $deletafinal=$lista[$passa];


 if ($deletafinal >"0"){
 
        $ultimo99 = "SELECT MAX(CD_PRODUTO) SEQUENCIA FROM produto_bi WHERE CD_EMPRESA='$codigoempresa'";

        $res79 = mysql_db_query($banco,$ultimo99,$conexao);
        $totallinha359=mysql_fetch_array($res79);
        $sequencia55=$totallinha359["SEQUENCIA"];

        IF ($sequencia55 >"0"){
           $sequencia55=$sequencia55+1;
	    }
	    ELSE
	    {
          $sequencia55="1";
	    }
	    
	        $contador199 = "select cd_produto_erp CODIGO,ds_produto DESCRICAO
         FROM
         aux_produto_sincronizacao_bi
            where nr_sequencia='$deletafinal'
            ";

			$res996 = mysql_db_query($banco,$contador199,$conexao);
            $valor8199=mysql_fetch_array($res996);

            $codigo51=$valor8199["CODIGO"];
            $descricao51=$valor8199["DESCRICAO"];
	    
	    
 
 
                  $sql88 = "insert into produto_bi(cd_produto,ds_produto,cd_unidade,cd_grupo,cd_familia,
                  cd_produto_erp,cd_empresa) values
                  ('$sequencia55','$descricao51','1',1,'1','$codigo51','$codigoempresa')";
                  //echo "$sql88</br>";
	              $res = mysql_db_query($banco,$sql88,$conexao);

 }//final quando selecionou produto

}//FINAL DO FOR

$data = date('Y-m-d');


  $sql = "UPDATE parametro_sincronizacao_bi SET DT_ULTIMA_ACAO='$data'
  WHERE ID_MODELO='$modelo'
  ";
  //echo "$sql</br>";
   $achatabela88 = mysql_db_query($banco,$sql,$conexao);


?><center><?echo "Final da Sincronização ";


}//final quando grava

?>
</form>










  





