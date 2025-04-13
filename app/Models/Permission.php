<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    private static $rows = 15;

    public static function getPermissionById($id)
    {
        return self::find($id);
    }

    public static function getPermissionList($params = null)
    {
        $query = self::orderBy('permissions.id', 'desc');
        if (!empty($params['q'])) {
            $query->where('permissions.name', 'LIKE', "%" . $params['q'] . "%");
        }
        return $query->paginate(self::$rows);
    }

    public static function getPermissionListAsSelect()
    {
        return self::pluck('name', 'id')->toArray();
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_permissions', 'role_id', 'permission_id');
    }
}
