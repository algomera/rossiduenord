<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;

use App\Practice;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class CondominiController extends Controller
{
    private $practice;
    private $applicant;
    private $condomini;
    private $spreadsheet;

    public function generateSpreadsheet($practice) {
        // Set datas from practice
        $this->practice = $practice;
        $this->applicant = $this->practice->applicant;
        $this->condomini = $this->practice->condomini;

        // Create Spreadsheet
        $this->spreadsheet = new Spreadsheet();

        // Create Sheet
        $main = $this->spreadsheet->createSheet(0)->setTitle('Nome Richiedente');
        $ceilings = $this->spreadsheet->createSheet(1)->setTitle('Calcolo massimali');
        $this->spreadsheet->setActiveSheetIndex(0);

        // Remove default Sheet
        $this->spreadsheet->removeSheetByIndex(2);

        // MAIN SHEET
        $this->mainGenerateCells($main);
        $this->mainApplyStylesToCells($main);
        $this->mainSetColRowDimension();

        // CEILING SHEET
        $this->ceilingsGenerateCells($ceilings);
        $this->ceilingsSetColRowDimension();


        // Redirect output to client browser and setup file name, then auto download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="condomini-' . now() . '.xlsx"');
        header('Cache-Control: max-age=0');
        $writer = IOFactory::createWriter($this->spreadsheet, 'Xlsx');
        $writer->save('php://output');
    }

    private function mainGenerateCells($sheet) {
        $sheet->setCellValue('A1', 'TABELLA RIEPILOGATIVA');
        $sheet->setCellValue('A3', 'SOGGETTO/I RICHIEDENTE/I');
        $sheet->setCellValue('A4', $this->applicant->name . ' ' . $this->applicant->lastName);
        $sheet->mergeCells('A4:B4');
        $sheet->setCellValue('C4', $this->practice->address . ' ' . $this->practice->civic . ' ' . $this->practice->common . ' ' . $this->practice->province);
        $sheet->mergeCells('C4:P4');
        $sheet->setCellValue('A6', 'INQUADRAMENTO INTERVENTI');
        $sheet->mergeCells('A6:B6');
        $sheet->setCellValueExplicit('C6', "==>", DataType::TYPE_STRING);
        $sheet->setCellValue('D6', 'Condominio');
        $sheet->setCellValue('E6', '1');
        $sheet->setCellValue('D7', 'N. Unità');
        $sheet->setCellValue('E7', $this->condomini->count());
        $sheet->setCellValue('D8', 'Colonnine');
        $sheet->setCellValue('E8', '0');
        $sheet->setCellValue('G8', 'Massimale di spesa IVA inclusa');
        $sheet->mergeCells('G8:G10');
        $sheet->setCellValue('H8', 'PROGETTO');
        $sheet->mergeCells('H8:P8');
        $sheet->setCellValue('H9', 'Lavori');
        $sheet->mergeCells('H9:H10');
        $sheet->setCellValue('I9', 'Progettazione');
        $sheet->mergeCells('I9:J9');
        $sheet->setCellValue('I10', 20/100);
        $sheet->getStyle('I10')->getNumberFormat()->setFormatCode('0.0000%');
        $sheet->setCellValue('J10', 2.7366/100);
        $sheet->getStyle('J10')->getNumberFormat()->setFormatCode('0.0000%');
        $sheet->setCellValue('K9', 'Prime Hub');
        $sheet->setCellValue('K10', 3.5/100);
        $sheet->getStyle('K10')->getNumberFormat()->setFormatCode('0.0000%');
        $sheet->setCellValue('L9', 'Asseverazione');
        $sheet->mergeCells('L9:M9');
        $sheet->setCellValue('L10', 2.4/100);
        $sheet->getStyle('L10')->getNumberFormat()->setFormatCode('0.0000%');
        $sheet->setCellValue('M10', 3.1595/100);
        $sheet->getStyle('M10')->getNumberFormat()->setFormatCode('0.0000%');
        $sheet->setCellValue('N9', 'IVA 10%');
        $sheet->mergeCells('N9:N10');
        $sheet->setCellValue('O9', 'IVA 22%');
        $sheet->mergeCells('O9:O10');
        $sheet->setCellValue('P9', 'Sommano');
        $sheet->mergeCells('P9:P10');

        $sheet->mergeCells('A11:A12');
        $sheet->setCellValue('B11', 'Trainanti');
        $sheet->mergeCells('B11:B12');
        $sheet->setCellValue('C11', 'Isolamento');
        $sheet->mergeCells('C11:E11');
        $sheet->setCellValue('C12', 'Sostituzione Impianti');
        $sheet->mergeCells('C12:E12');
//        $sheet->setCellValue('F11', NULL);
        $sheet->mergeCells('A13:A16');
        $sheet->setCellValue('B13', 'Parti Comuni');
        $sheet->mergeCells('B13:B16');
        $sheet->setCellValue('C13', 'Serramenti');
        $sheet->mergeCells('C13:E13');
        $sheet->setCellValue('C14', 'Fotovoltaico');
        $sheet->mergeCells('C14:E14');
        $sheet->setCellValue('C15', 'Sist. Accumulo');
        $sheet->mergeCells('C15:E15');
        $sheet->setCellValue('C16', 'Infr. ricarica');
        $sheet->mergeCells('C16:E16');

        // Loop condomini
        foreach ($this->condomini as $i => $condomino) {
            $sheet->setCellValue('A' . ($this->spreadsheet->getActiveSheet()->getHighestRow() + 1), $i + 1);
            $sheet->setCellValue('B' . ($this->spreadsheet->getActiveSheet()->getHighestRow()), $condomino->name . ' ' . $condomino->surname);
            $sheet->mergeCells('A' . ($this->spreadsheet->getActiveSheet()->getHighestRow()) . ':A' . ($this->spreadsheet->getActiveSheet()->getHighestRow() + 2));
            $sheet->mergeCells('B' . ($this->spreadsheet->getActiveSheet()->getHighestRow()) . ':B' . ($this->spreadsheet->getActiveSheet()->getHighestRow() + 2));
            $sheet->setCellValue('C' . ($this->spreadsheet->getActiveSheet()->getHighestRow()), 'Serramenti');
            $sheet->mergeCells('C'. ($this->spreadsheet->getActiveSheet()->getHighestRow()) . ':E' . ($this->spreadsheet->getActiveSheet()->getHighestRow()));
            $sheet->setCellValue('C' . ($this->spreadsheet->getActiveSheet()->getHighestRow() + 1), 'Schermature');
            $sheet->mergeCells('C'. ($this->spreadsheet->getActiveSheet()->getHighestRow()) . ':E' . ($this->spreadsheet->getActiveSheet()->getHighestRow()));
            $sheet->setCellValue('C' . ($this->spreadsheet->getActiveSheet()->getHighestRow() + 1), 'BACS');
            $sheet->mergeCells('C'. ($this->spreadsheet->getActiveSheet()->getHighestRow()) . ':E' . ($this->spreadsheet->getActiveSheet()->getHighestRow()));
        }
    }
    private function mainApplyStylesToCells($sheet) {
        $sheet->getStyle('A:Z')->applyFromArray([
            'alignment' => [
                'vertical' => Alignment::VERTICAL_CENTER
            ],
        ]);

        // Set single cell style
        $sheet->getStyle('A1')->applyFromArray([
            'font' => [
                'bold' => true
            ],
        ]);
        $sheet->getStyle('A4')->applyFromArray([
            'font' => [
                'bold' => true
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER
            ],
            'borders' => [
                'outline' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
        ]);
        $sheet->getStyle('B4')->applyFromArray([
            'font' => [
                'bold' => true
            ],
            'borders' => [
                'outline' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
        ]);
        $sheet->getStyle('C4:P4')->applyFromArray([
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER
            ],
            'borders' => [
                'outline' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
        ]);
        $sheet->getStyle('C6')->applyFromArray([
            'font' => [
                'bold' => true,
                'underline' => true,
            ],
        ]);
        $sheet->getStyle('D6:E8')->applyFromArray([
            'font' => [
                'bold' => true,
                'underline' => true,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
        ]);
        $sheet->getStyle('G8:G10')->applyFromArray([
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'color' => [
                    'argb' => 'FFFFFEA6'
                ]
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'wrapText' => true
            ]
        ]);
        $sheet->getStyle('G8:P10')->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'wrapText' => true
            ]
        ]);
        $sheet->getStyle('G8:G' . $this->spreadsheet->getActiveSheet()->getHighestRow())->applyFromArray([
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'color' => [
                    'argb' => 'FFFFFEA6'
                ]
            ],
        ]);
        $sheet->getStyle('H8:P8')->applyFromArray([
            'font' => [
                'bold' => true,
            ],
        ]);
        $sheet->getStyle('I10:M10')->applyFromArray([
            'font' => [
                'size' => '9'
            ]
        ]);
        $sheet->getStyle('K10:M10')->applyFromArray([
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'color' => [
                    'argb' => 'FFFFFEA6'
                ]
            ],
        ]);
        $sheet->getStyle('P9:P' . $this->spreadsheet->getActiveSheet()->getHighestRow())->applyFromArray([
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'color' => [
                    'argb' => 'FFB0FBA3'
                ]
            ],
        ]);
        $sheet->getStyle('A11:P' . $this->spreadsheet->getActiveSheet()->getHighestRow())->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
        ]);
        $sheet->getStyle('A11:B' . $this->spreadsheet->getActiveSheet()->getHighestRow())->applyFromArray([
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'color' => [
                    'argb' => 'FFE0BBB9'
                ]
            ],
        ]);
    }

    private function ceilingsGenerateCells($sheet)
    {
        $sheet->setCellValue('A1', 'TRAINANTI');
        $sheet->setCellValue('A2', 'Involucro > 25%');
        $sheet->setCellValue('A3', 'Riscaldamento Centralizzato');
        $sheet->setCellValue('A4', 'Riscaldamento Autonomo');
        $sheet->setCellValue('A5', 'Sismica');
        $sheet->setCellValue('B1', 'Singola');
        $sheet->setCellValue('C1', 'Da 2 a 8');
        $sheet->setCellValue('D1', 'Da 8+');

        $sheet->setCellValue('A9', 'TRAINATI');
        $sheet->setCellValue('A10', 'Coibentazione involucro (compresi serramenti)');
        $sheet->setCellValue('A11', 'Sostituzione impianto riscaldamento autonomo');
        $sheet->setCellValue('A12', 'Schermature Solari');
        $sheet->setCellValue('A13', 'Caldaie a Biomassa');
        $sheet->setCellValue('A14', 'BACS - Sistemi multimediali controllo impianti');
        $sheet->setCellValue('A15', 'Microgeneratori');
        $sheet->setCellValue('A16', 'Impianto Fotovoltaico');
        $sheet->setCellValue('A17', 'Impianto Fotovoltaico ristrutturazione');
        $sheet->setCellValue('A18', 'Accumulo Elettrico');

        $sheet->setCellValue('B19', 'Singola');
        $sheet->setCellValue('C19', 'Da 2 a 8');
        $sheet->setCellValue('D19', 'Da 8+');
        $sheet->setCellValue('A20', 'Colonnina ricarica veicoli elettrici');

        // Fake data for testing - Fake data for testing
        $sheet->setCellValue('B2', 50000);
        $sheet->setCellValue('C2', 40000);
        $sheet->setCellValue('D2', 30000);
        $sheet->setCellValue('C3', 20000);
        $sheet->setCellValue('D3', 15000);
        $sheet->setCellValue('B4', 30000);
        $sheet->setCellValue('B5', 96000);
        $sheet->setCellValue('C5', 96000);
        $sheet->setCellValue('D5', 96000);
        $sheet->getStyle('B2:D5')->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_CURRENCY_EUR_SIMPLE);

        $sheet->setCellValue('B10', 54545.45);
        $sheet->setCellValue('B11', 27272.73);
        $sheet->setCellValue('B12', 54545.45);
        $sheet->setCellValue('B13', 27272.73);
        $sheet->setCellValue('B14', 13636.36);
        $sheet->setCellValue('B15', 90909.09);
        $sheet->setCellValue('B16', 2400);
        $sheet->setCellValue('C16', 'x Kw');
        $sheet->setCellValue('B17', 1600);
        $sheet->setCellValue('C17', 'x Kw');
        $sheet->setCellValue('B18', 1000);
        $sheet->setCellValue('C18', 'x Kw');
        $sheet->getStyle('B10:B18')->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_CURRENCY_EUR_SIMPLE);

        $sheet->setCellValue('B20', 2000);
        $sheet->setCellValue('C20', 1500);
        $sheet->setCellValue('D20', 1200);
        $sheet->getStyle('B20:D20')->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_CURRENCY_EUR_SIMPLE);
    }

    private function mainSetColRowDimension() {
        foreach (range('A', $this->spreadsheet->getActiveSheet()->getHighestColumn()) as $col) {
            $this->spreadsheet->getActiveSheet()->getColumnDimension($col)->setWidth(90, 'px');
        }
        $this->spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(180, 'px');

        foreach (range(1, $this->spreadsheet->getActiveSheet()->getHighestRow()) as $row) {
            $this->spreadsheet->getActiveSheet()->getRowDimension($row)->setRowHeight(20, 'px');
        }
    }
    private function ceilingsSetColRowDimension() {
        foreach (range('A', $this->spreadsheet->getActiveSheet()->getHighestColumn()) as $col) {
            $this->spreadsheet->getActiveSheet()->getColumnDimension($col)->setWidth(90, 'px');
        }
        $this->spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(310, 'px');

        foreach (range(1, $this->spreadsheet->getActiveSheet()->getHighestRow()) as $row) {
            $this->spreadsheet->getActiveSheet()->getRowDimension($row)->setRowHeight(20, 'px');
        }
    }

    public function export(Practice $practice) {
        $this->generateSpreadsheet($practice);
    }
}
