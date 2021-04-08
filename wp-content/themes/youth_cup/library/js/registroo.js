jQuery(document).ready(function($) {
			// ---- Funcion de constructor para asignar días respecto del valor del mes ---- //
			function Meses(mes){
				this.selector = $('#'+mes);
				let hermanodia = this.selector.siblings('.dias');
				this.selector.change( (event) =>{
					let valor = event.target.value;
					if(valor == 'enero' || valor == 'marzo' || valor == 'mayo' || valor == 'julio' || valor == 'agosto' || valor == 'octubre' || valor == 'diciembre'){
						$(hermanodia).html("<option value='DD'>DD</option>");
						this.asignardias(31);
						//console.log('31');
					} else if (valor == 'abril' || valor == 'junio' || valor == 'septiembre' || valor == 'noviembre'){
						$(hermanodia).html("<option value='DD'>DD</option>");
						this.asignardias(30);
						//console.log('30');
					} else if (valor == 'febrero'){
						$(hermanodia).html("<option value='DD'>DD</option>");
						this.asignardias(28);
						//console.log('28');
					}
				})
			}

			// --- Asignar función de bucle al constructor para crear opciones --- //
			Meses.prototype.asignardias = function(numero){
				for(i = 1; i <= numero; i++){	
					//console.log("sdsd");
					this.selector.siblings('.dias').append(`<option value="${i}"> 
						${i} 
					</option>`);
				}
			}

			// --- Asignar las funciones para cada uno de los selectores de mes --- //
			let jugador1 = new Meses('meses-1');
			let jugador2 = new Meses('meses-2');
			let jugador3 = new Meses('meses-3');
			let jugador4 = new Meses('meses-4');
			let jugador5 = new Meses('meses-5');
			let jugador6 = new Meses('meses-6');
			let jugador7 = new Meses('meses-7');
			let jugador8 = new Meses('meses-8');
			let jugador9 = new Meses('meses-9');
			let jugador10 = new Meses('meses-10');
			let jugador11 = new Meses('meses-11');
			let jugador12 = new Meses('meses-12');
			let jugador13 = new Meses('meses-13');
			let jugador14 = new Meses('meses-14');
			let jugador15 = new Meses('meses-15');


			$('.jugadores-editar').on('click', function(){
				//console.log("editar");
				$(this).parent().parent().removeClass('cerrado').addClass('abierto');
				return false;
				
			});
			$('.boton-registro').on('click', function(){
				//console.log("acveptar");
				let curnombre = $(this).parent().find('.nombre-jugador').val();
				let cuadro_jugadores = $(this).parent().parent().parent();
				let textojugador = cuadro_jugadores.find('.jugadores-botones p');
				if( !curnombre == '' || !curnombre.length == 0){
					textojugador.html(curnombre);
				} else {
					textojugador.html("Nombre de jugador");
				}
				cuadro_jugadores.removeClass('abierto').addClass('cerrado');
				return false;
			});
			/*$('.jugadores-cerrar').on('click', function(){
				let curcontainer = $(this).parent().parent();
				curcontainer.find('checkbox-estilizado').val('off');
				curcontainer.find('talla').val('talla');
				curcontainer.find('dias').val('DD');
				curcontainer.find('meses').val('MM');
				curcontainer.find('ano').val('AAAA');
				curcontainer.find('nombre-jugador').val('');
			})*/


	


});


function guardaPlayers(e){
	event.preventDefault(e);
		//alert('vai');
		
		//---- AQUÍ SE PUEDEN AGREGAR LAS ACCIONES PARA ENVIAR EL FORMULARIO ---//
		document.getElementById('formPlayers').submit();
		return false;
		// Cargar un loader mientras se envia //
		/*const loader = '<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>';
		setTimeout(function(){ 
			formulario.innerHTML = loader; 
		}, 50);*/		
	}

