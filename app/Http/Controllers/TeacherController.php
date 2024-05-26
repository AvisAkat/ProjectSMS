<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    public function list()
    {
        $data['header_title'] = 'Teacher List';
        $data['getRecord'] = User::getTeacher();

        return view('admin.teacher.list', $data);
    }

    public function add()
    {
        $data['header_title'] = 'Add New Teacher';

        return view('admin.teacher.add-teacher', $data);
    }

    public function insert(Request $request)
    {
        request()->validate([
            'email' => 'required|email|unique:users',
            'mobile_number' => 'min:10|max:15',
        ]);

        $teacher = new User;
        $teacher->name = trim($request->name);
        $teacher->last_name = trim($request->last_name);
        $teacher->gender = trim($request->gender);
        $teacher->marital_status = trim($request->marital_status);

        if(!empty($request->date_of_birth))
        {
            $teacher->date_of_birth = trim($request->date_of_birth);
        }

        $teacher->mobile_number = trim($request->mobile_number);

        if(!empty($request->admission_date))
        {
            $teacher->admission_date = trim($request->admission_date);
        }

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
        $teacher->note = trim($request->note);
        $teacher->work_experience = trim($request->work_experience);
        $teacher->status = trim($request->status);
        $teacher->email = trim($request->email);
        $teacher->password = Hash::make($request->password);
        $teacher->user_type = 2;
        $teacher->save();

        return redirect('admin/teacher/list')->with('success', 'Teacher Created Successfully');
    }

    public function edit($id)
    {
        $data['getRecord'] = User::getSingle($id);
        if(!empty($data['getRecord']))
        {

            $data['header_title']= 'Edit Teacher';
            return view('admin.teacher.edit', $data);
        }
        else
        {
            abort(404);
        }
    }

    public function update($id, Request $request)
    {
        request()->validate([
            'email' => 'required|email|unique:users,email,'.$id,
            'mobile_number' => 'min:10|max:15',
        ]);

        $teacher = User::getSingle($id);
        $teacher->name = trim($request->name);
        $teacher->last_name = trim($request->last_name);
        $teacher->gender = trim($request->gender);
        $teacher->marital_status = trim($request->marital_status);

        if(!empty($request->date_of_birth))
        {
            $teacher->date_of_birth = trim($request->date_of_birth);
        }

        $teacher->mobile_number = trim($request->mobile_number);

        if(!empty($request->admission_date))
        {
            $teacher->admission_date = trim($request->admission_date);
        }

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
        $teacher->note = trim($request->note);
        $teacher->work_experience = trim($request->work_experience);
        $teacher->status = trim($request->status);
        $teacher->email = trim($request->email);
        if(!empty($request->password))
        {
            $teacher->password = Hash::make($request->password);
        }
        $teacher->save();

        return redirect('admin/teacher/list')->with('success', 'Teacher Updated Successfully');
    }

    public function delete($id)
    {
       $teacher = User::getSingle($id);
       $teacher->is_delete = 1;
       $teacher->save();

        return redirect()->back()->with('success', 'Teacher Deleted Successfully');
    }
}
