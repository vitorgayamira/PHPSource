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

        if ($user == "maker") {
            $bd = "oci8";
            $host = "server";
            $user = "maker";
            $pass = "maker";
            $db = "xe";
        }

        if ($user == "predial") {
            $bd = "oci8";
            $host = "server";
            $user = "predial";
            $pass = "predial";
            $db = "xe";
        }

        if ($user == "sadege") {//kyly
            $bd = "oci8";
            $host = "200.180.39.210";
            $user = "sadege";
            $pass = "sadege";
            $db = "xe";
        }

        if ($user == "hennings") {
            $bd = "oci8";
            $host = "server";
            $user = "hennings";
            $pass = "hennings";
            $db = "xe";
        }
        if ($user == "geronimo") {
            $bd = "oci8";
            $host = "server";
            $user = "geronimo";
            $pass = "geronimo";
            $db = "xe";
        }


        //EFETUA A CONEXÃO
        $conn = NewADOConnection($bd);
        $conn->connect($host, $user, $pass, $db);

        //$Sql = "SELECT * FROM exemplo WHERE id=".$Id;
        $result87 = $conn->Execute($sql);
        while (!$result87->EOF) {
            $this->content = $result87;
            $result87->MoveNext();
        }

        //retorno os dados
        return $this->content;


    }

    // De -> Para dos campos das tabelas para os rotulos nas telas
    function mostralabel($Campos, $i2)
    {
        $Campos[$i2] = strtoupper($Campos[$i2]); //converte maiuscula

        $arr_camp = ["DS_FABRICA", "ID_CONDOMINO", "NM_USUARIO", "CD_EMPRESA_ASSOCIADA", "DESCRICAO", "CODIGO" , "NM_LOGRADOURO" ,
                     "DS_COMPLEMENTO" , "CD_CIDADE" , "NM_BAIRRO" , "CD_TIPO_FORNECEDOR" , "NR_INSCRICAO" , "NR_CEP",
                     "DS_EMAIL", "ID_TIPO_PESSOA", "ID_MATRIZ" , "ID_FILIAL", "NR_CNPJ" , "ID_FORNECEDOR_SERVICO", "CD_USUARIO", "NM_USUARIO",
                     "NR_IDENTIDADE", "DT_NASCIMENTO", "NR_CPF", "cd_classificacao", "DS_TIPO", "CD_COMANDA", "ID_USO",
                     "ID_LIBERADO_FINANCEIRO", "NR_ENDERECO", "CD_FUNCAO", "DS_FUNCAO", "CD_PROGRAMA", "DS_TELEFONE_COMERCIAL",
                     "DS_TELEFONE_CELULAR", "PF_SEXO", "ID_DOMINIO", "TIPO_DOMINIO" , "VALOR", "ID_FORNECEDOR",
                     "CD_ITEM", "DS_ITEM", "CD_UNIDADE","VL_UNITARIO", "CD_IMAGEM", "DS_LOCAL" , "CD_LOCAL",
                     "CD_PESSOA", "CD_TIPO_LOCAL","CD_REGIAO","CD_ULTIMO_ATENDENTE",
                     "ID_LOCAL_VIRTUAL_RESERVA", "NOME", "NUMERO", "CADASTRO", "DATAB", "HR_INI", "HR_FIM",
                     "DATAABERTURA", "CD_MAQUINA", "CD_COMPONENTE", "NOMESOLICITANTE", "OBS", "CD_FABRICA", "RECOMENDACAO",
                     "TOTAL", "NR_SEQUENCIA", "DESCRICAOGRUPO", "DS_PASTA", "GRUPO_USUÁRIO", "DESCRICAOGRUPO", "EMPRESA",
                     "ID_INSERT", "ID_EXCLUSAO", "ID_ATUALIZACAO", "ID_CONSULTAR", "ID_ATUALIZAR", "FUNCAO", "CD_ESTADO"
        ];


        $arr_label = ["Unidade", "É Condomino", "Usuário", "Empresa", "Descricao", "Codigo", "Logradouro",
                      "Complemento", "Cidade", "Bairro", "Tipo de Fornecedor", "Nr.Inscrição Estadual" , "Nr.Cep" ,
                      "Email", "Tipo Pessoa", "Matriz", "Filial", "Cnpj", "Fornece Serviço", "Codigo Usuário", "Usuário",
                      "RG", "Data Nascimento", "CPF", "Identificador", "Descrição Tipo", "Nr.Comanda", "Em Uso",
                      "Liberado Finançeiro/Recepção", "Nr.", "Codigo", "Função", "Programa","Telefone Comercial",
                      "Telefone Celular", "Sexo", "ID", "Nome do Domínio", "Valor", "Fornecedor Material",
                      "Código", "Descrição", "Unid", "Valor(R$/Unid)", "Código Imagem", "Descrição", "Código",
                      "Estabelecimento", "Classificação Local", "Região no Estabelecimento", "Último Atendente",
                      "Local Padrão para Reserva de Mesa", "Mantenedor", "Nr da Ordem", "Nr Cadastro", "Data", "Hora Início", "Hora Final",
                      "Data Abertura", "Equipamentos", "Componente", "Manutentor", "Solicitação", "Unidade", "Descrição do Serviço",
                      "Total", "Nr_sequencia", "Grupo", "Pasta", "Grupo Usuário", "Descrição", "Empresa",
                      "Privilégio Inserção", "Exclusão", "Atualização", "Somente Consultar", "Atualização", "Função" , "Estado"

                    ];

        if (array_search($Campos[$i2], $arr_camp) < 0) {
            return $Campos[$i2];
        }

        return $arr_label[array_search($Campos[$i2], $arr_camp)];

    }


}

?>
