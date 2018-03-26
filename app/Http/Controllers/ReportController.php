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
        $this::Cell(0,10,'Prepared By: '.session()->get('name'),0,0,'L');
    }
}


class ReportController extends Controller
{
    public function index(){
    	return view('report');
    } 
    public function printPDF(Request $request,$from,$to,$reportName){
    	// W8 Mar
    	// $parkinfo = ParkInfo::all();
    	// return $parkinfo;
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


        $pdf->Output();
        exit;
    }
}
