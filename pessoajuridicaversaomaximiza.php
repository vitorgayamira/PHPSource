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

<body  onLoad="document.teste.codigograva.focus();">

<form action="pessoajuridicaversaomaximiza.php"  name="teste"  method="POST" >


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
$localbanco=$_GET['localbanco'];
$banco=$_GET['banco'];
$iniciotela=$_GET['iniciotela'];




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
$localbanco=$_POST['localbanco'];
$banco=$_POST['banco'];
$codigograva=$_POST['codigograva'];
$produtoservico=$_POST['produtoservico'];
$contatograva=$_POST['contatograva'];
$homepagegrava=$_POST['homepagegrava'];
$inscricao=$_POST['inscricao'];
$ruagrava=$_POST['ruagrava'];
$bairrograva=$_POST['bairrograva'];
$tipograva=$_POST['tipograva'];
$unidadegrava=$_POST['unidadegrava'];
$cidadegrava=$_POST['cidadegrava'];
$estadograva=$_POST['estadograva'];
$iniciotela=$_POST['iniciotela'];



}

$nomebusca=strtoupper($nomebusca);//converte maiuscula


require("configuraoracle.php");
require("estilo2_mi.css");


require("configuramysql.php");





$acha1 = "SELECT A.CODIGO CODIGOEMPRESA,A.DESCRICAO EMPRESA,B.DESCRICAO NOME,E.DESCRICAO NOMEEMPRESA,D.ID_MASTER MASTER
          FROM PESSOA_BI A,PESSOA_BI B,USUARIO_GRUPO_BI C,USUARIO_BI D,PESSOA_BI E
          WHERE C.CD_PESSOA=A.CODIGO AND
          C.CD_USUARIO=D.CD_USUARIO AND
          D.CD_PESSOA=B.CODIGO AND
          D.CD_USUARIO='$usuario' AND
		  D.CD_EMPRESA=E.CODIGO
          ";

          $res = mysql_db_query($banco,$acha1,$conexao);
          $valor6=mysql_fetch_array($res);
          $nome2=$valor6["NOME"];


		  $acha1 = "SELECT E.DESCRICAO NOMEEMPRESA
          FROM PESSOA_BI E
          WHERE
		  E.CODIGO in (select CD_EMPRESA from PARAMETRO_BI)
          ";

          $res = mysql_db_query($banco,$acha1,$conexao);
          $valor6=mysql_fetch_array($res);

          $nomeempresa88=$valor6["NOMEEMPRESA"];


?>
<center>

<center><table>

<tr>
<td width=40%>
<?

echo "$nomeempresa88";
?>
</td>

<td width=55%></td>
<td width=5%><img border="0" src="imagemfundotelamaximizalogo.jpg"></td>
</tr>
</table>



<table width=95%>

<tr>

<td width=70%>




<table width="70%">
<tr>
<td><h2>Cadastro de Pessoa Jurídica</h2></td>
</tr>

<tr>
<td>
<?




if ( !IsSet($acao)){$acao="disabled";}

if ($status=="finalizarexclusao"){

    $sgrava17= OCIParse($ora_conexao, "delete from fornecedor_sadege where cod_fornecedor='$codigoachou'");
                  OCIExecute($sgrava17, OCI_DEFAULT);
                  oci_commit($ora_conexao);
    $status="cancelar";
    $codigoachou=null;
    $mensagemtela="Eliminado Registro</br>";
    $codigomensagem="inclusao";
    $iniciotela="sim";

} //finl da exclusao final



if ($status=="cancelar"){

$codigoachou=null;
$iniciotela="sim";
}




if ($status=="incluir"){
$jaexistepessoa="nao";



$s = OCIParse($ora_conexao, "select COD_FORNECEDOR,EMPRESA,CGC,TIPO,CONTATO,
HOME_PAGE FROM fornecedor_sadege where
empresa='$nomegravapessoa'");
OCIExecute($s, OCI_DEFAULT);
While (OCIFetch($s)) {
      $nomeachou=ociresult($s, "EMPRESA") ;
      $codigoachou=ociresult($s, "COD_FORNECEDOR") ;
      $cnpj=ociresult($s, "CGC") ;
      $tipograva=ociresult($s, "TIPO") ;
      $contatograva=ociresult($s, "CONTATO") ;
      $homepagegrava=ociresult($s, "HOME_PAGE") ;
      
      
}





if ($jaexistepessoa=="nao")
{

     $ultimo= OCIParse($ora_conexao, "select MAX(COD_FORNECEDOR) CODIGO FROM fornecedor_sadege");
     OCIExecute($ultimo, OCI_DEFAULT);
     While (OCIFetch($ultimo)) {
      $sequencia=ociresult($ultimo, "CODIGO") ;

     }



     IF ($sequencia >"0"){
       $sequencia=$sequencia+1;
	 }
	 ELSE
	 {
     $sequencia="1";
	 }







    if(empty($tipograva) or empty($codigograva) or empty($nome) )
    {

      $mensagemtela="Existem Campos Obrigatórios Não Preenchidos:Codigo,Nome e Tipo</br>";
      $codigomensagem="inclusao";
      $status="novo";
      $iniciotela="nao";



      if(empty($tipograva)){$simboloobrigatoriotipo="sim";}
      if(empty($codigograva)){$simboloobrigatoriocodigo="sim";}
      if(empty($nome)){$simboloobrigatoriocodigo="sim";}

      
      //echo "codigoxxxxx:$codigograva//tipo:$tipo";

    }
    else
    {
                  $codigograva=strtoupper($codigograva);//converte maiuscula
    
                  $sacho77 = OCIParse($ora_conexao, "select count(*) CONTADOR FROM fornecedor_sadege where
                  cod_fornecedor='$codigograva'");
                  OCIExecute($sacho77, OCI_DEFAULT);
                  While (OCIFetch($sacho77)) {
                    $achouquantos=ociresult($sacho77, "CONTADOR") ;
                  }

                 if ($achouquantos >"0"){
                 
                  $mensagemtela="Este codigo do Fornecedor já Existe</br>";
                  $codigomensagem="inclusao";
                  $status="novo";
                  $iniciotela="nao";
    
                  $nome=strtoupper($nome);//converte maiuscula
                 }
                 else
                 {
                  $sgrava1= OCIParse($ora_conexao, "INSERT INTO fornecedor_sadege(cod_fornecedor,tipo,empresa,
                  ds_produto_servico,contato,home_page,
                  CGC,E_MAIL,OBS,insc_est,ENDERECO,bairro,
                  cep,CD_UNIDADE,estado,cidade,TELEFONE,TELEFONE_CELULAR,
                  TELEFONE_RESID
                  )
                  values ('$codigograva','$tipograva','$nome','$produtoservico','$contatograva',
                  '$homepagegrava','$cnpj','$emailgrava','$observacao','$inscricao',
                  '$ruagrava','$bairrograva','$cep','$unidadegrava','$estadograva',
                  '$cidadegrava','$fone3','$fone1','$fone4')
                  ");
                  

                  OCIExecute($sgrava1, OCI_DEFAULT);
                  oci_commit($ora_conexao);
                   $mensagemtela="</br>Inclusão com Sucesso";
                   $status="cancelar";
                   $iniciotela="nao";
                  }






 }

}

}//final da acaocde incluir




if ($status=="gravaredicao"){



  if(empty($tipograva) or empty($codigograva) or empty($cnpj) )
    {
      $mensagemtela="Existem Campos Obrigatórios Não Preenchidos</br>";
      $codigomensagem="edicao";






      if(empty($nome)){$simboloobrigatorionome="sim";}
      if(empty($codigograva)){$simboloobrigatoriocodigo="sim";}
      if(empty($cnpj)){$simboloobrigatoriotipo="sim";}




      $status="cancelar";
      $iniciotela="sim";
    }
    else
    {

       $nome=strtoupper($nome);//converte maiuscula
       
       $sgrava1= OCIParse($ora_conexao, "UPDATE fornecedor_sadege set empresa='$nome',CGC='$cnpj',tipo='$tipograva',
       ds_produto_servico='$produtoservico',contato='$contatograva',
       home_page='$homepagegrava',E_MAIL='$emailgrava',OBS='$observacao',insc_est='$inscricao',ENDERECO='$ruagrava',
       bairro='$bairrograva',cep='$cep',CD_UNIDADE='$unidadegrava',
       estado='$estadograva',cidade='$cidadegrava',TELEFONE='$fone3',TELEFONE_CELULAR='$fone1',TELEFONE_RESID='$fone4'
       where cod_fornecedor='$codigoachou'");
       OCIExecute($sgrava1, OCI_DEFAULT);
       oci_commit($ora_conexao);


       
       $mensagemtela="Atualização com Sucesso";
       $res = mysql_db_query($banco,$grava,$conexao);
       $status="editar";
       $codigomensagem="edicao";

    }


}//final quanso acao é gravar editar


if (!IsSet($iniciotela)  or $iniciotela=="sim")
{


?>
<table>

                      <tr>
                      <td>Codigo:</td>


                       <td>
                       <input type=text name="codigograva" size=36  disabled></td>

                      </tr>
                      <tr>
                      <td>Empresa:</td>


                       <td>
                       <input type=text name="nome" size=56 disabled></td>

                      </tr>

                      <tr>
                      <td>Email:</td>


                       <td>
                       <input type=text name="emailgrava" size=36 disabled>
                       </td>
                       </tr>
                       
                       
                       <tr>
                       <td>Contato:</td>
                       <td>
                       <input type=text name="emailgrava" size=35 disabled>
                       </td>
                       </tr>
                       
                       <tr>
                       <td>Home Page:</td>
                       <td>
                       <input type=text name="emailgrava" size=35 disabled>
                       </td>
                       </tr>
                       
                       <tr>
                       <td>Obs:</td>
                       <td>
                       <input type=text name="emailgrava" size=35 disabled>Produto/Serviço: <input type=text name="emailgrava" size=35 disabled>
                       </td>
                       </tr>
                       
                       <tr>
                       <td>Cnpj:</td>
                       <td>
                       <input type=text name="emailgrava" size=35 disabled>Inscrição Estadual: <input type=text name="emailgrava" size=15 disabled>
                       </td>
                       </tr>
                       
                       <tr>
                       <td>Endereço:</td>
                       <td>
                       <input type=text name="emailgrava" size=45 disabled>
                       </td>
                       </tr>
                       
                       <tr>
                       <td>Bairro:</td>
                       <td>
                       <input type=text name="emailgrava" size=35 disabled>
                       </td>
                       </tr>
                       
                       <tr>
                       <td>Cep:</td>
                       <td>
                       <input type=text name="emailgrava" size=9 disabled>
                       </td>
                       </tr>
                       
                       <tr>
                       <td>Cidade:</td>
                       <td>
                       <input type=text name="emailgrava" size=35 disabled>
                       </td>
                       </tr>
                       
                       <tr>
                       <td>Estado:</td>
                       <td>
                       <input type=text name="emailgrava" size=35 disabled>
                       </td>
                       </tr>
                       
                       <tr>
                       <td>Telefone Comercial:</td>
                       <td>
                       <input type=text name="emailgrava" size=25 disabled>
                       </td>
                       </tr>

                       <tr>
                       <td>Celular:</td>
                       <td>
                       <input type=text name="emailgrava" size=25 disabled>
                       </td>
                       </tr>
                       
                       <tr>
                       <td>Residencial:</td>
                       <td>
                       <input type=text name="emailgrava" size=25 disabled>
                       </td>
                       </tr>
                       
                       <tr>
                       <td>Tipo:</td>
                       <td>
                       <input type=text name="emailgrava" size=25 disabled>Unidade:<input type=text name="emailgrava" size=25 disabled>
                       </td>
                       </tr>


                    </table>


<?
}
else
{



if ( !IsSet($status) or ($status=="novo") or ($status=="cancelar") or ($status=="elimina")){
?>



              <table>

                      <tr>
                      <td>Codigo:</td>


                       <td>
                       <input type=text name="codigograva" size=36 style="border-color:red"></td>

                      </tr>
                      <tr>
                      <td>Empresa:</td>


                       <td>
                       <input type=text name="nome" size=56 style="border-color:red"></td>

                      </tr>
                      <tr>
                      <td>Email:</td>


                       <td>
                       <input type=text name="emailgrava" size="36"
                       value="<? echo $emailgrava;?>"  >
                       </td>
                       </tr>
                       
                       <tr>
                     <td>
                     Contato:
                     </td>
                     <td><input type="txt" name="contatograva"  size="35"  value="<?echo $contatograva;?>"
                      >
                     </td>
                     </tr>
                     
                     <tr>
                     <td>
                     Home Page:
                     </td>
                     <td><input type="txt" name="homepagegrava"  size="35"
                     value="<?echo $homepagegrava;?>"  >
                     </td>
                     </tr>
                     
                     <tr>
                     <td>
                     Observação:
                     </td>
                     <td>
                     <input type="txt" name="observacao"  size="35"
                     value="<?echo $observacao;?>"  >
                     Produto/Serviço:
                     <input type="txt" name="produtoservico"  size="25"
                     value="<?echo $produtoservico;?>"  >

                     </td>
                     </tr>

                      <tr>
                      <td>Cnpj:</td>

                      <td><input type="text"    name="cnpj"
                      value="<?echo $cnpj;?>" onKeyPress="MascaraCNPJ(teste.cnpj);"
                      maxlength="18"  >
                     Inscrição Estadual:
                     <input type="txt" name="inscricao"  size="15"  value="<?echo $inscricao;?>">
                     </td>
                     </tr>





                     <tr>
                     <td>Endereço:</td>
                     <td><input type="txt" name="ruagrava"  value="<?echo $ruagrava;?>" size="35"
                     style="background-color: white" ></td>
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
                     <input type="txt" name="cep"  size="9" value="<?echo $cep;?>">
                     </td>
                     </tr>
                     
                     <tr>
                     <td>
                     Cidade:
                     </td>
                     <td><input type="txt" name="cidadegrava"  size="35"
                     value="<?echo $cidadegrava;?>" style="background-color: white" >
                     </td>
                     </tr>

                     <tr>
                     <td>
                     Estado:
                     </td>
                     <td><input type="txt" name="estadograva"  size="35"
                     value="<?echo $estadograva;?>" style="background-color: white" >
                     </td>
                     </tr>


                     <tr>
                     <td>
                     Telefone Comercial
                     </td>
                     <td>
                     <input type="txt" name="fone3"  size="25"
                     value="<?echo $fone3;?>"  style="background-color: white" >


                     </td>
                     </tr>

                     <tr>
                     <td>
                     Telefone Celular
                     </td>
                     <td>
                     <input type="txt" name="fone1"  size="25"
                     value="<?echo $fone1;?>" style="background-color: white" >

                     Residencial
                     <input type="txt" name="fone4"  size="25"  value="<?echo $fone4;?>"
                     style="background-color: white" >
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
                       <option value="C">Condômino</option>
                       <option value="L">Local</option>

                       </select>

                     Unidade:

                        <select    name="unidadegrava">
                       <option value=""></option>
                        <?$result2 = "SELECT CD_FABRICA,DS_FABRICA FROM FABRICAS";
				         $result3 = @OCIParse($ora_conexao, $result2);
				         @OCIExecute($result3, OCI_DEFAULT);
				         while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				         {
                            print "<option value=\"{$row["CD_FABRICA"]}\">{$row["DS_FABRICA"]}</option>";
                         }
				         ?>
				         </select>
                     </td>
                     </tr>


                    </table>

                    <input type="hidden" name="continuarmesmatela" value="sim">
		            <input type="hidden" name="novologin" value="nao">
  		            <input type="hidden" name="codigoachou" value="<?echo $codigoachou;?>">
  		            <input type="hidden" name="status" value="incluir">
  		             <input type="hidden" name="banco" value="<?echo $banco;?>">
  		            <input type="hidden" name="localbanco" value="<?echo $localbanco;?>">
                     <input type="hidden" name="iniciotela" value="<?echo $iniciotela;?>">






<?
}//final doaincluir ou cancelar




if ($status=="editar"){



     $ultimoeditar= OCIParse($ora_conexao, "SELECT COD_FORNECEDOR,EMPRESA,TIPO,CGC,ds_produto_servico SERVICO,
     CONTATO,HOME_PAGE,E_MAIL,OBS,INSC_EST,ENDERECO,BAIRRO,CEP,CD_UNIDADE,CIDADE,ESTADO,
     TELEFONE_RESID FONE4,TELEFONE_CELULAR FONE1,TELEFONE FONE3
     FROM  fornecedor_sadege where
     cod_fornecedor='$codigoachou'");
     OCIExecute($ultimoeditar, OCI_DEFAULT);
     While (OCIFetch($ultimoeditar))
     {
      $nome=ociresult($ultimoeditar, "EMPRESA") ;
      $codigoachou=ociresult($ultimoeditar, "COD_FORNECEDOR") ;
      $tipograva=ociresult($ultimoeditar, "TIPO") ;
      $cnpj=ociresult($ultimoeditar, "CGC") ;
      $produtoservico=ociresult($ultimoeditar, "SERVICO") ;
      $contatograva=ociresult($ultimoeditar, "CONTATO") ;
      $homepagegrava=ociresult($ultimoeditar, "HOME_PAGE") ;
      $emailgrava=ociresult($ultimoeditar, "E_MAIL") ;
      $observacao=ociresult($ultimoeditar, "OBS") ;
      $inscricao=ociresult($ultimoeditar, "INSC_EST") ;
      $ruagrava=ociresult($ultimoeditar, "ENDERECO") ;
      $bairrograva=ociresult($ultimoeditar, "BAIRRO") ;
      $cep=ociresult($ultimoeditar, "CEP") ;
      $unidadegrava=ociresult($ultimoeditar, "CD_UNIDADE") ;
      $cidadegrava=ociresult($ultimoeditar, "CIDADE") ;
      $estadograva=ociresult($ultimoeditar, "ESTADO") ;
      $fone1=ociresult($ultimoeditar, "FONE1") ;
      $fone4=ociresult($ultimoeditar, "FONE4") ;
      $fone3=ociresult($ultimoeditar, "FONE3") ;


    }




?>

              <table>

                      <tr>
                      <td>Codigo:</td>



                       <td>
                       <input type=text name="codigograva" size=36  style="border-color:red"
                       value="<? echo $codigoachou;?>" ></td>

                      </tr>
                      <tr>
                      <td>Empresa:</td>

                       <td>
                       <input type=text name="nome" size=56
                       value="<? echo $nome;?>" style="border-color:red" ></td>

                      </tr>
                      <tr>
                      <td>Email:</td>



                       <td>
                       <input type=text name="emailgrava" size=36
                       value="<? echo $emailgrava;?>"  >
                       </td>
                       </tr>

                       <tr>
                     <td>
                     Contato:
                     </td>
                     <td><input type="txt" name="contatograva"  size="35"  value="<?echo $contatograva;?>"
                     style="background-color: white" >
                     </td>
                     </tr>

                     <tr>
                     <td>
                     Home Page:
                     </td>
                     <td><input type="txt" name="homepagegrava"  size="35"  value="<?echo $homepagegrava;?>"
                     style="background-color: white" >
                     </td>
                     </tr>

                     <tr>
                     <td>
                     Observação:
                     </td>
                     <td>
                     <input type="txt" name="observacao"  size="35"
                     value="<?echo $observacao;?>" style="background-color: white" >
                     Produto/Serviço:
                     <input type="txt" name="produtoservico"  size="25"
                     value="<?echo $produtoservico;?>" style="background-color: white" >

                     </td>
                     </tr>


                      <td>Cnpj:</td>


                      <td><input type="text"    name="cnpj"
                      value="<?echo $cnpj;?>" onKeyPress="MascaraCNPJ(teste.cnpj);"
                      maxlength="18"  >


                     Incrição Estadual:
                     <input type="txt" name="inscricao"  size="35"  value="<?echo $inscricao;?>"
                     style="background-color: white" >
                     </td>
                     </tr>





                     <tr>
                     <td>Endereço:</td>
                     <td><input type="txt" name="ruagrava"  value="<?echo $ruagrava;?>" size="35"
                     style="background-color: white" ></td>
                      </tr>





                     <tr>
                     <td>
                     Bairro:
                     </td>
                     <td><input type="txt" name="bairrograva"  size="35"  value="<?echo $bairrograva;?>" >
                     </td>
                     </tr>
                     <tr>
                     <td>
                     Cep:
                     </td>
                     <td>
                     <input type="txt" name="cep"  size="9" value="<?echo $cep;?>"
                     onKeyPress="MascaraCep(teste.cep);" style="background-color: white"  >
                     </td>
                     </tr>

                     <tr>
                     <td>
                     Cidade:
                     </td>
                     <td><input type="txt" name="cidadegrava"  size="35"
                     value="<?echo $cidadegrava;?>" style="background-color: white" >
                     </td>
                     </tr>

                     <tr>
                     <td>
                     Estado:
                     </td>
                     <td><input type="txt" name="estadograva"  size="35"
                     value="<?echo $estadograva;?>" style="background-color: white" >
                     </td>
                     </tr>


                     <tr>
                     <td>
                     Telefone Comercial
                     </td>
                     <td>

                     <input type="txt" name="fone3"  size="15" value="<?echo $fone3;?>"
                     style="background-color: white" >



                     </td>
                     </tr>

                     <tr>
                     <td>
                     Telefone Celular
                     </td>
                     <td><input type="txt" name="fone1"  size="15"  value="<?echo $fone1;?>"
                      >

                     Residencial
                     <input type="txt" name="fone4"  size="25"  value="<?echo $fone4;?>"
                     style="background-color: white" >

                     </td>
                     </tr>

                     <tr>
                     <td>
                     Tipo:
                     </td>

                     <td>
                       <select    name="tipograva" style="border-color:red">
                       <option value="<?echo "$tipograva";?>"><?echo "$tipograva";?></option>
                       <option value="F">Fornecedor</option>
                       <option value="C">Condômino</option>
                       <option value="L">Local</option>

                       </select>


                     Unidade:

                        <select    name="unidadegrava">
                       <option value="<?echo "$unidadegrava";?>"><?echo "$unidadegrava";?></option>
                        <?$result2 = "SELECT CD_FABRICA,DS_FABRICA FROM FABRICAS";
				         $result3 = @OCIParse($ora_conexao, $result2);
				         @OCIExecute($result3, OCI_DEFAULT);
				         while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				         {
                            print "<option value=\"{$row["CD_FABRICA"]}\">{$row["DS_FABRICA"]}</option>";
                         }
				         ?>
				         </select>
                     </td>
                     </tr>


                    </table>

                    <input type="hidden" name="continuarmesmatela" value="sim">
		            <input type="hidden" name="novologin" value="nao">
                    <input type="hidden" name="codigoachou" value="<?echo $codigoachou;?>">
  		            <input type="hidden" name="status" value="gravaredicao">
  		            <input type="hidden" name="banco" value="<?echo $banco;?>">
  		            <input type="hidden" name="localbanco" value="<?echo $localbanco;?>">
  		            <input type="hidden" name="iniciotela" value="<?echo $iniciotela;?>">

<?
}//final editar



}//final quanco mostra tela diderente de iniciar


if (count($error) != 0) {
			foreach ($error as $erro)
            {
				$mensagemtela2=$erro;
           }
}




$mensagemtela3=$mensagemtela." ".$mensagemtela2;

?>
<hr>

<font style="text-decoration:none;color: red;"><?echo "$mensagemtela3";?>

<table>
<tr>

<?


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
              <a href="pessoajuridicaversaomaximiza.php?navegando=sim&status=cancelar&codigoachou=<?echo $codigoachou;?>&buscarparametro=nao&localbanco=<?echo $localbanco;?>&banco=<? echo $banco;?>&iniciotela=nao"
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
              <a href="pessoajuridicaversaomaximiza.php?navegando=sim&buscarparametro=sim&localbanco=<?echo $localbanco;?>&banco=<? echo $banco;?>&iniciotela=nao" style="text-decoration:none;color: black;">Consultar</a>
           </div>
          </td>



           <td width="70" height="30" align="center" bgcolor="#8B8B7A" style="border: thin outset #8B8B7A;"
           onMouseOver="this.bgColor='#CDCDB4'" onMouseOut="this.bgColor='#8B8B7A';this.style.border='thin outset #8B8B7A'"
           onMouseDown="this.style.border='thin inset #8B8B7A';"
           onMouseUp="this.style.border='thin outset #8B8B7A';">
           <div style="font-size: 12px; font-weight: bold;">
              <a href="pessoajuridicaversaomaximiza.php?navegando=sim&status=novo&acao=null&localbanco=<?echo $localbanco;?>&banco=<? echo $banco;?>&iniciotela=nao" style="text-decoration:none;color: black;">Incluir</a>
           </div>
          </td>

          <?
          if ($status=="editar"){
            if(empty($nome)){}else{

            
          ?>

          <td  width="70" height="30" align="center" bgcolor="#8B8B7A" style="border: thin outset #8B8B7A;"
           onMouseOver="this.bgColor='#CDCDB4'" onMouseOut="this.bgColor='#8B8B7A';this.style.border='thin outset #8B8B7A'"
           onMouseDown="this.style.border='thin inset #8B8B7A';"
           onMouseUp="this.style.border='thin outset #8B8B7A';">
           <div style="font-size: 12px; font-weight: bold;" >
              <a href="pessoajuridicaversaomaximiza.php?navegando=sim&status=elimina&codigoachou=<?echo $codigoachou;?>&buscarparametro=nao&localbanco=<?echo $localbanco;?>&banco=<? echo $banco;?>&iniciotela=nao"
              style="text-decoration:none;color: black;" >Eliminar</a>
           </div>
          </td>
           <?}
          }?>

          </tr>

         </table>




    <? if ($buscarparametro=="sim"){?>

         <div  style="display: block;" id="primeiro">
          <font style='font-size: 17px;color: black;text-align:left;bold: Negrito' ><?echo "Consultando";?><hr>
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
          <td>Razão  Social:</td>
          <td>
          <?
          
           $s = OCIParse($ora_conexao, "select  EMPRESA FROM fornecedor_sadege where
           cod_fornecedor='$codigoachoufinal'");
           OCIExecute($s, OCI_DEFAULT);
           While (OCIFetch($s)) {
               $mostrabus=ociresult($s, "EMPRESA") ;

           }



          ?>

                      <select   name="codigoachoufinal" value="<?echo $codigoachoufinal;?>" onchange="this.form.submit()">
                           <option value=""><?echo $mostrabus;?></option>

                           <?
                           $result2 = "SELECT COD_FORNECEDOR,EMPRESA from fornecedor_sadege
                            where EMPRESA like '%$nomebusca%'";
                 		   $result3 = @OCIParse($ora_conexao, $result2);
				           @OCIExecute($result3, OCI_DEFAULT);
				           while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				           {
                              print "<option value=\"{$row["COD_FORNECEDOR"]}\">{$row["EMPRESA"]}</option>";
                           }
				           ?>
				           </select>


           </td>
           </tr>
           </table>

           <table>

           <?
           if ($codigoachoufinal >"0"){

            $s2 = OCIParse($ora_conexao, "select  EMPRESA NOME,CGC NR_CNPJ  FROM fornecedor_sadege where
            cod_fornecedor='$codigoachoufinal'");
           OCIExecute($s2, OCI_DEFAULT);
           While (OCIFetch($s2)) {


               $nomeahca7=ociresult($s2, "NOME") ;
               $cnpj7=ociresult($s2, "NR_CNPJ") ;

           }




            ?><font style='font-size: 14px;color: black;text-align:left;bold: Negrito' >
            <?echo "Razão Social:$nomeahca7</BR>";?>

            <?echo "Cnpj:$cnpj7</BR>";
           }
            ?>

           <tr>
           <?
           if(empty($codigoachoufinal) )
           {?>
            <td width="40" height="30" align="center" bgcolor="#8B8B7A" style="border: thin outset #8B8B7A;"
           onMouseOver="this.bgColor='#CDCDB4'" onMouseOut="this.bgColor='#8B8B7A';this.style.border='thin outset #8B8B7A'"
           onMouseDown="this.style.border='thin inset #8B8B7A';"
           onMouseUp="this.style.border='thin outset #8B8B7A';">
           <div style="font-size: 12px; font-weight: bold;">
              <a href="pessoajuridicaversaomaximiza.php?navegando=sim&status=cancelar&codigoachou=<?echo $codigoachou;?>&buscarparametro=nao&localbanco=<?echo $localbanco;?>&banco=<? echo $banco;?>&iniciotela=sim"
              style="text-decoration:none;color: black;">Cancelar</a>
           </div>
          </td>
          <?
          }
          else
          {
          ?>

           <td width="40" height="30" align="center" bgcolor="#8B8B7A" style="border: thin outset #8B8B7A;"
           onMouseOver="this.bgColor='#CDCDB4'" onMouseOut="this.bgColor='#8B8B7A';this.style.border='thin outset #8B8B7A'"
           onMouseDown="this.style.border='thin inset #8B8B7A';"
           onMouseUp="this.style.border='thin outset #8B8B7A';">
           <div style="font-size: 12px; font-weight: bold;">
              <a href="pessoajuridicaversaomaximiza.php?navegando=sim&status=editar&codigoachou=<?echo $codigoachoufinal;?>&buscarparametro=nao&localbanco=<?echo $localbanco;?>&banco=<? echo $banco;?>&iniciotela=nao"
              style="text-decoration:none;color: black;">Confirma</a>
           </div>
           </td>




          <td width="40" height="30" align="center" bgcolor="#8B8B7A" style="border: thin outset #8B8B7A;"
           onMouseOver="this.bgColor='#CDCDB4'" onMouseOut="this.bgColor='#8B8B7A';this.style.border='thin outset #8B8B7A'"
           onMouseDown="this.style.border='thin inset #8B8B7A';"
           onMouseUp="this.style.border='thin outset #8B8B7A';">
           <div style="font-size: 12px; font-weight: bold;">
              <a href="pessoajuridicaversaomaximiza.php?navegando=sim&status=cancelar&codigoachou=<?echo $codigoachou;?>&buscarparametro=nao&localbanco=<?echo $localbanco;?>&banco=<? echo $banco;?>&iniciotela=sim"
              style="text-decoration:none;color: black;">Cancelar</a>
           </div>
          </td>

          <?}?>

          </tr>

          </td>
          </table>


                    <input type="hidden" name="continuarmesmatela" value="sim">
                    <input type="hidden" name="buscarparametro" value="sim">
                    <input type="hidden" name="localbanco" value="<?echo $localbanco;?>">
                    <input type="hidden" name="banco" value="<?echo $banco;?>">
                    <input type="hidden" name="iniciotela" value="<?echo $iniciotela;?>">

  		            <input type="hidden" name="status" value="cancelar">

         </div>

      <?}

      if ($status=="elimina"){
      ?>

          <div  style="display: block;" id="primeiro">
          <font style='font-size: 17px;color: black;text-align:left;bold: Negrito' ><?echo "Eliminar Registro";?><br>
          </font>
          <?
            $s2 = OCIParse($ora_conexao, "select  EMPRESA NOME,CGC NR_CNPJ  FROM fornecedor_sadege where
            cod_fornecedor='$codigoachou'");
           OCIExecute($s2, OCI_DEFAULT);
           While (OCIFetch($s2)) {


               $nomeahca7=ociresult($s2, "NOME") ;
               $cnpj7=ociresult($s2, "NR_CNPJ") ;

           }


           ?>
            <hr>

           <table>
           <tr>


           <td width="70" height="30" align="center" bgcolor="#8B8B7A" style="border: thin outset #8B8B7A;"
           onMouseOver="this.bgColor='#CDCDB4'" onMouseOut="this.bgColor='#8B8B7A';this.style.border='thin outset #8B8B7A'"
           onMouseDown="this.style.border='thin inset #8B8B7A';"
           onMouseUp="this.style.border='thin outset #8B8B7A';">
           <div style="font-size: 12px; font-weight: bold;">
              <a href="pessoajuridicaversaomaximiza.php?navegando=sim&status=finalizarexclusao&codigoachou=<?echo $codigoachou;?>&localbanco=<?echo $localbanco;?>&banco=<? echo $banco;?>"
              style="text-decoration:none;color: black;">Confirma</a>
           </div>
           </td>




          <td width="70" height="30" align="center" bgcolor="#8B8B7A" style="border: thin outset #8B8B7A;"
           onMouseOver="this.bgColor='#CDCDB4'" onMouseOut="this.bgColor='#8B8B7A';this.style.border='thin outset #8B8B7A'"
           onMouseDown="this.style.border='thin inset #8B8B7A';"
           onMouseUp="this.style.border='thin outset #8B8B7A';">
           <div style="font-size: 12px; font-weight: bold;">
              <a href="pessoajuridicaversaomaximiza.php?navegando=sim&status=cancelar&codigoachou=<?echo $codigoachou;?>&buscarparametro=nao&localbanco=<?echo $localbanco;?>&banco=<? echo $banco;?>"
              style="text-decoration:none;color: black;">Cancelar</a>
           </div>
          </td>

          </table>
          </tr>


                    <input type="hidden" name="continuarmesmatela" value="sim">
                    <input type="hidden" name="iniciotela" value="<?echo $iniciotela;?>">


         </div>
         <?

    }

    ?>
 </td>
</table>
</center>




</td>

</tr>
</table>




</form>
</body>
</html>

