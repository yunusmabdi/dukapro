<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'products';

    protected $primaryKey = 'id';

    protected $allowedFields = [
        'sku',
        'barcode',
        'name',
        'category_id',
        'supplier_id',
        'brand',
        'unit',
        'cost_price',
        'selling_price',
        'stock',
        'min_stock',
        'status',
        'image'
    ];

    public function generateSku(): string
    {
        $last = $this->orderBy('id', 'DESC')->first();

        $nextId = $last ? $last['id'] + 1 : 1;

        return 'PRD-' . str_pad($nextId, 6, '0', STR_PAD_LEFT);
    }

    public function generateBarcode(): string
    {
        do {
            $barcode = (string) random_int(100000000000, 999999999999);
        } while ($this->where('barcode', $barcode)->first());

        return $barcode;
    }
}
