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
                                <a href="{{ url('admin/student/list') }}" class="btn btn-primary"><i class="fe fe-table"></i>
                                    Student List</a>
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
                                                        <option {{ old('gender', $getRecord->gender == 'Male') ? 'selected' : '' }} value="Male">Male</option>
                                                        <option {{ old('gender', $getRecord->gender == 'Female') ? 'selected' : '' }} value="Female">Female</option>

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
                                                    <label>Profile Picture <span class="text-danger"></span></label>
                                                    <input type="file" class="form-control" name="profile_pic" >
                                                    <span class="text-danger">{{ $errors->first('profile_pic')}}</span>
                                                    @if (!empty($getRecord->getProfile()))
                                                        <img src="{{ $getRecord->getProfile() }}" alt="" style="width: auto; height: 50px;">
                                                    @endif
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Blood Group <span class="text-danger"></span></label>
                                                    <input type="text" class="form-control" name="blood_group" value="{{ old('blood_group', $getRecord->blood_group) }}" readonly>
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
