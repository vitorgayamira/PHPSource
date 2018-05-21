<?
require("estilo2_sitenovo_maximiza.css");
// error_reporting(E_ALL);
ini_set('display_errors', '0');// NÃƒO HABILITAD

   $imagemtopoinicial="apresentacao6nova.jpg";

   

?>

<HEAD>
<style type="text/css">#cssmenu ul {z-index:2;margin: 0; padding: 7px 6px 0; width: 1300px; background: #8f8f8f 0 -110px; line-height: 80%; border-radius: 1em; font: normal .8em/1.5em verdana, verdana, verdana; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; -webkit-box-shadow: 0 1px 3px rgba(0,0,0, .4); -moz-box-shadow: 0 1px 3px rgba(0,0,0, .4);}
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
* html #cssmenu  ul {height: 1%;}

</style>

</HEAD>

<body>
<form name="homologarcredenciaismaximiza.php" method="POST" >

<?
$continuarmesmatela=$_POST['continuarmesmatela'];

if ($continuarmesmatela=="sim"){
$edusuario=$_POST['edusuario'];
$edsenha=$_POST['edsenha'];
$novaconexao=$_POST['novaconexao'];
$nomeempresaconexao=$_POST['nomeempresaconexao'];
}


if (!IsSet($novaconexao)){$novaconexao="nao";}

if (!IsSet($edusuario)){$edusuario="";}
if (!IsSet($edsenha)){$edsenha="";}
if (!IsSet($nomeempresaconexao)){$nomeempresaconexao="BRUNING";}



require("conexaoadodb_oracle.php");

$usu189NOMEco= "SELECT CODIGO FROM pessoa_bi
where descricao='$razaoempresa'  ";
//echo "$usu189NOMEco";

$result = $conn->Execute($usu189NOMEco);
while ( !$result->EOF) {

$codigoempresa=$result->fields["CODIGO"];
$result->MoveNext();
}




$edusuario=trim($edusuario);
$edsenha=trim($edsenha);

$sqlteste1 = "select count(*) CONTADOR from usuario_grupo_bi where cd_usuario in (select cd_usuario from usuario_bi where nm_usuario='$edusuario') and
cd_empresa='$codigoempresa' ";
$result = $conn->Execute($sqlteste1);
while ( !$result->EOF) {

$valor13teste=$result->fields["CONTADOR"];
$result->MoveNext();
}








$sql2teste = "select count(*) CONTADOR from usuario_bi where nm_usuario='$edusuario' and cd_senha='$edsenha'
and
cd_empresa='$codigoempresa' ";

$result = $conn->Execute($sql2teste);
while ( !$result->EOF) {

$valor14teste=$result->fields["CONTADOR"];
$result->MoveNext();
}





 $usu189NOME= "SELECT b.descricao NOME FROM usuario_bi a,pessoa_bi  b
where a.nm_usuario='$edusuario' and
a.cd_pessoa=b.codigo   ";
$result = $conn->Execute($usu189NOME);
while ( !$result->EOF) {

$nomepessoa4=$result->fields["NOME"];
$result->MoveNext();
}




$sql = "select count(*) CONTADOR from usuario_bi where nm_usuario='$edusuario'  ";
$result = $conn->Execute($sql);
while ( !$result->EOF) {

$valor13=$result->fields["CONTADOR"];
$result->MoveNext();
}






$sql2 = "select count(*) CONTADOR from usuario_bi where nm_usuario='$edusuario' and cd_senha='$edsenha'";
$result = $conn->Execute($sql2);
while ( !$result->EOF) {

$valor14=$result->fields["CONTADOR"];
$result->MoveNext();
}





if ($valor13=="1" and  $valor14=="1" and $novaconexao=="sim"){




                      

                     
 if ($edusuario=="vitor"){

 require("job.php");
 }
 else
 {


  
 require("homologarcredenciaismaximiza2.php");
 }




}
else
{
?>

<div  style="display: block;" id="mostraintranet">

      </br></br></br>
      <table  border="0" align="right">
        <tr>
         <td>Usuário</td>
         <td><input name="edusuario" type="text" class="myinputstyle" value="" size="38"  >

          <?
          $sql = "select count(*) CONTADOR from usuario_bi where nm_usuario='$edusuario' ";
          $result = $conn->Execute($sql);
          while ( !$result->EOF) {

           $valor135=$result->fields["CONTADOR"];
           $result->MoveNext();
          }

          


          if ($valor135 >="0"){?>
             <img src="iconepositivo_mi.jpg" >
          <?
          }
          ELSE
          {
             if(empty($edusuario))
             {
             }
             else
             {


             ?>
              <img class="myinputstyle" src="iconenegativo_mi.jpg" width="18" height="18"  >
             <?
             }
          }
          ?>
          </td>
         </tr>


          <tr>
          <td>Senha</td>
          <td><input name="edsenha" type="password" class="myinputstyle" value="" size="38"   maxlength="38" />

           <?



           $sql2 = "select count(*) CONTADOR from usuario_bi where  cd_senha='$edsenha'";

           $result = $conn->Execute($sql2);
          while ( !$result->EOF) {

           $valor145=$result->fields["CONTADOR"];
           $result->MoveNext();
          }





          if ($valor145=="1"){?>
             <img src="iconepositivo_mi.jpg" >
          <?
          }
          ELSE
          {
              if(empty($edsenha))
             {
             }
             else
             {


             ?>

              <img class="myinputstyle" src="iconenegativo_mi.jpg" width="18" height="18"  >
              <?
            }
          }
          ?>
          </td>

          </tr>
		  
		 <tr>
         <td>Empresa</td>
         <td><input name="nomeempresaconexao" type="text" class="myinputstyle" value="" size="38"  > </td>
         </tr>

          <tr>
          <td><input  type="submit"   VALUE="Avançar"></td>
          </tr>






        </table>

        <input type="hidden" name="continuarmesmatela" value="sim">
        <input type="hidden" name="navegando" value="nao">
        <input type="hidden" name="bdinicial" value="<? echo $bdinicial;?>">
        <input type="hidden" name="bancoinicial" value="<? echo $bancoinicial;?>">
        <input type="hidden" name="novaconexao" value="sim">



</div>

<?}?>


</form>
</body>


</html>


