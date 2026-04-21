<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Attribute extends SmacModel
{
    protected $table = 'smac_campi';

    protected $primaryKey = 'key_cam';

    public $incrementing = false;

    public $timestamps = false;

    /**
     * Get all options for this attribute.
     */
    public function options(): HasMany
    {
        return $this->hasMany(Option::class, 'key_cam', 'key_cam');
    }

    /**
     * Get all products that have this attribute.
     */
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(
            Product::class,
            'smac_campi_opzioni_prodotti',
            'key_cam',
            'key_pro'
        )->withPivot('key_opz');
    }
}
