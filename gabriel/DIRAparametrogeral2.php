<?
$cortopo="#828282";
$corfundo="#4682B4";

require("configuramysql.php");
require("estilo2.css");
require("estilonavegacaofundo.css");

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


}



//acha VARIACAO PADRAO
$usu18 = "SELECT CD_EMPRESA FROM PARAMETRO_BI";
//echo "$usu18";
$res8 = mysql_db_query($banco,$usu18,$conexao);
$valor87=mysql_fetch_array($res8);
$codigoempresa=$valor87["CD_EMPRESA"];

//acha VARIACAO PADRAO
$usu18 = "SELECT CD_VARIACAO VARIACAO,DS_VARIACAO DESCRICAO FROM VARIACAO_ANIMAL_BI WHERE CD_VARIACAO IN (SELECT CD_VARIACAO
FROM USUARIO_BI where CD_USUARIO='$codigousuario')";

$res8 = mysql_db_query($banco,$usu18,$conexao);
$valor87=mysql_fetch_array($res8);
$variacao3=$valor87["VARIACAO"];
$descricaovariacao3=$valor87["DESCRICAO"];



//acha o PARAMETRO SE EXISTE DESMONTE E MONTAGEM
$achadesmonte1 = "select ID_EXISTE_DESMONTE EXISTE  from PARAMETRO_BI ";
$achadesmonte2  = mysql_db_query($banco,$achadesmonte1,$conexao);
$achadesmonte3 =mysql_fetch_array($achadesmonte2);
$existedesmonte=$achadesmonte3["EXISTE"];

?>

<center><h2><font style='font-size: 32px;color: black;text-align:left;bold: Negrito' >Parametrização Geral</font></h2>



<a href="DIRAparametrogeral2.php?codigousuario=<?echo $codigousuario;?>&codigoempresa=<?ECHO $codigoempresa;?>
&navegando=sim&banco=<?ECHO $banco;?>&escolha=1&valorcontador=2&month=<?ECHO $month;?>"><img width=70 height=70 BORDER=1 src="VOLTAR.GIF">
</a>

<a href="DIRAparametrogeral2.php?escolha=novoregistro&tela=2&mes=<?echo $mes;?>&ano=<?echo $ano;?>
&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>
&codigousuario=<?echo $codigousuario;?>
&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&banco=<?echo $banco;?>"><img width=70 height=70 BORDER=1  src="incluirmeta.GIF">
</a>

<a href="DIRAparametrogeral2.php?escolha=responsavel5W&mes=<?echo $mes;?>&ano=<?echo $ano;?>
&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>
&codigousuario=<?echo $codigousuario;?>
&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&banco=<?echo $banco;?>"><img width=70 height=70 BORDER=1  src="responsavelmeta.GIF">
</a>

<?

if ($escolha=="muda1"){


             IF (TRIM($desejaacao)=="S"){
             $acha = "update PARAMETRO_BI SET ID_GERA_ACAO5W_VIVO='N'";
             $res = mysql_db_query($banco,$acha ,$conexao);
             }

             IF (TRIM($desejaacao)=="N"){

              $achacontador = "SELECT count(*) CONTADOR FROM  ITEM_PRODUCAO_BI   WHERE id_mestre_rendimento='S'
              and CD_EMPRESA='$codigoempresa' and CD_VARIACAO='$variacao3'  and cd_material in (select cd_item from ABSORCAO_MP_BI
              WHERE CD_USUARIO_RESPONSAVEL5W IS NULL)";
              //echo "$sql </br>";
              $res = mysql_db_query($banco,$achacontador ,$conexao);
              $valor8=mysql_fetch_array($res);
              $ultimo=$valor8["CONTADOR"];
               IF ($ultimo=="0"){
                           $acha = "update PARAMETRO_BI SET ID_GERA_ACAO5W_VIVO='S'";
                           $res = mysql_db_query($banco,$acha ,$conexao);
               }
               ELSE
               {
                 ECHO "Existe a Necessidade de Definir Primeiro os Responsáveis por Item de Estudo";
               }
             }
             
}

if ($escolha=="muda3"){
echo "5555";

              $achacontador = "SELECT count(*) CONTADOR FROM  ITEM_PRODUCAO_BI   WHERE id_mestre_rendimento='S'
              and CD_EMPRESA='$codigoempresa' and CD_VARIACAO='$variacao3'  and cd_material in (select cd_item from ABSORCAO_MP_BI
              WHERE CD_USUARIO_RESPONSAVEL5W IS NULL)";

              $res = mysql_db_query($banco,$achacontador ,$conexao);
              $valor8=mysql_fetch_array($res);
              $ultimo=$valor8["CONTADOR"];
               IF ($ultimo=="0"){
                           $acha = "update PARAMETRO_BI SET QT_DIAS_LIMITE_5W='$dias5w'";
                           $res = mysql_db_query($banco,$acha ,$conexao);
               }
               ELSE
               {
                 ECHO "Existe a Necessidade de Definir Primeiro os Responsáveis por Item de Estudo";
               }


}

if ($escolha=="muda5"){


$achacontador = "SELECT count(*) CONTADOR FROM  ITEM_PRODUCAO_BI   WHERE id_mestre_rendimento='S'
              and CD_EMPRESA='$codigoempresa' and CD_VARIACAO='$variacao3'  and cd_material in (select cd_item from ABSORCAO_MP_BI
              WHERE CD_USUARIO_RESPONSAVEL5W IS NULL)";
              $res = mysql_db_query($banco,$achacontador ,$conexao);
              $valor8=mysql_fetch_array($res);
              $ultimo=$valor8["CONTADOR"];
               IF ($ultimo=="0"){
                           $acha = "update PARAMETRO_BI SET QT_ACUMULADA_OCOR5W='$quantdia'";
                           $res = mysql_db_query($banco,$acha ,$conexao);
               }
               ELSE
               {
                 ECHO "Existe a Necessidade de Definir Primeiro os Responsáveis por Item de Estudo";
               }


}





if (!IsSet($escolha) or ($escolha=="1") OR ($escolha=="muda1") OR ($escolha=="muda3") OR ($escolha=="muda5")  ){

if ($existedesmonte=="S"){

?>

<CENTER><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="550">
 
 <td width="50%">
  Empresa:
 </td>
 <td width="50%">
 		 
				 <? 
				 
				 $result2 = "SELECT CODIGO,DESCRICAO FROM PESSOA_BI WHERE ID_TIPO_PESSOA='2' AND CODIGO='$codigoempresa'";
				 
				 $res8 = mysql_db_query($banco,$result2,$conexao);
                 $valor88=mysql_fetch_array($res8);
                 $mostra=$valor88["DESCRICAO"];

				 echo "$mostra";
				 ?> 
				 
 </tr>
 
 <tr>
 <td width="50%">
 
 Existe Desmonte Associado com Montagem
 </td>
 <td width="50%">Sim </tr>

 <tr>
 <td width="50%">
 
 Grupo de Produto:
 </td>
 <td width="50%">
 <? 
				 $result2 = "SELECT DS_GRUPO FROM GRUPO_MATERIAIS_BI WHERE CD_GRUPO IN (SELECT CD_GRUPO_PRODUTO FROM PARAMETRO_BI where cd_empresa='$codigoempresa')";
				  
				 $res8 = mysql_db_query($banco,$result2,$conexao);
                 $valor88=mysql_fetch_array($res8);
                 $mostra=$valor88["DS_GRUPO"];

				 echo "$mostra";

				 ?> 
 </td>
 </tr>
 
 <tr>
 <td width="50%">
 
 Família de  Produto:
 </td>
 <td width="50%">
 <? 
				 $result2 = "SELECT DS_FAMILIA FROM FAMILIA_MATERIAIS_BI WHERE CD_FAMILIA IN (SELECT CD_FAMILIA FROM PARAMETRO_BI where cd_empresa='$codigoempresa')";
				 $res8 = mysql_db_query($banco,$result2,$conexao);
                 $valor88=mysql_fetch_array($res8);
                 $mostra=$valor88["DS_FAMILIA"];
				 echo "$mostra";
				 ?> 
 </td>
 </tr>

  <tr>
 <td width="50%">
 
 Unidade de Medida:
 </td>
 <td width="50%">
 <? 
				 $result2 = "SELECT DS_UNIDADE FROM UNIDADE WHERE CD_UNIDADE IN (SELECT CD_UNIDADE_PRODUTO FROM PARAMETRO_BI where cd_empresa='$codigoempresa')";
				 $res8 = mysql_db_query($banco,$result2,$conexao);
                 $valor88=mysql_fetch_array($res8);
                 $mostra=$valor88["DS_UNIDADE"];
				 echo "$mostra";
				 ?> 
 </td>
 </tr>
 
 
 <tr>
 <td width="50%">
 
 Processo de Roteiros:
 </td>
 <td width="50%">
 <? 
				 $result2 = "SELECT DS_PROCESSO FROM PROCESSO_BI WHERE NR_SEQUENCIA IN (SELECT CD_PROCESSO FROM PARAMETRO_BI where cd_empresa='$codigoempresa')";
				 $res8 = mysql_db_query($banco,$result2,$conexao);
                 $valor88=mysql_fetch_array($res8);
                 $mostra=$valor88["DS_PROCESSO"];
				 echo "$mostra";
				 ?> 
 </td>
 </tr>
 
 <tr>
 <td width="50%">
 
 Fórmula :
 </td>
 <td width="50%">
 <? 
				 $result2 = "SELECT DS_FORMULA FROM FORMULA_BI WHERE NR_SEQUENCIA IN (SELECT CD_FORMULA FROM PARAMETRO_BI where cd_empresa='$codigoempresa')";
				 $res8 = mysql_db_query($banco,$result2,$conexao);
                 $valor88=mysql_fetch_array($res8);
                 $mostra=$valor88["DS_FORMULA"];
				 echo "$mostra";
				 ?> 
 </td>
 </tr>
 
 <tr>
 <td width="50%">
 
 Mercado-1:
 </td>
 <td width="50%">
 <? 
				 $result2 = "SELECT DS_MERCADO FROM MERCADO_BI WHERE CD_MERCADO IN (SELECT CD_MERCADO_NACIONAL FROM PARAMETRO_BI where cd_empresa='$codigoempresa')";
				 $res8 = mysql_db_query($banco,$result2,$conexao);
                 $valor88=mysql_fetch_array($res8);
                 $mostra=$valor88["DS_MERCADO"];
				 echo "$mostra";
				 ?> 
 </td>
 </tr>
 <tr>
 <td width="50%">
 
 Mercado-2:
 </td>
 <td width="50%">
 <? 
				 $result2 = "SELECT DS_MERCADO FROM MERCADO_BI WHERE CD_MERCADO IN (SELECT CD_MERCADO_EXPORTACAO FROM PARAMETRO_BI where cd_empresa='$codigoempresa')";
				 $res8 = mysql_db_query($banco,$result2,$conexao);
                 $valor88=mysql_fetch_array($res8);
                 $mostra=$valor88["DS_MERCADO"];
				 echo "$mostra";
				 ?> 
 </td>
 </tr>
 
 <tr>
 <td width="50%">
 
 Moeda:
 </td>
 <td width="50%">
 <? 
				 $result2 = "SELECT DS_MOEDA FROM MOEDA_BI WHERE CD_MOEDA IN (SELECT CD_MOEDA FROM PARAMETRO_BI where cd_empresa='$codigoempresa')";
				  $res8 = mysql_db_query($banco,$result2,$conexao);
                 $valor88=mysql_fetch_array($res8);
                 $mostra=$valor88["DS_MOEDA"];
				 echo "$mostra";
				 ?> 
 </td>
 </tr>
 
 <?
 $result2 = "SELECT ID_CURVA,VL_PESO_MEDIO MEDIO,PR_CONDENADOS CONDENA,PR_MORTOS MORTO FROM CURVA_BI WHERE ID_CURVA IN (SELECT ID_CURVA FROM PARAMETRO_BI where cd_empresa='$codigoempresa')";
				 $res8 = mysql_db_query($banco,$result2,$conexao);
                 $valor88=mysql_fetch_array($res8);

                 $mostra=$valor88["ID_CURVA"];
				 $medio=$valor88["MEDIO"];
				 $condena=$valor88["CONDENA"];
				 $morto=$valor88["MORTO"];
 ?>

 
 
 
 <tr>
 <td width="50%">
 
 Condenação(%):
 </td>
 <td width="50%">
  <?echo "$condena";?>
 </td>
 </tr>

<tr>
 <td width="50%">
 
 Mortos(%):
 </td>
 <td width="50%">
  <?echo "$morto";?>
 </td>
 </tr>
 
 <?



 $sql8 = "SELECT VL_RENDIMENTO_MAQUINA_CMS RENDI FROM PARAMETRO_BI";
 $res8 = mysql_db_query($banco,$sql8,$conexao);
 while ($valor=mysql_fetch_array($res8)){
 
$rendimentomaquina=$valor["RENDI"];

 } 
?>
<tr>
 <td width="50%"><?echo "Valor Rendimento Máquina CMS";?></td>
 <td><?echo $rendimentomaquina;?></td>
 

 </tr>

 <tr>
 <td width="50%">Definir ou Desativar Itens para Estudo de Rendimento</td>
 <td><a href="#" onClick="window.open('DIRAparametro3.php?banco=<?ECHO $banco;?>&navegando=sim&codigoempresa=<?ECHO $codigoempresa;?>&codigousuario=<?ECHO $codigousuario;?>&sequencia=<?ECHO $simulacaopassa;?>&mes1=<?ECHO $mes1;?>&ano=<?ECHO $ano;?>&tipoconsulta=<?ECHO $tipoconsulta;?>','tela01','toolbar=no,location=no,directories=yes,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=1000,height=550')">Sim</a></td>
 

 </tr>
 
 <tr>
 <td width="50%">Eliminar Histórico abaixo de uma Data Especificada</td>
 <td><a href="#" onClick="window.open('DIRAeliminarhistorico.php?banco=<?ECHO $banco;?>&navegando=sim&codigoempresa=<?ECHO $codigoempresa;?>&codigousuario=<?ECHO $codigousuario;?>&sequencia=<?ECHO $simulacaopassa;?>&mes1=<?ECHO $mes1;?>&ano=<?ECHO $ano;?>&tipoconsulta=<?ECHO $tipoconsulta;?>','tela01','toolbar=no,location=no,directories=yes,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=1000,height=550')">Sim</a></td>
 

 </tr>


 
 <tr>
 <td width="50%">

 Quantidade de Dias Limite para Execução de uma Ação 5W
 </td>
 <td width="50%">
 <?
				 $result2 = "SELECT QT_DIAS_LIMITE_5W DIAS FROM PARAMETRO_BI where cd_empresa='$codigoempresa'";
				  $res8 = mysql_db_query($banco,$result2,$conexao);
                 $valor88=mysql_fetch_array($res8);
                 $mostra=$valor88["DIAS"];
     			 ?>
				 <a href="DIRAparametrogeral2.php?banco=<?ECHO $banco;?>&escolha=muda2&navegando=sim&codigoempresa=<?ECHO $codigoempresa;?>&codigousuario=<?ECHO $codigousuario;?>&sequencia=<?ECHO $simulacaopassa;?>&mes1=<?ECHO $mes1;?>&ano=<?ECHO $ano;?>&quantidadedias=<?echo "$mostra";?>"><?echo "$mostra";?></a>

 </td>
 </tr>

 <tr>
 <td width="50%">

 Deseja Geração de Ações 5W Automática pela Geração de Rendimento
 </td>
 <td width="50%">

 <?
				 $result2 = "SELECT ID_GERA_ACAO5W_VIVO ACAO FROM PARAMETRO_BI where cd_empresa='$codigoempresa'";
				  $res8 = mysql_db_query($banco,$result2,$conexao);
                 $valor88=mysql_fetch_array($res8);
                 $mostra=$valor88["ACAO"];
 ?>

 <a href="DIRAparametrogeral2.php?banco=<?ECHO $banco;?>&escolha=muda1&navegando=sim&codigoempresa=<?ECHO $codigoempresa;?>&codigousuario=<?ECHO $codigousuario;?>&sequencia=<?ECHO $simulacaopassa;?>&mes1=<?ECHO $mes1;?>&ano=<?ECHO $ano;?>&tipoconsulta=<?ECHO $tipoconsulta;?>&desejaacao=<?ECHO $mostra;?>"><?echo "$mostra";?></a>
 </td>
 </tr>
 
 <tr>
 <td width="50%">

 Quantidade de Não Conforme Acumulativa para gerar uma Ação 5W
 </td>
 <td width="50%">
 <?
				 $result2 = "SELECT QT_ACUMULADA_OCOR5W ACAO FROM PARAMETRO_BI where cd_empresa='$codigoempresa'";
				  $res8 = mysql_db_query($banco,$result2,$conexao);
                 $valor88=mysql_fetch_array($res8);
                 $mostra=$valor88["ACAO"];

				 ?>
				 <a href="DIRAparametrogeral2.php?banco=<?ECHO $banco;?>&escolha=muda4&navegando=sim&codigoempresa=<?ECHO $codigoempresa;?>&codigousuario=<?ECHO $codigousuario;?>&sequencia=<?ECHO $simulacaopassa;?>&mes1=<?ECHO $mes1;?>&ano=<?ECHO $ano;?>&quantidadediasacumulado=<?echo "$mostra";?>"><?echo "$mostra";?></a>

 </td>
 </tr>
 
<tr>
 <td width="50%">

 Data de Fechamento da Produção pelo PCP
 </td>
 <td width="50%">
 <?
				 $result2 = "SELECT ULTIMA_DATA_FECHADA_PRODUCAO DATA FROM PARAMETRO_BI where cd_empresa='$codigoempresa'";
				  $res8 = mysql_db_query($banco,$result2,$conexao);
                 $valor88=mysql_fetch_array($res8);
                 $mostra=$valor88["DATA"];

				 ?>
				 <a href="DIRAparametrogeral2.php?banco=<?ECHO $banco;?>&escolha=muda5data&navegando=sim&codigoempresa=<?ECHO $codigoempresa;?>
                 &codigousuario=<?ECHO $codigousuario;?>&sequencia=<?ECHO $simulacaopassa;?>&mes1=<?ECHO $mes1;?>
                 &ano=<?ECHO $ano;?>&quantidadediasacumulado=<?echo "$mostra";?>"><?echo "$mostra";?></a>

 </td>
 </tr>


 
 </table>

<?}
if ($existedesmonte=="N"){
?>
<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="550">
 
 <td width="50%">
  Empresa:
 </td>
 <td width="50%">
 		 
				 <? 
				 
				 $result2 = "SELECT CODIGO,DESCRICAO FROM PESSOA_BI WHERE ID_TIPO_PESSOA='2' AND CODIGO='$codigoempresa'";
				 
				 $res8 = mysql_db_query($banco,$result2,$conexao);
                 $valor88=mysql_fetch_array($res8);
                 $mostra=$valor88["DESCRICAO"];

				 echo "$mostra";
				 ?> 
				 
 </tr>
 
 <tr>
 <td width="50%">
 
 Existe Desmonte Associado com Montagem
 </td>
 <td width="50%">Não </tr>

 <tr>
 <td width="50%">
 
 Grupo de Produto:
 </td>
 <td width="50%">
 <? 
				 $result2 = "SELECT DS_GRUPO FROM GRUPO_MATERIAIS_BI WHERE CD_GRUPO IN (SELECT CD_GRUPO_PRODUTO FROM PARAMETRO_BI where cd_empresa='$codigoempresa')";
				  
				 $res8 = mysql_db_query($banco,$result2,$conexao);
                 $valor88=mysql_fetch_array($res8);
                 $mostra=$valor88["DS_GRUPO"];

				 echo "$mostra";

				 ?> 
 </td>
 </tr>
 
 <tr>
 <td width="50%">
 
 Família de  Produto:
 </td>
 <td width="50%">
 <? 
				 $result2 = "SELECT DS_FAMILIA FROM FAMILIA_MATERIAIS_BI WHERE CD_FAMILIA IN (SELECT CD_FAMILIA FROM PARAMETRO_BI where cd_empresa='$codigoempresa')";
				 $res8 = mysql_db_query($banco,$result2,$conexao);
                 $valor88=mysql_fetch_array($res8);
                 $mostra=$valor88["DS_FAMILIA"];
				 echo "$mostra";
				 ?> 
 </td>
 </tr>

  <tr>
 <td width="50%">
 
 Unidade de Medida:
 </td>
 <td width="50%">
 <? 
				 $result2 = "SELECT DS_UNIDADE FROM UNIDADE WHERE CD_UNIDADE IN (SELECT CD_UNIDADE_PRODUTO FROM PARAMETRO_BI where cd_empresa='$codigoempresa')";
				 $res8 = mysql_db_query($banco,$result2,$conexao);
                 $valor88=mysql_fetch_array($res8);
                 $mostra=$valor88["DS_UNIDADE"];
				 echo "$mostra";
				 ?> 
 </td>
 </tr>
 
 
 <tr>
 <td width="50%">
 
 Processo de Roteiros:
 </td>
 <td width="50%">
 <? 
				 $result2 = "SELECT DS_PROCESSO FROM PROCESSO_BI WHERE NR_SEQUENCIA IN (SELECT CD_PROCESSO FROM PARAMETRO_BI where cd_empresa='$codigoempresa')";
				 $res8 = mysql_db_query($banco,$result2,$conexao);
                 $valor88=mysql_fetch_array($res8);
                 $mostra=$valor88["DS_PROCESSO"];
				 echo "$mostra";
				 ?> 
 </td>
 </tr>
 
 <tr>
 <td width="50%">
 
 Fórmula :
 </td>
 <td width="50%">
 <? 
				 $result2 = "SELECT DS_FORMULA FROM FORMULA_BI WHERE NR_SEQUENCIA IN (SELECT CD_FORMULA FROM PARAMETRO_BI where cd_empresa='$codigoempresa')";
				 $res8 = mysql_db_query($banco,$result2,$conexao);
                 $valor88=mysql_fetch_array($res8);
                 $mostra=$valor88["DS_FORMULA"];
				 echo "$mostra";
				 ?> 
 </td>
 </tr>
 
 <tr>
 <td width="50%">
 
 Mercado-1:
 </td>
 <td width="50%">
 <? 
				 $result2 = "SELECT DS_MERCADO FROM MERCADO_BI WHERE CD_MERCADO IN (SELECT CD_MERCADO_NACIONAL FROM PARAMETRO_BI where cd_empresa='$codigoempresa')";
				 $res8 = mysql_db_query($banco,$result2,$conexao);
                 $valor88=mysql_fetch_array($res8);
                 $mostra=$valor88["DS_MERCADO"];
				 echo "$mostra";
				 ?> 
 </td>
 </tr>
 <tr>
 <td width="50%">
 
 Mercado-2:
 </td>
 <td width="50%">
 <? 
				 $result2 = "SELECT DS_MERCADO FROM MERCADO_BI WHERE CD_MERCADO IN (SELECT CD_MERCADO_EXPORTACAO FROM PARAMETRO_BI where cd_empresa='$codigoempresa')";
				 $res8 = mysql_db_query($banco,$result2,$conexao);
                 $valor88=mysql_fetch_array($res8);
                 $mostra=$valor88["DS_MERCADO"];
				 echo "$mostra";
				 ?> 
 </td>
 </tr>
 
 <tr>
 <td width="50%">
 
 Moeda:
 </td>
 <td width="50%">
 <? 
				 $result2 = "SELECT DS_MOEDA FROM MOEDA_BI WHERE CD_MOEDA IN (SELECT CD_MOEDA FROM PARAMETRO_BI where cd_empresa='$codigoempresa')";
				  $res8 = mysql_db_query($banco,$result2,$conexao);
                 $valor88=mysql_fetch_array($res8);
                 $mostra=$valor88["DS_MOEDA"];
				 echo "$mostra";
				 ?> 
 </td>
 </tr>
 
 <tr>
 <td width="50%">

 Quantidade de Dias Limite para Execução de uma Ação 5W
 </td>
 <td width="50%">
 <?
				 $result2 = "SELECT QT_DIAS_LIMITE_5W DIAS FROM PARAMETRO_BI where cd_empresa='$codigoempresa'";
				  $res8 = mysql_db_query($banco,$result2,$conexao);
                 $valor88=mysql_fetch_array($res8);
                 $mostra=$valor88["DIAS"];
     			 ?>
				 <a href="DIRAparametrogeral2.php?banco=<?ECHO $banco;?>&escolha=muda2&navegando=sim&codigoempresa=<?ECHO $codigoempresa;?>&codigousuario=<?ECHO $codigousuario;?>&sequencia=<?ECHO $simulacaopassa;?>&mes1=<?ECHO $mes1;?>&ano=<?ECHO $ano;?>&quantidadedias=<?echo "$mostra";?>"><?echo "$mostra";?></a>

 </td>
 </tr>
 
 <tr>
 <td width="50%">

 Deseja Geração de Ações 5W Automática pela Geração de Rendimento
 </td>
 <td width="50%">

 <?
				 $result2 = "SELECT ID_GERA_ACAO5W_VIVO ACAO FROM PARAMETRO_BI where cd_empresa='$codigoempresa'";
				  $res8 = mysql_db_query($banco,$result2,$conexao);
                 $valor88=mysql_fetch_array($res8);
                 $mostra=$valor88["ACAO"];
 ?>

 <a href="DIRAparametrogeral2.php?banco=<?ECHO $banco;?>&escolha=muda1&navegando=sim&codigoempresa=<?ECHO $codigoempresa;?>&codigousuario=<?ECHO $codigousuario;?>&sequencia=<?ECHO $simulacaopassa;?>&mes1=<?ECHO $mes1;?>&ano=<?ECHO $ano;?>&tipoconsulta=<?ECHO $tipoconsulta;?>&desejaacao=<?ECHO $mostra;?>"><?echo "$mostra";?></a>
 </td>
 </tr>
 
 <tr>
 <td width="50%">

 Quantidade de Não Conforme Acumulativa para gerar uma Ação 5W
 </td>
 <td width="50%">
 <?
				 $result2 = "SELECT QT_ACUMULADA_OCOR5W ACAO FROM PARAMETRO_BI where cd_empresa='$codigoempresa'";
				  $res8 = mysql_db_query($banco,$result2,$conexao);
                 $valor88=mysql_fetch_array($res8);
                 $mostra=$valor88["ACAO"];
				 echo "$mostra";
				 ?>
 </td>
 </tr>
 
 


 
 
 <tr>
 <td width="50%">Eliminar Histórico abaixo de uma Data Especificada</td>
 <td><a href="#" onClick="window.open('DIRAeliminarhistorico.php?banco=<?ECHO $banco;?>&navegando=sim&codigoempresa=<?ECHO $codigoempresa;?>&codigousuario=<?ECHO $codigousuario;?>&sequencia=<?ECHO $simulacaopassa;?>&escolha=mostrasimulacao&mes1=<?ECHO $mes1;?>&ano=<?ECHO $ano;?>&tipoconsulta=<?ECHO $tipoconsulta;?>','tela01','toolbar=no,location=no,directories=yes,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=1000,height=550')">Sim</a></td>
 

 </tr>

<?


}
?>

 </table>




 </br>
 <CENTER><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="550">

<tr>
                <th>Item</th>
				<th>Descrição</th>
    			<th>Meta(%)</br> Cirúrgico Sobre Vivo</th>
    			<th>Meta(%)</br> Cirúrgico Sobre Carcaça </th>
    			<th>Responsavel 5W</th>



</tr>
<?
         $sql99 = "SELECT  a.CD_MATERIAL MAT,a.DS_MATERIAL DESCRICAO,b.VL_CIRURGICO_META_VIVO META1,b.VL_CIRURGICO_META_CARCACA META2
         FROM
         ITEM_PRODUCAO_BI a,ABSORCAO_MP_BI b
                               WHERE a.id_mestre_rendimento='S'  AND
                               a.cd_material=b.cd_item and
                               a.CD_EMPRESA='$codigoempresa' and
	                           a.CD_VARIACAO='$variacao3' ";

         $res = mysql_db_query($banco,$sql99,$conexao);
         while ($valor=mysql_fetch_array($res)){
               $codigomate=$valor["MAT"];
               ?>

			       <tr>

					<td  align="left"><?echo $valor["MAT"];?></td>
				    <td  align="left"><?echo $valor["DESCRICAO"];?></td>
        			<td  align="left"><?echo $valor["META1"];?></td>
                    <td  align="left"><?echo $valor["META2"];?></td>

                    <?
                               $achadesmonte177 = "SELECT c.DESCRICAO DESCRICAO28 FROM
                               ITEM_PRODUCAO_BI a,ABSORCAO_MP_BI b,PESSOA_BI c,USUARIO_BI d
                               WHERE a.id_mestre_rendimento='S'  AND
                               a.cd_material=b.cd_item and
                               b.CD_USUARIO_RESPONSAVEL5W=d.cd_usuario and
                               d.cd_pessoa=c.codigo and
                               a.CD_EMPRESA='$codigoempresa' and
	                           a.CD_VARIACAO='$variacao3' and
                               a.cd_material='$codigomate' ";
                               $achadesmonte277  = mysql_db_query($banco,$achadesmonte177,$conexao);
                               $achadesmonte377 =mysql_fetch_array($achadesmonte277);
                               $mostrarespo=$achadesmonte377["DESCRICAO28"]

                    ?>

                    <td  align="left"><?echo $mostrarespo;?></td>


					</tr><?
					}

 ?>
 </table>





<?
}

if ($escolha=="novoregistro"){
?>
Atualizando  Meta do Estudo de Rendimento
<CENTER><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="350">

<tr>
                <th>Item</th>
				<th>Descrição</th>
    			<th>% Cirúrgico Vivo Meta</th>
    			<th>% Cirúrgico Carcaça Meta</th>




</tr>


<?
         $sql99 = "SELECT  CD_MATERIAL,DS_MATERIAL FROM  ITEM_PRODUCAO_BI
                               WHERE id_mestre_rendimento='S' and CD_EMPRESA='$codigoempresa' and
	                           CD_VARIACAO='$variacao3'";
         $res = mysql_db_query($banco,$sql99,$conexao);
         while ($valor=mysql_fetch_array($res)){

               ?>

			       <tr>

					<td  align="left"><?echo $valor["CD_MATERIAL"];?></td>
				    <td  align="left"><?echo $valor["DS_MATERIAL"];?></td>
        			<td  align="left"><input type="TXT" SIZE="3" name="participacao[]" value="0" ><input type="hidden" name="lista[]" value="<?echo $valor["CD_MATERIAL"];?>"></td>
                    <td  align="left"><input type="TXT" SIZE="3" name="participacao22[]" value="0" ></td>
                    <?
                    
                    ?>








					</tr><?
					}

 ?>
 </table>
  <input type="hidden" name="escolha" size="5" value="<?echo "GRAVA";?>" >
        <input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="banco" value="<?echo $banco;?>">





<input  type="submit"    VALUE="GRAVAR">


<?
}
if ($escolha=="GRAVA"){

$lista=$_POST['lista'];
$participacao=$_POST['participacao'];
$participacao22=$_POST['participacao22'];




		 $achacontador = "SELECT count(*) CONTADOR
         FROM
         ITEM_PRODUCAO_BI
                               WHERE id_mestre_rendimento='S' and CD_EMPRESA='$codigoempresa' and
	                           CD_VARIACAO='$variacao3' ";
         //echo "$sql </br>";
         $res = mysql_db_query($banco,$achacontador ,$conexao);
         $valor8=mysql_fetch_array($res);
         $ultimo=$valor8["CONTADOR"];



 for ($passa=0;$passa <=$ultimo;$passa++)
 {


     $participacao2=$participacao[$passa];
     $participacao3=$participacao22[$passa];
     $final=$lista[$passa];

	 $participacao2=str_replace(",",".", $participacao2);
	 $participacao3=str_replace(",",".", $participacao3);
	 

	      $acha = "update ABSORCAO_MP_BI SET VL_CIRURGICO_META_VIVO='$participacao2',VL_CIRURGICO_META_CARCACA='$participacao3' WHERE CD_ITEM='$final'";
     //echo "$acha </br>";
     $res = mysql_db_query($banco,$acha ,$conexao);




}//final do loop
echo "Final da Associação";



}//FIANL DA ESCOLHA

if ($escolha=="5W"){
?>

<table>
                     <tr>
					 <td>Deseja Gerar Ação 5W Automática</td>
					   <td><select style='font-size: 10px;color: blue;text-align:right;bold: Negrito'  name="desejaacao" >
	                   <option value="N">Não</option>
                       <option value="S">Sim</option>
                       </select></td>
                     </tr>
                     <tr>
					 <td>Quantidade de Dias Limite para Resolver Ação 5W</td>
                        <td><input type="txt" name="dias5w" value="29"></td>
                     </tr>
                     <tr>
					 <td>Quantidade de Não Conforme para Criar uma Ação 5W</td>
                        <td><input type="txt" name="quantdia" value="100"></td>
                     </tr>
</table>

<input type="hidden" name="escolha" size="5" value="<?echo "GRAVA5W";?>" >
        <input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="banco" value="<?echo $banco;?>">





<input  type="submit"    VALUE="GRAVAR">






<?
}

if ($escolha=="muda2"){
?>

<table>

                     <tr>
					 <td>Quantidade de Dias Limite para Resolver Ação 5W</td>
                        <td><input type="txt" name="dias5w" value="<?echo $quantidadedias;?>"></td>
                     </tr>

</table>

<input type="hidden" name="escolha" size="5" value="muda3" >
        <input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="banco" value="<?echo $banco;?>">





<input  type="submit"    VALUE="GRAVAR">






<?
}

if ($escolha=="muda4"){
?>

<table>

                     <tr>
					 <td>Quantidade de Não Conforme para Criar uma Ação 5W</td>
                        <td><input type="txt" name="quantdia" value="<? echo $quantidadediasacumulado;?>"></td>
                     </tr>

</table>

<input type="hidden" name="escolha" size="5" value="muda5" >
        <input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="banco" value="<?echo $banco;?>">





<input  type="submit"    VALUE="GRAVAR">






<?
}


if ($escolha=="muda5data"){
?>

<table>

                     <tr>
					 <td>Dta de fechamento da produção PCP</td>
                        <td><input type="txt" name="data" OnKeyUp="mascaraData(this);" maxlength="10"  /></td>
                     </tr>

</table>

<input type="hidden" name="escolha" size="5" value="muda5datafinal" >
        <input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="banco" value="<?echo $banco;?>">





<input  type="submit"    VALUE="GRAVAR">






<?
}
if ($escolha=="muda5datafinal"){

             $dia9=substr($data,0,2);
             $mes9=substr($data,3,2);
             $ano9=substr($data,6,4);




             $datafinal=$ano9."-".$mes9."-".$dia9;
             
             $acha = "update PARAMETRO_BI SET ULTIMA_DATA_FECHADA_PRODUCAO ='$datafinal' where CD_EMPRESA='$codigoempresa' ";
             echo "$acha </br>";
             $res = mysql_db_query($banco,$acha ,$conexao);

}

if ($escolha=="GRAVA5W"){

     $achacontador = "SELECT count(*) CONTADOR FROM  ITEM_PRODUCAO_BI   WHERE id_mestre_rendimento='S'
     and CD_EMPRESA='$codigoempresa' and CD_VARIACAO='$variacao3'  and cd_material in (select cd_item from ABSORCAO_MP_BI
     WHERE CD_USUARIO_RESPONSAVEL5W IS NULL)";
         //echo "$sql </br>";
         $res = mysql_db_query($banco,$achacontador ,$conexao);
         $valor8=mysql_fetch_array($res);
         $ultimo=$valor8["CONTADOR"];
      IF ($ultimo=="0"){
             $acha = "update PARAMETRO_BI SET QT_DIAS_LIMITE_5W='$dias5w',ID_GERA_ACAO5W_VIVO='$desejaacao',QT_ACUMULADA_OCOR5W='$quantdia'";
             //echo "$acha </br>";
             $res = mysql_db_query($banco,$acha ,$conexao);


             ECHO "</BR>Atualizado";
             
             
             
      }
      ELSE
      {
       ECHO "Existe a Necessidade de Definir Primeiro os Responsáveis por Item de Estudo";
      }
}

if ($escolha=="responsavel5W"){
?>

                    Responsável:<select   style='font-size: 10px;color: blue;text-align:right;bold: Negrito'  name="responsavel4">

					<?
					$stmt1 = "SELECT distinct b.cd_usuario CODIGO,a.descricao  DESCRICAO from PESSOA_BI a, USUARIO_BI b
                     WHERE b.cd_pessoa=a.codigo  ";
					$res = mysql_db_query($banco,$stmt1,$conexao);

                    while ($valor=mysql_fetch_array($res)) {
					 print "<option value=\"{$valor["CODIGO"]}\">{$valor["DESCRICAO"]}</option>";

					}


					 ?>
					 </select>

                   Item da Produção:<select   style='font-size: 10px;color: blue;text-align:right;bold: Negrito'  name="item4">

					<?


					    $stmt1 = "SELECT  CD_MATERIAL,DS_MATERIAL FROM  ITEM_PRODUCAO_BI
                               WHERE id_mestre_rendimento='S' and CD_EMPRESA='$codigoempresa' and
	                           CD_VARIACAO='$variacao3' ";
					   $res = mysql_db_query($banco,$stmt1,$conexao);

                    while ($valor=mysql_fetch_array($res)) {
					 print "<option value=\"{$valor["CD_MATERIAL"]}\">{$valor["DS_MATERIAL"]}</option>";

					}

					 ?>
					 </select>
					 
					 <input type="hidden" name="escolha" size="5" value="<?echo "GRAVA5WRESPONSA";?>" >
        <input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="banco" value="<?echo $banco;?>">





<input  type="submit"    VALUE="GRAVAR">





<?
}

if ($escolha=="GRAVA5WRESPONSA"){

     $acha = "update ABSORCAO_MP_BI SET CD_USUARIO_RESPONSAVEL5W='$responsavel4' WHERE CD_ITEM='$item4' and
     CD_EMPRESA='$codigoempresa' and CD_VARIACAO='$variacao3'
     ";
     //echo "$acha </br>";
     $res = mysql_db_query($banco,$acha ,$conexao);
     ECHO "</BR>Atualizado";
}



?>
 


 </form>

  




