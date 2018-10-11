
<?php
class ImportExcel{
  private $excelFile;
  private $out;
  private $path='Excel/';
  public function __construct($file){
    $this->excelFile=$this->path.$file;
    $objReader = PHPExcel_IOFactory::createReader('Excel2007');
    $objPHPExcel = $objReader->load($this->excelFile);
    $i=0;
    foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
        $this->out[$i] = $worksheet->toArray();
        $i++;
    }
  }
  public function debug($object){
    echo '<pre><meta charset="UTF-8"/>';
    print_r($object);
    echo '</pre>';
  }
  public function getOut(){
    return $this->out[0];
  }
}
