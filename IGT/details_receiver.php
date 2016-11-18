<html>
<head>
    <title>EGMPlay</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
    <meta name="description" content="Iowa Gambing Task"/>
    <meta name="keywords" content="OGT, IGT, Gambling Task, Iowa Gambling Task, Bechara's Gambling Task"/>
    <meta name="author" content="Ben Margevicius"/>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Alegreya">
    <link rel="stylesheet" type="text/css" href="igt.css">
</head>

<body>

    <?php
      if (isset($_GET["phone"])) {
        $details_csv_file_name = '../protected/details.csv';
        $details_xlsx_file_name = '../protected/details.xlsx';

        $name = $_GET["name"];
        $phone = $_GET["phone"];
        $details_string = $name . ',' . $phone . ',' . mt_rand(1,10000000)/100 . "\n";

        file_put_contents($details_csv_file_name, $details_string, FILE_APPEND);


        include '..\PHPExcel-1.8\Classes\PHPExcel\IOFactory.php';

        $objReader = PHPExcel_IOFactory::createReader('CSV');
        $objPHPExcel = $objReader->load($details_csv_file_name);
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save($details_xlsx_file_name);
      }
    ?>



    <section class="row" id="thankyou">
        <div id="gamelog">
          <div class="text-center">
            <br/>
          Thank you for your time, you may now close this window.<br/><br/>
          <!-- <button type="close" id="closebtn" class="btn btn-info" onclick="self.close()">Close window</button> -->
        </div>
        </div>
      </section>

</body>
</html>
