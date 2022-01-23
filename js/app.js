$(document).ready(function () {
	   $('.sidebar-menu').tree()
		
	   $('#registros').DataTable({
	     'paging'      : true,
	     'pageLength'  : 10,
	     'lengthChange': false,
	     'searching'   : true,
	     'ordering'    : true,
	     'info'        : true,
	     'autoWidth'   : false,
	     'language' : {
	     	paginate: {
	     		next: 'Siguiente',
	     		previous: 'Anterior',
	     		last: 'Último',
	     		first: 'Primero'
	     	},
	     	info: 'Mostrando _START_ a _END_ de _TOTAL_ resultados',
	     	emptyTable: 'No hay registros',
	     	infoEmpty: '0 registros',
	     	search: 'Buscar: '
	     }
	   });

	   $('#fecha_inicio').datepicker({autoclose: true});
	   $('#fecha_fin').datepicker({autoclose: true});

	   $('#repetir_password').on('blur', function(){
	   		var password_nuevo = $('#password').val();

	   		if ($(this).val() == password_nuevo) {
	   			$('#resultado_password').text('Correcto');
	   			$('#resultado_password').parents('.form-group').addClass('has-success').removeClass('has-error');
	   			$('input#password').parents('.form-group').addClass('has-success').removeClass('has-error');
	   		} else {
	   			$('#resultado_password').text('No son iguales');
	   			$('#resultado_password').parents('.form-group').addClass('has-error').removeClass('has-success');
	   			$('input#password').parents('.form-group').addClass('has-error').removeClass('has-success');
	   		}
	   });

	   $('#tipo_estanque').on('blur', function(){
	   		if ($(this).val() == 'circular') {
	   			$('#label_ch').text('Radio (cm): ');
	   			$('#l_men').removeAttr('required');
	   			$("#div_lmen").css("display", "none");
	   		} else {
	   			$("#l_men").prop('required', true);
	   			$("#div_lmen").css("display", "block");
	   			$('#label_ch').text('Longitud mayor (cm): ');
	   		}
	   });

	   $('#l_may_r').on('blur', function(){
	   		if ($('#tipo_estanque').val() == 'circular') {
	   			var profundidad = $('#profundidad').val();
	   			var l_may_r = $('#l_may_r').val();
	   			var volumen = Math.PI * profundidad * Math.pow(l_may_r,2);
	   			var litros = volumen/1000;
	   			$('#resultado_volumen_cir').text(litros.toFixed(2) + ' Litros');
	   		}
	   });

	   $('#l_men').on('blur', function(){
	   		var profundidad = $('#profundidad').val();
	   		var l_may_r = $('#l_may_r').val();
	   		var l_men = $('#l_men').val();
	   		var volumen = profundidad*l_may_r*l_men;
	   		var litros = volumen/1000;
	   		$('#resultado_volumen').text(litros.toFixed(2) + ' Litros');
	   });

})