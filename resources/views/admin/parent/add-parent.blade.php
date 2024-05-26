@extends('layout.app')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="row">
                <div class="col-md-12 d-flex">

                    <div class="card flex-fill">
                        <div class="card-header">
                            <h4 class="card-title float-start">Add New Parent</h4>
                            <div class="table-search float-end">
                                <a href="{{ url('admin/parent/list') }}" class="btn btn-primary"><i class="fe fe-table"></i>
                                    Parent List</a>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="card-body">
                                <div class="col-md-12">
                                    <div class="card p-3">
                                        
                                        
                                        <form action="{{ url('admin/parent/add') }}" method="post" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label>First Name <span class="text-danger">**</span></label>
                                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                                                    <span class="text-danger">{{ $errors->first('name')}}</span>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Last Name <span class="text-danger">**</span></label>
                                                    <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required>
                                                    <span class="text-danger">{{ $errors->first('last_name')}}</span>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Gender <span class="text-danger">**</span></label>
                                                    <select name="gender" class="form-control" required>
                                                        <option value="">Select Gender</option>
                                                        <option {{ (old('gender') == 'Male') ? 'selected': '' }} value="Male">Male</option>
                                                        <option {{ (old('gender') == 'Female') ? 'selected': '' }} value="Female">Female</option>

                                                    </select>
                                                    <span class="text-danger">{{ $errors->first('gender')}}</span>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Occupation <span class="text-danger"></span></label>
                                                    <input type="text" class="form-control" name="occupation" value="{{ old('occupation') }}" >
                                                    <span class="text-danger">{{ $errors->first('occupation')}}</span>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Mobile Number <span class="text-danger"></span></label>
                                                    <input type="text" class="form-control" name="mobile_number" value="{{ old('mobile_number') }}" >
                                                    <span class="text-danger">{{ $errors->first('mobile_number')}}</span>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Address <span class="text-danger"></span></label>
                                                    <input type="textarea" class="form-control" name="address" value="{{ old('address') }}" >
                                                    <span class="text-danger">{{ $errors->first('address')}}</span>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Profile Picture <span class="text-danger"></span></label>
                                                    <input type="file" class="form-control" name="profile_pic" value="{{ old('profile_pic') }}" >
                                                    <span class="text-danger">{{ $errors->first('profile_pic')}}</span>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Status <span class="text-danger">**</span></label>
                                                    <select name="status" class="form-control" required>
                                                        <option value="">Select Status</option>
                                                        <option {{ (old('status') == '0') ? 'selected': '' }} value="0">Active</option>
                                                        <option {{ (old('status') == '1') ? 'selected': '' }} value="1">Inactive</option>
                                                    </select>
                                                    <span class="text-danger">{{ $errors->first('status')}}</span>
                                                </div>
                                            </div>

                                            <hr>
                                            <div class="form-group">
                                                <label>Email Address <span class="text-danger">**</span></label>
                                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                                <span class="text-danger">{{ $errors->first('email')}}</span>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Password <span class="text-danger">**</span></label>
                                                <input type="password" class="form-control" name="password" required>
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
