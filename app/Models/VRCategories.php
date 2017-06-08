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

    /**
     * Get fillables array and unsets first value
     * @return array
     */
    public function getFillables()
    {
        unset($this->fillable[0]);
        return $this->fillable;
    }

    public function translations()
    {
        return $this->hasOne(VRCategoriesTranslations::class, 'category_id', 'id')->where('language_id', app()->getLocale());
    }

}
