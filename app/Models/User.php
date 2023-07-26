<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;
    protected $fillable = [
        'name',
        'username',
        'phone',
        'photo',
        'address',
        'role',
        'status',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function isAdmin()
    {
        // Logic to determine if the user is an admin
        return $this->role === 'admin';
    }

    public function isUser()
    {
        // Logic to determine if the user is an admin
        return $this->role === 'user';
    }

    public static function getpermissionGroups() {
        $permission_groups = DB::table('permissions')->select('group_name')->groupBy('group_name')->get();
        return $permission_groups;
    }

    public static function getPermissionByGroupName($group_name) {
        $permissions = DB::table('permissions')
                        ->select('name', 'id')
                        ->where('group_name', $group_name)
                        ->get();

        return $permissions;
    }

    public static function roleHasPermissions($role, $permissions) {
        $hasPermission = true;
        foreach($permissions as $permission) {
            if(!$role->hasPermissionTo($permission->name)) {
                $hasPermission = false;
                return $hasPermission;
            }
            return $hasPermission;
        }
    }
}
