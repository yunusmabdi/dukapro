<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProductsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],

            'sku' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'unique' => true,
            ],

            'barcode' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ],

            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            'category' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],

            'brand' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ],

            'unit' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'default' => 'Piece',
            ],

            'cost_price' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],

            'selling_price' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],

            'stock' => [
                'type' => 'INT',
                'default' => 0,
            ],

            'min_stock' => [
                'type' => 'INT',
                'default' => 5,
            ],

            'status' => [
                'type' => 'ENUM',
                'constraint' => ['Active','Inactive'],
                'default' => 'Active',
            ],

            'image' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],

            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('products');
    }

    public function down()
    {
        //
    }
}
