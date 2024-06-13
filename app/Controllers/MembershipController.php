<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

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
        return view('memberships/index', [
            'memberships' => $this->membership->findAll()
        ]);
    }

    public function show($id)
    {
        return view('memberships/show', [
            'membership' => $this->membership->find($id)
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
}
