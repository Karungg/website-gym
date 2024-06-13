<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class PaymentController extends BaseController
{
    protected $db;

    protected $helpers = ['form'];

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $payments = $this->db->table('payments')
            ->select('*')->join('memberships', 'payments.id_membership = memberships.id_membership')
            ->get()->getResultArray();

        return view('payments/index', [
            'payments' => $payments
        ]);
    }

    public function create()
    {
        $memberships = $this->db->table('memberships')
            ->select('memberships.id_membership, memberships.id_paket,
            memberships.nama_lengkap, memberships.status, paket.harga')
            ->join('paket', 'memberships.id_paket = paket.id_paket')
            ->where('status', 'pending')->get()
            ->getResultArray();

        return view('payments/create', [
            'memberships' => $memberships
        ]);
    }

    public function store()
    {
    }
}
