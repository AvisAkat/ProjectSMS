@extends('layout.app')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="row">
                <div class="col-md-12 d-flex">

                    <div class="card flex-fill">
                        <div class="card-header">
                            <h4 class="card-title float-start">Add New Student</h4>
                            <div class="table-search float-end">
                                <a href="{{ url('admin/student/list') }}" class="btn btn-primary"><i class="fe fe-table"></i>
                                    Student List</a>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="card-body">
                                <div class="col-md-12">
                                    <div class="card p-3">
                                        
                                        
                                        <form action="{{ url('admin/student/add') }}" method="post" enctype="multipart/form-data">
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
                                                    <label>Admission Number <span class="text-danger">**</span></label>
                                                    <input type="text" class="form-control" name="admission_number" value="{{ old('admission_number') }}" required>
                                                    <span class="text-danger">{{ $errors->first('admission_number')}}</span>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Roll Number <span class="text-danger"></span></label>
                                                    <input type="text" class="form-control" name="roll_number" value="{{ old('roll_number') }}" >
                                                    <span class="text-danger">{{ $errors->first('roll_number')}}</span>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Class <span class="text-danger">**</span></label>
                                                    <select name="class_id" class="form-control" required>
                                                        <option value="">Select Class</option>
                                                        @foreach ($getClass as $class)
                                                            <option {{ (old('admission_number') == $class->id) ? 'selected': '' }} value="{{ $class->id}}">{{ $class->name }}</option>   
                                                        @endforeach
                                                    </select>
                                                    <span class="text-danger">{{ $errors->first('class_id')}}</span>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Gender <span class="text-danger">**</span></label>
                                                    <select name="gender" class="form-control" required>
                                                        <option value="">Select Gender</option>
                                                        <option {{ (old('gender') == 'Male') ? 'selected': '' }} value="male">Male</option>
                                                        <option {{ (old('gender') == 'Female') ? 'selected': '' }} value="female">Female</option>

                                                    </select>
                                                    <span class="text-danger">{{ $errors->first('gender')}}</span>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Date Of Birth <span class="text-danger">**</span></label>
                                                    <input type="date" class="form-control" name="date_of_birth" value="{{ old('date_of_birth') }}" required>
                                                    <span class="text-danger">{{ $errors->first('date_of_birth')}}</span>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Caste <span class="text-danger"></span></label>
                                                    <input type="text" class="form-control" name="caste" value="{{ old('caste') }}" >
                                                    <span class="text-danger">{{ $errors->first('caste')}}</span>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Religion <span class="text-danger"></span></label>
                                                    <input type="text" class="form-control" name="religion" value="{{ old('religion') }}" >
                                                    <span class="text-danger">{{ $errors->first('religion')}}</span>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Mobile Number <span class="text-danger"></span></label>
                                                    <input type="text" class="form-control" name="mobile_number" value="{{ old('mobile_number') }}" >
                                                    <span class="text-danger">{{ $errors->first('mobile_number')}}</span>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Admission Date <span class="text-danger">**</span></label>
                                                    <input type="date" class="form-control" name="admission_date" value="{{ old('admission_date') }}" required>
                                                    <span class="text-danger">{{ $errors->first('admission_date')}}</span>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Profile Picture <span class="text-danger"></span></label>
                                                    <input type="file" class="form-control" name="profile_pic" value="{{ old('profile_pic') }}" >
                                                    <span class="text-danger">{{ $errors->first('profile_pic')}}</span>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Blood Group <span class="text-danger"></span></label>
                                                    <input type="text" class="form-control" name="blood_group" value="{{ old('blood_group') }}" >
                                                    <span class="text-danger">{{ $errors->first('blood_group')}}</span>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Height <span class="text-danger"></span></label>
                                                    <input type="text" class="form-control" name="height" value="{{ old('height') }}" >
                                                    <span class="text-danger">{{ $errors->first('height')}}</span>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Weight <span class="text-danger"></span></label>
                                                    <input type="text" class="form-control" name="weight" value="{{ old('weight') }}" >
                                                    <span class="text-danger">{{ $errors->first('weight')}}</span>
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
