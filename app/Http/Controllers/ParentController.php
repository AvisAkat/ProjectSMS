<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ParentController extends Controller
{
    public function list()
    {
        $data['header_title'] = 'Parent List';
        $data['getRecord'] = User::getParent();
        return view('admin.parent.list', $data);
    }

    public function add()
    {
        $data['header_title'] = 'Add Parent';
        return view('admin.parent.add-parent', $data);
    }

    public function insert(Request $request)
    {
        request()->validate([
            'email' => 'required|email|unique:users',
            'mobile_number' => 'min:10|max:15',
        ]);

        $parent = new User;
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
        $parent->status = trim($request->status);
        $parent->email = trim($request->email);
        $parent->password = Hash::make($request->password);
        $parent->user_type = 4;
        $parent->save();

        return redirect('admin/parent/list')->with('success', 'Parent Created Successfully');
    }

    public function edit($id)
    {
        $data['getRecord'] = User::getSingle($id);
        if(!empty($data['getRecord']))
        {

            $data['header_title']= 'Edit Parent';
            return view('admin.parent.edit', $data);
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


        $parent = User::getSingle($id);
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
        $parent->status = trim($request->status);
        $parent->email = trim($request->email);
        if(!empty($request->password))
        {
            $parent->password = Hash::make($request->password);
        }
        
        $parent->save();


        return redirect('admin/parent/list')->with('success', 'Parent Updated Successfully');
    }

    public function delete($id)
    {
        $parent = User::getSingle($id);
        $parent->is_delete = 1;
        $parent->save();

        return redirect()->back()->with('success', 'Parent Deleted Successfully');
    }

    public function myStudent($id)
    {
        $data['parent_id'] = $id;
        $data['getParent'] = User::getSingle($id);
        $data['getSearchStudent'] = User::getSearchStudent();
        $data['getRecord'] = User::getMyStudent($id);
        $data['header_title'] = 'Parent Student List';
        return view('admin.parent.my_student', $data);
    }

    public function assignStudentParent($student_id, $parent_id)
    {
        $student = User::getSingle($student_id);
        $student->parent_id = $parent_id;
        $student->save();

        return redirect()->back()->with('success', 'Student Successfully Assigned');
    }
    public function assignStudentParentDelete($student_id)
    {
        $student = User::getSingle($student_id);
        $student->parent_id = null;
        $student->save();

        return redirect()->back()->with('success', 'Student Parent Assign Deleted');
    }
}
