<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Anouar\Fpdf\Fpdf as baseFpdf;
use App\ParkInfo;

class PDF extends baseFpdf
{
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this::SetY(-15);
        $this::SetFont('Arial','I',8);
        $this::Cell(0,10,'Date Today: '.date('F j, Y',strtotime('now')),0,0,'L');
        $this::SetY(-20);
        $this::SetFont('Arial','I',8);
        $this::Cell(0,10,'Prepared By: '.session()->get('username'),0,0,'L');
    }
}


class ReportController extends Controller
{
    public function index(){
    	return view('report');
    } 
    public function printPDF(Request $request,$from,$to,$reportName){
    	// W8 Mar
   		$pdf = new PDF();
        $pdf->AddPage();
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();
        $pdf->SetFont('Arial','B',11);
        $pdf->Cell(0,10,'iPark',0,"","C");
        $pdf->Ln();
        $pdf->SetFont('Arial','B',15);
        $pdf->Cell(0,10,$reportName,0,"","C");
        $pdf->Ln();
        $pdf->Ln();
        // Details
        $pdf->Ln();
        $pdf->SetFont('Arial','B',11);
        $pdf->Cell(0,10,"From: ".date('F j, Y - g:ia',strtotime($from)),0,"","L");
        $pdf->Ln();
        $pdf->Cell(0,10,"To: ".date('F j, Y - g:ia',strtotime($to)),0,"","L");
        $pdf->Ln();
        $pdf->Ln();
       
        // get data
        $fr = number_format(date('d',strtotime($from)));
        $t = number_format(date('d',strtotime($to)));
        $parkinfo = ParkInfo::where('created_at', '>=',date('Y-m-d H:i:s',strtotime($from)))->where('created_at', '<=',date('Y-m-d H:i:s',strtotime($to)))->get();
        $arrData = array();
        $totalSales = 0;
        $totalVat = 0;
        $totalCount = 0;
        for($x = $fr; $x<=$t ;$x++){
            $arrData[$x]['count'] = 0;
            $arrData[$x]['sum'] = 0;
            foreach($parkinfo as $park){
                if(number_format(date('d',strtotime($park->created_at))) == $x){
                    $arrData[$x]['date'] = date('Y-m-d',strtotime($park->created_at));
                    $arrData[$x]['count']++;
                    if(empty($arrData[$x]['start'])){
                        $arrData[$x]['start'] = $park->receiptnum;
                    }
                    if(!empty($park->receiptnum)){
                        $arrData[$x]['end'] = $park->receiptnum;
                    }   
                    $arrData[$x]['sum'] += $park->load_consumed;
                }
            }
            $totalSales += $arrData[$x]['sum'];
            $totalCount += $arrData[$x]['count'];
            $arrData[$x]['vat'] = $arrData[$x]['sum'] * 0.12;
            $totalVat += $arrData[$x]['vat'];
        }

        $pdf->SetFillColor(62,83,102);
        $pdf->SetTextColor(255);
    
        // Table Header
        $pdf->SetFont('Arial','B',10);
        $pdf->cell(23,8,'DATE',0,"","C",true);
        $pdf->cell(37,8,'RECEIPT START',0,"","C",true);
        $pdf->cell(37,8,'RECEIPT END',0,"","C",true);
        $pdf->cell(23,8,'COUNT',0,"","C",true);
        $pdf->cell(40,8,'AMOUNT',0,"","R",true);
        $pdf->cell(30,8,'VAT',0,"","R",true);
        $pdf->Ln();

        // Color and font restoration
         $pdf->SetFillColor(214,219,252);
         $pdf->SetTextColor(0);
         $fill = false;
         // Table Content
         foreach($arrData as $data){
            if($data['count'] > 0){
                $pdf->SetFont("Arial","",9); // loop
                $pdf->cell(23,8,$data['date'],0,"","C",$fill);
                $pdf->cell(37,8,$data['start'],0,"","C",$fill);
                $pdf->cell(37,8,$data['end'],0,"","C",$fill);
                $pdf->cell(23,8,$data['count'],0,"","C",$fill);
                $pdf->cell(40,8,$data['sum'].'.00',0,"","R",$fill);
                $pdf->cell(30,8,$data['vat'].'.00',0,"","R",$fill);
                $pdf->Ln();
                $fill = !$fill;
            }
        }

        $pdf->SetFont("Arial","B",9); // loop
        $pdf->cell(23,8,'TOTAL',0,"","C",$fill);
        $pdf->cell(37,8,'',0,"","C",$fill);
        $pdf->cell(37,8,'',0,"","C",$fill);
        $pdf->cell(23,8,$totalCount,0,"","C",$fill);
        $pdf->cell(40,8,$totalSales.'.00',0,"","R",$fill);
        $pdf->cell(30,8,$totalVat.'.00',0,"","R",$fill);

        $pdf->Output();
        exit;
    }

    public function search(Request $request){
        $parkinfo = ParkInfo::where('created_at', '>=',date('Y-m-d H:i:s',strtotime($request['from'])))->where('created_at', '<=',date('Y-m-d H:i:s',strtotime($request['to'])))->get();
        if($request->ajax()){
            return $parkinfo;
        }
    }
}
