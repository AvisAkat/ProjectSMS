@extends('layout.app')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="row">
                <div class="col-md-12 d-flex">

                    <div class="card flex-fill">
                        <div class="card-header">
                            <h1 class="card-title float-start">My Account</h1>
                            {{-- <div class="table-search float-end">
                                <a href="{{ url('admin/teacher/list') }}" class="btn btn-primary" @disabled(true)><i class="fe fe-table"></i>
                                    Teachers List</a>
                            </div> --}}
                        </div>
                        @include('_message')
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
                                                    <label>Gender <span class="text-danger">**</span></label>
                                                    <select name="gender" class="form-control" required>
                                                        <option value="">Select Gender</option>
                                                        <option {{ ($getRecord->gender == 'Male') ? 'selected': '' }} value="Male">Male</option>
                                                        <option {{ ($getRecord->gender == 'Female') ? 'selected': '' }} value="Female">Female</option>

                                                    </select>
                                                    <span class="text-danger">{{ $errors->first('gender')}}</span>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Date Of Birth <span class="text-danger"></span></label>
                                                    <input type="date" class="form-control" name="date_of_birth" value="{{ old('date_of_birth', $getRecord->date_of_birth) }}" >
                                                    <span class="text-danger">{{ $errors->first('date_of_birth')}}</span>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Mobile Number <span class="text-danger"></span></label>
                                                    <input type="text" class="form-control" name="mobile_number" value="{{ old('mobile_number', $getRecord->mobile_number) }}" >
                                                    <span class="text-danger">{{ $errors->first('mobile_number')}}</span>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Marital Status <span class="text-danger">**</span></label>
                                                    <select name="marital_status" class="form-control" required>
                                                        <option value="">Select Marital Status</option>
                                                        <option {{ ($getRecord->marital_status == 'Single') ? 'selected': '' }} value="Single">Single</option>
                                                        <option {{ ($getRecord->marital_status == 'Divorced') ? 'selected': '' }} value="Divorced">Divorced</option>
                                                        <option {{ ($getRecord->marital_status == 'Married') ? 'selected': '' }} value="Married">Married</option>
                                                    </select>
                                                    <span class="text-danger">{{ $errors->first('status')}}</span>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Profile Picture <span class="text-danger"></span></label>
                                                    <input type="file" class="form-control" name="profile_pic" value="{{ old('profile_pic') }}" >
                                                    <span class="text-danger">{{ $errors->first('profile_pic')}}</span>
                                                    @if (!empty($getRecord->getProfile()))
                                                        <img src="{{ $getRecord->getProfile() }}" alt="" style="width: auto; height: 50px;">
                                                    @endif
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Current Address <span class="text-danger"></span></label>
                                                    <textarea class="form-control" name="address" rows="3" value="" >{{ old('address', $getRecord->address) }}
                                                    </textarea>
                                                    <span class="text-danger">{{ $errors->first('address')}}</span>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Permanent Address <span class="text-danger"></span></label>
                                                    <textarea class="form-control" name="permanent_address" rows="3">{{ old('permanent_address', $getRecord->permanent_address) }}
                                                    </textarea>
                                                    <span class="text-danger">{{ $errors->first('permanent_address')}}</span>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Qualification <span class="text-danger"></span></label>
                                                    <textarea class="form-control" name="qualification" rows="3">{{ old('qualification', $getRecord->qualification) }}
                                                    </textarea>
                                                    <span class="text-danger">{{ $errors->first('qualification')}}</span>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Work Experience <span class="text-danger"></span></label>
                                                    <textarea class="form-control" name="work_experience" rows="3">{{ old('work_experience', $getRecord->work_experience) }}
                                                    </textarea>
                                                    <span class="text-danger">{{ $errors->first('work_experience')}}</span>
                                                </div>
                                            </div>

                                            <hr>
                                            <div class="form-group">
                                                <label>Email Address <span class="text-danger">**</span></label>
                                                <input type="email" class="form-control" name="email" value="{{ old('email', $getRecord->email) }}">
                                                <span class="text-danger">{{ $errors->first('email')}}</span>
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
