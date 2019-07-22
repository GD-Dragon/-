<?php
namespace app\admin\controller;
use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use Request;
use Db;
class Order extends Common
{

     public function list()
     {
      return $this->fetch();
    }
    public function show()
    {
      $arr=Db::query("select * from `order`");
      $json=['code'=>'0','status'=>'ok','data'=>$arr];
      return json($json);
    }
    public function test()
    {
          // require_once __DIR__ . '/../../src/Bootstrap.php';
      $helper = new Sample();
      if ($helper->isCli()) {
        $helper->log('This example should only be run from a Web Browser' . PHP_EOL);
        return;
      }
            // Create new Spreadsheet object
        $spreadsheet = new Spreadsheet();
            // Set document properties
        $spreadsheet->getProperties()->setCreator('Maarten Balliauw')
        ->setLastModifiedBy('Maarten Balliauw')
        ->setTitle('Office 2007 XLSX Test Document')
        ->setSubject('Office 2007 XLSX Test Document')
        ->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
        ->setKeywords('office 2007 openxml php')
        ->setCategory('Test result file');
        $arr=Db::query("select * from `order`");
            // Add some data
        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A1', 'id')
        ->setCellValue('B1', 'order_number')
        ->setCellValue('C1', 'order_time')
        ->setCellValue('D1', 'consignee')
        ->setCellValue('E1', 'total_amount')
        ->setCellValue('F1', 'amount_payable')
        ->setCellValue('G1', 'status');
        foreach ($arr as $key => $value) {
          $i=$key+2;
          $spreadsheet->setActiveSheetIndex(0)
          ->setCellValue('A'.$i, $value['id'])
          ->setCellValue('B'.$i, $value['order_number'])
          ->setCellValue('C'.$i, $value['order_time'])
          ->setCellValue('D'.$i, $value['consignee'])
          ->setCellValue('E'.$i, $value['total_amount'])
          ->setCellValue('F'.$i, $value['amount_payable'])
          ->setCellValue('G'.$i, $value['status']);
        }
            // Miscellaneous glyphs, UTF-8
            // Rename worksheet
        $spreadsheet->getActiveSheet()->setTitle('Simple');
            // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $spreadsheet->setActiveSheetIndex(0);
            // Redirect output to a client’s web browser (Ods)
        header('Content-Type: application/vnd.oasis.opendocument.spreadsheet');
        header('Content-Disposition: attachment;filename="订单文件.xlsx"');
        header('Cache-Control: max-age=0');
            // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');
            // If you're serving to IE over SSL, then the following may be needed
            header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
            header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
            header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
            header('Pragma: ./excel'); // HTTP/1.0
            $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
            $writer->save('php://output');
            exit;
          }

          public function test2()
          {  
            $data=Request::post();


            $helper=new Sample();
              $myfile=request()->file('file');
              $info =$myfile->move('uploads/excel');
              $files=str_replace("\\","/",$info->getSaveName());


                $inputFileName="uploads/excel/".$files;
                $helper->log('Logding file ' . pathinfo($inputFileName,PATHINFO_BASENAME) . 'using IOFactory to identify the fromat');
                $spreadsheet=IOFactory::load($inputFileName);
                $sheetData=$spreadsheet->getActiveSheet()->toArray(null,true,true,true);
                var_dump($sheetData);
                foreach ($sheetData as $key => $value) {
                     $data=['order_number'=>$value['B'],'order_time'=>$value['C'],'consignee'=>$value['D'],'total_amount'=>$value['E'],'amount_payable'=>$value['F'],'status'=>$value['G']];
                     Db::name('order')->insert($data);
                }
                  $json=['code'=>'0','status'=>'ok','data'=>'上传成功'];
                  return json($json);
               
          }
  }