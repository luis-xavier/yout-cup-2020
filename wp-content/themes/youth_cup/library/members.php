<?php

/************* menu de miembros *********************/

function registro_de_miembros_menu() {
    add_menu_page( __( 'Members', 'members' ), __( 'Members', 'members' ), 'edit_posts', 'members', 'ver_miembros', get_stylesheet_directory_uri() . '/library/images/members.png', 9 );
    add_submenu_page('members','Members Registration', 'Member Registration', 'manage_options', 'std-regd','grabar_miembros');
   }

   add_action( 'admin_menu', 'registro_de_miembros_menu' );





function ver_miembros(){
    global $wpdb;
    $table = $wpdb->prefix.'registro';
?>

 <h2 class="cf_text">Registered teams</h2>
	<table name="form_table_find_aPlate" border="1">
		<tr> 
        <td>Nombre del equipo</td> 
        <td>Afiliación</td> 
        <td>Dirección</td>
        <td>País</td>
        <td>Ciudad</td>
        <td>Código postal</td>
        <td>Teléfono</td>
        <td>Nombre de contacto</td>
        <td>Correo electrónico</td>
        <td>Relación con el equipo</td>
        <td>¿Cómo te enteraste del torneo?</td>
        <td>¿Porqué te registras en el torneo?</td>
        <td>Términos y condiciones</td>
        </tr>
<?php
    


  
    function get_records($per_page = 20, $page_number = 1, $wpdb, $table){
            $sql = "select * from $table";
            if (isset($_REQUEST['s'])) {
                $sql.= ' where your_name LIKE "%' . $_REQUEST['s'] . '%" or event_name LIKE "%' . $_REQUEST['s'] . '%"';
            }
            if (!empty($_REQUEST['orderby'])) {
                $sql.= ' ORDER BY ' . esc_sql($_REQUEST['orderby']);
                $sql.= !empty($_REQUEST['order']) ? ' ' . esc_sql($_REQUEST['order']) : ' ASC';
            }
            $sql.= " LIMIT $per_page";
            $sql.= ' OFFSET ' . ($page_number - 1) * $per_page;
            $result = $wpdb->get_results($sql, 'ARRAY_A');

            foreach($result as $fila){
                echo "<tr>";
                echo "<td>".$fila['equipo']."</td>";
                echo "<td>".$fila['afilia']."</td>";
                echo "<td>".$fila['dir']."</td>";
                echo "<td>".$fila['pais']."</td>";
                echo "<td>".$fila['ciudad']."</td>";
                echo "<td>".$fila['cp']."</td>";
                echo "<td>".$fila['tel']."</td>";
                echo "<td>".$fila['contacto']."</td>";
                echo "<td>".$fila['correo']."</td>";
                echo "<td>".$fila['relacion']."</td>";
                echo "<td>".$fila['como']."</td>";
                echo "<td>".$fila['motivo']."</td>";
                echo "<td>".$fila['aviso']."</td>";
                echo "</tr>";

            }


      }

      get_records($per_page = 20, $page_number = 1, $wpdb, $table);

      ?>
	</table> 
      
  <?php
}

function grabar_miembros(){
    require_once( 'save-member.php' );
}
?>
