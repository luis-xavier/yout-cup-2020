<?php
if(isset($_POST['enviado'])) {
        //aqui tengo que vbolver a validor todos los campos 
        global $reg_errors;
        $reg_errors = new WP_Error;
        global $wpdb;
        $table = $wpdb->prefix.'news';
        $errores = array();


        if ( empty( $_POST['email'] ) ) {
            $reg_errors->add("empty-email", "Ingresa un correo válido");
          }

        if ( empty( $_POST['nombre'] ) ) {
            $name = "no name";
          }

        if ( empty( $_POST['acepta'] ) ) {
            $acepta = true;
          }    
        
        if ( !is_email( $_POST['email'] ) ) {
            $reg_errors->add( "invalid-email", "El e-mail no tiene un formato válido" );
          }



        if ( is_wp_error( $reg_errors ) ) {
            if (count($reg_errors->get_error_messages()) > 0) {

                foreach ( $reg_errors->get_error_messages() as $error ) {
                    array_push($errores, $error);
                   }
              
            }
          }else{

             //si si si ya todo esta chido...
        
        $data = array(
            'nombre' => $_POST['nombre_equipo'], 
            'correo' => $_POST['afiliacion'],
            'aviso' => $_POST['direccion'], 

        );

        $wpdb->insert($table,$data);

    
        $my_id = $wpdb->insert_id;

        //var_dump($my_id);

        //$wpdb->print_error();
        //var_dump($wpdb);



          }

}


?>