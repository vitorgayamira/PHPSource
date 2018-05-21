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

<body  width="100%" onLoad="document.teste.nome.focus();" >

<form action="pessoafisicamilenio.php"  name="teste"  method="POST" >


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
$iniciotela=$_GET['iniciotela'];
$codigoachouconsulta=$_GET['codigoachouconsulta'];

$statusnovapessoa=$_GET['statusnovapessoa'];
$acaoparametro=$_GET['acaoparametro'];
$cidadegrava=$_GET['cidadegrava'];
$nomebusca=$_GET['nomebusca'];
$statusparametro=$_GET['statusparametro'];


}

if ($continuarmesmatela=="sim"){

$statusparametro=$_POST['statusparametro'];
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
$rggrava=$_POST['rggrava'];
$cadastro=$_POST['cadastro'];

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


$iniciotela=$_POST['iniciotela'];

$nome=$_POST['nome'];
$statusnovapessoa=$_POST['statusnovapessoa'];
$acaoparametro=$_POST['acaoparametro'];
$codigosadege=$_POST['codigosadege'];

$pessoaassociada=$_POST['pessoaassociada'];
$cadastro=$_POST['cadastro'];

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
require("buscarcep.php");


$today = date('d/m/y H:i:s');



if (!IsSet($status)){$status="cancelar";}




if ($status=="finalizarexclusao"){


 $deletausuario1= "delete from pessoa_bi where codigo='$codigoachou'";
 $resdeleta1 = mysql_db_query($banco,$deletausuario1,$conexao);

 $mensagemtela="</br>Final da AÁ„o ,Verifique Eliminado  com Sucesso devido os Relacionamento de Banco";

    $status="cancelar";
    $codigoachou=null;



} //finl da exclusao final





if ($status=="cancelar"){

$codigoachou=null;
}


$gravacandidato="sim";


if ($status=="novo"){
      $simboloobrigatorionome="sim";
      $simboloobrigatorioemail="sim";
      $simboloobrigatoriocidade="sim";
      $simboloobrigatoriofone3="sim";
 }


if ($statusnovapessoa=="sim" and $status=="novo"){
//testa o  que ta em tela

$nome=strtr($nome, "·‡„‚ÈÍÌÛÙı˙¸Á¡¿√¬… Õ”‘’⁄‹«", "aaaaeeiooouucAAAAEEIOOOUUC");
	 $nome=strtoupper($nome);//converte maiuscula
     $emailgrava=strtolower($emailgrava);//converte minuscula


     $analisanome1="SELECT  DESCRICAO from pessoa_bi where id_tipo_pessoa='1'";
         $analisanome12= mysql_db_query($banco,$analisanome1,$conexao);
         while ($analisanome13=mysql_fetch_array($analisanome12))
         {
           $descricaopegou=$analisanome13["DESCRICAO"];
           $descricaopegou= ltrim($descricaopegou);//tira espaco brancoapos e antes
           $descricaopegou = preg_replace("/\s+/"," ",$descricaopegou);
	       $descricaopegou=strtr($descricaopegou, "·‡„‚ÈÍÌÛÙı˙¸Á¡¿√¬… Õ”‘’⁄‹«", "aaaaeeiooouucAAAAEEIOOOUUC");
           $descricaopegou=strtoupper($descricaopegou);//converte maiuscula

           if ($descricaopegou==$nome){$gravacandidato="nao";}

         }



if(empty($nome)   or empty($cidadegrava) or empty($fone1) or empty($cep) or empty($cadastro) )
{
      $mensagemtela="Existem Campos ObrigatÛrios N„o Preenchidos</br>";
      $statusnovapessoa="nao";
      $status="editar";

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




         
         IF ($gravacandidato=="sim")
         {

         $ultimo = "SELECT MAX(CODIGO) SEQUENCIA FROM pessoa_bi";
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

         $grava = "INSERT INTO pessoa_bi(codigo,
             descricao,
             dt_nascimento,
             pf_sexo,
             nr_cpf,
             NM_LOGRADOURO,
             ds_email,
             nr_rg,
             nm_BAIRRO,
             nr_CEP,
             nr_endereco,
             ds_complemento,
             cd_cidade,
             PF_TELEFONE1,
             id_pessoa_candidata,id_tipo_pessoa,CD_PESSOA_ASSOCIADA,nr_cadastro
             )
             values ('$sequencia',
             '$nome',
             '$nascimentograva',
             '$sexograva',
             '$cpf',
             '$rua5grava',
             '$emailgrava',
             '$rggrava',
             '$bairrograva',
             '$cep',
             '$numerograva',
             '$complementograva',
             '$cidadegrava',
             '$fone1',
              'N','1','$pessoaassociada','$cadastro'
              )";
              //echo "$grava";
              $res = mysql_db_query($banco,$grava,$conexao);
              
              $ultimonome = "SELECT DESCRICAO  FROM pessoa_bi WHERE CODIGO='$pessoaassociada'";
         $res7nome = mysql_db_query($banco,$ultimonome,$conexao);
         $totallinha35nome=mysql_fetch_array($res7nome);
         $nomeempresaassociada5=$totallinha35nome["DESCRICAO"];

            //transmite para os drmaisbancos fora o site , sejam eles mysql ou  oracle
              require("TRANSMITEPESSOAFISICA2.php");
              //final da tramsissao


         $codigoachou=$sequencia;

         $mensagemtela="</br>Inclus„o com Sucesso";
         $status="cancelar";
         }
         else
         {
          $mensagemtela="</br>Este Nome j· esta sendo Utilizado";
          $status="editar";
         }





      }

 $statusnovapessoa="nao";
}

if ($statusnovapessoa=="nao" and $status=="editar"){
 $entra="editando";
 $nome=strtr($nome, "·‡„‚ÈÍÌÛÙı˙¸Á¡¿√¬… Õ”‘’⁄‹«", "aaaaeeiooouucAAAAEEIOOOUUC");
	 $nome=strtoupper($nome);//converte maiuscula
     $emailgrava=strtolower($emailgrava);//converte minuscula



if(empty($nome)   or empty($cidadegrava) or empty($fone1) or empty($cep) or empty($cadastro))
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

           $anopes=substr($nascimentograva,6,4);
           $mespes=substr($nascimentograva,3,2);
           $diapes=substr($nascimentograva,0,2);

           $gravanascipess=$anopes."-".$mespes."-".$diapes;
         

           $grava ="update  pessoa_bi set dt_nascimento='$gravanascipess',
        PF_SEXO='$sexograva',nr_cpf='$cpf',nr_rg='$rggrava',NM_LOGRADOURO='$rua5grava',nr_endereco='$numerograva',
        ds_complemento='$complementograva',nm_BAIRRO='$bairrograva',nr_cep='$cep',
        cd_cidade='$cidadegrava',PF_TELEFONE1='$fone1',
        ds_EMAIL='$emailgrava',
        descricao='$nome',CD_PESSOA_ASSOCIADA='$pessoaassociada',NR_CADASTRO='$cadastro'
        where codigo='$codigoachou' ";




       $mensagemtela="AtualizaÁ„o com Sucesso";
       $res = mysql_db_query($banco,$grava,$conexao);


           $ultimonome = "SELECT DESCRICAO  FROM pessoa_bi WHERE CODIGO='$pessoaassociada'";
         $res7nome = mysql_db_query($banco,$ultimonome,$conexao);
         $totallinha35nome=mysql_fetch_array($res7nome);
         $nomeempresaassociada5=$totallinha35nome["DESCRICAO"];



       //transmite para os drmaisbancos fora o site , sejam eles mysql ou  oracle
              require("TRANSMITEPESSOAFISICA8.php");
              //final da tramsissao



         $mensagemtela="</br>Atualizado  com Sucesso";
         $status="editar";







 $statusnovapessoa="nao";
}




}

//final


?>



<div  style="display: block;" id="mostratelaabertura2juri">


<table width="99%" >

          <tr>
          <td><titulo><?echo "Cadastro de Pessoa FÌsica";?></titulo></td>
          </td>


          </tr>


</table>

</br>
<table width="99%">
<tr>
<td align=right>
<?
if (!IsSet($status)  or $status=="cancelar"){
?>



<a href="pessoafisicamilenio.php?navegando=sim&status=novo&statusnovapessoa=sim">
<img src="incluirnovocva.png" width="42" height="38" ></a>

<a href="carregamenumaximiza.php">
<img src="sairtela.png" width="42" height="38"></a>

<a href="pessoafisicamilenio.php?navegando=sim&statusnovapessoa=nao&acaoparametro=selecionar&iniciotela=sim&statusparametro=buscarparametro">
<IMG src="pesquisarnovocva.png" width="42" height="38" ></a>


<?}

if ($status=="novo" ){
?>

<a href="#" onclick="document.forms[0].submit();return false;">
<IMG src="salvarnovocva.png" width="42" height="38" ></a>

<input type="hidden" name="status" value="novo">
<input type="hidden" name="statusnovapessoa" value="sim">

<a href="pessoafisicamilenio.php?navegando=sim&status=cancelar&statusnovapessoa=sim">
<img src="sairtela.png" width="42" height="38"></a>


<a href="pessoafisicamilenio.php?navegando=sim&status=novo&statusnovapessoa=sim">
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

<a href="pessoafisicamilenio.php?navegando=sim&status=novo&statusnovapessoa=sim">
<img src="incluirnovocva.png" width="42" height="38" ></a>

<a href="pessoafisicamilenio.php?navegando=sim&acaoparametro=selecionar&statusparametro=buscarparametro">
<IMG src="selecionarnovocva.png" width="42" height="38" ></a>

<a href="pessoafisicamilenio.php?navegando=sim&status=editar&acaoparametro=eliminar&codigopessoaatual=<?echo $codigoachou;?>&statusparametro=buscarparametro">
<IMG src="eliminarnovocva.png" width="42" height="38" ></a>

<?

if(empty($codigoachou))
{
?>
<a href="carregamenumaximiza.php">
<img src="sairtela.png" width="42" height="38"></a>
<?}
else
{
?>
<a href="pessoafisicamilenio.php?navegando=sim&status=editar&codigoachou<?echo $codigoachou;?>">
<img src="sairtela.png" width="42" height="38"></a>
<?}





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
<input type="hidden" name="status" value="incluirpessoa">
<input type="hidden" name="etapacadastro" value="1">






<?


             //DEFINA PAGINACAO
             $chacontadorgeral="select count(*) CONTADOR FROM pessoa_bi where id_tipo_pessoa='1'";
             $registros = "13";
             require("paginacao_mi.php");


            //FINAL PAGINACAO


$achasegmento1="SELECT a.codigo CODIGO,a.descricao NOME,b.ds_cidade CIDADE,a.ds_email EMAIL,a.nr_cpf CPF
from pessoa_bi a, cidade b
            where a.cd_cidade=b.cd_cidade and
            id_tipo_pessoa='1'
            order by a.descricao asc
            limit $inicio,$registros
            ";


          ?>
          <table  width="100%" ID="grid" >
          <tr class="difa">
          <td><b>Nome</b></td>
          <td><b>Cpf</b></td>
          <td><b>Cidade</b></td>
          <td><b>Email</b></td>
          <td><b>Telefone</br>Comercial</b></td>

          </tr>

          <?
      	  $achasegmento2= mysql_db_query($banco,$achasegmento1,$conexao);
          while ($achasegmento3=mysql_fetch_array($achasegmento2))
          {
           $nome8=$achasegmento3["NOME"];
           $nome81=$achasegmento3["CPF"];
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
                     <a href="pessoafisicamilenio.php?navegando=sim&buscarparametro=nao&pagina_atual=<?echo $anteriorpagina;?>&status=cancelar&statusnovapessoa=nao">
                     <img src="setaesquerda.png" width="20" height="14" ></a>
                    <a href="pessoafisicamilenio.php?navegando=sim&buscarparametro=nao&pagina_atual=<?echo $proximapagina;?>&status=cancelar&statusnovapessoa=nao">
                    <img src="setadireita.png" width="20" height="14" ></a>
                    </td>
                    </tr>
                    </table>


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
                      <td><input type=text name="nome" size=36  style="border-color:red"
                      value="<? echo $nome;?>" >

                      Cadastro:
                      <input type="txt" name="cadastro"  size="15" style="border-color:red"
                      value="<?echo $cadastro;?>"  ></td>
                      </tr>


                      <tr class="dif">
                      <td>Email:</td>
                      



                       <td>
                       <input type=text name="emailgrava" size=36   value="<? echo $emailgrava;?>" >
                       </td>
                       </tr>

                       <tr class="dif">
                       <td>Data Nascimento:</td>



                       <td>
                       <input type=text name="nascimentograva" size=36
                       value="<? echo $nascimentograva;?>" >

                       Sexo:



                       <select name="sexograva"  >
                       <option value="<? echo $sexograva;?>"><? echo $sexograva;?></option>
                       <option value="M">Masculino</option>
                       <option value="F">Feminino</option>
                       </select>
                       </td>
                       </tr>

                       <tr class="dif">
                      <td>CPF:</td>

                      <td><input type="text"    name="cpf"
                      value="<?echo $cpf;?>" onKeyPress="MascaraCPF(teste.cpf);"
                      maxlength="14"  >
                      Rg:
                       <input type=text name="rggrava" maxlength="14" value="<? echo $rggrava;?>"
                       ></td>
                      </tr>

                     <tr class="dif">
                     <td>
                     Cep:
                     </td>
                     <td>
                     <input type="txt" name="cep"  size="9" value="<?echo $cep;?>" style="border-color:red"
                     onKeyPress="MascaraCep(teste.cep);" onchange="this.form.submit()" >

                     Logradouro:
                     <input type="txt" name="rua5grava"  value="<?echo $rua5grava;?>" size="35"
                     style="background-color: #CDCDC1" disabled>

                     N˙mero:

                     <input type="txt" name="numerograva"  value="<?echo $numerograva;?>" size="2"
                     style="background-color: white"  >
                     </td>
                     </tr>
                     
                     <tr class="dif">
                     <td>
                     Complemento:
                     </td>
                     <td>

                     <input type="txt" name="complementograva" value="<?echo $complementograva;?>"  size="45"
                     style="background-color: white" >
                     </td>

                     </tr>


                     
                     <?
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
                     Telefone
                     </td>
                     <td><input type="txt" name="fone1"  size="25"  value="<?echo $fone1;?>"  style="border-color:red">

                     </td>
                     </tr>
                     
                     
                     
                     <tr class="dif">
                     <td>Pessoa jurÌdica </td>
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

                    <input type="hidden" name="continuarmesmatela" value="sim">
		            <input type="hidden" name="novologin" value="nao">
  		            <input type="hidden" name="codigoachou" value="<?echo $codigoachou;?>">
                    <hr>
                     <?
                    if(empty($mensagemtela))
                    {

                    }
                    else
                    {
                    ?>


                    <table width="100%">
                    <tr>
                    <td align=right>
                     <?echo "Incluindo um Novo Registro</br>";?>
                     <?echo "$mensagemtela";?>
                    </td>
                    </tr>
                    </table>
                    <?}?>
                    </div>






<?
}//final doaincluir ou cancelar



if (($status=="editar") or ($statusnovapessoa=="selecionar")){

                //if ($acaoparametro=="selecionar")
                //{

$sqlacharita58v=" select CODIGO ID_DADOS,DESCRICAO PF_NOME, DS_EMAIL PF_EMAIL,DT_NASCIMENTO PF_NASCIMENTO,
PF_SEXO, NR_CPF PF_CPF,NR_RG PF_RG,
nm_LOGRADOURO PF_RUA, nm_BAIRRO ID_BAIRRO, NR_CEP ID_CEP,nr_endereco PF_NUMERO, DS_COMPLEMENTO PF_COMP,
CD_CIDADE PF_CIDA,
DS_EMaIL PF_EMAIL,
PF_TELEFONE1 FONE1,
CD_PESSOA_ASSOCIADA ASSOCIADA,NR_CADASTRO
FROM pessoa_BI where
                 CODIGO='$codigoachou'
";
                 



                 $sqlacharita58v2= mysql_db_query($banco,$sqlacharita58v,$conexao);
                 $valor4=mysql_fetch_array($sqlacharita58v2);
                 $nome=$valor4["PF_NOME"];
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
          $codigof4=$valor4["ASSOCIADA"];
          $cadastro=$valor4["NR_CADASTRO"];

          
                       $achaexisteusuario1= "SELECT count(*) CONTADOR FROM usuario_bi where nm_usuario='$emailgrava'";
                       $achaexisteusuario12= mysql_db_query($banco,$achaexisteusuario1,$conexao);
                       $achaexisteusuario13=mysql_fetch_array($achaexisteusuario12);
                       $existeusuario6=$achaexisteusuario13["CONTADOR"];


               // }




                if ($simboloobrigatorionome=="sim" ){$corobrigatorio="red";}?>
                <?if ($simboloobrigatorioemail=="sim"){$corobrigatorio="red";}?>
                <?if ($simboloobrigatoriofone3=="sim"){$corobrigatorio="red";}?>


                <?if ($simboloobrigatoriocidade=="sim"){$corobrigatorio="red";}?>




              <div  style="display: block;" id="mostraresutadojuridica">

                <table width="100%" ID="alter">
                      <tr class="dif">


                      
                      
                      <tr class="dif">
                      <td>Nome:</td>
                        <td><input type=text name="nome" size=36 value="<?echo $nome;?>"
                        style="border-color:red">

                        Cadastro:<input type="txt" name="cadastro"  size="15" style="border-color:red"
                      value="<?echo $cadastro;?>"  ></td>
                      </tr>





                     <tr class="dif">
                      <td>Email:</td>


                        <td>

                        <input type=text name="emailgrava" size=36   value="<?echo $emailgrava;?>" >
                        </td>

                     </tr>

                     <tr class="dif">
                      <td>Data Nascimento:</td>
                      <td><input type=text name="nascimentograva" size=36   value="<?echo $nascimentograva;?>">
                      Sexo:
                      <select name="sexograva" >
                      <option value="<?echo $sexograva;?>"><?echo $sexograva;?></option>
                      <option value="M">Masculino</option>
                      <option value="F">Feminino</option>
                      </select>

                      </td>

                     </tr>


                     <tr class="dif">
                      <td>CPF:</td>

                      
                      <td><input type="text"   name="cpf"
                      value="<?echo $cpf;?>" onKeyPress="MascaraCPF(teste.cpf);"
                      maxlength="14"  >
                      Rg:
                       <input type=text name="rggrava" size=36  value="<?echo $rggrava;?>"    >
                       </td>
                      </tr>


                     <tr class="dif">
                     <td>Cep:</td>
                     <td><input type="txt" name="cep"  size="9"  value="<?echo $cep;?>" style="border-color:red"
                     onKeyPress="MascaraCep(teste.cep);"  >
                     <a href="#" onclick="document.forms[0].submit();return false;">
          Validar</a>




                     Logradouro:
                     <input type="txt" name="rua5grava"  value="<?echo $rua5grava;?>" size="45"
                     style="background-color: #CDCDC1" disabled  >
                     </br>Numero:
                     <input type="txt" name="numerograva"  size="2"  value="<?echo $numerograva;?>">
                     </td>
                     </tr>
                     
                     <tr class="dif">
                     <td>Complemento:</td>
                     <td>
                     <input type="txt" name="complementograva"  size="85"  value="<?echo $complementograva;?>" >

                     </td>
                     </tr>




                     <?
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
                     Telefone
                     </td>
                     <td><input type="txt" name="fone1"  size="25"  value="<?echo $fone1;?>" style="border-color:red" >


                     </td>
                     </tr>
                     
                     <tr class="dif">
                     
                     <?
                     
                       $usuachacidape= "SELECT CODIGO,DESCRICAO FROM pessoa_bi where codigo='$codigof4'";
                       $usuachacida2pe= mysql_db_query($banco,$usuachacidape,$conexao);
                       $usuachacida3pe=mysql_fetch_array($usuachacida2pe);
                       $pessoa66=$usuachacida3pe["CODIGO"];
                       $descricao66=$usuachacida3pe["DESCRICAO"];

                     ?>
                     
                     
                     <td>Pessoa jurÌdica</td>
                     <td><select    name="pessoaassociada" style='font-size: 10px;color: blue;text-align:right;bold: Negrito'>
                     <option value="<?echo $pessoa66;?>"><?echo $descricao66;?></option>

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

                    <input type="hidden" name="continuarmesmatela" value="sim">
		            <input type="hidden" name="novologin" value="nao">
                    <input type="hidden" name="codigoachou" value="<?echo $codigoachou;?>">
                    
                    <input type="hidden" name="statusnovapessoa" value="nao">
                    

                    
                    <?
                    if(empty($mensagemtela))
                    {
                     ?>
                    <hr>

                    <table width="100%">
                    <tr>
                    <td align=right>
                     <?echo "Editando Pessoa FÌsica";?>
                    </td>
                    </tr>
                    </table>
                    <?
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

<?
}//final editar




}//final quando nao e inicio de tela
?>




</div>


<?


if ($statusparametro=="buscarparametro" ){

if ($acaoparametro=="selecionar")
{
?>
<div  style="display: block;" id="mostrapessoajuridica">


          <table width="99%">

          <tr>
          <td><titulo><?echo "Selecionando Pessoa Fisica";?></titulo></td>

          </tr>
          </table>
          </br></br>


          <table width="99%">
          <tr>

          <td width="20%">Nome:</td>
          <td><input type="txt" name="nomebusca" size="25" value="<?echo $nomebusca;?>" >

          Cidade:<select   name="codigocidade" value="<?echo $codigocidade;?>" >
                      <option value=""></option>
                      <?

                      $stmt1 = "SELECT CD_CIDADE,DS_CIDADE  FROM cidade";
					  $res = mysql_db_query($banco,$stmt1,$conexao);
                      while ($valor8=mysql_fetch_array($res)) {
					     print "<option value=\"{$valor8["CD_CIDADE"]}\">{$valor8["DS_CIDADE"]}</option>";
                  	  }
                      ?>
             </select>
          </td>
          <td align=right>
          <a href="#" onclick="document.forms[0].submit();return false;">
          <IMG src="selecionarnovocva.png" width="42" height="38" ></a>

          <a href="pessoafisicamilenio.php?navegando=sim&status=cancelar">
           <img src="sairtela.png" width="42" height="38"></a>

          </td>

          </tr>
          </table>

<?
if(empty($codigoachoufinal))
{
?>
<input type="hidden" name="status" value="buscarparametro">
<input type="hidden" name="acaoparametro" value="selecionar">
<input type="hidden" name="continuarmesmatela" value="sim">
<input type="hidden" name="codigoachou" value="<?echo $codigoachoufinal;?>">
<input type="hidden" name="statusnovapessoa" value="selecionar">

<input type="hidden" name="statusparametro" value="buscarparametro">




<?
}
else
{

 ?>
<input type="hidden" name="status" value="editar">
<input type="hidden" name="continuarmesmatela" value="sim">
<input type="hidden" name="acaoparametro" value="selecionar">
<input type="hidden" name="codigoachou" value="<?echo $codigoachoufinal;?>">
<input type="hidden" name="statusnovapessoa" value="selecionar">
<input type="hidden" name="statusparametro" value="buscarparametro">
<?
}
?>

</br>
<table  width="100%" ID="grid" >
<tr class="difa">
<td><b>Nome<b></td>
<td><b>Cidade<b></td>
<td></td>

</tr>
<?

            //DEFINA PAGINACAO
            $chacontadorgeral="select count(*) CONTADOR FROM pessoa_bi
            where  descricao like '%$nomebusca%' and
                      cd_cidade like '%$codigocidade%' and id_tipo_pessoa='1'";
            $registros = "5";
            require("paginacao_mi.php");
            //FINAL PAGINACAO

            $chaprincipal="SELECT a.codigo CODIGO,a.descricao NOME,b.ds_cidade CIDADE from pessoa_bi a, cidade b
            where a.cd_cidade=b.cd_cidade and
            a.descricao like '%$nomebusca%' and
                      a.cd_cidade like '%$codigocidade%' and id_tipo_pessoa='1'
            limit $inicio,$registros";
            


         	$chaempresa2= mysql_db_query($banco,$chaprincipal,$conexao);

            while ($chaempresa3=mysql_fetch_array($chaempresa2)) {
              $codigopasa=$chaempresa3["CODIGO"];
		    ?>

	    <tr class="difr">
	    <td><p><?echo $chaempresa3["NOME"];?></p></td>
	    <td><?echo $chaempresa3["CIDADE"];?></td>
	    <td width="5%"><a href="pessoafisicamilenio.php?navegando=sim&status=editar&codigoachou=<?echo $codigopasa;?>&acaoparametro=<?echo $acaoparametro;?>">
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
    <a href="pessoafisicamilenio.php?navegando=sim&pagina_atual=<?echo $proximapagina;?>&status=buscarparametro&acaoparametro=selecionar&nomebusca=<?echo $nomebusca;?>&codigocidade=<?echo $codigocidade;?>&iniciotela=sim&statusparametro=buscarparametro">
    <img src="setadireita.png" width="20" height="14" ></a>
    <a href="pessoafisicamilenio.php?navegando=sim&buscarparametro=sim&pagina_atual=<?echo $anteriorpagina;?>&status=buscarparametro&acaoparametro=selecionar&nomebusca=<?echo $nomebusca;?>&codigocidade=<?echo $codigocidade;?>&iniciotela=sim&statusparametro=buscarparametro">
    <img src="setaesquerda.png" width="20" height="14" ></a>
    </td>
 </tr>
 </table>



</div>


 <?

}

if ($acaoparametro=="eliminar")
{
$achaelimina4= "SELECT descricao NOME  from pessoa_bi where codigo='$codigopessoaatual'";
            $achaelimina41= mysql_db_query($banco,$achaelimina4,$conexao);
            $achaelimina43=mysql_fetch_array($achaelimina41);
            $nomeahca7=$achaelimina43["NOME"];
?>
<div  style="display: block;" id="mostraexclusao">

          <tr>
          <td>
          <titulo2><?echo "ELiminando Registro";?></br>

          Nome:<?echo "$nomeahca7";?><titulo2>
          </td>

          </tr>
          </table>
          <hr>


               <center>Confirma EliminaÁ„o!</center>

           <input type="hidden" name="status" value="finalizarexclusao">
		   <input type="hidden" name="continuarmesmatela" value="sim">
		   <input type="hidden" name="buscarparametro" value="nao">
		   <input type="hidden" name="codigoachou" value="<?echo $codigopessoaatual;?>">
           
           <table width="99%">
           <tr>
           <td  align=right>
           <a href="#" onclick="document.forms[0].submit();return false;">
           <IMG src="confirmarnovocva.png" width="42" height="38" ></a>

           <a href="pessoafisicamilenio.php?navegando=sim&status=cancelar&buscarparametro=nao">
           <img src="sairtela.png" width="42" height="38"></a>
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

           <a href="pessoafisicamilenio.php?navegando=sim&status=cancelar&buscarparametro=nao">
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

