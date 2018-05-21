<?require("estilo2_sitenovo.css");
ini_set('display_errors', '0');// NÃO HABILITAD 

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
//----------------------------------------------------------------
//parametrização da tela
$programa="consultaordensv6.php";
$titulo="Consulta Ordens";
$programadelete="classeelimina.php";
$programaupdate="classeupdate.php";


//--------------------------------------

$navegando=$_GET['navegando'];
$continuarmesmatela=$_POST['continuarmesmatela'];

//pega data de incio


if ($continuarmesmatela=="sim")
{
$grupoordens= $_POST['grupoordens'];
$dataparabuscar1=$_POST['dataparabuscar1'];
$dataparabuscar2=$_POST['dataparabuscar2'];	
$fabricapesquisa=$_POST['fabricapesquisa'];	

$solicitantepesquisainicial=$_POST['solicitantepesquisainicial'];	
$numeroordempesquisa=$_POST['numeroordempesquisa'];	
$codigomaquina=$_POST['codigomaquina'];	
$tipoordemstatus=$_POST['tipoordemstatus'];	
$tipoatividadepesquisa=$_POST['tipoatividadepesquisa'];	
	
}

if ($navegando=="sim"){
$grupoordens= $_GET['grupoordens'];
$dataparabuscar1=$_GET['dataparabuscar1'];
$dataparabuscar2=$_GET['dataparabuscar2'];	
$fabricapesquisa=$_GET['fabricapesquisa'];	

$solicitantepesquisainicial=$_GET['solicitantepesquisainicial'];	
$numeroordempesquisa=$_GET['numeroordempesquisa'];	
$codigomaquina=$_GET['codigomaquina'];	
$tipoordemstatus=$_GET['tipoordemstatus'];	
$tipoatividadepesquisa=$_GET['tipoatividadepesquisa'];	

}	

if (!IsSet($ano)){
$ano=date('Y');
}
if (!IsSet($dia)){
$dia=date('d');
}
if (!IsSet($mes)){
$mes=date('m');
}

if (!IsSet($grupoordens)){
$grupoordens="C";
}


if (!IsSet($tipoordemstatus)){
$tipoordemstatus="G";
}

if (!IsSet($dataparabuscar1)){
	
	             $datapegou1 = "SELECT to_char(MIN(DATA_INICIO),'yyyy-mm-dd') DATA FROM EMER_COMP WHERE STATUS <> 'B'";
                 $datapegou2 = $conn->Execute($datapegou1);
                 while ( !$datapegou2->EOF) {
                         $data1b=$datapegou2->fields["0"];
                 $datapegou2->MoveNext();
                 }
	             
				 $datapegou12 = "SELECT to_char(MIN(DATA_PLANE),'yyyy-mm-dd') DATA FROM ORDEM_COMP WHERE STATUS <> 'B'";
                 $datapegou22 = $conn->Execute($datapegou12);
                 while ( !$datapegou22->EOF) {
                         $data2b=$datapegou22->fields["0"];
                 $datapegou22->MoveNext();
                 }
	        

 // Comparando as Datas
 if(strtotime($data1b) > strtotime($data2b))
 {
  $dataparabuscar1=$data2b;
 }
 else
 {
	$dataparabuscar1=$data1b; 
 }

$dataparabuscar2=$ano."-".$mes."-".$dia;
}



                        $datapesquisa1ano=substr($dataparabuscar1,0,4);
                        $datapesquisa1mes=substr($dataparabuscar1,5,2);
                        $datapesquisa1dia=substr($dataparabuscar1,8,2);
                        $datapesquisa1=$datapesquisa1dia."-".$datapesquisa1mes."-".$datapesquisa1ano;
						
                         

                        $datapesquisa2ano=substr($dataparabuscar2,0,4);
                        $datapesquisa2mes=substr($dataparabuscar2,5,2);
                        $datapesquisa2dia=substr($dataparabuscar2,8,2);
                        $datapesquisa2=$datapesquisa2dia."-".$datapesquisa2mes."-".$datapesquisa2ano;




	




if (!IsSet($solicitantepesquisainicial)){

}
ELSE
{

 $solicitantepesquisa=$solicitantepesquisainicial;
}


IF ($grupoordens=="C")
{


                       if (strlen($solicitantepesquisa) != 0)
                       {
						   


                       $chacontadorgeral="SELECT * from (select  a.NUMERO,
                       to_char(a.DATA_INICIO,'dd/mm/yyyy') DATA,a.CD_MAQUINA MAQUINA,
					   a.CD_COMPONENTE,
					   a.OBS ,
					   a.CD_FABRICA ,
					   c.nome NOME,
					   b.data_baixa_individual ,
					   0,
					   a.RECOMENDACAO,
                       1 TIPO,
                       a.HORA_INICIO,a.MINUTO_INICIO,
                       NVL(a.STATUS_ANDAMENTO,'SEMANDAMENTO') ANDAMENTO,b.hr_ini HORA1,b.hr_fim HORA2,
					   b.horas HORATOTAL,
					   b.OBS_FUNC RECOMENDACAO3,a.status STATUS,rownum Id
                       FROM EMER_COMP a,COMP_FUNC_EMER b,FUNCIONARIO_SADEGE c
                       where a.STATUS like '%$tipoordemstatus%'   and
                       a.cd_fabrica like'%$fabricapesquisa%' and
                       a.cd_maquina like '%$codigomaquina%'
                       and
                       a.NUMERO like '%$numeroordempesquisa%' and
                       a.CD_ATIVIDADE like '%$atividadepesquisa%' and
                       a.cd_solicitante='$solicitantepesquisa' and
					   a.NUMERO=b.NUMERO(+) AND
					   b.cadastro=c.cadastro(+)
					   and
					   a.DATA_INICIO >=to_date('$datapesquisa1','dd/mm/YYYY') AND
					   a.DATA_INICIO <=to_date('$datapesquisa2','dd/mm/YYYY')
                       )
                       ";
					   
					   $chacontadorgeralpagina="SELECT count(*) CONTADOR  FROM EMER_COMP a,COMP_FUNC_EMER b,FUNCIONARIO_SADEGE c
                       where a.STATUS like '%$tipoordemstatus%'   and
                       a.cd_fabrica like'%$fabricapesquisa%' and
                       a.cd_maquina like '%$codigomaquina%'
                       and
                       a.NUMERO like '%$numeroordempesquisa%' and
                       a.CD_ATIVIDADE like '%$atividadepesquisa%' and
                       a.cd_solicitante='$solicitantepesquisa' and
					   a.NUMERO=b.NUMERO(+) AND
					   b.cadastro=c.cadastro(+)
					   and
					   a.DATA_INICIO >=to_date('$datapesquisa1','dd/mm/YYYY') AND
					   a.DATA_INICIO <=to_date('$datapesquisa2','dd/mm/YYYY')
					    ";

					   }
                       else
                       {

                       $chacontadorgeral="SELECT * from (select  a.NUMERO,to_char(a.DATA_INICIO,'dd/mm/yyyy') DATA,
					   a.CD_MAQUINA MAQUINA,a.CD_COMPONENTE,
					   a.OBS ,
					   a.CD_FABRICA,
					   c.nome NOME,
					   b.data_baixa_individual ,
					   0,
					   a.RECOMENDACAO,
                       1 TIPO,
                       a.HORA_INICIO,a.MINUTO_INICIO,
                       NVL(a.STATUS_ANDAMENTO,'SEMANDAMENTO') ANDAMENTO,
					   b.hr_ini HORA1,b.hr_fim HORA2,b.hora HORATOTAL,
					   b.OBS_FUNC RECOMENDACAO3,a.status STATUS,rownum Id
                       FROM EMER_COMP a,COMP_FUNC_EMER b,FUNCIONARIO_SADEGE c
                       where a.STATUS like '%$tipoordemstatus%'   and
                       a.cd_fabrica like'%$fabricapesquisa%'
                       and
                       a.cd_maquina like '%$codigomaquina%'
                       and
                       a.NUMERO like '%$numeroordempesquisa%' and
                       a.CD_ATIVIDADE like '%$atividadepesquisa%' and
					   a.NUMERO=b.NUMERO(+) AND
					   b.cadastro=c.cadastro(+)
					   and
					   a.DATA_INICIO >=to_date('$datapesquisa1','dd/mm/YYYY') AND
					   a.DATA_INICIO <=to_date('$datapesquisa2','dd/mm/YYYY')
                       )
                       ";
					   
					   $chacontadorgeralpagina="SELECT count(*) CONTADOR  FROM EMER_COMP a,COMP_FUNC_EMER b,FUNCIONARIO_SADEGE c
                       where a.STATUS like '%$tipoordemstatus%'   and
                       a.cd_fabrica like'%$fabricapesquisa%'
                       and
                       a.cd_maquina like '%$codigomaquina%'
                       and
                       a.NUMERO like '%$numeroordempesquisa%' and
                       a.CD_ATIVIDADE like '%$atividadepesquisa%' and
					   a.NUMERO=b.NUMERO(+) AND
					   b.cadastro=c.cadastro(+)
					   and
					   a.DATA_INICIO >=to_date('$datapesquisa1','dd/mm/YYYY') AND
					   a.DATA_INICIO <=to_date('$datapesquisa2','dd/mm/YYYY')
					    ";
					   
					   }

	                   $crialabelinicial="select  a.NUMERO,
				       a.DATA_INICIO DATAABERTURA,
                       a.CD_MAQUINA,
					   a.CD_COMPONENTE,
					   a.OBS OBS,
					   a.CD_FABRICA,
					   c.nome NOMESOLICITANTE,
					   b.data_baixa_individual DATAB,
					   1 TOTAL,
					   a.RECOMENDACAO,
                       a.HORA_INICIO,a.MINUTO_INICIO,
                       a.CD_ATIVIDADE ,
                       1 TIPO ,
                       a.SOLICITANTE,
                       b.hr_ini HORA1,b.hr_fim HORA2,
					   b.hora HORATOTAL,b.OBS_FUNC RECOMENDACAO3
                       FROM 
					   EMER_COMP a,COMP_FUNC_EMER b,FUNCIONARIO_SADEGE c
                       where 
					   a.NUMERO=b.NUMERO(+) AND
					   b.cadastro=c.cadastro(+) and rownum=1 
                        ";				   
					   
}//finalcorretiva

IF ($grupoordens=="T")
{
	

                       $chacontadorgeral="SELECT * from (select  a.NUMERO,
					   a.DATA_INICIO DATA,
                       a.CD_MAQUINA  MAQUINA,
					   a.CD_COMPONENTE,
					   a.OBS ,
                       a.CD_FABRICA,
					   c.nome NOME ,
					   b.data_baixa_individual ,
					   a.HORA_INICIO,a.MINUTO_INICIO,
                       1 TIPO ,
                       a.SOLICITANTE,
                       a.STATUS_ANDAMENTO_TIPO ANDAMENTO,a.RECOMENDACAO,b.hr_ini HORA1,b.hr_fim HORA2,
					   b.hora HORATOTAL,b.OBS_FUNC RECOMENDACAO3,a.status STATUS,rownum Id
                       FROM 
					   EMER_COMP a,COMP_FUNC_EMER b,FUNCIONARIO_SADEGE c
                       where a.STATUS like '%$tipoordemstatus%'   and
                       a.cd_fabrica like'%$fabricapesquisa%'
                       and a.cd_maquina like '%$codigomaquina%' and
                       a.NUMERO like '%$numeroordempesquisa%' and
                       a.CD_ATIVIDADE like '%$atividadepesquisa%' AND
					   a.NUMERO=b.NUMERO(+) AND
					   b.cadastro=c.cadastro(+) 
                       and  a.DATA_INICIO >=to_date('$datapesquisa1','dd/mm/YYYY') AND
					   a.DATA_INICIO <=to_date('$datapesquisa2','dd/mm/YYYY')					   
					   union
                       select  a.NUMERO_ORDEM NUMERO,
					   a.DATA_PLANE,
                       a.CD_MAQUINA MAQUINA,
					   a.CD_COMPONENTE,
					   a.OBS,
                       a.CD_FABRICA ,
					   c.nome NOME ,
					   b.data_baixa_individual,
					   null,null,
                       2 TIPO,
                       a.SOLICITANTE,
                       a.STATUS_ANDAMENTO_TIPO ANDAMENTO,a.RECOMENDACAO,b.hr_ini HORA1,b.hr_fim HORA2,
					   b.horas HORATOTAL,b.OBS_FUNC RECOMENDACAO3,a.status STATUS,rownum Id
                       FROM ORDEM_COMP a,COMP_FUNC b,FUNCIONARIO_SADEGE c
                       where a.STATUS like '%$tipoordemstatus%'   and
                       a.cd_fabrica like'%$fabricapesquisa%'
                       and
                       a.cd_tipo like '%$tipo%' and
                       a.cd_maquina like '%$codigomaquina%' and
                       a.NUMERO_ORDEM like '%$numeroordempesquisa%' and
                       a.CD_ATIVIDADE like '%$atividadepesquisa%' AND
					   a.NUMERO_ORDEM=b.NUMERO_ORDEM(+) AND
					   b.cadastro=c.cadastro(+)
					   and
					   a.DATA_PLANE >=to_date('$datapesquisa1','dd/mm/YYYY') AND
					   a.DATA_PLANE <=to_date('$datapesquisa2','dd/mm/YYYY')
                       )
                       ";
					   
					   
					   $crialabelinicial="select  a.NUMERO,
				       a.DATA_INICIO DATAABERTURA,
                       a.CD_MAQUINA,
					   a.CD_COMPONENTE,
					   a.OBS OBS,
					   a.CD_FABRICA,
					   c.nome NOMESOLICITANTE,
					   b.data_baixa_individual DATAB,
					   1 TOTAL,
					   a.RECOMENDACAO,
                       a.HORA_INICIO,a.MINUTO_INICIO,
                       a.CD_ATIVIDADE ,
                       1 TIPO ,
                       a.SOLICITANTE,
                       b.hr_ini HORA1,b.hr_fim HORA2,
					   b.hora HORATOTAL,b.OBS_FUNC RECOMENDACAO3
                       FROM 
					   EMER_COMP a,COMP_FUNC_EMER b,FUNCIONARIO_SADEGE c
                       where 
					   a.NUMERO=b.NUMERO(+) AND
					   b.cadastro=c.cadastro(+) and rownum=1 
                        ";	

                        $chacontadorgeralpagina="SELECT count(*) CONTADOR  FROM EMER_COMP a,COMP_FUNC_EMER b,FUNCIONARIO_SADEGE c
                       where a.STATUS like '%$tipoordemstatus%'   and
                       a.cd_fabrica like'%$fabricapesquisa%'
                       and a.cd_maquina like '%$codigomaquina%' and
                       a.NUMERO like '%$numeroordempesquisa%' and
                       a.CD_ATIVIDADE like '%$atividadepesquisa%' AND
					   a.NUMERO=b.NUMERO(+) AND
					   b.cadastro=c.cadastro(+) 
                       and  a.DATA_INICIO >=to_date('$datapesquisa1','dd/mm/YYYY') AND
					   a.DATA_INICIO <=to_date('$datapesquisa2','dd/mm/YYYY')
					   UNION
					   SELECT count(*) CONTADOR  FROM 
					   ORDEM_COMP a,COMP_FUNC b,FUNCIONARIO_SADEGE c
                       where a.STATUS like '%$tipoordemstatus%'   and
                       a.cd_fabrica like'%$fabricapesquisa%'
                       and
                       a.cd_tipo like '%$tipo%' and
                       a.cd_maquina like '%$codigomaquina%' and
                       a.NUMERO_ORDEM like '%$numeroordempesquisa%' and
                       a.CD_ATIVIDADE like '%$atividadepesquisa%' AND
					   a.NUMERO_ORDEM=b.NUMERO_ORDEM(+) AND
					   b.cadastro=c.cadastro(+)
					   and
					   a.DATA_PLANE >=to_date('$datapesquisa1','dd/mm/YYYY') AND
					   a.DATA_PLANE <=to_date('$datapesquisa2','dd/mm/YYYY')
					   
					    ";						
                     					
					   
}

IF ($grupoordens=="P"){



                       $chacontadorgeral="SELECT * from (select  a.NUMERO_ORDEM NUMERO,nvl(a.CD_MAQUINA,'1') MAQUINA,
                       to_char(a.DATA_PLANE,'dd/mm/yyyy') DATA,a.CD_FABRICA ,
                       a.CD_ATIVIDADE,a.CD_COMPONENTE,2 TIPO,
                       nvl(a.STATUS_ANDAMENTO_TIPO,'SEMANDAMENTO') ANDAMENTO,a.OBS,c.nome NOME,
                       a.SOLICITANTE,a.RECOMENDACAO,b.data_baixa_individual DATA1,b.hr_ini HORA1,b.hr_fim HORA2,b.horas HORATOTAL,
					   b.OBS_FUNC RECOMENDACAO3,a.status STATUS,rownum Id
                       FROM ORDEM_COMP a,COMP_FUNC b,FUNCIONARIO_SADEGE c
                       where a.STATUS like '%$tipoordemstatus%'   and
                       a.cd_fabrica like'%$fabricapesquisa%'
                       and
                       a.cd_maquina like '%$codigomaquina%'
                       and
                       a.cd_tipo like '%$tipo%'  and
                       a.NUMERO_ORDEM like '%$numeroordempesquisa%' and
                       a.CD_ATIVIDADE like '%$atividadepesquisa%' and
					   a.NUMERO_ORDEM=b.NUMERO_ORDEM(+) AND
					   b.cadastro=c.cadastro(+)
					   and
					   a.DATA_PLANE >=to_date('$datapesquisa1','dd/mm/YYYY') AND
					   a.DATA_PLANE <=to_date('$datapesquisa2','dd/mm/YYYY')
                         order by a.DATA_PLANE ASC
                       )
                       ";
					   
					   
					   $chacontadorgeralpagina="SELECT count(*) CONTADOR  FROM ORDEM_COMP a,COMP_FUNC b,FUNCIONARIO_SADEGE c
                       where a.STATUS like '%$tipoordemstatus%'   and
                       a.cd_fabrica like'%$fabricapesquisa%'
                       and
                       a.cd_maquina like '%$codigomaquina%'
                       and
                       a.cd_tipo like '%$tipo%'  and
                       a.NUMERO_ORDEM like '%$numeroordempesquisa%' and
                       a.CD_ATIVIDADE like '%$atividadepesquisa%' and
					   a.NUMERO_ORDEM=b.NUMERO_ORDEM(+) AND
					   b.cadastro=c.cadastro(+)
					   and
					   a.DATA_PLANE >=to_date('$datapesquisa1','dd/mm/YYYY') AND
					   a.DATA_PLANE <=to_date('$datapesquisa2','dd/mm/YYYY')
					    ";
                       

}



					   
				       
                       
	
					   
					   


$nometabelaparapassar="pessoa_bi";
$nomecolunaparapassar="a.codigo";
$nomecolunaparapassaracao="codigo";

$numerocolunastela="14";//usada para insert
$numerocolunasprimeiratela="10";
$campolista1="999";//posicao 0,1,2,3,...
$campolista2="999";
$campolista3="999";

//$seelctcampolista1="SELECT CD_CIDADE,DS_CIDADE from cidade";
//$seelctcampolista2="SELECT CODIGO,DESCRICAO from pessoa_bi where id_tipo_pessoa=2";
//$seelctcampolista3="SELECT CD_PASTA,DS_PASTA from pasta_menu_bi ";





$titulojanelaelimina="Eliminando  ordens";
$titulojanelapesquisa="Pesquisando ordens para Exclusão";
//$titulojanelaassociacao1="Associando Grupo de Usuários a Funções do Sistema";

//$nometabelaassociativa1="funcao_grupo_bi";




//------------------------------------------------------



$tabela=$chacontadorgeral;
$ano=date('Y');



//DEFINA PAGINACAO

    $registros = "8";
    require("paginacao_mi.php");
//FINAL PAGINACAO






?>
<form action="consultaordensv6.php" method="POST">
<?require("areasuperior2.php");?>
</br>





<?


if (!IsSet($escolha) or ($escolha=="1"))
{
?>
<div id="mostraconteudo33" >
<?
require("carregamenumilenionovo2.php");
?><titulogeral><? echo "$titulo";?></titulogeral></br>

<a href="consultaordensv6.php?pagina=1&escolha=pesquisa&programa=<?echo $programa;?>&passapesquisainicial=<?echo $passapesquisainicial;?>&numerocolunastela=<?echo $numerocolunastela;?>&campolista1=<?echo $campolista1;?>&campolista2=<?echo $campolista2;?>&seelctcampolista1=<?echo $seelctcampolista1;?>&seelctcampolista2=<?echo $seelctcampolista2;?>&nometabelaparapassar=<?echo $nometabelaparapassar;?>&titulojanelapesquisa=<?echo $titulojanelapesquisa;?>&campolista3=<?echo $campolista3;?>&seelctcampolista3=<?echo $seelctcampolista3;?>&campolista4=<?echo $campolista4;?>&seelctcampolista4=<?echo $seelctcampolista4;?>">
<img  src="consulta.png"  align="center" width='70' height='75' ></a>

<a href="http://186.202.46.98:8080/osi/"><IMG src="iconesolicitacao.png" align="center" width="70" height="75" ></a>


<table  border=0
 style='background:white;' width="100%" class="tabela1">

<tr>
    <?
    IF ($grupoordens=="P"){
    ?>
	<th width="5%" >Unidade</th>
	<th width="5%">Nr.Ordem</th>
	<th  width="10%">Programado</th>
    <th>Equipamento</th>
   	<th>Componente</th>
    <th width="15%">Atividade</th>
    
    
	<th width="5%">Manutentor</th>
	<th>Data</th>
	<th>Total</th>
	<th>Descrição do Serviço</th>

    <?
    }
    else
    {
    ?>
	<th width="5%" >Unidade</th>
	<th width="5%">Nr.Ordem</th>
	<th width="10%">Abertura</th>
    <th>Equipamento</th>
   	<th>Componente</th>
    
    <th width="15%">Solicitação</th>
    
	<th width="5%">Manutentor</th>
	<th>Data</th>
	<th>Total</th>
	<th>Descrição do Serviço</th>
	
	
    <?}?>


    
		<th width="5%">Histórico</th>
		<th width="5%">Execução</th>
        </tr>
<?


if ($pagina_atual >"1"){$registros=$registros*$pagina_atual;}

$sql=$tabela;
$sql=$tabela." WHERE Id BETWEEN ".$inicio." and ".$registros;


 
     $datapegou2 = $conn->Execute($sql);
     while ( !$datapegou2->EOF) {
      $ordem=$datapegou2->fields["NUMERO"];
	  $tipoordem=$datapegou2->fields("TIPO") ;
      $componente=$datapegou2->fields("CD_COMPONENTE") ;
      $atividaderecuperada=$datapegou2->fields("CD_ATIVIDADE") ;
      $andamento=$datapegou2->fields("ANDAMENTO") ;
	  $statuspega=$datapegou2->fields("STATUS") ;

      //ECHO "ORDEM:$ordem</BR>";

      $solimostra=$datapegou2->fields("SOLICITANTE") ;
      $observacaomostra=$datapegou2->fields("OBS") ;
	  if ($andamento =="EMANDAMENTO"){
                    $andamentog="Andamento";
             }
             if ($andamento =="PARADO"){
                 $andamentog="Parada";
             }
             if ($andamento =="SEMANDAMENTO"){
                    $andamentog="Aguardando";
             }
             
             if ($andamento =="PENDENTE"){
                    $andamentog="Pendente";
             }
             if ($andamento =="FINALIZADO"){
                    $andamentog="Finalizada";
             }

      
      IF (($grupoordens=="C") or ($grupoordens=="T")){
      $horainicio77=$datapegou2->fields("HORA_INICIO") ;
      $minutoinicio77=$datapegou2->fields("MINUTO_INICIO") ;
      }
	  ELSE
	  {
		$horainicio77="00";
		$minutoinicio77="00";
		
	  }
      
      
      $contadorordem=$contadorordem+1;



      ?>
	     
      <tr>
	  <td><? echo $datapegou2->fields("CD_FABRICA");?></td>
     
      <?
      IF ($grupoordens=="P")
      {
      
	  IF ($statuspega=="G"){
	  //antiga era baixamanutencao_versao4.php
	  
	  ?>
      <td><a href="baixamanutencao_versao5.php?escolha=maodeobra&numeroordempesquisa=<? echo $ordem;?>&navegando=sim&banco=<?echo $banco;?>&ambiente=<?ECHO $ambiente;?>&baseoracle=<?ECHO $baseoracle;?>&localbanco=<?ECHO $localbanco;?>&atividadegrava=<?ECHO $atividaderecuperada;?>&fabricapesquisa=<?ECHO $fabricapesquisa;?>" style="text-decoration:none"><? echo $datapegou2->fields("NUMERO");?></a></td>
      <?}
	  else
	  {
		  
	  ?>
      <td><? echo $ordem;?></td>
      <?  
	  }
	  ?>
	  
	  <td><? echo $datapegou2->fields("DATA");?></td>
      
      
       <td><? echo $datapegou2->fields("MAQUINA");?></td>
       <td><? echo $datapegou2->fields("CD_COMPONENTE");?></td>
	   <td><? echo $datapegou2->fields("CD_ATIVIDADE");?></td>
	  

      <?
      }
      else
      {
      
	  
	  
      $mostra55=$solimostra." ".$observacaomostra;
      IF ($statuspega=="G"){
		  //antiga era baixamanutencao_versao4.php
	  ?>
	  <td><a href="baixamanutencao_versao5.php?escolha=maodeobra&numeroordempesquisa=<? echo $ordem;?>&navegando=sim&banco=<?echo $banco;?>&ambiente=<?ECHO $ambiente;?>&baseoracle=<?ECHO $baseoracle;?>&localbanco=<?ECHO $localbanco;?>&atividadegrava=<?ECHO $atividaderecuperada;?>&fabricapesquisa=<?ECHO $fabricapesquisa;?>" style="text-decoration:none"><? echo $ordem;?></a></td>
      </td>
	  <?}
	  else
	  {
	  ?>
      <td><? echo $ordem;?></td>
      <?  
	  }
	  ?>
	  
	  
	  <td><? echo $datapegou2->fields("DATA");?> <? echo $horainicio77;?>:<? echo $minutoinicio77;?></td>
	  
	   <td><? echo $datapegou2->fields("MAQUINA");?></td>
       <td><? echo $datapegou2->fields("CD_COMPONENTE");?></td>
      <td><?echo $mostra55;?></td>
      
      
      <?


      }
      ?>
	   
	   <td><? echo $datapegou2->fields("NOME");?></td>
	   <td><? echo $datapegou2->fields("DATA1");?><? echo " ";?><? echo $datapegou2->fields("HORA1");?><? echo " -";?><? echo $datapegou2->fields("HORA2");?></td>
	   <td><? 
	   
	    $horatotal=$datapegou2->fields("HORATOTAL") ;
		$horatotal= str_replace(",", ".","$horatotal" );
	    $horacheia=floor($horatotal);
        $somahora=$somahora+$horatotal;
        $minutocheio=($horatotal-$horacheia)*60;
		$minutocheio=number_format($minutocheio, 0, ',', '.');
		$mostranovotempo=$horacheia.":".$minutocheio;
        echo $mostranovotempo;
	    ?></td>
	    <td><? echo $datapegou2->fields("RECOMENDACAO3");?></td>
               
           <td width="5%"><center><a href="ordempdf.php?escolha=1&navegando=sim&banco=<?echo $banco;?>&localbanco=<?echo $localbanco;?>&usuario=<?echo $usuario;?>&ordem=<?echo $ordem;?>">
           <IMG src="imprimirnovo.png" width="30" height="30" ></a></td>
		   
		   <td width="5%"><center><a href="ordempdf.php?escolha=1&navegando=sim&banco=<?echo $banco;?>&localbanco=<?echo $localbanco;?>&usuario=<?echo $usuario;?>&ordem=<?echo $ordem;?>">
           <IMG src="imprimirnovo.png" width="30" height="30" ></a></td>

        </tr>
        <?
        $datapegou2->MoveNext();
       }
?>
 
 </table>
 <?
 
 }//final da primeira tela
 
 if ($escolha=="pesquisa"){
 ?>
 
 <div  style="display: block;" id="telapesquisa">       
        <table  width="100%"  border="0" background-image="sairmensagem.png" >
        <tr>
        <td  align=right>
        <a href="consultaordensv6.php?navegando=sim&escolha=1">
        <IMG src="sairmensagem.png" width="38" height="38" ></a>
        </td>
        </tr>
        </table>
		</br></br></br>
		
		<table>
		<tr>
		<td>
		Unidade
		</td>
		<td>
		<select name="fabricapesquisa" >
                 <option value="<?echo $fabricapesquisa;?>"><? echo $descricaofabrica4;?></option> 
                 <option value="">Todas</option>
                 <?
				 $stmt1 = "SELECT CD_FABRICA,DS_FABRICA FROM FABRICAS ";
                     $result3 = $conn->Execute($stmt1);
                     while ( !$result3->EOF) {
                          print "<option value=\"{$result3->fields["0"]}\">{$result3->fields["0"]}-{$result3->fields["1"]}</option>";


                     $result3->MoveNext();
                     }
				 
				 ?>
				 </select>
		</td>
		</tr>
		
        <tr>
		<td>
		Solicitante:
		</td>
        <td>		
				 <select name="solicitantepesquisainicial">
				 <option value="<?echo $solicitantepesquisainicial;?>"><? echo $solicitantepesquisainicial;?></option> 

                 <option value="">Todos</option>
                 <?
				 $stmt1 = "SELECT CADASTRO,NOME FROM FUNCIONARIO_SADEGE WHERE CADASTRO IN (SELECT
                 DISTINCT CD_SOLICITANTE FROM EMER_COMP) ";
                     $result3 = $conn->Execute($stmt1);
                     while ( !$result3->EOF) {
                          print "<option value=\"{$result3->fields["0"]}\">{$result3->fields["0"]}-{$result3->fields["1"]}</option>";


                     $result3->MoveNext();
                     }
					 
				 ?>
				 </select>
			</td>
			</tr>
			
			<tr>
		    <td>
		    Nr Ordem:
		   </td>
            <td>
			<input type="TXT" name="numeroordempesquisa"  value= "<?echo $numeroordempesquisa;?>" size="10">
            </td>
			</tr>
			
			<tr>
		    <td>
		    Equipamento:
		    </td>
            <td>
			<input type="TXT" name="codigomaquina"  value= "<?echo $codigomaquina;?>" SIZE="5">
            </td>
			</tr>
			
			<tr>
		    <td>
		    Grupo:
		    </td>
            <td>
	        <select style="background-color:#8B8378;color: white;"  name="grupoordens" >
            <option value="<?echo $grupoordens;?>"><? echo $mostraordem;?></option>
            <option value="C">Não Planejadas</option>
            <option value="P">Planejadas</option>
            <option value="T">Todas</option>
 	         </select>
	         </td>
			</tr>
			
			<tr>
		    <td>
		    Status:
		    </td>
            <td>
	        <select style="background-color:#8B8378;color: white;"  name="tipoordemstatus" >
            <option value="<?echo $tipoordemstatus;?>"><? echo $tipoordemstatus;?></option>
            <option value="B">Baixadas</option>
            <option value="G">Pendentes</option>
            <option value="">Todas</option>
 	       </select>
		   </td>
			</tr>
			
			<tr>
		    <td>
		    Tipo:
		    </td>
            <td>

            <select style="background-color:#8B8378;color: white;"  name="tipo" >
            <option value="<?echo $tipo;?>"><? echo $tipo;?></option>
             <?
				 $stmt1 = "SELECT CD_TIPO,TIPO_SERVICO FROM TIPO_SERVS";
                     $result3 = $conn->Execute($stmt1);
                     while ( !$result3->EOF) {
                          print "<option value=\"{$result3->fields["0"]}\">{$result3->fields["0"]}-{$result3->fields["1"]}</option>";


                     $result3->MoveNext();
                     }
					 
				 
				 
				 ?>
 	</select>
	</td>
			</tr>
			
			

 	<?
 	if ($grupoordens=="P"){
 	?>
 	      <tr>
		    <td>
		    Atividade:
		    </td>
            <td>
		    <select name="atividadepesquisa" style="background-color:#8B8378;color: white;"  >
                 <option value="<?echo $atividadepesquisa;?>"><? echo $atividadepesquisa;?></option>
                 <option value="">Todas</option>
                 <?
				 $stmt1 = "SELECT CD_ATIVIDADE,DS_ATIVIDADE FROM ATIVIDADES order by DS_ATIVIDADE asc";
                     $result3 = $conn->Execute($stmt1);
                     while ( !$result3->EOF) {
                          print "<option value=\"{$result3->fields["0"]}\">{$result3->fields["0"]}-{$result3->fields["1"]}</option>";


                     $result3->MoveNext();
                     }
				
				 ?>
				 </select>
				 </td>
				 </tr>

      <?
      }

                 

                         

                        ?>


            <tr>
		    <td>
		    Dta Inicial:
		    </td>
            <td>
			<input type=date name="dataparabuscar1" value="<?echo $dataparabuscar1;?>" > Até
            <input type=date name="dataparabuscar2" value="<?echo $dataparabuscar2;?>" >
            </td>
			<tr>
            </table>
        
		<input type="hidden" name="continuarmesmatela" value="sim">
		
		<input type="hidden" name="year" value="<?echo $year;?>">
		<input type="hidden" name="month" value="<?echo $month;?>">
		<input type="hidden" name="data1" value="<?echo $data1;?>">
		<input type="hidden" name="data2" value="<?echo $data2;?>">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		</br></br>
        <a href="#" onclick="document.forms[0].submit();return false;">
        <IMG src="okmensagem.png" width="62" height="45" align="center" ></a>


  
 
 
 
 </div>
 <?
 }

require ("rodapepagina.php");?>


 </div>

 <div id="footer">
 <?//require ("rodapemilenio.php");?>
 </div>
 </form>
