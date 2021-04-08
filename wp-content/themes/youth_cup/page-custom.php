<?php
/*
 Template Name: Players registration
 *
 *
 * For more info: http://codex.wordpress.org/Page_Templates
*/
?>

<?php get_header(); ?>


<link rel="stylesheet" type="text/css" href="<?= get_stylesheet_directory_uri() . '/library/css/formulario.css' ?>">
<link rel="stylesheet" type="text/css" href="<?= get_stylesheet_directory_uri() . '/library/css/registro.css' ?>">
<script type="text/javascript" src="<?= get_stylesheet_directory_uri() . '/library/js/registroo.js' ?>"></script>

<div id="back_form_login">
<section id="form-wrapper">
<?php 
global $wpdb;
$palyers = $wpdb->prefix.'players';
//quiens soy 
$actual = get_current_user_id();
$misPlayers = $wpdb->get_results("SELECT * FROM $palyers WHERE id_contacto = $actual",OBJECT);
$cuantosPlayers = count($misPlayers);

$thisurl = get_permalink( get_the_ID() );

	if ($cuantosPlayers == 0) {
				$numjugador = 1;
	}else if($cuantosPlayers >= 15){
		$numjugador = 15;
	}else{
		    	$numjugador = $cuantosPlayers +1;
	}



if (isset($_POST['enviado'])) {

		#echo "<pre>".var_dump($_POST)."</pre>";

		for ($i=$numjugador; $i <= 15 ; $i++) { 
			//echo "nombre-".$i;
			if ($_POST["nombre-".$i] && $_POST["ano-".$i] && $_POST["meses-".$i] && $_POST["dias-".$i] && $_POST["talla-".$i]) {
				# code...

				$pass = isset($_POST["pasaporte-".$i]) ? "si" : "no" ;

				$miPlayer = array(
					'id' => NULL,
					'nombre' => sanitize_text_field($_POST["nombre-".$i]),
					'ano' => sanitize_text_field($_POST["ano-".$i]),
					'mes' => sanitize_text_field($_POST["meses-".$i]),
					'dia' => sanitize_text_field($_POST["dias-".$i]),
					'talla' => sanitize_text_field($_POST["talla-".$i]),
					'pasaporte' => $pass,
					'id_contacto' => $actual

				);	

				if ($wpdb->insert($palyers, $miPlayer) ){
					echo "<p>Jugador ".$_POST["nombre-".$i]." guardado correctamente";

					echo '<script type="text/javascript">
					setTimeout(window.location.replace("'.$thisurl.'"), 7000);
					</script>';
				}

			}
		}

}

	
	

?>
	<h1><?php the_title(); ?></h1>
    <?php  the_content(); ?>



	
	<form action="" method="POST" id="formPlayers" class="formulario formulario-registro">


<div id="container-jugador-<?= $numjugador ?>" class="container-jugador">

<b>Mis Jugadores</b>
	<?php
		if ($cuantosPlayers > 0) {
			$contador = 1;
			foreach ($misPlayers as $player) {
				
				echo "<h5>Jugador $contador  $player->nombre </h5>";
				$contador ++;
			}
		}
?>
</div>




<?php
		    while($numjugador <= (15) ):
	    ?>
		
		<div id="container-jugador-<?= $numjugador ?>" class="container-jugador">
			<h5>Jugador <?= $numjugador ?></h5>
			<div class="cuadro-datos cerrado">
				<div class="jugadores-botones">
					<p>Nombre del jugador</p>
					<!--a href="#" class="jugadores-cerrar"><img src="img/jugador-close.svg"></a-->
					<a href="#" class="jugadores-editar"><img src="<?= get_stylesheet_directory_uri() . '/library/img/jugador-edit.svg' ?>"></a>
				</div>
				<div class="jugadores-formulario">
					<ul>
						<li>
							<input id="nombre-<?= $numjugador ?>" maxlength="50" name="nombre-<?= $numjugador ?>" size="20" type="text" required="" class="sinvalidar nombre-jugador" onBlur="//validarNombre('nombre-<?= $numjugador ?>')" oninput="//validarNombre('nombre-<?= $numjugador ?>')"/>
	            			<label for="nombre-<?= $numjugador ?>">Nombre completo:</label>
						</li>
						<li>
							<label for="ano-<?= $numjugador ?>">Fecha de nacimiento</label>
							<div class="date-selector"> 
			                    <select name="ano-<?= $numjugador ?>" id="ano-<?= $numjugador ?>" class="ano">
			                        <option value="AAAA">Año</option>
			                        <option value="2004">2004</option>
			                        <option value="2005">2005</option>
			                        <option value="2006">2006</option>
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
			            	<a href="#" class="boton boton-registro">Menos</a>
					</ul>
				</div>
			</div>
	
	    </div>

	    <?php 
	    $numjugador++;
		endwhile;
		?>
		<button type="submit" name="enviar" class="boton" onclick="guardaPlayers()" >FINALIZAR REGISTRO</button> 

		<input type="hidden" name="enviado" value="se_fue">
	</form>
</section>
</div>


<?php get_footer(); ?>
