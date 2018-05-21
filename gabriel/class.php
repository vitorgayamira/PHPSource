<?
# Arquivo /class/class.php

$dt_format  = "d/M/Y";
$dt_atual   = date($dt_format);


// ??? 
/*
class Data {
	var $atual = "data";
	
	function toString() {
		return("$this->atual");
	}
}
*/

class Import {
	function useClass ($class_name) {
	    print("include/class/".$class_name.".php");
		//require_once("class/".$this->class_name.".php");
	}
	function help() {
		$class_methods = get_class_methods(get_class($this));
		echo "<table border=1><tr><td><b>METHODS:</b></td>";
		foreach ($class_methods as $method_name) {
    		echo "<td>".$method_name."</td>"; 
		}
		echo "</tr></table>";
		echo "<p><font color=red>Exemplo:</font><p>";
		echo "Import::useClass(\"Database\");<br>";
		echo "Import::listClass();";
	}	
	function listClass() {
		$class_methods = get_class_methods(get_class($this));
		echo "<table border=1><tr><td><b>CLASSES:</b></td>";
		echo "<td>Import</td><td>...</td><td>...</td>";
		echo "</tr></table>";
	}	
}
function help() {
	?>
<pre>
Para utilizar <b>Classes</b> use:
   $i = new Import;
   $i->help();
   <font color=red>ou</font>
   Import::help(); <font color=green><b>OBS:</b>Exclusivamente a função <i>help</i> da classe <i>Import</i> não poderá ser utilizada da segunda forma.</font>
</pre>
	<?
}

   class Paginar {
		var $pc;
		var $tp; 
		var $sql; 
		function Execute($select,$from,$where,$order,$_total_reg) {
			$db = &ADONewConnection('oci8');
			$db->PConnect('192.168.1.2','bi','bi','oracle');
			$nr = 0; 

	        $pagina = $_GET['pagina'];
			
			if (!$pagina) {
				$pc = "1";
			} else {
				$pc = $pagina;
			}
			$this->pc = $pc;

			$total_reg = $_total_reg; // número de registros por página
			$inicio = $pc - 1;
			$inicio = $inicio * $total_reg;
	
			$query = "
			SELECT $select FROM ( 
			 SELECT * FROM ( 
					  SELECT ROWNUM NLIN, $select FROM (SELECT * FROM $from WHERE $where ORDER BY $order)) 
			WHERE NLIN >= ".($inicio+1)." AND NLIN <= ".($inicio+$total_reg)." )";

			$this->sql = $query;

			$rs = $db->Execute("$query") or die("<hr color=red><b>Erro no sql:</b> $query.".$db->ErrorMsg()."<hr color=red>");

			// verifica o número total de registros
			$query = "SELECT count(*) from $from where $where";
			$rsCount = $db->Execute($query);
			$tr = $rsCount->fields[0];
			$tp = $tr / $total_reg; // verifica o número total de páginas
			$this->tp = $tp;

			return $rs;
		}
		function Brownse () {
			// agora vamos criar os botões "Anterior e próximo"
			$pc = $this->pc;
			$tp = $this->tp;
			$anterior = $pc -1;
			$proximo = $pc +1;
			
			echo "<tr style='padding-left:2.5;adding-right:2.5'><td align=left>";
			if ($pc>1) {
				echo " <a href='?pagina=1'><img src='img/bt_nav_first_on.gif' border=0></a> ";
			}
			else {
				echo "<img src='img/bt_nav_first_off.gif' border=0>";
			}

			if ($pc>1) {
				echo " <a href='?pagina=$anterior'><img src='img/bt_nav_back_on.gif' border=0></a> ";
			}
			else {
				echo "<img src='img/bt_nav_back_off.gif' border=0>";
			}
			if ($pc<ceil($tp)) {
				echo " <a href='?pagina=$proximo'><img src='img/bt_nav_next_on.gif' border=0></a>";
			}
			else {
				echo "<img src='img/bt_nav_next_off.gif' border=0>";
			}
			if ($pc<ceil($tp)) {
				echo " <a href='?pagina=".ceil($tp)."'><img src='img/bt_nav_last_on.gif' border=0></a> ";
			}
			else {
				echo "<img src='img/bt_nav_last_off.gif' border=0>";
			}

			echo "</td><td align=right>Página $pc de ".ceil($tp)."</td></tr></table>";
		}
		function help() {
			
			$class_methods = get_class_methods(get_class($this));
			echo "<div style='color=black;border=1px black double;width=1%;padding=10;' nowrap><b>CLASSE: Paginar</b><p>";
			echo "<b>METHODS:</b>";
			$nr = 0;
			foreach ($class_methods as $method_name) {
				if ($nr != 0) {
					echo " , ";
				}
				$nr++;
				echo " $method_name"; 
			}
			echo "";
			echo "<p><font color=red>Exemplo:</font><p>";
			?>
				
				$p = new Paginar;<br>
				$rs = $p->init($select,$from,$where,$order,3); <font color=green>==> o 3 significa o número de registros por página</font><br>
				$p->navegar(); <font color=green>==> coloca as barras de navegação</font><br> 
				echo $p->sql; <font color=green>==> pega o sql gerado</font><br>
				</font></div>
			<?
			
		}	
		
}
?>