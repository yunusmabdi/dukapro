<?php

namespace App\Models;

use CodeIgniter\Model;

class SaleModel extends Model
{
    protected $table            = 'sales';
    protected $primaryKey       = 'id';

    protected $returnType       = 'array';

    protected $useAutoIncrement = true;

    protected $useSoftDeletes   = false;

    protected $protectFields    = true;

    protected $allowedFields = [
        'invoice_number',
        'customer_id',
        'user_id',
        'sale_date',
        'subtotal',
        'discount',
        'tax',
        'total',
        'payment_reference',
        'payment_method',
        'amount_paid',
        'change_amount',
        'notes',
        'status',
    ];

    protected bool $allowEmptyInserts = false;

    protected bool $updateOnlyChanged = true;

    protected $useTimestamps = true;

    protected $dateFormat = 'datetime';

    protected $createdField = 'created_at';

    protected $updatedField = 'updated_at';

    protected $validationRules = [];

    protected $validationMessages = [];

    protected $skipValidation = false;
}