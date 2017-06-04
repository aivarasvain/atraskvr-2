<?php

namespace App\Models;

use App\Http\Traits\UuidTrait;

class VRLanguages extends CoreModel
{
    use UuidTrait;


    /**
     * Table name in database
     * @var string
     */
    protected $table = 'vr_languages';

    /**
     * Table fields which will be manipulated
     * @var array
     */
    protected $fillable = ['id', 'language_code', 'name'];
}
