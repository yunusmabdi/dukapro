<?php

namespace App\Models;

use CodeIgniter\Model;

class SupplierModel extends Model
{
    protected $table = 'suppliers';

    protected $primaryKey = 'id';

    protected $returnType = 'array';


    protected $allowedFields = [
        'supplier_code',
        'company_name',
        'contact_person',
        'phone',
        'email',
        'address',
        'status'
    ];


    protected $useTimestamps = true;


    public function generateSupplierCode()
    {
        $last = $this->orderBy('id', 'DESC')
                     ->first();

        if (!$last) {
            return 'SUP-0001';
        }


        $number = intval(
            substr($last['supplier_code'], 4)
        );


        return 'SUP-' . str_pad(
            $number + 1,
            4,
            '0',
            STR_PAD_LEFT
        );
    }
}