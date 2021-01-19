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
function validarNombreEquipo(idEl){
    const idElemento = idEl;
    let valorelemento = document.getElementById(idElemento).value;
    if( valorelemento == null || valorelemento.length == 0 || /^\s+$/.test(valorelemento) ) {
        errorForm(idElemento, 'Debes agregar el nombre de tu equipo');
        return false;
    } else {
        validadoForm(idElemento);
    }
}

//---- Afiliación ----//
function validarSelectAfiliacion(idEl){
    const elemento = idEl;
    let valorelemento = document.getElementById(elemento).value;
    if( valorelemento == null || valorelemento.length == 0  ) {
        errorForm(elemento, 'Selecciona tu tipo de afiliación');
        return false;
    } else {
        validadoForm(elemento);
    }
}

//---- Dirección ----//
function validarDireccion(idEl){
    const idElemento = idEl;
    let valorelemento = document.getElementById(idElemento).value;
    if( valorelemento == null || valorelemento.length == 0 || /^\s+$/.test(valorelemento) ) {
        errorForm(idElemento, 'Escribe la dirección de tu equipo');
        return false;
    } else {
        validadoForm(idElemento);
    }
}

//---- País ----//
function validarPais(idEl){
    const idElemento = idEl;
    let valorelemento = document.getElementById(idElemento).value;
    if( valorelemento == null || valorelemento.length == 0 || /^\s+$/.test(valorelemento) ) {
        errorForm(idElemento, 'Escribe el nombre de tu país');
        return false;
    } else {
        validadoForm(idElemento);
    }
}

//---- Ciudad ----//
function validarCiudad(idEl){
    const idElemento = idEl;
    let valorelemento = document.getElementById(idElemento).value;
    if( valorelemento == null || valorelemento.length == 0 || /^\s+$/.test(valorelemento) ) {
        errorForm(idElemento, 'Escribe el nombre de tu ciudad');
        return false;
    } else {
        validadoForm(idElemento);
    }
}

//---- Teléfono ----//
function validarTelefono(idEl){
    const idElemento = idEl;
    let telefono = document.getElementById(idElemento).value;
    if( telefono == null || telefono.length == 0 || /^\s+$/.test(telefono) || isNaN(telefono) ) {
        validadoForm(idElemento);
        errorForm(idElemento, 'Ingresa tu número telefónico');
        return false;
    } else if(telefono.length > 0 && telefono.length < 10){
        validadoForm(idElemento);
        errorForm(idElemento, 'El teléfono debe contener al menos 10 dígitos');
        return false;
    } else {
        validadoForm(idElemento);
    }
}

//---- Código Postal ----//
function validarCP(idEl){
    const idElemento = idEl;
    let valorelemento = document.getElementById(idElemento).value;
    if( valorelemento == null || valorelemento.length == 0 || /^\s+$/.test(valorelemento) || isNaN(valorelemento) ) {
        validadoForm(idElemento);
        errorForm(idElemento, 'Ingresa tu código postal');
        return false;
    } else if(valorelemento.length > 0 && valorelemento.length < 5){
        validadoForm(idElemento);
        errorForm(idElemento, 'El código postal debe contener 5 dígitos');
        return false;
    } else {
        validadoForm(idElemento);
    }
}

//---- Nombre ----//
function validarNombre(idEl){
    const idElemento = idEl;
    let valorelemento = document.getElementById(idElemento).value;
    if( valorelemento == null || valorelemento.length == 0 || /^\s+$/.test(valorelemento) ) {
        errorForm(idElemento, 'Por favor agrega tu nombre');
        return false;
    } else {
        validadoForm(idElemento);
    }
}

//---- Correo ----//
function validarCorreo(idEl){
    const idCorreo = idEl;
    let correo = document.getElementById(idCorreo).value;
    if( correo == null || correo.length == 0 || !(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(correo)) ) {
        errorForm(idCorreo, 'Ingresa un correo válido');
        return false;
    } else {
        validadoForm(idCorreo);
    }
}

//---- Nivel ----//
function validarSelectTuRelacion(idEl){
    const elemento = idEl;
    let valorelemento = document.getElementById(elemento).value;
    if( valorelemento == null || valorelemento.length == 0  ) {
        errorForm(elemento, 'Selecciona la relación que tienes con el equipo');
        return false;
    } else {
        validadoForm(elemento);
    }
}
//---- Campus ----//
function validarSelectEnteraste(idEl){
    const elemento = idEl;
    let valorelemento = document.getElementById(elemento).value;
    if( valorelemento == null || valorelemento.length == 0  ) {
        errorForm(elemento, 'Elige la forma en que te enteraste del torneo');
        return false;
    } else {
        validadoForm(elemento);
    }
}
//---- Programa ----//
function validarSelectReasonToRegister(idEl){
    const elemento = idEl;
    let valorelemento = document.getElementById(elemento).value;
    if( valorelemento == null || valorelemento.length == 0  ) {
        errorForm(elemento, 'Elige la razón más importante por la que te registras');
        return false;
    } else {
        validadoForm(elemento);
    }
}
//---- Términos y condiciones ----//
function validarCheckAviso(idEl){
    const elemento = idEl;
    let valorelemento = document.getElementById(elemento);
    if(valorelemento.checked == false){
        errorForm(elemento, 'Debes aceptar el Aviso de privacidad');
        return false;
    } else {
        validadoForm(elemento);
    }
} 

    


function validacion(e){
    console.log("validation is running");
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
        validarNombreEquipo('nombre_equipo');
        validarSelectAfiliacion('afiliacion');
        validarDireccion('direccion');
        validarPais('pais');
        validarCiudad('ciudad');
        validarCP('cp');
        validarTelefono('telefono');
        validarCorreo('email');
        validarNombre('nombre');
        validarSelectTuRelacion('yourrelation');
        validarSelectEnteraste('enteraste');
        validarSelectReasonToRegister('reasontoregister');
        validarCheckAviso('aviso');
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