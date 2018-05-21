<?


//include_once("../pdf/dompdf/dompdf_config.inc.php");
 function geraPDF($titulo, $html, $tipo = "P") {
   $dompdf = new DOMPDF();
                 if ($tipo == "L") {
                 $dompdf->set_paper("legal", "landscape");
                 // Altera o papel para modo paisagem.
                 }
                  $dompdf->load_html($html);
                  // Carrega o HTML para a classe.
                  $dompdf->render();
                  $pdf = $dompdf->output(); // Cria o pdf
                  $arquivo = "./arquivos/".$titulo; // Caminho onde será salvo o arquivo.
                       if (file_put_contents($arquivo,$pdf))
                       { //Tenta salvar o pdf gerado
                       return true; // Salvo com sucesso.
                       }
                       else
                       {
                         return false; // Erro ao salvar o arquivo
                       }


 }




