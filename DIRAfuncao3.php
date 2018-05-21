<?
$cortopo="#828282";
$corfundo="#4682B4";

require("configuramysql.php");
require("estilo2.css");
require("estilonavegacaofundo.css");


$tipo=$_GET['tipo'];
$titulopai="Manutenção de Funções";


?>



<form action="DIRAfuncao3.php" method="POST">
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
$novo=$_GET['novo'];
$nova=$_GET['nova'];
$nova1=$_GET['nova1'];
$nova2=$_GET['nova2'];
$dbanovo=$_GET['dbanovo'];


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
$nova=$_POST['nova'];
$nova1=$_POST['nova1'];
$nova2=$_POST['nova2'];
$dbanovo=$_POST['dbanovo'];
$banco=$_POST['banco'];
$novogrupo=$_POST['novogrupo'];
$novapasta=$_POST['novapasta'];
$clienterecebe=$_POST['clienterecebe'];
$novafuncao=$_POST['novafuncao'];
}
?>

<div id="mostratitulo">
<font style='font-size: 19px;color: white;text-align:left;bold: Negrito' >Atualizando</font>
<font style='font-size: 9px;color: white;text-align:left;bold: Negrito' >Banco:<?echo "$banco";?></font></br>








<a href="DIRAfuncao3.php?escolha=1&navegando=sim&titulo=<?echo "Criando Novo Registro";?>&titulopai=<?echo $titulopai;?>&codigousuario=<?echo $codigousuario;?>&codigoempresa=<?echo $codigoempresa;?>&banco=<?echo $banco;?>"><img width=50 height=50 BORDER=1 src="novafuncao.GIF">
</a>

<a href="DIRAfuncao3.php?escolha=<?echo "associar";?>&navegando=sim&titulo=<?echo "Criando Novo Registro";?>&titulopai=<?echo $titulopai;?>&codigousuario=<?echo $codigousuario;?>&codigoempresa=<?echo $codigoempresa;?>&banco=<?echo $banco;?>"><img width=50 height=50 BORDER=1 src="associarfuncao.GIF">
</a>


</br></br>
</div>

</br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>



<?





//acha VARIACAO PADRAO
$usu18 = "SELECT CD_VARIACAO VARIACAO FROM VARIACAO_ANIMAL_BI WHERE CD_VARIACAO IN (SELECT CD_VARIACAO FROM USUARIO_BI where CD_USUARIO='$codigousuario')";

$res8 = mysql_db_query($banco,$usu18,$conexao);
$valor87=mysql_fetch_array($res8);
$variacao3=$valor87["VARIACAO"];



if (!IsSet($pagina)){
   $pagina="1";
}


///////////////////////////////////////////////inicio do rodape dinamico
 $programa="PROJETOTI2.php";
 $numeroregistropagina="18";
 $programa2="?";
 $programa3="programapai=";
 $programa9="DIRAentradasistema.php";
 $programa10="&titulorodape=";

 $programa=$programa9.$programa2.$programa3.$programa.$programa10.$titulorodape;

 $limiteacima=($numeroregistropagina*$pagina)-$numeroregistropagina;
 $limiteabaixo=$numeroregistropagina;
  


if (!IsSet($escolha) or ($escolha=="1")){ 




 if ($tipo=="GRAVA"){
                
	 $ultimo = "SELECT MAX(CD_FUNCAO) SEQUENCIA FROM FUNCAO_BI";
     $res7 = mysql_db_query($banco,$ultimo,$conexao);
     $totallinha35=mysql_fetch_array($res7);
     $sequencia=$totallinha35["SEQUENCIA"];

     IF ($sequencia >"0"){
       $sequencia=$sequencia+1;
	 }
	 ELSE
	 {
     $sequencia="1";
	 }


$grava = "INSERT INTO FUNCAO_BI (CD_FUNCAO,DS_FUNCAO,CD_PROGRAMA,ID_FUNCAO_DBA) values ('$sequencia','$nova','$novo','$dbanovo')";
 
//echo "$grava";
$res = mysql_db_query($banco,$grava,$conexao);



 }
 
 if ($tipo=="elimina"){
 
	
	for ($passa=$nova1;$passa <=$nova2;$passa++)
    {
			
   $sql = "DELETE FROM FUNCAO_GRUPO_BI WHERE CD_FUNCAO='$passa'"; 
   //echo "$sql </br>";
   $res = mysql_db_query($banco,$sql,$conexao);
 
   $sql = "DELETE FROM FUNCAO_BI WHERE CD_FUNCAO='$passa'"; 
   //echo "$sql </br>";
   $res = mysql_db_query($banco,$sql,$conexao);
    }
 }
 
 if ($tipo=="eliminapessoa"){


	for ($passa=$nova1;$passa <=$nova2;$passa++)
    {



   $sql = "DELETE FROM USUARIO_GRUPO_BI WHERE CD_USUARIO IN (SELECT CD_USUARIO FROM USUARIO_BI WHERE CD_PESSOA='$passa')";
   //echo "$sql </br>";
   $res = mysql_db_query($banco,$sql,$conexao);
   
   $sql = "DELETE FROM USUARIO_PROJETO_BI WHERE CD_USUARIO IN (SELECT CD_USUARIO FROM USUARIO_BI WHERE CD_PESSOA='$passa')";
   //echo "$sql </br>";
   $res = mysql_db_query($banco,$sql,$conexao);
   
   $sql = "DELETE FROM USUARIO_BI WHERE CD_PESSOA='$passa'";
   //echo "$sql </br>";
   $res = mysql_db_query($banco,$sql,$conexao);
   
   $sql = "DELETE FROM PESSOA_BI WHERE CODIGO='$passa'";
   //echo "$sql </br>";
   $res = mysql_db_query($banco,$sql,$conexao);


    }
 }

 if ($tipo=="associa"){
 $grava = "INSERT INTO FUNCAO_GRUPO_BI (CD_FUNCAO,CD_GRUPO,CD_PASTA,ID_SELECT,ID_ATUALIZAR,CD_EMPRESA) VALUES ('$novafuncao','$novogrupo','$novapasta','S','S','$clienterecebe')";
// echo "$grava </br>";
 $res = mysql_db_query($banco,$grava,$conexao);
 }
?>  


 Nova Função:<input type="txt" name="nova"  size="30" >
 Nome da Programa:<input type="txt" name="novo"  size="40" >
 Programa de DBA:<input type="txt" name="dbanovo"  size="5" VALUE="S" ></BR>

        <input type="hidden" name="tipo" value="GRAVA">
        <input type="hidden" name="escolha" value="1">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">
        <input type="hidden" name="banco" value="<?echo $banco;?>">
		
         </br></br>
         <input  type="submit"  VALUE="Gravar">

 
  


<? 
}//final da primeira tela

if ($escolha=="eliminaregistro"){
?>
        Função:<input type="txt" name="nova1"  size="5" > Até <input type="txt" name="nova2"  size="5" >
 
        <input type="hidden" name="tipo" value="elimina">
        <input type="hidden" name="escolha" value="1">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">
        <input type="hidden" name="banco" value="<?echo $banco;?>">
		

         <input  type="submit"  VALUE="GRAVAR">

<?
}

if ($escolha=="eliminaregistropessoa"){
?>
        Código Pessoa:<input type="txt" name="nova1"  size="5" > Até <input type="txt" name="nova2"  size="5" >

        <input type="hidden" name="tipo" value="eliminapessoa">
        <input type="hidden" name="escolha" value="1">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">
        <input type="hidden" name="banco" value="<?echo $banco;?>">


         <input  type="submit"  VALUE="GRAVAR">

<?
}
if ($escolha=="associar"){
?>
Grupo:<select   style='font-size: 10px;color: blue;text-align:right;bold: Negrito'  name="novogrupo">
					
					<?
					$stmt1 = "SELECT CODIGO,DESCRICAO FROM GRUPO_USUARIO_BI ";
					$res = mysql_db_query($banco,$stmt1,$conexao);

                    while ($valor=mysql_fetch_array($res)) { 
					 print "<option value=\"{$valor["CODIGO"]}\">{$valor["DESCRICAO"]}</option>";
					 
					} 
					
					
					 ?>
					 </select>   
    
                   Função:<select   style='font-size: 10px;color: blue;text-align:right;bold: Negrito'  name="novafuncao">
					
					<?
					 
					    
					    $stmt1 = "SELECT CD_FUNCAO,DS_FUNCAO FROM FUNCAO_BI ";
					   $res = mysql_db_query($banco,$stmt1,$conexao);

                    while ($valor=mysql_fetch_array($res)) { 
					 print "<option value=\"{$valor["CD_FUNCAO"]}\">{$valor["DS_FUNCAO"]}</option>";
					 
					} 
					 
					 ?>
					 </select>  
   Pasta:<select   style='font-size: 10px;color: blue;text-align:right;bold: Negrito'  name="novapasta">
					
					<?
					 
					$stmt1 = "SELECT CD_PASTA,DS_PASTA FROM  PASTA_MENU_BI";
					   $res = mysql_db_query($banco,$stmt1,$conexao);

                    while ($valor=mysql_fetch_array($res)) { 
					 print "<option value=\"{$valor["CD_PASTA"]}\">{$valor["DS_PASTA"]}</option>";
					 
					} 
					
					 
					 ?>
					 </select> 

   Cliente:<select    name="clienterecebe" style='font-size: 10px;color: blue;text-align:right;bold: Negrito'>
					<option value=""></option>
					
					<?
					 $stmt1 = "SELECT CODIGO,DESCRICAO from PESSOA_BI WHERE ID_TIPO_PESSOA=2";
					 $res98 = mysql_db_query($banco,$stmt1,$conexao);
                     
                     while ($res9=mysql_fetch_array($res98)){
                    		 
					 
					 print "<option value=\"{$res9["CODIGO"]}\">{$res9["DESCRICAO"]}</option>";
					   
					 }
					 ?>
					
					
					
					 </select></br>   
                     <input type="hidden" name="tipo" value="associa">
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

