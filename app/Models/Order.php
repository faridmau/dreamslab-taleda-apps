<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends SmacModel
{
    protected $table = 'smac_ordini';

    protected $primaryKey = 'key_ord';

    public $incrementing = false;

    public $timestamps = false;

    protected $casts = [
        'data_ins' => 'date',
        'data_ord' => 'datetime',
        'dataPagamento' => 'datetime',
    ];

    /**
     * Get the user associated with this order.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'userId', 'id');
    }
}
