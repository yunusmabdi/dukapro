<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPaymentReferenceToSales extends Migration
{
    public function up()
    {
        $this->forge->addColumn('sales', [
            'payment_reference' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
                'after'      => 'payment_method',
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('sales', 'payment_reference');
    }
}