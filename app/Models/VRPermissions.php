<?php

namespace App\Models;

use App\Http\Traits\UuidTrait;


class VRPermissions extends CoreModel
{
    use UuidTrait;


    /**
     * Table name in database
     * @var string
     */
    protected $table = 'vr_permissions';

    /**
     * Table fields which will be manipulated
     * @var array
     */
    protected $fillable = ['id', 'name'];
}
