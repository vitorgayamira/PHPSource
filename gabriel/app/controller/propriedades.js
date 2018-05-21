var App;

(function() {

	// Propriedades do App
	App = {
		nome : "Sadege",
		fontFamily : "Linotype Hotmetal Pi",
		dominio : "",
		time_click : null
	};

	// Evitar double-click
	App.click = function() {

		var vr_time_current = new Date();

		if (vr_time_current - App.time_click < 1000) {
			return false;
		}

		App.time_click = vr_time_current;

		return true;

	};

	// Mostrar mensagens na tela
	App.mostraAlerta = function(pr_ds_titulo, pr_ds_mensagem) {

		Ti.UI.createAlertDialog({
			title : pr_ds_titulo,
			message : pr_ds_mensagem
		}).show();

	};

	/*
	 App.replaceAll = function(str, de, para) {
	 var pos = str.indexOf(de);
	 while (pos > -1) {
	 str = str.replace(de, para);
	 pos = str.indexOf(de);
	 }
	 return (str);
	 };

	 App.trim = function(str) {
	 return str.replace(/^\s+|\s+$/g, "");
	 };
	 */

})();
