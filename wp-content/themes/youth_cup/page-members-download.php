<?php /* Template Name: Members Download */ ?>

<?php

date_default_timezone_set('America/Mexico_City');
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

require_once 'vendorExcel/autoload.php';

$user = wp_get_current_user();
//Roles permitidos a esta pagina
$allowed_roles = array('administrator');

//Si el usuario no es de un rol permitido
if(!array_intersect($allowed_roles, $user->roles ) ) {
    //redireccionamos el user al home
    header('Location: /');
    //header('Location: '.$_SERVER['REQUEST_URI']);
 }
 
?> 


<?php 

    // Create new Spreadsheet object
    $spreadsheet = new Spreadsheet();
    global $wpdb;
    
    $usuarios = $wpdb->get_results("SELECT * FROM wp_registro ORDER BY equipo ASC");

    $_SESSION['users'] = $usuarios;
    
    $pre = $wpdb->get_results("SELECT * FROM wp_preregistro ORDER BY nombre ASC");

    $_SESSION['pre'] = $pre;
    
    $newsletter = $wpdb->get_results("SELECT * FROM wp_news ORDER BY nombre ASC");

    $_SESSION['newsletter'] = $newsletter;
    
    
    if ($_POST['descarga']) {
        
          // Set workbook properties
  $spreadsheet->getProperties()->setCreator('Youth Cup')
  ->setLastModifiedBy('Youth Cup')
  ->setTitle('Reporte de miembros Youth Cup')
  ->setSubject('Usuarios Youth Cup')
  ->setDescription('Base de datos descargada de MYSQL')
  ->setKeywords('Usuarios DB MYSQL')
  ->setCategory('DB');


  $spreadsheet->setActiveSheetIndex(0)
  ->setCellValue('A1', 'Tablero de miembros')
  ->SetCellValue('A2', "Equipo")
  ->SetCellValue('B2', "Afiliación")
  ->SetCellValue('C2', "Dirección")
  ->SetCellValue('D2', "País")
  ->SetCellValue('E2', "Ciudad")
  ->SetCellValue('F2', "CP")
  ->SetCellValue('G2', "Teléfono")
  ->SetCellValue('H2', "Contacto")
  ->SetCellValue('I2', "Email")
  ->SetCellValue('J2', "Relación con el equipo")
  ->SetCellValue('K2', "¿Cómo te enteraste del torneo?")
  ->SetCellValue('L2', "¿Porqué te registras en el torneo?")
  ->SetCellValue('M2', "¿Fecha registro");
  
  $spreadsheet->getActiveSheet()->mergeCells("A1:K1");
  $spreadsheet->getActiveSheet()->getPageSetup()->setHorizontalCentered(true);
  $spreadsheet->getActiveSheet()->getPageSetup()->setVerticalCentered(true);
  $spreadsheet->getDefaultStyle()->getFont()->setName('Arial');
  $spreadsheet->getDefaultStyle()->getFont()->setSize(14);
  $spreadsheet->getDefaultStyle()->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
  $spreadsheet->getDefaultStyle()->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
  $spreadsheet->getDefaultStyle()->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
  $spreadsheet->getDefaultStyle()->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
  $spreadsheet->getActiveSheet()->getStyle('A1:T1')->getAlignment()->setWrapText(true);
  $array = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M');
  foreach($array as $columnID) {
      $spreadsheet->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
  }
  $styleArray = [
    'font' => [
      'bold' => false,
    ],
    'alignment' => [
      'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
    ]
  ];

  $spreadsheet->getActiveSheet()->getStyle('A:M')->applyFromArray($styleArray);

  $styleArray = [
    'font' => [
      'bold' => true,
    ],
    'alignment' => [
      'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
    ],
    'borders' =>[
      'outline' => array(
      'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
      'color' => array('argb' => '000000'),
      )
    ]
  ];
  $spreadsheet->getActiveSheet()->getStyle('A1:M1')->applyFromArray($styleArray);
  $spreadsheet->getActiveSheet()->getStyle('A2:M2')->applyFromArray($styleArray);
  
  $ban = 3;
  foreach($_SESSION['users'] as $usuario) {
    $spreadsheet->setActiveSheetIndex(0)
    ->setCellValue('A'.$ban, ($usuario->equipo))
    ->setCellValue('B'.$ban, ($usuario->afilia))
    ->setCellValue('C'.$ban, ($usuario->dir))
    ->setCellValue('D'.$ban, ($usuario->pais))
    ->setCellValue('E'.$ban, ($usuario->ciudad))
    ->setCellValue('F'.$ban, ($usuario->cp))
    ->setCellValue('G'.$ban, ($usuario->tel))
    ->setCellValue('H'.$ban, ($usuario->contacto))
    ->setCellValue('I'.$ban, ($usuario->correo))
    ->setCellValue('J'.$ban, ($usuario->relacion))
    ->setCellValue('K'.$ban, ($usuario->como))
    ->setCellValue('L'.$ban, ($usuario->motivo))
    ->setCellValue('M'.$ban, ($usuario->created))
    ;
    
    $ban++;
  }
    
    // Set worksheet title
  $spreadsheet->getActiveSheet()->setTitle('Reporte de usuarios');

  // Set active sheet index to the first sheet, so Excel opens this as the first sheet
  $spreadsheet->setActiveSheetIndex(0);

  // Redirect output to a client's web browser (Xlsx)
  header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
  header('Content-Disposition: attachment;filename="youth-cup-members.xlsx"');
  header('Cache-Control: max-age=0');
  // If you're serving to IE 9, then the following may be needed
  header('Cache-Control: max-age=1');

  // If you're serving to IE over SSL, then the following may be needed
  header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
  header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
  header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
  header('Pragma: public'); // HTTP/1.0


  //old PhpExcel code:
  //$writer = PHPExcel_IOFactory::createWriter($spreadsheet, 'Excel2007');
  //$writer->save('php://output');
  ob_end_clean();
  //new code:
  $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
  $writer->save('php://output');
  exit;
  

    }
    
    if ($_POST['descargaPre']) {
        
          // Set workbook properties
  $spreadsheet->getProperties()->setCreator('Youth Cup')
  ->setLastModifiedBy('Youth Cup')
  ->setTitle('Reporte de pre-reistro Youth Cup')
  ->setSubject('Usuarios Youth Cup')
  ->setDescription('Base de datos descargada de MYSQL')
  ->setKeywords('Usuarios DB MYSQL')
  ->setCategory('DB');


  $spreadsheet->setActiveSheetIndex(0)
  ->setCellValue('A1', 'Tablero de miembros')
  ->SetCellValue('A2', "Nombre")
  ->SetCellValue('B2', "Equipo")
  ->SetCellValue('C2', "Ciudad")
  ->SetCellValue('D2', "Teléfono")
  ->SetCellValue('E2', "Email")
  ->SetCellValue('F2', "Mensaje")
  ->SetCellValue('G2', "Fecha de registro");
  
  $spreadsheet->getActiveSheet()->mergeCells("A1:G1");
  $spreadsheet->getActiveSheet()->getPageSetup()->setHorizontalCentered(true);
  $spreadsheet->getActiveSheet()->getPageSetup()->setVerticalCentered(true);
  $spreadsheet->getDefaultStyle()->getFont()->setName('Arial');
  $spreadsheet->getDefaultStyle()->getFont()->setSize(14);
  $spreadsheet->getDefaultStyle()->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
  $spreadsheet->getDefaultStyle()->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
  $spreadsheet->getDefaultStyle()->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
  $spreadsheet->getDefaultStyle()->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
  $spreadsheet->getActiveSheet()->getStyle('A1:G1')->getAlignment()->setWrapText(true);
  $array = array('A', 'B', 'C', 'D', 'E', 'F', 'G');
  foreach($array as $columnID) {
      $spreadsheet->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
  }
  $styleArray = [
    'font' => [
      'bold' => false,
    ],
    'alignment' => [
      'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
    ]
  ];

  $spreadsheet->getActiveSheet()->getStyle('A:G')->applyFromArray($styleArray);

  $styleArray = [
    'font' => [
      'bold' => true,
    ],
    'alignment' => [
      'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
    ],
    'borders' =>[
      'outline' => array(
      'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
      'color' => array('argb' => '000000'),
      )
    ]
  ];
  $spreadsheet->getActiveSheet()->getStyle('A1:G1')->applyFromArray($styleArray);
  $spreadsheet->getActiveSheet()->getStyle('A2:G2')->applyFromArray($styleArray);
  
  $ban = 3;
  foreach($_SESSION['pre'] as $pre) {
    $spreadsheet->setActiveSheetIndex(0)
    ->setCellValue('A'.$ban, ($pre->nombre))
    ->setCellValue('B'.$ban, ($pre->equipo))
    ->setCellValue('C'.$ban, ($pre->cd))
    ->setCellValue('D'.$ban, ($pre->telefono))
    ->setCellValue('E'.$ban, ($pre->mail))
    ->setCellValue('F'.$ban, ($pre->porque))
    ->setCellValue('G'.$ban, ($pre->created))
    ;
    
    $ban++;
  }
    
    // Set worksheet title
  $spreadsheet->getActiveSheet()->setTitle('Reporte de pre-registro');

  // Set active sheet index to the first sheet, so Excel opens this as the first sheet
  $spreadsheet->setActiveSheetIndex(0);

  // Redirect output to a client's web browser (Xlsx)
  header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
  header('Content-Disposition: attachment;filename="youth-cup-pre-registro.xlsx"');
  header('Cache-Control: max-age=0');
  // If you're serving to IE 9, then the following may be needed
  header('Cache-Control: max-age=1');

  // If you're serving to IE over SSL, then the following may be needed
  header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
  header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
  header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
  header('Pragma: public'); // HTTP/1.0


  //old PhpExcel code:
  //$writer = PHPExcel_IOFactory::createWriter($spreadsheet, 'Excel2007');
  //$writer->save('php://output');
  ob_end_clean();
  //new code:
  $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
  $writer->save('php://output');
  exit;
  

    }
    
    get_header(); 

?>
<style type="text/css">

.text-serch, .especialidades, .como_se_entero, .pais, .fecha, .dia-filter {
  display: none;
}

form#memberform {
  display: flex;
  justify-content: center;
  align-items: center;
  margin-bottom: 25px;
}

div.filter-inputs {
  margin-left: 30px;
  margin-right: 30px;
}

.tg  {border-collapse:collapse;border-spacing:0;width: 100%;}
.tg td{border-color:black;border-style:solid;border-width:1px;font-size:14px;
  overflow:hidden;padding:10px 5px;word-break:break-word;color: #000;}
  .tg th{border-color:black;border-style:solid;border-width:1px;font-size:14px;
    font-weight:normal;overflow:hidden;padding:10px 5px;word-break:break-word;}
    .tg .tg-0wst{background-color:#f4f6fa;text-align:center;vertical-align:middle}
    .tg .tg-mvh5{background-color:#DB052C;color:#ffffff;font-weight:bold;text-align:center;vertical-align:middle;width: 5%;}
    .noticia-curveball{margin: 80px 2% 20px;}

    section.dashboard {
      width: 100%;
      max-height: 600px;
      height: auto;
      margin: auto;
      overflow: scroll;
    }
    input[type="submit"] {
      display: block;
      margin: 0 auto;
      margin-top: 25px;
      font-size: 18px;
    }
    label.text-filtrar {
      margin-right: 10px;
      color: #fff;
    }

    .fecha select{
      margin: 5px 0;
    }
    .list-downloads{
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .list-downloads li{
        padding: 0 0.5rem;
        margin: 0.0.25rem;
        border-right: 1px solid #000;
        text-align: center;
        cursor: pointer;
    }
    .list-downloads li:last-child{
        border-right: none;
    }
    .list-downloads li.selected{
        color: #DB052C;
        font-weight: bold;
    }
    .tabstrip{
        display: none;
        position: relative;
    }
    #members{
        display: block;
    }


    </style>
 <div class="noticia-curveball">
     <ul class="list-downloads">
         <li class="selected">Members</li>
         <li>QueSeaMiEquipo</li>
         <li>Newsletter</li>
         <!--li>Teams</li-->
     </ul>
     <div id="members" class="tabstrip">
         <h2>Descarga Members</h2>

          <!-- TABLA DE USUARIOS FILTRADOS -->
          <section class="dashboard">
            <table class="tg">
              <thead>
                <tr>
                  <th class="tg-mvh5">Equipo</th>
                  <th class="tg-mvh5">Afiliación</th>
                  <th class="tg-mvh5">Dirección</th>
                  <th class="tg-mvh5">País</th>
                  <th class="tg-mvh5">Ciudad</th>
                  <th class="tg-mvh5">CP</th>
                  <th class="tg-mvh5">Teléfono</th>
                  <th class="tg-mvh5">Contacto</th>
                  <th class="tg-mvh5">Email</th>
                  <th class="tg-mvh5">Relación con el equipo</th>
                  <th class="tg-mvh5">¿Cómo te enteraste del torneo?</th>
                  <th class="tg-mvh5">¿Porqué te registras en el torneo?</th>
                  <th class="tg-mvh5">Fecha registro</th>

                </tr>
              </thead>
                <tbody>
              <?php foreach ($_SESSION['users'] as $usuario) {  ?>
                  <tr>
                    <td class="tg-0wst"><?php echo ($usuario->equipo) ?> </td>
                    <td class="tg-0wst"><?php echo ($usuario->afilia) ?></td>
                    <td class="tg-0wst"><?php echo ($usuario->dir) ?></td>
                    <td class="tg-0wst"><?php echo ($usuario->pais) ?></td>
                    <td class="tg-0wst"><?php echo ($usuario->ciudad) ?></td>
                    <td class="tg-0wst"><?php echo ($usuario->cp) ?></td>
                    <td class="tg-0wst"><?php echo ($usuario->tel) ?></td>
                    <td class="tg-0wst"><?php echo ($usuario->contacto) ?></td>
                    <td class="tg-0wst"><?php echo ($usuario->correo) ?></td>
                    <td class="tg-0wst"><?php echo ($usuario->relacion) ?></td>
                    <td class="tg-0wst"><?php echo ($usuario->como) ?></td>
                    <td class="tg-0wst"><?php echo ($usuario->motivo) ?></td>
                    <td class="tg-0wst"><?php echo ($usuario->created) ?></td>

                  </tr>

              <?php } ?>
              </tbody>
            </table>
          </section>

          <!-- DESCARGA DE EXCEL -->
          <form action="" method="POST">
            <input class="boton" type="submit" name="descarga" value="Descarga Excel">
          </form>

         
     </div>
     
     <div id="queseamiequipo" class="tabstrip">
         <h2>Descarga #QueSeaMiEquipo</h2>

          <!-- TABLA DE USUARIOS FILTRADOS -->
          <section class="dashboard">
            <table class="tg">
              <thead>
                <tr>
                  <th class="tg-mvh5">Nombre de Contacto</th>
                  <th class="tg-mvh5">Nombre del equipo</th>
                  <th class="tg-mvh5">Ciudad</th>
                  <th class="tg-mvh5">Teléfono</th>
                  <th class="tg-mvh5">Email</th>
                  <th class="tg-mvh5">Mensaje</th>
                  <th class="tg-mvh5">Fecha de registro</th>

                </tr>
              </thead>
                <tbody>
              <?php foreach ($_SESSION['pre'] as $pre) {  ?>
                  <tr>
                    <td class="tg-0wst"><?php echo ($pre->nombre) ?> </td>
                    <td class="tg-0wst"><?php echo ($pre->equipo) ?></td>
                    <td class="tg-0wst"><?php echo ($pre->cd) ?></td>
                    <td class="tg-0wst"><?php echo ($pre->telefono) ?></td>
                    <td class="tg-0wst"><?php echo ($pre->mail) ?></td>
                    <td class="tg-0wst"><?php echo ($pre->porque) ?></td>
                    <td class="tg-0wst"><?php echo ($pre->created) ?></td>

                  </tr>

              <?php } ?>
              </tbody>
            </table>
          </section>

          <!-- DESCARGA DE EXCEL -->
          <form action="" method="POST">
            <input class="boton" type="submit" name="descargaPre" value="Descarga Excel">
          </form>

         </div>
         <div id="newsletter" class="tabstrip">
             <h2>Descarga #QueSeaMiEquipo</h2>

          <!-- TABLA DE USUARIOS FILTRADOS -->
          <section class="dashboard">
            <table class="tg">
              <thead>
                <tr>
                  <th class="tg-mvh5">Nombre</th>
                  <th class="tg-mvh5">Email</th>
                  <th class="tg-mvh5">Fecha de registro</th>

                </tr>
              </thead>
                <tbody>
              <?php foreach ($_SESSION['newsletter'] as $newsletter) {  ?>
                  <tr>
                    <td class="tg-0wst"><?php echo ($newsletter->nombre) ?> </td>
                    <td class="tg-0wst"><?php echo ($newsletter->correo) ?></td>
                    <td class="tg-0wst"><?php echo ($newsletter->created) ?></td>

                  </tr>

              <?php } ?>
              </tbody>
            </table>
          </section>

          <!-- DESCARGA DE EXCEL -->
          <form action="" method="POST">
            <input class="boton" type="submit" name="descargaNewsletter" value="Descarga Excel">
          </form>
         </div>
         <div id="teams" class="tabstrip">
         </div>
        
        </div>

    <?php get_footer(); ?>
    
