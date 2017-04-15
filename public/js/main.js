$(document).ready(function() {
	/*
		Scroll To Top
		=========================================================
	*/
	$(document).on('click', '#rise', function() {
		$('html, body').animate({'scrollTop': 0});
		return false;
	});
	/*
		Alert
		=========================================================
	*/
	$(document).on('click', '.alert .close', function() {
		$(this).parent().fadeOut();
		return false;
	});
	$('.alert').delay(5000).fadeOut();
	/*
		Dropdown
		=========================================================
	*/
	$(document).on('click', '.dropdown .dropdown_toggler', function() {
		var e = $(this).closest('.dropdown');
		return e.toggleClass('open'),
		$(document).one("click",function(){
			e.removeClass("open")
		}),!1
	});
	/*
		Filter
		=========================================================
	*/
	$(document).on('change keyup', '[data-filter-input=true]', function() {
		var e = $(this).val();
		$("#filter_query").val(e);
	}),
	$(document).on('keydown', '[data-filter-input=true]', function(e) {
		if (e.keyCode == 13) {
			$('[data-filter-form=true]').submit();
		}
	});
	$(document).on('click', '[data-filter-button=true]', function(e) {
		e.preventDefault();
		$('[data-filter-form=true]').submit();
	});
	/*
		Ajax forms
		=========================================================
	*/
	$('.form[data-ajax=true]').submit(function(e) {
		e.preventDefault();

		var action = $(this).attr('action'),
			data   = $(this).serialize();

		$.post(action, data, function (data, status) {
			if (status == "success") {
				if (data.success) {
					$.ambiance({ message: data.success, title: 'Успех', type: 'success' });
				}
				if (data.error) {
					$.ambiance({ message: data.error, title: 'Ошибка', type: 'error' });
				}
				if (data.redirect) {
					$(location).attr('href', data.redirect);
				}
			} else {
				$.ambiance({ message: 'Непредвиденная ошабка', title: 'Ошибка', type: 'error' });
			}
		});
	});

});
