<?php

namespace SkylarkSoft\GoRMG\Skeleton\Traits;

use PDF;

trait CustomPdfHeaderFooter
{

    /**
     * Page header
     *
     * @param $report_heading
     * @param string $orientation
     */
    public function PdfHeader($report_heading, $orientation = '')
    {
        // Custom Header
        PDF::setHeaderCallback(function ($pdf) use ($report_heading, $orientation) {
            // LOGO Path
            /*$logo = 'saturn_logo.png';
            if (factoryId() == 4) {
                $logo = 'jaroms_logo.png';
            }
            $image_file = asset('flatkit/assets/images/' . $logo);*/
            // Logo
            if ($orientation == 'L') {
                //$pdf->Image($image_file, 127, 2, 42, 7, 'PNG', '', 'M', false, 300, '', false, false, 0, false, false, false);
                // Set font
                $pdf->SetFont('times', 'B', 10);
                $pdf->Cell(0, 9, "Tropical Knitex Ltd.", 0, false, 'C', 0, '', 0, false, 'T', 'M');
                // Add Line Break
                $pdf->Ln(5);
                $pdf->SetFont('times', 'B', 12);
                $pdf->Cell(0, 9, $report_heading, 0, false, 'C', 0, '', 0, false, 'T', 'M');
            } else {
                //$pdf->Image($image_file, 83, 2, 40, 7, 'PNG', '', 'M', false, 300, '', false, false, 0, false, false, false);
                // Set font
                $pdf->SetFont('times', 'B', 8);
                $pdf->Cell(0, 9, "Tropical Knitex Ltd.", 0, false, 'C', 0, '', 0, false, 'T', 'M');
                // Add Line Break
                $pdf->Ln(5);
                $pdf->SetFont('times', 'B', 10);
                $pdf->Cell(0, 9, $report_heading, 0, false, 'C', 0, '', 0, false, 'T', 'M');
            }

        });
    }

    /**
     * Page footer
     */
    public function PdfFooter()
    {
        // Custom Footer
        PDF::setFooterCallback(function ($pdf) {

            // Position at 10 mm from bottom
            $pdf->SetY(-10);
            // Set font
            $pdf->SetFont('times', '', 8);
            // Footer
            $pdf->Cell(0, 10, '© Copyright - PROTRACKER. Produced by Skylark Soft Limited.', 0, false, 'C', 0, '', 0, false, 'T', 'M');

        });
    }
}