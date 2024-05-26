@extends('layout.app')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="row">
                <div class="col-md-12 d-flex">

                    <div class="card flex-fill">
                        <div class="card-header">
                            <h4 class="card-title float-start">Assign New Subject</h4>
                            <div class="table-search float-end">
                                <a href="{{ url('admin/assign_subject/list') }}" class="btn btn-primary"><i class="fe fe-table"></i>
                                    Assign Subject List</a>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="card-body">
                                <div class="col-md-12">
                                    <div class="card p-3">
                                        
                                        
                                        <form action="" method="post">
                                            {{ csrf_field() }}
                                            <div class="form-group">
                                                <label>Class Name</label>
                                                <select name="class_id" class="form-control">
                                                    <option value="">Select Class</option>
                                                    @foreach ($getClass as $class)
                                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                                    @endforeach
                                                    
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Subject Name</label>
                                                
                                                    @foreach ($getSubject as $subject)
                                                        <div class="form-group">
                                                            <label for="">
                                                                <input type="checkbox" name="subject_id[]" value="{{ $subject->id}}"> {{ $subject->name }}
                                                            </label>
                                                        </div>
                                                    @endforeach
                                            </div>
                                            <div class="form-group">
                                                <label>Class Status</label>
                                                <select name="status" class="form-control">
                                                    <option value="">Select Status</option>
                                                    <option value="0">Active</option>
                                                    <option value="1">Inactive</option>
                                                </select>
                                            </div>
                                            
                                            <div class="text-end">
                                                <button type="submit" class="btn btn-primary d-block">Submit</button>
                                            </div>
                                        </form>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
