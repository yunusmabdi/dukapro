<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddSupplierIdToProducts extends Migration
{
    public function up()
    {
        $this->forge->addColumn('products', [

            'supplier_id' => [

                'type'       => 'BIGINT',
                'constraint' => 20,
                'unsigned'   => true,
                'after'      => 'category_id'

            ]

        ]);


        $this->forge->addForeignKey(
            'supplier_id',
            'suppliers',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }


    public function down()
    {
        $this->forge->dropColumn(
            'products',
            'supplier_id'
        );
    }
}