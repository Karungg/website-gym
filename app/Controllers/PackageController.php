<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Package;
use CodeIgniter\HTTP\ResponseInterface;
use Dompdf\Dompdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;

class PackageController extends BaseController
{
    protected $package;

    protected $helpers = ['form', 'text'];

    public function __construct()
    {
        $this->package = new \App\Models\Package();
    }

    public function index()
    {
        return view('packages/index', [
            'packages' => $this->package->findAll()
        ]);
    }

    public function create()
    {
        return view('packages/create');
    }

    public function store()
    {
        if (!$this->request->is('post')) {
            return redirect()->to(site_url('admin/packages/create'));
        }

        if (!$this->validate([
            'nama_paket' => [
                'rules' => 'required|is_unique[paket.nama_paket]',
                'errors' => [
                    'required' => 'Kolom Nama Paket harus diisi.',
                    'is_unique' => 'Nama paket sudah ada.'
                ]
            ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Deskripsi harus diisi.'
                ]
            ],
            'durasi' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Kolom Durasi harus diisi.',
                    'numeric' => 'Kolom durasi hanya boleh diisi angka.'
                ]
            ],
            'harga' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Kolom Harga harus diisi.',
                    'numeric' => 'Kolom Harga hanya boleh diisi angka.'
                ]
            ]
        ])) {
            return redirect()->back()->withInput();
        }

        $this->package->insert([
            'nama_paket' => $this->request->getPost('nama_paket'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'durasi' => $this->request->getPost('durasi'),
            'harga' => $this->request->getPost('harga'),
        ]);

        return redirect()->to(site_url('admin/packages'))->with('success', 'Tambah data paket berhasil.');
    }

    public function edit($id)
    {
        $package = $this->package->find($id);

        return view('packages/edit', [
            'package' => $package
        ]);
    }

    public function update()
    {
        if (!$this->request->is('put')) {
            return redirect()->to(site_url('admin/packages'));
        }

        if (!$this->validate([
            'nama_paket' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Nama Paket harus diisi.',
                ]
            ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Deskripsi harus diisi.'
                ]
            ],
            'durasi' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Kolom Durasi harus diisi.',
                    'numeric' => 'Kolom durasi hanya boleh diisi angka.'
                ]
            ],
            'harga' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Kolom Harga harus diisi.',
                    'numeric' => 'Kolom Harga hanya boleh diisi angka.'
                ]
            ]
        ])) {
            return redirect()->back()->withInput();
        }

        $this->package->update(['id_paket' => $this->request->getPost('id_paket')], [
            'nama_paket' => $this->request->getPost('nama_paket'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'durasi' => $this->request->getPost('durasi'),
            'harga' => $this->request->getPost('harga'),
        ]);

        return redirect()->to(site_url('admin/packages'))->with('success', 'Ubah data paket berhasil.');
    }

    public function destroy($id)
    {
        $this->package->delete($id);

        session()->setFlashdata('success', 'Data paket berhasil dihapus.');

        return redirect()->to(base_url('admin/packages'));
    }

    public function exportPdf()
    {
        $filename = date('y-m-d') . '-paket';
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('packages/export_pdf', [
            'packages' => $this->package->findAll()
        ]));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream($filename);
    }

    public function exportExcel()
    {
        $packages = $this->package->findAll();

        $spreadsheet = new Spreadsheet();
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Nama Paket')
            ->setCellValue('B1', 'Deskripsi')
            ->setCellValue('C1', 'Durasi')
            ->setCellValue('D1', 'Harga');

        $column = 2;
        foreach ($packages as $data) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $column, $data['nama_paket'])
                ->setCellValue('B' . $column, $data['deskripsi'])
                ->setCellValue('C' . $column, $data['durasi'])
                ->setCellValue('D' . $column, $data['harga']);
            $column++;
        }
        $writer = new Xls($spreadsheet);
        $fileName = date('d-m-y') . '-paket';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $fileName . '.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}
