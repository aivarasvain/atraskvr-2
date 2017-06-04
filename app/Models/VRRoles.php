<?php

namespace App\Models;

use App\Http\Traits\UuidTrait;

class VRRoles extends CoreModel
{
    use UuidTrait;


    /**
     * Table name in database
     * @var string
     */
    protected $table = 'vr_roles';

    /**
     * Table fields which will be manipulated
     * @var array
     */
    protected $fillable = ['id', 'name'];
}
