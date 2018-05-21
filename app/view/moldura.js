/*
 * Mostrar a linha divisoria na parte superior da tela
 */
function mostraLinhaSuperior(pr_win_tela) {

	var vr_view_linha = Ti.UI.createView({
		backgroundColor : "#000",
		top : "5%",
		width : "100%",
		height : "1%"
	});

	pr_win_tela.add(vr_view_linha);
}

/*
 * Criamos o titulo da aplicação e inserimos ele na View principal
 */
function mostraTitulo(pr_view_principal) {

	var vr_lbl_titulo = Titanium.UI.createLabel({
		height : "10%",
		top : "0%",
		text : "SOLICITAÇÃO DE SERVIÇO",
		font : {
			fontSize : 20,
			fontFamily : App.fontFamily,
			fontWeight : "bold"
		},
		textAlign : 'center',
		width : 'auto',
		color : "#000",
	});

	pr_view_principal.add(vr_lbl_titulo);

}

/*
 * Mostrar a linha divisoria na parte inferior da tela
 */
function mostraLinhaInferior(pr_win_tela) {

	var vr_view_linha = Ti.UI.createView({
		backgroundColor : "#000",
		bottom : "9%",
		width : "100%",
		height : "1%"
	});

	pr_win_tela.add(vr_view_linha);
}

/*
 * Mostrar as informações do Software e da empresa
 */
function mostraRodape(pr_win_tela) {

	// View do rodape marrom
	var vr_view_rodape = Ti.UI.createView({
		backgroundColor : "#996633",
		bottom : "0%",
		width : "100%",
		height : "8.5%"
	});

	// Adicionar a view a principal
	pr_win_tela.add(vr_view_rodape);

	var vr_lbl_rodape = Ti.UI.createLabel({
		text : "Copyright @ 2014 MAXIMIZA - Software de gestão da Manutenção - " + App.nome.toUpperCase(),
		font : {
			fontSize : 12,
			fontFamily : App.fontFamily
		},
		color : "#000",
		width : "100%",
		textAlign : "center"
	});

	// Adicionar a 1.era label a view
	vr_view_rodape.add(vr_lbl_rodape);

}

