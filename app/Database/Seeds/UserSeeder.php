<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('users')->insertBatch([

            // [
            //     'name'       => 'Administrator',
            //     'email'      => 'admin@dukapro.test',
            //     'password'   => password_hash('password', PASSWORD_DEFAULT),
            //     'role'       => 'Administrator',
            //     'created_at' => date('Y-m-d H:i:s'),
            //     'updated_at' => date('Y-m-d H:i:s'),
            // ],

            [
                'name'       => 'Cashier',
                'email'      => 'cashier@dukapro.test',
                'password'   => password_hash('cashier123', PASSWORD_DEFAULT),
                'role'       => 'Cashier',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

        ]);
    }
}