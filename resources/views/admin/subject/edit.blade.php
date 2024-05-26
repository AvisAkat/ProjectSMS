@extends('layout.app')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="row">
                <div class="col-md-12 d-flex">

                    <div class="card flex-fill">
                        <div class="card-header">
                            <h4 class="card-title float-start"> Edit Subject</h4>
                            <div class="table-search float-end">
                                <a href="{{ url('admin/subject/list') }}" class="btn btn-primary"><i class="fe fe-table"></i>
                                    Subject List</a>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="card-body">
                                <div class="col-md-12">
                                    <div class="card p-3">
                                        
                                        
                                        <form action="" method="post">
                                            {{ csrf_field() }}
                                            <div class="form-group">
                                                <label>Subject Name</label>
                                                <input type="text" class="form-control" name="name" value="{{ old('name', $getRecord->name) }}" placeholder="Class Name">
                                            </div>
                                            <div class="form-group">
                                                <label>Subject Type</label>
                                                <select name="type" class="form-control">
                                                    <option {{ ($getRecord->type == 'Core') ? 'selected' : ''}} value="Core">Core</option>
                                                    <option {{ ($getRecord->type == 'Elective') ? 'selected' : ''}} value="Elective">Elective</option>
                                                    <option {{ ($getRecord->type == 'Practical') ? 'selected' : ''}} value="Practical">Practical</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Subject Status</label>
                                                <select name="status" class="form-control">
                                                    <option {{ ($getRecord->status == 0) ? 'selected' : ''}} value="0">Active</option>
                                                    <option {{ ($getRecord->status == 1) ? 'selected' : ''}} value="1">Inactive</option>
                                                </select>
                                            </div>
                                            
                                            <div class="text-end">
                                                <button type="submit" class="btn btn-primary d-block">Update</button>
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
