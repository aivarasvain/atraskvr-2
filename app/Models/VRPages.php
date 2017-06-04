<?php

namespace App\Models;



use App\Http\Traits\UuidTrait;

class VRPages extends CoreModel
{
    use UuidTrait;


    /**
     * Table name in database
     * @var string
     */
    protected $table = 'vr_pages';

    /**
     * Table fields which will be manipulated
     * @var array
     */
    protected $fillable = ['id', 'category_id', 'google_map'];
}
