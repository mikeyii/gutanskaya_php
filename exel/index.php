<?php
  function getXLS($xls, $index){
    require 'Classes/PHPExcel/IOFactory.php';
    require 'Classes/PHPExcel.php';
    $objPHPExcel = PHPExcel_IOFactory::load($xls);
    $objPHPExcel->setActiveSheetIndex($index);
    $aSheet = $objPHPExcel->getActiveSheet();
    //этот массив будет содержать массивы содержащие в себе значения ячеек каждой строки
    $array = array();
    //получим итератор строки и пройдемся по нему циклом
    foreach($aSheet->getRowIterator() as $row){
      //получим итератор ячеек текущей строки
      $cellIterator = $row->getCellIterator();
      //пройдемся циклом по ячейкам строки
      //этот массив будет содержать значения каждой отдельной строки
      $item = array();
      foreach($cellIterator as $cell){
        //заносим значения ячеек одной строки в отдельный массив
        array_push($item, iconv('utf-8', 'utf-8', $cell->getCalculatedValue()));
      }
      //заносим массив со значениями ячеек отдельной строки в "общий массв строк"
      array_push($array, $item);
    }
    return $array;
  }
  $filename = 'sampleData/example.xls';
  $listname = isset($_GET['listname']) ? $_GET['listname']-1 : 0;
  $xls = getXLS($filename, $listname);
  $objReader = PHPExcel_IOFactory::createReader('Excel5');
	$worksheetNames = $objReader->listWorksheetNames($filename);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Exel</title>
	<link rel="stylesheet" href="public/css/bootstrap.min.css">
</head>
<body>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
		<h1>Файл <?=$filename?></h1>
			<table class="table table-bordered table-hover table-condensed">
				<?php foreach ($xls as $row): ?>
					<tr contenteditable="true">
						<?php foreach ($row as $cell): ?>
							<td contenteditable="true"><?=$cell?></td>
						<?php endforeach ?>
					</tr>
				<?php endforeach ?>
		</table>
		<?php
		foreach ($worksheetNames as $worksheetName) {
			$link = '<a href="?listname='.substr($worksheetName, -1).'">'.substr($worksheetName,0,-1).'</a>';
			echo $link." ";
		}
		?>
	</div>
</div>
</div>
</body>
</html>
