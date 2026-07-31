<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdateProductsCategory extends Migration
{
    public function up()
    {
        // Add category_id
        $this->forge->addColumn('products', [
            'category_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => true,
                'after'      => 'name',
            ],
        ]);

        // Remove old category column
        $this->forge->dropColumn('products', 'category');

        // Foreign key
        $this->db->query("
            ALTER TABLE products
            ADD CONSTRAINT fk_products_category
            FOREIGN KEY (category_id)
            REFERENCES categories(id)
            ON DELETE SET NULL
            ON UPDATE CASCADE
        ");
    }

    public function down()
    {
        $this->db->query("
            ALTER TABLE products
            DROP FOREIGN KEY fk_products_category
        ");

        $this->forge->dropColumn('products', 'category_id');

        $this->forge->addColumn('products', [
            'category' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'after'      => 'name',
            ],
        ]);
    }
}