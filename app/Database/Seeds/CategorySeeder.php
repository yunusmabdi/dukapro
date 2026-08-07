<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'category_code' => 'CAT001',
                'name'        => 'Beverages',
                'description' => 'Soft drinks, juices, water and energy drinks',
                'status'      => 'Active',
            ],
            [
                'category_code' => 'CAT002',
                'name'        => 'Groceries',
                'description' => 'Staple food items and cooking ingredients',
                'status'      => 'Active',
            ],
            [
                'category_code' => 'CAT003',
                'name'        => 'Snacks',
                'description' => 'Biscuits, crisps, chocolates and confectionery',
                'status'      => 'Active',
            ],
            [
                'category_code' => 'CAT004',
                'name'        => 'Personal Care',
                'description' => 'Toiletries and personal hygiene products',
                'status'      => 'Active',
            ],
            [
                'category_code' => 'CAT005',
                'name'        => 'Household Essentials',
                'description' => 'Cleaning and household products',
                'status'      => 'Active',
            ],
        ];

        $this->db->table('categories')->truncate();
        $this->db->table('categories')->insertBatch($categories);
    }
}