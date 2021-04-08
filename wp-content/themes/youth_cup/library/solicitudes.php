<?php
if(is_admin()){
    new Que_sea_el_mio();
}

class Que_sea_el_mio{
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
        add_menu_page( __( '#QueSeaMiEquipo', '#QueSeaMiEquipo' ), __( '#QueSeaMiEquipo', '#QueSeaMiEquipo' ), 'manage_options', 'grant-application', array($this, 'list_table_page'), get_stylesheet_directory_uri() . '/library/images/members.png', 9 );
    }

    /**
     * Display the list table page
     *
     * @return Void
     */
    public function list_table_page(){
        $exampleListTable = new Lista_De_Solicitudes();
        $exampleListTable->prepare_items();
        ?>
            <div class="wrap">
                <div id="icon-users" class="icon32"></div>
                <h2>Grant applications</h2>
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
class Lista_De_Solicitudes extends WP_List_Table{
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
            'nombre'      => 'Nombre de contacto',
            'equipo'       => 'Nombre del equipo',
            'cd'    => 'Ciudad',
            'telefono'      => 'Teléfono',
            'mail'       => 'Email',
            'porque' => 'Mensaje',
            'aviso'      => 'T&C',
            'created'      => 'Fecha registro',
            //'invitacion'    => 'Invite'//$this->invitador()
        );

        return $columns;
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
            'nombre' => array('nombre', false),
            'cd' => array('cd', false),
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
        $table = $wpdb->prefix.'preregistro';

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
            case 'nombre':
            case 'cd':
            case 'telefono':
            case 'mail':
            case 'aviso':
                return $item[ $column_name ];
            case 'created':
                return date("d/m/Y H:i", strtotime($item[ $column_name ]));    
            case 'porque':
                return substr($item[ $column_name ],0, 22)." ..." ;   
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

?>
