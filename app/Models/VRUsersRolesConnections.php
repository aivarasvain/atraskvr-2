<?php

namespace App\Models;


class VRUsersRolesConnections extends CoreModel
{
    /**
     * Table name in database
     * @var string
     */
    protected $table = 'vr_users_roles_connection';

    /**
     * Table fields which will be manipulated
     * @var array
     */
    protected $fillable = ['user_id', 'role_id'];
}
