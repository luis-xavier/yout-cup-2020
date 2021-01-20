<?php include "header.php" ?>

<link rel="stylesheet" type="text/css" href="css/formulario.css">
<link rel="stylesheet" type="text/css" href="css/registro.css">

<div id="back_form_login">
<section id="form-wrapper">
	<h1>Registra a tus jugadores</h1>
    <p>Selecciona en el apartado de cada jugador para registrarlo con su nombre completo, puedes borrar y editar sus datos también.</p>
	
	<form action="" method="POST" id="formulario" class="formulario formulario-registro">
	    <?php
		    $numjugador = 1;
		    while($numjugador <= 15):
	    ?>
		<div id="container-jugador-<?= $numjugador ?>" class="container-jugador">
			<h5>Jugador <?= $numjugador ?></h5>
			<div class="cuadro-datos cerrado">
				<div class="jugadores-botones">
					<p>Nombre del jugador</p>
					<!--a href="#" class="jugadores-cerrar"><img src="img/jugador-close.svg"></a-->
					<a href="#" class="jugadores-editar"><img src="img/jugador-edit.svg"></a>
				</div>
				<div class="jugadores-formulario">
					<ul>
						<li>
							<input id="nombre-<?= $numjugador ?>" maxlength="50" name="nombre-<?= $numjugador ?>" size="20" type="text" required="" class="sinvalidar nombre-jugador" onBlur="//validarNombre('nombre-<?= $numjugador ?>')" oninput="//validarNombre('nombre-<?= $numjugador ?>')"/>
	            			<label for="nombre-<?= $numjugador ?>">Nombre completo:</label>
						</li>
						<li>
							<label for="año-<?= $numjugador ?>">Fecha de nacimiento</label>
							<div class="date-selector"> 
			                    <select name="año-<?= $numjugador ?>" id="año-<?= $numjugador ?>" class="año">
			                        <option value="AAAA">Año</option>
			                        <option value="2004">2004</option>
			                        <option value="2005">2005</option>
			                        <option value="2006">2006</option>
			                        <option value="2007">2007</option>
			                    </select>
			                    <select name="meses-<?= $numjugador ?>" id="meses-<?= $numjugador ?>" class="meses">
			                        <option value="MM">Mes</option>
			                        <option value="enero">01</option>
			                        <option value="febrero">02</option>
			                        <option value="marzo">03</option>
			                        <option value="abril">04</option>
			                        <option value="mayo">05</option>
			                        <option value="junio">06</option>
			                        <option value="julio">07</option>
			                        <option value="agosto">08</option>
			                        <option value="septiembre">09</option>
			                        <option value="octubre">10</option>
			                        <option value="noviembre">11</option>
			                        <option value="diciembre">12</option>
			                    </select>
			                    <select name="dias-<?= $numjugador ?>" id="dias-<?= $numjugador ?>" class="dias">
			                        <option value="DD">Día</option>
			                    </select> 
	                		</div>
						</li>
						<li>
							<label for="talla-<?= $numjugador ?>">Talla de la camiseta</label>
							<select name="talla-<?= $numjugador ?>" id="talla-<?= $numjugador ?>" class="talla">
								<option value="talla"></option>
			                    <option value="xg">XG</option>
			                    <option value="l">G</option>
			                    <option value="m">M</option>
			                    <option value="ch">CH</option>
			                </select>
						</li>

						<li style="text-align: left; margin-bottom: 10px;">
			                <input type="checkbox" class="checkbox-estilizado" name="pasaporte-<?= $numjugador ?>" id="pasaporte-<?= $numjugador ?>" onchange="">
			                <label for="pasaporte-<?= $numjugador ?>">Cuenta con pasaporte vigente</label></li>
			            	<a href="#" class="boton boton-registro">ACEPTAR</a>
					</ul>
				</div>
			</div>
	
	    </div>
	    <?php 
	    $numjugador++;
		endwhile;
		?>
		<button type="submit" name="enviar" onclick="//validacion()" class="boton">FINALIZAR REGISTRO</button> 
	</form>
</section>
</div>

<?php include "footer.php" ?>

<script type="text/javascript" src="js/registro.js"></script>