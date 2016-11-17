
  <?php
    $results_csv_file_name = '../protected/results.csv';
    $results_xlsx_file_name = '../protected/results.xlsx';
    $results_json_file_name = '../protected/results.json';

    $results_csv = $_POST["results_csv"];
    $results_csv_string = $results_csv . "\n";

    $results_json = $_POST["results_json"];
    $results_json_string = $results_json . "\n";

    file_put_contents($results_json_file_name, $results_json_string, FILE_APPEND);

    file_put_contents($results_csv_file_name, $results_csv_string, FILE_APPEND);



    include '..\PHPExcel-1.8\Classes\PHPExcel\IOFactory.php';

    $objReader = PHPExcel_IOFactory::createReader('CSV');
    $objPHPExcel = $objReader->load($results_csv_file_name);
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    $objWriter->save($results_xlsx_file_name);


  ?>
