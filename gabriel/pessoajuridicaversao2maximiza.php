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

<body  background="novofundo9.jpg">

<form action="pessoajuridicaversao2maximiza.php"  name="teste"  method="POST" >


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

$cnpj=$_GET['cnpj'];
$cidadegrava=$_GET['cidadegrava'];
$emailgrava=$_GET['emailgrava'];




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
$bairrograva=$_POST['bairrograva'];
$rua5grava=$_POST['rua5grava'];


}

echo "cidade:$cidadegrava";


require("carregamenumaximiza.php");
require("estilo2_mi.css");
?>
<center>

<table width="70%">
<tr>
<td><h2>Cadastro de Pessoa JurÌdica</h2></td>
</tr>

<tr>
<td>
<?
if ( !IsSet($acao)){$acao="disabled";}

if ($status=="finalizarexclusao"){

 $deletausuario1= "delete from Usuarios where Id_dados in
 (select id_pessoa from pessoa where id_dados_juridica in
 (select id_dados from pessoajuridica where id_dados_juridica='$codigoachou' ) )";
 $resdeleta1 = mysql_db_query($banco,$deletausuario1,$conexao);
 $deletapessoa= "delete from   pessoa   where id_dados_juridica='$codigoachou'";
 $resdeleta2= mysql_db_query($banco,$deletapessoa,$conexao);
 $deletafisica= "delete from   pessoajuridica  where id_dados='$codigoachou'";
 $resdeleta3= mysql_db_query($banco,$deletafisica,$conexao);

    $status="cancelar";
    $codigoachou=null;

} //finl da exclusao final



if ($status=="cancelar"){

$codigoachou=null;
}




if ($status=="incluir"){
$jaexistepessoa="nao";

//testa pessoa existe

$sqlacharita58="select ID_DADOS,PJ_RAZAO,PJ_EMAIL FROM pessoajuridica where
pj_razao='$nomegravapessoa' ";

$sqlacharita518= mysql_db_query($banco,$sqlacharita58,$conexao);
$sqlacharita5181=mysql_fetch_array($sqlacharita518);

$nomeachou=$sqlacharita5181["PJ_RAZAO"];
$codigoachou=$sqlacharita5181["ID_DADOS"];


if ($jaexistepessoa=="nao")
{



     $ultimo = "SELECT MAX(ID_DADOS) SEQUENCIA FROM pessoajuridica";
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


	 $nome=strtr($nome, "·‡„‚ÈÍÌÛÙı˙¸Á¡¿√¬… Õ”‘’⁄‹«", "aaaaeeiooouucAAAAEEIOOOUUC");
	 $nome=strtoupper($nome);//converte maiuscula
     $emailgrava=strtolower($emailgrava);//converte minuscula




    if(empty($nome)   or empty($cidadegrava) or empty($emailgrava))
    {
      $mensagemtela="Existem Campos ObrigatÛrios N„o Preenchidos</br>";
      $codigomensagem="inclusao";






      if(empty($nome)){$simboloobrigatorionome="sim";}

      if(empty($cidadegrava)){$simboloobrigatoriocidade="sim";}
      if(empty($emailgrava)){$simboloobrigatorioemail="sim";}



      $status="cancelar";
    }
    else
    {

     $achapais= "SELECT COUNT(*) CONTADOR from pais a,estado b,cidade c
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
      $simboloobrigatoriocnpj="sim";
      $codigomensagem="inclusao";
      $status="cancelar";
     }
     ELSE
     {



         $grava = "INSERT INTO pessoajuridica(id_dados,pj_razao,pj_cnpj,pj_rua,pj_email,
         ID_BAIRRO,ID_CEP,PJ_NUMERO,PJ_COMP,pj_cidade,
         PJ_CELULAR1,PJ_CELULAR2,PJ_TELEFONE1,PJ_TELEFONE2)
         values ('$sequencia','$nome','$cnpj','$rua5grava',
         '$emailgrava','$bairrograva','$cep','$numerograva','$complementograva','$cidadegrava',
         '$fone1','$fone2','$fone3','$fone4'
         )";

         echo "$grava";
         $res = mysql_db_query($banco,$grava,$conexao);
         $ultimo22 = "SELECT MAX(ID_PESSOA) SEQUENCIA FROM pessoa";
         $res722 = mysql_db_query($banco,$ultimo22,$conexao);
         $totallinha3522=mysql_fetch_array($res722);
         $sequencia22=$totallinha3522["SEQUENCIA"];

         IF ($sequencia22 >"0"){
          $sequencia23=$sequencia22+1;
	     }
	     ELSE
	     {
          $sequencia23="1";
	     }

         $grava5= "INSERT INTO pessoa(id_pessoa,id_dados_juridica)
         values ('$sequencia23','$sequencia')";
         $res = mysql_db_query($banco,$grava5,$conexao);

         $mensagemtela="</br>Inclus„o com Sucesso";
         $status="cancelar";
        }//teste de rg na cidade


      }//QUANDO … BRASIL



 }



}//final da acaocde incluir



if ($status=="editar"){

$sqlacharita58="select CODIGO,DESCRICAO,NR_CNPJ,CD_CIDADE,DS_EMAIL FROM  pessoa_bi where codigo='$codigoachou' ";
$sqlacharita518= mysql_db_query($banco,$sqlacharita58,$conexao);
while ($valor4=mysql_fetch_array($sqlacharita518))
{
          $nomeachou=$valor4["DESCRICAO"];
          $codigoachou=$valor4["CODIGO"];
          $emailgrava=$valor4["DS_EMAIL"];

          $cnpj=$valor4["NR_CNPJ"];

          $rua5grava=$valor4["PJ_RUA"];
          $bairrograva=$valor4["ID_BAIRRO"];
          $cep=$valor4["ID_CEP"];
          $numerograva=$valor4["PJ_NUMERO"];
          $complementograva=$valor4["PJ_COMP"];
          $cidadegrava=$valor4["CD_CIDADE"];
          $fone1=$valor4["FONE1"];
          $fone2=$valor4["FONE2"];
          $fone3=$valor4["FONE3"];
          $fone4=$valor4["FONE4"];





}

}//final chamou para editar


if ($status=="gravaredicao"){

       $emailgrava=strtolower($emailgrava);//converte minuscula
       $nome=strtr($nome, "·‡„‚ÈÍÌÛÙı˙¸Á¡¿√¬… Õ”‘’⁄‹«", "aaaaeeiooouucAAAAEEIOOOUUC");
	   $nome=strtoupper($nome);//converte maiuscula

  if(empty($nome)  or empty($cidadegrava) or empty($emailgrava))
    {
      $mensagemtela="Existem Campos ObrigatÛrios N„o Preenchidos</br>";
      $codigomensagem="edicao";






      if(empty($nome)){$simboloobrigatorionome="sim";}

      if(empty($cidadegrava)){$simboloobrigatoriocidade="sim";}
      if(empty($emailgrava)){$simboloobrigatorioemail="sim";}



      $status="cancelar";
    }
    else
    {

     $achapais= "SELECT COUNT(*) CONTADOR from pais_bi a,estado_bi b,cidade_bi c
     where c.cd_cidade='$cidadegrava' AND
     c.cd_estado=b.cd_estado and
     b.cd_pais=a.cd_pais and
     a.id_brasil='S'";
     $achapais2= mysql_db_query($banco,$achapais,$conexao);
     $achapais3=mysql_fetch_array($achapais2);
     $paisbrasil=$achapais3["CONTADOR"];



     if(empty($cnpj) and  $paisbrasil=="1")
     {
      $mensagemtela="… ObrigatÛrio definir Cnpj..";
      $simboloobrigatoriocnpj="sim";
      $codigomensagem="edicao";
      $status="cancelar";
     }
     ELSE
     {



       $grava ="update  pessoa_bi set ds_email='$emailgrava',NR_CNPJ='$cnpj',descricao='$nome'
       where codigo='$codigoachou' ";
       echo "$grava";
       
       $mensagemtela="AtualizaÁ„o com Sucesso";
       $res = mysql_db_query($banco,$grava,$conexao);
       $status="cancelar";
        $codigomensagem="edicao";




      }//QUANDO … BRASIL
    }



}//final quanso acao È gravar editar





if ( !IsSet($status) or ($status=="novo") or ($status=="cancelar") or ($status=="elimina")){
?>



              <table>
                      <tr>
                      <td>Nome:</td>
                       <?if ($simboloobrigatorionome=="sim"){ $corobrigatorio="red";}else{$corobrigatorio="white";}?>


                       <td>
                       <input type=text name="nome" size=36  style="background-color: <?echo $corobrigatorio;?>"
                       value="<? echo $nome;?>" style="background-color: white" <?echo $acao;?> ></td>

                      </tr>
                      <tr>
                      <td>Email:</td>

                        <?if ($simboloobrigatorioemail=="sim"){ $corobrigatorio="red";}else{$corobrigatorio="white";}?>


                       <td>
                       <input type=text name="emailgrava" size=36 style="background-color: <?echo $corobrigatorio;?>"
                       value="<? echo $emailgrava;?>" style="background-color: white" <?echo $acao;?>>
                       </td>
                       </tr>


                      <td>Cnpj:</td>
                      <?if ($simboloobrigatoriocnpj=="sim"){ $corobrigatorio="red";}else{$corobrigatorio="white";}?>

                      <td><input type="text"  style="background-color: <?echo $corobrigatorio;?>"<?echo $acao;?> name="cnpj"
                      value="<?echo $cnpj;?>" onKeyPress="MascaraCNPJ(teste.cnpj);"
                      maxlength="18"  ></td>

                     </tr>





                     <tr>
                     <td>Logradouro:</td>
                     <td><input type="txt" name="rua5grava"  value="<?echo $rua5grava;?>" size="35"  style="background-color: white" <?echo $acao;?>></td>
                      </tr>

                     <tr>
                     <td>
                     N˙mero:
                      </td>
                     <td>
                     <input type="txt" name="numerograva"  value="<?echo $numerograva;?>" size="5" style="background-color: white"  <?echo $acao;?>></td>
                     </tr>

                     <tr>
                     <td>Complemento:</td>
                     <td>
                     <input type="txt" name="complementograva" value="<?echo $complementograva;?>"  size="5"  style="background-color: white" <?echo $acao;?>></td>

                     </tr>

                     <tr>
                     <td>
                     Bairro:
                     </td>
                     <td><input type="txt" name="bairrograva"  size="35"  value="<?echo $bairrograva;?>" style="background-color: white" <?echo $acao;?>>
                     </td>
                     </tr>
                     <tr>
                     <td>
                     Cep:
                     </td>
                     <td>
                     <input type="txt" name="cep"  size="9" value="<?echo $cep;?>"
                     onKeyPress="MascaraCep(teste.cep);" style="background-color: white" <?echo $acao;?> >
                     </td>
                     </tr>

                     <tr>
                     <td>
                     Cidade:
                     </td>

                       <?if ($simboloobrigatoriocidade=="sim"){ $corobrigatorio="red";}else{$corobrigatorio="white";}?>


                     <td>
                      <select   name="cidadegrava" style="background-color: <?echo $corobrigatorio;?>" <?echo $acao;?>>
                       <option value="<? echo $cidadegrava;?>"><? echo $cidadegrava;?></option>
                  	  <?
					  $stmt1 = "SELECT CD_CIDADE,DS_CIDADE  FROM cidade";
					  $res = mysql_db_query($banco,$stmt1,$conexao);
                      while ($valor8=mysql_fetch_array($res)) {
					     print "<option value=\"{$valor8["CD_CIDADE"]}\">{$valor8["DS_CIDADE"]}</option>";
                  	  }
                     ?>

					 </select>

                     </td>
                     </tr>

                     <tr>
                     <td>
                     Telefone Comercial
                     </td>
                     <td><input type="txt" name="fone3"  size="25" value="<?echo $fone3;?>"  style="background-color: white" <?echo $acao;?>>

                     Alternativo
                     <input type="txt" name="fone4"  size="25" value="<?echo $fone4;?>" style="background-color: white" <?echo $acao;?> >
                     </td>
                     </tr>

                     <tr>
                     <td>
                     Telefone Celular
                     </td>
                     <td><input type="txt" name="fone1"  size="25"  value="<?echo $fone1;?>" style="background-color: white" <?echo $acao;?>>
                     Alternativo
                     <input type="txt" name="fone2"  size="25"  value="<?echo $fone2;?>" style="background-color: white" <?echo $acao;?>>
                     </td>
                     </tr>


                    </table>

                    <input type="hidden" name="continuarmesmatela" value="sim">
		            <input type="hidden" name="novologin" value="nao">
  		            <input type="hidden" name="codigoachou" value="<?echo $codigoachou;?>">
  		            <input type="hidden" name="status" value="incluir">






<?
}//final doaincluir ou cancelar




if ($status=="editar"){
?>

              <table>
                      <tr>
                      <td>Nome:</td>
                        <?if ($simboloobrigatorionome=="sim"){ $corobrigatorio="red";}else{$corobrigatorio="white";}?>
                       <td><input type=text name="nome" size=36 value="<?echo $nomeachou;?>"
                           ></td>

                      </tr>



                     <tr>
                      <td>Email:</td>


                       <td>
                       <input type=text name="emailgrava" size=36   value="<?echo $emailgrava;?>"></td>


                     </tr>


                     <tr>
                      <td>Cnpj:</td>
                      <?if ($simboloobrigatoriocnpj=="sim"){ $corobrigatorio="red";}else{$corobrigatorio="white";}?>

                      <td><input type="text"  style="background-color: <?echo $corobrigatorio;?>" name="cnpj"
                      value="<?echo $cnpj;?>" onKeyPress="MascaraCNPJ(teste.cnpj);"
                      maxlength="18"  ></td>

                     </tr>





                     <tr>
                     <td>Logradouro:</td>
                     <td>
                     <input type="txt" name="rua5grava"  value="<?echo $rua5grava;?>" size="35"  >
                     </td>
                     </tr>

                     <tr>
                     <td>Numero:</td>
                     <td><input type="txt" name="numerograva"  size="5"  value="<?echo $numerograva;?>">
                     </td>
                     </tr>

                     <tr>
                     <td>Complemento:</td>
                     <td><input type="txt" name="complementograva"  size="5"  value="<?echo $complementograva;?>" >
                     </td>
                     </tr>

                     <tr>
                     <td>Bairro:</td>
                     <td><input type="txt" name="bairrograva"  size="35"  value="<?echo $bairrograva;?>" >
                     </td>
                     </tr>

                     <tr>
                     <td>Cep:</td>
                     <td><input type="txt" name="cep"  size="9"  value="<?echo $cep;?>"
                     onKeyPress="MascaraCep(teste.cep);"  >
                     </td>
                     </tr>

                     <tr>
                     <td>Cidade:</td>
                     <td><select   name="cidadegrava">
                      <option value="<?echo $cidadegrava;?>"><?

                       $usuachacida= "SELECT DS_CIDADE from cidade_bi where cd_cidade='$cidadegrava'";
                       $usuachacida2= mysql_db_query($banco,$usuachacida,$conexao);
                       $usuachacida3=mysql_fetch_array($usuachacida2);
                       $cidadedescricao=$usuachacida3["DS_CIDADE"];
                       echo $cidadedescricao;

                       ?>

                      </option>
                  	  <?
					  $stmt1 = "SELECT CD_CIDADE,DS_CIDADE  FROM cidade_bi";
					  $res = mysql_db_query($banco,$stmt1,$conexao);
                      while ($valor8=mysql_fetch_array($res)) {
					     print "<option value=\"{$valor8["CD_CIDADE"]}\">{$valor8["DS_CIDADE"]}</option>";
                  	  }
                     ?>

					 </select>

                     </td>
                     </tr>

                     <tr>
                     <td>
                     Telefone Comercial
                     </td>
                     <td><input type="txt" name="fone3"  size="25"  value="<?echo $fone3;?>" >

                     Alternativo
                     <input type="txt" name="fone4"  size="25"  value="<?echo $fone4;?>" >
                     </td>
                     </tr>

                     <tr>
                     <td>
                     Telefone Celular
                     </td>
                     <td><input type="txt" name="fone1"  size="25"  value="<?echo $fone1;?>">
                     Alternativo
                     <input type="txt" name="fone2"  size="25"  value="<?echo $fone2;?>" >
                     </td>
                     </tr>


                    </table>

                    <input type="hidden" name="continuarmesmatela" value="sim">
		            <input type="hidden" name="novologin" value="nao">
                    <input type="hidden" name="codigoachou" value="<?echo $codigoachou;?>">
  		            <input type="hidden" name="status" value="gravaredicao">

<?
}//final editar
?>
<hr>

<font style="text-decoration:none;color: red;"><?echo "$mensagemtela";?>

<table>
<tr>

<?
if ($codigomensagem=="inclusao")
{
?>
<td width="70" height="30" align="center" bgcolor="#8B8B7A" style="border: thin outset #8B8B7A;"
onMouseOver="this.bgColor='#CDCDB4'" onMouseOut="this.bgColor='#8B8B7A';this.style.border='thin outset #8B8B7A'"
onMouseDown="this.style.border='thin inset #8B8B7A';"
onMouseUp="this.style.border='thin outset #8B8B7A';">
<div style="font-size: 12px; font-weight: bold;">
<a href="pessoajuridicaversao2maximiza.php?navegando=sim&status=novo&codigoachou=<?echo $codigoachou;?>&buscarparametro=nao&simboloobrigatoriocpnpj=<?echo $simboloobrigatoriocnpj;?>&simboloobrigatoriocidade=<?echo $simboloobrigatoriocidade;?>&simboloobrigatorioemail=<?echo $simboloobrigatorioemail;?>
&acao=1&nome=<?echo $nome;?>&cnpj=<?echo $cnpj;?>&cidadegrava=<?echo $cidadegrava;?>&emailgrava=<?echo $emailgrava;?>"
style="text-decoration:none;color: black;">Retornar</a>
</div>
</td>
<?
}

if ($codigomensagem=="edicao"){
?>
<td width="70" height="30" align="center" bgcolor="#8B8B7A" style="border: thin outset #8B8B7A;"
onMouseOver="this.bgColor='#CDCDB4'" onMouseOut="this.bgColor='#8B8B7A';this.style.border='thin outset #8B8B7A'"
onMouseDown="this.style.border='thin inset #8B8B7A';"
onMouseUp="this.style.border='thin outset #8B8B7A';">
<div style="font-size: 12px; font-weight: bold;">
<a href="pessoajuridicaversao2maximiza.php?navegando=sim&status=editar&codigoachou=<?echo $codigoachou;?>&buscarparametro=nao&simboloobrigatoriocnpj=<?echo $simboloobrigatoriocnpj;?>&simboloobrigatoriocidade=<?echo $simboloobrigatoriocidade;?>&simboloobrigatorioemail=<?echo $simboloobrigatorioemail;?>
&acao=1&nome=<?echo $nome;?>&cnpj=<?echo $cnpj;?>&cidadegrava=<?echo $cidadegrava;?>&emailgrava=<?echo $emailgrava;?>"
style="text-decoration:none;color: black;">Retornar</a>
</div>
</td>
<?
}




          if (($status=="editar") or ($status=="novo") or ($status=="gravaredicao")){
           ?>
           <td width="70" height="30" align="center" bgcolor="#8B8B7A" style="border: thin outset #8B8B7A;"
           onMouseOver="this.bgColor='#CDCDB4'" onMouseOut="this.bgColor='#8B8B7A';this.style.border='thin outset #8B8B7A'"
           onMouseDown="this.style.border='thin inset #8B8B7A';"
           onMouseUp="this.style.border='thin outset #8B8B7A';">
           <div style="font-size: 12px; font-weight: bold;" >
              <a href="#" onclick="document.teste.submit();" style="text-decoration:none;color: black;">Gravar</a>
           </div>
          </td>

          <td width="70" height="30" align="center" bgcolor="#8B8B7A" style="border: thin outset #8B8B7A;"
           onMouseOver="this.bgColor='#CDCDB4'" onMouseOut="this.bgColor='#8B8B7A';this.style.border='thin outset #8B8B7A'"
           onMouseDown="this.style.border='thin inset #8B8B7A';"
           onMouseUp="this.style.border='thin outset #8B8B7A';">
           <div style="font-size: 12px; font-weight: bold;">
              <a href="pessoajuridicaversao2maximiza.php?navegando=sim&status=cancelar&codigoachou=<?echo $codigoachou;?>&buscarparametro=nao"
              style="text-decoration:none;color: black;">Cancelar</a>
           </div>
          </td>



          <?

          }?>


          <td width="70" height="30" align="center" bgcolor="#8B8B7A" style="border: thin outset #8B8B7A;"
           onMouseOver="this.bgColor='#CDCDB4'" onMouseOut="this.bgColor='#8B8B7A';this.style.border='thin outset #8B8B7A'"
           onMouseDown="this.style.border='thin inset #8B8B7A';"
           onMouseUp="this.style.border='thin outset #8B8B7A';">
           <div style="font-size: 12px; font-weight: bold;">
              <a href="pessoajuridicaversao2maximiza.php?navegando=sim&buscarparametro=sim" style="text-decoration:none;color: black;">Consultar</a>
           </div>
          </td>



           <td width="70" height="30" align="center" bgcolor="#8B8B7A" style="border: thin outset #8B8B7A;"
           onMouseOver="this.bgColor='#CDCDB4'" onMouseOut="this.bgColor='#8B8B7A';this.style.border='thin outset #8B8B7A'"
           onMouseDown="this.style.border='thin inset #8B8B7A';"
           onMouseUp="this.style.border='thin outset #8B8B7A';">
           <div style="font-size: 12px; font-weight: bold;">
              <a href="pessoajuridicaversao2maximiza.php?navegando=sim&status=novo&acao=null" style="text-decoration:none;color: black;">Incluir</a>
           </div>
          </td>

          <?
          if ($status=="editar"){
            if(empty($nomeachou)){}else{
          ?>

          <td  width="70" height="30" align="center" bgcolor="#8B8B7A" style="border: thin outset #8B8B7A;"
           onMouseOver="this.bgColor='#CDCDB4'" onMouseOut="this.bgColor='#8B8B7A';this.style.border='thin outset #8B8B7A'"
           onMouseDown="this.style.border='thin inset #8B8B7A';"
           onMouseUp="this.style.border='thin outset #8B8B7A';">
           <div style="font-size: 12px; font-weight: bold;" >
              <a href="pessoajuridicaversao2maximiza.php?navegando=sim&status=elimina&codigoachou=<?echo $codigoachou;?>buscarparametro=nao"
              style="text-decoration:none;color: black;" >Eliminar</a>
           </div>
          </td>
           <?}
          }?>

          </tr>

         </table>




    <? if ($buscarparametro=="sim"){?>

         <div  style="display: block;" id="primeiro">
          <font style='font-size: 17px;color: white;text-align:left;bold: Negrito' ><?echo "Consultando";?><hr>
          </font>
          <center>


          <table width="80%">
          <tr>
          <td>

          <table>
          <tr>
          <td>Buscar:</td>
          <td><input type="txt" name="nomebusca" size="25" value="<?echo $nomebusca;?>" onchange="this.form.submit()"></td>
          </tr>
          <tr>
          <td>Raz„o  Social:</td>
          <td>
          <?

           $ultimo22bus= "SELECT DESCRICAO  FROM pessoa_bi WHERE codigo='$codigoachoufinal' AND id_tipo_pessoa='2'";
           $res722bus = mysql_db_query($banco,$ultimo22bus,$conexao);
           $totallinha3522bus=mysql_fetch_array($res722bus);
           $mostrabus=$totallinha3522bus["DESCRICAO"];

          ?>

                      <select   name="codigoachoufinal" value="<?echo $codigoachoufinal;?>" onchange="this.form.submit()">
                      <option value=""><?echo $mostrabus;?></option>
                      <?

                      $stmt1 = "SELECT CODIGO,DESCRICAO  FROM pessoa_bi where descricao like '%$nomebusca%'
                      AND id_tipo_pessoa='2'";
					  $res = mysql_db_query($banco,$stmt1,$conexao);
                      while ($valor8=mysql_fetch_array($res)) {
					     print "<option value=\"{$valor8["CODIGO"]}\">{$valor8["DESCRICAO"]}</option>";
                  	  }
                      ?>
                      </select>
           </td>
           </tr>
           </table>

           <table>

           <?
           if ($codigoachoufinal >"0"){
            $achaelimina4= "SELECT DESCRICAO NOME,NR_CNPJ  from pessoa_bi where codigo='$codigoachoufinal'";
            $achaelimina41= mysql_db_query($banco,$achaelimina4,$conexao);
            $achaelimina43=mysql_fetch_array($achaelimina41);
            $nomeahca7=$achaelimina43["NOME"];
            $cnpj7=$achaelimina43["NR_CNPJ"];

            ?><font style='font-size: 14px;color: black;text-align:left;bold: Negrito' >
            <?echo "Raz„o Social:$nomeahca7</BR>";?>

            <?echo "Cnpj:$cnpj7</BR>";
           }
            ?>

           <tr>



           <td width="40" height="30" align="center" bgcolor="#8B8B7A" style="border: thin outset #8B8B7A;"
           onMouseOver="this.bgColor='#CDCDB4'" onMouseOut="this.bgColor='#8B8B7A';this.style.border='thin outset #8B8B7A'"
           onMouseDown="this.style.border='thin inset #8B8B7A';"
           onMouseUp="this.style.border='thin outset #8B8B7A';">
           <div style="font-size: 12px; font-weight: bold;">
              <a href="pessoajuridicaversao2maximiza.php?navegando=sim&status=editar&codigoachou=<?echo $codigoachoufinal;?>&buscarparametro=nao"
              style="text-decoration:none;color: black;">Confirma</a>
           </div>
           </td>




          <td width="40" height="30" align="center" bgcolor="#8B8B7A" style="border: thin outset #8B8B7A;"
           onMouseOver="this.bgColor='#CDCDB4'" onMouseOut="this.bgColor='#8B8B7A';this.style.border='thin outset #8B8B7A'"
           onMouseDown="this.style.border='thin inset #8B8B7A';"
           onMouseUp="this.style.border='thin outset #8B8B7A';">
           <div style="font-size: 12px; font-weight: bold;">
              <a href="pessoajuridicaversao2maximiza.php?navegando=sim&status=cancelar&codigoachou=<?echo $codigoachou;?>&buscarparametro=nao"
              style="text-decoration:none;color: black;">Cancelar</a>
           </div>
          </td>

          </tr>

          </td>
          </table>


                    <input type="hidden" name="continuarmesmatela" value="sim">
                    <input type="hidden" name="buscarparametro" value="sim">

  		            <input type="hidden" name="status" value="cancelar">

         </div>

      <?}

      if ($status=="elimina"){
      ?>

          <div  style="display: block;" id="primeiro">
          <font style='font-size: 17px;color: black;text-align:left;bold: Negrito' ><?echo "Eliminar Registro";?><br>
          </font>
            <?
            $achaelimina4= "SELECT pj_razao NOME  from pessoajuridica where id_dados='$codigoachou'";
            $achaelimina41= mysql_db_query($banco,$achaelimina4,$conexao);
            $achaelimina43=mysql_fetch_array($achaelimina41);
            $nomeahca7=$achaelimina43["NOME"];
            ?><font style='font-size: 14px;color: black;text-align:left;bold: Negrito' >
            <?echo "$nomeahca7";?>
            <hr>

           <table>
           <tr>


           <td width="70" height="30" align="center" bgcolor="#8B8B7A" style="border: thin outset #8B8B7A;"
           onMouseOver="this.bgColor='#CDCDB4'" onMouseOut="this.bgColor='#8B8B7A';this.style.border='thin outset #8B8B7A'"
           onMouseDown="this.style.border='thin inset #8B8B7A';"
           onMouseUp="this.style.border='thin outset #8B8B7A';">
           <div style="font-size: 12px; font-weight: bold;">
              <a href="pessoajuridicaversao2maximiza.php?navegando=sim&status=finalizarexclusao&codigoachou=<?echo $codigoachou;?>"
              style="text-decoration:none;color: black;">Confirma</a>
           </div>
           </td>




          <td width="70" height="30" align="center" bgcolor="#8B8B7A" style="border: thin outset #8B8B7A;"
           onMouseOver="this.bgColor='#CDCDB4'" onMouseOut="this.bgColor='#8B8B7A';this.style.border='thin outset #8B8B7A'"
           onMouseDown="this.style.border='thin inset #8B8B7A';"
           onMouseUp="this.style.border='thin outset #8B8B7A';">
           <div style="font-size: 12px; font-weight: bold;">
              <a href="pessoajuridicaversao2maximiza.php?navegando=sim&status=cancelar&codigoachou=<?echo $codigoachou;?>&buscarparametro=nao"
              style="text-decoration:none;color: black;">Cancelar</a>
           </div>
          </td>

          </table>
          </tr>


                    <input type="hidden" name="continuarmesmatela" value="sim">


         </div>
         <?

    }

    ?>



</td>
</table>
</center>
</form>
</body>
</html>

