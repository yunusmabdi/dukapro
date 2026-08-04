<?php

namespace App\Models;

use CodeIgniter\Model;

class PurchaseModel extends Model
{
    protected $table            = 'purchases';
    protected $primaryKey       = 'id';
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields = [
        'purchase_number',
        'supplier_id',
        'purchase_date',
        'status',
        'total_amount',
        'notes',
    ];

    protected bool $allowEmptyInserts = false;

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;

    /**
     * Returns purchases with supplier details.
     */
    public function getPurchases()
    {
        return $this->select('purchases.*, suppliers.company_name AS supplier_name')
            ->join('suppliers', 'suppliers.id = purchases.supplier_id')
            ->orderBy('purchases.id', 'DESC')
            ->findAll();
    }

    /**
     * Returns a single purchase with supplier details.
     */
    public function getPurchase($id)
    {
        return $this->select('purchases.*, suppliers.company_name AS supplier_name')
            ->join('suppliers', 'suppliers.id = purchases.supplier_id')
            ->where('purchases.id', $id)
            ->first();
    }
}