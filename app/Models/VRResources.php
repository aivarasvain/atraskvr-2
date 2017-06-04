<?php

namespace App\Models;

use App\Http\Traits\UuidTrait;

class VRResources extends CoreModel
{
    use UuidTrait;


    /**
     * Table name in database
     * @var string
     */
    protected $table = 'vr_resources';

    /**
     * Table fields which will be manipulated
     * @var array
     */
    protected $fillable = ['id', 'mime_type', 'path', 'width', 'height', 'size'];
}
