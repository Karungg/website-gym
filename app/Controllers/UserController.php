<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use Dompdf\Dompdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;

class UserController extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        return view('users/index', [
            'users' => $this->db->query("SELECT * FROM users")->getResultArray()
        ]);
    }

    public function exportPdf()
    {
        $filename = date('y-m-d') . '-user';
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('users/export_pdf', [
            'users' => $this->db->query("SELECT * FROM users")->getResultArray()
        ]));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream($filename);
    }

    public function exportExcel()
    {
        $users = $this->db->query("SELECT * FROM users")->getResultArray();

        $spreadsheet = new Spreadsheet();
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Email')
            ->setCellValue('B1', 'Username')
            ->setCellValue('C1', 'Created At');

        $column = 2;
        foreach ($users as $data) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $column, $data['email'])
                ->setCellValue('B' . $column, $data['username'])
                ->setCellValue('C' . $column, $data['created_at']);
            $column++;
        }
        $writer = new Xls($spreadsheet);
        $fileName = date('d-m-y') . '-user';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $fileName . '.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}
