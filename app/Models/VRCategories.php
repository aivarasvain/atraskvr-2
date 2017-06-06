<?php

namespace App\Models;

use App\Http\Traits\UuidTrait;

class VRCategories extends CoreModel
{
    use UuidTrait;


    /**
     * Table name in database
     * @var string
     */
    protected $table = 'vr_categories';

    /**
     * Table fields which will be manipulated
     * @var array
     */
    protected $fillable = ['id', 'parent_id'];
}
