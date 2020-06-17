<?php

namespace App\Http\Controllers;

use App\Dish;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function download(){
        $dishes = Dish::all();

        $fileName = 'Gouden_Draak_Menu.pdf';
        $mpdf = new \Mpdf\Mpdf([
            'margin_left' => 10,
            'margin_right' => 10,
            'margin_top' => 15,
            'margin_bottom' => 20,
            'margin_header' => 10,
            'margin_footer' => 10
        ]);

        $html = \View::make('pdf.index')->with('dishes', $dishes);
        $html = $html->render();

        $mpdf->SetHeader('Hoofdstuk 1|Gerechten lijst|{PAGENO}');
        $mpdf->SetFooter('&copy; Copyright 2020, De Gouden Draak');
        $mpdf->useSubstitutions = false;
        $mpdf->simpleTables = true;

        $mpdf->WriteHTML($html);
        $mpdf->Output($fileName, 'D');
    }

}
