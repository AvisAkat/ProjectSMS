<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClassModel extends Model
{
    use HasFactory;

    protected $table = 'class';

    static public function getRecord()
    {
        $data = ClassModel::select('class.*', 'users.name as created_by_name')
                        ->join('users', 'users.id', 'class.created_by')
                        ->where('class.is_delete', '=', 0);
                        if(!empty(Request::get('name')))
                        {
                            $data = $data->where('class.name', 'like', '%'.Request::get('name').'%');
                        }
                        if(!empty(Request::get('date')))
                        {
                            $data = $data->whereDate('class.created_at', 'like', '%'.Request::get('date').'%');
                        }
                        $data = $data->orderBy('class.id', 'desc')
                        ->paginate(5);

        return $data;
    }

    static public function getSingle($id)
    {
        return self::find($id);
    }

    static public function getClass()
    {
        $data = ClassModel::select('class.*')
                        ->join('users', 'users.id', 'class.created_by')
                        ->where('class.is_delete', '=', 0)
                        ->where('class.status', '=', 0)
                        ->orderBy('class.name', 'asc')
                        ->get();

        return $data;
    }
}
