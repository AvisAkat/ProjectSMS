<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Support\Facades\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
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

    // ----------------- ORM FOR SINGLE USER IN THE USER TABLE ---------------------------------------- \\
    static public function getSingle($id)
    {
        return self::find($id);
    }

    // ----------------- ORM ON ADMIN ENTITY ---------------------------------------- \\ 

    static public function getAdmin()
    {
        $users = self::select('users.*')
                    ->where('user_type', '=', 1)
                    ->where('is_delete', '=',0);
                    if(!empty(Request::get('name')))
                    {
                        $users = $users->where('name', 'like', '%'.Request::get('name').'%');
                    }
                    if(!empty(Request::get('email')))
                    {
                        $users = $users->where('email', 'like', '%'.Request::get('email').'%');
                    }
                    if(!empty(Request::get('date')))
                    {
                        $users = $users->whereDate('created_at', 'like', '%'.Request::get('date').'%');
                    }
        $users = $users->orderBy('id', 'desc')
                    ->paginate(10);

        return $users;
    }
    
    // ----------------- ORM FOR TEACHERS ON THE USER TABLE ---------------------------------------- \\

    static public function getTeacher()
    {
        $parent = self::select('users.*',)
                    ->where('users.user_type', '=', 2)
                    ->where('users.is_delete', '=',0);
                    if(!empty(Request::get('name')))
                    {
                        $parent = $parent->where('users.name', 'like', '%'.Request::get('name').'%');
                    }
                    if(!empty(Request::get('email')))
                    {
                        $parent = $parent->where('users.email', 'like', '%'.Request::get('email').'%');
                    }
                    if(!empty(Request::get('caste')))
                    {
                        $parent = $parent->where('users.caste', 'like', '%'.Request::get('caste').'%');
                    }
                    if(!empty(Request::get('admission_number')))
                    {
                        $parent = $parent->where('users.admission_number', 'like', '%'.Request::get('admission_number').'%');
                    }
                    if(!empty(Request::get('date')))
                    {
                        $parent = $parent->whereDate('created_at', 'like', '%'.Request::get('date').'%');
                    }
        $parent = $parent->orderBy('users.id', 'desc')
                    ->paginate(10);

        return $parent;
    }

    // ----------------- ORM FOR STUDENT ON THE USER TABLE ---------------------------------------- \\

    static public function getStudent()
    {
        $student = self::select('users.*', 'class.name as class_name', 'parent.name as parent_name', 'parent.last_name as parent_lastname')
                    ->join('users as parent', 'parent.id', '=', 'users.parent_id', 'left')
                    ->join('class', 'class.id','=', 'users.class_id', 'left')
                    ->where('users.user_type', '=', 3)
                    ->where('users.is_delete', '=',0);
                    if(!empty(Request::get('name')))
                    {
                        $student = $student->where('users.name', 'like', '%'.Request::get('name').'%');
                    }
                    if(!empty(Request::get('email')))
                    {
                        $student = $student->where('users.email', 'like', '%'.Request::get('email').'%');
                    }
                    if(!empty(Request::get('class')))
                    {
                        $student = $student->where('class.name', 'like', '%'.Request::get('class').'%');
                    }
                    if(!empty(Request::get('caste')))
                    {
                        $student = $student->where('users.caste', 'like', '%'.Request::get('caste').'%');
                    }
                    if(!empty(Request::get('admission_number')))
                    {
                        $student = $student->where('users.admission_number', 'like', '%'.Request::get('admission_number').'%');
                    }
                    if(!empty(Request::get('date')))
                    {
                        $student = $student->whereDate('created_at', 'like', '%'.Request::get('date').'%');
                    }
        $student = $student->orderBy('users.id', 'desc')
                    ->paginate(10);

        return $student;
    }

    // ----------------- ORM TO RETRIEVE PARENT'S CHILD (STUDENT) -PARENT STUDENT ASSIGNMENT ---------------------------------------- \\ 

    static public function getSearchStudent()
    {
        if(!empty(Request::get('name')) || !empty(Request::get('last_name')) || !empty(Request::get('email')) || !empty(Request::get('id')))
        {
            $student = self::select('users.*', 'class.name as class_name', 'parent.name as parent_name', 'parent.last_name as parent_lastname')
                    ->join('users as parent', 'parent.id', '=', 'users.parent_id', 'left')
                    ->join('class', 'class.id','=', 'users.class_id', 'left')
                    ->where('users.user_type', '=', 3)
                    ->where('users.is_delete', '=',0);
                    if(!empty(Request::get('id')))
                    {
                        $student = $student->where('users.id', '=', Request::get('id'));
                    }
                    if(!empty(Request::get('name')))
                    {
                        $student = $student->where('users.name', 'like', '%'.Request::get('name').'%');
                    }
                    if(!empty(Request::get('last_name')))
                    {
                        $student = $student->where('users.last_name', 'like', '%'.Request::get('last_name').'%');
                    }
                    if(!empty(Request::get('email')))
                    {
                        $student = $student->where('users.email', 'like', '%'.Request::get('email').'%');
                    }
        $student = $student->orderBy('users.id', 'desc')
                    ->limit(50)
                    ->get();

        return $student;
        }
    }

    static public function getMyStudent($parent_id)
    {
        $student = self::select('users.*', 'class.name as class_name', 'parent.name as parent_name', 'parent.last_name as parent_lastname')
                    ->join('users as parent', 'parent.id', '=', 'users.parent_id', 'left')
                    ->join('class', 'class.id','=', 'users.class_id', 'left')
                    ->where('users.user_type', '=', 3)
                    ->where('users.parent_id', '=', $parent_id)
                    ->where('users.is_delete', '=',0)
                    ->orderBy('users.id', 'desc')
                    ->get();

        return $student;
    } 


    // ----------------- ORM FOR PARENT ON THE USER TABLE ---------------------------------------- \\
    static public function getParent()
    {
        $parent = self::select('users.*',)
                    ->where('users.user_type', '=', 4)
                    ->where('users.is_delete', '=',0);
                    if(!empty(Request::get('name')))
                    {
                        $parent = $parent->where('users.name', 'like', '%'.Request::get('name').'%');
                    }
                    if(!empty(Request::get('email')))
                    {
                        $parent = $parent->where('users.email', 'like', '%'.Request::get('email').'%');
                    }
                    if(!empty(Request::get('caste')))
                    {
                        $parent = $parent->where('users.caste', 'like', '%'.Request::get('caste').'%');
                    }
                    if(!empty(Request::get('admission_number')))
                    {
                        $parent = $parent->where('users.admission_number', 'like', '%'.Request::get('admission_number').'%');
                    }
                    if(!empty(Request::get('date')))
                    {
                        $parent = $parent->whereDate('created_at', 'like', '%'.Request::get('date').'%');
                    }
        $parent = $parent->orderBy('users.id', 'desc')
                    ->paginate(10);

        return $parent;
    }

    
    // ----------------- ORM ON EMAIL FOR PASSWORD RESETING ---------------------------------------- \\

    static public function getEmailSingle($email)
    {
        return self::where('email', '=',$email)->first();
    }

    static public function getTokenSingle($remember_token)
    {
        return self::where('remember_token', '=', $remember_token)->first();
    }

    
    // ----------------- FUNCTION TO GET PROFILE PICTURE OF USERS ---------------------------------------- \\ 

    public function getProfile()
    {
        if(!empty($this->profile_pic) && file_exists('uploads/profiles/'.$this->profile_pic))
        {
            return url('uploads/profiles/'.$this->profile_pic);
        }
        else
        {
            return "";
        }
    }
}
