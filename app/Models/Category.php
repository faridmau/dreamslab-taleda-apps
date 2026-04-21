<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends SmacModel
{
    protected $table = 'smac_categorie';

    protected $primaryKey = 'key_cat';

    public $incrementing = false;

    public $timestamps = false;

    /**
     * Get the parent category.
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'key_padre', 'key_cat');
    }

    /**
     * Get the child categories.
     */
    public function children(): HasMany
    {
        return $this->hasMany(Category::class, 'key_padre', 'key_cat');
    }
}
