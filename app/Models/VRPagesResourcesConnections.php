<?php

namespace App\Models;


class VRPagesResourcesConnections extends CoreModel
{

    public $timestamps = false;

    /**
     * Table name in database
     * @var string
     */
    protected $table = 'vr_pages_resources_connection';

    /**
     * Table fields which will be manipulated
     * @var array
     */
    protected $fillable = ['page_id', 'resource_id'];
}
