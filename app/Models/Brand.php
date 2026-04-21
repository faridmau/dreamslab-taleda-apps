<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends SmacModel
{
    protected $table = 'smac_brand';

    protected $primaryKey = 'key_bra';
}
