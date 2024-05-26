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
                                        
                                        
                                        <form action="" method="post" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label>First Name <span class="text-danger">**</span></label>
                                                    <input type="text" class="form-control" name="name" value="{{ old('name', $getRecord->name) }}" required>
                                                    <span class="text-danger">{{ $errors->first('name')}}</span>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Last Name <span class="text-danger">**</span></label>
                                                    <input type="text" class="form-control" name="last_name" value="{{ old('last_name', $getRecord->last_name) }}" required>
                                                    <span class="text-danger">{{ $errors->first('last_name')}}</span>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Admission Number <span class="text-danger">**</span></label>
                                                    <input type="text" class="form-control" name="admission_number" value="{{ old('admission_number', $getRecord->admission_number) }}" required>
                                                    <span class="text-danger">{{ $errors->first('admission_number')}}</span>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Roll Number <span class="text-danger"></span></label>
                                                    <input type="text" class="form-control" name="roll_number" value="{{ old('roll_number', $getRecord->roll_number) }}" >
                                                    <span class="text-danger">{{ $errors->first('roll_number')}}</span>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Class <span class="text-danger">**</span></label>
                                                    <select name="class_id" class="form-control" required>
                                                        <option value="">Select Class</option>
                                                        @foreach ($getClass as $class)
                                                            <option {{ ($getRecord->class_id == $class->id) ? 'selected': '' }} value="{{ $class->id}}">{{ $class->name }}</option>   
                                                        @endforeach
                                                    </select>
                                                    <span class="text-danger">{{ $errors->first('class_id')}}</span>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Gender <span class="text-danger">**</span></label>
                                                    <select name="gender" class="form-control" required>
                                                        <option value="">Select Gender</option>
                                                        <option {{ ($getRecord->gender == 'male') ? 'selected' : ''}} value="male">Male</option>
                                                        <option {{ ($getRecord->gender == 'female') ? 'selected' : ''}} value="female">Female</option>

                                                    </select>
                                                    <span class="text-danger">{{ $errors->first('gender')}}</span>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Date Of Birth <span class="text-danger">**</span></label>
                                                    <input type="date" class="form-control" name="date_of_birth" value="{{ old('date_of_birth', $getRecord->date_of_birth) }}" required>
                                                    <span class="text-danger">{{ $errors->first('date_of_birth')}}</span>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Caste <span class="text-danger"></span></label>
                                                    <input type="text" class="form-control" name="caste" value="{{ old('caste', $getRecord->caste) }}" >
                                                    <span class="text-danger">{{ $errors->first('caste')}}</span>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Religion <span class="text-danger"></span></label>
                                                    <input type="text" class="form-control" name="religion" value="{{ old('religion', $getRecord->religion) }}" >
                                                    <span class="text-danger">{{ $errors->first('religion')}}</span>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Mobile Number <span class="text-danger"></span></label>
                                                    <input type="text" class="form-control" name="mobile_number" value="{{ old('mobile_number', $getRecord->mobile_number) }}" >
                                                    <span class="text-danger">{{ $errors->first('mobile_number')}}</span>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Admission Date <span class="text-danger">**</span></label>
                                                    <input type="date" class="form-control" name="admission_date" value="{{ old('admission_date', $getRecord->admission_date) }}" required>
                                                    <span class="text-danger">{{ $errors->first('admission_date')}}</span>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Profile Picture <span class="text-danger"></span></label>
                                                    <input type="file" class="form-control" name="profile_pic" >
                                                    <span class="text-danger">{{ $errors->first('profile_pic')}}</span>
                                                    @if (!empty($getRecord->getProfile()))
                                                        <img src="{{ $getRecord->getProfile() }}" alt="" style="width: auto; height: 50px;">
                                                    @endif
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Blood Group <span class="text-danger"></span></label>
                                                    <input type="text" class="form-control" name="blood_group" value="{{ old('blood_group', $getRecord->blood_group) }}" >
                                                    <span class="text-danger">{{ $errors->first('blood_group')}}</span>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Height <span class="text-danger"></span></label>
                                                    <input type="text" class="form-control" name="height" value="{{ old('height', $getRecord->height) }}" >
                                                    <span class="text-danger">{{ $errors->first('height')}}</span>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Weight <span class="text-danger"></span></label>
                                                    <input type="text" class="form-control" name="weight" value="{{ old('weight', $getRecord->weight) }}" >
                                                    <span class="text-danger">{{ $errors->first('weight')}}</span>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Status <span class="text-danger">**</span></label>
                                                    <select name="status" class="form-control" required>
                                                        <option value="">Select Status</option>
                                                        <option {{ ($getRecord->status == 0) ? 'selected' : ''}} value="0">Active</option>
                                                        <option {{ ($getRecord->status == 1) ? 'selected' : ''}} value="1">Inactive</option>
                                                    </select>
                                                    <span class="text-danger">{{ $errors->first('status')}}</span>
                                                </div>
                                            </div>

                                            <hr>
                                            <div class="form-group">
                                                <label>Email Address <span class="text-danger">**</span></label>
                                                <input type="email" class="form-control" name="email" value="{{ old('email', $getRecord->email) }}">
                                                <span class="text-danger">{{ $errors->first('email')}}</span>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Password <span class="text-danger"></span></label>
                                                <input type="text" class="form-control" name="password">
                                                <p class="text-warning">
                                                    Supply New Password If You Want To Change Old Password, else leave blank
                                                </p>
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
