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

    /**
     * Fields which won't be displayed
     * @var array
     */
    protected $hidden = ['count', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * Get fillables array and unsets first two values
     * @return array
     */
    public function getFillables()
    {
        unset($this->fillable[0]);
        unset($this->fillable[1]);
        return $this->fillable;
    }

}
