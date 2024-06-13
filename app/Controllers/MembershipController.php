<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use Dompdf\Dompdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;

class MembershipController extends BaseController
{
    protected $membership;

    protected $helpers = ['form', 'text'];

    public function __construct()
    {
        $this->membership = new \App\Models\Membership();
    }

    public function index()
    {
        $db = \Config\Database::connect();
        $memberships = $db->table('memberships')
            ->select('*')->join('paket', 'memberships.id_paket = paket.id_paket')
            ->get()->getResultArray();
        return view('memberships/index', [
            'memberships' => $memberships
        ]);
    }

    public function show($id)
    {
        $db = \Config\Database::connect();
        $membership = $db->table('memberships')
            ->select('*')->join('paket', 'memberships.id_paket = paket.id_paket')
            ->where('memberships.id_membership', $id)
            ->get()->getResultArray();
        return view('memberships/show', [
            'membership' => $membership
        ]);
    }

    public function edit($id)
    {
        $membership = $this->membership->find($id);

        return view('memberships/edit', [
            'membership' => $membership
        ]);
    }

    public function update()
    {
        if (!$this->request->is('put')) {
            return redirect()->to(site_url('admin/memberships'));
        }

        if (!$this->validate([
            'nama_lengkap' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Nama Lengkap harus diisi.',
                ]
            ],
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Email harus diisi.'
                ]
            ],
            'no_telp' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Kolom Nomor Telepon harus diisi.',
                    'numeric' => 'Kolom Nomor Telepon hanya boleh diisi angka.'
                ]
            ],
            'jenis_kelamin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Jenis Kelamin harus diisi.',
                ]
            ],
            'tgl_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Tanggal Lahir harus diisi.',
                ]
            ],
            'no_ktp' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Kolom Nomor KTP harus diisi.',
                    'numeric' => 'Kolom Nomor KTP hanya boleh diisi angka.',
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Alamat harus diisi.',
                ]
            ],
            'foto_diri' => [
                'rules' => 'uploaded[foto_diri]|mime_in[foto_diri,image/jpg,image/jpeg,image/png]|max_size[foto_diri,4096]'
            ],
            'foto_ktp' => [
                'rules' => 'uploaded[foto_ktp]|mime_in[foto_ktp,image/jpg,image/jpeg,image/png]|max_size[foto_ktp,4096]'
            ],
        ])) {
            return redirect()->back()->withInput();
        }

        $data = $this->membership->find($this->request->getPost('id_membership'));
        @unlink('../public/assets/img/foto/' . $data['foto_diri']);
        @unlink('../public/assets/img/ktp/' . $data['foto_ktp']);

        $foto_diri = $this->request->getFile('foto_diri');
        $foto_ktp = $this->request->getFile('foto_ktp');
        $foto_diri->move(WRITEPATH . '../public/assets/img/foto/');
        $foto_ktp->move(WRITEPATH . '../public/assets/img/ktp/');

        $this->membership->update(['id_membership' => $this->request->getPost('id_membership')], [
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'email' => $this->request->getPost('email'),
            'no_telp' => $this->request->getPost('no_telp'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'tgl_lahir' => $this->request->getPost('tgl_lahir'),
            'no_ktp' => $this->request->getPost('no_ktp'),
            'alamat' => $this->request->getPost('alamat'),
            'foto_diri' => $foto_diri->getName(),
            'foto_ktp' => $foto_ktp->getName(),
        ]);

        return redirect()->to(site_url('admin/memberships'))->with('success', 'Ubah data membership berhasil.');
    }

    public function destroy($id)
    {
        $this->membership->delete($id);

        session()->setFlashdata('success', 'Data membership berhasil dihapus.');

        return redirect()->to(base_url('admin/memberships'));
    }

    public function exportPdf()
    {
        $filename = date('y-m-d') . '-membership';
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('memberships/export_pdf', [
            'memberships' => $this->membership->findAll()
        ]));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream($filename);
    }

    public function exportExcel()
    {
        $memberships = $this->membership->findAll();

        $spreadsheet = new Spreadsheet();
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Nama Lengkap')
            ->setCellValue('B1', 'Email')
            ->setCellValue('C1', 'Nomor Telepon')
            ->setCellValue('D1', 'Jenis Kelamin')
            ->setCellValue('E1', 'Tanggal Lahir')
            ->setCellValue('F1', 'Nomor KTP')
            ->setCellValue('G1', 'Alamat')
            ->setCellValue('H1', 'Status')
            ->setCellValue('I1', 'Nama Paket');

        $column = 2;
        foreach ($memberships as $data) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $column, $data['nama_lengkap'])
                ->setCellValue('B' . $column, $data['email'])
                ->setCellValue('C' . $column, $data['no_telp'])
                ->setCellValue('D' . $column, $data['jenis_kelamin'])
                ->setCellValue('E' . $column, $data['tgl_lahir'])
                ->setCellValue('F' . $column, $data['no_ktp'])
                ->setCellValue('G' . $column, $data['alamat'])
                ->setCellValue('H' . $column, $data['status'])
                ->setCellValue('I' . $column, $data['id_paket']);
            $column++;
        }
        $writer = new Xls($spreadsheet);
        $fileName = date('d-m-y') . '-membership';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $fileName . '.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}
