<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

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
}
