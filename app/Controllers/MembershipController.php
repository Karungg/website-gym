<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class MembershipController extends BaseController
{
    protected $membershipModel;

    public function __construct()
    {
        $this->membershipModel = new \App\Models\Membership();
    }

    public function index()
    {
        return view('memberships/index', [
            'memberships' => $this->membershipModel->findAll()
        ]);
    }

    public function edit($id)
    {
        $package = $this->membershipModel->find($id);

        return view('memberships/edit', [
            'package' => $package
        ]);
    }

    public function update()
    {
        helper(['form', 'url']);

        $validation = $this->validate([
            'nama_paket' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Nama Paket harus diisi'
                ]
            ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Deskripsi harus diisi'
                ]
            ],
            'durasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Durasi harus diisi'
                ]
            ],
            'harga' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Harga harus diisi'
                ]
            ]
        ]);

        if (!$validation) {
            return view('memberships/create', [
                'validation' => $this->validator
            ]);
        } else {
            $this->membershipModel->update($this->request->getPost('id_paket'), [
                'nama_paket' => $this->request->getPost('nama_paket'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'durasi' => $this->request->getPost('durasi'),
                'harga' => $this->request->getPost('harga'),
            ]);

            session()->setFlashdata('success', 'Ubah data paket berhasil.');

            return redirect()->to(base_url('admin/memberships'));
        }
    }

    public function destroy($id)
    {
        $this->membershipModel->delete($id);

        session()->setFlashdata('success', 'Data paket berhasil dihapus.');

        return redirect()->to(base_url('admin/memberships'));
    }
}
