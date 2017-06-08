<?php

namespace App\Models;


use App\Http\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;

class VRUsersRolesConnections extends Model
{

    protected $updated_at = false;
    protected $deleted_at = false;

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

    public function role()
    {
        return $this->hasOne(VRRoles::class, 'id', 'role_id');
    }
}
