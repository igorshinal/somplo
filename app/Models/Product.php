<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'phone_name', 'seller_id', 'display_size', 'quantity', 'cost'
    ];

    /**
     * @return BelongsTo
     */
    public function seller(): BelongsTo
    {
        return $this->belongsTo(Seller::class);
    }

    /**
     * @param $id
     * @return mixed
     */
    public static function getProductData($id): mixed
    {
        return self::where('id', $id)
            ->where('display_size', '>', 5)
            ->with('seller:id,seller_name')
            ->first();
    }

    /**
     * @param array $ids
     * @param float $cost
     * @return mixed
     */
    public static function updateBulkCost(array $ids, float $cost): int
    {
        return self::whereIn('id', $ids)->update(['cost' => $cost]);
    }
}

