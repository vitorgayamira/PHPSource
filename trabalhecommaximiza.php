<? session_start();?>
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

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

function Verificar()
 {
  var tecla=window.event.keyCode;
  if (tecla==116) {alert("Utilize Apenas o Botão Gravar..."); event.keyCode=0;
event.returnValue=false;}
 }



function Botao2()
{


document.teste.action="trabalheconosco_mi.php";
document.forms.teste.submit();
}

function Botao3() {
	window.location = "trabalheconosco_mi.php?navegando=sim&status=cancelar"

}


function habilitar2() {
var objTXT2 = document.getElementById("botao1");
	objTXT2.disabled = false;
	
var objTXT2 = document.getElementById("botao3");
     objTXT2.disabled = true;


}

function Botao4() {
	window.location = "trabalheconosco_mi.php?navegando=sim&status=incluirarea&etapacadastro=2&nome=<?echo $nome;?>&nascimentograva=<?echo $nascimentograva;?>&sexograva=<?echo $sexograva;?>&cpf=<?echo $cpf;?>&rua5grava=<?echo $rggrava;?>&emailgrava=<?echo $emailgrava;?>&rggrava=<?echo $rggrava;?>&bairrograva=<?echo $bairrograva;?>&cep=<?echo $cep;?>&numerograva=<?echo $numerograva;?>&numerograva=<?echo $numerograva;?>&complementograva=<?echo $complementograva;?>&cidadegrava=<?echo $cidadegrava;?>&fone1=<?echo $fone1;?>&fone1=<?echo $fone1;?>&fone3=<?echo $fone3;?>&fone4=<?echo $fone4;?>&statusnovapessoa=sim"





}



function Botao5() {
	window.location = "trabalheconosco_mi.php?navegando=sim&status=incluirarea&etapacadastro=2&codigopessoacerta=<?echo $codigopessoacerta;?>&statusnovapessoa=<?echo $teste;?>"





}

function habilitar3() {

var objTXT4 = document.getElementById("botao4");
     objTXT4.disabled = false;
     
var objTXT2 = document.getElementById("botao1");
	objTXT2.disabled = false;

var objTXT3 = document.getElementById("botao5");
     objTXT3.disabled = true;




}


function Verificar()
 {
  var tecla=window.event.keyCode;
  if (tecla==116) {alert("Utilize Apenas o Botão Gravar..."); event.keyCode=0;
event.returnValue=false;}
 }

</script>






</head>

<body>


<form  name="teste"  method="POST" enctype="multipart/form-data" onKeyDown="javascript:Verificar()">


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
$etapacadastro=$_GET['etapacadastro'];
$buscarcidade=$_GET['buscarcidade'];
$acaoeliminarpdf=$_GET['acaoeliminarpdf'];
$documentopassa=$_GET['documentopassa'];
$arquivopassa=$_GET['arquivopassa'];
$arquivopassa2=$_GET['arquivopassa2'];

$acaoeliminararea=$_GET['acaoeliminararea'];
$segmentopassa=$_GET['segmentopassa'];
$cenariopassa=$_GET['cenariopassa'];
$processopassa=$_GET['processopassa'];
$iniciotela=$_GET['iniciotela'];
$codigopessoaatual=$_GET['codigopessoaatual'];
$statusnovapessoa=$_GET['statusnovapessoa'];
$acaoeliminararea=$_GET['acaoeliminararea'];
$acaoeliminarpdf=$_GET['acaoeliminarpdf'];





}

if ($continuarmesmatela=="sim"){

$etapacadastro=$_POST['etapacadastro'];

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
$etapacadastro=$_POST['etapacadastro'];
$areanegocio55=$_POST['areanegocio55'];
$processo55=$_POST['processo55'];
$cenario55=$_POST['cenario55'];
$codigopessoaatual=$_POST['codigopessoaatual'];
$iniciotela=$_POST['iniciotela'];
$statusnovapessoa=$_POST['statusnovapessoa'];
$codigopessoaatual=$_POST['codigopessoaatual'];
$acaoeliminarpdf=$_POST['acaoeliminarpdf'];
$grupo55=$_POST['grupo55'];
$banco55=$_POST['banco55'];
$empresa55=$_POST['empresa55'];
$codigosadege=$_POST['codigosadege'];



}





$banco="site_maximiza";
$username_https="root";
$password_https="di2040";
$hostname_https="Localhost";




//CHAMA O MENU PELA CONEXAO

require("estilo2_sitenovo.css");



$today = date('d/m/y H:i:s');

require("configuramysqlversa2.php");


if (!$conexao) {
    die('Não foi possível conectar: ' . mysql_error());
}




if(empty($cep))
{
}
else
{
require("buscarcep.php");
}


require("topomaximiza.php");

?>

<div  style="display: block;" id="mostrafaleconosco">

<?


if (!IsSet($status)){$status="cancelar";}

if ($status=="cancelar"){




         if ($codigopessoaatual>"0"){
         //enviou  de email


                 //final do email
          }
          


         $eminacancel63= "delete from candidato_pessoa_bi  where cd_pessoa_fisica='$codigopessoaatual'";
         $res = mysql_db_query($banco,$eminacancel63,$conexao);




         $eminacancel6= "delete from pessoa_bi where codigo='$codigopessoaatual'";
         $res = mysql_db_query($banco,$eminacancel6,$conexao);






         $codigoachou=null;
         $iniciotela="sim";



} //final do cancelar

if ($status=="finalizar"){




          $eminacancel6 = "update  pessoa_bi set id_pessoa_candidata='S'
           where codigo='$codigopessoaatual'";
          $res = mysql_db_query($banco,$eminacancel6,$conexao);

 if ($codigopessoaatual>"0"){
 //enviou  de email


         $codigoachou=null;
         $iniciotela="sim";
         $status="cancelar";

    }

ECHO "Você acaba de Finalizar o Estudo";

}//do finalizar






if ($iniciotela=="sim" )
{


?>
<input type="hidden" name="iniciotela" value="nao">
<input type="hidden" name="status" value="incluirpessoa">
<input type="hidden" name="etapacadastro" value="1">
</br></br>
<table width="70%">
                <tr>

                       <td width="30%">Nome:</td>
                       <td width="70%">
                       <input type=text name="nome" size=36  style="background-color: #CDCDC1" disabled >

                       </td>


                </tr>


                      </tr>

                      <tr>
                       <td width="30%">Email:</td>
                       <td width="70%">
                       <input type=text name="emailgrava" size=36 style="background-color: #CDCDC1" disabled>
                       </td>


                       </tr>

                       <tr>
                       <td width="30%">Data Nascimento:</td>

                       <td width="70%">
                       <input type=text name="nascimentograva" maxlength="10" size=8  style="background-color: #CDCDC1"disabled>
                       </td>

                       <tr>
                       <td width="30%">Sexo:</td>
                       <td width="70%">
                       <input type=text name="sexograva" maxlength="10" size=5  style="background-color: #CDCDC1" disabled>

                       </td>
                       </tr>

                       <tr>
                      <td width="30%">CPF:</td>


                      <td width="70%"><input type="text"  name="cpf" maxlength="14"  style="background-color: #CDCDC1" disabled></td>

                     </tr>




                     <tr>
                      <td width="30%">Rg:</td>

                       <td width="70%">
                       <input type=text name="rggrava" maxlength="14" style="background-color: #CDCDC1" disabled></td>
                      </tr>

                      <tr>


                      <tr>
                      <td width="30%">Cep:</td>

                       <td width="70%">
                       <input type=text name="rggrava" size="9" style="background-color: #CDCDC1" disabled></td>
                      </tr>

                      <tr>

                      <tr>
                      <td width="30%">Cidade:</td>

                       <td width="70%">
                       <input type=text name="rggrava" size="9" style="background-color: #CDCDC1" disabled></td>
                      </tr>

                      <tr>

                      <tr>
                      <td width="30%">Bairro:</td>

                       <td width="70%">
                       <input type=text name="rggrava" size="35" style="background-color: #CDCDC1" disabled></td>
                      </tr>

                      <tr>

                      <tr>
                      <td width="30%">Logradouro:</td>

                       <td width="70%">
                       <input type=text name="rggrava" size="50" style="background-color: #CDCDC1" disabled></td>
                      </tr>

                      <tr>

                      <tr>
                      <td width="30%">Número:</td>

                       <td width="70%">
                       <input type=text name="rggrava" size="5" style="background-color: #CDCDC1" disabled></td>
                      </tr>

                      <tr>

                      <tr>
                      <td width="30%">Complemento:</td>

                       <td width="70%">
                       <input type=text name="rggrava" size="5" style="background-color: #CDCDC1" disabled></td>
                      </tr>

                      <tr>


                      <tr>
                      <td width="30%">Telefone :</td>

                       <td width="70%">
                       <input type=text name="rggrava" size="10" style="background-color: #CDCDC1" disabled></td>
                        </tr>


                    </table>
<?

$etapacadastro="1";


}
else
{






if ($status=="incluirpessoa" and $etapacadastro=="1"){




//testa pessoa existe

$sqlacharita58="select CODIGO,DESCRICAO,DS_EMAIL,DT_NASCIMENTO,PF_SEXO,NR_CPF,NR_IDENTIDADE FROM pessoa_bi where
descricao='$nomegravapessoa'  and id_tipo_pessoa='1'";

$sqlacharita518= mysql_db_query($banco,$sqlacharita58,$conexao);
$sqlacharita5181=mysql_fetch_array($sqlacharita518);

$nomeachou=$sqlacharita5181["DESCRICAO"];
$codigoachou=$sqlacharita5181["CODIGO"];
$rgachou=$sqlacharita5181["NR_IDENTIDADE"];

$nomegrava=$nome;

  //teste de nome
	 
     $nome= ltrim($nome);//tira espaco brancoapos e antes
     $nome = preg_replace("/\s+/","_",$nome);
	 $nome=strtr($nome, "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ", "aaaaeeiooouucAAAAEEIOOOUUC");
     $nome=strtoupper($nome);//converte maiuscula


 $gravacandidato="sim";
     $analisanome1="SELECT  DESCRICAO from pessoa_bi where id_tipo_pessoa='1'";
$analisanome12= mysql_db_query($banco,$analisanome1,$conexao);
while ($analisanome13=mysql_fetch_array($analisanome12))
{
           $descricaopegou=$analisanome13["DESCRICAO"];
           $descricaopegou= ltrim($descricaopegou);//tira espaco brancoapos e antes
           $descricaopegou = preg_replace("/\s+/","_",$descricaopegou);
	       $descricaopegou=strtr($descricaopegou, "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ", "aaaaeeiooouucAAAAEEIOOOUUC");
           $descricaopegou=strtoupper($descricaopegou);//converte maiuscula
           
           if ($descricaopegou==$nome){$gravacandidato="nao";}

}




  //final do teste nome
  
  
     $nome=$nomegrava;
     $nome=strtoupper($nome);//converte maiuscula
     $emailgrava=strtolower($emailgrava);//converte minuscula




    
     $achapais= "SELECT COUNT(*) CONTADOR from pais_bi a,estado b,cidade c
     where c.cd_cidade='$cidadegrava' AND
     c.cd_estado=b.cd_estado and
     b.cd_pais=a.cd_pais and
     a.id_brasil='S'";
     $achapais2= mysql_db_query($banco,$achapais,$conexao);
     $achapais3=mysql_fetch_array($achapais2);
     $paisbrasil=$achapais3["CONTADOR"];
     
     

 if(empty($nome)  or empty($cidadegrava) or empty($fone3) or empty($emailgrava) or empty($cep) or empty($bairrograva))
 {
      $mensagemtela="Obrigatório Definir Nome,Telefone Comercial, Email e Cep";

      $simboloobrigatorionome="sim";
      $simboloobrigatorioemail="sim";
      $simboloobrigatoriocidade="sim";
      $simboloobrigatoriofone3="sim";
      $simboloobrigatoriocep="sim";

      $status="incluirpessoa";
      $etapacadastro="1";
  }
  else
  {





        
          $achaexistepessoa37= "SELECT count(*) CONTADOR from pessoa_bi where
          ds_EMAIL='$emailgrava' and id_tipo_pessoa='1'";
          $achaexistepessoa371= mysql_db_query($banco,$achaexistepessoa37,$conexao);
          $achaexistepessoa372=mysql_fetch_array($achaexistepessoa371);
          $contadorexistenciaemail=$achaexistepessoa372["CONTADOR"];
        
           if ($contadorexistenciaemail >="1"){
           $jaexistepessoa="sim";
           $mensagemtela="</br>Existe ja uma Pessoa com este Email";

           ?>
             <input type="hidden" name="statusnovapessoa" value="nao">
             <input type="hidden" name="etapacadastro" value="2">
             <input type="hidden" name="status" value="incluirpessoa">

             <?

           }
           else
           {

             if ($gravacandidato=="sim"){
                         $mensagemtela="Informações do Candidato de Acordo Avançe para Etapa Seguinte";
                          $statusnovapessoa="sim";

                          

             }
             else
             {
                 $mensagemtela="Já existe esta Pessoa Cadastrada em Nosso Banco de Dados";
                 $statusnovapessoa="nao";
                 $etapacadastro="2";
                 
                 $achaexistepessoa37= "SELECT CODIGO from pessoa_bi where
                 descricao='$nome' and id_tipo_pessoa='1'";
                 $achaexistepessoa371= mysql_db_query($banco,$achaexistepessoa37,$conexao);
                 $achaexistepessoa372=mysql_fetch_array($achaexistepessoa371);
                 $codigopessoaatual=$achaexistepessoa372["CODIGO"];
                 

                 
                 
             }


             ?>
             <input type="hidden" name="statusnovapessoa" value="sim">
             <input type="hidden" name="statusnovapessoa" value="nao">
             <input type="hidden" name="etapacadastro" value="2">
             <input type="hidden" name="status" value="incluirarea">


             <?

           }



    }//testa os null




}//inclui pessoa



if ($status=="incluirarea" and $statusnovapessoa=="sim"){


//cria a pessoa




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
	         




             $codigopessoaatual=$sequencia;

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
             id_pessoa_candidata,id_tipo_pessoa
             )
             values ('$sequencia',
             '$nome',
             '$nascimentograva',
             '$sexograva',
             '$cpf',
             '$rua5grava',
             '$emailgrava',
             '1',
             '$bairrograva',
             '$cep',
             '$numerograva',
             '$complementograva',
             '$cidadegrava',
             '$fone1',
              'N','1'
              )";
              


              $res = mysql_db_query($banco,$grava,$conexao);


              $banco="site_maximiza";
              $username_https="root";
              $password_https="di2040";
              $hostname_https="Localhost";
              
              $ultimo = "SELECT MAX(CODIGO) SEQUENCIA FROM pessoa_bi";
             $res7 = mysql_db_query($banco,$ultimo,$conexao);
             $totallinha35=mysql_fetch_array($res7);
             $sequencia=$totallinha35["SEQUENCIA"];
             $codigopessoaatual=$sequencia;
             
             $statusnovapessoa="nao";

//fim criacao da pessoa
}//finl incuir area


if ($status=="incluirarea" and $etapacadastro=="2"){

     if ($acaoeliminararea=="sim")
     {

                          $grava = "delete from candidato_pessoa_bi where cd_pessoa_fisica='$codigopessoaatual' and
                          nr_banco='$bancopassa' and cd_grupo='$grupopassa' ";
                          $res = mysql_db_query($banco,$grava,$conexao);



     }



    if(empty($empresa55) or empty($banco55) or empty($grupo55)   )
    {
      $mensagemtela="Defina qual Empresa, Banco e Grupo correspondem ";
      $codigomensagem="inclusao";
      $status="incluirarea";


    }
    else
    {

         $ultimocan="SELECT MAX(NR_SEQUENCIA) SEQUENCIA FROM candidato_pessoa_bi";
             $res7can=mysql_db_query($banco,$ultimocan,$conexao);
             $totallinha35can=mysql_fetch_array($res7can);
             $sequenciacan=$totallinha35can["SEQUENCIA"];


             IF ($sequenciacan >"0"){
               $sequenciacan=$sequenciacan+1;
	         }
	         ELSE
	         {
               $sequenciacan="1";
	         }


         $grava5= "INSERT INTO candidato_pessoa_bi(nr_sequencia,nr_banco,cd_pessoa_fisica,cd_grupo,
         dt_atualizacao,ID_ABERTO)
         values ('$sequenciacan','$banco55','$codigopessoaatual','$grupo55','$today','S')";


         


         $res = mysql_db_query($banco,$grava5,$conexao);
         $mensagemtela="Inclusão com Sucesso ";

         $codigomensagem="inclusao";
         $status="incluirarea";
         $empresa55=null;
         $grupo55=null;
         $banco55=null;



    }


}//finl incuir segmento







if ( !IsSet($status) or ($etapacadastro=="1") ){
?>




                <?if ($simboloobrigatorionome=="sim" ){$corobrigatorio="red";}?>
                <?if ($simboloobrigatorioemail=="sim"){$corobrigatorio="red";}?>
                <?if ($simboloobrigatoriofone3=="sim"){$corobrigatorio="red";}?>


                <?if ($simboloobrigatoriocidade=="sim"){$corobrigatorio="red";}?>
                <?if ($simboloobrigatoriocep=="sim"){$corobrigatorio="red";}?>


                

                </br></br></br>

                <table width="70%">
                <tr>

                       <td width="30%">Nome:</td>
                       <td width="70%">
                       <input type=text name="nome" size=36  style="border-color: <?echo $corobrigatorio;?>"
                       value="<? echo $nome;?>" onclick="habilitar2()">

                       </td>


                </tr>


                      </tr>

                      <tr>
                       <td width="30%">Email:</td>
                       <td width="70%">
                       <input type=text name="emailgrava" size=36 style="border-color: <?echo $corobrigatorio;?>"
                       value="<? echo $emailgrava;?>"  <?echo $acao;?> ">
                       </td>


                       </tr>

                       <tr>
                       <td width="30%">Data Nascimento:</td>

                       <td width="70%">
                       <input type=text name="nascimentograva" maxlength="10" size=8
                        value="<? echo $nascimentograva;?>"  <?echo $acao;?>>
                       </td>

                       <tr>
                       <td width="30%">Sexo:</td>
                       <td width="70%">
                       <select name="sexograva"  <?echo $acao;?> >
                       <option value="<? echo $sexograva;?>"><? echo $sexograva;?></option>
                       <option value="M">Masculino</option>
                       <option value="F">Feminino</option>
                       </select>
                       </td>
                       </tr>

                       <tr>
                      <td width="30%">CPF:</td>


                      <td width="70%"><input type="text"  <?echo $acao;?> name="cpf"
                      value="<?echo $cpf;?>" onKeyPress="MascaraCPF(teste.cpf);"
                      maxlength="14"  ></td>

                     </tr>
                       


                     <tr>
                      <td width="30%">Rg:</td>

                       <td width="70%">
                       <input type=text name="rggrava" maxlength="14" value="<? echo $rggrava;?>"
                        ></td>
                      </tr>
                      
                      <tr>
                     <td width="30%">
                     Cep:
                     </td>


                     <td width="70%">
                     <input type="txt" name="cep"  size="9" value="<?echo $cep;?>"  style="border-color: <?echo $corobrigatorio;?>"
                     onKeyPress="MascaraCep(teste.cep);"  <?echo $acao;?> onchange="this.form.submit()"  >


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


                     <tr>
                     <td width="30%">
                     Bairro:
                     </td>

                     <td width="70%"><input type="txt" name="bairrograva"  size="35"  value="<?echo $bairrograva;?>" style="background-color: #CDCDC1" disabled>
                     </td>
                     </tr>

                     <tr>
                     <td width="30%">Logradouro:</td>
                     <td width="70%"><input type="txt" name="rua5grava"  value="<?echo $rua5grava;?>" style="background-color: #CDCDC1" size="50"   disabled></td>
                      </tr>

                     <tr>
                     <td width="30%"> Número:</td>

                     <td width="70%">
                     <input type="txt" name="numerograva"  value="<?echo $numerograva;?>" size="5" style="background-color: white"  <?echo $acao;?>></td>
                     </tr>
                     
                     <tr>
                     <td width="30%">Complemento:</td>

                     <td width="70%">
                     <input type="txt" name="complementograva" value="<?echo $complementograva;?>"  size="5"  style="background-color: white" <?echo $acao;?>></td>

                     </tr>







                     <tr>
                     <td width="30%">
                     Telefone
                     </td>

                     <td width="70%">
                     <input type="txt" name="fone3"  size="10" value="<?echo $fone3;?>" style="border-color: <?echo $corobrigatorio;?>">
                      </td>
                     </tr>
                     



                    </table>

                    <input type="hidden" name="continuarmesmatela" value="sim">
		            <input type="hidden" name="novologin" value="nao">
		            <input type="hidden" name="status" value="incluirpessoa">
		            <input type="hidden" name="etapacadastro" value="1">







<?
}//final etapa1

if ($etapacadastro=="2"){



        $achapessoamostra55= "SELECT a.cd_cidade CIDADE,a.descricao NOME,b.ds_cidade CIDADE
        from pessoa_bi a,cidade b
        where
        a.codigo='$codigopessoaatual' and
        a.cd_cidade=b.cd_cidade";



        $achapessoamostra56= mysql_db_query($banco,$achapessoamostra55,$conexao);
        $achapessoamostra57=mysql_fetch_array($achapessoamostra56);
        $mostranome1=$achapessoamostra57["NOME"];
        $cidade61=$achapessoamostra57["CIDADE"];
        ?>
        </br></br></br>
        <?

        ECHO "Candidato:$mostranome1</br>";
        ECHO "Cidade:$cidade61</br>";


          $achaprocessos="SELECT  d.nr_banco BANCO,d.cd_pessoa_fisica PESSOA,d.cd_grupo GRUPO,
          a.Descricao DESCGRUPO,b.DS_BANCO DESCBANCO,c.DESCRICAO DESCPESSOA,e.descricao EMPRESA
          FROM grupo_usuario_bi a, banco_bi b,pessoa_bi c,candidato_pessoa_bi d,pessoa_bi e
          WHERE
          d.cd_grupo=a.codigo and
          d.cd_pessoa_fisica=c.codigo and
          d.nr_banco=b.nr_sequencia  and
          c.codigo='$codigopessoaatual' AND
          b.cd_empresa=e.codigo
          ";
          

          ?>
          <table  width="100%" ID="grid" >
          <tr class="difa">

          <td>Banco</td>
          <td>Empresa</td>
          <td>Grupo</td>
          
          <td>Eliminar</td>

          </tr>
          <?
      	  $achaprocessos2= mysql_db_query($banco,$achaprocessos,$conexao);
          while ($achaprocessos3=mysql_fetch_array($achaprocessos2))
          {
           $pessoapassa=$achaprocessos3["PESSOA"];
           $grupopassa=$achaprocessos3["GRUPO"];
           $bancopassa=$achaprocessos3["BANCO"];


          ?>
           <tr class="difr">
	       <td><?echo $achaprocessos3["DESCBANCO"];?></td>
	       <td><?echo $achaprocessos3["EMPRESA"];?></td>
	       <td><?echo $achaprocessos3["DESCGRUPO"];?></td>
	       <td><a href="trabalhecommilenio.php?navegando=sim&status=incluirarea&codigopessoaatual=<?echo $codigopessoaatual;?>&etapacadastro=2&acaoeliminararea=sim&segmentopassa=<? echo $segmentopassa;?>&cenariopassa=<? echo $cenariopassa;?>&processopassa=<? echo $processopassa;?>&statusnovapessoa=<? echo $statusnovapessoa;?>">
           <img src="lixeiranova2.png" width="23" height="25"></a>
           </td>
           </tr>
          <?
          }
          ?>
          </table>
          </br></br>

          Novo Registro
          <hr>
                     <table>
                     <tr>
                     <td>Banco:</td>

                     <td>


                      <?

                      $achaseg1 = "SELECT nr_sequencia CODIGO,ds_banco DESCRICAO  FROM banco_bi
                      where nr_sequencia='$banco55'";

                      $achaseg2= mysql_db_query($banco,$achaseg1,$conexao);
                      $achaseg3=mysql_fetch_array($achaseg2);
                      $valord=$achaseg3["DESCRICAO"];

                      ?>
                      <select   name="banco55" style="background-color: white" onchange="this.form.submit()">
                       <option value="<? echo $banco55;?>"><? echo $valord;?></option>
                  	  <?
					  $stmt1 = "SELECT nr_sequencia CODIGO,ds_banco DESCRICAO  FROM banco_bi";
					  $res = mysql_db_query($banco,$stmt1,$conexao);
                      while ($valor8=mysql_fetch_array($res)) {
					     print "<option value=\"{$valor8["CODIGO"]}\">{$valor8["DESCRICAO"]}</option>";
                  	  }
                     ?>

					 </select>

                     </td>
                     </tr>

                      <tr>
                     <td>Empresa:</td>

                     <td>

                     <?
                     

                      

                      $achaseg1 = "SELECT DESCRICAO  FROM pessoa_bi where codigo='$empresa55' ";

                      $achaseg2= mysql_db_query($banco,$achaseg1,$conexao);
                      $achaseg3=mysql_fetch_array($achaseg2);
                      $valorempresa=$achaseg3["DESCRICAO"];

                      ?>
                      <select   name="empresa55" style="background-color: white" >
                       <option value="<? echo $empresa55;?>"><? echo $valorempresa;?></option>
                  	  <?

                      
					  $stmt1 = "SELECT distinct d.codigo CODIGO,d.descricao DESCRICAO
                      FROM  banco_bi c,pessoa_bi d
                      where
                      c.nr_sequencia='$banco55' and
                      c.cd_empresa=d.codigo
                      ";
					  $res = mysql_db_query($banco,$stmt1,$conexao);
                      while ($valor8=mysql_fetch_array($res)) {
					     print "<option value=\"{$valor8["CODIGO"]}\">{$valor8["DESCRICAO"]}</option>";
                  	  }
                     ?>

					 </select>

                     </td>
                     </tr>

                      <tr>
                     <td>Grupo:</td>

                     <td>
                     <?

                      $achaseg1 = "SELECT DESCRICAO   FROM grupo_usuario_bi where codigo='$grupo55' ";

                      $achaseg2= mysql_db_query($banco,$achaseg1,$conexao);
                      $achaseg3=mysql_fetch_array($achaseg2);
                      $valorgrupo=$achaseg3["DESCRICAO"];

                      ?>
                      <select   name="grupo55" style="background-color: white" onclick="habilitar3()">
                       <option value="<? echo $grupo55;?>"><? echo $valorgrupo;?></option>
                  	  <?
					  $stmt1 = "SELECT CODIGO,DESCRICAO FROM grupo_usuario_bi
                      where id_candidato='S' ";
					  $res = mysql_db_query($banco,$stmt1,$conexao);
                      while ($valor8=mysql_fetch_array($res)) {
					     print "<option value=\"{$valor8["CODIGO"]}\">{$valor8["DESCRICAO"]}</option>";
                  	  }
                     ?>

					 </select>

                     </td>
                     </tr>



                     </table>

                     <a href="#" onclick="document.forms[0].submit();return false;">
                     <IMG src="gravarnovo.png" width="101" height="35" ></a>

                     <input type="hidden" name="continuarmesmatela" value="sim">
		            <input type="hidden" name="novologin" value="nao">
  		            <input type="hidden" name="codigopessoaatual" value="<?echo $codigopessoaatual;?>">
                <input type="hidden"" name="status" value="incluirarea">



  		            <input type="hidden" name="etapacadastro" value="2">
  		            
  		            <a href="trabalhecommaximiza.php?navegando=sim&status=finalizar&codigopessoaatual=<?echo $codigopessoaatual;?>">
<IMG src="finalizarnovo.png" width="101" height="35" ></a>




<input type="hidden" name="statusnovapessoa" value="<?echo $statusnovapessoa;?>">


        <?


}



}//fianl quando nao éincio de tela


?>

<hr>


<font style="text-decoration:none;color: red;"><?echo "$mensagemtela";?>
<?

if (count($error) != 0) {
			foreach ($error as $erro) {
				$mensagemtela=$erro;
			}
		}



if (!IsSet($status)  or $status=="cancelar"){
?>


<table>
<tr>
<td>
<a href="trabalhecommaximiza.php?navegando=sim&status=incluirpessoa&etapacadastro=1&statusnovapessoa=nao">
<IMG src="incluirnovo2.png" width="101" height="35" ></a>

<a href="trabalhecommaximiza.php?navegando=sim&status=cancelar&codigopessoaatual=<?echo $codigopessoaatual;?>">
<IMG src="cancelarnovo.png" width="101" height="35" ></a>
</tr>
</table>






<?}
if ($status=="incluirpessoa" and $statusnovapessoa=="nao"){
?>
 
 <table>
<tr>
<td>
<a href="#" onclick="document.forms[0].submit();return false;">
<IMG src="gravarnovo.png" width="101" height="35" ></a>

<input type="hidden" name="statusnovapessoa" value="<?echo $statusnovapessoa;?>">

<a href="trabalhecommaximiza.php?navegando=sim&status=cancelar&codigopessoaatual=<?echo $codigopessoaatual;?>">
<IMG src="cancelarnovo.png" width="101" height="35" ></a>
</tr>
</table>





<?}





if ($status=="incluirpessoa" and $statusnovapessoa=="sim"){
?>

 <table>
<tr>
<td>
<a href="#" onclick="document.forms[0].submit();return false;">
<IMG src="gravarnovo.png" width="101" height="35" ></a>

<a href="trabalhecommaximiza.php?navegando=sim&status=cancelar&codigopessoaatual=<?echo $codigopessoaatual;?>">
<IMG src="cancelarnovo.png" width="101" height="35" ></a>

<a href="trabalhecommaximiza.php?navegando=sim&status=incluirarea&etapacadastro=2&statusnovapessoa=sim&nome=<?echo $nome;?>&nascimentograva=<?echo $nascimentograva;?>&sexograva=<?echo $sexograva;?>&cpf=<?echo $cpf;?>&rua5grava=<?echo $rua5grava;?>&emailgrava=<?echo $emailgrava;?>&rggrava=<?echo $rggrava;?>&bairrograva=<?echo $bairrograva;?>&cep=<?echo $cep;?>&numerograva=<?echo $numerograva;?>&complementograva=<?echo $complementograva;?>&cidadegrava=<?echo $cidadegrava;?>&fone1=<?echo $fone1;?>&fone2=<?echo $fone2;?>&fone3=<?echo $fone3;?>&fone4=<?echo $fone4;?>">
<IMG src="avancarnovo.png" width="101" height="35" ></a>

</tr>
</table>


<?}


?>

</div>

</form>
</body>
</html>

