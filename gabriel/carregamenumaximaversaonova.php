<head>

<style type="text/css">
    .nav, .nav ul{list-style:none;float:left;}
     .nav li{font-size:14px;position:relative;margin-bottom:-1px;}
     .nav li:hover a{background-color:#CDCDC1;}
     .nav li:hover li a{background-color:#CDCDC1;}
     .nav li:hover li a:hover{background-color:white;}
     .nav li a{display:block;padding:10px 0 10px 15px;height:20px;width:285px;border-bottom:1px solid #cccccc;color:black;text-decoration:none;}
     .nav li a:hover{background:#CDCDC1;}
     .nav li ul{position:absolute;left:-99999px; z-index:3;}
     .nav li:hover ul{padding:0;top:0;left:285px;}
</style>



</head>



<?


require("estilo.css");

$usu189NOME= "SELECT b.descricao NOME FROM usuario_bi a,pessoa_bi  b
where a.nm_usuario='$edusuario' and
a.cd_pessoa=b.codigo   ";
$result5nome5 = $conn->Execute($usu189NOME);
while ( !$result5nome5->EOF) {
                      $nomepessoa4=$result5nome5->fields["NOME"];

                     $result5nome5->MoveNext();
                     }





?>







<ul class="nav">
      <?

       $sql = "SELECT DISTINCT a.DS_PASTA PASTA,a.CD_PASTA CODIGOPASTA,b.cd_grupo  CODIGOGRUPO
FROM pasta_menu_bi a,funcao_grupo_bi b, grupo_usuario_bi c,usuario_grupo_bi d,usuario_bi e
WHERE a.CD_PASTA=b.CD_PASTA AND b.CD_GRUPO=c.CODIGO AND c.codigo=d.CD_GRUPO AND
d.cd_usuario=e.cd_usuario and
e.nm_usuario='$edusuario' ";

$result5nome57 = $conn->Execute($sql);
while ( !$result5nome57->EOF) {


$pasta2=$result5nome57->fields["CODIGOPASTA"];
$grupo2=$result5nome57->fields["CODIGOGRUPO"];
$descricaopasta=$result5nome57->fields["PASTA"];
      ?>

      <li><a href='#'><? echo $descricaopasta;?></a>
      <ul>
             <?
             $sub = "SELECT DISTINCT a.DS_FUNCAO FUNCAO,a.CD_PROGRAMA PROGRAMA,b.CD_PASTA PASTA
            FROM funcao_bi a,funcao_grupo_bi b WHERE
            a.CD_FUNCAO=b.CD_FUNCAO
            AND b.CD_PASTA='$pasta2' AND
            b.CD_GRUPO='$grupo2'
            ";
            echo "$sub";
            $result5nome58 = $conn->Execute($sub);
            while ( !$result5nome58->EOF) {

              $subdescricao=$result5nome58->fields["FUNCAO"];

			  $programa1=$result5nome58->fields["PROGRAMA"];
             ?>
             <li><a href='<?echo "$programa1";?>?novologin=nao&navegando=sim' style="text-decoration:none;font-size: 12px;color: black;text-align:left;bold: Negrito"><b><? echo "$subdescricao";?></b></a></a></li>

            <?$result5nome58->MoveNext();
                     }?>
                 </ul>


                    <?$result5nome57->MoveNext();
                     }?>

 </ul>
