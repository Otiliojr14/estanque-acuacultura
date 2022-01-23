$(document).ready(function(){
	$('#guardar-registro').on('submit', function(e){
		e.preventDefault();

		var datos = $(this).serializeArray();

		$.ajax({
			type: $(this).attr('method'),
			data: datos,
			url: $(this).attr('action'),
			dataType: 'json',
			success: function(data){
				console.log(data);
				var resultado = data;
				if (resultado.respuesta == 'exito') {
					swal(
						'Registro guardado',
						'Se guardo correctamente',
						'success'
					)
				} else{
					swal(
						'¡Error!',
						'Hubo un error.',
						'error'
					)
				}
			}
		});
	});

	   $('.borrar_registro').on('click', function(e){
	   		e.preventDefault();
	   		var id = $(this).attr('data-id');
	   		var tipo = $(this).attr('data-tipo');
	   		swal({
	            title: '¿Está seguro?',
	            text: "Un registro eliminado no se puede recuperar",
	            type: 'warning',
	            showCancelButton: true,
	            confirmButtonColor: '#3085d6',
	            cancelButtonColor: '#d33',
	            cancelButtonText: 'Cancelar',
	            confirmButtonText: 'Si'
        	}).then(result=> {
        		if(result.value) {
	   				$.ajax({
						type: 'post',
						data: {
							'id': id,
							'registro' : 'eliminar'
						},
						url: 'modelo-'+tipo+'.php',
						success: function(data) {
							console.log(data);
							var resultado = JSON.parse(data);
							if (resultado.respuesta == 'exito') {
								swal(
	                                'Borrado!',
	                                'El registro ha sido eliminado',
	                                'success'
                            )
							jQuery('[data-id="'+resultado.id_eliminado+'"]').parents('tr').remove();
							}  else {
								swal(
									'¡Error!',
									'Hubo un error.',
									'error'
								)} 
						}
					});
	   			}
				});

	   });

	$('#login-usuario').on('submit', function(e){
		e.preventDefault();


		var datos = $(this).serializeArray();
		$.ajax({
			type: $(this).attr('method'),
			data: datos,
			url: $(this).attr('action'),
			dataType: 'json',
			success: function(data){
				var resultado = data;
				console.log(data);
				if (resultado.respuesta == 'exito') {
					swal(
						'Login Correcto',
						'Bienvenido '+resultado.usuario,
						'success'
					)
					setTimeout(function(){
						window.location.href = 'main_area.php';
					}, 2000);
				} else{
					swal(
						'¡Error!',
						'Password o usuarios incorrectos.',
						'error'
					)
				}
			}
		});
	});
});