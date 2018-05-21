<html>
<head>

<Script Language="JavaScript">
function getStates(what) {
   if (what.selectedIndex != '') {
      var funcaochegando = what.value;
      document.location=(funcaochegando);
   }
}
</Script>


<style  type="text/css">
#envolve { width: 100%}
 #div_1 { position: relative; width: 30%; height: 100%; background-color: #FFFFFF; border:1;float: left; text-align: center; color: #E8E8E8;  }
 #div_2 { position: relative; width: 70%; height: 100%; background-color: #FFFFFF; float: right; text-align: center; color: #E8E8E8;}
 #clear { clear:both; }







</style>

<script LANGUAGE="JavaScript">
function Botao1()
{
document.nome_formulario.action="pessoajuridicaversa2oracle.php";
document.forms.nome_formulario.submit();
}
</script>
<script LANGUAGE="JavaScript">
function Botao2()
{
document.nome_formulario.action="pessoajuridicaversa3oracle.php";
document.forms.nome_formulario.submit();
}
</script>


<script LANGUAGE="JavaScript">
function Botao3()
{
document.nome_formulario.action="pessoajuridicaversa4oracle.php";
document.forms.nome_formulario.submit();
}
</script>

<script LANGUAGE="JavaScript">

function isNUMB(c)
 {
 if((cx=c.indexOf(","))!=-1)
  {
  c = c.substring(0,cx)+"."+c.substring(cx+1);
  }
 if((parseFloat(c) / c != 1))
  {
  if(parseFloat(c) * c == 0)
   {
   return(1);
   }
  else
   {
   return(0);
   }
  }
 else
  {
  return(1);
  }
 }
function LIMP(c)
 {
 while((cx=c.indexOf("-"))!=-1)
  {
  c = c.substring(0,cx)+c.substring(cx+1);
  }
 while((cx=c.indexOf("/"))!=-1)
  {
  c = c.substring(0,cx)+c.substring(cx+1);
  }
 while((cx=c.indexOf(","))!=-1)
  {
  c = c.substring(0,cx)+c.substring(cx+1);
  }
 while((cx=c.indexOf("."))!=-1)
  {
  c = c.substring(0,cx)+c.substring(cx+1);
  }
 while((cx=c.indexOf("("))!=-1)
  {
  c = c.substring(0,cx)+c.substring(cx+1);
  }
 while((cx=c.indexOf(")"))!=-1)
  {
  c = c.substring(0,cx)+c.substring(cx+1);
  }
 while((cx=c.indexOf(" "))!=-1)
  {
  c = c.substring(0,cx)+c.substring(cx+1);
  }
 return(c);
 }

function VerifyCNPJ(CNPJ)
 {
 CNPJ = LIMP(CNPJ);
 if(isNUMB(CNPJ) != 1)
  {
  return(0);
  }
 else
  {
  if(CNPJ == 0)
   {
   return(0);
   }
  else
   {
   g=CNPJ.length-2;
   if(RealTestaCNPJ(CNPJ,g) == 1)
    {
    g=CNPJ.length-1;
    if(RealTestaCNPJ(CNPJ,g) == 1)
     {
     return(1);
     }
    else
     {
     return(0);
     }
    }
   else
    {
    return(0);
    }
   }
  }
 }
function RealTestaCNPJ(CNPJ,g)
 {
 var VerCNPJ=0;
 var ind=2;
 var tam;
 for(f=g;f>0;f--)
  {
  VerCNPJ+=parseInt(CNPJ.charAt(f-1))*ind;
  if(ind>8)
   {
   ind=2;
   }
  else
   {
   ind++;
   }
  }
  VerCNPJ%=11;
  if(VerCNPJ==0 || VerCNPJ==1)
   {
   VerCNPJ=0;
   }
  else
   {
   VerCNPJ=11-VerCNPJ;
   }
 if(VerCNPJ!=parseInt(CNPJ.charAt(g)))
  {
  return(0);
  }
 else
  {
  return(1);
  }
 }


  function FormataCGC(Formulario, Campo, TeclaPres)
  {
    var tecla = TeclaPres.keyCode;
    var strCampo;
    var vr;
    var tam;
    var TamanhoMaximo = 14;

    eval("strCampo = document." + Formulario + "." + Campo);

    vr = strCampo.value;
    vr = vr.replace("/", "");
    vr = vr.replace("/", "");
    vr = vr.replace("/", "");
    vr = vr.replace(",", "");
    vr = vr.replace(".", "");
    vr = vr.replace(".", "");
    vr = vr.replace(".", "");
    vr = vr.replace(".", "");
    vr = vr.replace(".", "");
    vr = vr.replace(".", "");
    vr = vr.replace(".", "");
    vr = vr.replace("-", "");
    vr = vr.replace("-", "");
    vr = vr.replace("-", "");
    vr = vr.replace("-", "");
    vr = vr.replace("-", "");
    tam = vr.length;

    if (tam < TamanhoMaximo && tecla != 8)
    {
      tam = vr.length + 1;
    }

    if (tecla == 8)
    {
      tam = tam - 1;
    }

    if (tecla == 8 || tecla >= 48 && tecla <= 57 || tecla >= 96 && tecla <= 105)
    {
      if (tam <= 2)
      {
        strCampo.value = vr;
      }
       if ((tam > 2) && (tam <= 6))
       {
         strCampo.value = vr.substr(0, tam - 2) + '-' + vr.substr(tam - 2, tam);
       }
       if ((tam >= 7) && (tam <= 9))
       {
         strCampo.value = vr.substr(0, tam - 6) + '/' + vr.substr(tam - 6, 4) + '-' + vr.substr(tam - 2, tam);
      }
       if ((tam >= 10) && (tam <= 12))
       {
         strCampo.value = vr.substr(0, tam - 9) + '.' + vr.substr(tam - 9, 3) + '/' + vr.substr(tam - 6, 4) + '-' + vr.substr(tam - 2, tam);
      }
       if ((tam >= 13) && (tam <= 14))
       {
         strCampo.value = vr.substr(0, tam - 12) + '.' + vr.substr(tam - 12, 3) + '.' + vr.substr(tam - 9, 3) + '/' + vr.substr(tam - 6, 4) + '-' + vr.substr(tam - 2, tam);
      }
       if ((tam >= 15) && (tam <= 17))
       {
         strCampo.value = vr.substr(0, tam - 14) + '.' + vr.substr(tam - 14, 3) + '.' + vr.substr(tam - 11, 3) + '.' + vr.substr(tam - 8, 3) + '.' + vr.substr(tam - 5, 3) + '-' + vr.substr(tam - 2, tam);
      }
    }
  }

function TESTA()
 {
 if(VerifyCNPJ(document.forms[0].CNPJ.value) == 1)
  {
  alert("CNPJ Valido");
  document.nome_formulario.botao.disabled = false;

  document.nome_formulario.turno.disabled = false;
  }
 else
  {
  alert("CNPJ Não é  Valido!");
  document.nome_formulario.botao.disabled = true;

  document.nome_formulario.tunro.disabled = true;
  }

 document.forms[0].CNPJ.focus();
 return;
 }
</script>

</head>
<form action="pessoajuridicaversa2oracle.php" method="POST" name="nome_formulario">


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
$mes1=$_GET['mes1'];
$tipoconsulta=$_GET['tipoconsulta'];


}
if ($continuarmesmatela=="sim"){
$codigousuario=$_POST['codigousuario'];
$codigoempresa=$_POST['codigoempresa'];
$escolha=$_POST['escolha'];
$tela=$_POST['tela'];
$mes=$_POST['mes'];
$ano=$_POST['ano'];

$curva=$_POST['curva'];
$pesomedio=$_POST['pesomedio'];
$turnopesquisa=$_POST['turnopesquisa'];
$turno=$_POST['turno'];

$tipo=$_POST['tipo'];
$novo=$_POST['novo'];
$pagina=$_POST['pagina'];
$dia1=$_POST['dia1'];
$dia2=$_POST['dia2'];
$quantidade=$_POST['quantidade'];
$semanainicio=$_POST['semanainicio'];
	$semanafinal=$_POST['semanafinal'];
    $turno=$_POST['turno'];
	$primeirasemana=$_POST['primeirasemana'];
	$segundasemana=$_POST['segundasemana'];
	$diainicial=$_POST['diainicial'];
		$diafinal=$_POST['diafinal'];
		$sequencia3=$_POST['sequencia3'];
        $simulacao=$_POST['simulacao'];
        $banco=$_POST['banco'];

		$datagravarinicio=$_POST['datagravarinicio'];
			$datagravarfinal=$_POST['datagravarfinal'];
			$quantaslinhas=$_POST['quantaslinhas'];
            $quantosmercado=$_POST['quantosmercado'];
			$mes1=$_POST['mes1'];
			$mes2=$_POST['mes2'];
			$tipoconsulta=$_POST['tipoconsulta'];
			$quantaslinhasmp=$_POST['quantaslinhasmp'];
			$quantaslinhasnutrientemp=$_POST['quantaslinhasnutrientemp'];
			$existenutriente=$_POST['existenutriente'];
			$telainiciarsimulacao=$_POST['telainiciarsimulacao'];
			$tipoconsulta2=$_POST['tipoconsulta2'];
            $gravandofinal=$_POST['gravandofinal'];
            $existenutriente=$_POST['existenutriente'];
            $diapesquisa=$_POST['diapesquisa'];
            $mespesquisa=$_POST['mespesquisa'];
            $anopesquisa=$_POST['anopesquisa'];
            $razaoescolha=$_POST['razaoescolha'];
            $escolhaatual=$_POST['escolhaatual'];
            $CNPJ=$_POST['CNPJ'];




}

$escolhaatual==$_GET['escolhaatual'];

require("configuraoracle.php");
require("estilo2.css");





 if (!IsSet($anopesquisa)){
   $anopesquisa=date('Y');
  }

  if (!IsSet($mespesquisa)){
   $mespesquisa=date('m');

  }
  
  if (!IsSet($diapesquisa)){
   $diapesquisa=date('d');
  }
  

  if ($mespesquisa=="8"){$mespesquisamostra="Agosto";}
  if ($mespesquisa=="5"){$mespesquisamostra="Maio";}
  if ($mespesquisa=="1"){$mespesquisamostra="Janeiro";}
  if ($mespesquisa=="2"){$mespesquisamostra="Fevereiro";}
  if ($mespesquisa=="3"){$mespesquisamostra="Março";}
  if ($mespesquisa=="4"){$mespesquisamostra="Abril";}
  if ($mespesquisa=="6"){$mespesquisamostra="Junho";}
  if ($mespesquisa=="7"){$mespesquisamostra="Julho";}
  if ($mespesquisa=="9"){$mespesquisamostra="Setembro";}
  if ($mespesquisa=="10"){$mespesquisamostra="Outubro";}
  if ($mespesquisa=="11"){$mespesquisamostra="Novembro";}
  if ($mespesquisa=="12"){$mespesquisamostra="Dezembro";}





?>

<center><font style='font-size: 24px;color: red;text-align:center;bold: Negrito' >Pessoas Jurídicas</font>
</br></br>


     <font style='font-size: 15px;color: black;text-align:center;bold: Negrito' >


	<center>Cnpj<input type='text' maxlength=18 name='CNPJ' onFocus='this.select();'
    OnKeyUp="FormataCGC('Form', 'CNPJ', event);"
    value=""><input type='button' value='Validar' onClick='TESTA();'>


    Razão Social:<input  style="background-color:#8B8378;color: white;" type="txt" name="razaoescolha"
    value="<?echo $razaoescolha;?>" size="35" >



    



        <input type="hidden" name="escolha" value="1">
        <input type="hidden" name="banco" value="<?echo $banco;?>">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">
		<input type="hidden" name="mes2" value="12">
		<input type="hidden" name="tipoconsulta" value="<?echo $tipoconsulta;?>">
		<input type="hidden" name="banco" value="<?echo $banco;?>">
		<input type="hidden" name="variacao3" value="<?echo $variacao3;?>">
		<input type="hidden" name="descricaocurva" value="<?echo $descricaocurva;?>">
		<input type="hidden" name="valorpeso" value="<?echo $valorpeso;?>">
		<input type="hidden" name="numerolote" value="<?echo $numerolote;?>">
		





 <input type="SUBMIT" onclick="Botao1()" value="Consultar"></input>

 <input type="button" onclick="Botao2()" value="Atualizar"></input>
 <input type="button" onclick="Botao3()" value="Novo"></input>

 </br></br>
 
 
 <?
 
 $s = OCIParse($ora_conexao, "SELECT a.COD_FORNECEDOR FORN,a.EMPRESA EMPRESA,a.CGC CGC,a.ENDERECO ENDERECO,
 a.BAIRRO BAIRRO, a.CEP CEP,a.TELEFONE TELEFONE,a.CONTATO CONTATO,a.E_MAIL EMAIL,b.ds_cidade CIDADE,c.SIGLA SIGLA
 FROM fornecedor_sadege a,CIDADE_SADEGE b,ESTADO_SADEGE c
 WHERE a.EMPRESA like '%$razaoescolha%' and
 a.cd_cidade=b.cd_cidade(+) and
 b.cd_estado=c.cd_estado(+)
 and ((CGC like '%$CNPJ%') or (CGC IS NULL))
 ");
 

  ?>
 
 
 </br></br>
 <center><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
    style='background:white;border-collapse:collapse;border:none;mso-border-alt:
    solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
    mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="90%">

   <tr>
       <th>Razão Social</th>
       <th>Cnpj</th>


       <th>Endereço</th>
       <th>Cidade</th>
       <th>Estado</th>
   </tr>


   <?
   OCIExecute($s, OCI_DEFAULT);
    While (OCIFetch($s)) {
      $razaosocial=ociresult($s, "EMPRESA") ;
      $cgc=ociresult($s, "CGC") ;
      $cidade=ociresult($s, "CIDADE") ;
      $estado=ociresult($s, "SIGLA") ;


   ?>
   <tr>

       <td><?echo $razaosocial;?></td>
       <td><?echo $cgc;?></td>

       <td>Endereço:<?echo ociresult($s, "ENDERECO");?> Bairro:
       <?echo ociresult($s, "BAIRRO");?> Cep: <?echo  ociresult($s, "CEP");?></br>
        Telefone: <?echo  ociresult($s, "TELEFONE");?> Contato:<?echo  ociresult($s, "CONTATO");?>
        Email:<?echo  ociresult($s, "EMAIL");?>
        
       </td>

       <td><?echo $cidade;?></td>
       <td><?echo $estado;?></td>

   </tr>




   <?
   }

   ?>

</table>



</form>
</html>




