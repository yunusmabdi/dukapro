<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table            = 'categories';
    protected $primaryKey       = 'id';
    protected $returnType       = 'array';
    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'category_code',
        'name',
        'description',
        'status',
    ];

    protected $useTimestamps = false;

    /**
     * Generate Category Code
     * Example: CAT-000001
     */
    public function generateCategoryCode(): string
    {
        $lastCategory = $this->orderBy('id', 'DESC')->first();

        $nextId = $lastCategory ? $lastCategory['id'] + 1 : 1;

        return 'CAT-' . str_pad($nextId, 6, '0', STR_PAD_LEFT);
    }
}