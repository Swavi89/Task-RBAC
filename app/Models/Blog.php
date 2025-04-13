<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    private static $rows = 15;

    public static function getBlogById($id)
    {
        return self::find($id);
    }

    public static function getBlogList()
    {
        $query = self::orderBy('blogs.id', 'desc');
        return $query->paginate(self::$rows);
    }
}
