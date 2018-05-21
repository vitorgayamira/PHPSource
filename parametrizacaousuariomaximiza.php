<?



//require_once("estilo2.css");
?>
<HEAD>
<Script Language="JavaScript">
function pegavalores(){


    document.getElementById('cadastrodestino').value = document.getElementById('cadastroorigem').value;
    document.getElementById('bancodestino').value = document.getElementById('bancoorigem').value;
  document.Form1.submit();
}

function mascaraData(campoData){
              var data = campoData.value;
                            if (data.length == 2){
                                              data = data + '/';
                                              document.forms[0].data.value = data;      return true;
                                               }
                                               if (data.length == 5){
                                               data = data + '/';
                                               document.forms[0].data.value = data;
                                               return true;
                                                }         }


</script>
</HEAD>

<form name=Form1 action="<? echo $programa;?>" method="POST">

<?


$navegando=$_GET['navegando'];
$continuarmesmatela=$_POST['continuarmesmatela'];

if ($navegando=="sim"){
$codigousuario=$_GET['codigousuario'];
$codigousuarionovo=$_GET['codigousuarionovo'];
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
$tipoconsulta=$_GET['tipoconsulta'];
$escolha=$_GET['escolha'];
$desejaacao=$_GET['desejaacao'];
$quantidadedias=$_GET['quantidadedias'];
$quantidadediasacumulado=$_GET['quantidadediasacumulado'];
$usuariograva=$_GET['usuariograva'];
$codigouni5=$_GET['codigouni5'];
$descricaoempresa7=$_GET['descricaoempresa7'];


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
            $dias5w=$_POST['dias5w'];
            $desejaacao=$_POST['desejaacao'];
            $responsavel4=$_POST['responsavel4'];
            $item4=$_POST['item4'];
            $quantdia=$_POST['quantdia'];
            $datafechamento=$_POST['datafechamento'];
            $bancoconexao=$_POST['bancoconexao'];
            $banco=$_POST['banco'];


}


require("configuramysql.php");
require("estilo2.css");


?>

<center><h2><font style='font-size: 32px;color: black;text-align:left;bold: Negrito' >Parametrização De Usuários</font></h2>




<?


if ($tipo=="novousuariogrupo"){




               $grava = "INSERT INTO usuario_grupo_bi(CD_USUARIO,CD_GRUPO,CD_PESSOA)
               VALUES ('$novousuario','$novogrupo','$novaunidade')";
               $res = mysql_db_query($banco,$grava,$conexao);



                              $linhas = mysql_affected_rows();


if ($linhas>"0"){
   echo "Eliminado Registro";
}else    {
   echo "Falha No Registro";
}

}


if ($escolha=="muda1"){





              $result28MODA77 = "select count(*) CONTADOR  FROM usuario_grupo_bi WHERE
              id_libera_funcionario_acesso='S' and cd_usuario='$codigousuarionovo' AND
              CD_PESSOA IN (SELECT CODIGO FROM PESSOA_BI WHERE DESCRICAO='$descricaoempresa7')  ";
              



               
              $res877 = mysql_db_query($banco,$result28MODA77,$conexao);
                 $valor8877=mysql_fetch_array($res877);
                 $contador66=$valor8877["CONTADOR"];



               IF ($contador66 >="1"){
                           $sql88 = "update usuario_grupo_bi set id_libera_funcionario_acesso='N'
                           where cd_usuario='$codigousuarionovo' AND
                           CD_PESSOA IN (SELECT CODIGO FROM PESSOA_BI WHERE DESCRICAO='$descricaoempresa7')  ";

	                       $res = mysql_db_query($banco,$sql88,$conexao);
	              

               }
               ELSE
               {
                           $sql88 = "update usuario_grupo_bi set id_libera_funcionario_acesso='S'
                           where cd_usuario='$codigousuarionovo' AND
                           CD_PESSOA IN (SELECT CODIGO FROM PESSOA_BI WHERE DESCRICAO='$descricaoempresa7')
                           ";

	                       $res = mysql_db_query($banco,$sql88,$conexao);
	                       

               }

             
}


if ($escolha=="muda2"){





              $result28MODA77 = "select count(*) CONTADOR  FROM usuario_grupo_bi WHERE
              id_libera_definir_funcionario='S' and cd_usuario='$codigousuarionovo' AND
              CD_PESSOA IN (SELECT CODIGO  FROM PESSOA_BI WHERE DESCRICAO='$descricaoempresa7')  ";


              $res877 = mysql_db_query($banco,$result28MODA77,$conexao);
                 $valor8877=mysql_fetch_array($res877);
                 $contador669=$valor8877["CONTADOR"];



               IF ($contador669 >="1"){
                           $sql88 = "update usuario_grupo_bi set id_libera_definir_funcionario='N'
                           where cd_usuario='$codigousuarionovo' AND
              CD_PESSOA IN (SELECT CODIGO FROM PESSOA_BI WHERE DESCRICAO='$descricaoempresa7')  ";

	                       $res = mysql_db_query($banco,$sql88,$conexao);


               }
               ELSE
               {
                           $sql88 = "update usuario_grupo_bi set id_libera_definir_funcionario='S'
                           where cd_usuario='$codigousuarionovo' AND
              CD_PESSOA IN (SELECT CODIGO FROM PESSOA_BI WHERE DESCRICAO='$descricaoempresa7')";

	                       $res = mysql_db_query($banco,$sql88,$conexao);


               }


}






if (!IsSet($escolha) or ($escolha=="1") OR ($escolha=="muda1") OR ($escolha=="muda2")   ){



 $sql99="SELECT  a.id_libera_funcionario_acesso LIBERA,a.id_libera_definir_funcionario LIBERA2,
 b.nm_usuario NOME,b.cd_senha SENHA,c.descricao DESCRICAOGRUPO,
 c.codigo  CODIGOGRUPO,a.cd_usuario CODIGOUSUARIO,e.descricao UNIDADE,d.codigo CODIGOUNI,d.descricao NOMEPESSOA,
 e.CD_UNIDANEGOCIO_ERP SECAO
 from
usuario_grupo_bi a, usuario_bi b, grupo_usuario_bi c,pessoa_bi d,pessoa_bi e
where a.cd_usuario=b.cd_usuario and
a.cd_grupo=c.codigo and
b.cd_pessoa=d.codigo and
a.cd_pessoa=e.codigo
";


?>



<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext ' width="99%">

<tr>
<th>Usuário</th>
<th>Nome</th>
<th>senha</th>
<th>Codigo Grupo</th>
<th>Grupo</th>
<th>Privilegio</br>Autoriza Entrada</th>
<th>Privilégio Definir</br> Funcionários de Entrada</th>
<th>Unidade</br>Negócio</th>
<th>Codigo Fornecedor</br>Sadege</th>



</tr>


<?

			$res = mysql_db_query($banco,$sql99,$conexao);

            while ($valor=mysql_fetch_array($res)) {

            $codigolinha=$valor["CODIGOUSUARIO"];
            $codigouni5=$valor["CODIGOUNI"];
            $descricaoempresa7=$valor["UNIDADE"];
            

            

            IF ($valor["LIBERA"]=="0"){$mostrapara5="Não";}
            IF ($valor["LIBERA"]=="N"){$mostrapara5="Não";}
            IF ($valor["LIBERA"]=="S"){$mostrapara5="Sim";}
            
            IF ($valor["LIBERA2"]=="0"){$mostrapara6="Não";}
            IF ($valor["LIBERA2"]=="N"){$mostrapara6="Não";}
            IF ($valor["LIBERA2"]=="S"){$mostrapara6="Sim";}

            
            
		    ?>

	    <tr>
	    <td><?echo $valor["NOME"];?></td>
	    <td><?echo $valor["NOMEPESSOA"];?></td>
	    <td><?echo $valor["SENHA"];?></td>
	    <td><?echo $valor["CODIGOGRUPO"];?></td>
	    <td><?echo $valor["DESCRICAOGRUPO"];?></td>
        <td><a href="#" onClick="window.open('parametrizacaousuariomaximiza.php?banco=<?ECHO $banco;?>&codigouni5=<?ECHO $codigouni5;?>
          &escolha=muda1&navegando=sim&codigoempresa=<?ECHO $codigoempresa;?>&descricaoempresa7=<?ECHO $descricaoempresa7;?>
          &codigousuarionovo=<?ECHO $codigolinha;?>&sequencia=<?ECHO $simulacaopassa;?>&mes1=<?ECHO $mes1;?>&ano=<?ECHO $ano;?>&tipoconsulta=<?ECHO $tipoconsulta;?>','tela01','toolbar=no,location=no,directories=yes,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=1000,height=550')">
                 <?echo $mostrapara5;?></a></td>
                 
                 <td><a href="#" onClick="window.open('parametrizacaousuariomaximiza.php?banco=<?ECHO $banco;?>&codigouni5=<?ECHO $codigouni5;?>
          &escolha=muda2&navegando=sim&codigoempresa=<?ECHO $codigoempresa;?>&descricaoempresa7=<?ECHO $descricaoempresa7;?>
          &codigousuarionovo=<?ECHO $codigolinha;?>&sequencia=<?ECHO $simulacaopassa;?>&mes1=<?ECHO $mes1;?>&ano=<?ECHO $ano;?>&tipoconsulta=<?ECHO $tipoconsulta;?>','tela01','toolbar=no,location=no,directories=yes,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=1000,height=550')">
                 <?echo $mostrapara6;?></a></td>
                 <td><?echo $valor["UNIDADE"];?></td>
                 <td><?echo $valor["SECAO"];?></td>

                 


 </tr>
 <?}?>

</table>

 <hr>
Associando Usuário a um novo Grupo e Unidade de Negócio</br>
<table>

<tr>
<td>Grupo</td>
<td><select   style='font-size: 10px;color: blue;text-align:right;bold: Negrito'  name="novogrupo">

					<?
					$stmt1 = "SELECT CODIGO,DESCRICAO FROM grupo_usuario_bi  ";
					$res = mysql_db_query($banco,$stmt1,$conexao);

                    while ($valor=mysql_fetch_array($res)) {
					 print "<option value=\"{$valor["CODIGO"]}\">{$valor["DESCRICAO"]}</option>";

					}


					 ?>
					 </select></td>
					 </tr>

                     <tr>
                      <td>Usuario</td>
<td><select   style='font-size: 10px;color: blue;text-align:right;bold: Negrito'  name="novousuario">

					<?
					$stmt1 = "SELECT CD_USUARIO,NM_USUARIO FROM usuario_bi ";
					$res = mysql_db_query($banco,$stmt1,$conexao);

                    while ($valor=mysql_fetch_array($res)) {
					 print "<option value=\"{$valor["CD_USUARIO"]}\">{$valor["NM_USUARIO"]}</option>";

					}


					 ?>
					 </select></td>

					 </tr>

					  <tr>
                      <td>Unidade de Acesso</td>
<td><select   style='font-size: 10px;color: blue;text-align:right;bold: Negrito'  name="novaunidade">

					<?
					$stmt1 = "select CODIGO,DESCRICAO FROM pessoa_bi where
    id_tipo_pessoa='2' and ((id_matriz='S') OR (ID_FILIAL='S')) ";
					$res = mysql_db_query($banco,$stmt1,$conexao);

                    while ($valor=mysql_fetch_array($res)) {
					 print "<option value=\"{$valor["CODIGO"]}\">{$valor["DESCRICAO"]}</option>";

					}


					 ?>
					 </select></td>

					 </tr>


        </table>
        <input type="hidden" name="tipo" value="novousuariogrupo">
        <input type="hidden" name="escolha" value="1">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">
        <input type="hidden" name="banco" value="<?echo $banco;?>">
        <input  type="submit"  VALUE="GRAVAR">





<?

}

?>
 
 </form>

  




