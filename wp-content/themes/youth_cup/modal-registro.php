<link rel="stylesheet" type="text/css" href="<?= get_stylesheet_directory_uri() . '/library/css/formulario.css' ?>">

<?php 


$esp = array(
    "Nombre",
    "Nombre del equipo",
    "Ciudad",
    "Teléfono",
    "Correo electrónico",
    "¿Por qué crees que debamos seleccionarte?",
    "Mi equipo corresponde a la categoría participante (2004-06) y deberíamos ser seleccionador por...",
    "Acepto los términos y condiciones",
    "Enviar",
    );
  
    $ing = array(
      "Name",
      "Team name",
      "City",
      "Phone number",
      "Email",
      "Tell us why why your team can be selected",
      "My team has on category (2004-06) and can be selected because...",
      "I accept the terms and conditions",
      "Send",
      );

?>


<?php if ( is_front_page() || is_home() ):
    if($language == 'en'){
        $modalClick = 'Fill in your data and participate to become one of the two teams FC Bayern and Tigres will put through the Youth Cup México';
    }else{
        $modalClick = 'Llena el formulario y participa para que tu equipo sea uno de los 2 becados por FC Bayern y Tigres';
    }
?>

<div class="overlay-registro"></div>


<div class="modal-registro">
<div class="cerrar-modal"></div>
<section id="form-wrapper" style="width: 100% !important;">
<h2><?= $modalClick; ?></h2>

    <form action="https://youthcup.mx/que-sea-mi-equipo/" method="POST" id="formulario" class="formulario">            
        <ul>
        	<li>
                <input id="nombre" maxlength="50" name="nombre" size="20" type="text" required="" class="sinvalidar" onBlur="validarNombre('nombre')" oninput="validarNombre('nombre')"/>
                <label for="nombre"><?= ($language == 'en') ? $ing[0] : $esp[0]; ?></label>
            </li>
            
            <li>
                <input id="nombre_equipo" maxlength="50" name="nombre_equipo" size="20" type="text" required="" class="sinvalidar" onBlur="validarNombreEquipo('nombre_equipo')" oninput="validarNombreEquipo('nombre_equipo')"/>
                <label for="nombre_equipo"><?= ($language == 'en') ? $ing[1] : $esp[1]; ?></label>
            </li>
			
			<li>
                <input id="ciudad" maxlength="80" name="ciudad" size="20" type="text" required="" class="sinvalidar" onBlur="validarCiudad('ciudad')" oninput="validarCiudad('ciudad')"/>
                <label for="ciudad"><?= ($language == 'en') ? $ing[2] : $esp[2]; ?></label>
            </li>
			
			<li>
                <input id="telefono" maxlength="13" name="mobile" size="20" type="text" required="" class="sinvalidar"  onBlur="validarTelefono('telefono')" oninput="validarTelefono('telefono')" onkeypress="return isNumberKey(event)"/>
                <label for="telefono"><?= ($language == 'en') ? $ing[3] : $esp[3]; ?></label>
            </li>
            
            <li>
                <input id="email" maxlength="80" name="email" size="20" type="text" required="" class="sinvalidar" onBlur="validarCorreo('email')" oninput="validarCorreo('email')"/>
                <label for="email"><?= ($language == 'en') ? $ing[4] : $esp[4]; ?></label>
            </li>

            <li>
                <label for="seleccionarte"><?= ($language == 'en') ? $ing[5] : $esp[5]; ?></label>
                <textarea id="seleccionarte" name="seleccionarte" required="" class="sinvalidar" onBlur="validarSeleccionarte('seleccionarte')" oninput="validarSeleccionarte('seleccionarte')" placeholder="<?php 
                        if (isset($_POST['seleccionarte'])){
                        echo $_POST['seleccionarte'];
                        }else{
                        echo  ($language == 'en') ? $ing[6] : $esp[6];
                        }
                        ?>" /></textarea>
            </li>

            <li style="text-align: left;">
                <input type="checkbox" class="checkbox-estilizado" name="aviso" id="aviso" onchange="validarCheckAviso('aviso')">
                <label for="aviso"><?= ($language == 'en') ? $ing[7] : $esp[7]; ?> <a href="<?= get_permalink( get_page_by_title( 'Aviso de privacidad' ) )?>" target="_blank" class="inline-link"></a></label>
            </li>
        </ul>

        <button type="submit" name="enviar" onclick="validacion()" class="boton" ><?= ($language == 'en') ? $ing[8] : $esp[8]; ?></button>

        <input type="hidden" name="enviado" value="true" />

    </form>

</section>

</div>



<script type="text/javascript">

var keys = {37: 1, 38: 1, 39: 1, 40: 1};

function preventDefault(e) {
  e.preventDefault();
}

function preventDefaultForScrollKeys(e) {
  if (keys[e.keyCode]) {
    preventDefault(e);
    return false;
  }
}

// modern Chrome requires { passive: false } when adding event
var supportsPassive = false;
try {
  window.addEventListener("test", null, Object.defineProperty({}, 'passive', {
    get: function () { supportsPassive = true; } 
  }));
} catch(e) {}

var wheelOpt = supportsPassive ? { passive: false } : false;
var wheelEvent = 'onwheel' in document.createElement('div') ? 'wheel' : 'mousewheel';

// call this to Disable
function disableScroll() {
  window.addEventListener('DOMMouseScroll', preventDefault, false); // older FF
  window.addEventListener(wheelEvent, preventDefault, wheelOpt); // modern desktop
  window.addEventListener('touchmove', preventDefault, wheelOpt); // mobile
  window.addEventListener('keydown', preventDefaultForScrollKeys, false);
}

// call this to Enable
function enableScroll() {
  window.removeEventListener('DOMMouseScroll', preventDefault, false);
  window.removeEventListener(wheelEvent, preventDefault, wheelOpt); 
  window.removeEventListener('touchmove', preventDefault, wheelOpt);
  window.removeEventListener('keydown', preventDefaultForScrollKeys, false);
}



var jq = jQuery.noConflict();
function mensajeIntro(){
    jq('.overlay-registro, .modal-registro').fadeIn('slow');
    //disableScroll();
}

(function($) {
  $(document).ready(function(){
        //if ($.cookie('modal_shown') == null) {
            //$.cookie('modal_shown', 'yes', { path: '/' });
            setTimeout(function(){
                mensajeIntro();
            }, 3000);
        //}
    });
}(jQuery));

jq('.modal').on('click', function(){
    return false;
});

jq('.overlay-registro, .cerrar-modal').on('click', function(){
    jq('.overlay-registro, .modal-registro').fadeOut();
    //enableScroll();
});


</script>

<script src="<?= get_stylesheet_directory_uri() . '/library/js/formulario-b.js' ?>">

<?php endif; ?>