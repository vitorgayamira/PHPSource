<?
if (!IsSet($pagina_atual)){$pagina_atual="1";}
// quantidade m�xima de
// registros exibidos por p�gina

     $resultado2= mysql_db_query($banco,$chacontadorgeral,$conexao);
     $resultado3=mysql_fetch_array($resultado2);
     $registros_total=$resultado3["CONTADOR"];

$paginas= ceil($registros_total / $registros);

// Calcula os intervalos iniciais e finais
// para saber quais registros vamos mostrar
$fim = $registros * $pagina_atual;
$inicio = ($fim - $registros);

if ($pagina_atual<$paginas){

      if ($pagina_atual=="1"){
          $proximapagina=$pagina_atual+1;
          $anteriorpagina=$pagina_atual;
      }
      else
      {
          $proximapagina=$pagina_atual+1;
          $anteriorpagina=$pagina_atual-1;
      }
}

if ($pagina_atual==$paginas)
{

          if ($pagina_atual=="1"){

            $proximapagina=$paginas;
            $anteriorpagina=$paginas;
          }
          if ($pagina_atual>"1"){
          $proximapagina=$paginas;
          $anteriorpagina=$pagina_atual-1;
          }
}




