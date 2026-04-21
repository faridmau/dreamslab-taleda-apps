<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Option extends SmacModel
{
    protected $table = 'smac_opzioni';

    protected $primaryKey = 'key_opz';

    public $incrementing = false;

    public $timestamps = false;

    /**
     * Get the attribute this option belongs to.
     */
    public function attribute(): BelongsTo
    {
        return $this->belongsTo(Attribute::class, 'key_cam', 'key_cam');
    }

    /**
     * Get all products that have this option.
     */
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(
            Product::class,
            'smac_campi_opzioni_prodotti',
            'key_opz',
            'key_pro'
        )->withPivot('key_cam');
    }
}
