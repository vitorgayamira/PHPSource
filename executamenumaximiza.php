<?session_start();
$cortopo="#828282";
$corfundo="#4682B4";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />

<style type="text/css">
   body{padding:20px; font-size:14px; color:#000000; font-family:Arial, Helvetica, sans-serif;}
   h2 {font-weight:bold; color:#000099; margin:10px 0px; }
   p span {color:#006600; font-weight:bold; }
   a, a:link, a:visited {color:#0000FF;}
   textarea {width: 100%; padding: 10px; margin: 10px 0 15px 0; font-size: 13px; font-family: Consolas,monospace;}
   textarea.html {height: 300px;}
   p {margin: 0 0 10px 0;}
   code, pre {font-family: Consolas,monospace; color: green;}
   ol li {margin: 0 0 15px 0;}

  body{
background: #FFFFFF; /* browsers sem suporte a css3 */
        background: -webkit-gradient(linear, left top, right top, from(#FFFFFF), to(<?echo $corfundo;?>));/* webkit browsers */
        background: -moz-linear-gradient(left, <?echo $corfundo;?>, #FFFFFF);/* firefox3.6+ */
        filter:progid:DXImageTransform.Microsoft.Gradient(GradientType=1, StartColorStr='<?echo $corfundo;?>', EndColorStr= white);/* IE */
        width:100%;
	     height:100%;
	     background: url(apresentacao6nova.jpg) no-repeat;

}




</style>

</head>


<body>
<form  method="post">
<?


$cliente=$_POST['cliente'];
$clientetitulo=$_POST['clientetitulo'];
$localbanco=$_POST['localbanco'];
$baseoracle=$_POST['baseoracle'];
$abertura=$_POST['abertura'];
$edusuario=$_POST['edusuario'];
$esenha=$_POST['esenha'];
$banco=$_POST['banco'];
$ambiente=$_POST['ambiente'];



require("configuramysql.php");




if (!IsSet($abertura) or ($aberura=="1")){

$cliente=$_GET['cliente'];
$localbanco=$_GET['localbanco'];
$ambiente=$_GET['ambiente'];



if ($cliente=="vit"){
$clientetitulo="Vit Solo Ltda";
?>
<input type="hidden"  value="vit" name="banco">

<?
}

if ($cliente=="vitsolo"){
$clientetitulo="Vit Solo ";
?>
<input type="hidden"  value="vitsolo" name="banco">


<?
}

if ($cliente=="malharia"){
$clientetitulo="Malharia Teste";
?>
<input type="hidden"  value="malharia" name="banco">


<?
}



if ($cliente=="maker"){
$clientetitulo="Maker Teste";
?>
<input type="hidden"  value="maker" name="banco">

<?
}

if ($cliente=="manupred"){
$clientetitulo="Base Manupred";
?>
<input type="hidden"  value="maker" name="banco">

<?
}


if ($cliente=="hering"){
$clientetitulo="Hering Textil";
?>
<input type="hidden"  value="hering" name="banco">


<?
}

if ($cliente=="predial"){
$clientetitulo="Predial Teste";
?>
<input type="hidden"  value="predial" name="banco">


<?
}

if ($cliente=="shopping"){
$clientetitulo="Grupo Almeida Junior";
?>
<input type="hidden"  value="shopping" name="banco">


<?
}

if ($cliente=="shoppingteste"){
$clientetitulo="Grupo Almeida Junior TESTE";
?>
<input type="hidden"  value="shopping" name="banco">


<?
}

if ($cliente=="mngranito"){
$clientetitulo="Mineradora";
?>
<input type="hidden"  value="malharia" name="banco">


<?
}

if ($cliente=="montenegro"){
$clientetitulo="Mineradora";
?>
<input type="hidden"  value="malharia" name="banco">


<?
}

if ($cliente=="kalmar"){
$clientetitulo="Empresa Kalmar";



?>
<input type="hidden"  value="KALMAR" name="banco">


<?
}

if ($cliente=="renaux"){
$clientetitulo="Empresa Renaux";



?>
<input type="hidden"  value="renaux" name="banco">


<?
}


?>




        Usuário:<input type="text" name="edusuario" size="50" maxlength="50">
		Senha:&nbsp&nbsp&nbsp<input class="input-text" type="password" name="esenha" size="10">

		<input type="hidden"  value="1" name="abertura">
        <input type="hidden" name="cliente" value="<?echo $cliente;?>">
        <input type="hidden" name="clientetitulo" value="<?echo $clientetitulo;?>">
        <input type="hidden" name="ambiente" value="<?echo $ambiente;?>">
        <input type="hidden" name="baseoracle" value="<?echo $baseoracle;?>">
        <input type="hidden" name="localbanco" value="<?echo $localbanco;?>">


		<input type="submit"  value="Acessar" >
<?
}
else
{





$edusuario=trim($edusuario);

$sql77= "select count(*) CONTADOR from usuario_bi where NM_USUARIO='$edusuario'";

$res77= mysql_db_query($banco,$sql77,$conexao);
$valor677=mysql_fetch_array($res77);
$valor=$valor677["CONTADOR"];

$sql = "select count(*) CONTADOR from USUARIO_BI where NM_USUARIO='$edusuario' and ID_MASTER='S'";
$res = mysql_db_query($banco,$sql,$conexao);
$valor7=mysql_fetch_array($res);
$valor2=$valor7["CONTADOR"];


                 $todayh = date('Y-m-d H:i:s');

                 $grava = "INSERT INTO LOG_BI (nm_usuario,DT_GERACAO)
                 values ('$edusuario','$todayh')";
                 //echo "$grava</BR>";
                 $res = mysql_db_query($banco,$grava,$conexao);




      $sql9= "select count(*) CONTADOR from USUARIO_BI where NM_USUARIO='$edusuario' and CD_SENHA='$esenha'";
      $res9 = mysql_db_query($banco,$sql9,$conexao);

      $valor79=mysql_fetch_array($res9);
      $valor13=$valor79["CONTADOR"];



if ($valor=="0")//nao existe usuario//
{

}
ELSE
{


if ($valor13==0)//nao bateu senha//
{
         	echo "Senha não confere";
            exit;
}
else
{




            //acha codigo do usuario
            $usu1 = "SELECT A.CD_USUARIO CD_USUARIO,B.DESCRICAO PESSOA2,B.CODIGO PESSOA1,A.CD_EMPRESA EMPRESA
            FROM USUARIO_BI A,PESSOA_BI B WHERE A.NM_USUARIO='$edusuario' AND A.CD_SENHA='$esenha' AND A.CD_PESSOA=B.CODIGO";

			$res = mysql_db_query($banco,$usu1,$conexao);

            $valor8=mysql_fetch_array($res);
               $codigoempresa=$valor8["PESSOA1"];
               $codigousuario=$valor8["CD_USUARIO"];
			   $codigoempresa=$valor8["EMPRESA"];
			   

               $_SESSION['usuario'] = $codigousuario;

			   //cenarios
             if ($banco=="montagem" or $banco=="MOVEIS" ){
             $racaomostra="Processo de Montagem";
             }
             else
             {
             //acha segmento PADRAO
             $usu18 = "SELECT DS_RACA RACA FROM RACA_BI ";
             $res8 = mysql_db_query($banco,$usu18,$conexao);
             $valor87=mysql_fetch_array($res8);
             $racaomostra=$valor87["RACA"];
             }


//carrega o menu
          $acha1 = "SELECT A.CODIGO CODIGOEMPRESA,A.DESCRICAO EMPRESA,B.DESCRICAO NOME,E.DESCRICAO NOMEEMPRESA,D.ID_MASTER MASTER
          FROM PESSOA_BI A,PESSOA_BI B,USUARIO_GRUPO_BI C,USUARIO_BI D,PESSOA_BI E
          WHERE C.CD_PESSOA=A.CODIGO AND
          C.CD_USUARIO=D.CD_USUARIO AND
          D.CD_PESSOA=B.CODIGO AND
          D.CD_USUARIO='$codigousuario' AND
		  D.CD_EMPRESA=E.CODIGO
          ";
          


          $res = mysql_db_query($banco,$acha1,$conexao);
          $valor6=mysql_fetch_array($res);
          $nome2=$valor6["NOME"];
          $master=$valor6["MASTER"];

		  $acha1 = "SELECT E.DESCRICAO NOMEEMPRESA
          FROM PESSOA_BI E
          WHERE
		  E.CODIGO in (select CD_EMPRESA from PARAMETRO_BI)
          ";

          $res = mysql_db_query($banco,$acha1,$conexao);
          $valor6=mysql_fetch_array($res);

          $nomeempresa88=$valor6["NOMEEMPRESA"];


?>

<center>
</br></br></br>


<font style='font-size: 13px;color: white;text-align:center;bold: Negrito' >
<?echo "Cliente Base:$clientetitulo - Banco:$banco  - Local da Base de Dados:$localbanco";?>     <a href="executamenumaximiza.php?cliente=<?echo $cliente;?>&localbanco=<? echo $localbanco;?>&nuvem&ambiente=mysql&abertura=<?echo $abertura;?>&navegando=sim"><font style='font-size: 9px;color: blue;text-align:center;bold: Negrito' >Nova Conexão</font></a>
</font></h2></center>


<style type="text/css">#cssmenu ul {margin: 4; padding: 7px 6px 0; width: 80%; background: #8f8f8f 0 -110px; line-height: 80%; border-radius: 1em; font: normal .8em/1.5em Arial, Helvetica, sans-serif; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; -webkit-box-shadow: 0 1px 3px rgba(0,0,0, .4); -moz-box-shadow: 0 1px 3px rgba(0,0,0, .4);}
#cssmenu li {margin: 0 5px; padding: 0 0 8px; float: left; position: relative; list-style: none; }
#cssmenu a,
#cssmenu a:link {font-weight: bold; color: #e7e5e5; text-decoration: none; display: block; padding:  8px 20px; margin: 0; border-radius: 5px; -webkit-border-radius: 5px; -moz-border-radius: 5px;	 text-shadow: 0 1px 1px rgba(0,0,0, .3); }
#cssmenu a:hover {background: #000; color: #fff;}
#cssmenu .active a,
#cssmenu li:hover > a {background: white url(menu_assets/images/overlay.png) repeat-x 0 -40px; color: #444; border-top: solid 1px #f8f8f8; -webkit-box-shadow: 0 1px 1px rgba(0,0,0, .2); -moz-box-shadow: 0 1px 1px rgba(0,0,0, .2); box-shadow: 0 1px 1px rgba(0,0,0, .2); text-shadow: 0 1px 0 rgba(255,255,255, 1); }
#cssmenu ul ul li:hover a,
#cssmenu li:hover li a {background: none; border: none; color: #666; -webkit-box-shadow: none; -moz-box-shadow: none;}
#cssmenu ul ul a:hover {background: #8f8f8f url(menu_assets/images/overlay.png) repeat-x 0 -100px !important; color: #fff !important; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; text-shadow: 0 1px 1px rgba(0,0,0, .1);}
#cssmenu li:hover > ul {display: block;}
#cssmenu ul ul {display: none; margin: 0; padding: 0; width: 185px; position: absolute; top: 40px; left: 0; background: #ddd url(menu_assets/images/overlay.png) repeat-x 0 0; border: solid 1px #b4b4b4; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; -webkit-box-shadow: 0 1px 3px rgba(0,0,0, .3); -moz-box-shadow: 0 1px 3px rgba(0,0,0, .3); box-shadow: 0 1px 3px rgba(0,0,0, .3);}
#cssmenu ul ul li {float: none; margin: 0; padding: 3px; }
#cssmenu ul ul a {font-weight: normal; text-shadow: 0 1px 0 #fff; }
#cssmenu ul:after {content: '.'; display: block; clear: both; visibility: hidden; line-height: 0; height: 0;}
* html #cssmenu  ul {height: 1%;}</style>



<div id='cssmenu'>
<ul>
  <?
  $sql = "SELECT DISTINCT A.DS_PASTA PASTA,A.CD_PASTA CODIGOPASTA
FROM PASTA_MENU_BI A,FUNCAO_GRUPO_BI B, GRUPO_USUARIO_BI C,USUARIO_GRUPO_BI D WHERE
A.CD_PASTA=B.CD_PASTA AND
B.CD_GRUPO=C.CODIGO AND
C.CODIGO=D.CD_GRUPO AND
D.CD_USUARIO='$codigousuario' ";



$res = mysql_db_query($banco,$sql,$conexao);

while ($valor=mysql_fetch_array($res)) {
$pasta2=$valor["CODIGOPASTA"];
$descricaopasta=$valor["PASTA"];
?>

<li class='has-sub '><a href='#'><span><? echo $descricaopasta;?></span></a>




            <ul>
            <?

            $sub = "SELECT DISTINCT A.DS_FUNCAO FUNCAO,A.CD_PROGRAMA PROGRAMA,B.CD_PASTA PASTA FROM FUNCAO_BI A,
            FUNCAO_GRUPO_BI B WHERE
            A.CD_FUNCAO=B.CD_FUNCAO
            AND B.CD_PASTA='$pasta2' AND
            B.CD_GRUPO in (select cd_grupo from USUARIO_GRUPO_BI  where cd_usuario='$codigousuario')
            ";
            //echo "$sub</br>";
            $res691 = mysql_db_query($banco,$sub,$conexao);

			while ($valor2=mysql_fetch_array($res691)) {

              $subdescricao=$valor2["FUNCAO"];

			  $programa1=$valor2["PROGRAMA"];

			  $programa2="?";
              $programa3="programapai=";
			  $programa9="DIRAentradasistemateste.php";
              $programapassa=$programa1."?pagina=1&titulorodape=".$titulorodape."&codigousuario=".$codigousuario."&navegando=sim&codigoempresa=".$codigoempresa."&banco=".$banco."&ambiente=".$ambiente."&baseoracle=".$baseoracle."&localbanco=".$localbanco;

			   //$programapassa=$programa9.$programa2.$programa3.$programa1."&pagina=1&titulorodape=".$titulorodape."&codigousuario=".$codigousuario."&navegando=sim&codigoempresa=".$codigoempresa."&banco=".$banco;

 		   ?>


         <li><a href='#'onClick="window.open('<?echo $programapassa;?>','tela01','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resible=no,copyhistory=no,width=1200,height=660')">
            <? echo $subdescricao;?></a></li>
         <?
            }//final das funcoes
          ?>
          </ul>

          <?
            }//finaldas pastas

     ?>
     </ul>

     </div>


<?
}//bateu a senha
}//existe usuario



}//segunda tela
?>
</form>
</body>
</br>
<h2>
<font style='font-size: 12px;color: black;text-align:center;bold: Negrito' >

<?

if ($racaomostra=="Sistema de Manutenção" ){
?>
<font style='font-size: 10px;color: white;text-align:center;bold: Negrito' >
Unidade de Negócio:<?echo $nomeempresa88;?>- Ambiente:<?echo $ambiente;?></br>
Usuario:<?echo $nome2;?></br>
<?
}
?>
</font>
</h2

</html>
