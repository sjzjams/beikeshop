<?php

/**
 * ProductTech.php
 *
 * @copyright  2024 sjzjams.com - All Rights Reserved
 * @link       https://yuanshen.com
 * @author     sjzjams
 * @created    2024-08-26 16:33:18
 * @modified   2024-08-26 16:33:18
 */

namespace Beike\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductTech extends Base
{
    use HasFactory;

    protected $fillable = ['product_id', 'title', 'desc', 'images', 'tech_title', 'tech_guige', 'tech_svg'];

    protected $casts = [
        'images' => 'array',
    ];
    protected $appends = ['image'];

    public function techs(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function getImageAttribute()
    {
        $images = $this->images ?? [];

        return $images[0] ?? '';
    }
}