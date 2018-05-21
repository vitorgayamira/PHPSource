/* Tuvimos a un Dios, tenemos a un Mesias y 45 millones de gargantas alentando juntos!
 *
 * Exibir a tela de solicitação de serviço
 */
function telaSolicitacao() {

	// Window da tela de solicitação
	var vr_win_solicitacao = Ti.UI.createWindow({
		backgroundColor : '#fff'
	});

	// View Principal da Window
	var vr_view_principal = Ti.UI.createView({
		width : "90%",
		height : "90%",
	});

	// Adicionamos a View principal na Window
	vr_win_solicitacao.add(vr_view_principal);

	// Mostrar linha divisoria na parte superior da tela
	mostraLinhaSuperior(vr_win_solicitacao);

	// Mostrar titulo principal da tela
	mostraTitulo(vr_view_principal);

	// Mostrar os dados da tela
	mostraSolicitacao(vr_view_principal, vr_win_solicitacao);

	// Mostrar linha divisoria na parte inferior da tela
	mostraLinhaInferior(vr_win_solicitacao);

	// Rodapé com informações do Software e empresa
	mostraRodape(vr_win_solicitacao);

	// Abrir a tela
	vr_win_solicitacao.open();

}

function mostraSolicitacao(pr_view_principal, pr_win_solicitacao) {

	// Criamos a view dos dados
	var vr_view_solicitacao = Ti.UI.createView({
		height : "81%",
		width : "100%",
		top : "12%",
		borderWidth : 1,
		borderColor : "#000"
	});

	// Adicionar na view principal
	pr_view_principal.add(vr_view_solicitacao);

	// Mostrar os labels
	mostraLabelsSolicitacao(vr_view_solicitacao);

	// Mostrar os campos
	mostraCamposSolicitacao(vr_view_solicitacao);

	// Mostrar os botões da tela
	mostraBotoesSolicitacao(vr_view_solicitacao, pr_win_solicitacao);

}

function mostraLabelsSolicitacao(pr_view_solicitacao) {

	// View para conter os labels
	var vr_view_labels = Ti.UI.createView({
		height : "75%",
		width : "38%",
		left : "0%",
		top : "0%",
		borderWidth : 1,
		borderColor : "#000"
	});

	// Adicionar a view
	pr_view_solicitacao.add(vr_view_labels);

	// Label de Fabrica
	mostraLabelFabrica(vr_view_labels);

	// Label de Equipamento
	mostraLabelEquipamento(vr_view_labels);

	// Label de Solicitacao
	mostraLabelSolicitacao(vr_view_labels);

	// Label de Solicitante
	mostraLabelSolicitante(vr_view_labels);

	// Label da Data e Hora
	mostraLabelDataHora(vr_view_labels);

	// Label da Maquina
	mostraLabelMaquina(vr_view_labels);

	// Label de campos obrigatorios
	mostraLabelObrigatorios(pr_view_solicitacao);

}

function mostraLabelFabrica(pr_view_labels) {

	// Label de Fabrica
	var vr_lbl_fabrica = Ti.UI.createLabel({
		height : "14.6%",
		width : "100%",
		top : "0%",
		text : " Fábrica * ",
		font : {
			fontSize : 15,
			fontFamily : App.fontFamily
		},
		textAlign : "right",
		color : "#000",
		backgroundColor : "#996633",
		borderWidth : 1,
		borderColor : "#fff"
	});

	// Adicionar o label
	pr_view_labels.add(vr_lbl_fabrica);

}

function mostraLabelEquipamento(pr_view_labels) {

	// Label de Equipamento
	var vr_lbl_equipamento = Ti.UI.createLabel({
		height : "14.6%",
		width : "100%",
		top : "14.6%",
		text : " Equipamento * ",
		font : {
			fontSize : 15,
			fontFamily : App.fontFamily
		},
		textAlign : "right",
		color : "#000",
		backgroundColor : "#996633",
		borderWidth : 1,
		borderColor : "#fff"
	});

	// Adicionar o label
	pr_view_labels.add(vr_lbl_equipamento);

}

function mostraLabelSolicitacao(pr_view_labels) {

	// Label de Solicitacao
	var vr_lbl_solicitacao = Ti.UI.createLabel({
		height : "27%",
		width : "100%",
		top : "29.2%",
		text : " Solicitação ",
		font : {
			fontSize : 15,
			fontFamily : App.fontFamily
		},
		textAlign : "right",
		color : "#000",
		backgroundColor : "#996633",
		borderWidth : 1,
		borderColor : "#fff"
	});

	// Adicionar o label
	pr_view_labels.add(vr_lbl_solicitacao);

}

function mostraLabelSolicitante(pr_view_labels) {

	// Label de Solicitante
	var vr_lbl_solicitante = Ti.UI.createLabel({
		height : "14.6%",
		width : "100%",
		top : "56.2%",
		text : " Solicitante ",
		font : {
			fontSize : 15,
			fontFamily : App.fontFamily
		},
		textAlign : "right",
		color : "#000",
		backgroundColor : "#996633",
		borderWidth : 1,
		borderColor : "#fff"
	});

	// Adicionar o label
	pr_view_labels.add(vr_lbl_solicitante);

}

function mostraLabelDataHora(pr_view_labels) {

	// Label de Data e Hora
	var vr_lbl_data = Ti.UI.createLabel({
		height : "14.6%",
		width : "100%",
		top : "70.8%",
		text : " Data e Hora ",
		font : {
			fontSize : 15,
			fontFamily : App.fontFamily
		},
		textAlign : "right",
		color : "#000",
		backgroundColor : "#996633",
		borderWidth : 1,
		borderColor : "#fff"
	});

	// Adicionar o label
	pr_view_labels.add(vr_lbl_data);

}

function mostraLabelMaquina(pr_view_labels) {

	// Label da maquina
	var vr_lbl_maquina = Ti.UI.createLabel({
		height : "14.6%",
		width : "100%",
		top : "85.4%",
		text : "Maquina",
		font : {
			fontSize : 15,
			fontFamily : App.fontFamily
		},
		textAlign : "right",
		color : "#000",
		backgroundColor : "#996633",
		borderWidth : 1,
		borderColor : "#fff"
	});

	// Adicionar o label
	pr_view_labels.add(vr_lbl_maquina);
}

function mostraLabelObrigatorios(pr_view_solicitacao) {

	// Label de campos obrigatorios
	var vr_lbl_obrigatorios = Ti.UI.createLabel({
		width : "75%",
		height : "10%",
		top : "75%",
		left : "0%",
		text : "* Campos obrigatórios",
		font : {
			fontSize : 15,
			fontFamily : App.fontFamily
		},
		textAlign : "center",
		color : "#000",
	});

	// Adicionar o label
	pr_view_solicitacao.add(vr_lbl_obrigatorios);

}

function mostraCamposSolicitacao(pr_view_solicitacao) {

	// View para conter os labels
	var vr_view_campos = Ti.UI.createView({
		height : "75%",
		width : "62%",
		right : "0%",
		top : "1%",
	});

	// Adicionar a view
	pr_view_solicitacao.add(vr_view_campos);

	// Mostrar campo da Fabrica
	mostraCampoFabrica(vr_view_campos);

	// Mostra campo de Equipamento
	mostraCampoEquipamento(vr_view_campos);

	// Mostrar campo de Solicitação
	mostraCampoSolicitacao(vr_view_campos);

	// Mostrar campo do Solicitante
	mostraCampoSolicitante(vr_view_campos);

	// Mostrar campo da Data e Hora
	mostraDataHora(vr_view_campos);

	// Mostrar se a maquina está funcionando ou não
	mostraCampoMaquina(vr_view_campos);

}

function mostraCampoFabrica(pr_view_campos) {

	// Campo da fabrica
	var vr_txt_fabrica = Ti.UI.createTextField({
		value : "Selecione uma opção",
		height : "12%",
		width : "84%",
		left : "1%",
		top : "0.65%",
		font : {
			fontSize : 15,
			fontFamily : App.fontFamily
		},
		borderWidth : 1,
		borderColor : "#000",
		backgroundColor : "#E6E5E0",
		enabled : false
	});

	// Adicionar o campo de fabrica
	pr_view_campos.add(vr_txt_fabrica);

	// Listar as fabricas
	vr_txt_fabrica.addEventListener('click', function() {
		listaFabricas(vr_txt_fabrica);
	});

	// Imagem de seta
	var vr_img_seta = Ti.UI.createImageView({
		image : "images/setaBaixo.png",
		height : "12%",
		width : "10%",
		left : "85.5%",
		top : "0.65%",
		borderWidth : 1,
		borderColor : "#000",
	});

	// Adicionar a imagem
	pr_view_campos.add(vr_img_seta);

	// Listar as fabricas
	vr_img_seta.addEventListener('click', function() {
		listaFabricas(vr_txt_fabrica);
	});

}

function listaFabricas(pr_txt_fabrica) {

	// Opcoes de fabricas
	var vr_opt_fabricas = Ti.UI.createOptionDialog({
		options : ["", "", "Cancelar"],
		cancel : 2
	});

	// Evento quando selecionada determinada opção
	vr_opt_fabricas.addEventListener('click', function(e) {
		if (e.index == 2) {
			return;
		}
		pr_txt_fabrica.value = this.options[e.index];
	});

	// Abrir as opções
	vr_opt_fabricas.show({
		animated : true
	});

}

function mostraCampoEquipamento(pr_view_campos) {

	// Campo do equipamento
	var vr_txt_equipamento = Ti.UI.createTextField({
		value : "Selecione uma opção",
		height : "12%",
		width : "84%",
		left : "1%",
		top : "14.6%",
		font : {
			fontSize : 15,
			fontFamily : App.fontFamily
		},
		borderWidth : 1,
		borderColor : "#000",
		backgroundColor : "#E6E5E0",
		enabled : false
	});

	// Adicionar o campo de equipamento
	pr_view_campos.add(vr_txt_equipamento);

	// Listar as fabricas
	vr_txt_equipamento.addEventListener('click', function() {
		listaEquipamentos(vr_txt_equipamento);
	});

	// Imagem de seta
	var vr_img_seta = Ti.UI.createImageView({
		image : "images/setaBaixo.png",
		height : "12%",
		width : "10%",
		left : "85.5%",
		top : "14.6%",
		borderWidth : 1,
		borderColor : "#000",
	});

	// Adicionar a imagem
	pr_view_campos.add(vr_img_seta);

	// Listar os equipamentos
	vr_img_seta.addEventListener('click', function() {
		listaEquipamentos(vr_txt_equipamento);
	});

}

function listaEquipamentos(pr_txt_equipamento) {

	// Opcoes de equipamentos
	var vr_opt_equipamentos = Ti.UI.createOptionDialog({
		options : ["", "", "Cancelar"],
		cancel : 2
	});

	// Evento quando selecionada determinada opção
	vr_opt_equipamentos.addEventListener('click', function(e) {
		if (e.index == 2) {
			return;
		}
		pr_txt_equipamento.value = this.options[e.index];
	});

	// Abrir as opções
	vr_opt_equipamentos.show({
		animated : true
	});

}

function mostraCampoSolicitacao(pr_view_campos) {

	// Criar o text area da Solicitacao
	var vr_area_solicitacao = Ti.UI.createTextArea({
		height : "26%",
		width : "95%",
		left : "1%",
		top : "29.2%",
		borderWidth : 1,
		borderColor : "#000",
		font : {
			fontSize : 15,
			fontFamily : App.fontFamily
		},
	});

	// Adicionar na view
	pr_view_campos.add(vr_area_solicitacao);

}

function mostraCampoSolicitante(pr_view_campos) {

	// Criar campo de nome do Solicitante
	var vr_txt_solicitante = Ti.UI.createTextField({
		height : "12%",
		width : "95%",
		left : "1%",
		top : "56.5%",
		font : {
			fontSize : 15,
			fontFamily : App.fontFamily
		},
		borderWidth : 1,
		borderColor : "#000",
		backgroundColor : "#E6E5E0",
		enabled : false
	});

	// Adicionar na view
	pr_view_campos.add(vr_txt_solicitante);

}

function mostraDataHora(pr_view_campos) {

	// Obtem a data atual
	var vr_dt_atual = new Date();
	// Pegar o dia
	var vr_nr_dia = (vr_dt_atual.getDate().toString().length == 1) ? "0" + vr_dt_atual.getDate() : vr_dt_atual.getDate();
	// Pegar o mes
	var vr_nr_mes = (vr_dt_atual.getMonth().toString().length == 1 ) ? "0" + (vr_dt_atual.getMonth() + 1) : vr_dt_atual.getMonth() + 1;
	// Pegar o ano
	var vr_nr_ano = vr_dt_atual.getFullYear();
	// Pegar a hora
	var vr_nr_hora = (vr_dt_atual.getHours().toString().length == 1) ? "0" + vr_dt_atual.getHours() : vr_dt_atual.getHours();
	// Pegar o minuto
	var vr_nr_min = (vr_dt_atual.getMinutes().toString().length == 1) ? "0" + vr_dt_atual.getMinutes() : vr_dt_atual.getMinutes();
	// Pegar os segundos
	var vr_nr_seg = (vr_dt_atual.getSeconds().toString().length == 1) ? "0" + vr_dt_atual.getSeconds() : vr_dt_atual.getSeconds();

	// Criar campo de Data e Hora
	var vr_txt_datahora = Ti.UI.createTextField({
		value : vr_nr_dia + '/' + vr_nr_mes + '/' + vr_nr_ano + " - " + vr_nr_hora + ':' + vr_nr_min + ':' + vr_nr_seg,
		height : "12%",
		width : "95%",
		left : "1%",
		top : "71.1%",
		font : {
			fontSize : 15,
			fontFamily : App.fontFamily
		},
		borderWidth : 1,
		borderColor : "#000",
		backgroundColor : "#E6E5E0",
		enabled : false
	});

	// Adicionar na view
	pr_view_campos.add(vr_txt_datahora);

}

function mostraCampoMaquina(pr_view_campos) {

	// Campo do maquina
	var vr_txt_maquina = Ti.UI.createTextField({
		value : "Funcionando",
		height : "12%",
		width : "84%",
		left : "1%",
		top : "85.7%",
		font : {
			fontSize : 15,
			fontFamily : App.fontFamily
		},
		borderWidth : 1,
		borderColor : "#000",
		backgroundColor : "#E6E5E0",
		enabled : false,
	});

	// Adicionar o campo de maquina
	pr_view_campos.add(vr_txt_maquina);

	// Listar se a maquina esta funcionando ou não
	vr_txt_maquina.addEventListener('click', function() {
		listaMaquinas(vr_txt_maquina);
	});

	// Imagem de seta
	var vr_img_seta = Ti.UI.createImageView({
		image : "images/setaBaixo.png",
		height : "12%",
		width : "10%",
		left : "85.5%",
		top : "85.7%",
		borderWidth : 1,
		borderColor : "#000",
	});

	// Adicionar a imagem
	pr_view_campos.add(vr_img_seta);

	// Listar as maquinas
	vr_img_seta.addEventListener('click', function() {
		listaMaquinas(vr_txt_maquina);
	});
}

function listaMaquinas(pr_txt_maquina) {

	// Opcoes de status da maquina
	var vr_opt_maquinas = Ti.UI.createOptionDialog({
		options : ["Funcionando", "Parada", "Cancelar"],
		cancel : 2
	});

	// Evento quando selecionada determinada opção
	vr_opt_maquinas.addEventListener('click', function(e) {
		if (e.index == 2) {
			return;
		}
		pr_txt_maquina.value = this.options[e.index];
	});

	// Abrir as opções
	vr_opt_maquinas.show({
		animated : true
	});

}

function mostraBotoesSolicitacao(pr_view_solicitacao, pr_win_solicitacao) {

	// View para os botoes
	var vr_view_botoes = Ti.UI.createView({
		height : "15%",
		width : "100%",
		bottom : "0%",
	});

	// Adicionar a view dos botoes
	pr_view_solicitacao.add(vr_view_botoes);

	// Mostrar o botão de voltar
	mostraBotaoVoltar(vr_view_botoes, pr_win_solicitacao);

	// Mostrar o botão de Opcoes
	mostraBotaoOpcoes(vr_view_botoes, pr_win_solicitacao);

	// Mostrar o botão de Enviar
	mostraBotaoEnviar(vr_view_botoes);

}

function mostraBotaoVoltar(pr_view_botoes, pr_win_solicitacao) {

	// View para o botao de voltar
	var vr_view_voltar = Ti.UI.createView({
		height : "100%",
		width : "32.33%",
		left : "0%"
	});

	// Adicionar a view
	pr_view_botoes.add(vr_view_voltar);

	// "Botão" do voltar
	var vr_btn_voltar = Ti.UI.createView({
		backgroundColor : "#D3D3D3",
		height : "80%",
		width : "95%",
		borderWidth : 1,
		borderColor : "#000"
	});

	// Adicionar o botão do voltar
	vr_view_voltar.add(vr_btn_voltar);

	// Click no botão Voltar
	vr_btn_voltar.addEventListener('click', function() {

		// Evitar clicks repetidos
		if (App.click() == false) {
			return;
		}

		// Mudar a cor de fundo como efeito no click
		this.backgroundColor = "#DFDFDF";

		// Voltar a cor original
		setTimeout(function() {
			vr_btn_voltar.backgroundColor = "#D3D3D3";
		}, 200);

		// Bloquear a tela
		var vr_views_load = showPreloader(pr_win_solicitacao, "Carregando ...");

		setTimeout(function() {
			// Desbloquear a tela
			hidePreloader(pr_win_solicitacao, vr_views_load);
			// Fechar tela
			pr_win_solicitacao.close();
		}, 1000);

	});

	// Label para o botão voltar
	var vr_lbl_voltar = Ti.UI.createLabel({
		text : "Voltar",
		font : {
			fontSize : 15,
			fontFamily : App.fontFamily
		},
	});

	// Adicionamos a descrição para dentro do "botão" voltar
	vr_btn_voltar.add(vr_lbl_voltar);

}

function mostraBotaoOpcoes(pr_view_botoes, pr_win_solicitacao) {

	// View para o botao de Ordens
	var vr_view_opcoes = Ti.UI.createView({
		height : "100%",
		width : "32.33%",
		left : "33.33%"
	});

	// Adicionar a view
	pr_view_botoes.add(vr_view_opcoes);

	// "Botão" do Opcoes
	var vr_btn_opcoes = Ti.UI.createView({
		backgroundColor : "#D3D3D3",
		height : "80%",
		width : "95%",
		borderWidth : 1,
		borderColor : "#000"
	});

	// Click no botão Opções
	vr_btn_opcoes.addEventListener('click', function() {

		// Evitar clicks repetidos
		if (App.click() == false) {
			return;
		}

		// Mudar a cor de fundo como efeito no click
		this.backgroundColor = "#DFDFDF";

		// Voltar a cor original
		setTimeout(function() {
			vr_btn_opcoes.backgroundColor = "#D3D3D3";
		}, 200);

		mostraOpcoes(pr_win_solicitacao);
	});

	// Adicionar o botão do Opcoes
	vr_view_opcoes.add(vr_btn_opcoes);

	// Label para o botão Opcoes
	var vr_lbl_opcoes = Ti.UI.createLabel({
		text : "Opções",
		font : {
			fontSize : 15,
			fontFamily : App.fontFamily
		},
	});

	// Adicionamos a descrição para dentro do "botão"
	vr_btn_opcoes.add(vr_lbl_opcoes);

}

function mostraBotaoEnviar(pr_view_botoes) {

	// View para o botao de Enviar
	var vr_view_enviar = Ti.UI.createView({
		height : "100%",
		width : "32.33%",
		left : "66.66%"
	});

	// Adicionar a view
	pr_view_botoes.add(vr_view_enviar);

	// "Botão" do Enviar
	var vr_btn_enviar = Ti.UI.createView({
		backgroundColor : "#D3D3D3",
		height : "80%",
		width : "95%",
		borderWidth : 1,
		borderColor : "#000"
	});

	// Click no botão Enviar
	vr_btn_enviar.addEventListener('click', function() {

		// Evitar clicks repetidos
		if (App.click() == false) {
			return;
		}

		// Mudar a cor de fundo como efeito no click
		this.backgroundColor = "#DFDFDF";

		// Voltar a cor original
		setTimeout(function() {
			vr_btn_enviar.backgroundColor = "#D3D3D3";
		}, 200);

	});

	// Adicionar o botão do enviar
	vr_view_enviar.add(vr_btn_enviar);

	// Label para o botão Opcoes
	var vr_lbl_enviar = Ti.UI.createLabel({
		text : "Enviar",
		font : {
			fontSize : 15,
			fontFamily : App.fontFamily
		},
	});

	// Adicionamos a descrição para dentro do "botão"
	vr_btn_enviar.add(vr_lbl_enviar);
}

function mostraOpcoes(pr_win_solicitacao) {

	var vr_opt_opcoes = Ti.UI.createOptionDialog({
		options : ["Consultar Ordens", "Alterar Senha", "Limpar Campos", "Cancelar"],
		cancel : 3
	});

	// Evento quando selecionada determinada opção
	vr_opt_opcoes.addEventListener('click', function(e) {

		// Evitar clicks repetdos
		if (App.click() == false) {
			return;
		}

		// Consultar Ordens
		if (e.index == 0) {

			// Bloquear a tela
			var vr_views_load = showPreloader(pr_win_solicitacao, "Carregando ...");

			// Desbloquear a tela
			setTimeout(function() {
				hidePreloader(pr_win_solicitacao, vr_views_load);

				// Incluir tela de consulta de ordens
				Ti.include("view/filtroOrdens.js");

				telaFiltroOrdens();

			}, 1000);

		}// Alterar Senha
		else if (e.index == 1) {

			// Bloquear a tela
			var vr_views_load = showPreloader(pr_win_solicitacao, "Carregando ...");

			// Desbloquear a tela
			setTimeout(function() {
				hidePreloader(pr_win_solicitacao, vr_views_load);

				// Incluir tela da troca de senha e fazer a abertura da mesma
				Ti.include("view/trocaSenha.js");

				telaSenha();

			}, 1000);

		}
	});

	// Abrir as opções
	vr_opt_opcoes.show({
		animated : true
	});

}
