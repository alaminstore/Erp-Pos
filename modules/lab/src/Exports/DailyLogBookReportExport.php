<?php

namespace SkylarkSoft\GoRMG\Lab\Exports;


use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeExport;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use SkylarkSoft\GoRMG\Skeleton\Traits\CustomExcelHeaderFooter;

class DailyLogBookReportExport implements WithTitle, ShouldAutoSize, FromView, ShouldQueue, WithEvents
{
    use Exportable, CustomExcelHeaderFooter;

    private $result_data;

    public function __construct($data)
    {
        $this->result_data = $data;
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return 'DAILY LOG BOOK REPORT';
    }


    /**
     * @return View
     */
    public function view(): View
    {
        $data = $this->result_data;
        return view('lab::reports.downloads.excel.daily_log_book_report_download', $data);
    }

    /**
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            BeforeExport::class => function (BeforeExport $event) {
                $event->writer->setCreator('Skylark Soft Limited');
            },
            AfterSheet::class => function (AfterSheet $event) {
                $cell_array = range('A', 'Z');
                $cell_array[26] = 'AA';
                $cell_array[27] = 'AB';
                $head_array_number = [1, 2, 3, 4, 5];
                $highestRowNumber = $event->sheet->getDelegate()->getHighestRow();
                $footer_array_number = [$highestRowNumber];
                $this->excelHeaderFooter($event, $cell_array, $head_array_number, $footer_array_number, false);

                // Custom Style
                $event->sheet->getDelegate()->getStyle($cell_array[0].$head_array_number[0].':'.$cell_array[0].($footer_array_number[count($footer_array_number) - 1]))->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $event->sheet->getDelegate()->getStyle($cell_array[0].$head_array_number[0].':'.$cell_array[0].($footer_array_number[count($footer_array_number) - 1]))->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
            }
        ];
    }
}