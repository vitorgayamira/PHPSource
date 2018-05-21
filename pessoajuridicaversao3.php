<? session_start();?>
<html>
<head>
<script language= 'javascript'>

function Oculta(cxa){
if (document.getElementById(cxa).style.display=='none'){
document.getElementById(cxa).style.display='block';
}else{
document.getElementById(cxa).style.display='none';
}
}

function MascaraCNPJ(cnpj){
        if(mascaraInteiro(cnpj)==false){
                event.returnValue = false;
        }
        return formataCampo(cnpj, '00.000.000/0000-00', event);

}

function MascaraCep(cep){
                if(mascaraInteiro(cep)==false){
                event.returnValue = false;
        }
        return formataCampo(cep, '00.000-000', event);
}

//valida numero inteiro com mascara
function mascaraInteiro(){
        if (event.keyCode < 48 || event.keyCode > 57){
                event.returnValue = false;
                return false;
        }
        return true;
}


function ValidarCNPJ(ObjCnpj){
        var cnpj = ObjCnpj.value;
        var valida = new Array(6,5,4,3,2,9,8,7,6,5,4,3,2);
        var dig1= new Number;
        var dig2= new Number;

        exp = /\.|\-|\//g
        cnpj = cnpj.toString().replace( exp, "" );
        var digito = new Number(eval(cnpj.charAt(12)+cnpj.charAt(13)));

        for(i = 0; i<valida.length; i++){
                dig1 += (i>0? (cnpj.charAt(i-1)*valida[i]):0);
                dig2 += cnpj.charAt(i)*valida[i];
        }
        dig1 = (((dig1%11)<2)? 0:(11-(dig1%11)));
        dig2 = (((dig2%11)<2)? 0:(11-(dig2%11)));

        if(((dig1*10)+dig2) != digito){ alert('CNPJ Invalido!')
        document.teste.botao.disabled = true;}else{document.teste.botao.disabled = false;}






}

//formata de forma generica os campos
function formataCampo(campo, Mascara, evento) {
        var boleanoMascara;

        var Digitato = evento.keyCode;
        exp = /\-|\.|\/|\(|\)| /g
        campoSoNumeros = campo.value.toString().replace( exp, "" );

        var posicaoCampo = 0;
        var NovoValorCampo="";
        var TamanhoMascara = campoSoNumeros.length;;

        if (Digitato != 8) { // backspace
                for(i=0; i<= TamanhoMascara; i++) {
                        boleanoMascara  = ((Mascara.charAt(i) == "-") || (Mascara.charAt(i) == ".")
                                                                || (Mascara.charAt(i) == "/"))
                        boleanoMascara  = boleanoMascara || ((Mascara.charAt(i) == "(")
                                                                || (Mascara.charAt(i) == ")") || (Mascara.charAt(i) == " "))
                        if (boleanoMascara) {
                                NovoValorCampo += Mascara.charAt(i);
                                  TamanhoMascara++;
                        }else {
                                NovoValorCampo += campoSoNumeros.charAt(posicaoCampo);
                                posicaoCampo++;
                          }
                  }
                campo.value = NovoValorCampo;
                  return true;
        }else {
                return true;
        }
}

function ValidaCep(cep){
        exp = /\d{2}\.\d{3}\-\d{3}/
        if(!exp.test(cep.value))
                alert('Numero de Cep Invalido!');
}


function codename() {


document.teste.nome.disabled=false;

}

</script>


</head>

<body background="imagens/bg2_mi.png">

<form action="pessoajuridicaversao3.php"  name="teste"  method="POST" >


<?

$navegando=$_GET['navegando'];
$continuarmesmatela=$_POST['continuarmesmatela'];
$ordena=$_GET['ordena'];







if ($navegando=="sim"){
$novologin=$_GET['novologin'];
$status=$_GET['status'];
$nomegravapessoa=$_GET['nomegravapessoa'];
$codigoachou=$_GET['codigoachou'];
$buscarparametro=$_GET['buscarparametro'];
$acao=$_GET['acao'];
$simboloobrigatoriocpf=$_GET['simboloobrigatoriocpf'];
$nome=$_GET['nome'];
$simboloobrigatoriocidade=$_GET['simboloobrigatoriocidade'];
$simboloobrigatorioemail=$_GET['simboloobrigatorioemail'];
$acaoparametro=$_GET['acaoparametro'];

$cnpj=$_GET['cnpj'];
$iniciotela=$_GET['iniciotela'];
$statusnovapessoa=$_GET['statusnovapessoa'];
$acaoparametro=$_GET['acaoparametro'];
$cidadegrava=$_GET['cidadegrava'];
$nomebusca=$_GET['nomebusca'];
$tipopessoasop=$_GET['tipopessoasop'];
$achatipo=$_GET['achatipo'];




}

if ($continuarmesmatela=="sim"){


$novologin="nao";
$escolha=$_POST['escolha'];
$nome=$_POST['nome'];
$emailgrava=$_POST['emailgrava'];
$cnpj=$_POST['cnpj'];
$status=$_POST['status'];
$codigoachou=$_POST['codigoachou'];
$nomegravapessoa=$_POST['nomegravapessoa'];
$fone1=$_POST['fone1'];
$fone2=$_POST['fone2'];
$fone3=$_POST['fone3'];
$fone4=$_POST['fone4'];
$cep=$_POST['cep'];
$nomebusca=$_POST['nomebusca'];
$codigoachoufinal=$_POST['codigoachoufinal'];
$cidadegrava=$_POST['cidadegrava'];
$numerograva=$_POST['numerograva'];
$complemnetograva=$_POST['complemnetograva'];
$tipopessoasop=$_POST['tipopessoasop'];
$achatipo=$_POST['achatipo'];


if ($bairrogravacorreio==null){
$bairrograva=$_POST['bairrograva'];
}
else
{
 $bairrograva=$bairrogravacorreio;
}


if ($rua5gravacorreio==null){
$rua5grava=$_POST['rua5grava'];
}
else
{
 $rua5grava=$rua5gravacorreio;
}


$nome=$_POST['nome'];
$statusnovapessoa=$_POST['statusnovapessoa'];
$acaoparametro=$_POST['acaoparametro'];

$codigosadege=$_POST['codigosadege'];
$tipograva=$_POST['tipograva'];
$pessoaassociada=$_POST['pessoaassociada'];


}



$edusuario= $_SESSION["edusuario"];
$edsenha= $_SESSION["edsenha"];
$banco=$_SESSION["banco"];

                     $username_https=$_SESSION["username_https"];
                     $password_https=$_SESSION["password_https"];
                     $hostname_https=$_SESSION["hostname_https"];




//CHAMA O MENU PELA CONEXAO
require("carregamenumaximiza.php");
require("estilo2_sitenovo.css");



$today = date('d/m/y H:i:s');



require("configuramysqlversa2.php");
require("buscarcep.php");




if (!IsSet($status)){$status="cancelar";}



if ($status=="finalizarexclusao"){


 $deletausuario1= "delete from pessoa_bi where codigo='$codigoachou'";
 $resdeleta1 = mysql_db_query($banco,$deletausuario1,$conexao);

 $mensagemtela="</br>Final da AÁ„o ,Verifique Eliminado  com Sucesso devido os Relacionamento de Banco";

    $status="cancelar";
    $codigoachou=null;



} //finl da exclusao final


 if ($status=="novo"){
      $simboloobrigatorionome="sim";
      $simboloobrigatorioemail="sim";
      $simboloobrigatoriocidade="sim";
      $simboloobrigatoriofone3="sim";
      $simboloobrigatoriocep="sim";
 }

echo "Cidade: ".$cidadegrava;
if ($statusnovapessoa=="sim" and $status=="novo"){
//testa o  que ta em tela

$nome=strtr($nome, "·‡„‚ÈÍÌÛÙı˙¸Á¡¿√¬… Õ”‘’⁄‹«", "aaaaeeiooouucAAAAEEIOOOUUC");
	 $nome=strtoupper($nome);//converte maiuscula
     $emailgrava=strtolower($emailgrava);//converte minuscula



if(empty($nome)   or empty($cidadegrava) or empty($fone3) or empty($cep))
{
      $mensagemtela="Existem Campos ObrigatÛrios N„o Preenchidos</br>";
      $statusnovapessoa="nao";
      //$status="editar";

      $simboloobrigatorionome="sim";
      $simboloobrigatorioemail="sim";
      $simboloobrigatoriocidade="sim";
      $simboloobrigatoriofone3="sim";
      $simboloobrigatoriocep="sim";


}
else
{

         $achaemail7= "SELECT count(*) CONTADOR from pessoa_bi where
         descricao='$nome' ";
         $achaemail27= mysql_db_query($banco,$achaemail7,$conexao);
         $achaemail37=mysql_fetch_array($achaemail27);
         $existeemail=$achaemail37["CONTADOR"];

         if ($existeemail >"0")
         {
         $mensagemtela="Empresa j· Cadastrada ..";
         $status="editar";
         $statusnovapessoa="nao";

         }
         else
         {


         $ultimo = "SELECT MAX(codigo) SEQUENCIA FROM pessoa_bi";
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



         //transmite para os banco  , sejam eles mysql ou  oracle
              require("TRANSMITEPESSOAJURIDICA.php");
              //final da tramsissao


         $codigoachou=$sequencia;
         $status="editar";

         $statusnovapessoa="nao";

         }
}

}












if ($statusnovapessoa=="nao" and $status=="editar"){

 $nome=strtr($nome, "·‡„‚ÈÍÌÛÙı˙¸Á¡¿√¬… Õ”‘’⁄‹«", "aaaaeeiooouucAAAAEEIOOOUUC");
	 $nome=strtoupper($nome);//converte maiuscula
     $emailgrava=strtolower($emailgrava);//converte minuscula



if(empty($nome)   or empty($cidadegrava)  or empty($cep))
{
      $mensagemtela="Existem Campos ObrigatÛrios N„o Preenchidos</br>";
      $statusnovapessoa="nao";
      $status="novo";
      $simboloobrigatorionome="sim";
      $simboloobrigatorioemail="sim";
      $simboloobrigatoriocidade="sim";
      $simboloobrigatoriofone3="sim";
      $simboloobrigatoriocep="sim";


}
else
{
     $achapais= "SELECT COUNT(*) CONTADOR from pais_bi a,estado b,cidade c
     where c.cd_cidade='$cidadegrava' AND
     c.cd_estado=b.cd_estado and
     b.cd_pais=a.cd_pais and
     a.id_brasil='S'";
     $achapais2= mysql_db_query($banco,$achapais,$conexao);
     $achapais3=mysql_fetch_array($achapais2);
     $paisbrasil=$achapais3["CONTADOR"];



     if(empty($cnpj) and  $paisbrasil=="1")
     {
      $mensagemtela="… ObrigatÛrio definir CNPJ..";
      $statusnovapessoa="nao";
      $status="editar";
     }
     ELSE
     {










         $grava ="update  pessoa_bi set ds_email='$emailgrava',nr_cnpj='$cnpj',nm_logradouro='$rua5grava',
              ds_complemento='$complementograva',nm_bairro='$bairrograva',nr_cep='$cep',
       cd_CIDADE='$cidadegrava',descricao='$nome',PJ_TELEFONE1='$fone1',nr_endereco='$numerograva',
       CD_UNIDADE='$pessoaassociada',id_integrado='$tipograva',cd_pessoa_associada='$pessoaassociada'
       where codigo='$codigoachou' ";
       
       //ECHO "$grava</BR>";
       
       $ultimonome = "SELECT DESCRICAO  FROM pessoa_bi WHERE CODIGO='$pessoaassociada'";
         $res7nome = mysql_db_query($banco,$ultimonome,$conexao);
         $totallinha35nome=mysql_fetch_array($res7nome);
         $nomeempresaassociada5=$totallinha35nome["DESCRICAO"];
       

       //transmite para os banco  , sejam eles mysql ou  oracle
              require("TRANSMITEPESSOAJURIDICA9.php");
              //final da tramsissao

       $mensagemtela="AtualizaÁ„o com Sucesso";
       $res = mysql_db_query($banco,$grava,$conexao);


         $status="editar";
      }//teste d cidade




 $statusnovapessoa="nao";
}




}

//final do testw



?>


<div  style="display: block;" id="mostratelaabertura2juri">



<table width="99%" >

          <tr>
          <td><titulo><?echo "Cadastro de Pessoa JurÌdica";?></titulo></td>
          </td>


          </tr>


</table>
</br>
<table width="99%" >
<tr>
<td align=right>
    <?
if (!IsSet($status)  or $status=="cancelar"){
?>

<a href="pessoajuridicaversao3.php?navegando=sim&status=novo&statusnovapessoa=sim">
<img src="incluirnovocva.png" width="42" height="38" ></a>

<a href="pessoajuridicaversao3.php?navegando=sim&status=buscarparametro&statusnovapessoa=nao&acaoparametro=selecionar&iniciotela=sim">
<IMG src="pesquisarnovocva.png" width="42" height="38" ></a>


<a href="carregamenumaximiza.php">
          <img src="sairtela.png" width="42" height="38"></a>

<?}

if ($status=="novo" ){
?>

<a href="#" onclick="document.forms[0].submit();return false;">
<IMG src="salvarnovocva.png" width="42" height="38" ></a>

<input type="hidden" name="status" value="novo">
<input type="hidden" name="statusnovapessoa" value="sim">

<a href="pessoajuridicaversao3.php?navegando=sim&status=cancelar&statusnovapessoa=sim">
<img src="sairtela.png" width="42" height="38"></a>


<a href="pessoajuridicaversao3.php?navegando=sim&status=novo&statusnovapessoa=sim">
<img src="incluirnovocva.png" width="42" height="38" ></a>


<?}

if ($status=="editar" ){
?>

<a href="#" onclick="document.forms[0].submit();return false;">
<IMG src="salvarnovocva.png" width="42" height="38" ></a>

<input type="hidden" name="status" value="editar">

<input type="hidden" name="statusnovapessoa" value="nao">

<input type="hidden" name="codigoachou" value="<?echo $codigoachou;?>">



<input type="hidden" name="codigoachou" value="<?echo $codigoachou;?>">

<a href="pessoajuridicaversao3.php?navegando=sim&status=novo&statusnovapessoa=sim">
<img src="incluirnovocva.png" width="42" height="38" ></a>

<a href="pessoajuridicaversao3.php?navegando=sim&status=buscarparametro&acaoparametro=selecionar">
<IMG src="selecionarnovocva.png" width="42" height="38" ></a>

<a href="pessoajuridicaversao3.php?navegando=sim&status=buscarparametro&acaoparametro=eliminar&codigopessoaatual=<?echo $codigoachou;?>">
<IMG src="eliminarnovocva.png" width="42" height="38" ></a>


<a href="pessoajuridicaversao3.php?navegando=sim&status=cancelar">
<img src="sairtela.png" width="42" height="38"></a>

<?
}
?>



</td>
</tr>
</table>


<?
if (($iniciotela=="sim") or ($status=="cancelar"))
{
?>
<input type="hidden" name="iniciotela" value="nao">


   <?

   
    //DEFINA PAGINACAO
             $chacontadorgeral="select count(*) CONTADOR FROM pessoa_bi where id_tipo_pessoa='2'";
             $registros = "13";
             require("paginacao_mi.php");


            //FINAL PAGINACAO


$achasegmento1="SELECT a.codigo CODIGO,a.descricao NOME,b.ds_cidade CIDADE,a.ds_email EMAIL,a.nr_cnpj CNPJ
from pessoa_bi a, cidade b
            where a.cd_cidade=b.cd_cidade and
            a.id_tipo_pessoa='2'
            order by a.descricao asc
            limit $inicio,$registros
            ";


          ?>
          <table  width="100%" ID="grid" >
          <tr class="difa">
          <td><b>Raz„o Social</b></td>
          <td><b>Cnpj</b></td>
          <td><b>Cidade</b></td>
          <td><b>Email</b></td>
          <td><b>Telefone</br>Comercial</b></td>

          </tr>

          <?
      	  $achasegmento2= mysql_db_query($banco,$achasegmento1,$conexao);
          while ($achasegmento3=mysql_fetch_array($achasegmento2))
          {
           $nome8=$achasegmento3["NOME"];
           $nome81=$achasegmento3["CNPJ"];
           $nome82=$achasegmento3["CIDADE"];
           $nome83=$achasegmento3["EMAIL"];
           $nome84=$achasegmento3["TELEFONE"];
           $codigo84=$achasegmento3["CODIGO"];


          ?>

           <tr class="difr">
            <td><?echo $nome8;?></td>
            <td><?echo $nome81;?></td>
            <td><?echo $nome82;?></td>
            <td><?echo $nome83;?></td>
            <td><?echo $nome84;?></td>
            



           </tr>
          <?

          }
          ?>

          </table>

          <?
                    if(empty($mensagemtela))
                    {

                    }
                    else
                    {
                    ?>
                    <hr>

                    <table width="100%">
                    <tr>
                    <td align=right>
                     <?echo "$mensagemtela";?>
                    </td>
                    </tr>

                    </table>
                    <?}?>

                    <tr>

                    <table width="100%">
                    <td align=right>
                    P·gina:<? echo "$pagina_atual";?>/<? echo "$paginas";?>
                     <a href="pessoajuridicaversao3.php?navegando=sim&buscarparametro=nao&pagina_atual=<?echo $anteriorpagina;?>">
                     <img src="setaesquerda.png" width="20" height="14" ></a>
                    <a href="pessoajuridicaversao3.php?navegando=sim&buscarparametro=nao&pagina_atual=<?echo $proximapagina;?>">
                    <img src="setadireita.png" width="20" height="14" ></a>
                    </td>
                    </tr>
                    </table>
</div>

</div>

<?
}
else
{


if ( !IsSet($status) or ($status=="novo")  or ($status=="elimina")){


                 if ($simboloobrigatorionome=="sim" ){$corobrigatorio="red";}?>
                <?if ($simboloobrigatorioemail=="sim"){$corobrigatorio="red";}?>
                <?if ($simboloobrigatoriofone3=="sim"){$corobrigatorio="red";}?>


                <?if ($simboloobrigatoriocidade=="sim"){$corobrigatorio="red";}?>
                <?if ($simboloobrigatoriocep=="sim"){$corobrigatorio="red";}?>



                <div  style="display: block;" id="mostraresutadojuridica">
                <table width="100%" ID="alter">
                      <tr class="dif">
                      <td>Nome:</td>



                       <td>
                       <input type=text name="nome" size=36  style="border-color: <?echo $corobrigatorio;?>"
                       value="<? echo $nome;?>"  ></td>

                      </tr>
                      <tr>
                      <td>Email:</td>



                       <td>
                       <input type=text name="emailgrava" size=36 style="border-color: <?echo $corobrigatorio;?>"
                       value="<? echo $emailgrava;?>" >
                       </td>
                       </tr>


                      <td>Cnpj:</td>

                      <td><input type="text"  style="border-color: <?echo $corobrigatorio;?>" name="cnpj"
                      value="<?echo $cnpj;?>" onKeyPress="MascaraCNPJ(teste.cnpj);"
                      maxlength="18"  ></td>

                     </tr>

                     <tr>
                     <td>
                     Cep:
                     </td>
                     <td>
                     <input type="txt" name="cep"  size="9" value="<?echo $cep;?>" style="border-color: <?echo $corobrigatorio;?>"
                     onKeyPress="MascaraCep(teste.cep);"  onchange="this.form.submit()"  >
                     </td>
                     </tr>



                     <tr>
                     <td>Logradouro:</td>
                     <td><input type="txt" name="rua5grava"  value="<?echo $rua5grava;?>" size="35" style="background-color: #CDCDC1" disabled></td>
                      </tr>

                     <tr>
                     <td>
                     N˙mero:
                      </td>
                     <td>
                     <input type="txt" name="numerograva"  value="<?echo $numerograva;?>" size="5" ></td>
                     </tr>

                     <tr>
                     <td>Complemento:</td>
                     <td>
                     <input type="txt" name="complementograva" value="<?echo $complementograva;?>"  size="5"  ></td>

                     </tr>





                     <?
                     require("configuramysqlversa2.php");
                     
                       if(empty($cidadecorreio))//cidade correio nula
                       {
                       $usuachacida= "SELECT DS_CIDADE from cidade where cd_cidade='$cidadegrava'";
                       $usuachacida2= mysql_db_query($banco,$usuachacida,$conexao);
                       $usuachacida3=mysql_fetch_array($usuachacida2);
                       $descricaocidadegrava=$usuachacida3["DS_CIDADE"];

                       }
                       else
                       {

                       $usuachacida= "SELECT CD_CIDADE from cidade where ds_cidade='$cidadecorreio'";
                       $usuachacida2= mysql_db_query($banco,$usuachacida,$conexao);
                       $usuachacida3=mysql_fetch_array($usuachacida2);
                       $cidadegrava=$usuachacida3["CD_CIDADE"];
                       $descricaocidadegrava=$cidadecorreio;
                       }

                     ?>


                     <input type="hidden" name="cidadegrava"  value="<? echo $cidadegrava;?>" >

                     <tr>
                     <td>
                     Bairro:
                     </td>
                     <td><input type="txt" name="bairrograva"  size="35"  value="<?echo $bairrograva;?>"
                     style="background-color: #CDCDC1" disabled>
                     <?echo $descricaocidadegrava;?></td>
                     </tr>


                     <tr>
                     <td>
                     Telefone Comercial
                     </td>
                     <td><input type="txt" name="fone3"  size="25" value="<?echo $fone3;?>" style="border-color: <?echo $corobrigatorio;?>">


                     </td>
                     </tr>

                     <tr>
                     <td>
                     Codigo Sadege
                     </td>
                     <td><input type="txt" name="codigosadege"  size="25" style="border-color: <?echo $corobrigatorio;?>">


                     </td>
                     </tr>

                     <tr>
                     <td>
                     Tipo:
                     </td>
                     <?if ($simboloobrigatoriotipo=="sim"){ $corobrigatorio="red";}else{$corobrigatorio="white";}?>
                     <td>
                       <select    name="tipograva" style="border-color:red">
                       <option value=""></option>
                       <option value="F">Fornecedor</option>
                       <option value="C">CondÙmino</option>
                       <option value="L">Local</option>

                       </select>

                     </td>
                     </tr>
                     
                     <tr>
                     <td>Pessoa jurÌdica Associada</td>
                     <td><select    name="pessoaassociada" style='font-size: 10px;color: blue;text-align:right;bold: Negrito'>
					<option value=""></option>

					<?
					 $stmt1 = "SELECT CODIGO,DESCRICAO from pessoa_bi WHERE ID_TIPO_PESSOA=2 ORDER BY DESCRICAO ASC";
					 $res98 = mysql_db_query($banco,$stmt1,$conexao);

                     while ($res9=mysql_fetch_array($res98)){


					 print "<option value=\"{$res9["CODIGO"]}\">{$res9["DESCRICAO"]}</option>";

					 }
					 ?>



					 </select>


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
                    <hr>

                    <table width="100%">
                    <tr>
                    <td align=right>
                     <?echo "$mensagemtela";?>
                    </td>
                    </tr>
                    </table>
                    <?}?>
                    </div>


                    <input type="hidden" name="continuarmesmatela" value="sim">
		            <input type="hidden" name="novologin" value="nao">








<?
}//final doaincluir ou cancelar



echo "Codigo achou:".$codigoachou;
if (($status=="editar") or ($statusnovapessoa=="selecionar")){

                //if ($acaoparametro=="selecionar")
                //{

                 $sqlacharita58v="select CODIGO , DESCRICAO,DS_EMAIL,NR_CNPJ,nm_logradouro PJ_RUA,
                 nm_bairro ID_BAIRRO,nr_cep ID_CEP,nr_endereco NUMERO,DS_COMPLEMENTO PJ_COMP,CD_CIDADE PJ_CIDADE,
                 PJ_TELEFONE1 FONE1 ,cd_unidade ASSOCIADA,ID_INTEGRADO,cd_pessoa_associada ASSOCIADA2
                                  FROM pessoa_bi  where
                 codigo='$codigoachou' ";



                 $sqlacharita58v2= mysql_db_query($banco,$sqlacharita58v,$conexao);
                 $valor4=mysql_fetch_array($sqlacharita58v2);
                 $nome=$valor4["DESCRICAO"];
                 $codigoachou=$valor4["CODIGO"];
                 $emailgrava=$valor4["DS_EMAIL"];
                 $cnpj=$valor4["NR_CNPJ"];
                 $rua5grava=$valor4["PJ_RUA"];
                 $bairrograva=$valor4["ID_BAIRRO"];
                 $cep=$valor4["ID_CEP"];
                 $numerograva=$valor4["NUMERO"];
                 $complementograva=$valor4["PJ_COMP"];
                 $cidadegrava=$valor4["PJ_CIDADE"];
                 $fone1=$valor4["FONE1"];
                 $codigof4=$valor4["ASSOCIADA"];
                 $integrado=$valor4["ID_INTEGRADO"];
                 
                 $codigof5=$valor4["ASSOCIADA2"];


                //}




                if ($simboloobrigatorionome=="sim" ){$corobrigatorio="red";}?>
                <?if ($simboloobrigatorioemail=="sim"){$corobrigatorio="red";}?>
                <?if ($simboloobrigatoriofone3=="sim"){$corobrigatorio="red";}?>


                <?if ($simboloobrigatoriocidade=="sim"){$corobrigatorio="red";}?>


                <div  style="display: block;" id="mostraresutadojuridica">
                <table width="100%" ID="alter">
                      <tr class="dif">

                      <td>Nome:</td>
                       <td><input type=text name="nome" size=36 value="<?echo $nome;?>" style="border-color: <?echo $corobrigatorio;?>"
                           ></td>

                      </tr>



                     <tr class="dif">
                      <td>Email:</td>
                       <td>
                       <input type=text name="emailgrava" size=36   value="<?echo $emailgrava;?>"
                       style="border-color: <?echo $corobrigatorio;?>"></td>
                     </tr>


                     <tr class="dif">
                      <td>Cnpj:</td>


                      <td><input type="text"   name="cnpj" style="border-color: <?echo $corobrigatorio;?>"
                      value="<?echo $cnpj;?>" onKeyPress="MascaraCNPJ(teste.cnpj);"
                      maxlength="18"  ></td>

                     </tr>

                      <tr class="dif">
                     <td>Cep:</td>
                     <td><input type="txt" name="cep"  size="9"  value="<?echo $cep;?>"
                     onKeyPress="MascaraCep(teste.cep);"  ><a href="#" onclick="document.forms[0].submit();return false;">
          Validar</a>
                     </td>
                     </tr>



                     <tr class="dif">
                     <td>Logradouro:</td>
                     <td>
                     <input type="txt" name="rua5grava"  value="<?echo $rua5grava;?>" size="35" style="background-color: #CDCDC1" disabled >
                     </td>
                     </tr>

                     <tr class="dif">
                     <td>Numero:</td>
                     <td><input type="txt" name="numerograva"  size="5"  value="<?echo $numerograva;?>">
                     </td>
                     </tr>

                     <tr class="dif">
                     <td>Complemento:</td>
                     <td><input type="txt" name="complementograva"  size="5"  value="<?echo $complementograva;?>" >
                     </td>
                     </tr>





                      <?
                       require("configuramysqlversa2.php");

                       if(empty($cidadecorreio))//cidade correio nula
                       {
                       $usuachacida= "SELECT DS_CIDADE from cidade where cd_cidade='$cidadegrava'";
                       $usuachacida2= mysql_db_query($banco,$usuachacida,$conexao);
                       $usuachacida3=mysql_fetch_array($usuachacida2);
                       $descricaocidadegrava=$usuachacida3["DS_CIDADE"];

                       }
                       else
                       {

                       $usuachacida= "SELECT CD_CIDADE from cidade where ds_cidade='$cidadecorreio'";

                       $usuachacida2= mysql_db_query($banco,$usuachacida,$conexao);
                       $usuachacida3=mysql_fetch_array($usuachacida2);
                       $cidadegrava=$usuachacida3["CD_CIDADE"];
                       $descricaocidadegrava=$cidadecorreio;
                       }

                     ?>

                      <input type="hidden" name="cidadegrava"  value="<? echo $cidadegrava;?>" >

                      <tr class="dif">
                     <td>
                     Bairro:
                     </td>
                     <td><input type="txt" name="bairrograva"  size="35"  value="<?echo $bairrograva;?>"
                     style="background-color: #CDCDC1" disabled>
                     <?echo $descricaocidadegrava;?></td>
                     </tr>




                     <tr class="dif">
                     <td>
                     Telefone Comercial
                     </td>
                     <td><input type="txt" name="fone1"  size="25"  value="<?echo $fone1;?>">

                     </td>
                     </tr>
                     
                     
                     <?

                       $usuachacidape= "SELECT CODIGO,DESCRICAO FROM pessoa_bi where codigo='$codigof5'";
                       $usuachacida2pe= mysql_db_query($banco,$usuachacidape,$conexao);
                       $usuachacida3pe=mysql_fetch_array($usuachacida2pe);
                       $pessoa66=$usuachacida3pe["CODIGO"];
                       $descricao66=$usuachacida3pe["DESCRICAO"];

                     ?>
                     </font>

                     <td>Pessoa jurÌdica Associada</td>
                     <td><select    name="pessoaassociada" style='font-size: 10px;color: blue;text-align:right;bold: Negrito'>
                     <option value="<?echo $pessoa66;?>"><?echo $descricao66;?></option>
                     <option value=""></option>

					<?
					 $stmt1 = "SELECT CODIGO,DESCRICAO from pessoa_bi WHERE ID_TIPO_PESSOA=2 ORDER BY DESCRICAO ASC";
					 $res98 = mysql_db_query($banco,$stmt1,$conexao);

                     while ($res9=mysql_fetch_array($res98)){


					 print "<option value=\"{$res9["CODIGO"]}\">{$res9["DESCRICAO"]}</option>";

					 }
					 ?>



					 </select>

                     </td>
					 </tr>
					 
					 
					 <tr>
                     <td>
                     Tipo:
                     </td>
                     <?

                     
                       if ($integrado=="C"){
                       $mostra44="C";
                       $mostra44des="CondÙminos";
                       }
                       if ($integrado=="L"){
                       $mostra44="L";
                       $mostra44des="Local";
                       }
                       if ($integrado=="F"){
                       $mostra44="F";
                       $mostra44des="Fornecedor";
                       }
                       





                     if ($simboloobrigatoriotipo=="sim"){ $corobrigatorio="red";}else{$corobrigatorio="white";}?>
                     <td>
                       <select    name="tipograva" style="border-color:red">
                       <option value="<?echo $mostra44;?>"><?echo $mostra44des;?></option>
                       <option value=""></option>
                       <option value="F">Fornecedor</option>
                       <option value="C">CondÙmino</option>
                       <option value="L">Local</option>

                       </select>

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
                    <hr>

                    <table width="100%">
                    <tr>
                    <td align=right>
                     <?echo "$mensagemtela";?>
                    </td>
                    </tr>
                    </table>
                    <?}?>
                    </div>



                    <input type="hidden" name="continuarmesmatela" value="sim">
		            <input type="hidden" name="novologin" value="nao">
                    <input type="hidden" name="codigoachou" value="<?echo $codigoachou;?>">


<?
}//final editar


}//final quando nao e inicio de tela



if ($status=="buscarparametro" ){

if ($acaoparametro=="selecionar")
{

?>



<div  style="display: block;" id="mostrapessoajuridica">

          <table width="99%" >

          <tr>
          <td><titulo><?echo "SeleÁ„o de Pessoa JurÌdica";?></titulo></td>
          </td>


          </tr>


          </table>



          </br></br>
          <table width="100%">
          <tr>
          <td width="15%">Raz„o Social:</td>
          <td><input type="txt" name="nomebusca" size="10" value="<?echo $nomebusca;?>" >
           Cidade:
           <select   name="codigocidade" value="<?echo $codigocidade;?>" >
                      <option value=""></option>
                      <?

                      $stmt1 = "SELECT CD_CIDADE,DS_CIDADE  FROM cidade";
					  $res = mysql_db_query($banco,$stmt1,$conexao);
                      while ($valor8=mysql_fetch_array($res)) {
					     print "<option value=\"{$valor8["CD_CIDADE"]}\">{$valor8["DS_CIDADE"]}</option>";
                  	  }
                      ?>
             </select>
             
             Tipo:
             <select   name="achatipo" value="<?echo $achatipo;?>" >
                      <option value=""></option>
                      <option value="F">Fornecedor</option>
                      <option value="C">CondÙminos</option>
                      <option value="L">Local</option>

             </select>
             
          </td>
          
          

          
          
          <td align=right>
          <a href="#" onclick="document.forms[0].submit();return false;">
          <IMG src="selecionarnovocva.png" width="42" height="38" ></a>

          <a href="pessoajuridicaversao3.php?navegando=sim&status=cancelar">
           <img src="sairtela.png" width="42" height="38"></a>

          </td>

          </tr>



          </table>


          <input type="hidden" name="status" value="buscarparametro">
		   <input type="hidden" name="continuarmesmatela" value="sim">
		   <input type="hidden" name="acaoparametro" value="selecionar">



           </br>
<table width="99%" ID="alter">
<tr class="dif">
<td><b>Raz„o Social<b></td>
<td><b>Cidade<b></td>
<td></td>

</tr>
<?

            //DEFINA PAGINACAO
            $chacontadorgeral="select count(*) CONTADOR FROM pessoa_bi
            where  descricao like '%$nomebusca%' and
                      cd_cidade like '%$codigocidade%' and
                      id_integrado like '%$achatipo%' and
                      id_tipo_pessoa='2'
                      ";
            $registros = "5";
            require("paginacao_mi.php");
            //FINAL PAGINACAO

            $chaprincipal="SELECT a.codigo CODIGO,a.descricao RAZAO,b.ds_cidade CIDADE from pessoa_bi a, cidade b
            where a.cd_cidade=b.cd_cidade and
            a.descricao like '%$nomebusca%' and
            a.cd_cidade like '%$codigocidade%' and
            a.id_tipo_pessoa='2' and
            id_integrado like '%$achatipo%'
            order by a.descricao asc
            limit $inicio,$registros";
            
            ECHO "Banco:$banco</br>";



         	$chaempresa2= mysql_db_query($banco,$chaprincipal,$conexao);

            while ($chaempresa3=mysql_fetch_array($chaempresa2)) {
              $codigopasa=$chaempresa3["CODIGO"];
		    ?>

	    <tr>
	    <td><?echo $chaempresa3["RAZAO"];?></td>
	    <td><?echo $chaempresa3["CIDADE"];?></td>
	    <td width="5%"><a href="pessoajuridicaversao3.php?navegando=sim&status=editar&codigoachou=<?echo $codigopasa;?>&acaoparametro=<?echo $acaoparametro;?>">
           <IMG src="editar2.png" width="19" height="25" ></a>
        </td>




 </tr>
 <?}?>
 </table>
 <table width="99%">
 <tr>
 <td align=right>
    P·gina:<? echo "$pagina_atual";?>/<? echo "$paginas";?></td>

    <td  align=right width="10%">
    <a href="pessoajuridicaversao3.php?navegando=sim&pagina_atual=<?echo $proximapagina;?>&status=buscarparametro&acaoparametro=selecionar&nomebusca=<?echo $nomebusca;?>&codigocidade=<?echo $codigocidade;?>&tipopessoasop=<?echo $tipopessoasop;?>&achatipo=<?echo $achatipo;?>">
    <img src="setadireita.png" width="20" height="14" ></a>
    <a href="pessoajuridicaversao3.php?navegando=sim&buscarparametro=sim&pagina_atual=<?echo $anteriorpagina;?>&status=buscarparametro&acaoparametro=selecionar&nomebusca=<?echo $nomebusca;?>&codigocidade=<?echo $codigocidade;?>&tipopessoasop=<?echo $tipopessoasop;?>&achatipo=<?echo $achatipo;?>">
    <img src="setaesquerda.png" width="20" height="14" ></a>
    </td>
 </tr>
 </table>

</div>


 <?

}

if ($acaoparametro=="confirmaexclusao")
{


 $sql99CO ="SELECT descricao NOME  from pessoa_bi where codigo='$codigopessoaatual'
 ";

 $sql99CO2= mysql_db_query($banco,$sql99CO,$conexao);
 $sql99CO3=mysql_fetch_array($sql99CO2);
 $descricaoEMPREOPORTU=$sql99CO3["NOME"];








?>



<div  style="display: block;" id="mostraexclusao">

 <table width="99%">

          <tr>
          <td>
          <?echo "ELiminando Registro";?></br>
                    Empresa:<?echo "$descricaoEMPREOPORTU";?>


          </td>

          </tr>
          </table>

          <hr>


               <center>
               Confirma EliminaÁ„o!</center>

           <input type="hidden" name="status" value="finalizarexclusao">
		   <input type="hidden" name="continuarmesmatela" value="sim">
		   <input type="hidden" name="buscarparametro" value="nao">
		   <input type="hidden" name="codigoachou" value="<?echo $codigopessoaatual;?>">

           <table width="99%">
           <tr>
           <td  align=right>
           <a href="#" onclick="document.forms[0].submit();return false;">
           <IMG src="confirmarnovocva.png" width="42" height="38" ></a>

           <a href="pessoajuridicaversao3.php?navegando=sim&status=cancelar&buscarparametro=nao">
           <img src="sairtela.png" width="42" height="38"></a>
           </td>
           </tr>
           </table>



</div>

<?}?>


<?



} //fina buscar parametro
?>



</form>
</body>
</html>

