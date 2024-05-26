<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // --------------- CONTROLLER FOR VIEW FUNCTION ------------------------------------------------------\\

    public function list()
    {
        $data['header_title'] = 'Admin';
        $data['getRecord'] = User::getAdmin();
        return view('admin.admin.list', $data);

    }

    // --------------- CONTROLLER FOR ADD FUNCTION ------------------------------------------------------\\

    public function add()
    {
        $data['header_title'] = 'Add New Admin';
        return view('admin.admin.add-admin', $data);
    }

    // --------------- CONTROLLER FOR CREATE FUNCTION ------------------------------------------------------\\

    public function insert(Request $request)
    {
        request()->validate([
            'email' => 'required|email|unique:users'
        ]);

        $user = new User;
        $user->name = trim($request->name);
        $user->last_name = trim($request->last_name);
        $user->gender = trim($request->gender);
        $user->mobile_number = trim($request->mobile_number);
        $user->email = trim($request->email);
        if(!empty($request->file('profile_pic')))
        {
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('uploads/profiles/', $filename);

            $user->profile_pic = $filename;
        }
        $user->password = Hash::make($request->password);
        $user->user_type = 1;
        $user->save();

        return redirect('admin/admin/list')->with('success', 'Admin created successfully');
        
    }

    // --------------- CONTROLLER FOR EDIT FUNCTION ------------------------------------------------------\\

    public function edit($id)
    {
        $data['getRecord'] = User::getSingle($id);
        if(!empty($data['getRecord']))
        {
            $data['header_title']= 'Edit Admin';
            return view('admin.admin.edit', $data);
        }
        else
        {
            abort(404);
        }
        
    }

    // --------------- CONTROLLER FOR UPDATE FUNCTION ------------------------------------------------------\\

    public function update($id, Request $request)
    {
        request()->validate([
            'email' => 'required|email|unique:users,email,'.$id
        ]);

        $admin = User::getSingle($id);
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
        if(!empty($request->password))
        {
            $admin->password = Hash::make($request->password);
        }
        $admin->save();

        return redirect('admin/admin/list')->with('success', 'Admin Updated successfully');
    }

    // --------------- CONTROLLER FOR DELETE FUNCTION ------------------------------------------------------\\

    public function delete($id)
    {
        $user = User::getSingle($id);
        $user->is_delete = 1;
        $user->save();

        return redirect('admin/admin/list')->with('success', 'Admin Deleted Successfully');
    }
}
