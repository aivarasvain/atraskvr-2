<?php
/**
 * Created by PhpStorm.
 * User: Aivaras
 * Date: 2017.06.04
 * Time: 19:08
 */

namespace App\Http\Traits;


use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

trait UuidTrait
{
    /**
     * Automatically generates and adds UUID to model
     */
    protected static function boot() {
        Model::boot();
        static::creating(function($model) {
            if(!isset($model->attributes['id'])) {
                $model->attributes['id'] = Uuid::uuid4();
            } else {
                $model->{$model->getKeyName()} = $model->attributes['id'];
            }
        });
    }
}