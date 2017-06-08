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
    protected $fillable = ['id', 'category_id', 'google_map', 'image_id', 'video_url'];

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
        return $this->hasOne(VRPagesTranslations::class, 'page_id', 'id')->where('language_id', app()->getLocale());
    }


}
