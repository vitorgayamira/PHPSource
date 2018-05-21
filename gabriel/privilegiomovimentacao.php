<?
$cortopo="#828282";
$corfundo="#4682B4";

$navegando=$_GET['navegando'];
$continuarmesmatela=$_POST['continuarmesmatela'];

if ($navegando=="sim"){
$banco=$_GET['banco'];
$baseoracle=$_GET['baseoracle'];
$ambiente=$_GET['ambiente'];
$localbanco=$_GET['localbanco'];
$escolha=$_GET['escolha'];
$tipograva=$_GET['tipograva'];


}
if ($continuarmesmatela=="sim"){

$banco=$_POST['banco'];
$ambiente=$_POST['ambiente'];
$localbanco=$_POST['localbanco'];
$usuariopesquisa=$_POST['usuariopesquisa'];
$contadorfabrica=$_POST['contadorfabrica'];
$contadorarea=$_POST['contadorarea'];
$contadorsecao=$_POST['contadorsecao'];
$contadorcentro=$_POST['contadorcentro'];
$escolha=$_POST['escolha'];



}

ECHO "Base Oracle:$banco - Local:$localbanco - Ambiente:$ambiente</br>";
require("configuraoracle.php");
require("estilo2.css");
require("estilonavegacaofundo.css");
?>


<head>

<script language=javascript>



cont = 0;
function CheckAll4() {
   for (var i=0;i<document.formulario.elements.length;i++) {
     var x = document.formulario.elements[i];
     if (x.name == 'listafamilia[]') {
x.checked = document.formulario.selall.checked;
}
}
if (cont == 0){
var elem = document.getElementById("checar");
elem.innerHTML = "Desmarcar todos";
cont = 1;
} else {
var elem = document.getElementById("checar");
elem.innerHTML = "Marcar todos";
cont = 0;
}

}



</script>



</head>


<form action="privilegiomovimentacao.php"  name="formulario" method="POST">








<?
$navegando=$_GET['navegando'];
$continuarmesmatela=$_POST['continuarmesmatela'];

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
$mes1=$_GET['mes1'];
$tipoconsulta=$_GET['tipoconsulta'];


}
if ($continuarmesmatela=="sim"){
$codigousuario=$_POST['codigousuario'];
$codigoempresa=$_POST['codigoempresa'];
$escolha=$_POST['escolha'];
$tela=$_POST['tela'];
$mes=$_POST['mes'];
$ano=$_POST['ano'];
$curva=$_POST['curva'];
$pesomedio=$_POST['pesomedio'];
$turnopesquisa=$_POST['turnopesquisa'];
$turno=$_POST['turno'];

$tipo=$_POST['tipo'];
$novo=$_POST['novo'];
$pagina=$_POST['pagina'];
$dia1=$_POST['dia1'];
$dia2=$_POST['dia2'];
$quantidade=$_POST['quantidade'];
$semanainicio=$_POST['semanainicio'];
	$semanafinal=$_POST['semanafinal'];
    $turno=$_POST['turno'];
	$primeirasemana=$_POST['primeirasemana'];
	$segundasemana=$_POST['segundasemana'];
	$diainicial=$_POST['diainicial'];
		$diafinal=$_POST['diafinal'];
		$sequencia3=$_POST['sequencia3'];
        $simulacao=$_POST['simulacao'];

		$datagravarinicio=$_POST['datagravarinicio'];
			$datagravarfinal=$_POST['datagravarfinal'];
			$quantaslinhas=$_POST['quantaslinhas'];
            $quantosmercado=$_POST['quantosmercado'];
			$mes1=$_POST['mes1'];
			$mes2=$_POST['mes2'];
			$tipoconsulta=$_POST['tipoconsulta'];
			$quantaslinhas2=$_POST['quantaslinhas2'];
			$volumeano=$_POST['volumeano'];
			$quantidadedia=$_POST['quantidadedia'];
			$semanahoje=$_POST['semanahoje'];
			$tempo2=$_POST['tempo2'];
			$volume2=$_POST['volume2'];
			$destino=$_POST['destino'];
			$idade2=$_POST['idade2'];
			$semanaotimizacao=$_POST['semanaotimizacao'];
			$tempo3=$_POST['tempo3'];
                 $tempo4=$_POST['tempo4'];
                   $tempo5=$_POST['tempo5'];
                    $cabeca5=$_POST['cabeca5'];
                    $dataamostra=$_POST['dataamostra'];
                    $quantaslinhasamostra=$_POST['quantaslinhasamostra'];
                    $intervalo=$_POST['intervalo'];
                    $quantaslinhasfaixa=$_POST['quantaslinhasfaixa'];
                    $sexagem=$_POST['sexagem'];
                    $quantaslinhasvolume=$_POST['quantaslinhasvolume'];
                    $custototalsimulacao=$_POST['custototalsimulacao'];
                    $quantidadetotal5=$_POST['quantidadetotal5'];
                    $consumo5=$_POST['consumo5'];
                    $consumo6=$_POST['consumo6'];
                    $consumo7=$_POST['consumo7'];
                    $classi=$_POST['classi'];
                    $banco=$_POST['banco'];
                    $caixa=$_POST['caixa'];
                    $caixa2=$_POST['caixa2'];
                    $novogrupo=$_POST['novogrupo'];
                    $valor17=$_POST['valor17'];
                    $contadorfabrica=$_POST['contadorfabrica'];
                    $contadorarea=$_POST['contadorarea'];
                    $contadorsecao=$_POST['contadorsecao'];
                    $contadorcentro=$_POST['contadorcentro'];
                    $tipoprivi=$_POST['tipoprivi'];




}



$ano=date('Y');
 $programa="privilegiomovimentacao.php";
 $numeroregistropagina="1";
 $programa2="?";
 $programa3="programapai=";
 $programa9="DIRAentradasistema.php";
 $programa10="?titulorodape=";
 $programa11="&mes1=";
 $programa12="&tipoconsulta=";
 
 echo "escolha:$escolha";

if ($escolha=="gravacentro"){

echo "vai comecar a gravar//contador:$contadorcentro";
  for ($passa=0;$passa <=$contadorcentro;$passa++)
 {
                           $criafinal=$listacentro[$passa];


                           if ($criafinal>"0"){
                           echo "insert into AUX_FILTRO(CD_CENTRO,CD_USUARIO) VALUES(
                           '$criafinal','$usuariopesquisa')";
                           $sgrava1= OCIParse($ora_conexao, "insert into AUX_FILTRO(CD_CENTRO,CD_USUARIO) VALUES(
                           '$criafinal','$usuariopesquisa')");
                           OCIExecute($sgrava1, OCI_DEFAULT);
                           oci_commit($ora_conexao);
                           }
  }

                           $result288 = "select CD_CENTRO FROM AUX_FILTRO WHERE CD_USUARIO='$usuariopesquisa' and cd_centro is not null";
				           $result388 = @OCIParse($ora_conexao, $result288);
				           @OCIExecute($result388, OCI_DEFAULT);
				           while (OCIFetchInto($result388,&$row8, OCI_ASSOC+OCI_RETURN_NULLS))
				           {
                               $centroG=$row8["CD_CENTRO"];
                               
                               if ($tipoprivi=="SI"){$incluir="S";$consultar="S";$eliminar="N";}
                               if ($tipoprivi=="SE"){$incluir="N";$consultar="S";$eliminar="S";}
                               if ($tipoprivi=="IE"){$incluir="S";$consultar="S";$eliminar="S";}
                               if ($tipoprivi=="SC"){$incluir="N";$consultar="S";$eliminar="N";}

                               echo "insert into ATUACAO_USUARIO_CENTRO(CD_CENTRO,CD_USUARIO,
                               id_consultar,ID_ATUALIZAR,id_excluir) VALUES(
                               '$centroG','$usuariopesquisa','$consultar','$incluir','$eliminar')</br>";
                               
                               $sgrava1= OCIParse($ora_conexao, "insert into ATUACAO_USUARIO_CENTRO(CD_CENTRO,CD_USUARIO,
                               id_consultar,ID_ATUALIZAR,id_excluir) VALUES(
                               '$centroG','$usuariopesquisa','$consultar','$incluir','$eliminar')");
                               OCIExecute($sgrava1, OCI_DEFAULT);
                               oci_commit($ora_conexao);
                           }


}



 ?>


<CENTER><font style='font-size: 19px;color: BLACK;text-align:left;bold: Negrito' >Privelegio Movimentação Equipamentos por Usuário </font></BR>





<a href="<?echo $programa;?>?pagina=1&escolha=novoregistro&tela=0&mes=<?echo $mes;?>&ano=<?echo $ano;?>
&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>
&codigousuario=<?echo $codigousuario;?>
&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&banco=<?echo $banco;?>&baseoracle=<?ECHO $baseoracle;?>&localbanco=<?ECHO $localbanco;?>&ambiente=<?ECHO $ambiente;?>"><img width=50 height=60 BORDER=1  src="incluir.GIF">
</a>

<a href="<?echo $programa;?>?codigousuario=<?echo $codigousuario;?>&codigoempresa=<?ECHO $codigoempresa;?>
&navegando=sim&banco=<?ECHO $banco;?>&escolha=1&baseoracle=<?ECHO $baseoracle;?>&localbanco=<?ECHO $localbanco;?>&ambiente=<?ECHO $ambiente;?>"><img width=50 height=60 BORDER=1 src="VOLTAR.GIF">
</a>

<a href="<?echo $programa;?>?codigousuario=<?echo $codigousuario;?>&codigoempresa=<?ECHO $codigoempresa;?>
&navegando=sim&banco=<?ECHO $banco;?>&escolha=1&baseoracle=<?ECHO $baseoracle;?>&localbanco=<?ECHO $localbanco;?>&ambiente=<?ECHO $ambiente;?>"><img width=50 height=60 BORDER=1 src="CONSULTANDO.GIF"></a>







<?
if (!IsSet($escolha) or $escolha=="1"  ){
?></br>



<center><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="60%">
 <tr >
  <th>Usuário</th>
  <th>Unidade Negócio</th>
  <th>Codigo Centro</th>
  <th>Centro Trabalho</th>
  <th>Incluir</th>
  <th>Consultar</th>
  <th>Eliminar</th>

</tr>
<?


 $quantaslinhasamostra="0";

 $s = OCIParse($ora_conexao, "select b.cd_centro CODIGO,b.ds_centro CENTRO,c.nm_usuario USUARIO,a.id_consultar CONSULTAR,a.ID_ATUALIZAR ATUALIZAR,
 a.id_excluir ELIMINAR,f.DS_FABRICA FABRICA FROM
  ATUACAO_USUARIO_CENTRO a,CENTRO_TRABALHOS b,USUARIO_BI c,AREAS d,secaos e,fabricas f
  WHERE a.cd_centro=b.cd_centro and
  b.cd_secao=e.cd_secao and
  e.cd_area=d.cd_area and
  d.cd_fabrica=f.cd_fabrica and
  a.cd_usuario=c.cd_usuario
  ORDER  by c.nm_usuario ASC");
        OCIExecute($s, OCI_DEFAULT);
        While (OCIFetch($s)) {

          $descricao1=ociresult($s, "USUARIO") ;
          $descricao2=ociresult($s, "CENTRO") ;
          $acao1=ociresult($s, "ATUALIZAR") ;
          $acao2=ociresult($s, "CONSULTAR") ;
          $acao3=ociresult($s, "ELIMINAR") ;
          $descricao3=ociresult($s, "FABRICA") ;
          $codigo4=ociresult($s, "CODIGO") ;


   ?>
   <tr>
   <h1 style='font-size: 9px;color: black;text-align:left;bold: Negrito text-decoration: none' >

   <td><?echo $descricao1;?> </td>
   <td><?echo $descricao3;?> </td>
   <td><?echo $codigo4;?> </td>

   <td><?echo $descricao2;?> </td>
   <td><?echo $acao1;?> </td>
   <td><?echo $acao2;?> </td>
   <td><?echo $acao3;?> </td>

   </tr>

   <?


}
?>
</TABLE>

<?

}

if ($escolha=="novoregistro"){



if ($tela=="0"){


?>
<center><div class='divscroll' style='height:390;width:650'>
Etapa-1 Seleção de Fabricas Para Liberar Privilégios</br>

 Usuario:<select name="usuariopesquisa">

                 <?
                 $result2 = "SELECT CD_USUARIO,NM_USUARIO FROM USUARIO_BI order by NM_USUARIO DESC";
				 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
					print "<option value=\"{$row["CD_USUARIO"]}\">{$row["NM_USUARIO"]}</option>";
                 }
				 ?>
				 </select>
				 
				 Privilégio:<select name="tipoprivi">
     			 <option value="SI"><?echo "Somente Incluir";?></option>
				 <option value="SE"><?echo "Somente Excluir";?></option>
				 <option value="IE"><?echo "Incluir e Excluir";?></option>
				 <option value="SC"><?echo "Somnete Consultar";?></option>


                 </select></BR>






<CENTER><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="500">

<tr>

				<th>Unidades</th>

				<th style='font-size: 9px;text-align:left;bold: Negrito'>Selecionar</th>


</tr>

				 <?


				 $contadorfabrica="0";
                 $result2 = "select CD_FABRICA,DS_FABRICA FROM FABRICAS   ORDER  by DS_FABRICA ASC";
				 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  $contadorfabrica=$contadorfabrica+1;
                 ?>
                    <tr>

					<td><?echo $row["DS_FABRICA"];?></td>
					<td ><input type="checkbox" name="listafabrica[]" value="<?echo $row["CD_FABRICA"];?>"></td>
                    </tr>
                 <?

                 }
				 ?>



	</table>

   <input type="hidden" name="escolha" value="avancando1">
   <input type="hidden" name="banco" value="<?echo $banco;?>">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">

		<input type="hidden" name="contadorfabrica" value="<?echo $contadorfabrica;?>">
		<input type="hidden" name="ativopesquisa" value="<?echo $ativopesquisa;?>">
		<input type="hidden" name="baseoracle" value="<?echo $baseoracle;?>">
		<input type="hidden" name="localbanco" value="<?echo $localbanco;?>">
		<input type="hidden" name="ambiente" value="<?echo $ambiente;?>">
</div>


		<input  type="submit"     VALUE="Avançar">




<?

}//FINAL DA ESCOLHA=0


}  //FINAL DA SEGUNDA TELA


if ($escolha=="avancando1"){
$elimina1= OCIParse($ora_conexao, "delete from  AUX_FILTRO where CD_USUARIO='$usuariopesquisa'");
                          OCIExecute($elimina1, OCI_DEFAULT);
                          oci_commit($ora_conexao);
?>



<center><div class='divscroll' style='height:390;width:650'>
    Etapa-2 Seleção de Areas para Liberação de Privilégios</br>

   <input type=checkbox name="selall" onClick="CheckAll4()">
   <span id="checar">Marcar todos</span>

     <?






 for ($passa=0;$passa <=$contadorfabrica;$passa++)
 {
                           $criafinal=$listafabrica[$passa];


                           if ($criafinal>"0"){
                           $sgrava1= OCIParse($ora_conexao, "insert into AUX_FILTRO(CD_FABRICA,CD_USUARIO) VALUES(
                           '$criafinal','$usuariopesquisa')");
                           OCIExecute($sgrava1, OCI_DEFAULT);
                           oci_commit($ora_conexao);
                           }
  }


  ?>
  <CENTER><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="500">

<tr>

				<th>Areas</th>

				<th style='font-size: 9px;text-align:left;bold: Negrito'>Selecionar</th>


</tr>

				 <?
				 $contadorarea="0";
                 $result2 = "select CD_AREA,DS_AREA FROM AREAS WHERE  CD_FABRICA IN
                 (SELECT CD_FABRICA FROM AUX_FILTRO) ORDER  by DS_AREA ASC";
				 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  $contadorarea=$contadorarea+1;
                 ?>
                    <tr>

					<td><?echo $row["DS_AREA"];?></td>
					<td ><input type="checkbox" name="listaarea[]" value="<?echo $row["CD_AREA"];?>"></td>
                    </tr>
                 <?

                 }
				 ?>



	</table>
        <input type="hidden" name="escolha" value="avancando2">
        <input type="hidden" name="banco" value="<?echo $banco;?>">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">

		<input type="hidden" name="contadorarea" value="<?echo $contadorarea;?>">
		<input type="hidden" name="ativopesquisa" value="<?echo $ativopesquisa;?>">
		<input type="hidden" name="baseoracle" value="<?echo $baseoracle;?>">
		<input type="hidden" name="localbanco" value="<?echo $localbanco;?>">
		<input type="hidden" name="ambiente" value="<?echo $ambiente;?>">
		<input type="hidden" name="usuariopesquisa" value="<?echo $usuariopesquisa;?>">
		<input type="hidden" name="tipoprivi" value="<?echo $tipoprivi;?>">


</div>


		<input  type="submit"     VALUE="Avançar"> ou
	<a href="<?echo $programa;?>?codigousuario=<?echo $codigousuario;?>&codigoempresa=<?ECHO $codigoempresa;?>&escolha=gravacentro&tipograva=area
&navegando=sim&banco=<?ECHO $banco;?>&baseoracle=<?ECHO $baseoracle;?>&localbanco=<?ECHO $localbanco;?>&ambiente=<?ECHO $ambiente;?>">Deseja Inckuir Todos os Centros das Áreas Selecionadas</a>



<?

}

if ($escolha=="avancando2"){
?>



<center><div class='divscroll' style='height:390;width:650'>
    Etapa-2 Seleção de Seções para Liberação de Privilégios</br>

   <input type=checkbox name="selall" onClick="CheckAll4()">
   <span id="checar">Marcar todos</span>

     <?






 for ($passa=0;$passa <=$contadorarea;$passa++)
 {
                           $criafinal=$listaarea[$passa];


                           if ($criafinal>"0"){
                           
                           echo "insert into AUX_FILTRO(CD_AREA,CD_USUARIO) VALUES(
                           '$criafinal','$usuariopesquisa')";
                           
                           $sgrava1= OCIParse($ora_conexao, "insert into AUX_FILTRO(CD_AREA,CD_USUARIO) VALUES(
                           '$criafinal','$usuariopesquisa')");
                           OCIExecute($sgrava1, OCI_DEFAULT);
                           oci_commit($ora_conexao);
                           }
  }


  ?>
  <CENTER><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="500">

<tr>

				<th>SECAO</th>

				<th style='font-size: 9px;text-align:left;bold: Negrito'>Selecionar</th>


</tr>

				 <?
				 $contadorarea="0";
                 $result2 = "select CD_SECAO,DS_SECAO FROM SECAOS WHERE CD_AREA IN (SELECT CD_AREA FROM AUX_FILTRO) ORDER  by DS_SECAO ASC";
				 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  $contadorsecao=$contadorsecao+1;
                 ?>
                    <tr>

					<td><?echo $row["DS_SECAO"];?></td>
					<td ><input type="checkbox" name="listasecao[]" value="<?echo $row["CD_SECAO"];?>"></td>
                    </tr>
                 <?

                 }
				 ?>



	</table>
 <input type="hidden" name="escolha" value="avancando3">
   <input type="hidden" name="banco" value="<?echo $banco;?>">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">

		<input type="hidden" name="contadorsecao" value="<?echo $contadorsecao;?>">
		<input type="hidden" name="ativopesquisa" value="<?echo $ativopesquisa;?>">
		<input type="hidden" name="baseoracle" value="<?echo $baseoracle;?>">
		<input type="hidden" name="localbanco" value="<?echo $localbanco;?>">
		<input type="hidden" name="ambiente" value="<?echo $ambiente;?>">
		<input type="hidden" name="usuariopesquisa" value="<?echo $usuariopesquisa;?>">
			<input type="hidden" name="tipoprivi" value="<?echo $tipoprivi;?>">
</div>


		<input  type="submit"     VALUE="Avançar">
	<a href="<?echo $programa;?>?codigousuario=<?echo $codigousuario;?>&codigoempresa=<?ECHO $codigoempresa;?>&escolha=gravasecao
&navegando=sim&banco=<?ECHO $banco;?>&baseoracle=<?ECHO $baseoracle;?>&localbanco=<?ECHO $localbanco;?>&ambiente=<?ECHO $ambiente;?>">Deseja Inckuir Todos os Centros das Áreas Selecionadas</a>



<?

}

if ($escolha=="avancando3"){
?>



<center><div class='divscroll' style='height:390;width:650'>
    Etapa-2 Seleção de cENTROS para Liberação de Privilégios</br>

   <input type=checkbox name="selall" onClick="CheckAll4()">
   <span id="checar">Marcar todos</span>

     <?






 for ($passa=0;$passa <=$contadorsecao;$passa++)
 {
                           $criafinal=$listasecao[$passa];


                           if ($criafinal>"0"){
                           $sgrava1= OCIParse($ora_conexao, "insert into AUX_FILTRO(CD_SECAO,CD_USUARIO) VALUES(
                           '$criafinal','$usuariopesquisa')");
                           OCIExecute($sgrava1, OCI_DEFAULT);
                           oci_commit($ora_conexao);
                           }
  }


  ?>
  <CENTER><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="500">

<tr>

				<th>Centros</th>

				<th style='font-size: 9px;text-align:left;bold: Negrito'>Selecionar</th>


</tr>

				 <?
				 $contadorcentro="0";
                 $result2 = "select CD_CENTRO,DS_CENTRO FROM CENTRO_TRABALHOS WHERE CD_SECAO IN (SELECT CD_SECAO FROM AUX_FILTRO)
                 ORDER  by DS_CENTRO ASC";
				 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  $contadorcentro=$contadorcentro+1;
                 ?>
                    <tr>

					<td><?echo $row["DS_CENTRO"];?></td>
					<td ><input type="checkbox" name="listacentro[]" value="<?echo $row["CD_CENTRO"];?>"></td>
                    </tr>
                 <?

                 }
				 ?>



	</table>
 <input type="hidden" name="escolha" value="gravacentro">
   <input type="hidden" name="banco" value="<?echo $banco;?>">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">

		<input type="hidden" name="contadorcentro" value="<?echo $contadorcentro;?>">
		<input type="hidden" name="ativopesquisa" value="<?echo $ativopesquisa;?>">
		<input type="hidden" name="baseoracle" value="<?echo $baseoracle;?>">
		<input type="hidden" name="localbanco" value="<?echo $localbanco;?>">
		<input type="hidden" name="ambiente" value="<?echo $ambiente;?>">
		<input type="hidden" name="usuariopesquisa" value="<?echo $usuariopesquisa;?>">
			<input type="hidden" name="tipoprivi" value="<?echo $tipoprivi;?>">
</div>


		<input  type="submit"     VALUE="Finalizar">


<?

}

?>


</form>


