<? session_start();?>
<html>
 <head>


  <style type="text/css">#cssmenu ul {z-index:2;margin: 0; padding: 7px 6px 0; width: 800px; background: #8f8f8f 0 -110px; line-height: 80%; border-radius: 1em; font: normal .8em/1.5em Arial, Helvetica, sans-serif; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; -webkit-box-shadow: 0 1px 3px rgba(0,0,0, .4); -moz-box-shadow: 0 1px 3px rgba(0,0,0, .4);}
#cssmenu li {margin: 0 5px; padding: 0 0 8px; float: left; position: relative; list-style: none; color: black;}
#cssmenu a,
#cssmenu a:link {font-weight: bold; color: #e7e5e5; text-decoration: none; display: block; padding:  10px 20px; margin: 0; border-radius: 5px; -webkit-border-radius: 5px; -moz-border-radius: 5px;	 text-shadow: 0 1px 1px rgba(0,0,0, .3); }
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
</head>
 




<?


require("configuramysqlversa2.php");



$usu189NOME= "SELECT b.descricao NOME FROM usuario_bi a,pessoa_bi  b
where a.nm_usuario='$edusuario' and
a.cd_pessoa=b.codigo   ";

$res89NOME= mysql_db_query($banco,$usu189NOME,$conexao);
$valor879NOME=mysql_fetch_array($res89NOME);
$nomepessoa4=$valor879NOME["NOME"];

?>

<table border="0" width="800px">
<tr>


<td width="85%">
<div id='cssmenu'>





<ul>



  <?
  $sql = "SELECT DISTINCT a.DS_PASTA PASTA,a.CD_PASTA CODIGOPASTA,b.cd_grupo  CODIGOGRUPO
FROM pasta_menu_bi a,funcao_grupo_bi b, grupo_usuario_bi c,usuario_grupo_bi d,usuario_bi e
WHERE a.CD_PASTA=b.CD_PASTA AND b.CD_GRUPO=c.CODIGO AND c.codigo=d.CD_GRUPO AND
d.cd_usuario=e.cd_usuario and
e.nm_usuario='$edusuario' ";



$res = mysql_db_query($banco,$sql,$conexao);

while ($valor=mysql_fetch_array($res)) {
$pasta2=$valor["CODIGOPASTA"];
$grupo2=$valor["CODIGOGRUPO"];
$descricaopasta=$valor["PASTA"];
?>
<li><a href=""><font style='font-size: 12px;color: black;text-align:left;bold: Negrito' >
<? echo $descricaopasta;?></font></a>


            <ul>
            <?

            $sub = "SELECT DISTINCT a.DS_FUNCAO FUNCAO,a.CD_PROGRAMA PROGRAMA,b.CD_PASTA PASTA
            FROM funcao_bi a,funcao_grupo_bi b WHERE
            a.CD_FUNCAO=b.CD_FUNCAO
            AND b.CD_PASTA='$pasta2' AND
            b.CD_GRUPO='$grupo2'
            ";
            //echo "$sub";

            $res691 = mysql_db_query($banco,$sub,$conexao);

			while ($valor2=mysql_fetch_array($res691)) {

              $subdescricao=$valor2["FUNCAO"];

			  $programa1=$valor2["PROGRAMA"];

			     ?>


         <li><a href='<?echo "$programa1";?>?novologin=nao&navegando=sim'>
         <font style='font-size: 12px;color: black;face=arial;'>
         <? echo "$subdescricao";?></a></li>
         <?
            }//final das funcoes
          ?>

          </ul>

          </li>
          <?
            }//finaldas pastas

     ?>




</ul>
</div>
</td>

<td width="15%"></td>
</tr>

<tr>


<td width="85%" align=right>
<b><?
          $acha1 = "SELECT E.DESCRICAO NOMEEMPRESA
          FROM PESSOA_BI E
          WHERE
		  E.CODIGO in (select CD_EMPRESA from PARAMETRO_BI)
          ";

          $res = mysql_db_query($banco,$acha1,$conexao);
          $valor6=mysql_fetch_array($res);

          $nomeempresa88=$valor6["NOMEEMPRESA"];

echo "Empresa:$nomeempresa88 - ";
echo "Logado:$nomepessoa4";?></b>
 <? echo " - ";?>
 <a href="homologarcredenciaismaximiza.php?navegando=sim&desconecta=sim"
 style="text-decoration:none;color: black;"><b>Sair</b></a>
 
 <? echo " - ";?>


 <a href="indexnovomaximiza.php"
 style="text-decoration:none;color: black;"><b>Home</b></a>
 <? echo "  ";?>
  <b>-<?
   $achaprivilegiomudarbanco= "SELECT count(*) VALOR from usuario_bi  where id_muda_ambiente_banco='S' and
    nm_usuario='$edusuario'";

    $achaprivilegiomudarbanco2= mysql_db_query($banco,$achaprivilegiomudarbanco,$conexao);
    $achaprivilegiomudarbanco3=mysql_fetch_array($achaprivilegiomudarbanco2);
    $existeprivilegio2=$achaprivilegiomudarbanco3["VALOR"];

     if ($existeprivilegio2 >"0"){
    ?>
    <a href="homologarcredenciaismaximiza.php?navegando=sim&desconecta=sim&usuariomilenio=sim"
    style="text-decoration:none;color: black;"><?echo $labelbanco;?></a>
    <?
    }
    else
    {

    echo $labelbanco;
    }
    ?>
   </b>


</td>

<td width="15%"></td>

</tr>
</table>



</html>
