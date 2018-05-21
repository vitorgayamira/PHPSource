<? session_start();?>
<head>
<script language="javascript">
function Certeza()
{
 if (!confirm ("Você Tem Certeza" ))
 {
    	return false;
    
 }
 else
 {
   
	return true;
    document.teste.submit();

 }
}




function Mascara_Hora2(Hora2){ 
var hora01 = ''; 
hora01 = hora01 + Hora2; 
if (hora01.length == 2){ 
hora01 = hora01 + ':'; 
document.forms[0].hora.value = hora01; 
} 
if (hora01.length == 5){ 
Verifica_Hora2(); 
} 
}







function Verifica_Hora2(){ 
hrs = (document.forms[0].hora.value.substring(0,2)); 
min = (document.forms[0].hora.value.substring(3,5)); 
}

function MascaraCNPJ(cnpj){
        if(mascaraInteiro(cnpj)==false){
                event.returnValue = false;
        }
        return formataCampo(cnpj, '00.000.000/0000-00', event);

}

//adiciona mascara de cep
function MascaraCep(cep){
                if(mascaraInteiro(cep)==false){
                event.returnValue = false;
        }
        return formataCampo(cep, '00.000-000', event);
}

//adiciona mascara de data
function MascaraData(data){
        if(mascaraInteiro(data)==false){
                event.returnValue = false;
        }
        return formataCampo(data, '00/00/0000', event);
}

//adiciona mascara ao telefone
function MascaraTelefone(tel){
        if(mascaraInteiro(tel)==false){
                event.returnValue = false;
        }
        return formataCampo(tel, '(00) 0000-0000', event);
}


//adiciona mascara codigo barra
function Mascaracodigobarra(barra){
        if(mascaraInteiro(barra)==false){
                event.returnValue = false;
        }
        return formataCampo(barra, '000-0000-00000-0', event);
}


//adiciona mascara ao CPF
function MascaraCPF(cpf){
        if(mascaraInteiro(cpf)==false){
                event.returnValue = false;
        }
        return formataCampo(cpf, '000.000.000-00', event);
}

//valida telefone
function ValidaTelefone(tel){
        exp = /\(\d{2}\)\ \d{4}\-\d{4}/
        if(!exp.test(tel.value))
                alert('Numero de Telefone Invalido!');
}




//valida CEP
function ValidaCep(cep){
        exp = /\d{2}\.\d{3}\-\d{3}/
        if(!exp.test(cep.value))
                alert('Numero de Cep Invalido!');
}

//valida data
function ValidaData(data){
        exp = /\d{2}\/\d{2}\/\d{4}/
        if(!exp.test(data.value))
                alert('Data Invalida!');
}

//valida o CPF digitado
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

//valida numero inteiro com mascara
function mascaraInteiro(){
        if (event.keyCode < 48 || event.keyCode > 57){
                event.returnValue = false;
                return false;
        }
        return true;
}

//valida o CNPJ digitado
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
</script>






<style  type="text/css">
#envolve { width: 100%}
 #div_1 { position: relative; width: 30%; height: 100%; background-color: #FFFFFF; border:1;float: left; text-align: center; color: #E8E8E8;  }
 #div_2 { position: relative; width: 70%; height: 100%; background-color: #FFFFFF; float: right; text-align: center; color: #E8E8E8;}
 #clear { clear:both; }






 body{
         width:100%;
	     height:100%;
         background: url(imagemfundotela.jpg) no-repeat;


}



</style>





</head>

<form name='teste' action='pessoafisicaentrada.php' method="POST">




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
$cnpj=$_GET['cnpj'];
$razao=$_GET['razao'];
$cpf=$_GET['cpf'];
$nome=$_GET['nome'];

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
$nova=$_POST['nova'];
$setornovo=$_POST['setornovo'];
$linhapesquisa=$_POST['linhapesquisa'];
$turnonovo=$_POST['turnonovo'];
$motivopesquisa=$_POST['motivopesquisa'];
$grupopesquisa=$_POST['grupopesquisa'];
$unidadepesquisa=$_POST['unidadepesquisa'];
$limite=$_POST['limite'];
$atencao=$_POST['atencao'];
$recomendacao=$_POST['recomendacao'];
$tiponegocio=$_POST['tiponegocio'];

$banco=$_POST['banco'];
$escolha=$_POST['escolha'];

$hora=$_POST['hora'];
$nova3=$_POST['nova3'];
$vlrecebido=$_POST['vlrecebido'];
$item7=$_POST['item7'];
$unidade=$_POST['unidade'];
$vlfiscal=$_POST['vlfiscal'];
$codigofornecedor=$_POST['codigofornecedor'];
$descricaoitem=$_POST['descricaoitem'];
$cnpj=$_POST['cnpj'];
$razao=$_POST['razao'];
$cpf=$_POST['cpf'];
$nome=$_POST['nome'];




}


require("configuramysql.php");
require("estilo2.css");

$usu18 = "SELECT CD_EMPRESA FROM parametro_bi";
$res8 = mysql_db_query($banco,$usu18,$conexao);
$valor87=mysql_fetch_array($res8);
$codigoempresa=$valor87["CD_EMPRESA"];


if (!IsSet($escolha) or ($escolha=="volta")){

?>
</BR></BR></BR></BR></BR>
<center><font style='font-size: 32px;color: black;text-align:left;bold: Negrito' >Relação de Pessoa Física</font></br>

<center>
Cpf:<input type="text" name="cpf" onKeyPress="MascaraCPF(teste.cpf);"maxlength="14"   >
Nome: <input type="text" name="nome">

<input type="hidden" name="escolha" value="grava">


 <input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">
		<input type="hidden" name="banco" value="<?echo $banco;?>">
		<input  type="submit" id="botao" name="botao"   VALUE="Avançar">
		

<center><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="70%">
<tr >
  <th>Codigo</th>
  <th>Nome</th>

  <th>Cpf</th>
  <th>Endereço</th>
  <th>Cidade</th>
  <th>Estado</th>


</tr>
<?
 $quantaslinhasamostra="0";

 $sqlacharita5 = "SELECT CODIGO,
 DESCRICAO ,
 NR_INSCRICAO,
 NR_CPF,
  NM_LOGRADOURO,
  DS_COMPLEMENTO,
  NR_CEP,
  NM_BAIRRO,
  DS_EMAIL,
  ID_MATRIZ,
  ID_FILIAL,
  CD_CIDADE,
  VL_CAPACIDADE_DIA,VL_ABATE_HORA,
  VL_DISPONIVEL_DIA_APANHA,
  VL_HORA_PARADA_TURNO,
  ID_FABRICA_RACAO,
  ID_FRIGORIFICO,
  ID_INCUBATORIO,
  ID_FORNECEDOR,
  ID_FORNECEDOR_SERVICO,VL_HORA_INICIO_ABATE,VL_HORA_FINAL_ABATE
  FROM pessoa_bi
 where
 ID_TIPO_PESSOA='1' ";


 $sqlacharita51 = mysql_db_query($banco,$sqlacharita5,$conexao);

 while ($valor71=mysql_fetch_array($sqlacharita51)){
     $matriz=$valor71["ID_MATRIZ"];
     $cpf88=$valor71["NR_CPF"];
     $codigopessoa=$valor71["CODIGO"];



   ?>
   <tr>
   <td><h1 style='font-size: 9px;color: black;text-align:left;bold: Negrito text-decoration: none' >
   <?echo $valor71["CODIGO"];?> </td>
   <td><?echo $valor71["DESCRICAO"];?></td>

   <td><?echo $cpf88;?></td>

   <td>Endereço:<?echo $valor71["NM_LOGRADOURO"];?>-<?echo $valor71["DS_COMPLEMENTO"];?> Bairro:
       <?echo $valor71["NM_BAIRRO"];?> Cep: <?echo $valor71["NR_CEP"];?></br>

       </td>

       <?

        $usu185 = "select a.DS_CIDADE CIDADE,b.SG_ESTADO ESTADO from cidade_bi a,estado_bi b
         where a.cd_estado=b.cd_estado and
         a.cd_cidade in (select cd_cidade from pessoa_bi where codigo='$codigopessoa')";
        $res855 = mysql_db_query($banco,$usu185,$conexao);
        $valor8755=mysql_fetch_array($res855);
        $descricaocidade=$valor8755["CIDADE"];
        $siglaestado=$valor8755["ESTADO"];

       ?>
       <td><?echo $descricaocidade;?></td>
       <td><?echo $siglaestado;?></td>


   </tr>
<?
}
?>
</TABLE>




<?


}

if ($escolha=="grava"){


$sql = "select count(*) CONTADOR from pessoa_bi  where nr_Cpf='$cpf'";



$res = mysql_db_query($banco,$sql,$conexao);
$valor7=mysql_fetch_array($res);
$valor2=$valor7["CONTADOR"];

   IF ($valor2=="1"){?>
   <h1 style='font-size: 19px;color: red;text-align:center;bold: Negrito text-decoration: none'><? echo "Pessoa Fisica Cadastrada";
   ?>
   
   <a href="PESSOAatualizando.php?escolha=1&cpf=<?echo $cpf;?>&nome=<?echo $nome;?>&turno=<?echo $turno;?>&banco=<?echo $banco;?>&navegando=sim">Atualizar</a>

    <?
    }
    else
	{
    ?>

    <hr>
<center><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="30%">
<tr >

  <th>Nome Sugeridos</th>

</tr>
<?


 $sqlacharita5p = "SELECT CODIGO, DESCRICAO FROM pessoa_bi where  ID_TIPO_PESSOA='1' and descricao like '%$nome%' ";
 $sqlacharita51p = mysql_db_query($banco,$sqlacharita5p,$conexao);
 while ($valor71p=mysql_fetch_array($sqlacharita51p)){

     $codigo=$valor71p["CODIGO"];
     $descricao=$valor71p["DESCRICAO"];



   ?>
   <tr>
      <td><?echo $descricao;?></td>
   </tr>
<?
}
?>
</TABLE>

    <a href="PESSOA.php?escolha=1&cpf=<?echo $cpf;?>&nome=<?echo $nome;?>&turno=<?echo $turno;?>&banco=<?echo $banco;?>&navegando=sim">Cadastro Novo</a>
    <?
	}







}

?>
</div>
</form>
