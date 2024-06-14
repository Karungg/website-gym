<?php

namespace App\Controllers;

class Home extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index(): string
    {
        return view('home');
    }

    public function membership()
    {
        $membership = $this->db->table('memberships')
            ->select('*')->join('paket', 'memberships.id_paket = paket.id_paket')
            ->where('memberships.id_user', user_id())
            ->get()->getResultArray();

        return view('my_membership', [
            'membership' => $membership
        ]);
    }
}
