<?require("estilo2_sitenovo.css");
ini_set('display_errors', '0');// N�O HABILITAD 

                     $edusuario=$_SESSION['edusuario'];
					 $edsenha=$_SESSION["edsenha"];
                     $db=$_SESSION["db"];
                     $bd=$_SESSION["bd"];
                     $host=$_SESSION["host"];
                     $user=$_SESSION["user"];
                     $pass=$_SESSION["pass"];
					 
					 $codigoempresa=$_SESSION["codigoempresa"];
                     $razaoempresa=$_SESSION["razaoempresa"];
					 $nomepessoa4=$_SESSION["nomepessoa4"];
                     $magemtopoinicial=$_SESSION["magemtopoinicial"];
					 $razaoempresa=$_SESSION['razaoempresa'];
					 $nomeempresaconexao=$_SESSION['nomeempresaconexao'];
                     $pagina_atual = $_GET['pagina_atual'];
					 $escolha=$_GET['escolha'];


					 
require("conexaoadodb_oracle.php");
require_once('manipulasql.class_oraclenovo.php');
$programa="listaacessousuario.php";
$titulo="Acesso de Usu�rio Por Unidade";
$programadelete="classeeliminanaojob.php";


if (!IsSet($escolha)){require("logtela.php");}	

$chacontadorgeral="SELECT  a.nr_sequencia  from USUARIO_FABRICA a where a.nr_sequencia > 0 ";
$nometabelaparapassar="USUARIO_FABRICA";

$nomecolunaparapassar="a.nr_sequencia";
$nomecolunaparapassaracao="nr_sequencia";



$navegando=$_GET['navegando'];
$continuarmesmatela=$_POST['continuarmesmatela'];

if ($navegando=="sim")
{
$contadorfabrica=$_GET['contadorfabrica'];
}

if ($continuarmesmatela=="sim")
{
	$contadorfabrica=$_POST['contadorfabrica'];
	$etapa=$_POST['etapa'];
}



?>
<head>
<script language=javascript>

cont = 0;
function CheckAll2() {
   for (var i=0;i<document.formulario.elements.length;i++) {
     var x = document.formulario.elements[i];
     if (x.name == 'lista1[]') {
x.checked = document.formulario.selall.checked;
}
}
if (cont == 0){
var elem = document.getElementById("checar");
elem.innerHTML = "Desmarcar todos";
cont = 1;
} else {
var elem = document.getElementById("checar");
elem.innerHTML = "Marcar todos";
cont = 0;
}

}

</script>
</head>

<form action="listaacessousuario.php" method="POST" name="formulario">

<?require("areasuperior2.php");

require("carregamenumilenionovo2.php");



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
$contador=$_GET['contador'];
$data1=$_GET['data1'];
$data2=$_GET['data2'];
$year=$_GET['year'];
$month=$_GET['month'];
$dia=$_GET['dia'];
$datainicio=$_GET['datainicio'];

$yearf=$_GET['yearf'];
$monthf=$_GET['monthf'];
$diaf=$_GET['diaf'];

$mudoumes=$_GET['mudoumes'];
$dataanterior=$_GET['dataanterior'];
$mesanterior=$_GET['mesanterior'];
$sequenciarecebe=$_GET['sequenciarecebe'];
$statusacao=$_GET['statusacao'];
$padraoexecucao=$_GET['padraoexecucao'];
$solicitantepesquisa=$_GET['solicitantepesquisa'];
$pedidoaltera=$_GET['pedidoaltera'];
$vercalendario=$_GET['vercalendario'];
$acessoudiacalendario=$_GET['acessoudiacalendario'];

$ficanatela=$_GET['ficanatela'];

$vertudopendente=$_GET['vertudopendente'];
$dispminima=$_GET['dispminima'];



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

		$datagravarinicio=$_POST['datagravarinicio'];
			$datagravarfinal=$_POST['datagravarfinal'];
			$quantaslinhas=$_POST['quantaslinhas'];
            $quantosmercado=$_POST['quantosmercado'];
			$mes1=$_POST['mes1'];
			$mes2=$_POST['mes2'];
			$tipoconsulta=$_POST['tipoconsulta'];
			$quantaslinhasmp=$_POST['quantaslinhasmp'];
			$data1=$_POST['data1'];
$data2=$_POST['data2'];
$novo=$_POST['novo'];
$month=$_POST['month'];
$executor=$_POST['executor'];
$ordem=$_POST['ordem'];
$banco=$_POST['banco'];
$acao=$_POST['acao'];
$sequenciarecebe=$_POST['sequenciarecebe'];
$hora=$_POST['hora'];
$hora2=$_POST['hora2'];
$meutexto=$_POST['meutexto'];
$fecharsoli=$_POST['fecharsoli'];
$velocidade1=$_POST['velocidade1'];
$velocidadepadrao=$_POST['velocidadepadrao'];
$solicitantepesquisa=$_POST['solicitantepesquisa'];
$mantenedor=$_POST['mantenedor'];

$atividade=$_POST['atividade'];


$datainicio=$_POST['datainicio'];
$datafinal=$_POST['datafinal'];
$contador=$_POST['contador'];

$ficanatela=$_POST['ficanatela'];
$versituacao=$_POST['versituacao'];
$dispminima=$_POST['dispminima'];

$areapesquisa=$_POST['areapesquisa'];
$secaopesquisa=$_POST['secaopesquisa'];
$centropesquisa=$_POST['centropesquisa'];
$maquina=$_POST['maquina'];

$empresaescolha=$_POST['empresaescolha'];
$usuarioescolha=$_POST['usuarioescolha'];

$statusinsercao=$_POST['statusinsercao'];
$statusdelecao=$_POST['statusdelecao'];
$statusconsulta=$_POST['statusconsulta'];
$statusatualiza=$_POST['statusatualiza'];



}

$achaparametro1= "SELECT DS_URL_SOLICITACAO from parametros";
$achaparametro12= $conn->Execute($achaparametro1);
$mostraicone=$achaparametro12->fields["0"];



if ($dispminima=="0")
{
echo "entra";
$etapaanterior=$etapa-1;


if ($etapaanterior=="1")
{//fabrica
	$lista1=$_POST['lista1'];
		
	for ($passa=0;$passa <=$contadorfabrica;$passa++)
    {
                           $criafinal=$lista1[$passa];
                           

                           if ($criafinal>"0"){
                           
							
							 $usu18ussG7dgpa7 = "insert into  usuario_acesso(cd_usuario,cd_empresa) values
				             ('$usuarioescolha','$empresaescolha')";
			                 $resultussG77= $conn->Execute($usu18ussG7dgpa7);
							 
							            $usu18ussMAXPED3opd = "SELECT MAX(NR_SEQUENCIA) SEQUENCIA FROM usuario_fabrica";
                                        $usu18ussMAXPED23opd= $conn->Execute($usu18ussMAXPED3opd);
                                        $sequencia=$usu18ussMAXPED23opd->fields["0"];
										if ($sequencia >"0"){$sequencia1=$sequencia+1;}else{$sequencia1="1";}
										
                             $usu18ussG7dgpa = "insert into  USUARIO_FABRICA(nr_sequencia,cd_usuario,cd_empresa,cd_fabrica,id_insert,id_exclusao,id_atualizacao,id_consultar) values
				             ('$sequencia1','$usuarioescolha','$empresaescolha','$criafinal','$statusinsercao','$statusdelecao','$statusatualiza','$statusconsulta')";
			                 $resultussG7= $conn->Execute($usu18ussG7dgpa);
				            
                             $erromostra=$conn->ErrorMsg();
                             //erro
						     require("logerrobi.php");
									
						   }
    }
	$dispminima="1";
}//FINAL DA FABRICA


}//FINAL DA GRAVACAO
?>
 
 


<titulogeral><? echo "$titulo";?></titulogeral></br>
<a href="<?echo $mostraicone;?>"><IMG src="iconesolicitacao.png" align="center" width="70" height="75" ></a>

<a href="listaacessousuario.php?pagina=1&dispminima=0&programa=<?echo $programa;?>&navegando=sim&escolha=1"><IMG src="usuario4d.png" align="center" width="70" height="75" ></a>


<?


if (!IsSet($dispminima) or ($dispminima >"0"))
{
?>

</br></br>
<div style="height:60%;width:90%;overflow:scroll" > 
<table  border=0
 style='background:white;' width="90%" align="center" class="tabela1">
 <tr>
    			<th>Empresa</th>
				<th>Usu�rio</th>
				<th>Unidade</th>
                <th>Privil�gio</br>Inser��o</th>
				<th>Exclus�o</th>
				<th>Atualiza��o</th>
				<th>Somente</br>Consultar</th>
				<th width="5%">A��o</th>
 </tr>
<?

$chacontadorgeralpagina="SELECT count(*) CONTADOR  FROM MTBF";
 


$sacha="SELECT * from (select c.descricao,d.ds_fabrica,b.nm_usuario,a.ID_INSERT,a.ID_EXCLUSAO,a.iD_ATUALIZACAO,a.ID_CONSULTAR,a.CD_USUARIO,a.CD_EMPRESA,a.CD_FABRICA,a.nr_sequencia,
rownum Id from 
 USUARIO_FABRICA a,usuario_bi b,pessoa_bi c,fabricas d where a.cd_usuario=b.cd_usuario and a.cd_empresa=c.codigo and a.cd_fabrica=d.cd_fabrica
  order by b.nm_usuario ASC)
 ";
 
 $s=$sacha;

 
 
  $smpegaaux2= $conn->Execute($s);
  while ( !$smpegaaux2->EOF)
  {
	    //$codigocomponente=$smpegaaux2->fields["0"];
		
        ?>
			<tr>
					<td><?echo $smpegaaux2->fields["0"];?></td>
					<td><?echo $smpegaaux2->fields["2"];?></td>
					<td><?echo $smpegaaux2->fields["1"];?></td>
					<td><?
					$mostrastatus1=$smpegaaux2->fields["3"];
					if ($mostrastatus1=="S"){echo "Sim";}else{}?>
					</td>
					<td><?
					$mostrastatus2=$smpegaaux2->fields["4"];
					if ($mostrastatus2=="S"){echo "Sim";}else{}
					?></td>
					<td><?
					$mostrastatus3=$smpegaaux2->fields["5"];
					if ($mostrastatus3=="S"){echo "Sim";}else{}
					?></td>
					<td><?
					$mostrastatus4=$smpegaaux2->fields["6"];
					if ($mostrastatus4=="S"){echo "Sim";}else{}
					?></td>
					<td width="5%">
                    <a href="<?echo $programadelete;?>?navegando=sim&escolha=elimina&codigoachou=<?echo $smpegaaux2->fields["10"];?>&chacontadorgeral=<?echo $chacontadorgeral;?>&programa=<?echo $programa;?>&nometabelaparapassar=<?echo $nometabelaparapassar;?>&nomecolunaparapassar=<?echo $nomecolunaparapassar;?>&nomecolunaparapassaracao=<?echo $nomecolunaparapassaracao;?>&titulojanelaelimina=<?echo $titulojanelaelimina;?>">
                    <IMG src="lixeiranova2.png" width="25" height="20" ></a>
                    </td>
					
					
                   
           <?$smpegaaux2->MoveNext();
}?>
           </tr>
 </table>
 </div>
 

<?
//require ("rodapepagina.php");
}


if ($dispminima=="0")
{


?>
<div  style="display: block;" id="janelagrande1">
Defina Empresa Usu�rio e sua Parametriza��o por Unidade
        <table  width="100%"  border="0" background-image="sairmensagem.png" >
        <tr>
        <td  align=right>
        <?echo $titulojanelainsert;?>
        <a href="listaacessousuario.php?navegando=sim&escolha=1">
        <IMG src="sairmensagem.png" width="38" height="38" ></a>
        </td>
        </tr>
        </table>


                <table>
		    	<tr>
		        <td>
		        Empresa:
		        </td>
                <td>
				
                     <select name="empresaescolha" style="background-color:#8B8378;color: white;" >
                                          <?
				     $stmt1 = "SELECT CODIGO,DESCRICAO FROM pessoa_bi where id_tipo_pessoa='2' ";
                     			 
					 
					 $result3 = $conn->Execute($stmt1);
                     while ( !$result3->EOF) {
                          print "<option value=\"{$result3->fields["0"]}\">{$result3->fields["1"]}</option>";


                     $result3->MoveNext();
                     }
				 
				 ?>
				 		 
				 </select>
				 </td>
				 </tr>
				 
				<tr>
		        <td>
		        Usu�rio:
		        </td>
                <td>
				
                     <select name="usuarioescolha" style="background-color:#8B8378;color: white;" >
                    
                     <?
				     $stmt1 = "SELECT CD_USUARIO,NM_USUARIO FROM usuario_bi order by NM_USUARIO asc";
                     $result3 = $conn->Execute($stmt1);
                     while ( !$result3->EOF) {
                          print "<option value=\"{$result3->fields["0"]}\">{$result3->fields["1"]}</option>";


                     $result3->MoveNext();
                     }
				 
				 ?>
				 		 
				 </select>
				 </td>
				 </tr>
				
				<tr>
		        <td>
		        Privil�gio de Inser��o
		        </td>
                <td>
                <select  name="statusinsercao" >
                <option value="N">N�o</option>
                <option value="S">Sim</option>
                </select>
	             </td>
				 </tr>
				 
				 <tr>
		        <td>
		        Eliminar  Registros
		        </td>
                <td>
                <select  name="statusdelecao" >
                <option value="N">N�o</option>
                <option value="S">Sim</option>
                </select>
	             </td>
				 </tr>
				 
				<tr>
		        <td>
		        Atualiza��o de Registros
		        </td>
                <td>
                <select  name="statusatualiza" >
                <option value="N">N�o</option>
                <option value="S">Sim</option>
                </select>
	             </td>
				 </tr>
				 
				 <tr>
		        <td>
		        Somente Consultar
		        </td>
                <td>
                <select  name="statusconsulta" >
                <option value="N">N�o</option>
                <option value="S">Sim</option>
                </select>
	             </td>
				 </tr>
				 
				 
				</table> 
	
	

<hr>

		
	

<input type=checkbox name="selall" onClick="CheckAll2()">
        <span id="checar">Marcar todas as Unidades</span>
		 <div style="height:60%;width:90%;overflow:scroll" > 
		  <center><table  border=0
           style='background:white;' width="100%" align="center" class="tabela1">
			<tr>

				<th>Unidade</th>
				<th>Nome</th>
               	<th>Selecionar</th>
             </tr>
<?
                 
                 $contadorfabrica="0";
                 $result2 = "SELECT cd_fabrica,DS_FABRICA FROM   FABRICAS ORDER  by DS_FABRICA ASC";
				 $result3 = $conn->Execute($result2);
                 while ( !$result3->EOF) {
				 $contadorfabrica=$contadorfabrica+1;
                 ?>
                    <tr>

					<td><?echo $result3->fields["0"];?></td>
					<td><?echo $result3->fields["1"];?></td>
					<td ><input type="checkbox" name="lista1[]"   value="<?echo $result3->fields["0"];?>"></td>
                    </tr>
                    
               <?
               $result3->MoveNext();
               }?>
			   
              
            </table>
			<input type="hidden" name="etapa" value="2">
			<input type="hidden" name="dispminima" value="0">
			<input type="hidden" name="contadorfabrica" value="<?echo $contadorfabrica;?>">
		<input type="hidden" name="continuarmesmatela" value="sim">
       		
		
        
</div>

		<a href="#" onclick="document.forms[0].submit();return false;">
        <IMG src="okmensagem.png" width="62" height="45" align="center" ></a>
</div>
		
		<?}?>

</form>
</html>

