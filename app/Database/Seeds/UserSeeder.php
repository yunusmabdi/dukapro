<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('users')->insert([
            'name'       => 'Administrator',
            'email'      => 'admin@nexuserp.test',
            'password'   => password_hash('password', PASSWORD_DEFAULT),
            'role'       => 'Administrator',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}