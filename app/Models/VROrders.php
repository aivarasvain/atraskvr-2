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

    /**
     * Fields which won't be displayed
     * @var array
     */
    protected $hidden = ['count', 'created_at', 'updated_at', 'deleted_at'];

    public function reservations()
    {
        return $this->hasMany(VRReservations::class, 'order_id', 'id');
    }
}
