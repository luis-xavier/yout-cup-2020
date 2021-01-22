<style type="text/css">
#modal-wrapper p.textoError{
    font-size: .7em !important;
    color: red !important;
    font-weight: 700 !important;
    margin: 4px 0 0 !important;
}
.formulario .error{
    border-color: red;
}
.formulario .validado{
    border-color: green;
}
.formulario input[type="text"].error,
.formulario input[type="password"].error{
    border-bottom: 2px solid red;
}
.formulario select.error{
    border:2px solid red;
}
</style>
<div class="overlay-confirmacion">
	<div class="modal">
		<div class="cerrar-modal"></div>
        <section id="modal-wrapper">
            <h2>Suscríbete al newsletter y participa en la rifa de un jersey</h2>
            <form action="" method="POST" id="formulario" class="formulario">
                <ul>
                    <li>
                        <input id="nombre_news" maxlength="80" name="nombre_news" size="20" type="text" required="" class="sinvalidar" onBlur="validarM_News('nombre_news')" oninput="validarM_News('nombre_news')" />
                        <label for="nombre_news">Nombre</label>
                    </li>

                    <li>
                        <input id="mail_news" maxlength="50" name="mail_news" size="20" type="text" required="" class="sinvalidar" onBlur="validarC_News('mail_news')" oninput="validarC_News('mail_news')"/>
                        <label for="mail_news">Correo electrónico</label>
                    </li>   
                    <!--li>
                        <input type="checkbox" class="checkbox-estilizado" name="aviso_news" id="aviso_news" onchange="validarN_CheckAviso('aviso_news')">
                        <label for="aviso_news">Acepto términos y condiciones contenidos en el <a href="aviso.php" class="inline-link">Aviso de privacidad</a></label>
                    </li-->
                </ul>
            </form>
            <button type="submit" name="enviar" onclick="validacion()" class="boton enviar">ENVIAR</button>
            <p>Conoce las reglas <a href="">aquí</a></p>
        </section>
	</div>
</div>


<script type="text/javascript">

function mensajeIntro(){
	$('.overlay-confirmacion').fadeIn('slow');
}

if ($.cookie('modal_shown') == null) {
    $.cookie('modal_shown', 'yes', { expires: 7, path: '/' });
    mensajeIntro();
}

$('.modal').on('click', function(){
	return false;
});

$('.overlay-confirmacion, .modal .btn-morado, .cerrar-modal').on('click', function(){
	$('.overlay-confirmacion').fadeOut();
});

function errorForm(idElementForm, textoAlerta){
    let elemento = idElementForm;
    let textoInterno = textoAlerta;
    let elementoId = document.getElementById(elemento);
    elementoId.classList.add('error');
    elementoId.classList.remove('validado');
    elementoId.classList.remove('sinvalidar');
    errorId = 'error-'+String(elemento);
    let tieneError = document.getElementById(errorId);
    if(!tieneError){
        const parrafo = document.createElement("p");
        const contParrafo = document.createTextNode(textoInterno);
        parrafo.appendChild(contParrafo);
        parrafo.classList.add('textoError');
        parrafo.id = 'error-'+String(elemento)
        //Depende de estructura de HTML
        elementoId.parentNode.appendChild(parrafo);
    }
}
//----- Función de remover error ------//
function validadoForm(idElementForm){
    let elemento = idElementForm;
    let elementoId = document.getElementById(elemento);
    elementoId.classList.remove('error');
    elementoId.classList.add('validado');
    elementoId.classList.remove('sinvalidar');
    errorId = 'error-'+String(elemento);
    let tieneError = document.getElementById(errorId);
    if(tieneError){
        tieneError.remove();
    }
}
//----Prevenir la entrada de letras en el teléfono------//
function isNumberKey(evt) {
    let charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57)){
        return false;
    } else {
        return true;
  }
}

//----Listar Todos los elementos del formulario y validar uno por uno------//

//---- Nombre Equipo ----//
function validarM_News(idEl){
    const idElemento = idEl;
    let valorelemento = document.getElementById(idElemento).value;
    if( valorelemento == null || valorelemento.length == 0 || /^\s+$/.test(valorelemento) ) {
        errorForm(idElemento, 'Por favor agrega tu nombre');
        return false;
    } else {
        validadoForm(idElemento);
    }
}

//---- Afiliación ----//
function validarC_News(idEl){
    const elemento = idEl;
    let valorelemento = document.getElementById(elemento).value;
    if( valorelemento == null || valorelemento.length == 0 || !(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(valorelemento)) ) {
        errorForm(elemento, 'Agrega un correo válido por favor');
        return false;
    } else {
        validadoForm(elemento);
    }
}

//---- Términos y condiciones ----//
function validarN_CheckAviso(idEl){
    const elemento = idEl;
    let valorelemento = document.getElementById(elemento);
    if(valorelemento.checked == false){
        errorForm(elemento, 'Debes aceptar el Aviso de privacidad');
        return false;
    } else {
        validadoForm(elemento);
    }
} 
    
//------  Función de validar todo el formulario  ---------//
function validacion(e){
    event.preventDefault(e);
    let formulario = document.getElementById('formulario');
    let tieneError;
    let sinvalidar;

    let camposForm = formulario.getElementsByTagName('input');
    for(i=0; i<camposForm.length; i++){
        if(camposForm[i].classList.contains('error')){
            tieneError = true;
        }
        if(camposForm[i].classList.contains('sinvalidar')){
            sinvalidar = true
        }
    }

    // Validar si hay selects dentro del formulario
    let selectForm = formulario.getElementsByTagName('select');
    for(i=0; i<selectForm.length; i++){
        if(selectForm[i].classList.contains('error')){
            tieneError = true;
        }
        if(selectForm[i].classList.contains('sinvalidar')){
            sinvalidar = true
        }
    }
    
    if( tieneError || sinvalidar ){
        validarC_News('nombre_news');
        validarN_CheckAviso('mail_news');
        //validarN_CheckAviso('aviso_news');
        return false;
    } else {
        //---- AQUÍ SE PUEDEN AGREGAR LAS ACCIONES PARA ENVIAR EL FORMULARIO ---//
        document.getElementById('formulario').submit();
        // Cargar un loader mientras se envia //
        const loader = '<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>';
        setTimeout(function(){ 
            formulario.innerHTML = loader; 
        }, 50);
    }
    
}
</script>