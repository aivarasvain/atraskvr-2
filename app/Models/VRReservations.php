<?php

namespace App\Models;

use App\Http\Traits\UuidTrait;


class VRReservations extends CoreModel
{
    use UuidTrait;


    /**
     * Table name in database
     * @var string
     */
    protected $table = 'vr_reservations';

    /**
     * Table fields which will be manipulated
     * @var array
     */
    protected $fillable = ['id', 'time', 'order_id', 'page_id'];

    protected $casts = [
        'time' => 'array'
    ];

}
