// Campos de usuarios e senhas
var glb_text_usuario_2, glb_text_senha_2, glb_text_novaSenha_2, glb_text_confSenha_2;

/*
 * Exibir a tela de troca de senha
 */
function telaSenha() {

	// Window da tela
	var vr_win_senha = Ti.UI.createWindow({
		backgroundColor : '#fff'
	});

	// View Principal da Window
	var vr_view_principal = Ti.UI.createView({
		width : "90%",
		height : "90%",
	});

	// Adicionamos a View principal na Window
	vr_win_senha.add(vr_view_principal);

	// Mostrar linha divisoria na parte superior da tela
	mostraLinhaSuperior(vr_win_senha);

	// Mostrar titulo principal da tela
	mostraTitulo(vr_view_principal);

	// Mostrar os dados da tela
	mostraAlterar(vr_view_principal, vr_win_senha);

	// Mostrar linha divisoria na parte inferior da tela
	mostraLinhaInferior(vr_win_senha);

	// Rodapé com informações do Software e empresa
	mostraRodape(vr_win_senha);

	vr_win_senha.open();

}

/*
 * Mostrar a caixa de alterar a senha
 */
function mostraAlterar(pr_view_principal, pr_win_senha) {

	// Criamos a view dos dados
	var vr_view_senha = Ti.UI.createView({
		height : "70%",
		width : "100%",
		borderWidth : 1,
		borderColor : "#000"
	});

	// Adicionamos a View da senha na View Principal
	pr_view_principal.add(vr_view_senha);

	// Adicionamos o titulo
	mostraTituloSenha(vr_view_senha);

	// Mostrar os labels
	mostraLabelsSenha(vr_view_senha);

	// Mostrar os campos
	mostraCamposSenha(vr_view_senha);

	// Mostrar os botões da tela
	mostraBotoesSenha(vr_view_senha, pr_win_senha);

}

/*
 * Mostrar o topo e o titulo da alteração de senha
 */
function mostraTituloSenha(pr_view_senha) {

	// Mostrar o topo na cor marrom claro
	var vr_view_top_senha = Ti.UI.createView({
		height : "11%",
		width : "100%",
		top : "0%",
		backgroundColor : "#996633" // 153 102 51
	});

	// Adicionamos a view do topo na view do senha
	pr_view_senha.add(vr_view_top_senha);

	// Criamos o label do titulo
	var vr_lbl_senha = Titanium.UI.createLabel({
		text : "ALTERAR SENHA",
		font : {
			fontSize : 16,
			fontFamily : App.fontFamily
		},
		textAlign : 'right',
		color : "#000"
	});

	// Adicionamos o label do titulo na view do topo
	vr_view_top_senha.add(vr_lbl_senha);

}

/*
 * Mostrar os labels de usuário, senha, nova senha e confirmar nova senha
 */
function mostraLabelsSenha(pr_view_senha) {

	// View dos labels do login
	var vr_view_labels = Ti.UI.createView({
		height : "50%",
		width : "40%",
		left : "0%",
		top : "20%",
	});

	// Adicionar a view dos labels
	pr_view_senha.add(vr_view_labels);

	// Label do Usuario
	var vr_lbl_usuario = Ti.UI.createLabel({
		text : "Usuário:",
		font : {
			fontSize : 15,
			fontFamily : App.fontFamily
		},
		color : "#000",
		textAlign : "right",
		width : "100%",
		height : "25%",
		top : "0%"
	});

	// Adicionar a label do usuario
	vr_view_labels.add(vr_lbl_usuario);

	// Label da Senha
	var vr_lbl_senha = Ti.UI.createLabel({
		text : "Senha:",
		font : {
			fontSize : 15,
			fontFamily : App.fontFamily
		},
		color : "#000",
		textAlign : "right",
		width : "100%",
		height : "25%",
		top : "25%"
	});

	// Adicionar o label da senha
	vr_view_labels.add(vr_lbl_senha);

	// Label da Nova Senha
	var vr_lbl_novaSenha = Ti.UI.createLabel({
		text : "Nova Senha:",
		font : {
			fontSize : 15,
			fontFamily : App.fontFamily
		},
		color : "#000",
		textAlign : "right",
		width : "100%",
		height : "25%",
		top : "50%"
	});

	// Adicionar o label da nova senha
	vr_view_labels.add(vr_lbl_novaSenha);

	// Label da repetir Senha
	var vr_lbl_confSenha = Ti.UI.createLabel({
		text : "Repetir Senha:",
		font : {
			fontSize : 15,
			fontFamily : App.fontFamily
		},
		color : "#000",
		textAlign : "right",
		width : "100%",
		height : "25%",
		top : "75%"
	});

	// Adicionar o label da nova senha
	vr_view_labels.add(vr_lbl_confSenha);

}

/*
 * Campos da tela, Usuario, senha, nova senha e confirmar senha
 */
function mostraCamposSenha(pr_view_senha) {

	// View dos campos no logins
	var vr_view_campos = Ti.UI.createView({
		height : "50%",
		width : "47.5%",
		right : "11.5%",
		top : "20%",
	});

	// Adicionar a view dos campos
	pr_view_senha.add(vr_view_campos);

	// View para o usuario
	var vr_view_usuario = Ti.UI.createView({
		height : "25%",
		width : "100%",
		top : "0%",
	});

	// Adicionar a view do usuario na da campos
	vr_view_campos.add(vr_view_usuario);

	// Campo do Usuario
	glb_text_usuario_2 = Ti.UI.createTextField({
		font : {
			fontSize : 15,
			fontFamily : App.fontFamily
		},
		backgroundColor : "#F9FFAE", // 249 255 174
		color : "#000",
		width : "95%",
		height : "65%",
	});

	// Adicionar a campo do usuario
	vr_view_usuario.add(glb_text_usuario_2);

	// View para a senha
	var vr_view_senha = Ti.UI.createView({
		height : "25%",
		width : "100%",
		top : "25%",
	});

	// Adicionar a view da senha na da campos
	vr_view_campos.add(vr_view_senha);

	// Campo da Senha
	glb_text_senha_2 = Ti.UI.createTextField({
		font : {
			fontSize : 15,
			fontFamily : App.fontFamily
		},
		backgroundColor : "#F9FFAE",
		color : "#000",
		width : "95%",
		height : "65%",
		passwordMask : true
	});

	// Adicionar o campo da senha
	vr_view_senha.add(glb_text_senha_2);

	// View para a nova senha
	var vr_view_novaSenha = Ti.UI.createView({
		height : "25%",
		width : "100%",
		top : "50%",
	});

	// Adicionar a view da nova senha a da campos
	vr_view_campos.add(vr_view_novaSenha);

	// Campo da Nova Senha
	glb_text_novaSenha_2 = Ti.UI.createTextField({
		font : {
			fontSize : 15,
			fontFamily : App.fontFamily
		},
		backgroundColor : "#F9FFAE",
		color : "#000",
		width : "95%",
		height : "65%",
		passwordMask : true
	});

	// Adicionar o campo da senha
	vr_view_novaSenha.add(glb_text_novaSenha_2);

	// View para confirmar senha
	var vr_view_confSenha = Ti.UI.createView({
		height : "25%",
		width : "100%",
		top : "75%",
	});

	// Adicionar a view da confirmação da senha
	vr_view_campos.add(vr_view_confSenha);

	// Campo da Confirmação da Senha
	glb_text_confSenha_2 = Ti.UI.createTextField({
		font : {
			fontSize : 15,
			fontFamily : App.fontFamily
		},
		backgroundColor : "#F9FFAE",
		color : "#000",
		width : "95%",
		height : "65%",
		passwordMask : true
	});

	// Adicionar o campo da confirmação da senha
	vr_view_confSenha.add(glb_text_confSenha_2);

}

/*
 * Botões de voltar e confirmar alteração
 */
function mostraBotoesSenha(pr_view_senha, pr_win_senha) {

	// View para os botoes
	var vr_view_botoes = Ti.UI.createView({
		height : "20%",
		width : "90%",
		bottom : "0%",
	});

	// Adicionar a view dos botoes
	pr_view_senha.add(vr_view_botoes);

	// View para o botao de voltar
	var vr_view_voltar = Ti.UI.createView({
		height : "100%",
		width : "49.5%",
		left : "0%"
	});

	// Adicionar a view
	vr_view_botoes.add(vr_view_voltar);

	// "Botão" do voltar
	var vr_btn_voltar = Ti.UI.createView({
		backgroundColor : "#D3D3D3",
		height : "60%",
		width : "95%",
		right : "1%",
		borderWidth : 1,
		borderColor : "#000"
	});

	// Adicionar o botão do voltar
	vr_view_voltar.add(vr_btn_voltar);

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

	// Click do botão Conectar
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
		var vr_views_load = showPreloader(pr_win_senha, "Carregando ...");

		setTimeout(function() {
			// Desbloquear a tela
			hidePreloader(pr_win_senha, vr_views_load);

			// Fechar tela
			pr_win_senha.close();

		}, 1000);

	});

	// View para o botao de confirmar
	var vr_view_confirmar = Ti.UI.createView({
		height : "100%",
		width : "49.5%",
		right : "0%",
	});

	// Adicionar a view da senha ao da botoes
	vr_view_botoes.add(vr_view_confirmar);

	// "Botão" do Confirmar
	var vr_btn_confirmar = Ti.UI.createView({
		backgroundColor : "#D3D3D3",
		height : "60%",
		width : "95%",
		left : "1%",
		borderWidth : 1,
		borderColor : "#000"
	});

	// Adicionar o botão
	vr_view_confirmar.add(vr_btn_confirmar);

	// Click do botão Confirmar
	vr_btn_confirmar.addEventListener('click', function() {

		// Evitar clicks repetdos
		if (App.click() == false) {
			return;
		}

		// Mudar a cor de fundo como efeito no click
		this.backgroundColor = "#DFDFDF";

		// Voltar a cor original
		setTimeout(function() {
			vr_btn_confirmar.backgroundColor = "#D3D3D3";
		}, 200);

		// Validar campos
		trataDadosSenha(pr_win_senha);

	});

	// Label para o botão confirmar
	var vr_lbl_confirmar = Ti.UI.createLabel({
		text : "Confirmar",
		font : {
			fontSize : 15,
			fontFamily : App.fontFamily
		},
	});

	// Adicionamos a descrição para dentro do botão
	vr_btn_confirmar.add(vr_lbl_confirmar);

}

/*
 * Tratar os dados da troca de senha
 */
function trataDadosSenha(pr_win_senha) {

	// Se não foi prenchido a usuario
	if (glb_text_usuario_2.value == '') {
		App.mostraAlerta('Alerta', 'O nome de usuário deve estar prenchido.');
		return;
	}

	// Se não foi prenchida a senha antiga
	if (glb_text_senha_2.value == '') {
		App.mostraAlerta('Alerta', 'A senha atual deve estar prenchida.');
		return;
	}

	// Se não foi prenchida a nova senha
	if (glb_text_novaSenha_2.value == '') {
		App.mostraAlerta('Alerta', 'A nova senha deve estar prenchida.');
		return;
	}

	// Se não foi prenchida a confirmação da senha
	if (glb_text_confSenha_2.value == '') {
		App.mostraAlerta('Alerta', 'A confirmação da senha nova deve estar prenchida.');
		return;
	}

	// Se a senha não mudou
	if (glb_text_senha_2.value == glb_text_novaSenha_2.value) {
		App.mostraAlerta('Alerta', 'A nova senha deve ser diferente da atual.');
		glb_text_novaSenha_2.value = '';
		return;
	}

	// Se as novas senhas não batem
	if (glb_text_novaSenha_2.value != glb_text_confSenha_2.value) {
		App.mostraAlerta('Alerta', 'A nova senha e a confirmação da mesma devem ser iguais.');
		glb_text_novaSenha_2.value = '';
		glb_text_confSenha_2.value = '';
		return;
	}

	alterarSenha(pr_win_senha);

}

function alterarSenha(pr_win_senha) {

	// Bloquear a tela
	var vr_views_load = showPreloader(pr_win_senha, "Carregando ...");

	// Desbloquear a tela
	setTimeout(function() {
		hidePreloader(pr_win_senha, vr_views_load);
	}, 500);

}
