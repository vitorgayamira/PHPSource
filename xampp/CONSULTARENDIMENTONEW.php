 <?
//session_start();
require("configuramysql.php");
require("estilo2.css");
//require("estilonavegacaofundo.css");


?>

<style type="text/css">

<?//#FFFFFF branco-->sempre usar abaixo

$corfundo="#CAE1FF";
?>
body {background: #FFFFFF; /* browsers sem suporte a css3 */}

body {background: -webkit-gradient(linear, left top, right top, from(#FFFFFF), to(<?echo $corfundo;?>));/* webkit browsers */ }

body {background: -moz-linear-gradient(left, <?echo $corfundo;?>, #FFFFFF);/* firefox3.6+ */}

body { filter:progid:DXImageTransform.Microsoft.Gradient(GradientType=1, StartColorStr='<?echo $corfundo;?>', EndColorStr=' #FFFFFF');/* IE */

}
</style>


<form action="<? echo $programa;?>" method="POST">
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
$projeto=$_GET['projeto'];
$banco=$_GET['banco'];
$itemestudo=$_GET['itemestudo'];
$turnopesquisa=$_GET['turnopesquisa'];
$mostrarcortado=$_GET['mostrarcortado'];

}

if ($continuarmesmatela=="sim"){

$mes=$_POST['mes'];
$ano=$_POST['ano'];
$turnopesquisa=$_POST['turnopesquisa'];
$mostrarcortado=$_POST['mostrarcortado'];

}


     
$usu18a = "SELECT DS_CAMINHO_GRAFICO CAMINHO FROM PARAMETRO_BI";
$res8a = mysql_db_query($banco,$usu18a,$conexao);
$valor87a=mysql_fetch_array($res8a);
$caminho3=$valor87a["CAMINHO"];

                       $achaitem8825 = "SELECT descricao  VALOR from PESSOA_BI WHERE CODIGO IN (SELECT CD_PESSOA FROM
                       USUARIO_BI WHERE CD_USUARIO IN (SELECT DISTINCT CD_USUARIO  from
                       aux_dia_consulta_bi WHERE ID_ATUAL='S'))";
                       $achaitem88259 = mysql_db_query($banco,$achaitem8825,$conexao);
                       $achaitem882597=mysql_fetch_array($achaitem88259);
                       $nomeusuario=$achaitem882597["VALOR"];


 $usu18a = "SELECT DS_CAMINHO_GRAFICO CAMINHO FROM PARAMETRO_BI";
$res8a = mysql_db_query($banco,$usu18a,$conexao);
$valor87a=mysql_fetch_array($res8a);
$caminho3=$valor87a["CAMINHO"];



?>
 <style>
#primeira{
 border:0px solid black;
 background:#999999;
 font-weight:bold;
 font-size:18px; height:250px;
 height:290px;
 width:200px;
 margin-left:0px;
 margin-top:0px;
 float:left;


 }
 #segunda{
 border:0px solid black;
 background:white;
 font-weight:bold;
 font-size:18px; height:250px;
 height:490px;
 width:400px;
 margin-right:0px;
 float: right;

 }
 </style>




<?

if (!IsSet($ano)){
$ano=date('Y');
$mes=date('m');
$turnopesquisa="1";
$itemestudo="46";
}
if (!IsSet($mostrarcortado)){
$mostrarcortado="F";
}

?>
 <font style='font-size: 29px;color: white;text-align:center;bold: Negrito' >Consultando Rendimento </font></center><br>

 </br>

             Parametrizando</br>
             Ano<input style='font-size: 10px;color: blue;text-align:right;bold: Negrito'type="txt" name="ano"  size="5" value="<?echo $ano;?>">
             Mes<select style='font-size: 10px;color: blue;text-align:right;bold: Negrito'  name="mes" >
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
             Turno<select   style='font-size: 10px;color: blue;text-align:right;bold: Negrito'  name="turnopesquisa">
					<option value="1">Turno-1</option>
					<?
					 $stmt1 = "SELECT  CD_TURNO,DS_TURNO FROM  TURNO_BI ";
					 $res = mysql_db_query($banco,$stmt1,$conexao);
                     while ($stmt12=mysql_fetch_array($res)){



					 print "<option value=\"{$stmt12["CD_TURNO"]}\">{$stmt12["DS_TURNO"]}</option>";

					 }
					 ?>
					 </select>Visualizar Resultado
					 <select style='font-size: 10px;color: blue;text-align:right;bold: Negrito'  name="mostrarcortado" >
      	<option value="F">sobre o  Frango Vivo</option>
    <option value="C">Sobre a Carcaça</option>
    </select>


   <input type="hidden" name="escolha" value="verresultado">
   <input type="hidden" name="banco" value="<?echo $banco;?>">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">
		<input  type="submit"  VALUE="Avançar">



        <a href="#" onClick="window.open('CONSULTARENDIMENTO.php?itemestudo=<?echo $itemestudo;?>&navegando=sim&banco=<?echo $banco;?>&mes=<?echo $mes;?>&ano=<?echo $ano;?>&turnopesquisa=<?echo $turnopesquisa;?>&codigousuario=<?echo $codigousuario;?>&codigoempresa=<?echo $codigoempresa;?>&mostrarcortado=<?echo $mostrarcortado;?>','tela04','toolbar=no,location=no,directories=yes,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=900,height=550')">
                                         <img width=60 height=60 BORDER=1 src="impressora.jpg" alt="Imprimir Estudo"></a>
                    <a href="#" onClick="window.open('DETALHEDIA.php?itemestudo=<?echo $itemestudo;?>&navegando=sim&banco=<?echo $banco;?>&mes=<?echo $mes;?>&ano=<?echo $ano;?>&turnopesquisa=<?echo $turnopesquisa;?>&codigousuario=<?echo $codigousuario;?>&codigoempresa=<?echo $codigoempresa;?>&mostrarcortado=<?echo $mostrarcortado;?>','tela04','toolbar=no,location=no,directories=yes,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=900,height=550')">
                                         <img width=60 height=60 BORDER=1 src="rendidia.jpg" alt="Detalhar Estudo Dia"></a>
                     <a href="#" onClick="window.open('EVOLUCAORENDIMENTO.php?itemestudo=<?echo $itemestudo;?>&navegando=sim&banco=<?echo $banco;?>&mes=<?echo $mes;?>&ano=<?echo $ano;?>&turnopesquisa=<?echo $turnopesquisa;?>&codigousuario=<?echo $codigousuario;?>&codigoempresa=<?echo $codigoempresa;?>&mostrarcortado=<?echo $mostrarcortado;?>','tela04','toolbar=no,location=no,directories=yes,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=900,height=550')">
                                         <img width=60 height=60 BORDER=1 src="evolucao.jpg" alt="Evolução Rendimento"></a>


		

        <hr>



</br>
<?
$usu18aM = "SELECT DS_MATERIAL FROM ITEM_PRODUCAO_BI WHERE CD_MATERIAL='$itemestudo'";
$res8aM = mysql_db_query($banco,$usu18aM,$conexao);
$valor87aM=mysql_fetch_array($res8aM);
$descricaoitem=$valor87aM["DS_MATERIAL"];
?>
<font style='font-size: 20px;color: white;text-align:center;bold: Negrito' >
Item:<?echo $descricaoitem;?>| Ano Estudo:<?echo $ano;?>| Mes Estudo:<?echo $mes;?>|Turno:<?echo $turnopesquisa;?>
</br>
</font>

<center><table border=0 width=380><tr><td>
<map name="mapa1">
<area alt="coração" shape="CIRCLE" coords="55,248,9" href="CONSULTARENDIMENTONEW.php?itemestudo=18&navegando=sim&banco=<?echo $banco;?>&mes=<?echo $mes;?>&ano=<?echo $ano;?>&turnopesquisa=<?echo $turnopesquisa;?>&codigousuario=<?echo $codigousuario;?>&codigoempresa=<?echo $codigoempresa;?>&mostrarcortado=<?echo $mostrarcortado;?>" >
<area alt="Figado" shape="CIRCLE" coords="115,248,9" href="CONSULTARENDIMENTONEW.php?itemestudo=19&navegando=sim&banco=<?echo $banco;?>&mes=<?echo $mes;?>&ano=<?echo $ano;?>&turnopesquisa=<?echo $turnopesquisa;?>&codigousuario=<?echo $codigousuario;?>&codigoempresa=<?echo $codigoempresa;?>&mostrarcortado=<?echo $mostrarcortado;?>" >
<area alt="Moela" shape="CIRCLE" coords="180,248,9" href="CONSULTARENDIMENTONEW.php?itemestudo=21&navegando=sim&banco=<?echo $banco;?>&mes=<?echo $mes;?>&ano=<?echo $ano;?>&turnopesquisa=<?echo $turnopesquisa;?>&codigousuario=<?echo $codigousuario;?>&codigoempresa=<?echo $codigoempresa;?>&mostrarcortado=<?echo $mostrarcortado;?>" >
<area alt="Pes" shape="CIRCLE" coords="230,248,9" href="CONSULTARENDIMENTONEW.php?itemestudo=22&navegando=sim&banco=<?echo $banco;?>&mes=<?echo $mes;?>&ano=<?echo $ano;?>&turnopesquisa=<?echo $turnopesquisa;?>&codigousuario=<?echo $codigousuario;?>&codigoempresa=<?echo $codigoempresa;?>&mostrarcortado=<?echo $mostrarcortado;?>" >

<area alt="Asa" shape="CIRCLE" coords="343,25,31" href="CONSULTARENDIMENTONEW.php?itemestudo=46&navegando=sim&banco=<?echo $banco;?>&mes=<?echo $mes;?>&ano=<?echo $ano;?>&turnopesquisa=<?echo $turnopesquisa;?>&codigousuario=<?echo $codigousuario;?>&codigoempresa=<?echo $codigoempresa;?>&mostrarcortado=<?echo $mostrarcortado;?>">
<area alt="Peito s/osso s/pele c/sasami" shape="CIRCLE" coords="65,108,9" href="CONSULTARENDIMENTONEW.php?itemestudo=61&navegando=sim&banco=<?echo $banco;?>&mes=<?echo $mes;?>&ano=<?echo $ano;?>&turnopesquisa=<?echo $turnopesquisa;?>&codigousuario=<?echo $codigousuario;?>&codigoempresa=<?echo $codigoempresa;?>&mostrarcortado=<?echo $mostrarcortado;?>" >
<area alt="Pele do Peito" shape="CIRCLE" coords="18,108,9" href="CONSULTARENDIMENTONEW.php?itemestudo=68&navegando=sim&banco=<?echo $banco;?>&mes=<?echo $mes;?>&ano=<?echo $ano;?>&turnopesquisa=<?echo $turnopesquisa;?>&codigousuario=<?echo $codigousuario;?>&codigoempresa=<?echo $codigoempresa;?>&mostrarcortado=<?echo $mostrarcortado;?>" >


<area alt="Coxa" shape="CIRCLE" coords="343,140,31" href="CONSULTARENDIMENTONEW.php?itemestudo=2&navegando=sim&banco=<?echo $banco;?>&mes=<?echo $mes;?>&ano=<?echo $ano;?>&turnopesquisa=<?echo $turnopesquisa;?>&codigousuario=<?echo $codigousuario;?>&codigoempresa=<?echo $codigoempresa;?>&mostrarcortado=<?echo $mostrarcortado;?>">
</map>
<img src="frangografico.jpg" width="380" height="272"  border="0" usemap="#mapa1">
</table>
</br>
 

<?

if ($itemestudo>"0" and $mes>"0" and $ano >"0" and $turnopesquisa >"0"){



if ($mostrarcortado=="F"){$titulo="Estudo de  Rendimento com base no Cirurgico sobre o Frango Vivo";}
if ($mostrarcortado=="C"){$titulo="Estudo de  Rendimento com base no Cirurgico sobre Carcaca";}

?>




<font style='font-size: 10px;color: white;text-align:center;bold: Negrito' >
<img width=20 height=20 BORDER=1 src="legenda1.jpg">Cirúrgico Padrão(%)
<img width=20 height=20 BORDER=1 src="legenda2.jpg">Cirúrgico Real(%)
<img width=20 height=20 BORDER=1 src="legenda3.jpg">Cirúrgico Meta(%)
<img width=20 height=20 BORDER=1 src="legenda4.jpg">Média Diária(%)







<?

if ($mostrarcortado=="F"){$titulo="Estudo de  Rendimento com base no Cirurgico sobre o Frango Vivo";}
if ($mostrarcortado=="C"){$titulo="Estudo de  Rendimento com base no Cirurgico sobre Carcaca";}
?>


<center><img src="MOSTRAGRAFICOrendimentotela.php?banco=<?echo $banco;?>&turnopesquisa=<?echo $turnopesquisa;?>&ano=<?echo $ano;?>&mes=<?echo $mes;?>&caminho3=<?echo $caminho3;?>&itemestudo=<?echo $itemestudo;?>&codigousuario=<?echo $codigousuario;?>&mostrarcortado=<?ECHO $mostrarcortado;?>&titulo=<?ECHO $titulo;?>">

<?}?>




<?
//chama nos botoes superiores
 //require("evolucaoano1.php");
 //require("mostradia1.php");
?>


</form>

 






