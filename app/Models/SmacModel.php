<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as BaseModel;

/**
 * Base model for SMAC tables that handles the table prefix issue.
 * These tables exist without the 'lv_' prefix, so we use a separate connection.
 */
abstract class SmacModel extends BaseModel
{
    /**
     * The connection name for the model.
     */
    protected $connection = 'mysql_no_prefix';
}
