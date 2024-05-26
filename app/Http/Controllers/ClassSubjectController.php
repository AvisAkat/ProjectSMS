<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\SubjectModel;
use Illuminate\Http\Request;
use App\Models\ClassSubjectModel;
use Illuminate\Support\Facades\Auth;

class ClassSubjectController extends Controller
{
    public function list()
    {
        $data['header_title'] = 'Subject Assign List';
        $data['getRecord'] = ClassSubjectModel::getRecord();

        return view('admin.assign_subject.list', $data);
    }

    public function add()
    {
        $data['getClass'] = ClassModel::getClass();
        $data['getSubject'] = SubjectModel::getSubject();
        $data['header_title'] = 'Assign Subject';

        return view('admin.assign_subject.add-assign_subject', $data);
    }

    public function insert(Request $request)
    {
        if(!empty($request->subject_id))
        {
            foreach($request->subject_id as $subject_id)
            {
                $getAlreadyFirst = ClassSubjectModel::getAlreadyFirst($request->class_id, $subject_id);
                if(!empty($getAlreadyFirst))
                {
                    $getAlreadyFirst->status = $request->status;
                    $getAlreadyFirst->save();
                }
                else
                {

                    $data = new ClassSubjectModel;
                    $data->class_id = $request->class_id;
                    $data->subject_id = $subject_id;
                    $data->status = $request->status;
                    $data->created_by = Auth::user()->id;
                    $data->save();
                }
            }

            return redirect(url('admin/assign_subject/list'))->with('success', 'Subject Assigned To Class Successfully');
        }
        else
        {
            return redirect()->back()->with('error', 'Oops!! SOmething went wrong, please try again later. Thanks');
        }
    }

    public function edit($id)
    {
        $getRecord = ClassSubjectModel::getSingle($id);
        
        if(!empty($getRecord))
        {
            $data['getRecord'] = $getRecord;
            $data['getAssignSubjectID'] = ClassSubjectModel::getAssignSubjectID($getRecord->class_id); // Corrected ($getRecord->id) to ($getRecord->class_id) to get checked

            $data['getClass'] = ClassModel::getClass();
            $data['getSubject'] = SubjectModel::getSubject();

            $data['header_title'] = 'Edit Assign Subject';
            return view('admin.assign_subject.edit', $data);
        }
        else
        {
            abort(404);
        }
    }
    
    public function update($id, Request $request)
    {
        ClassSubjectModel::deleteSubject($request->class_id);

        if(!empty($request->subject_id))
        {
            foreach($request->subject_id as $subject_id)
            {
                $getAlreadyFirst = ClassSubjectModel::getAlreadyFirst($request->class_id, $subject_id);
                if(!empty($getAlreadyFirst))
                {
                    $getAlreadyFirst->status = $request->status;
                    $getAlreadyFirst->save();
                }
                else
                {

                    $data = new ClassSubjectModel;
                    $data->class_id = $request->class_id;
                    $data->subject_id = $subject_id;
                    $data->status = $request->status;
                    $data->created_by = Auth::user()->id;
                    $data->save();
                }
            }
        }

        return redirect(url('admin/assign_subject/list'))->with('success', 'Subject Assigned To Class Successfully');
    }

    public function delete($id)
    {
        $data = ClassSubjectModel::getSingle($id);
        $data->is_delete = 1;
        $data->save();

        return redirect('admin/assign_subject/list')->with('success', ' Data Deleted Successfully');
    }

    public function edit_single($id)
    {
        $getRecord = ClassSubjectModel::getSingle($id);
        
        if(!empty($getRecord))
        {
            $data['getRecord'] = $getRecord;
            
            $data['getClass'] = ClassModel::getClass();
            $data['getSubject'] = SubjectModel::getSubject();

            $data['header_title'] = 'Edit Assign Subject';
            return view('admin.assign_subject.edit_single', $data);
        }
        else
        {
            abort(404);
        }
    }

    public function update_single($id, Request $request)
    {
       
        $getAlreadyFirst = ClassSubjectModel::getAlreadyFirst($request->class_id, $request->subject_id);
        if(!empty($getAlreadyFirst))
        {
            $getAlreadyFirst->status = $request->status;
            $getAlreadyFirst->save();

            return redirect(url('admin/assign_subject/list'))->with('success', 'Status Updated Successfully');
        }
        else
        {

            $data = ClassSubjectModel::getSingle($id);
            $data->class_id = $request->class_id;
            $data->subject_id = $request->subject_id;
            $data->status = $request->status;
            $data->save();

            return redirect(url('admin/assign_subject/list'))->with('success', 'Subject Assigned To Class Successfully');
        }   
    }
}
