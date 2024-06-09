<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class DashboardController extends BaseController
{
    public function index()
    {
        $db = db_connect();
        $memberships = $db->table('memberships')->join('paket', 'memberships.id_paket = paket.id_paket')->orderBy('memberships.created_at', 'desc')->limit(5)->get();

        return view('dashboard/index', [
            'total_users' => $db->table('users')->countAll(),
            'total_packages' => $db->table('paket')->countAll(),
            'total_memberships' => $db->table('memberships')->countAll(),
            'recent_memberships' => $memberships
        ]);
    }
}
