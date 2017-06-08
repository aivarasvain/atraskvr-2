<?php

namespace App\Models;


use App\Http\Traits\UuidTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class VRUsers extends Authenticatable
{

    use Notifiable;
    use UuidTrait;

    public $incrementing = false;



    /**
     * Table name in database
     * @var string
     */
    protected $table = 'vr_users';

    /**
     * Table fields which will be manipulated
     * @var array
     */
    protected $fillable = ['id', 'full_name', 'email', 'phone', 'password'];

    /**
     * Fields which won't be displayed
     * @var array
     */
    protected $hidden = ['count', 'created_at', 'updated_at', 'deleted_at'];


    public function connection (  )
    {
        return $this->belongsToMany(VRRoles::class, 'vr_users_roles_connection', 'user_id', 'role_id');
    }

    public function rolesConnections ()
    {
        return $this->hasMany(VRUsersRolesConnections::class, 'user_id', 'id');
    }


}
