<?php

namespace App\Models;

use CodeIgniter\Model;

class PurchaseItemModel extends Model
{
    protected $table            = 'purchase_items';
    protected $primaryKey       = 'id';
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields = [
        'purchase_id',
        'product_id',
        'quantity',
        'unit_cost',
        'subtotal',
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
     * Returns all items for a purchase with product details.
     */
    public function getItemsByPurchase($purchaseId)
    {
        return $this->select('
                purchase_items.id,
                purchase_items.purchase_id,
                purchase_items.product_id,
                purchase_items.quantity,
                purchase_items.unit_cost,
                purchase_items.subtotal,
                products.name AS product_name,
                products.sku
            ')
            ->join('products', 'products.id = purchase_items.product_id')
            ->where('purchase_items.purchase_id', $purchaseId)
            ->findAll();
    }
}