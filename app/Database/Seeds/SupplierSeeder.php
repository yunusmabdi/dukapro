<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SupplierSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'supplier_code' => 'SUP001',
                'company_name' => 'Coca-Cola Beverages Kenya',
                'contact_person' => 'John Mwangi',
                'email' => 'orders@coca-cola.co.ke',
                'phone' => '0712345678',
                'address' => 'Nairobi, Kenya',
                'status' => 'Active',
            ],
            [
                'supplier_code' => 'SUP002',
                'company_name' => 'Unga Limited',
                'contact_person' => 'Grace Wanjiku',
                'email' => 'sales@unga.com',
                'phone' => '0723456789',
                'address' => 'Nairobi, Kenya',
                'status' => 'Active',
            ],
            [
                'supplier_code' => 'SUP003',
                'company_name' => 'Kenafric Industries',
                'contact_person' => 'Peter Otieno',
                'email' => 'info@kenafric.com',
                'phone' => '0734567890',
                'address' => 'Nairobi, Kenya',
                'status' => 'Active',
            ],
            [
                'supplier_code' => 'SUP004',
                'company_name' => 'Unilever Kenya',
                'contact_person' => 'Mary Njeri',
                'email' => 'support@unilever.co.ke',
                'phone' => '0745678901',
                'address' => 'Nairobi, Kenya',
                'status' => 'Active',
            ],
            [
                'supplier_code' => 'SUP005',
                'company_name' => 'Bidco Africa',
                'contact_person' => 'David Kiptoo',
                'email' => 'orders@bidcoafrica.com',
                'phone' => '0756789012',
                'address' => 'Thika, Kenya',
                'status' => 'Active',
            ],
        ];

        $this->db->table('suppliers')->insertBatch($data);
    }
}