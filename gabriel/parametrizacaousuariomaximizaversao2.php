<? session_start();?>
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



}


$edusuario= $_SESSION["edusuario"];
$edsenha= $_SESSION["edsenha"];
$banco=$_SESSION["banco"];

//CHAMA O MENU PELA CONEXAO
require("carregamenumaximiza.php");
require("estilo.css");




if ($tipo=="novousuariogrupo"){


               $resultacha331= "select cd_pessoa PESSOA from usuario_bi where cd_usuario='$novousuario'";

               $resultacha332= mysql_db_query($banco,$resultacha331,$conexao);
               $resultacha333=mysql_fetch_array($resultacha332);
               $codigopessoa=$resultacha333["PESSOA"];


               $sql9955="SELECT  CODIGO from pessoa_bi where id_integrado='S'";
               $sql99554= mysql_db_query($banco,$sql9955,$conexao);

               while ($valor44=mysql_fetch_array($sql99554)) {

                       $novaunidade=$valor44["CODIGO"];

                  $grava = "INSERT INTO usuario_grupo_bi(CD_USUARIO,CD_GRUPO,CD_PESSOA,cd_empresa,id_libera_funcionario_acesso,
                  id_libera_definir_funcionario)
                  VALUES ('$novousuario','$novogrupo','$codigopessoa','$novaunidade','N','N')";
                                    $res = mysql_db_query($banco,$grava,$conexao);
                  $linhas = mysql_affected_rows();
               }
               

if ($linhas>"0"){
   echo "Inserido Registro";
}else    {
   echo "Falha No Registro";
}

}


if ($escolha=="muda1"){





              $result28MODA77 = "select count(*) CONTADOR  FROM usuario_grupo_bi WHERE
              id_libera_funcionario_acesso='S' and cd_usuario='$codigousuarionovo' AND
              CD_EMPRESA IN (SELECT CODIGO FROM PESSOA_BI WHERE DESCRICAO='$descricaoempresa7')  ";
              



               
              $res877 = mysql_db_query($banco,$result28MODA77,$conexao);
                 $valor8877=mysql_fetch_array($res877);
                 $contador66=$valor8877["CONTADOR"];



               IF ($contador66 >="1"){
                           $sql88 = "update usuario_grupo_bi set id_libera_funcionario_acesso='N'
                           where cd_usuario='$codigousuarionovo' AND
                           CD_EMPRESA IN (SELECT CODIGO FROM PESSOA_BI WHERE DESCRICAO='$descricaoempresa7')  ";


	                       $res = mysql_db_query($banco,$sql88,$conexao);
	              

               }
               ELSE
               {
                           $sql88 = "update usuario_grupo_bi set id_libera_funcionario_acesso='S'
                           where cd_usuario='$codigousuarionovo' AND
                           CD_EMPRESA IN (SELECT CODIGO FROM PESSOA_BI WHERE DESCRICAO='$descricaoempresa7')
                           ";

	                       $res = mysql_db_query($banco,$sql88,$conexao);
	                       

               }

             
}


if ($escolha=="muda2"){





              $result28MODA77 = "select count(*) CONTADOR  FROM usuario_grupo_bi WHERE
              id_libera_definir_funcionario='S' and cd_usuario='$codigousuarionovo' AND
              CD_EMPRESA IN (SELECT CODIGO  FROM PESSOA_BI WHERE DESCRICAO='$descricaoempresa7')  ";


              $res877 = mysql_db_query($banco,$result28MODA77,$conexao);
                 $valor8877=mysql_fetch_array($res877);
                 $contador669=$valor8877["CONTADOR"];



               IF ($contador669 >="1"){
                           $sql88 = "update usuario_grupo_bi set id_libera_definir_funcionario='N'
                           where cd_usuario='$codigousuarionovo' AND
              CD_EMPRESA IN (SELECT CODIGO FROM PESSOA_BI WHERE DESCRICAO='$descricaoempresa7')  ";

	                       $res = mysql_db_query($banco,$sql88,$conexao);


               }
               ELSE
               {
                           $sql88 = "update usuario_grupo_bi set id_libera_definir_funcionario='S'
                           where cd_usuario='$codigousuarionovo' AND
              CD_EMPRESA IN (SELECT CODIGO FROM PESSOA_BI WHERE DESCRICAO='$descricaoempresa7')";

	                       $res = mysql_db_query($banco,$sql88,$conexao);


               }


}






if (!IsSet($escolha) or ($escolha=="1") OR ($escolha=="muda1") OR ($escolha=="muda2")   ){


//DEFINA PAGINACAO
             $chacontadorgeral="select count(*) CONTADOR FROM usuario_grupo_bi a, usuario_bi b, grupo_usuario_bi c,pessoa_bi d,pessoa_bi e
where a.cd_usuario=b.cd_usuario and
a.cd_grupo=c.codigo and
b.cd_pessoa=d.codigo and
a.cd_empresa=e.codigo";
             $registros = "10";
             require("paginacao_mi.php");


            //FINAL PAGINACAO


 $sql99="SELECT  a.id_libera_funcionario_acesso LIBERA,a.id_libera_definir_funcionario LIBERA2,
 b.nm_usuario NOME,b.cd_senha SENHA,c.descricao DESCRICAOGRUPO,
 c.codigo  CODIGOGRUPO,a.cd_usuario CODIGOUSUARIO,e.descricao UNIDADE,d.codigo CODIGOUNI,d.descricao NOMEPESSOA,
 e.CD_UNIDANEGOCIO_ERP SECAO
 from
usuario_grupo_bi a, usuario_bi b, grupo_usuario_bi c,pessoa_bi d,pessoa_bi e
where a.cd_usuario=b.cd_usuario and
a.cd_grupo=c.codigo and
b.cd_pessoa=d.codigo and
a.cd_empresa=e.codigo
limit $inicio,$registros
";


?>

<div  style="display: block;" id="mostratelaparametrousuario">


<table width="99%" >

          <tr>
          <td><titulo><?echo "Parametrização De Usuários";?></titulo></td>
          </td>


          </tr>


</table>
</br></br></br></br>


<table  width="100%" ID="grid" >
          <tr class="difa">
<td>Usuário</td>
<td>Nome</td>
<td>senha</td>
<td>Codigo Grupo</td>
<td>Grupo</td>
<td>Privilegio</br>Autoriza Entrada</td>
<td>Privilégio Definir</br> Funcionários de Entrada</td>
<td>Unidade</br>Negócio</td>
<td>Codigo Fornecedor</br>Sadege</td>



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

        <tr class="difr">
	    <td><?echo $valor["NOME"];?></td>
	    <td><?echo $valor["NOMEPESSOA"];?></td>
	    <td><?echo $valor["SENHA"];?></td>
	    <td><?echo $valor["CODIGOGRUPO"];?></td>
	    <td><?echo $valor["DESCRICAOGRUPO"];?></td>
        <td><a href="parametrizacaousuariomaximizaversao2.php?banco=<?ECHO $banco;?>&codigouni5=<?ECHO $codigouni5;?>
          &escolha=muda1&navegando=sim&codigoempresa=<?ECHO $codigoempresa;?>&descricaoempresa7=<?ECHO $descricaoempresa7;?>
          &codigousuarionovo=<?ECHO $codigolinha;?>&sequencia=<?ECHO $simulacaopassa;?>&mes1=<?ECHO $mes1;?>&ano=<?ECHO $ano;?>&tipoconsulta=<?ECHO $tipoconsulta;?>">
                 <?echo $mostrapara5;?></a></td>
                 
                 <td><a href="parametrizacaousuariomaximizaversao2.php?banco=<?ECHO $banco;?>&codigouni5=<?ECHO $codigouni5;?>
          &escolha=muda2&navegando=sim&codigoempresa=<?ECHO $codigoempresa;?>&descricaoempresa7=<?ECHO $descricaoempresa7;?>
          &codigousuarionovo=<?ECHO $codigolinha;?>&sequencia=<?ECHO $simulacaopassa;?>&mes1=<?ECHO $mes1;?>&ano=<?ECHO $ano;?>&tipoconsulta=<?ECHO $tipoconsulta;?>">
                 <?echo $mostrapara6;?></a></td>
                 <td><font style='font-size: 9px;color: black;text-align:Right;bold: Negrito' >
                 <?echo $valor["UNIDADE"];?></font></td>
                 <td><font style='font-size: 9px;color: black;text-align:Right;bold: Negrito' >
                 <?echo $valor["SECAO"];?></font></td>

                 


 </tr>
 <?}?>

</table>

<table width="100%">
                    <td align=right>
                    Página:<? echo "$pagina_atual";?>/<? echo "$paginas";?>
                     <a href="parametrizacaousuariomaximizaversao2.php?navegando=sim&buscarparametro=nao&pagina_atual=<?echo $anteriorpagina;?>&status=cancelar&statusnovapessoa=nao">
                     <img src="setaesquerda.png" width="20" height="14" ></a>
                    <a href="parametrizacaousuariomaximizaversao2.php?navegando=sim&buscarparametro=nao&pagina_atual=<?echo $proximapagina;?>&status=cancelar&statusnovapessoa=nao">
                    <img src="setadireita.png" width="20" height="14" ></a>
                    </td>
                    </tr>
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
					 </select> Usuario:
<select   style='font-size: 10px;color: blue;text-align:right;bold: Negrito'  name="novousuario">

					<?
					$stmt1 = "SELECT CD_USUARIO,NM_USUARIO FROM usuario_bi ";
					$res = mysql_db_query($banco,$stmt1,$conexao);

                    while ($valor=mysql_fetch_array($res)) {
					 print "<option value=\"{$valor["CD_USUARIO"]}\">{$valor["NM_USUARIO"]}</option>";

					}


					 ?>
					 </select>
                     Unidade de Negócio:<select   style='font-size: 10px;color: blue;text-align:right;bold: Negrito'  name="novaunidade">

					<?
					$stmt1 = "select CODIGO,DESCRICAO FROM pessoa_bi where
    id_tipo_pessoa='2' and ((id_matriz='S') OR (ID_FILIAL='S') OR (ID_INTEGRADO='S')) ";
					$res = mysql_db_query($banco,$stmt1,$conexao);

                    while ($valor=mysql_fetch_array($res)) {
					 print "<option value=\"{$valor["CODIGO"]}\">{$valor["DESCRICAO"]}</option>";

					}


					 ?>
					 </select>



        <input type="hidden" name="tipo" value="novousuariogrupo">
        <input type="hidden" name="escolha" value="1">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">

        <input  type="submit"  VALUE="GRAVAR">


        </td>

		</tr>
		</table>





<?

}

?>

</div>
 
 </form>

  




