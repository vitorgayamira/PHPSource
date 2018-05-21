<? session_start();?>
<html>
<head>
<style  type="text/css">
#envolve { width: 1310px;}
 #div_1 { position: relative; width: 650px; height: 1200px; background-color: #CAE1FF; border:1;float: left; text-align: center; color: #E8E8E8;  }
 #div_2 { position: relative; width: 650px; height: 1200px; background-color: #CAE1FF; float: right; text-align: center; color: #E8E8E8;}
 #clear { clear:both; }



</style>

 <script language="javascript">


function Mascara_Hora2(Hora2){
var hora01 = '';
hora01 = hora01 + Hora2;
if (hora01.length == 2){
hora01 = hora01 + ':';
document.forms[0].Hora2.value = hora01;
}
if (hora01.length == 5){
Verifica_Hora2();
}
}

function Mascara_Hora(Hora){
var hora01 = '';
hora01 = hora01 + Hora;
if (hora01.length == 2){
hora01 = hora01 + ':';
document.forms[0].Hora.value = hora01;
}
if (hora01.length == 5){
Verifica_Hora();
}
}

function Verifica_Hora(){
hrs = (document.forms[0].Hora.value.substring(0,2));
min = (document.forms[0].Hora.value.substring(3,5));

estado = "";
if ((hrs < 00 ) || (hrs > 23) || ( min < 00) ||( min > 59)){
estado = "errada";
}

if (document.forms[0].Hora.value == "") {
estado = "errada";
}

if (estado == "errada") {
alert("Hora inválida!");
document.forms[0].Hora.focus();
}
}


function Verifica_Hora2(){
hrs = (document.forms[0].Hora.value.substring(0,2));
min = (document.forms[0].Hora.value.substring(3,5));

estado = "";
if ((hrs < 00 ) || (hrs > 23) || ( min < 00) ||( min > 59)){
estado = "errada";
}

if (document.forms[0].Hora2.value == "") {
estado = "errada";
}

if (estado == "errada") {
alert("Hora inválida!");
document.forms[0].Hora.focus();
}
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





</head>


<body>
<form action="basesnegocio.php"  name="teste"  method="POST" >
<?



$navegando=$_GET['navegando'];
$continuarmesmatela=$_POST['continuarmesmatela'];

if ($navegando=="sim"){


$codigoempresa=$_GET['codigoempresa'];
$escolha=$_GET['escolha'];
$tela=$_GET['tela'];
$mes=$_GET['mes'];
$ano=$_GET['ano'];
$projeto=$_GET['projeto'];
$processo=$_GET['processo'];
$subprocesso=$_GET['subprocesso'];


$projetonovo=$_GET['projetonovo'];
$etapacadastro=$_GET['etapacadastro'];
$buscarparametro=$_GET['buscarparametro'];
$atividadepassou=$_GET['atividadepassou'];

}



if ($continuarmesmatela=="sim"){


$codigoempresa=$_POST['codigoempresa'];
$escolha=$_POST['escolha'];
$tela=$_POST['tela'];
$mes=$_POST['mes'];
$ano=$_POST['ano'];

$tipo=$_POST['tipo'];
$novo=$_POST['novo'];
$dia=$_POST['dia'];
$dia1=$_POST['dia1'];

$processorecebe=$_POST['processorecebe'];
$projeto=$_POST['projeto'];
$projetonovo=$_POST['projetonovo'];
$buscarparametro=$_POST['buscarparametro'];
$quantidadedias=$_POST['quantidadedias'];
$decisaofazer=$_POST['decisaofazer'];
$empresaorigem=$_POST['empresaorigem'];
$empresadestino=$_POST['empresadestino'];
$enviaremail=$_POST['enviaremail'];
$codigoati=$_POST['codigoati'];
$hora266=$_POST['hora266'];
$hora66=$_POST['hora66'];
$horaparada=$_POST['horaparada'];

$data=$_POST['data'];
$novocodigoatividade=$_POST['novocodigoatividade'];
$portanova=$_POST['portanova'];
$empresanova=$_POST['empresanova'];
$serviconovo=$_POST['serviconovo'];
$tipobanco=$_POST['tipobanco'];
$bancoweb=$_POST['bancoweb'];

}




$edusuario= $_SESSION["edusuario"];
$edsenha= $_SESSION["edsenha"];
$banco=$_SESSION["banco"];

                     $username_https=$_SESSION["username_https"];
                     $password_https=$_SESSION["password_https"];
                     $hostname_https=$_SESSION["hostname_https"];




//CHAMA O MENU PELA CONEXAO
require("carregamenumaximiza.php");
require("estilo.css");



$today = date('d/m/y H:i:s');

require("configuramysqlversa2.php");

                      $achacodigousuario1 = "SELECT cd_usuario VALOR from usuario_bi where nm_usuario='$edusuario'";
                      $achacodigousuario2 = mysql_db_query($banco,$achacodigousuario1,$conexao);
                      $achacodigousuario3=mysql_fetch_array($achacodigousuario2);
                      $codigousuario=$achacodigousuario3["VALOR"];
                      






                      if (!IsSet($ano)){$ano=date('Y');}
                      

if ($escolha=="vaieditar"){


             $acha = "UPDATE  banco_bi SET DS_BANCO='$banconovo',
             DS_HOST_BANCO='$hostbanco',DS_PORTA_BANCO='$portanova',
             DS_SERVICE_NAME_BANCO_DADOS='$serviconovo',
             DS_USUARIO_BANCO_DADOS='$usuariobanco' ,
             DS_SENHA_BANCO_DADOS='$senhabanco' ,
             DS_SENHA_HTTPS='$senhahttp',
             DS_USER_HTTPS='$userhttp' ,
             DS_HOST_HTTPS='$hosthttp' ,
             CD_EMPRESA='$empresanova',
             ID_TIPO_BANCO_DADOS='$tipobanco',
             ds_banco_web='$bancoweb'
             WHERE NR_SEQUENCIA='$codigoati'";


			 $res7 = mysql_db_query($banco,$acha,$conexao);

			 


}



if ($escolha=="vaiincluir"){


if(empty($banconovo)   or empty($bancoweb)  or empty($empresanova) or empty($tipobanco) )
{


      $mensagemtela="Existem Campos Obrigatórios Não Preenchidos</br>";

}
else
{



             $sql99 = "SELECT MAX(NR_SEQUENCIA)+1 MAXIMA FROM BANCO_BI";
             $res = mysql_db_query($banco,$sql99,$conexao);
             $valor8=mysql_fetch_array($res);
             $sequencia=$valor8["MAXIMA"];
		     if ($sequencia >"0"){$sequenciagrava=$sequencia;}else{$sequenciagrava=1;}



					  $acha = "insert into  banco_bi(NR_SEQUENCIA,DS_BANCO,ds_banco_web,id_roda_nuvem,CD_EMPRESA) values
			          ('$sequenciagrava','$banconovo','$bancoweb','S','$empresanova')";

                      $res7 = mysql_db_query($banco,$acha,$conexao);
                      ECHO "$acha";
                      $mensagemtela="Gravado com Sucesso";



}//tudo ok para gravar
?>
<input type="hidden" name="escolha" value="nadafazer">
<?

}//final quando atualizar
////






$mensagemtela=$mensagemtela1." ".$mensagemtela2;
?>




<div  style="display: block;" id="mostratelaabertura">
<? echo $grava;?>

<table width="99%">

          <tr>
          <td><titulo><?echo "Bases de Negócios";?></titulo></td>

          </tr>


</table>
</br></br>
<table width="99%">
<tr>



          <td align=right>



          <a href="basesnegocio.php?atual=I&escolha=novoregistro&tela=2&mes=<?echo $mes;?>&ano=<?echo $ano;?>&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>&codigousuario=<?echo $codigousuario;?>&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&banco=<?echo $banco;?>&buscarparametro=cadastraordem&etapacadastro=1&projeto=<?echo $projeto;?>&processo=<?echo $processo;?>&subprocesso=<?echo $subprocesso;?>">
          <img src="incluirnovocva.png" width="42" height="38" ></a>

          <a href="carregamenumilenio.php">
          <img src="sairtela.png" width="42" height="38"></a>




          </td>

</tr>
</table>



<table  width="100%" ID="grid" >
<tr class="difa">
<td>Nr.Sequência</td>
<td>Descricao</br> Banco de Dados</td>
<td>Empresa</td>
<td></td>
<td></td>
</tr>

<?

//DEFINA PAGINACAO
             $chacontadorgeral="select count(*) CONTADOR FROM banco_bi ";
             $registros = "7";
             require("paginacao_mi.php");


            //FINAL PAGINACAO
            
            
            
$achaquantos19 = "SELECT  a.NR_SEQUENCIA ATIVI,a.DS_BANCO RESUMO,
i.descricao EMPRESAORIGEM
from banco_bi a, pessoa_bi i
WHERE
a.cd_empresa=i.codigo
limit $inicio,$registros";


$achaatividade2= mysql_db_query($banco,$achaquantos19,$conexao);
        while ($valor=mysql_fetch_array($achaatividade2)){


		$atividade4=$valor["ATIVI"];


        ?>
        <tr class="difr">
	    <td><?echo $atividade4;?></td>

		<td><?echo $valor["RESUMO"];?></td>
        <td><?echo $valor["EMPRESAORIGEM"];?></td>


		<td><a href="basesnegocio.php?etapacadastro=1&navegando=sim&novologin=nao&buscarparametro=edicao&inicio=<? echo $inicio;?>&registros=<? echo $registros;?>&atividadepassou=<? echo $atividade4;?>">
        <img src="editar2.png" width="19" height="25"></a></td>
	    <td><img src="lixeiranova2.png" width="23" height="25"></td>


</tr>

<?

}//final dAS ATIVIADDES
?>
</table>

<table width="99%">
 <tr class="dif">

 <td align=right>
    <corlabel>Página:<? echo "$pagina_atual";?>/<? echo "$paginas";?></corlabel></td>

    <td  align=right width="5%">
    <a href="basesnegocio.php?navegando=sim&buscarparametro=nao&pagina_atual=<?echo $proximapagina;?>">
    <img src="setadireita.png" width="20" height="14" ></a>
    <a href="basesnegocio.php?navegando=sim&buscarparametro=nao&pagina_atual=<?echo $anteriorpagina;?>">
    <img src="setaesquerda.png" width="20" height="14" ></a>
    </td>
 </tr>
 </table>

<?
 if(empty($mensagemtela))
{

}
else
{
?>

<table width="99%">

<hr>
 <tr class="dif">
 <td align=right>
 <?echo "$mensagemtela";?>
 </td>
 </tr>
 </table>
<?}


?>



</div>

<?
if ($buscarparametro=="cadastraordem")
{

if ($decisaofazer=="continuar")
{

 $etapacadastro="2";
}
else
{
 $etapacadastro="1";
}

?>

<div  style="display: block;" id="mostraoportunidade">

<?

if ($etapacadastro=="1")
{
?>
 </br>
 <table width="99%">

          <tr>
          <td><font style='font-size: 17px;color: black;text-align:Right;bold: Negrito' >
          <?echo "Cadastrando Banco de Dados Novo";?></td>

          </tr>
          </table>
          </br>


          <table width="99%">
                 <?
                    /*
                     $achael= "SELECT DS_PROJETO NOME FROM NOVO_PROJETO_BI where CD_PROJETO='$projetonovo'";
                     $achael2= mysql_db_query($banco,$achael,$conexao);
                     $achael3=mysql_fetch_array($achael2);
                     $projetonovomostra=$achael3["NOME"];
                     

					 $stmt199 = "SELECT CD_PROJETO,DS_PROJETO FROM NOVO_PROJETO_BI ";



                     $achael= "SELECT DS_PROCESSO NOME FROM PROCESSO_TI_BI where CD_PROCESSO='$processonovo'";
                     $achael2= mysql_db_query($banco,$achael,$conexao);
                     $achael3=mysql_fetch_array($achael2);
                     $processonovomostra=$achael3["NOME"];


					 $stmt199 = "SELECT distinct b.DS_PROCESSO PROCESSO1,b.CD_PROCESSO PROCESSO2
                     FROM projeto_processo_subprocesso  a,PROCESSO_TI_BI b
					 WHERE a.cd_processo=b.CD_processo AND
					 a.cd_projeto='$projetonovo'  ";
					 $res4 = mysql_db_query($banco,$stmt199,$conexao);




					 $stmt199 = "SELECT distinct c.cd_subprocesso CODIGO,c.ds_subprocesso SUBPROCESSO
                     FROM projeto_processo_subprocesso  a,PROCESSO_TI_BI b,subprocesso_ti_bi c,projeto_processo_subprocesso d
					 WHERE a.cd_processo=b.CD_processo AND
					 a.cd_projeto='$projetonovo' AND
                     a.cd_processo='$processonovo' and
                     a.cd_projeto=d.cd_projeto and
                     a.cd_processo=d.cd_processo and
                     d.cd_subprocesso=c.cd_subprocesso ";
                    */
                    ?>
                    

                     
                     
                     
                     <tr>
          <td>Nome do Banco:</td>
          <td><input type="txt"  name="banconovo" value="<?echo $descricao;?>" >
          </td>
          </tr>



          <tr>
          <td>Descricao Banco na Web:</td>
          <td><input type="txt"  name="bancoweb" value="<?echo $bancoweb;?>" >
          </td>
          </tr>

          <tr>
          <td>Empresa do Banco:</td>
          <td> <select   name="empresanova" >
                       <option value=""></option>
                  	  <?

					  $stmt1 = "SELECT DESCRICAO,CODIGO FROM pessoa_bi where id_tipo_pessoa='2' ";
					  $res = mysql_db_query($banco,$stmt1,$conexao);
                      while ($valor8=mysql_fetch_array($res)) {
					     print "<option value=\"{$valor8["CODIGO"]}\">{$valor8["DESCRICAO"]}</option>";
                  	  }
                     ?>

					 </select>
           </td>
           </tr>

           <tr>
          <td>Tipo do Banco de Dados:</td>
          <td> <select   name="tipobanco" >
                       <option value="MYSQL">Mysql</option>
                       <option value="ORACL">Oracle</option>
               </select>
           </td>
           </tr>

                     
                    
                    </table>


                    <input type="hidden" name="continuarmesmatela" value="sim">
                    <input type="hidden" name="buscarparametro" value="sim">
                    <input type="hidden" name="escolha" value="vaiincluir">
                   <input type="hidden" name="etapacadastro" value="1">
                    
           <table width="99%">
           <tr>
           <td  align=right>

           <input type="radio" name="decisaofazer" value="continuar"  onClick='this.form.submit()'>
            <font style='font-size: 13px;color: red;text-align:left;FONT-FAMILY: verdana;bold: Negrito' >
            Deseja Criar Nova Tarefa</font>
            
           <a href="PROJETObi2.php?navegando=sim&buscarparametro=nao">
           <img src="sairtela.png" width="42" height="38"></a>



           </td>
           </tr>
           </table>





<?}//fina etapa1


?>

</div>
<?

}//fial biscar parametro

if ($buscarparametro=="edicao")
{
?>
<div  style="display: block;" id="mostraeditarprojetos">


             <?
             $meshoje=date('m');
             $diahoje=date('d');
             $anohoje=date('Y');




             $achaatividade88= "SELECT a.NR_SEQUENCIA CODIGO,a.ID_RODA_NUVEM,a.DS_BANCO DESCRICAO,
          a.DS_HOST_BANCO DS_HOST_BANCO,
          a.DS_PORTA_BANCO DS_PORTA_BANCO,
          a.DS_SERVICE_NAME_BANCO_DADOS DS_SERVICE_NAME_BANCO_DADOS,
          a.DS_USUARIO_BANCO_DADOS DS_USUARIO_BANCO_DADOS,
          a.DS_SENHA_BANCO_DADOS DS_SENHA_BANCO_DADOS,
          a.DS_SENHA_HTTPS DS_SENHA_HTTPS,
          a.DS_USER_HTTPS DS_USER_HTTPS,
          a.DS_HOST_HTTPS DS_HOST_HTTPS,
          a.CD_EMPRESA,b.descricao NOMEEMPRESA,a.ds_banco_web BANCOWEB
          from banco_bi a,pessoa_bi b
          where a.cd_empresa=b.codigo and
          a.nr_sequencia='$atividadepassou' ";

             $achaatividade28= mysql_db_query($banco,$achaatividade88,$conexao);
             $valor5=mysql_fetch_array($achaatividade28);
                $codigoati=$valor5["CODIGO"];
                $descricao=$valor5["DESCRICAO"];
                $nuvem=$valor5["ID_RODA_NUVEM"];
                $hostbanco=$valor5["DS_HOST_BANCO"];
                $servico=$valor5["DS_SERVICE_NAME_BANCO_DADOS"];
                $usuariobanco=$valor5["DS_USUARIO_BANCO_DADOS"];
                $senhabanco=$valor5["DS_SENHA_BANCO_DADOS"];
                $userhttp=$valor5["DS_USER_HTTPS"];
                $senhahttp=$valor5["DS_SENHA_HTTPS"];
                $hosthttp=$valor5["DS_HOST_HTTPS"];
                $empresaproprietaria=$valor5["CD_EMPRESA"];
                $nomeempresaproprietaria=$valor5["NOMEEMPRESA"];
                $porta=$valor5["DS_PORTA_BANCO"];
                $bancoweb=$valor5["BANCOWEB"];

                


                
                
                
             ?>

  <table width="99%">

          <tr>
          <td>
          <titulo2><?echo "Editando Banco:";?> <?echo "$atividadepassou";?></br>
          <? echo "$nomeempresaproprietaria";?></titulo2>


          </td>

          </tr>
          </table>

          <hr>

          <table width="99%">

          <tr>
          <td>Nome do Banco:</td>
          <td><input type="txt"  name="banconovo" value="<?echo $descricao;?>" >
          </td>
          </tr>
          
          <tr>
          <td>Host do Banco:</td>
          <td><input type="txt"  name="hostbanco" value="<?echo $hostbanco;?>" >
          </td>
          </tr>
          
          <tr>
          <td>Usuário do Banco:</td>
          <td><input type="txt"  name="usuariobanco" value="<?echo $usuariobanco;?>" >
          </td>
          </tr>
          
          <tr>
          <td>Senha do Banco:</td>
          <td><input type="txt"  name="senhabanco" value="<?echo $senhabanco;?>" >
          </td>
          </tr>
          
          <tr>
          <td>Porta do Banco:</td>
          <td><input type="txt"  name="portanova" value="<?echo $porta;?>" >
          </td>
          </tr>
          
          <tr>
          <td>Nome do Serviço do Banco de Dados:</td>
          <td><input type="txt"  name="serviconovo" value="<?echo $servico;?>" >
          </td>
          </tr>


          <tr>
          <td>Host http:</td>
          <td><input type="txt"  name="hosthttp" value="<?echo $hosthttp;?>" >
          </td>
          </tr>
          
          <tr>
          <td>User http:</td>
          <td><input type="txt"  name="userhttp" value="<?echo $userhttp;?>" >
          </td>
          </tr>
          
          <tr>
          <td>Senha http:</td>
          <td><input type="txt"  name="senhahttp" value="<?echo $senhahttp;?>" >
          </td>
          </tr>
          
          <tr>
          <td>Descricao Banco na Web:</td>
          <td><input type="txt"  name="bancoweb" value="<?echo $bancoweb;?>" >
          </td>
          </tr>

          <tr>
          <td>Empresa do Banco:</td>
          <td> <select   name="empresanova" >
                       <option value=""></option>
                  	  <?

					  $stmt1 = "SELECT DESCRICAO,CODIGO FROM pessoa_bi where id_tipo_pessoa='2' ";
					  $res = mysql_db_query($banco,$stmt1,$conexao);
                      while ($valor8=mysql_fetch_array($res)) {
					     print "<option value=\"{$valor8["CODIGO"]}\">{$valor8["DESCRICAO"]}</option>";
                  	  }
                     ?>

					 </select>
           </td>
           </tr>
           
           <tr>
          <td>Tipo do Banco de Dados:</td>
          <td> <select   name="tipobanco" >
                       <option value="MYSQL">Mysql</option>
                       <option value="ORACL">Oracle</option>
               </select>
           </td>
           </tr>
           



          </table>
          
           <input type="hidden" name="escolha" value="vaieditar">
		   <input type="hidden" name="continuarmesmatela" value="sim">
           <input type="HIDDEN" name="buscarparametro" value="nada">

		   <input type="hidden" name="codigoati"  size="5" value="<?echo $codigoati;?>">

           <table width="99%">
           <tr>
           <td  align=right>
           <a href="#" onclick="document.forms[0].submit();return false;">
           <IMG src="salvarnovocva.png" width="42" height="38" ></a></a>

           <a href="basesnegocio.php?navegando=sim&buscarparametro=nao">
           <img src="sairtela.png" width="42" height="38"></a>



           </td>
           </tr>
           </table>




</div>


<?}//final editar

?>




</form>
</body>
</html>


