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






 body{
         width:100%;
	     height:100%;
         background: url() no-repeat;
         background-color: white;

}



</style>

<script LANGUAGE="JavaScript">
function Botao1()
{
document.nome_formulario.action="pessoajuridicaversa2.php";
document.forms.nome_formulario.submit();
}
</script>
<script LANGUAGE="JavaScript">
function Botao2()
{
document.nome_formulario.action="pessoajuridicaversa3.php";
document.forms.nome_formulario.submit();
}
</script>


<script LANGUAGE="JavaScript">
function Botao3()
{
document.nome_formulario.action="pessoajuridica.php";
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
<form action="pessoajuridicaversa2maximiza.php" method="POST" name="nome_formulario">


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

require("configuramysql.php");
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

<center><font style='font-size: 24px;color: red;text-align:center;bold: Negrito' >Cadastro de Pessoa  Jurídica</font>
</br>


     
     <?$usu185 = "SELECT b.nr_lote LOTE5,b.DS_LOTE LOTE,a.vl_peso_medio PESO from CURVA_BI a,LOTE_BI b
                where a.nr_lote=b.nr_lote AND
			    ID_CURVA IN (SELECT ID_CURVA FROM PARAMETRO_BI)";

$res855 = mysql_db_query($banco,$usu185,$conexao);
$valor8755=mysql_fetch_array($res855);
$numerolote=$valor8755["LOTE5"];
$valorpeso=$valor8755["PESO"];


//acha VARIACAO PADRAO
$usu18 = "SELECT CD_VARIACAO VARIACAO,ds_variacao DESCRICAO6 FROM
variacao_animal_bi WHERE CD_VARIACAO IN (SELECT CD_VARIACAO FROM USUARIO_BI where CD_USUARIO='$codigousuario')";
$res8 = mysql_db_query($banco,$usu18,$conexao);
$valor87=mysql_fetch_array($res8);
$variacao3=$valor87["VARIACAO"];
$descricaovariacao=$valor87["DESCRICAO6"];




?>

	<center>Cnpj<input type='text' maxlength=18 name='CNPJ' onFocus='this.select();'
    OnKeyUp="FormataCGC('Form', 'CNPJ', event);"
    value=""><input type='button' value='Validar' onClick='TESTA();'></br>


    Razão Social:<input  style="background-color:#8B8378;color: white;" type="txt" name="razaoescolha"
    value="<?echo $razaoescolha;?>" size="35" >

    Classificação:<select name="mespesquisa" style="background-color:#8B8378;color: white;">
     <option value="00">Todas</option>
    <option value="01">Matriz</option>
    <option value="02">Filial</option>
    <option value="03">Fábrica de Ração</option>
    <option value="04">Incubatório</option>
    <option value="05">Fornecedor em Geral</option>
    <option value="06">Fornecedor Serviço</option>
    <option value="07">Fornecedor Serviço/Materiais</option>


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

 <hr>
 
 
 <?
 
 
 
 $sql9923 = "SELECT CODIGO,
 DESCRICAO RAZAO,
 NR_INSCRICAO,
 NR_CNPJ,
  NM_LOGRADOURO,
  DS_COMPLEMENTO,
  NR_CEP,
  NM_BAIRRO,
  DS_EMAIL,
  ID_MATRIZ,
  ID_FILIAL,
  CD_CIDADE,
  VL_CAPACIDADE_DIA,
  VL_DISPONIVEL_DIA_APANHA,
  VL_HORA_PARADA_TURNO,
  ID_FABRICA_RACAO,
  ID_FRIGORIFICO,
  ID_INCUBATORIO,
  ID_FORNECEDOR,
  ID_FORNECEDOR_SERVICO
  FROM pessoa_bi
 where descricao like '%$razaoescolha%'
 and  ID_TIPO_PESSOA='2' and ((NR_CNPJ like '%%') or (NR_CNPJ IS NULL))

  ";


  ?>
 
 
 </br></br>
 <center><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
    style='background:white;border-collapse:collapse;border:none;mso-border-alt:
    solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
    mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="78%">

   <tr>
       <th>Razão Social</th>
       <th>Cnpj</th>
       <th>Inscrição Estadual</th>

       <th>Endereço</th>
       <th>Cidade</th>
       <th>Estado</th>
   </tr>


   <?
   $sql99234 = mysql_db_query($banco,$sql9923,$conexao);
   while ($valor4=mysql_fetch_array($sql99234)){
          $descrica88=$valor4["RAZAO"];
          $cnpj88=$valor4["NR_CNPJ"];
          $codigopessoa=$valor4["CODIGO"];


   ?>
   <tr>

       <td><?echo $descrica88;?></td>
       <td><?echo $cnpj88;?></td>
       <td><?echo $valor4["NR_INSCRICAO"];?></td>


       
       <td>Endereço:<?echo $valor4["NM_LOGRADOURO"];?>-<?echo $valor4["DS_COMPLEMENTO"];?> Bairro:
       <?echo $valor4["NM_BAIRRO"];?> Cep: <?echo $valor4["NR_CEP"];?></br>

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

</table>



</form>
</html>




