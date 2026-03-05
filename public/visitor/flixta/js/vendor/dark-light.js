    /*======================================
	settings append in body Js
	========================================*/
	function rs_settings_append($x) {
		var settings = $('body');
		let dark;
		$x == true ? dark = 'd-block' : dark = 'd-none';
	}
	rs_settings_append(true); // if want to enable dark light mode then send "true";


	// dark light mode toggler
	function rs_theme_toggler() {

		$('#rs-theme-toggler').on("change", function () {
			toggleTheme();

		});


		// set toggle theme scheme
		function rs_set_scheme(rs_theme) {
			localStorage.setItem('rs_theme_scheme', rs_theme);
			document.documentElement.setAttribute("rs-theme", rs_theme);
		}

		// toogle theme scheme
		function toggleTheme() {
			if (localStorage.getItem('rs_theme_scheme') === 'rs-theme-light') {
				rs_set_scheme('rs-theme-dark');
			} else {
				rs_set_scheme('rs-theme-light');
			}
		}

		// set the first theme scheme
		function rs_init_theme() {
			if (localStorage.getItem('rs_theme_scheme') === 'rs-theme-light') {
				rs_set_scheme('rs-theme-light');
				document.getElementById('rs-theme-toggler').checked = false;
			} else {
				rs_set_scheme('rs-theme-dark');
				document.getElementById('rs-theme-toggler').checked = true;
			}
		}
		rs_init_theme();
	}
	if ($("#rs-theme-toggler").length > 0) {
		rs_theme_toggler();
	}


