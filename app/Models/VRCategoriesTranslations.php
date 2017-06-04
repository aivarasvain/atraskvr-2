<?php

namespace App\Models;

use App\Http\Traits\UuidTrait;

class VRCategoriesTranslations extends CoreModel
{
    use UuidTrait;


    /**
     * Table name in database
     * @var string
     */
    protected $table = 'vr_categories_translations';

    /**
     * Table fields which will be manipulated
     * @var array
     */
    protected $fillable = ['id', 'category_id', 'language_id', 'name', 'slug'];
}
