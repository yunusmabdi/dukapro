<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class CustomerSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();

        $customers = [];

        for ($i = 1; $i <= 50; $i++) {

            $customers[] = [
                'name'       => $faker->name(),
                'phone'      => '07' . str_pad(rand(10000000, 99999999), 8, '0', STR_PAD_LEFT),
                'email'      => $faker->unique()->safeEmail(),
                'address'    => $faker->address(),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
        }

        $this->db->table('customers')->insertBatch($customers);
    }
}