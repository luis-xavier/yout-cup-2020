<?php
if(is_admin()){
    new Mis_equipos();
}

class Mis_equipos{
    /**
     * Constructor will create the menu item
     */
    public function __construct()
    {
        add_action( 'admin_menu', array($this, 'add_menu_example_list_table_page' ));
    }

    /**
     * Menu item will allow us to load the page to display the table
     */
    public function add_menu_example_list_table_page(){
        add_menu_page( __( 'Members', 'members' ), __( 'Members', 'members' ), 'manage_options', 'registered-members', array($this, 'list_table_page'), get_stylesheet_directory_uri() . '/library/images/members.png', 9 );
        add_submenu_page('registered-members','Members Registration', 'Member Registration', 'manage_options', 'guardar-member','grabar_miembros');
    }

    /**
     * Display the list table page
     *
     * @return Void
     */
    public function list_table_page(){
        $exampleListTable = new Lista_De_Miembros();
        $exampleListTable->prepare_items();
        ?>
            <div class="wrap">
                <div id="icon-users" class="icon32"></div>
                <h2>Registered teams</h2>
                <?php $exampleListTable->display(); ?>
            </div>
        <?php
    }
}

// WP_List_Table is not loaded automatically so we need to load it in our application
if( ! class_exists( 'WP_List_Table' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}

/**
 * Create a new table class that will extend the WP_List_Table
 */
class Lista_De_Miembros extends WP_List_Table{
    /**
     * Prepare the items for the table to process
     *
     * @return Void
     */
    public function prepare_items(){
        $columns = $this->get_columns();
        $hidden = $this->get_hidden_columns();
        $sortable = $this->get_sortable_columns();

        $data = $this->table_data();
        
        usort( $data, array( &$this, 'sort_data' ) );

        $perPage = 10;
        $currentPage = $this->get_pagenum();
        $totalItems = count($data);

        $this->set_pagination_args( array(
            'total_items' => $totalItems,
            'per_page'    => $perPage
        ) );

        $data = array_slice($data,(($currentPage-1)*$perPage),$perPage);

        $this->_column_headers = array($columns, $hidden, $sortable);
        $this->items = $data;
    }

    /**
     * Override the parent columns method. Defines the columns to use in your listing table
     *
     * @return Array
     */
    public function get_columns(){
        $columns = array(
            'equipo'       => 'Nombre del equipo',
            'afilia'       => 'Afiliación',
            'dir' => 'Dirección',
            'pais'        => 'País',
            'ciudad'    => 'Ciudad',
            'cp'      => 'Código postal',
            'tel'      => 'Teléfono',
            'contacto'      => 'Nombre de contacto',
            'correo'      => 'Correo electrónico',
            'relacion'      => 'Relación con el equipo',
            'como'      => '¿Cómo te enteraste del torneo?',
            'motivo'      => '¿Porqué te registras en el torneo?',
            'created'      => 'Fecha registro',
            'aviso'      => 'T&C',
            //'invitacion'    => 'Invite'//$this->invitador()
        );

        return $columns;
    }

    /**
     * Define which columns are hidden
     *
     * @return string
     */
    public function invitador(){
        return sprintf(
                '<input type="button" value="ha ha!" >'
            );        
    }

    /**
     * Define which columns are hidden
     *
     * @return Array
     */
    public function get_hidden_columns(){
        return array();
    }

    /**
     * Define the sortable columns
     *
     * @return Array
     */
    public function get_sortable_columns(){
        return array(
            'equipo' => array('equipo', false),
            'pais' => array('pais', false),
            'created' => array('created', false),
        );
    }

    /**
     * Get the table data
     *
     * @return Array
     */
    private function table_data(){
        global $wpdb;
        $table = $wpdb->prefix.'registro';

        $sql = "select * from $table";
       
        $result = $wpdb->get_results($sql, 'ARRAY_A');

        return $result;
    }

    /**
     * Define what data to show on each column of the table
     *
     * @param  Array $item        Data
     * @param  String $column_name - Current column name
     *
     * @return Mixed
     */
    public function column_default( $item, $column_name ){

        switch( $column_name ) {
            case 'equipo':
            case 'afilia':
            case 'dir':
            case 'pais':
            case 'ciudad':
            case 'cp':
            case 'tel':
            case 'contacto':
            case 'correo':
            case 'relacion':
            case 'como':
            case 'motivo':
            case 'created':
            case 'aviso':
                return $item[ $column_name ];
            default:
                return print_r( $item, true ) ;
        }
    }

    /**
     * Allows you to sort the data by the variables set in the $_GET
     *
     * @return Mixed
     */
    private function sort_data( $a, $b ){
        // Set defaults
        $orderby = 'id';
        $order = 'asc';

        // If orderby is set, use this as the sort column
        if(!empty($_GET['orderby'])){
            $orderby = $_GET['orderby'];
        }

        // If order is set use this as the order
        if(!empty($_GET['order'])){
            $order = $_GET['order'];
        }


        $result = strcmp( $a[$orderby], $b[$orderby] );

        if($order === 'asc'){
            return $result;
        }

        return -$result;
    }
}


function grabar_miembros(){
    require_once( 'save-member.php' );
}
?>
