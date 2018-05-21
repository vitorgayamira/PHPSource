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

function MascaraCPF(cpf){
        if(mascaraInteiro(cpf)==false){
                event.returnValue = false;
        }
        return formataCampo(cpf, '000.000.000-00', event);
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


//valida o cpf valido
function ValidarCPF(Objcpf){
        var cpf = Objcpf.value;
        exp = /\.|\-/g
        cpf = cpf.toString().replace( exp, "" );
        var digitoDigitado = eval(cpf.charAt(9)+cpf.charAt(10));
        var soma1=0, soma2=0;
        var vlr =11;

        for(i=0;i<9;i++){
                soma1+=eval(cpf.charAt(i)*(vlr-1));
                soma2+=eval(cpf.charAt(i)*vlr);
                vlr--;
        }
        soma1 = (((soma1*10)%11)==10 ? 0:((soma1*10)%11));
        soma2=(((soma2+(2*soma1))*10)%11);

        var digitoGerado=(soma1*10)+soma2;
        if(digitoGerado!=digitoDigitado)
                alert('CPF Invalido!');
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

<body>

<form action="pessoafisicaversaomaximiza.php"  name="teste"  method="POST" >


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
$simboloobrigatoriorg=$_GET['simboloobrigatoriorg'];
$simboloobrigatoriosexo=$_GET['simboloobrigatoriosexo'];
$simboloobrigatoriocidade=$_GET['simboloobrigatoriocidade'];
$simboloobrigatorioemail=$_GET['simboloobrigatorioemail'];
$simboloobrigatorionascimento=$_GET['simboloobrigatorionascimento'];
$nascimentograva=$_GET['nascimentograva'];
$sexograva=$_GET['sexograva'];
$cpf=$_GET['cpf'];
$cidadegrava=$_GET['cidadegrava'];




}

if ($continuarmesmatela=="sim"){

$novologin="nao";
$escolha=$_POST['escolha'];
$nome=$_POST['nome'];
$emailgrava=$_POST['emailgrava'];
$nascimentograva=$_POST['nascimentograva'];
$sexograva=$_POST['sexograva'];
$cpf=$_POST['cpf'];
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



$edusuario= $_SESSION["edusuario"];
$edsenha= $_SESSION["edsenha"];


require("estilo2_mi.css");

?>
<center>

<table width="70%">
<tr>
<td><h2>Cadastro de Pessoa FÌsica</h2></td>
</tr>

<tr>
<td>
<?
if ( !IsSet($acao)){$acao="disabled";}


if ($status=="finalizarexclusao"){

 $deletausuario1= "delete from Usuarios where Id_dados in
 (select id_pessoa from pessoa where id_dados_fisica in
 (select id_dados from pessoafisica where id_dados_fisica='$codigoachou' ) )";
 $resdeleta1 = mysql_db_query($banco,$deletausuario1,$conexao);
 $deletapessoa= "delete from   pessoa   where id_dados_fisica='$codigoachou'";
 $resdeleta2= mysql_db_query($banco,$deletapessoa,$conexao);
 $deletafisica= "delete from   pessoafisica  where id_dados='$codigoachou'";
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

$sqlacharita58="select ID_DADOS,PF_NOME,PF_EMAIL,PF_NASCIMENTO,PF_SEXO,PF_CPF,PF_RG FROM pessoafisica where
pf_nome='$nomegravapessoa' ";

$sqlacharita518= mysql_db_query($banco,$sqlacharita58,$conexao);
$sqlacharita5181=mysql_fetch_array($sqlacharita518);

$nomeachou=$sqlacharita5181["PF_NOME"];
$codigoachou=$sqlacharita5181["ID_DADOS"];
$rgachou=$sqlacharita5181["PF_RG"];

if ($jaexistepessoa=="nao")
{



     $ultimo = "SELECT MAX(ID_DADOS) SEQUENCIA FROM pessoafisica";
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




    if(empty($nome) or empty($rggrava) or empty($sexograva)  or empty($cidadegrava) or empty($emailgrava)
    or empty($nascimentograva))
    {
      $mensagemtela="Existem Campos ObrigatÛrios N„o Preenchidos</br>";
      $codigomensagem="inclusao";





      if(empty($rggrava)){$simboloobrigatoriorg="sim";}
      if(empty($nome)){$simboloobrigatorionome="sim";}
      if(empty($sexograva)){$simboloobrigatoriosexo="sim";}
      if(empty($cidadegrava)){$simboloobrigatoriocidade="sim";}
      if(empty($emailgrava)){$simboloobrigatorioemail="sim";}
      if(empty($nascimentograva)){$simboloobrigatorionascimento="sim";}


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



     if(empty($cpf) and  $paisbrasil=="1")
     {
      $mensagemtela="… ObrigatÛrio definir CPF..";
      $simboloobrigatoriocpf="sim";
      $codigomensagem="inclusao";
      $status="cancelar";
     }
     ELSE
     {

        $achaexistepessoa33= "SELECT count(*) CONTADOR from pessoafisica where
        PF_RG='$rggrava' and pf_cidade='$cidadegrava'";
        $achaexistepessoa332= mysql_db_query($banco,$achaexistepessoa33,$conexao);
        $achaexistepessoa333=mysql_fetch_array($achaexistepessoa332);
        $contadorexistencia=$achaexistepessoa333["CONTADOR"];

        if ($contadorexistencia=="1"){
          $jaexistepessoa="sim";
          echo "</br>Existe ja uma Pessoa com este RG nesta Cidade";
          $codigomensagem="inclusao";
          $status="cancelar";
        }
        else
        {

         $grava = "INSERT INTO pessoafisica(id_dados,pf_nome,pf_nascimento,pf_sexo,pf_cpf,pf_rua,pf_email,
         PF_RG,ID_BAIRRO,ID_CEP,PF_NUMERO,PF_COMP,id_usuario_proprietario,pf_cidade,
         PF_CELULAR1,PF_CELULAR2,PF_TELEFONE1,PF_TELEFONE2)
         values ('$sequencia','$nome','$nascimentograva','$sexograva','$cpf','$rua5grava',
         '$emailgrava','$rggrava','$bairrograva','$cep','$numerograva','$complementograva','$edusuario','$cidadegrava',
         '$fone1','$fone2','$fone3','$fone4'
         )";
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

         $grava5= "INSERT INTO pessoa(id_pessoa,id_dados_fisica)
         values ('$sequencia23','$sequencia')";
         $res = mysql_db_query($banco,$grava5,$conexao);

         $mensagemtela="</br>Inclus„o com Sucesso";
         $status="cancelar";
        }//teste de rg na cidade


      }//QUANDO … BRASIL
    }


 }



}//final da acaocde incluir



if ($status=="editar"){

$sqlacharita58="select ID_DADOS,PF_NOME,PF_EMAIL,PF_NASCIMENTO,PF_SEXO,PF_CPF,PF_RG,
PF_RUA,ID_BAIRRO,ID_CEP,PF_NUMERO,PF_COMP,PF_CIDADE,PF_CELULAR1 FONE1,PF_CELULAR2 FONE2,
PF_TELEFONE1 FONE3,PF_TELEFONE2 FONE4
FROM pessoafisica where
id_dados='$codigoachou' ";

$sqlacharita518= mysql_db_query($banco,$sqlacharita58,$conexao);
while ($valor4=mysql_fetch_array($sqlacharita518))
{
          $nomeachou=$valor4["PF_NOME"];
          $codigoachou=$valor4["ID_DADOS"];
          $emailgrava=$valor4["PF_EMAIL"];
          $nascimentograva=$valor4["PF_NASCIMENTO"];
          $sexograva=$valor4["PF_SEXO"];
          $cpf=$valor4["PF_CPF"];
          $rggrava=$valor4["PF_RG"];
          $rua5grava=$valor4["PF_RUA"];
          $bairrograva=$valor4["ID_BAIRRO"];
          $cep=$valor4["ID_CEP"];
          $numerograva=$valor4["PF_NUMERO"];
          $complementograva=$valor4["PF_COMP"];
          $cidadegrava=$valor4["PF_CIDADE"];
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

  if(empty($nome) or empty($rggrava) or empty($sexograva)  or empty($cidadegrava) or empty($emailgrava)
    or empty($nascimentograva))
    {
      $mensagemtela="Existem Campos ObrigatÛrios N„o Preenchidos</br>";
      $codigomensagem="edicao";





      if(empty($rggrava)){$simboloobrigatoriorg="sim";}
      if(empty($nome)){$simboloobrigatorionome="sim";}
      if(empty($sexograva)){$simboloobrigatoriosexo="sim";}
      if(empty($cidadegrava)){$simboloobrigatoriocidade="sim";}
      if(empty($emailgrava)){$simboloobrigatorioemail="sim";}
      if(empty($nascimentograva)){$simboloobrigatorionascimento="sim";}


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



     if(empty($cpf) and  $paisbrasil=="1")
     {
      $mensagemtela="… ObrigatÛrio definir CPF..";
      $simboloobrigatoriocpf="sim";
      $codigomensagem="edicao";
      $status="cancelar";
     }
     ELSE
     {

        $achaexistepessoa33= "SELECT count(*) CONTADOR from pessoafisica where
        PF_RG='$rggrava' and pf_cidade='$cidadegrava' and id_dados not  in('$codigoachou')";
        $achaexistepessoa332= mysql_db_query($banco,$achaexistepessoa33,$conexao);
        $achaexistepessoa333=mysql_fetch_array($achaexistepessoa332);
        $contadorexistencia=$achaexistepessoa333["CONTADOR"];



        if ($contadorexistencia=="1"){
          $jaexistepessoa="sim";
          $mensagemtela="</br>Existe ja uma Pessoa com este RG nesta Cidade";
          $codigomensagem="2";
          $status="cancelar";
        }
        else
        {
        $grava ="update  pessoafisica set PF_NASCIMENTO='$nascimentograva',pf_email='$emailgrava',
        PF_SEXO='$sexograva',PF_CPF='$cpf',pf_rg='$rggrava',pf_rua='$rua5grava',pf_numero='$numerograva',
        pf_comp='$complementograva',id_bairro='$bairrograva',id_cep='$cep',PF_NUMERO='$numerograva',
        PF_COMP='$complementograva',PF_CIDADE='$cidadegrava',PF_CELULAR1='$fone1',PF_CELULAR2='$fone2',
        PF_TELEFONE1='$fone3',PF_TELEFONE2='$fone4',pf_nome='$nome'
        where id_dados='$codigoachou' ";
        $res = mysql_db_query($banco,$grava,$conexao);
        $status="cancelar";
        $codigomensagem="edicao";

        }//teste de rg na cidade


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

                       <tr>
                       <td>Data Nascimento:</td>

                         <?


                         if ($simboloobrigatorionascimento=="sim"){ $corobrigatorio="red";}else{$corobrigatorio="white";}?>


                       <td>
                       <input type=text name="nascimentograva" size=36 style="background-color: <?echo $corobrigatorio;?>"
                       value="<? echo $nascimentograva;?>" style="background-color: white" <?echo $acao;?>>
                       </td>

                       <tr>
                       <td>Sexo:</td>




                        <?if ($simboloobrigatoriosexo=="sim"){ $corobrigatorio="red";}else{$corobrigatorio="white";}?>




                       <td>
                       <select name="sexograva" style="background-color: <?echo $corobrigatorio;?>" <?echo $acao;?>>
                       <option value="<? echo $sexograva;?>"><? echo $sexograva;?></option>
                       <option value="M">Masculino</option>
                       <option value="F">Feminino</option>
                       </select>
                       </td>
                       </tr>

                       <tr>
                      <td>CPF:</td>
                      <?if ($simboloobrigatoriocpf=="sim"){ $corobrigatorio="red";}else{$corobrigatorio="white";}?>

                      <td><input type="text"  style="background-color: <?echo $corobrigatorio;?>"<?echo $acao;?> name="cpf"
                      value="<?echo $cpf;?>" onKeyPress="MascaraCPF(teste.cpf);"
                      maxlength="14"  ></td>

                     </tr>



                     <tr>
                      <td>Rg:</td>
                       <?if ($simboloobrigatoriorg=="sim"){ $corobrigatorio="red";}else{$corobrigatorio="white";}?>

                       <td>
                       <input type=text name="rggrava" maxlength="14" value="<? echo $rggrava;?>"
                       style="background-color: <?echo $corobrigatorio;?>" <?echo $acao;?>></td>
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
                        <?
                        $achaexisteusuario1= "SELECT count(*) CONTADOR from Usuarios  where USU_LOGIN='$emailgrava'";
                        $achaexisteusuario2= mysql_db_query($banco,$achaexisteusuario1,$conexao);
                        $achaexisteusuario3=mysql_fetch_array($achaexisteusuario2);
                        $existejausu=$achaexisteusuario3["CONTADOR"];

                        if ($existejausu=="1"){ $acaoemail="disabled";}else{$acaoemail="";}


                        ?>

                       <td>
                       <input type=text name="emailgrava" size=36   value="<?echo $emailgrava;?>" <? echo "$acaoemail";?> ></td>


                     </tr>
                     <tr>
                      <td>Data Nascimento:</td>
                      <td><input type=text name="nascimentograva" size=36   value="<?echo $nascimentograva;?>"></td>

                      </tr>
                      <tr>
                      <td>Sexo:</td>
                      <td><select name="sexograva">
                      <option value="<?echo $sexograva;?>"><?echo $sexograva;?></option>
                      <option value="M">Masculino</option>
                      <option value="F">Feminino</option>
                      </select>

                      </td>

                     </tr>

                     <tr>
                      <td>CPF:</td>
                      <?if ($simboloobrigatoriocpf=="sim"){ $corobrigatorio="red";}else{$corobrigatorio="white";}?>

                      <td><input type="text"  style="background-color: <?echo $corobrigatorio;?>" name="cpf"
                      value="<?echo $cpf;?>" onKeyPress="MascaraCPF(teste.cpf);"
                      maxlength="14"  ></td>

                     </tr>


                     <tr>
                      <td>Rg:</td>
                       <?if ($simboloobrigatoriorg=="sim"){ $corobrigatorio="red";}else{$corobrigatorio="white";}?>

                       <td>
                       <input type=text name="rggrava" maxlength="14" value="<? echo $rggrava;?>"
                       style="background-color: <?echo $corobrigatorio;?>" ></td>
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

                       $usuachacida= "SELECT DS_CIDADE from cidade where cd_cidade='$cidadegrava'";
                       $usuachacida2= mysql_db_query($banco,$usuachacida,$conexao);
                       $usuachacida3=mysql_fetch_array($usuachacida2);
                       $cidadedescricao=$usuachacida3["DS_CIDADE"];
                       echo $cidadedescricao;

                       ?>

                      </option>
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
<a href="pessoafisica_mi.php?navegando=sim&status=novo&codigoachou=<?echo $codigoachou;?>&buscarparametro=nao&simboloobrigatoriocpf=<?echo $simboloobrigatoriocpf;?>&simboloobrigatoriorg=<?echo $simboloobrigatoriorg;?>&simboloobrigatoriosexo=<?echo $simboloobrigatoriosexo;?>&imboloobrigatoriosexo=<?echo $simboloobrigatoriosexo;?>&simboloobrigatoriocidade=<?echo $simboloobrigatoriocidade;?>&simboloobrigatorioemail=<?echo $simboloobrigatorioemail;?>&simboloobrigatorionascimento=<?echo $simboloobrigatorionascimento;?>
&acao=1&nome=<?echo $nome;?>&rggrava=<?echo $rggrava;?>&sexograva=<?echo $sexograva;?>&cpf=<?echo $cpf;?>&cidadegrava=<?echo $cidadegrava;?>&emailgrava=<?echo $emailgrava;?>&nascimentograva=<?echo $nascimentograva;?>"
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
<a href="pessoafisica_mi.php?navegando=sim&status=editar&codigoachou=<?echo $codigoachou;?>&buscarparametro=nao&simboloobrigatoriocpf=<?echo $simboloobrigatoriocpf;?>&simboloobrigatoriorg=<?echo $simboloobrigatoriorg;?>&simboloobrigatoriosexo=<?echo $simboloobrigatoriosexo;?>&imboloobrigatoriosexo=<?echo $simboloobrigatoriosexo;?>&simboloobrigatoriocidade=<?echo $simboloobrigatoriocidade;?>&simboloobrigatorioemail=<?echo $simboloobrigatorioemail;?>&simboloobrigatorionascimento=<?echo $simboloobrigatorionascimento;?>
&acao=1&nome=<?echo $nome;?>&rggrava=<?echo $rggrava;?>&sexograva=<?echo $sexograva;?>&cpf=<?echo $cpf;?>&cidadegrava=<?echo $cidadegrava;?>&emailgrava=<?echo $emailgrava;?>&nascimentograva=<?echo $nascimentograva;?>"
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
              <a href="pessoafisica_mi.php?navegando=sim&status=cancelar&codigoachou=<?echo $codigoachou;?>&buscarparametro=nao"
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
              <a href="pessoafisica_mi.php?navegando=sim&buscarparametro=sim" style="text-decoration:none;color: black;">Consultar</a>
           </div>
          </td>



           <td width="70" height="30" align="center" bgcolor="#8B8B7A" style="border: thin outset #8B8B7A;"
           onMouseOver="this.bgColor='#CDCDB4'" onMouseOut="this.bgColor='#8B8B7A';this.style.border='thin outset #8B8B7A'"
           onMouseDown="this.style.border='thin inset #8B8B7A';"
           onMouseUp="this.style.border='thin outset #8B8B7A';">
           <div style="font-size: 12px; font-weight: bold;">
              <a href="pessoafisica_mi.php?navegando=sim&status=novo&acao=null" style="text-decoration:none;color: black;">Incluir</a>
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
              <a href="pessoafisica_mi.php?navegando=sim&status=elimina&codigoachou=<?echo $codigoachou;?>buscarparametro=nao"
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
          <td>Buscar por:</td>
          <td><input type="txt" name="nomebusca" size="25" value="<?echo $nomebusca;?>" onchange="this.form.submit()"></td>
          </tr>
          <tr>
          <td>Nome:</td>
          <td>
          <?

           $ultimo22bus= "SELECT PF_NOME  FROM pessoafisica where ID_DADOS='$codigoachoufinal'";
           $res722bus = mysql_db_query($banco,$ultimo22bus,$conexao);
           $totallinha3522bus=mysql_fetch_array($res722bus);
           $mostrabus=$totallinha3522bus["PF_NOME"];

          ?>

                      <select   name="codigoachoufinal" value="<?echo $codigoachoufinal;?>" onchange="this.form.submit()">
                      <option value=""><?echo $mostrabus;?></option>
                      <?

                      $stmt1 = "SELECT ID_DADOS,PF_NOME  FROM pessoafisica where PF_NOME like '%$nomebusca%'";
					  $res = mysql_db_query($banco,$stmt1,$conexao);
                      while ($valor8=mysql_fetch_array($res)) {
					     print "<option value=\"{$valor8["ID_DADOS"]}\">{$valor8["PF_NOME"]}</option>";
                  	  }
                      ?>
                      </select>
           </td>
           </tr>
           </table>

           <table>

           <?
           if ($codigoachoufinal >"0"){
            $achaelimina4= "SELECT pf_nome NOME,pf_cpf CPF,pf_rg RG  from pessoafisica where id_dados='$codigoachoufinal'";
            $achaelimina41= mysql_db_query($banco,$achaelimina4,$conexao);
            $achaelimina43=mysql_fetch_array($achaelimina41);
            $nomeahca7=$achaelimina43["NOME"];
            $rg7=$achaelimina43["RG"];
            $cpf7=$achaelimina43["CPF"];

            ?><font style='font-size: 14px;color: black;text-align:left;bold: Negrito' >
            <?echo "Nome:$nomeahca7</BR>";?>
            <?echo "Rg:$rg7</BR>";?>
            <?echo "Cpf:$cpf7</BR>";
           }
            ?>

           <tr>



           <td width="40" height="30" align="center" bgcolor="#8B8B7A" style="border: thin outset #8B8B7A;"
           onMouseOver="this.bgColor='#CDCDB4'" onMouseOut="this.bgColor='#8B8B7A';this.style.border='thin outset #8B8B7A'"
           onMouseDown="this.style.border='thin inset #8B8B7A';"
           onMouseUp="this.style.border='thin outset #8B8B7A';">
           <div style="font-size: 12px; font-weight: bold;">
              <a href="pessoafisica_mi.php?navegando=sim&status=editar&codigoachou=<?echo $codigoachoufinal;?>&buscarparametro=nao"
              style="text-decoration:none;color: black;">Confirma</a>
           </div>
           </td>




          <td width="40" height="30" align="center" bgcolor="#8B8B7A" style="border: thin outset #8B8B7A;"
           onMouseOver="this.bgColor='#CDCDB4'" onMouseOut="this.bgColor='#8B8B7A';this.style.border='thin outset #8B8B7A'"
           onMouseDown="this.style.border='thin inset #8B8B7A';"
           onMouseUp="this.style.border='thin outset #8B8B7A';">
           <div style="font-size: 12px; font-weight: bold;">
              <a href="pessoafisica_mi.php?navegando=sim&status=cancelar&codigoachou=<?echo $codigoachou;?>&buscarparametro=nao"
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
            $achaelimina4= "SELECT pf_nome NOME  from pessoafisica where id_dados='$codigoachou'";
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
              <a href="pessoafisica_mi.php?navegando=sim&status=finalizarexclusao&codigoachou=<?echo $codigoachou;?>"
              style="text-decoration:none;color: black;">Confirma</a>
           </div>
           </td>




          <td width="70" height="30" align="center" bgcolor="#8B8B7A" style="border: thin outset #8B8B7A;"
           onMouseOver="this.bgColor='#CDCDB4'" onMouseOut="this.bgColor='#8B8B7A';this.style.border='thin outset #8B8B7A'"
           onMouseDown="this.style.border='thin inset #8B8B7A';"
           onMouseUp="this.style.border='thin outset #8B8B7A';">
           <div style="font-size: 12px; font-weight: bold;">
              <a href="pessoafisica_mi.php?navegando=sim&status=cancelar&codigoachou=<?echo $codigoachou;?>&buscarparametro=nao"
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

