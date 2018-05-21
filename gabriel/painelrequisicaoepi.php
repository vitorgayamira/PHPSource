<?
$banco=$_GET['banco'];
$codigousuario=$_GET['codigousuario'];
$codigoempresa=$_GET['codigoempresa'];

//$codigoempresa="2";
?>
<html>
<head>

<script language="javascript">
function Verificar()
 {
  var tecla=window.event.keyCode;
  if (tecla==116) {alert("Utilize Apenas o Botão Gravar..."); event.keyCode=0;
event.returnValue=false;}
 }
 
</script>

<script LANGUAGE="JavaScript">
function Botao1()
{
document.nome_formulario.action="gestaoepi.php";
document.forms.nome_formulario.submit();
}
</script>
<script LANGUAGE="JavaScript">
function Botao2()
{
document.nome_formulario.action="novagestaoepi.php";
document.forms.nome_formulario.submit();
}
</script>


<script>
function Oculta(cxa){
if (document.getElementById(cxa).style.display=='none'){
document.getElementById(cxa).style.display='block';
}else{
document.getElementById(cxa).style.display='none';
}
}
</script>


</head>






<?
$navegando=$_GET['navegando'];
$continuarmesmatela=$_POST['continuarmesmatela'];
if ($continuarmesmatela=="sim"){
$banco=$_POST['banco'];
$codigoempresa=$_POST['codigoempresa'];
$sequenciamotivo=$_POST['sequenciamotivo'];
$acao=$_POST['acao'];
$comanda=$_POST['comanda'];
$unidadenegocio=$_POST['unidadenegocio'];
$nomecliente=$_POST['nomecliente'];
$itemconsumo=$_POST['itemconsumo'];
$codigomesa=$_POST['codigomesa'];
$sequenciacomanda=$_POST['sequenciacomanda'];
$sequencia4=$_POST['sequencia4'];
$valor1=$_POST['valor1'];
$mes=$_POST['mes'];
$ano=$_POST['ano'];
$dia=$_POST['dia'];
$solicitantepesquisa=$_POST['solicitantepesquisa'];
$funcionario1=$_POST['funcionario1'];
$descricaoitem=$_POST['descricaoitem'];
}

if ($navegando=="sim"){
$codigousuario=$_GET['codigousuario'];
$codigoempresa=$_GET['codigoempresa'];
$escolha=$_GET['escolha'];
$tela=$_GET['tela'];
$mes=$_GET['mes'];
$ano=$_GET['ano'];
$ano=$_GET['ano'];
$banco=$_GET['banco'];
$pagina=$_GET['pagina'];
$ordena=$_GET['ordena'];
$banco=$_GET['banco'];
$acao=$_GET['acao'];
$mesamostra=$_GET['mesamostra'];
$dia=$_GET['dia'];
$ordem=$_GET['ordem'];
$meshoje=$_GET['meshoje'];
$anohoje=$_GET['anohoje'];
$diahoje=$_GET['diahoje'];
$solicitantepesquisa=$_GET['solicitantepesquisa'];


}

//$banco="producao";
$codigousuario="1";
$codigoempresa="2";




if (!IsSet($ano)){
   $ano=date('Y');
  }

  if (!IsSet($mes)){
   $mes=date('m');

  }

  if (!IsSet($diagrava)){
   $diagrava=date('d');
  }






require("estilo2.css");
require("configuramysql.php");
require("configuraoracle.php");


if (!IsSet($solicitantepesquisa)){
                 $result2 = "select CD_FABRICA,DS_FABRICA FROM FABRICAS WHERE CD_FABRICA IN (SELECT MIN(CD_FABRICA)
                 FROM FABRICAS)";
                 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  $solicitantepesquisa=ociresult($result3, "CD_FABRICA") ;
                  $descricaosolicitante=ociresult($result3, "DS_FABRICA") ;
                 }

  }
  else
  {

     $result2 = "select CD_FABRICA,DS_FABRICA FROM FABRICAS WHERE CD_FABRICA='$solicitantepesquisa'";
                 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  $solicitantepesquisa=ociresult($result3, "CD_FABRICA") ;
                  $descricaosolicitante=ociresult($result3, "DS_FABRICA") ;
                 }

  }





?>

<style  type="text/css">

 body{
         width:100%;
	     height:100%;
         background: url(<?echo $mimagemfundo;?>) no-repeat;

}

table.bordasimples tr td {border:1px solid black;}



?>
</style>

<body onKeyDown="javascript:Verificar()">

<form action="painelrequisicaoepi.php"  name="teste"  method="POST" >

<CENTER><font style='font-size: 23px;color: BLACK;text-align:left;bold: Negrito' >Requisição e Utilização de Equipamentos de EPI</font></BR>
<?
$today = date('d/m/Y H:i:s');
 $todayiniciocasa= date('d/m/y');
 echo "$today";

 $acha1 = "SELECT A.CODIGO CODIGOEMPRESA,A.DESCRICAO EMPRESA,B.DESCRICAO NOME,E.DESCRICAO NOMEEMPRESA,D.ID_MASTER MASTER
          FROM pessoa_bi A,pessoa_bi B,usuario_grupo_bi C,usuario_bi D,pessoa_bi E
          WHERE C.CD_PESSOA=A.CODIGO AND
          C.CD_USUARIO=D.CD_USUARIO AND
          D.CD_PESSOA=B.CODIGO AND
          D.CD_USUARIO='$codigousuario' AND
		  D.CD_EMPRESA=E.CODIGO
          ";

          $res = mysql_db_query($banco,$acha1,$conexao);
          $valor6=mysql_fetch_array($res);
          $nome2=$valor6["NOME"];
echo " - Usuário:$nome2";
?>



Empresa: <select name="solicitantepesquisa" style="background-color:#8B8378;color: white;" onchange="this.form.submit()">
                 <option value="<?echo $solicitantepesquisa;?>">Empresa:<? echo $descricaosolicitante;?></option>


				 <?
                 $result2 = "SELECT CD_FABRICA,DS_FABRICA FROM FABRICAS order by DS_FABRICA asc ";
				 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  print "<option value=\"{$row["CD_FABRICA"]}\">{$row["DS_FABRICA"]}</option>";
                 }
				 ?>
				 </select>
				 
				 <td><select style="background-color:#8B8378;color: white;"  name="acao" onchange="this.form.submit()">
                 <option value="">Defina uma Ação</option>
                 <option value="definirordem">Requisitar EPI</option>
                 <option value="devolucao">Devolução</option>
                 <option value="estoque">Atualizar Estoque</option>
                 <option value="troca">Requisitar Troca</option>



	</select>
				 
				 
				 

				 
		<input type="hidden" name="escolha" value="1">
        <input type="hidden" name="banco" value="<?echo $banco;?>">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">


 </center>

 <?
 









if ($acao=="definirordem"){?>
  <hr>
  <center>
  </br>Abrindo Requisição de EPI</br>
  <table>



    <tr>
	<td>Dia:</td>
	<td><input style='font-size: 10px;color: blue;text-align:right;bold: Negrito'type="txt" name="dia"  size="5"
    value="<?echo $diagrava;?>">
	</select>
    </td>
	</tr>
	
	<tr>
	<td>Mes:</td>
	<td><select style='font-size: 10px;color: blue;text-align:right;bold: Negrito'  name="mes" >
    <option value="<?echo $mes;?>"><?echo $mes;?></option>
	<option value="01">Janeiro</option>
    <option value="02">Fevereiro</option>
    <option value="03">Março</option>
    <option value="04">Abril</option>
    <option value="05">Maio</option>
    <option value="06">Junho</option>
    <option value="07">Julho</option>
    <option value="08">Agosto</option>
    <option value="09">Setembro</option>
    <option value="10">Outubro</option>
    <option value="11">Novembro</option>
    <option value="12">Dezembro</option>


	</select>
    </td>
	</tr>
	
	<tr>
	<td>Ano:</td>
	<td><input style='font-size: 10px;color: blue;text-align:right;bold: Negrito'type="txt" name="ano"  size="5" value="<?echo $ano;?>"> </td>
	</tr>


   <tr>
  <td>Mantenedor</td>
  <td>
  <select    name="funcionario1">
                     <option value="0"></option>

					 <?
                 $result2 = "SELECT CADASTRO,NOME FROM funcionario_sadege";
				 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  print "<option value=\"{$row["CADASTRO"]}\">{$row["NOME"]}</option>";
                 }
                     ?>
					 </select>
   </td>
   </tr>

   <tr>
  <td>Motivo</td>
  <td>
  <select    name="motivo1">
                     <option value="0"></option>

					 <?
                 $result2 = "SELECT CD_MOTIVO,DS_MOTIVO FROM motivo_epi";
				 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  print "<option value=\"{$row["CD_MOTIVO"]}\">{$row["DS_MOTIVO"]}</option>";
                 }
                     ?>
					 </select>
   </td>
   </tr>
   
    <tr>
  <td>Descrição Item</td>
  <td><input type="txt" name="descricaoitem" ></td>
   </tr>



 </table>

        <input type="hidden" name="banco" value="<?echo $banco;?>">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">
		<input type="hidden" name="acao"  value="atualizar500" >
		<input type="hidden" name="codigomesa"  value="<?echo $mesamostra;?>">





<input  type="submit" VALUE="Avançar">


<?




}

if ($acao=="atualizar500"  ){



?>
<hr>
  <center>
  </br>Defindo Itens de EPI</br>
 <center><table  border="1" width="600">
<tr>
                <th>Codigo Epi</th>
				<th>Descrição</th>
				<th>Estoque</th>
				<th>Unid</th>
				<th>Requisitar</th>

</tr>

            <?
            $descricaoitem=strtoupper($descricaoitem);
            

            $sacha= OCIParse($ora_conexao, "select  a.cd_epi EPI,a.id_status STATUS,a.QT_DISPONIVEL QUANTI,
            TO_CHAR(a.DT_VENCIMENTO,'dd/mm/yyyy') DATA, a.cd_item ITEM,b.ds_material MATERIAL,
            d.empresa FORNECEDOR,e.ds_unidade UNIDADE,a.ID_STATUS_USO STATUSUSO, a.VL_TEMPO_USO_DIA DIAMAXIMO
            FROM epi a,mat_pecas b,mat_pecas_fabrica c,fornecedor_sadege d,unidades e
            WHERE a.cd_item=b.cd_material and
            b.cd_material=c.cd_material and
            c.cd_fabrica='$solicitantepesquisa' and
            b.ds_material like '%$descricaoitem%' and
            a.cd_fornecedor=d.cod_fornecedor AND
            a.cd_unidade_item=e.cd_unidade and
            a.ID_STATUS_USO='S' AND
            a.id_status='VA'");
            OCIExecute($sacha, OCI_DEFAULT);
            While (OCIFetch($sacha)) {
               $item=ociresult($sacha, "ITEM") ;
               $descricaoitem77=ociresult($sacha, "MATERIAL") ;
               $quantidadeitem=ociresult($sacha, "QUANTI") ;
               $unidadeitem=ociresult($sacha, "UNIDADE") ;
               
               $codigo=ociresult($sacha, "EPI") ;


			 ?>

			        <tr>

					<td><h1 style='font-size: 9px;color: black;text-align:left;bold: Negrito text-decoration: none'> <?echo $item;?></td>
					<td><h1 style='font-size: 9px;color: black;text-align:left;bold: Negrito text-decoration: none'><?echo $descricaoitem77;?></td>
                    <td><h1 style='font-size: 9px;color: black;text-align:left;bold: Negrito text-decoration: none'><?echo $quantidadeitem;?></td>
                    <td><h1 style='font-size: 9px;color: black;text-align:left;bold: Negrito text-decoration: none'><?echo $unidadeitem;?></td>

				    <td><h1 style='font-size: 9px;color: black;text-align:left;bold: Negrito text-decoration: none'>
					<input type="hidden" SIZE="10" name="sequencia4[] "value="<?echo "$codigo";?>">

					<input type="TXT" SIZE="10" name="valor1[] " class="txtarea" value="0" >



					</td>


			 <?
			 }




 ?>
 </table>




        <input type="hidden" name="banco" value="<?echo $banco;?>">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">
		<input type="hidden" name="acao"  value="atualizar600" >
		<input type="hidden" name="codigomesa"  value="<?echo $mesamostra;?>">
		

        <input type="hidden" name="solicitantepesquisa"  value="<?echo $solicitantepesquisa;?>">
        <input type="hidden" name="descricaoitem"  value="<?echo $descricaoitem;?>">
        <input type="hidden" name="funcionario1"  value="<?echo $funcionario1;?>">
        <input type="hidden" name="motivo1"  value="<?echo $motivo1;?>">
        <input type="hidden" name="dia"  value="<?echo $dia;?>">
        <input type="hidden" name="mes"  value="<?echo $mes;?>">
        <input type="hidden" name="ano"  value="<?echo $ano;?>">

        <input  type="submit" VALUE="Gravar">



<?



}
if ($acao=="atualizar600"  ){



$valor1=$_POST['valor1'];
$sequencia4=$_POST['sequencia4'];


            $result2xistevei89 = "select count(*) CONTADOR
            FROM epi a,mat_pecas b,mat_pecas_fabrica c,fornecedor_sadege d,unidades e
            WHERE a.cd_item=b.cd_material and
            b.cd_material=c.cd_material and
            c.cd_fabrica='$solicitantepesquisa' and
            b.ds_material like '%$descricaoitem%' and
            a.cd_fornecedor=d.cod_fornecedor AND
            a.cd_unidade_item=e.cd_unidade and
            a.ID_STATUS_USO='S' AND
            a.id_status='VA'";
            

            
            
                                  $result3ver89 = @OCIParse($ora_conexao, $result2xistevei89);
				                  @OCIExecute($result3ver89, OCI_DEFAULT);
				                  while (OCIFetchInto($result3ver89,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				                  {
                                    $ultimo=ociresult($result3ver89, "CONTADOR") ;
                                  }

                                  for ($passa=0;$passa <=$ultimo;$passa++)
                                  {
                                   $valorrequisitado=$valor1[$passa];
                                   $codigoepigrava=$sequencia4[$passa];



                                   if ($valorrequisitado >"0"){

                                      $result2 = "select MAX(NR_SEQUENCIA) MAXIMO FROM controle_epi";
                                      $result3 = @OCIParse($ora_conexao, $result2);
				                      @OCIExecute($result3, OCI_DEFAULT);
				                      while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				                      {
                                        $sequencia1=ociresult($result3, "MAXIMO") ;
                                      }
                                      IF ($sequencia1 >"0"){$maxima2=$sequencia1+1;}ELSE{$maxima2="1";}

                                      $datagrava=$dia."/".$mes."/".$ano;

                                  $sgrava1= OCIParse($ora_conexao, "INSERT INTO
                                  controle_epi(
                                  NR_SEQUENCIA,
                                  CD_EPI,
                                  CD_FUNCIONARIO,
                                  CD_MOTIVO,
                                  QT_ITEM,
                                  CD_ANO,
                                  CD_MES,
                                  CD_DIA,
                                  ID_TIPO,
                                  CD_FABRICA,
                                  DT_EPI
                                  )
                                  VALUES ('$maxima2','$codigoepigrava','$funcionario1','$motivo1','$valorrequisitado',
                                  '$ano','$mes','$dia','REQ','$solicitantepesquisa','$datagrava')");
                                  OCIExecute($sgrava1, OCI_DEFAULT);
                                  oci_commit($ora_conexao);



                                  echo "Gravado com Sucesso";
                                  }//fila  se marcou quantidade
                                  
                                  }//final do loop


}
?>
 















</form>

</body>
</html>

