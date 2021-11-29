<?php

namespace SkylarkSoft\GoRMG\Lab\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SkylarkSoft\GoRMG\Lab\Exports\DailyLogBookReportExport;
use SkylarkSoft\GoRMG\Lab\Models\LogBook;
use PDF, Excel;
use SkylarkSoft\GoRMG\Skeleton\Traits\CustomPdfHeaderFooter;

class ReportController extends Controller
{
    use CustomPdfHeaderFooter;

    public function dailyLogBookReport(Request $request)
    {
        $date = $request->date ?? date('Y-m-d');

        $reports = $this->getDailyLogBookReportData($date);

        return view('lab::reports.daily_log_book_report', [
            'date' => $date,
            'reports' => $reports,
        ]);
    }

    private function getDailyLogBookReportData($date)
    {
        return LogBook::whereDate('created_at', $date)->orderBy('id', 'desc')->get();
    }

    public function dailyLogBookReportDownload(Request $request)
    {
        $type = $request->type;
        $date = $request->date ?? date('Y-m-d');
        $reports = $this->getDailyLogBookReportData($date);
        $data['reports'] = $reports;
        if ($type == 'pdf') {
            $view = view('lab::reports.downloads.pdf.daily_log_book_report_download', $data);
            $html_content = $view->render();

            // Custom Header
            $this->PdfHeader('DAILY LOG BOOK REPORT');
            // Custom Footer
            $this->PdfFooter();

            PDF::SetMargins(7, 22, 7);
            PDF::SetFontSubsetting(false);
            PDF::SetFont('times', '', 7);
            PDF::SetAutoPageBreak(TRUE, 11);
            PDF::AddPage('L', 'A4');
            PDF::writeHTML($html_content, true, true, true, true, 'C');

            PDF::Output('daily_log_book_report_'.date('d_m_Y', strtotime($date)).'.pdf');
            return true;
        } else {
            return Excel::download(new DailyLogBookReportExport($data), 'daily_log_book_report_'.date('d_m_Y', strtotime($date)).'.xlsx');
        }
    }
}