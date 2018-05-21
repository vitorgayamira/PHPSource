<?
$cortopo="#828282";
$corfundo="#4682B4";

require("configuramysql.php");
require("estilo2.css");
require("estilonavegacaofundomaximiza.css");


$cliente=$_POST['cliente'];
$baseoracle=$_POST['baseoracle'];
$localbanco=$_POST['localbanco'];

$abertura=$_POST['abertura'];



$banco=$_POST['banco'];
$ambiente=$_POST['ambiente'];



?>


<form  method="post" action="sitemaximiza2.php">

<BODY>

<?









$edusuario=$_POST['edusuario'];
$esenha=$_POST['esenha'];

 
if (!IsSet($abertura)){

?>
		<input type="hidden"  value="1" name="abertura">
        <input type="hidden"  value="<?echo $banco;?>" name="banco">
        <input type="hidden" name="cliente" value="<?echo $cliente;?>">
        <input type="hidden" name="ambiente" value="<?echo $ambiente;?>">
        <input type="hidden" name="baseoracle" value="<?echo $baseoracle;?>">
        <input type="hidden" name="localbanco" value="<?echo $localbanco;?>">

<h1 style='font-size: 10px;color:black;text-align:left;bold: Negrito text-decoration: none'>
Usuário:<input type="text" name="edusuario" size="10" maxlength="20">
		Senha:&nbsp&nbsp&nbsp<input class="input-text" type="password" name="esenha" size="10">
		<input type="submit"  value="Acessar" >



<?

}


if ($abertura =="1"){




      $sql = "select count(*) CONTADOR from USUARIO_BI where NM_USUARIO='$edusuario'";
      $res = mysql_db_query($banco,$sql,$conexao);

      $valor6=mysql_fetch_array($res);
      $valor=$valor6["CONTADOR"];
     

	   $sql = "select count(*) CONTADOR from USUARIO_BI where NM_USUARIO='$edusuario' and ID_MASTER='S'";
      $res = mysql_db_query($banco,$sql,$conexao);

      $valor7=mysql_fetch_array($res);
      $valor2=$valor7["CONTADOR"];
     


      
   $sql = "select count(*) CONTADOR from USUARIO_BI where NM_USUARIO='$edusuario' and CD_SENHA='$esenha'";
      $res = mysql_db_query($banco,$sql,$conexao);

      $valor7=mysql_fetch_array($res);
      $valor13=$valor7["CONTADOR"];
      
      

   
      




 if ($valor==0)//nao existe usuario//
 {?>
 </br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>
 </br></br></br></br></br></br></br></br></br></br>
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp
</br>
 <?
  //require("estiloapresentacao.css");
   echo "Favor solicitar Liberação de Acesso , se Desejar somente visualizar nosso projeto ";?>
  <a href="#" onClick="window.open('Folder Otimização Avícola.pdf','tela01','toolbar=no,location=no,directories=yes,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=600,height=250')">Click aqui</a> ou
  <a href="http://localhost/xampp/sitemilenioteste.php?cliente=<?echo $cliente;?>">Retornar</a>

 <?}
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
            $usu1 = "SELECT A.CD_USUARIO CD_USUARIO,B.DESCRICAO PESSOA2,B.CODIGO PESSOA1,A.CD_EMPRESA EMPRESA  FROM USUARIO_BI A,PESSOA_BI B WHERE A.NM_USUARIO='$edusuario' AND A.CD_SENHA='$esenha' AND A.CD_PESSOA=B.CODIGO";
            //echo "$usu1";
			$res = mysql_db_query($banco,$usu1,$conexao);

            $valor8=mysql_fetch_array($res);
               $codigoempresa=$valor8["PESSOA1"];
               $codigousuario=$valor8["CD_USUARIO"];
			   $codigoempresa=$valor8["EMPRESA"];
			   
			  
			   
              //session_register("codigousuario");
              //$_SESSION['codigousuario'] = $codigousuario;


              //session_register("codigoempresa");
             // session_register("cliente");
			  //session_register("codigoempresa");

              $navegando="nao";

			  require("sitemaximiza3.php");
         }//final do teste de senha    
 

}//final do teste se existe usuario





}//final abertura=1
?>
</BODY>

</form>
