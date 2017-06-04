<?php

namespace App\Models;

use App\Http\Traits\UuidTrait;

class VROrders extends CoreModel
{
    use UuidTrait;


    /**
     * Table name in database
     * @var string
     */
    protected $table = 'vr_orders';

    /**
     * Table fields which will be manipulated
     * @var array
     */
    protected $fillable = ['id', 'status', 'user_id'];
}
