<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends SmacModel
{
    protected $table = 'smac_prodotti';

    protected $primaryKey = 'key_pro';

    public $incrementing = false;

    public $timestamps = false;

    /**
     * Get all attributes for this product with their selected options.
     */
    public function attributes(): BelongsToMany
    {
        return $this->belongsToMany(
            Attribute::class,
            'smac_campi_opzioni_prodotti',
            'key_pro',
            'key_cam'
        )->withPivot('key_opz');
    }

    /**
     * Get all options for this product.
     */
    public function options(): BelongsToMany
    {
        return $this->belongsToMany(
            Option::class,
            'smac_campi_opzioni_prodotti',
            'key_pro',
            'key_opz'
        )->withPivot('key_cam');
    }
}
