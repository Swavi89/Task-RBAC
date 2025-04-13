<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    private static $rows = 15;

    public static function getRoleById($id)
    {
        return self::find($id);
    }

    public static function getRoleList($params = null)
    {
        $query = self::with(['permissions'])->orderBy('roles.id', 'desc');
        if (!empty($params['q'])) {
            $query->where('roles.name', 'LIKE', "%" . $params['q'] . "%");
        }
        return $query->paginate(self::$rows);
    }

    public static function getRoleListAsSelect()
    {
        return self::pluck('name', 'id')->toArray();
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_roles', 'user_id', 'role_id');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'role_permissions', 'role_id', 'permission_id');
    }
}
