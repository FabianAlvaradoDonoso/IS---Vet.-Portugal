<?php

/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/London');

setlocale(LC_ALL,"es_ES");
$titulo = "Bajo Stock - " . date("d") . "/" . date("m") . "/" . date("Y");

if (PHP_SAPI == 'cli')
	die('This example should only be run from a Web Browser');

/** Include PHPExcel */
require_once '../../../Classes/PHPExcel.php';


	$base = new PDO("mysql:host=localhost; dbname=vetportu_vetportugalInv", "vetportu_inventa", "vetportugal2018");
    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $base->exec("SET CHARACTER SET utf8");

    $sql_total="SELECT
                p.CODIGO,
                c.NOMBRE_CATEGORIA AS CATEGORIA,
                r.NOMBRE_PROVEEDOR AS PROVEEDOR,
                p.NOMBRE,
                p.PRECIO_VENTA,
                p.PRECIO_NETO,
                p.FECHA_VENC,
                p.FECHA_ADQ,
                p.STOCK_MIN,
                p.STOCK_ACT,
                b.NOMBRE_BODEGA AS BODEGA
            FROM
                productos p
            INNER JOIN bodega b ON
                (p.ID_BODEGA = b.ID_BODEGA)
            INNER JOIN categoria c ON
                (
                    p.ID_CATEGORIA = c.ID_CATEGORIA
                )
            INNER JOIN proveedor r ON
                (
                    p.ID_PROVEEDOR = r.ID_PROVEEDOR
                ) 
            WHERE 
                p.STOCK_ACT <= p.STOCK_MIN";
                                                                      
$resultado = $base->prepare($sql_total);
$resultado->execute(array());
$numFilas=$resultado->rowCount() +2 ;
$celdasBody='A3:K'.$numFilas;
$celdasBodyA='A3:A'.$numFilas;
$celdasBodyEF='E3:F'.$numFilas;
$celdasBodyIJ='I3:J'.$numFilas;
                                            
                                        
PHPExcel_Cell::setValueBinder( new PHPExcel_Cell_AdvancedValueBinder() );
                                

$objPHPExcel = new PHPExcel();

$objPHPExcel->getProperties()
->setCreator('VetPortugal')
->setTitle('Inventario')
->setDescription('Excel con todos los productos incluidos en el sistema')
->setKeywords('Excel VetPotugal PHP')
->setCategory('VetPortugal');

$styleCellHeader = array(
    'font' => array(
        'bold' => true,
    ),
    'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
    ),
    'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
            'rgb' => 'fdff00',
        ),
    ),
    'borders' => array(
        'allborders' => array(
        'style' => PHPExcel_Style_Border::BORDER_THIN
        ),
    ),
);
$styleCellBody = array(
    'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
    ),
    'borders' => array(
        'allborders' => array(
        'style' => PHPExcel_Style_Border::BORDER_THIN
        ),
    ),
);

$objPHPExcel->getActiveSheet()->getStyle('A1:K2')->applyFromArray($styleCellHeader);
$objPHPExcel->getActiveSheet()->getStyle($celdasBody)->applyFromArray($styleCellBody);


$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->setTitle('Hoja 1');

$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A1:K1');
$objPHPExcel->getActiveSheet()->setCellValue("A1", $titulo);

$objPHPExcel->getActiveSheet()->setCellValue("A2", 'Codigo');
$objPHPExcel->getActiveSheet()->setCellValue("B2", 'Categoria');
$objPHPExcel->getActiveSheet()->setCellValue("C2", 'Proveedor');
$objPHPExcel->getActiveSheet()->setCellValue("D2", 'Nombre');
$objPHPExcel->getActiveSheet()->setCellValue("E2", 'Precio Venta');
$objPHPExcel->getActiveSheet()->setCellValue("F2", 'Precio Neto');
$objPHPExcel->getActiveSheet()->setCellValue("G2", 'Fecha Venc');
$objPHPExcel->getActiveSheet()->setCellValue("H2", 'Fecha Adq');
$objPHPExcel->getActiveSheet()->setCellValue("I2", 'Stock Min');
$objPHPExcel->getActiveSheet()->setCellValue("J2", 'Stock Act');
$objPHPExcel->getActiveSheet()->setCellValue("K2", 'Bodega');

$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);

$index = 2;
while($fila=$resultado->fetch(PDO::FETCH_ASSOC)){
    $index++;

    $codigo = $fila["CODIGO"];
    $categoria = $fila["CATEGORIA"];
    $proveedor = $fila["PROVEEDOR"];
    $nombre = $fila["NOMBRE"];
    $precioVenta = $fila["PRECIO_VENTA"];
    $precioNeto = $fila["PRECIO_NETO"];
    $fechaVenc3;
    if($fila["FECHA_VENC"]== null){
        $fechaVenc = '-';
        $fechaVenc2 = '-';
        $fechaVenc3 = '1';
    }else{
        $fechaVenc = date_format(date_create($fila["FECHA_VENC"]), 'Y/m/d');
        $fechaVenc2 = date_format(date_create($fila["FECHA_VENC"]), 'Y / m / d');
        $fechaVenc3 = '0';
    } 
    $fechaAdq = date_format(date_create($fila["FECHA_ADQ"]), 'Y/m/d');
    $stockMin = $fila["STOCK_MIN"];
    $stockAct = $fila["STOCK_ACT"];
    $bodega = $fila["BODEGA"];
    

    $objPHPExcel->getActiveSheet()->setCellValue("A{$index}", $codigo);
    $objPHPExcel->getActiveSheet()->setCellValue("B{$index}", $categoria);
    $objPHPExcel->getActiveSheet()->setCellValue("C{$index}", $proveedor);
    $objPHPExcel->getActiveSheet()->setCellValue("D{$index}", $nombre);
    $objPHPExcel->getActiveSheet()->setCellValue("E{$index}", $precioVenta);
    $objPHPExcel->getActiveSheet()->setCellValue("F{$index}", $precioNeto);
    $objPHPExcel->getActiveSheet()->setCellValue("G{$index}", $fechaVenc);
    $objPHPExcel->getActiveSheet()->setCellValue("H{$index}", $fechaAdq);
    $objPHPExcel->getActiveSheet()->setCellValue("I{$index}", $stockMin);
    $objPHPExcel->getActiveSheet()->setCellValue("J{$index}", $stockAct);
    $objPHPExcel->getActiveSheet()->setCellValue("K{$index}", $bodega);
    
}

$objPHPExcel->getActiveSheet()->getStyle($celdasBodyA)->getNumberFormat()->setFormatCode('#');
// $objPHPExcel->getActiveSheet()->getStyle($celdasBodyIJ)->getNumberFormat()->setFormatCode('#');
$objPHPExcel->getActiveSheet()->getStyle($celdasBodyEF)->getNumberFormat()->setFormatCode('$#,##0');
$objPHPExcel->getActiveSheet(0)->freezePaneByColumnAndRow(1,3);

// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="Bajo Stock.xls"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;
