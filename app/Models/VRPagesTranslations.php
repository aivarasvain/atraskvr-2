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

    public function parentpage()
    {
        return $this->hasOne(VRPages::class, 'id', 'page_id');
    }
}
