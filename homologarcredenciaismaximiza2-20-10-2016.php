<head>

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

<style type="text/css">
    .nav, .nav ul{list-style:none;float:left;}
     .nav li{font-size:14px;position:relative;margin-bottom:-1px;}
     .nav li:hover a{background-color:#CDCDC1;}
     .nav li:hover li a{background-color:#CDCDC1;}
     .nav li:hover li a:hover{background-color:white;}
     .nav li a{display:block;padding:10px 0 10px 15px;height:20px;width:285px;border-bottom:1px solid #cccccc;color:black;text-decoration:none;}
     .nav li a:hover{background:#CDCDC1;}
     .nav li ul{position:absolute;left:-99999px; z-index:3;}
     .nav li:hover ul{padding:0;top:0;left:285px;}
</style>


</head>
<body>

<?
$navegando=$_GET['navegando'];
/*
$continuarmesmatela=$_POST['continuarmesmatela'];
$solucaoinicial=$_GET['solucaoinicial'];



if ($navegando=="sim"){

 $razaoempresa=$_GET['razaoempresa'];


}

if ($continuarmesmatela=="sim"){


 $razaoempresa=$_POST['razaoempresa'];

}*/


//$razaoempresa="Empresa MAKER";


//CHAMA O MENU PELA CONEXAO


$edusuario= preg_replace("/\s+/","_",$edusuario);
$edusuario=strtr($edusuario, "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ", "aaaaeeiooouucAAAAEEIOOOUUC");
//$edusuario=strtoupper($edusuario);//converte maiuscula
$edusuario= ltrim($edusuario);//tira espaco brancoapos e antes


$edsenha= preg_replace("/\s+/","_",$edsenha);
$edsenha=strtr($edsenha, "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ", "aaaaeeiooouucAAAAEEIOOOUUC");
//$edsenha=strtoupper($edsenha);//converte maiuscula
$edsenha= ltrim($edsenha);//tira espaco brancoapos e antes




require("conexaoadodb_oracle.php");



require("estilo2_sitenovo_maximiza.css");




$usu189NOMEco= "SELECT CODIGO FROM pessoa_bi
where descricao='$razaoempresa'  ";


$result = $conn->Execute($usu189NOMEco);
while ( !$result->EOF) {

$codigoempresa=$result->fields["CODIGO"];
$result->MoveNext();
}






$sqlteste1 = "select count(*) CONTADOR from usuario_grupo_bi where cd_usuario in (select cd_usuario from usuario_bi where nm_usuario='$edusuario') and
cd_empresa=$codigoempresa ";


$result = $conn->Execute($sqlteste1);

$erromostra=$conn->ErrorMsg();

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




if ($valor13teste >"0" and  $valor14teste >"0"){//testa se usuario é habilitado
require("areasuperior2.php");
require("carregamenumilenionovo2.php");
?>
<input type="hidden" name="continuarmesmatela" value="sim">



<?
                      
                     
                      
					 
                     $_SESSION['edusuario'] = $edusuario;
					 $_SESSION["edsenha"]=$edsenha;
                     $_SESSION["db"]=$db;
                     $_SESSION["bd"]=$bd;
                     $_SESSION["host"]=$host;
                     $_SESSION["user"]=$user;
                     $_SESSION["pass"]=$pass;
					 
					 $_SESSION["codigoempresa"]=$codigoempresa;
                     $_SESSION["razaoempresa"]=$razaoempresa;
					 $_SESSION["nomepessoa4"]=$nomepessoa4;
                     $_SESSION["magemtopoinicial"]=$magemtopoinicial;
					 $_SESSION['razaoempresa'] = $razaoempresa;
					 $_SESSION['nomeempresaconexao'] = $nomeempresaconexao;
					 
					 




}
else
{
 echo "USUÁRIO NAO HABILTADO PARA ACESSSAR ESTA EMPRESA";
}
?>


</body>




