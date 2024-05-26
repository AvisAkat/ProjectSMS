<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubjectModel extends Model
{
    use HasFactory;

    protected $table = 'subject';

    static public function getRecord()
    {
        $data = SubjectModel::select('subject.*', 'users.name as created_by_name')
                        ->join('users', 'users.id', 'subject.created_by')
                        ->where('subject.is_delete', '=', 0);
                        if(!empty(Request::get('name')))
                        {
                            $data = $data->where('subject.name', 'like', '%'.Request::get('name').'%');
                        }
                        if(!empty(Request::get('type')))
                        {
                            $data = $data->where('subject.type', 'like', '%'.Request::get('type').'%');
                        }
                        if(!empty(Request::get('date')))
                        {
                            $data = $data->whereDate('subject.created_at', 'like', '%'.Request::get('date').'%');
                        }
                        $data = $data->orderBy('subject.id', 'desc')
                        ->paginate(10);

        return $data;
    }

    static public function getSingle($id)
    {
        return self::find($id);
    }

    static public function getSubject()
    {
        $data = SubjectModel::select('subject.*')
                        ->join('users', 'users.id', 'subject.created_by')
                        ->where('subject.is_delete', '=', 0)
                        ->where('subject.status', '=', 0)
                        ->orderBy('subject.name', 'asc')
                        ->get();

        return $data;
    }
}
