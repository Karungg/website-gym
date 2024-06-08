<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'email' => 'admin@gmail.com',
            'username' => 'admin',
            'password_hash' => password_hash('password', PASSWORD_DEFAULT),
            'active' => 1
        ];

        // Using Query Builder
        $this->db->table('users')->insert($data);
    }
}
