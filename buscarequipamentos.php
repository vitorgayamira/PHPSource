<?require("estilo2_sitenovo.css");
ini_set('display_errors', '0');// NÃƒO HABILITAD 

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
					 $programa=$_GET['programa'];
					 $tipomaquina=$_GET['tipomaquina'];

					 
require("conexaoadodb_oracle.php");
require_once('manipulasql.class_oraclenovo.php');

?>


<form name=Form2  action="cadastroequipamento.php"  method="POST" >
<div id="janelabuscamaquina"  style="display: block;">


<table  width="100%"  border="0" background-image="sairmensagem.png" >
        <tr>
        <td  align=right>
		<titulogeral>Atualizando Registros</titulogeral>
        
		<a href="buscarequipamentos.php?pagina=1&escolha=pesquisa&tipomaquina=1&programa=<?echo $programa;?>">Máquinas</a>|<a href="buscarequipamentos.php?pagina=1&escolha=pesquisa&tipomaquina=2&programa=<?echo $programa;?>">Componentes</a>
		<a href="<?echo $programa;?>?navegando=sim&escolha=1">
        <IMG src="sairmensagem.png" width="38" height="38" ></a>
        </td>
        </tr>
        </table>
		
		
	 

<div style="height:60%;width:100%;overflow:scroll" > 
</br></br>
<center><table  border=0 style='background:white;' width="60%" align="center" class="tabela1">
<tr>
<th>Codigo</th>
<th>Descrição</th>
<th>Seleciona</th>
</tr>
<?
echo "tipo:$tipomaquina";
if ($tipomaquina=="1"){$chacontadorgeralinsert3="select cd_maquina,ds_maquina from maquinas";}
if ($tipomaquina=="2"){$chacontadorgeralinsert3="select cd_compo,ds_compo from componente_auxiliar";}

//Instancio a classe de manipulaÃ§Ã£o
$s = new ManipulaSql();
$s->Seleciona($chacontadorgeralinsert3);
if(!empty($s->content))
{
    foreach ($s->content as $v)
    {
    ?>
        <tr>
        <?
        for($i3 = 0;$i3 < 2; $i3++){
        ?>
        <td><?echo $v[$i3];?></td>
        <?}?>
        <td><input type="radio" name="campogravapaiposicao3" value="<?echo $v[0];?>"></td>
        </tr>
    <?
    }
}
 ?>
 </table>
 </div>
 
 <input type="hidden" name="continuarmesmatela" size="5" value="sim" >
 <input type="hidden" id="escolha" name="escolha" size="5" value="atualizar" >
 <input type="hidden" id="escolha" name="tipomaquina" size="5" value="<?echo $tipomaquina;?>" >


<a href="#" onclick="document.forms[0].submit();return false;">
        <center><IMG src="okmensagem.png" width="62" height="45" align="center" ></center></a>

</form>
