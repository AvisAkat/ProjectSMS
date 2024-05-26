<?php

namespace App\Http\Controllers;

use App\Models\SubjectModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    public function list()
    {
        $data['header_title'] = 'Subject List';
        $data['getRecord'] = SubjectModel::getRecord();
        return view('admin.subject.list', $data);
    }

    public function add()
    {
        $data['header_title'] = 'Add New Subject';
        return view('admin.subject.add-subject', $data);
    }

    public function insert(Request $request)
    {
        $subject = new SubjectModel;
        $subject->name = trim($request->name);
        $subject->status = trim($request->status);
        $subject->type = trim($request->type);
        $subject->created_by = Auth::user()->id;

        $subject->save();

        return redirect(url('admin/subject/list'))->with('success', 'Subject Created Successfully');
    }

    public function edit($id, Request $request)
    {
        $data['getRecord'] = SubjectModel::getSingle($id);
        if(!empty($data['getRecord']))
        {

            $data['header_title'] = 'Edit Subject';
            return view('admin.subject.edit', $data);
        }
        else
        {
            abort(404);
        }
    }

    public function update($id, Request $request)
    {
        $subject = SubjectModel::getSingle($id);
        $subject->name = trim($request->name);
        $subject->status = trim($request->status);
        $subject->type = trim($request->type);

        $subject->save();

        return redirect(url('admin/subject/list'))->with('success', 'Subject Updated Successfully');
    }


    public function delete($id)
    {
        $class = SubjectModel::getSingle($id);
        $class->is_delete = 1;
        $class->save();

        return redirect('admin/subject/list')->with('success', 'Subject Deleted Successfully');
    }
}
