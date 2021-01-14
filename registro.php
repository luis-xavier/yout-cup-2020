<?php include "header.php" ?>

<link rel="stylesheet" type="text/css" href="css/formulario.css">
<script type="text/javascript" src="js/formulario.js"></script>

<div id="back_form_login">
<section id="form-wrapper">
	<h1>Registra a tus jugadores</h1>
    <p>Selecciona en el apartado de cada jugador para registrarlo con su nombre completo, puedes borrar y editar sus datos también.</p>
    <form action="" method="POST" id="formulario" class="formulario formulario-registro">  
        <label for="Jugador" class="jugador">Jugador 1</label>          
        <ul class="container-first-i">
            <li class="form-jugador">
                <input id="nombre_completo" maxlength="50" name="nombre" size="20" type="text" required="" class="sinvalidar" onBlur="validarNombreEquipo('nombre_equipo')" oninput="validarNombreEquipo('nombre_equipo')"/>
                <label for="nombre_completo" class="nombre-completo">Nombre completo:</label>
            </li>
            <li class="fecha" style="margin-bottom: 15px;">
                <label for="Fecha">Fecha de nacimiento:</label>
                <div class="date-selector"> 
                    <select name="año" id="año">
                        <option value="AAAA">AAAA</option>
                        <option value="2004">2004</option>
                        <option value="2005">2005</option>
                        <option value="2006">2006</option>
                        <option value="2007">2007</option>
                    </select>
                    <select name="meses" id="meses">
                        <option value="MM">MM</option>
                        <option value="Enero">1</option>
                        <option value="Febrero">2</option>
                        <option value="Marzo">3</option>
                        <option value="Abril">4</option>
                        <option value="Mayo">5</option>
                        <option value="Junio">6</option>
                        <option value="Julio">7</option>
                        <option value="Agosto">8</option>
                        <option value="Septiembre">9</option>
                        <option value="Octubre">10</option>
                        <option value="Noviembre">11</option>
                        <option value="Diciembre">12</option>
                    </select>
                    <select name="dias" id="dias">
                        <option value="DD">DD</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                        <option value="31">31</option>
                    </select> 
                </div>                              
            </li>
            <li style="text-align: left; margin-bottom: 10px;">
                <input type="checkbox" class="checkbox-estilizado" name="aviso" id="aviso" onchange="">
                <label for="aviso">Cuenta con pasaporte vigente</label></li>
            <li>
                <button type="submit" name="enviar" onclick="validacion()" class="boton boton-registro" style="margin-bottom: 10px;">ACEPTAR</button>
            </li>
        </ul>
    </form>
    <form action="" method="POST" id="formulario" class="formulario formulario-registro cerrado">
    <label for="Jugador" class="jugador">Jugador 2</label> 
        <ul class="container-first-i">
            <li class="form-jugador form-jugador-cerrado">
                <div class="div-form">
                    <button><img src="img/edit.svg" alt=""></button>
                    <button><img src="img/cross.svg" alt=""></button>
                </div>
            </li>
        </ul>  
    </form>
    <button type="submit" name="enviar" onclick="validacion()" class="boton">FINALIZAR REGISTRO</button> 
</section>
</div>

<?php include "modal.php" ?>

<?php include "footer.php" ?>
