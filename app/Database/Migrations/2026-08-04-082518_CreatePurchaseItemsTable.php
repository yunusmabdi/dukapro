<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePurchaseItemsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],

            'purchase_id' => [
                'type'       => 'BIGINT',
                'constraint' => 20,
                'unsigned'   => true,
            ],

            'product_id' => [
                'type'       => 'BIGINT',
                'constraint' => 20,
                'unsigned'   => true,
            ],

            'quantity' => [
                'type'       => 'BIGINT',
                'constraint' => 20,
                'unsigned'   => true,
            ],

            'unit_cost' => [
                'type'       => 'DECIMAL',
                'constraint' => '15,2',
            ],

            'subtotal' => [
                'type'       => 'DECIMAL',
                'constraint' => '15,2',
            ],

            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],

            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addKey('purchase_id');
        $this->forge->addKey('product_id');

        $this->forge->addForeignKey(
            'purchase_id',
            'purchases',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->forge->addForeignKey(
            'product_id',
            'products',
            'id',
            'CASCADE',
            'RESTRICT'
        );

        $this->forge->createTable('purchase_items');
    }

    public function down()
    {
        $this->forge->dropTable('purchase_items', true);
    }
}