<?php

namespace App\Models;

use App\Http\Traits\UuidTrait;


class VRPagesTranslations extends CoreModel
{
    use UuidTrait;


    /**
     * Table name in database
     * @var string
     */
    protected $table = 'vr_pages_translations';

    /**
     * Table fields which will be manipulated
     * @var array
     */
    protected $fillable = ['id', 'page_id', 'language_id', 'title', 'description_short', 'description_long', 'slug'];
}
