<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function change_password()
    {
        $data['header_title'] = 'Change Password';
        return view('profile.change_password', $data);
    }

    public function update_change_password(Request $request)
    {
        $user = User::getSingle(Auth::user()->id);
        if(Hash::check($request->old_password, $user->password))
        {
            $user->password = Hash::make($request->new_password);
            $user->save();

            return redirect()->back()->with('success', 'Password Changed Successfully');
        }
        else
        {
            return redirect()->back()->with('error', 'Old password is not correct');
        }
    }

    public function myAccount()
    {
        $data['header_title']  = 'My Account';
        $data['getRecord'] = User::getSingle(Auth::user()->id); 
        

        if(Auth::user()->user_type == 1)
        {
            return view('admin.my_account', $data);
        }
        else if(Auth::user()->user_type == 2)
        {
            return view('teacher.my_account', $data);
        }
        else if(Auth::user()->user_type == 3)
        {
            return view('student.my_account', $data);
        }
        else if(Auth::user()->user_type == 4)
        {
            return view('parent.my_account', $data);
        }
        
    }

    public function updateMyAccountAdmin(Request $request)
    {
        request()->validate([
            'email' => 'required|email|unique:users,email,'.Auth::user()->id,
            'mobile_number' => 'min:10|max:15',
        ]);
        $admin = User::getSingle(Auth::user()->id);
        $admin->name = trim($request->name);
        $admin->last_name = trim($request->last_name);
        $admin->gender = trim($request->gender);
        $admin->mobile_number = trim($request->mobile_number);
        if(!empty($request->file('profile_pic')))
        {
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('uploads/profiles/', $filename);

            $admin->profile_pic = $filename;
        }
        $admin->email = trim($request->email);
        $admin->save();

        return redirect()->back()->with('success', 'Account Updated Successfully');
    }
    public function updateMyAccountTeacher(Request $request)
    {
        request()->validate([
            'email' => 'required|email|unique:users,email,'.Auth::user()->id,
            'mobile_number' => 'min:10|max:15',
        ]);

        $teacher = User::getSingle(Auth::user()->id);
        $teacher->name = trim($request->name);
        $teacher->last_name = trim($request->last_name);
        $teacher->gender = trim($request->gender);
        $teacher->marital_status = trim($request->marital_status);

        if(!empty($request->date_of_birth))
        {
            $teacher->date_of_birth = trim($request->date_of_birth);
        }

        $teacher->mobile_number = trim($request->mobile_number);


        if(!empty($request->file('profile_pic')))
        {
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('uploads/profiles/', $filename);

            $teacher->profile_pic = $filename;
        }

        $teacher->permanent_address = trim($request->permanent_address);
        $teacher->address = trim($request->address);
        $teacher->qualification = trim($request->qualification);
        $teacher->work_experience = trim($request->work_experience);
        $teacher->email = trim($request->email);
        $teacher->save();

        return redirect()->back()->with('success', 'Account Updated Successfully');
    }

    public function updateMyAccountStudent(Request $request)
    {
        
        request()->validate([
            'email' => 'required|email|unique:users,email,'.Auth::user()->id,
            'height' => 'max:10',
            'weight' => 'max:10',
            'blood_group' => 'max:10',
            'mobile_number' => 'min:10|max:15',
            'caste' => 'max:50',
            'religion' => 'max:50',
        ]);


        $student = User::getSingle(Auth::user()->id);
        $student->name = trim($request->name);
        $student->last_name = trim($request->last_name);
        $student->gender = trim($request->gender);
        if(!empty($request->date_of_birth))
        {
            $student->date_of_birth = trim($request->date_of_birth);
        }
        $student->caste = trim($request->caste);
        $student->religion = trim($request->religion);
        $student->mobile_number = trim($request->mobile_number);

        if(!empty($request->file('profile_pic')))
        {
            if(!empty($student->getProfile()))
            {
                unlink('uploads/profiles/'.$student->profile_pic);
            }
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('uploads/profiles/', $filename);
            $student->profile_pic = $filename;
        }

        $student->blood_group = trim($request->blood_group);
        $student->height = trim($request->height);
        $student->weight = trim($request->weight);
        $student->email = trim($request->email);
       
        $student->save();


        return redirect()->back()->with('success', 'Account Updated Successfully');
    }

    public function updateMyAccountParent(Request $request)
    {
        request()->validate([
            'email' => 'required|email|unique:users,email,'.Auth::user()->id,
            'mobile_number' => 'min:10|max:15',
        ]);


        $parent = User::getSingle(Auth::user()->id);
        $parent->name = trim($request->name);
        $parent->last_name = trim($request->last_name);
        $parent->gender = trim($request->gender);
        $parent->mobile_number = trim($request->mobile_number);

        if(!empty($request->file('profile_pic')))
        {
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('uploads/profiles/', $filename);

            $parent->profile_pic = $filename;
        }

        $parent->occupation = trim($request->occupation);
        $parent->address = trim($request->address);
        $parent->email = trim($request->email);
        
        
        $parent->save();


        return redirect()->back()->with('success', 'Account Updated Successfully');
    }
}
