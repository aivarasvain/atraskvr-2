<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VRRolesPermissionsConnections extends CoreModel
{

    /**
     * Table name in database
     * @var string
     */
    protected $table = 'vr_roles_permissions_connection';

    /**
     * Table fields which will be manipulated
     * @var array
     */
    protected $fillable = ['role_id', 'permission_id'];
}
