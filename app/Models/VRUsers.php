<?php

namespace App\Models;


use App\Http\Traits\UuidTrait;

class VRUsers extends CoreModel
{
    use UuidTrait;


    /**
     * Table name in database
     * @var string
     */
    protected $table = 'vr_users';

    /**
     * Table fields which will be manipulated
     * @var array
     */
    protected $fillable = ['id', 'name', 'email', 'password'];
}
