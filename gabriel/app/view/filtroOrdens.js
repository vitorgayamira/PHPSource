function telaFiltroOrdens() {

	// Window da tela de solicitação
	var vr_win_filtros = Ti.UI.createWindow({
		backgroundColor : '#fff'
	});

	// View Principal da Window
	var vr_view_principal = Ti.UI.createView({
		width : "90%",
		height : "90%",
	});

	// Adicionamos a View principal na Window
	vr_win_filtros.add(vr_view_principal);

	// Mostrar linha divisoria na parte superior da tela
	mostraLinhaSuperior(vr_win_filtros);

	// Mostrar titulo principal da tela
	mostraTitulo(vr_view_principal);

	// Mostrar linha divisoria na parte inferior da tela
	mostraLinhaInferior(vr_win_filtros);

	// Rodapé com informações do Software e empresa
	mostraRodape(vr_win_filtros);

	// Abrir a tela
	vr_win_filtros.open();
}
