<div class="middle">
	<div class="card-name">Удаление резюме</div>
	<div class="card-box">
		<div class="card-content">
			{{ form( url(['for': 'resume-delete', 'hash': resume.hash ]), 'class': 'form', 'data-ajax': 'true', 'method': 'post') }}
				<div class="form-infotext">
					<p>Для удаления резюме "{{ resume.name }}", пожалуйста, введите слово <b>Удалить</b> в поле ниже</p>
				</div>
				<div class="form-group">
					{{ text_field('delete_confirm', 'class': 'input input-big', 'placeholder': 'Подтверждение удаление') }}
				</div>
				<hr>
				<div class="form-group">
					{{ submit_button('Удалить резюме', 'class': 'btn btn-danger btn-big') }}
				</div>
			{{ end_form() }}
		</div>
	</div>
</div>