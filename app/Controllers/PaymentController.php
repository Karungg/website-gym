<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use Dompdf\Dompdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;

class PaymentController extends BaseController
{
    protected $db;
    protected $membership;

    protected $helpers = ['form'];

    public function __construct()
    {
        $this->membership = new \App\Models\Membership();
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $payments = $this->db->table('payments')
            ->select('*')->join('memberships', 'payments.id_membership = memberships.id_membership')
            ->join('paket', 'memberships.id_paket = paket.id_paket')
            ->get()->getResultArray();

        return view('payments/index', [
            'payments' => $payments
        ]);
    }

    public function create($id)
    {
        $membership = $this->db->table('memberships')
            ->select('memberships.id_membership, memberships.id_paket,
            memberships.nama_lengkap, memberships.status, paket.harga')
            ->join('paket', 'memberships.id_paket = paket.id_paket')
            ->where('memberships.id_membership', $id)->get()
            ->getResultArray();

        return view('payments/create', [
            'membership' => $membership
        ]);
    }

    public function store()
    {
        if (!$this->request->is('post')) {
            return redirect()->back();
        }

        if (!$this->validate([
            'metode_pembayaran' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Metode Pembayaran harus diisi.',
                ]
            ],
        ])) {
            return redirect()->back()->withInput();
        }

        $this->membership->update(['id_membership' => $this->request->getPost('id_membership')], [
            'status' => 'aktif'
        ]);

        $this->db->table('payments')->insert([
            'tgl_bayar' => $this->request->getPost('tgl_bayar'),
            'keterangan' => $this->request->getPost('keterangan'),
            'metode_pembayaran' => $this->request->getPost('metode_pembayaran'),
            'total' => str_replace(',', '', $this->request->getPost('total')),
            'id_membership' => $this->request->getPost('id_membership')
        ]);

        return redirect()->to(site_url('admin/payments'))->with('success', 'Tambah data pembayaran berhasil.');
    }

    public function exportPdf()
    {
        $payments = $this->db->table('payments')
            ->select('*')->join('memberships', 'payments.id_membership = memberships.id_membership')
            ->join('paket', 'memberships.id_paket = paket.id_paket')
            ->get()->getResultArray();

        $filename = date('y-m-d') . '-pembayaran';
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('payments/export_pdf', [
            'payments' => $payments
        ]));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream($filename);
    }

    public function exportExcel()
    {
        $payments = $this->db->table('payments')
            ->select('*')->join('memberships', 'payments.id_membership = memberships.id_membership')
            ->join('paket', 'memberships.id_paket = paket.id_paket')
            ->get()->getResultArray();

        $spreadsheet = new Spreadsheet();
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Nama Lengkap')
            ->setCellValue('B1', 'Nama Paket')
            ->setCellValue('C1', 'Tanggal Bayar')
            ->setCellValue('D1', 'Metode Pembayaran')
            ->setCellValue('E1', 'Keterangan')
            ->setCellValue('F1', 'Total');

        $column = 2;
        foreach ($payments as $data) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $column, $data['nama_lengkap'])
                ->setCellValue('B' . $column, $data['nama_paket'])
                ->setCellValue('C' . $column, $data['tgl_bayar'])
                ->setCellValue('D' . $column, $data['metode_pembayaran'])
                ->setCellValue('E' . $column, $data['keterangan'])
                ->setCellValue('F' . $column, $data['total']);
            $column++;
        }
        $writer = new Xls($spreadsheet);
        $fileName = date('d-m-y') . '-pembayaran';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $fileName . '.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}
