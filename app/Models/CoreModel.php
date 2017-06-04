<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CoreModel extends Model
{
    /**
     * Incrementing is set to false
     *
     * @var bool
     */
    public $incrementing = false;
    use SoftDeletes;

}
