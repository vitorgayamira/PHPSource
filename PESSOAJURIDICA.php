<?
$cortopo="#828282";
$corfundo="#4682B4";

require("configuramysql.php");
require("estilo2.css");
require("estilonavegacaofundo.css");


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
$ambiente=$_GET['ambiente'];
$localbanco=$_GET['localbanco'];


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
$setorpesquisa=$_POST['setorpesquisa'];
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

		$datagravarinicio=$_POST['datagravarinicio'];
			$datagravarfinal=$_POST['datagravarfinal'];
			$quantaslinhas=$_POST['quantaslinhas'];
            $quantosmercado=$_POST['quantosmercado'];
			$mes1=$_POST['mes1'];
			$mes2=$_POST['mes2'];
			$tipoconsulta=$_POST['tipoconsulta'];
			$razao=$_POST['razao'];



}
echo "Ambiente:$ambiente";
$ano=date('Y');
$mes=date('m');
?>





<html><head>
<script>
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
  alert("CNPJ Valido !");
  document.teste.botao.disabled = false;
  document.getElementById("AVANCA").disabled=false;

  document.teste.AVANCA.disabled = false;
  }
 else
  {
  alert("CNPJ Nao Válido!");
  document.teste.botao.disabled = true;
  document.getElementById("AVANCA").disabled=true;



  }

 document.forms[0].CNPJ.focus();
 return;
 }

</script>
</head>



<body> 

<form name='teste' action='PESSOAJURIDICA2.php'  method="POST">


<?



//acha VARIACAO PADRAO
$usu18 = "SELECT CD_VARIACAO VARIACAO FROM VARIACAO_ANIMAL_BI WHERE CD_VARIACAO IN (SELECT CD_VARIACAO FROM USUARIO_BI where CD_USUARIO='$codigousuario')";
//echo "$usu18";
$res8 = mysql_db_query($banco,$usu18,$conexao);
$valor87=mysql_fetch_array($res8);
$variacao3=$valor87["VARIACAO"];

//acha VARIACAO PADRAO
$usu18 = "SELECT CD_EMPRESA FROM PARAMETRO_BI";
//echo "$usu18";
$res8 = mysql_db_query($banco,$usu18,$conexao);
$valor87=mysql_fetch_array($res8);
$codigoempresa=$valor87["CD_EMPRESA"];


?>


<center><font style='font-size: 21px;color: white;text-align:left;bold: Negrito' >Cadastrando Pessoa Jurídica</font></br>



<center><table>
 <tr>
 <td>
 Razao Social
 </td>
 <td>
 <input type='text' size=48 name='razao' >
 </td>
 </tr>
 
 <tr>
 <td>
 Endereço
 </td>
 <td>
 <input type='text' size=68 name='logradouro' >
 </td>
 </tr>
 
 <tr>
 <td>
 Cep
 </td>
 <td>
 <input type='text' size=10 name='cep' >
 </td>
 </tr>
 
 <tr>
 <td>
 Bairro
 </td>
 <td>
 <input type='text' size=20 name='bairro' >
 </td>
 </tr>
 
 <tr>
 <td>
 Email
 </td>
 <td>
 <input type='text' size=28 name='email' >
 </td>
 </tr>

	<tr>
	<td>Cnpj</td>
	<td>
    <input type='text' maxlength=18 name='CNPJ' onFocus='this.select();' OnKeyUp="FormataCGC('Form', 'CNPJ', event);" value="43426626000924">
    <?
    //HABILIATR TESTAR CNPJ<input type='button' value='Validar' onClick='TESTA();'>
    ?>
    </td>
	</tr>




    </table>

    <input type="hidden" name="banco" value="<?echo $banco;?>">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">
		<input type="hidden" name="ambiente" value="<?echo $ambiente;?>">
		<input type="hidden" name="localbanco" value="<?echo $localbanco;?>">

    <?
    //PARA CNPJ ATIVO TESTE
    //<center><input  type="submit"   VALUE="Continuar " name="botao" disabled></td>
    ?>
    <center><input  type="submit"   VALUE="Continuar " name="botao" ></td>
 




</form> 
</body>

</html> 
</div>
