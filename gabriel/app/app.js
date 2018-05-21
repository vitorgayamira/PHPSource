//Incluir arquivos necessarios
Ti.include('view/carregando.js', 'view/moldura.js', 'controller/propriedades.js');

// Campos
var glb_text_usuario, glb_text_senha;

// Evitar clicks repetidos
var glb_time_clik = null;

iniciaApp();

/*
 * Inicializar o Web App
 */
function iniciaApp() {

	// Window Principal do Web App
	var vr_win_inicial = Ti.UI.createWindow({
		backgroundColor : '#fff'
	});

	// View Principal da Window
	var vr_view_principal = Ti.UI.createView({
		width : "90%",
		height : "90%",
	});

	// Adicionamos a View principal na Window
	vr_win_inicial.add(vr_view_principal);

	// Mostrar linha divisoria na parte superior da tela
	mostraLinhaSuperior(vr_win_inicial);

	// Mostrar titulo principal da tela
	mostraTitulo(vr_view_principal);

	// Mostrar a caixa de login
	mostraLogin(vr_view_principal, vr_win_inicial);

	// Mostrar linha divisoria na parte inferior da tela
	mostraLinhaInferior(vr_win_inicial);

	// Rodapé com informações do Software e empresa
	mostraRodape(vr_win_inicial);

	// Abrir Window principal
	vr_win_inicial.open();

}

/*
 * Mostrar a view do login
 */
function mostraLogin(pr_view_principal, pr_win_inicial) {

	// Criamos a view do login
	var vr_view_login = Ti.UI.createView({
		height : "40%",
		width : "100%",
		borderWidth : 1,
		borderColor : "#000"
	});

	// Adicionamos a View da login na View Principal
	pr_view_principal.add(vr_view_login);

	// Adicionamos o titulo da parte do login
	mostraTituloLogin(vr_view_login);

	// Mostrar os labels do login (Usuario e Senha)
	mostraLabelsLogin(vr_view_login);

	// Mostrar os campos do login (Usuario e Senha)
	mostraCamposLogin(vr_view_login);

	// Mostrar os botões do login (Conectar e Alterar senha)
	mostraBotoesLogin(vr_view_login, pr_win_inicial);

}

/*
 * Mostrar o topo e o titulo do login
 */
function mostraTituloLogin(pr_view_login) {

	// Mostrar o topo do login na cor marrom claro
	var vr_view_top_login = Ti.UI.createView({
		height : "20%",
		width : "100%",
		top : "0%",
		backgroundColor : "#996633" // 153 102 51
	});

	// Adicionamos a view do topo na view do login
	pr_view_login.add(vr_view_top_login);

	// Criamos o label do LOGIN
	var vr_lbl_login = Titanium.UI.createLabel({
		text : "LOGIN",
		font : {
			fontSize : 16,
			fontFamily : App.fontFamily
		},
		textAlign : 'right',
		color : "#000"
	});

	// Adicionamos o label do login na view do topo
	vr_view_top_login.add(vr_lbl_login);

}

/*
 * Mostrar os labels do Usuario e Senha
 */
function mostraLabelsLogin(pr_view_login) {

	// View dos labels do login
	var vr_view_labels = Ti.UI.createView({
		height : "45%",
		width : "30%",
		left : "0%",
		top : "20%",
	});

	// Adicionar a view dos labels
	pr_view_login.add(vr_view_labels);

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
		top : "0%",
		height : "50%"
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
		top : "50%",
		height : "50%"
	});

	// Adicionar o label da senha
	vr_view_labels.add(vr_lbl_senha);

}

/*
 *
 */
function mostraCamposLogin(pr_view_login) {

	// View dos campos no logins
	var vr_view_campos = Ti.UI.createView({
		height : "45%",
		width : "47.5%",
		right : "21.5%",
		top : "20%",
	});

	// Adicionar a view dos campos
	pr_view_login.add(vr_view_campos);

	// View para o usuario
	var vr_view_usuario = Ti.UI.createView({
		height : "50%",
		width : "100%",
		top : "0%",
	});

	// Adicionar a view do usuario na da campos
	vr_view_campos.add(vr_view_usuario);

	// Campo do Usuario
	glb_text_usuario = Ti.UI.createTextField({
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
	vr_view_usuario.add(glb_text_usuario);

	// View para a senha
	var vr_view_senha = Ti.UI.createView({
		height : "50%",
		width : "100%",
		top : "50%",
	});

	// Adicionar a view da senha na da campos
	vr_view_campos.add(vr_view_senha);

	// Campo da Senha
	glb_text_senha = Ti.UI.createTextField({
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
	vr_view_senha.add(glb_text_senha);

}

function mostraBotoesLogin(pr_view_login, pr_win_inicial) {

	// View para os botoes do login
	var vr_view_botoes = Ti.UI.createView({
		height : "35%",
		width : "90%",
		bottom : "0%",
	});

	// Adicionar a view dos botoes na do login
	pr_view_login.add(vr_view_botoes);

	// View para o botao de conectar
	var vr_view_conectar = Ti.UI.createView({
		height : "100%",
		width : "49.5%",
		left : "0%"
	});

	// Adicionar a view do conectar ao da botoes
	vr_view_botoes.add(vr_view_conectar);

	// "Botão" do conectar
	var vr_btn_conectar = Ti.UI.createView({
		backgroundColor : "#D3D3D3",
		height : "60%",
		width : "95%",
		right : "1%",
		borderWidth : 1,
		borderColor : "#000"
	});

	// Adicionar o botão do conectar a view do conectar
	vr_view_conectar.add(vr_btn_conectar);

	// Label para o botão conectar
	var vr_lbl_conectar = Ti.UI.createLabel({
		text : "Conectar",
		font : {
			fontSize : 15,
			fontFamily : App.fontFamily
		},
	});

	// Adicionamos a descrição para dentro do "botão" Conectar
	vr_btn_conectar.add(vr_lbl_conectar);

	// Click do botão Conectar
	vr_btn_conectar.addEventListener('click', function() {

		// Evitar clicks repetdos
		if (App.click() == false) {
			return;
		}

		// Mudar a cor de fundo como efeito no click
		this.backgroundColor = "#DFDFDF";

		// Voltar a cor original
		setTimeout(function() {
			vr_btn_conectar.backgroundColor = "#D3D3D3";
		}, 200);

		// Validar dados antes de chamar o login
		trataDadosLogin(pr_win_inicial);

	});

	// View para o botao de alterar senha
	var vr_view_senha = Ti.UI.createView({
		height : "100%",
		width : "49.5%",
		right : "0%",
	});

	// Adicionar a view da senha ao da botoes
	vr_view_botoes.add(vr_view_senha);

	// "Botão" do Alterar Senha
	var vr_btn_senha = Ti.UI.createView({
		backgroundColor : "#D3D3D3",
		height : "60%",
		width : "95%",
		left : "1%",
		borderWidth : 1,
		borderColor : "#000"
	});

	// Adicionar o botão do alterar senha a view da senha
	vr_view_senha.add(vr_btn_senha);

	// Click do botão Senha
	vr_btn_senha.addEventListener('click', function() {

		// Evitar clicks repetdos
		if (App.click() == false) {
			return;
		}

		// Mudar a cor de fundo como efeito no click
		this.backgroundColor = "#DFDFDF";

		// Voltar a cor original
		setTimeout(function() {
			vr_btn_senha.backgroundColor = "#D3D3D3";
		}, 200);

		// Bloquear a tela
		var vr_views_load = showPreloader(pr_win_inicial, "Carregando ...");

		// Desbloquear a tela
		setTimeout(function() {
			hidePreloader(pr_win_inicial, vr_views_load);

			// Incluir tela da troca de senha e fazer a abertura da mesma
			Ti.include("view/trocaSenha.js");

			telaSenha();

		}, 1000);

	});

	// Label para o botão conectar
	var vr_lbl_senha = Ti.UI.createLabel({
		text : "Alterar Senha",
		font : {
			fontSize : 15,
			fontFamily : App.fontFamily
		},
	});

	// Adicionamos a descrição para dentro do "botão" Alterar Senha
	vr_btn_senha.add(vr_lbl_senha);

}

function trataDadosLogin(pr_win_inicial) {

	if (glb_text_usuario.value == '') {
		App.mostraAlerta('Alerta', 'O nome de usuário deve estar prenchido.');
		return;
	}

	if (glb_text_senha.value == '') {
		App.mostraAlerta('Alerta', 'A senha deve estar prenchida.');
		return;
	}

	// Bloquear a tela
	var vr_views_load = showPreloader(pr_win_inicial, "Carregando ...");

	setTimeout(function() {
		// Desbloquear a tela
		hidePreloader(pr_win_inicial, vr_views_load);

		// Incluir tela da solicitacao e fazer a abertura da mesma
		Ti.include("view/solicitacao.js");

		telaSolicitacao();

	}, 4000);

}
