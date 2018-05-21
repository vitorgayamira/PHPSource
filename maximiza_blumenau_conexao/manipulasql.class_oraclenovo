<?php


require_once('conexao.class2_oraclenovo.php');




class ManipulaSql extends Conexao
{
	


    /**
     * Propriedade responsável por retornar os resultados das querys
     *
     */
    public $content;

	

    public function Seleciona($sql)
    {
		global $user;
        
		if ($user=="maker"){
		$bd   = "oci8";
        $host = "server";
        $user = "maker";
        $pass = "maker";
        $db   = "xe";
		}
		
		if ($user=="predial"){
		$bd   = "oci8";
        $host = "server";
        $user = "predial";
        $pass = "predial";
        $db   = "xe";
		}
		
		if ($user=="kyly"){
		$bd   = "oci8";
        $host = "server";
        $user = "kyly";
        $pass = "kyly";
        $db   = "xe";
		}
		
		if ($user=="sadege"){//kyly
		$bd   = "oci8";
        $host = "200.180.39.210";
        $user = "sadege";
        $pass = "sadege";
        $db   = "xe";
		}
		
		if ($user=="hennings"){
		$bd   = "oci8";
        $host = "server";
        $user = "hennings";
        $pass = "hennings";
        $db   = "xe";
		}
		if ($user=="geronimo"){
		$bd   = "oci8";
        $host = "server";
        $user = "geronimo";
        $pass = "geronimo";
        $db   = "xe";
		}
		

        //EFETUA A CONEXÃO
        $conn = NewADOConnection($bd);
        $conn->connect($host,$user,$pass,$db);
	  
		//$Sql = "SELECT * FROM exemplo WHERE id=".$Id;
		$result87= $conn->Execute($sql);
	    while ( !$result87->EOF) {
		$this->content= $result87;
		$result87->MoveNext();
        }
		
        //retorno os dados
        return $this->content;


    }


	
	function mostralabel($Campos,$i2)
	{
		$Campos[$i2]=strtoupper($Campos[$i2]);//converte maiuscula
		


              if ($Campos[$i2]=="ID_CONDOMINO"){$Campossaida="É Condomino";}
		      if ($Campos[$i2]=="CD_EMPRESA_ASSOCIADA"){$Campossaida="Empresa";}
			  if ($Campos[$i2]=="DESCRICAO"){$Campossaida="Nome";}
			  if ($Campos[$i2]=="CODIGO"){$Campossaida="Codigo";}
			  if ($Campos[$i2]=="NM_LOGRADOURO"){$Campossaida="Logradouro";}
			  if ($Campos[$i2]=="DS_COMPLEMENTO"){$Campossaida="Complemento";}
			  if ($Campos[$i2]=="CD_CIDADE"){$Campossaida="Cidade";}
              if ($Campos[$i2]=="NM_BAIRRO"){$Campossaida="Bairro";}
			  if ($Campos[$i2]=="CD_TIPO_FORNECEDOR"){$Campossaida="Tipo de Fornecedor";}
			  if ($Campos[$i2]=="NR_INSCRICAO"){$Campossaida="Nr.Inscrição Estadual";}
			  if ($Campos[$i2]=="NR_CEP"){$Campossaida="Nr.Cep";}
			  if ($Campos[$i2]=="DS_EMAIL"){$Campossaida="Email";}
			  if ($Campos[$i2]=="ID_TIPO_PESSOA"){$Campossaida="Tipo Pessoa";}
			  if ($Campos[$i2]=="ID_MATRIZ"){$Campossaida="Matriz";}
			  if ($Campos[$i2]=="ID_FILIAL"){$Campossaida="Filial";}
			  if ($Campos[$i2]=="NR_CNPJ"){$Campossaida="Cnpj";}
			  if ($Campos[$i2]=="ID_FORNECEDOR_SERVICO"){$Campossaida="Fornece Serviço";}
		      if ($Campos[$i2]=="CD_USUARIO"){$Campossaida="Codigo Usuário";}
		      if ($Campos[$i2]=="NM_USUARIO"){$Campossaida="Descrição";}
			  if ($Campos[$i2]=="NR_IDENTIDADE"){$Campossaida="RG";}
			  if ($Campos[$i2]=="DT_NASCIMENTO"){$Campossaida="Dta Nascimento";}
			  if ($Campos[$i2]=="NR_CPF"){$Campossaida="Nr.Cpf";}
			  if ($Campos[$i2]=="cd_classificacao"){$Campossaida="Identificador";}
			  if ($Campos[$i2]=="DS_TIPO"){$Campossaida="Descrição Tipo";}
			  if ($Campos[$i2]=="CD_COMANDA"){$Campossaida="Nr.Comanda";}
			  if ($Campos[$i2]=="ID_USO"){$Campossaida="Em Uso";}
			  if ($Campos[$i2]=="ID_LIBERADO_FINANCEIRO"){$Campossaida="Liberado Finançeiro/Recepção";}
			  if ($Campos[$i2]=="NR_ENDERECO"){$Campossaida="Nr.";}
			  if ($Campos[$i2]=="CD_FUNCAO"){$Campossaida="Codigo";}
			  if ($Campos[$i2]=="DS_FUNCAO"){$Campossaida="Função";}
			  if ($Campos[$i2]=="CD_PROGRAMA"){$Campossaida="Programa";}
			  if ($Campos[$i2]=="DS_TELEFONE_COMERCIAL"){$Campossaida="Telefone Comercial";}
			  if ($Campos[$i2]=="DS_TELEFONE_CELULAR"){$Campossaida="Telefone Celular";}
			  if ($Campos[$i2]=="PF_SEXO"){$Campossaida="Sexo";}
			  if ($Campos[$i2]=="ID_DOMINIO"){$Campossaida="ID";}
			  if ($Campos[$i2]=="TIPO_DOMINIO"){$Campossaida="Nome do Domínio";}
			  if ($Campos[$i2]=="VALOR"){$Campossaida="Valor";}
			  if ($Campos[$i2]=="ID_FORNECEDOR"){$Campossaida="Fornecedor Material";}
			  if ($Campos[$i2]=="CD_ITEM"){$Campossaida="Código";}
			  if ($Campos[$i2]=="DS_ITEM"){$Campossaida="Descrição";}
			  if ($Campos[$i2]=="CD_UNIDADE"){$Campossaida="unid.";}
			  if ($Campos[$i2]=="VL_UNITARIO"){$Campossaida="Valor(R$/Unid)";}
			  if ($Campos[$i2]=="CD_IMAGEM"){$Campossaida="Código Imagem";}
			  if ($Campos[$i2]=="DS_LOCAL"){$Campossaida="Descrição";}
			  if ($Campos[$i2]=="CD_LOCAL"){$Campossaida="Código";}
			  if ($Campos[$i2]=="CD_PESSOA"){$Campossaida="Estabelecimento";}
			  if ($Campos[$i2]=="CD_TIPO_LOCAL"){$Campossaida="Classificação Local";}
			  if ($Campos[$i2]=="CD_REGIAO"){$Campossaida="Região no Estabelecimento";}
			  if ($Campos[$i2]=="CD_ULTIMO_ATENDENTE"){$Campossaida="Último Atendente";}
			  if ($Campos[$i2]=="ID_LOCAL_VIRTUAL_RESERVA"){$Campossaida="Local Padrão para Reserva de Mesa";}
			  if ($Campos[$i2]=="NOME"){$Campossaida="Mantenedor";}
			  if ($Campos[$i2]=="NUMERO"){$Campossaida="Nr da Ordem";}
			  if ($Campos[$i2]=="CADASTRO"){$Campossaida="Nr Cadastro";}
			  if ($Campos[$i2]=="DATAB"){$Campossaida="Data";}
			  
			  if ($Campos[$i2]=="HR_INI"){$Campossaida="Hora Início";}
			  if ($Campos[$i2]=="HR_FIM"){$Campossaida="Hora Final";}
			  
			  if ($Campos[$i2]=="DATAABERTURA"){$Campossaida="Data Abertura";}
			  if ($Campos[$i2]=="CD_MAQUINA"){$Campossaida="Equipamentos";}
			  if ($Campos[$i2]=="CD_COMPONENTE"){$Campossaida="Componente";}
			  if ($Campos[$i2]=="NOMESOLICITANTE"){$Campossaida="Manutentor";}
			  if ($Campos[$i2]=="OBS"){$Campossaida="Solicitação";}
			  if ($Campos[$i2]=="CD_FABRICA"){$Campossaida="Unidade";}
			  if ($Campos[$i2]=="RECOMENDACAO"){$Campossaida="Descrição do Serviço";}
			  if ($Campos[$i2]=="TOTAL"){$Campossaida="Total";}
			  if ($Campos[$i2]=="TOTAL"){$Campossaida="Total";}
			  if ($Campos[$i2]=="NR_SEQUENCIA"){$Campossaida="Nr_sequencia";}
			  if ($Campos[$i2]=="DESCRICAOGRUPO"){$Campossaida="Grupo";}
			  if ($Campos[$i2]=="DS_PASTA"){$Campossaida="Pasta";}
			  if ($Campos[$i2]=="GRUPOUSUARIO"){$Campossaida="Grupo Usuário";}
			  if ($Campos[$i2]=="DESCRICAOGRUPO"){$Campossaida="Descrição";}
			  if ($Campos[$i2]=="EMPRESA"){$Campossaida="Empresa";}
			  
			 
				 
				return $Campossaida;  
				 
		

    }

    


    

    
    
    



}
?>
