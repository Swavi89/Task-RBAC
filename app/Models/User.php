<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    private static $rows = 15;

    public static function getUserById($id)
    {
        return self::find($id);
    }

    public static function getUserList($params = null)
    {
        $query =  self::with(['roles'])->orderBy('users.id', 'desc');
        if (!empty($params['q']))
            $query->where('users.name', 'LIKE', "%" . $params['q'] . "%");
        return $query->paginate(self::$rows);
    }

    public static function getUserListAsSelect()
    {
        return self::pluck('name', 'id')->toArray();
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_roles', 'user_id', 'role_id');
    }

    public function hasRole($roleName)
    {
        return $this->roles->contains('name', $roleName);
    }

    public function hasPermission($permissionTag)
    {
        return $this->roles()->whereHas('permissions', function ($query) use ($permissionTag) {
            $query->where('tag', $permissionTag);
        })->exists();
    }
}
