function showPreloader(pr_win_tela, pr_ds_texto) {
	
	var vr_view_bloquear = Ti.UI.createView({
		height: "100%",
		width: "100%",
		zIndex: 5555,
		opacity : 0.5,
		backgroundColor : '#555',
		zIndex: 1
	});
	
	pr_win_tela.add(vr_view_bloquear);

	var vr_view_carregando = Ti.UI.createView({
		borderRadius : '10dp',
		height : '135dp',
		width : '155dp',
		opacity : 1,
		backgroundColor : '#000',
		zIndex: 2
	});

	pr_win_tela.add(vr_view_carregando);

	var vr_ind_login = Titanium.UI.createActivityIndicator({
		height : '50dp',
		top : '20dp',
		color : '#fff',
	});

	vr_ind_login.show();
	vr_view_carregando.add(vr_ind_login);

	var vr_lbl_carrega = Ti.UI.createLabel({
		text : pr_ds_texto,
		textAlign : 'center',
		color : '#fff',
		font : {
			fontFamily : App.fontFamily,
			fontSize : 18,
			fontWeight : 'bold'
		},
		top : '80dp'
	});

	vr_view_carregando.add(vr_lbl_carrega);
	
	return { vr_view_bloquear  : vr_view_bloquear, 
			 vr_view_carregando: vr_view_carregando }; 

}

function hidePreloader(pr_win_tela, pr_views_load) {
	setTimeout(function() {
		pr_win_tela.remove(pr_views_load.vr_view_bloquear);
		pr_win_tela.remove(pr_views_load.vr_view_carregando);
	}, 0);
}