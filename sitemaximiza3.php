<?

$cortopo="#828282";
$corfundo="#4682B4";

require("configuramysql.php");
require("estilo2.css");
require("estilonavegacaofundomaximiza.css");
?>

<head>
<style>
a.menu9{
width: 350;
background-color: #1E90FF;
display:block;
padding-left:1px;
border-bottom:1px solid #e3eeff;
font-weight:bold;
color:white;
line-height:175%;
border:1;
 }

a.menu9:hover{
background-color: #e3eeff;
display:block;
padding-left:0;
font-weight:bold;
border-left:10px solid #e3eeff;
border-bottom:1px solid #e3eeff;
color:#006699;
 }

a{text-decoration:none}

</style>

<SCRIPT language=JavaScript>



function expand(pagina) {

for(x = 0; x < 50; x++) {

window.moveTo(screen.availWidth * -(x - 50) / 100, screen.availHeight * -(x - 50) / 100);

window.resizeTo(screen.availWidth * x / 50, screen.availHeight * x / 50);

}

window.moveTo(0,0);

window.resizeTo(screen.availWidth, screen.availHeight);
window.open(pagina);


}



</SCRIPT>


</head>

<form  method="post" action="sitemaximiza3.php">
<BODY>
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
$cliente=$_GET['cliente'];
$baseoracle=$_GET['baseoracle'];
$ambiente=$_GET['ambiente'];
$localbanco=$_GET['localbanco'];

}
if ($continuarmesmatela=="sim"){
$codigousuario=$_POST['codigousuario'];
$codigoempresa=$_POST['codigoempresa'];
$escolha=$_POST['escolha'];
$tela=$_POST['tela'];
$mes=$_POST['mes'];
$ano=$_POST['ano'];
$ano=$_POST['ano'];
$tipo=$_POST['tipo'];
$novo=$_POST['novo'];
$pagina=$_POST['pagina'];
$banco=$_POST['banco'];
$alterapasta=$_POST['alterapasta'];
$pastarecebe=$_POST['pastarecebe'];
$cliente=$_POST['cliente'];
$baseoracle=$_POST['baseoracle'];


}

if ($navegando=="sim"){

$codigousuario=$_GET['codigousuario'];
$codigoempresa=$_GET['codigoempresa'];
$banco=$_GET['banco'];
$titulorodape=$_GET['titulorodape'];
$escolha=$_GET['escolha'];
$pastarecebe=$_GET['pastarecebe'];
}




require("configuramysql.php");



 
 
//if ($escolha=="mudarconteudo"){
?>
<font style='font-size: 19px;color: white;text-align:left;bold: Negrito' >
<?


if (!IsSet($pastarecebe)){
$pastarecebe="11";
}



$sql = "UPDATE USUARIO_BI  SET CD_PASTA_MENU='$pastarecebe' WHERE CD_USUARIO='$codigousuario'";
$res7 = mysql_db_query($banco,$sql,$conexao);
       
$sql = "SELECT DISTINCT A.DS_PASTA PASTA,A.CD_PASTA CODIGOPASTA,A.CD_FIGURA FIGURA,
D.CD_PESSOA EMPRESA,C.CODIGO CODIGO
FROM PASTA_MENU_BI A,FUNCAO_GRUPO_BI B, GRUPO_USUARIO_BI C,USUARIO_GRUPO_BI D WHERE
A.CD_PASTA=B.CD_PASTA AND
B.CD_GRUPO=C.CODIGO AND
C.CODIGO=D.CD_GRUPO AND
D.CD_USUARIO='$codigousuario' AND
D.CD_PESSOA IN (SELECT CD_EMPRESA FROM USUARIO_BI WHERE CD_USUARIO='$codigousuario') and
A.CD_PASTA IN (select cd_pasta_menu from USUARIO_BI WHERE CD_USUARIO='$codigousuario')";

$res89 = mysql_db_query($banco,$sql,$conexao);
$valor879=mysql_fetch_array($res89);
$descricaoatual58=$valor879["PASTA"];

    ?>
<font style='font-size: 13px;color: WHITE;text-align:center;bold: Negrito' >Conteúdo: <? echo $descricaoatual58;?></font>
<font style='font-size: 10px;color: white;text-align:left;bold: Negrito' >
<?
echo "Banco:$banco - Local da Base de Dados:$localbanco</br>";?></font>

<?


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




		     //acha PROCESSO ESCOLHIDO
             $usu187 = "SELECT DS_PROCESSO PROCESSO FROM PROCESSO_BI
             WHERE NR_SEQUENCIA IN (SELECT CD_PROC_ALTERN_DESMONTE FROM USUARIO_BI where CD_USUARIO='$codigousuario')";
             //echo "$usu18";
			 $res87 = mysql_db_query($banco,$usu187,$conexao);
             $valor877=mysql_fetch_array($res87);
             $processomsotra=$valor877["PROCESSO"];

			 //acha VARIACAO PADRAO
             $usu18 = "SELECT DS_VARIACAO VARIACAO,CD_VARIACAO VARIACAO5 FROM VARIACAO_ANIMAL_BI WHERE CD_VARIACAO IN
             (SELECT CD_VARIACAO FROM USUARIO_BI where CD_USUARIO='$codigousuario')";
             //echo "$usu18";
			 $res8 = mysql_db_query($banco,$usu18,$conexao);
             $valor87=mysql_fetch_array($res8);
             $variacaomsotra=$valor87["VARIACAO"];
             $variacao3=$valor87["VARIACAO5"];

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

			 $usu18 = "SELECT CD_PROJETO CODIGO1,DS_PROJETO DESCRICAO FROM
NOVO_PROJETO_BI WHERE CD_PROJETO IN (SELECT CD_PROJETO FROM USUARIO_PROJETO_BI where CD_USUARIO='$codigousuario' and id_ativo='S')";

$res8 = mysql_db_query($banco,$usu18,$conexao);
$valor87=mysql_fetch_array($res8);
$descricaoatual=$valor87["DESCRICAO"];
             if ($banco=="montagem" or $banco=="MOVEIS" ){
             $descricaocurva="Não existe";
             $descricaolote=="Não existe";
             $valorpeso=="Não existe";
             $numerolote="Não existe";
             }
             else
             {
			
			 $usu185 = "SELECT a.vl_peso_medio PESO,a.ID_CURVA CURVA,b.DS_LOTE LOTE,b.nr_lote LOTE5 from CURVA_BI a,LOTE_BI b  where a.nr_lote=b.nr_lote AND
			 ID_CURVA IN (SELECT ID_CURVA FROM PARAMETRO_BI)";

             $res855 = mysql_db_query($banco,$usu185,$conexao);
             $valor8755=mysql_fetch_array($res855);
             $descricaocurva=$valor8755["CURVA"];
             $descricaolote=$valor8755["LOTE"];
             $valorpeso=$valor8755["PESO"];
             $numerolote=$valor8755["LOTE5"];
             }



$programa1="DIRAachapasta.php";
$programa2="?";
$programa3="programapai=";
$programa9="sitemaximiza3.php";

$programaconteudo=$programa9.$programa2.$programa3.$programa1."&pagina=1&escolha=mudarconteudo&codigousuario=".$codigousuario."&navegando=sim&codigoempresa=".$codigoempresa."&banco=".$banco."&cliente=".$cliente."&baseoracle=".$baseoracle;

$programarodape="PROJETOTI5.php?codigousuario=".$codigousuario."&navegando=sim&codigoempresa=".$codigoempresa."&banco=".$banco;

$programa1="DIRAachaprocesso.php";
$programaprocesso=$programa1."?pagina=1&titulorodape=".$titulorodape."&codigousuario=".$codigousuario."&navegando=sim&codigoempresa=".$codigoempresa."&banco=".$banco;


?>
</br></br></BR>
<?




$programamatriz="PROJETObi1.php?codigousuario=".$codigousuario."&navegando=sim&codigoempresa=".$codigoempresa."&banco=".$banco;


?>








<div id="mostra">



<?
$pasta=1;



$sql = "SELECT DISTINCT A.DS_PASTA PASTA,A.CD_PASTA CODIGOPASTA,A.CD_FIGURA FIGURA,
D.CD_PESSOA EMPRESA,C.CODIGO CODIGO
FROM PASTA_MENU_BI A,FUNCAO_GRUPO_BI B, GRUPO_USUARIO_BI C,USUARIO_GRUPO_BI D WHERE
A.CD_PASTA=B.CD_PASTA AND
B.CD_GRUPO=C.CODIGO AND
C.CODIGO=D.CD_GRUPO AND
D.CD_USUARIO='$codigousuario' AND
A.CD_PASTA in (select cd_pasta_menu from USUARIO_BI WHERE CD_USUARIO='$codigousuario') and
D.CD_PESSOA IN (SELECT CD_EMPRESA FROM USUARIO_BI WHERE CD_USUARIO='$codigousuario')";

$res = mysql_db_query($banco,$sql,$conexao);

while ($valor=mysql_fetch_array($res)) {
$pasta2=$valor["CODIGOPASTA"];
$grupo2=$valor["CODIGO"];

            $subpasta=1;
            $sub = "SELECT DISTINCT A.DS_FUNCAO FUNCAO,A.CD_PROGRAMA PROGRAMA,B.CD_PASTA PASTA FROM FUNCAO_BI A,FUNCAO_GRUPO_BI B WHERE
            A.CD_FUNCAO=B.CD_FUNCAO
            AND B.CD_PASTA='$pasta2' AND
            B.CD_GRUPO='$grupo2'
            ";

            $res691 = mysql_db_query($banco,$sub,$conexao);

			while ($valor2=mysql_fetch_array($res691)) {

              $subdescricao=$valor2["FUNCAO"];

			  $programa1=$valor2["PROGRAMA"];

			  $programa2="?";
              $programa3="programapai=";
			  $programa9="sitemaximiza3.php";
              //$programa4="&";
              //$programa5="codigoempresa=";
              //$programa6="codigousuario=";
              //$programa7=$codigousuario;
              //$programa8="&";
			  //$programa9="clientes=";
              //$programa10=$clientes;
              //$programa11="&";
              //$programa12="tipos=1";
              //$programa13="&";
              //$programa14="tipopagina=I";
              //$programa15="&";
			  //$programa16="escolhapagina=sim";
              //$programa17="&";

			   //$programapassa=$programa1.$programa2.$programa3.$programa1;


               $programapassa=$programa1."?pagina=1&titulorodape=".$titulorodape."&codigousuario=".$codigousuario."&navegando=sim&codigoempresa=".$codigoempresa."&banco=".$banco."&ambiente=".$ambiente."&baseoracle=".$baseoracle."&localbanco=".$localbanco;

			   //$programapassa=$programa9.$programa2.$programa3.$programa1."&pagina=1&titulorodape=".$titulorodape."&codigousuario=".$codigousuario."&navegando=sim&codigoempresa=".$codigoempresa."&banco=".$banco;

 		   ?>
 		   



            <a class="menu9"   href="#" onClick="window.open('<?echo $programapassa;?>','tela01','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resible=no,copyhistory=no,width=1200,height=660')">
            <? echo $subdescricao;?></a>


 			   <?
            }//final das funcoes
            }
 ?>




</div>
<div id="mostra55">
<? echo $racaomostra;?></br>
Usuário:<?echo $nome2; ?></br>
<a href="sitemaximiza3.php?codigousuario=<?echo $codigousuario;?>&codigoempresa=<?ECHO $codigoempresa;?>
&navegando=sim&banco=<?ECHO $banco;?>&escolha=1&pastarecebe=11&localbanco=<?ECHO $localbanco;?>">
<img width=150 height=160 BORDER=0 src="CADASTRO.GIF"></a><img width=150 height=160 BORDER=0 src="PLANEJAMENTO.GIF">
</div>
</BODY>
</form>
	  
	  
	  
	  
	  
	  
	 





