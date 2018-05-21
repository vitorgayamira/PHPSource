<?
//session_start();
require("configuramysql.php");  
?> 
<head>
 <?

//$programapai=$_GET['programapai'];

		 if ($PROGRAMAPAI=="DIRAparametrogeral1.php"){;
		   $GRAVAHELP="ARMP";
		 }
           
		   
		   
		   $gravahelp2 = "UPDATE USUARIO_BI SET CD_PROGRAMA_HELP='$GRAVAHELP' WHERE CD_USUARIO='$codigousuario'";
           //echo "$gravahelp2";
		   $res = mysql_db_query($banco,$gravahelp2,$conexao);
		  
		  // $gravahelp = &$db->Execute($gravahelp2);       		 
?> 
</head>


<?
$pagina="1";
require("DIRAparametrogeral2.php");
?>

















