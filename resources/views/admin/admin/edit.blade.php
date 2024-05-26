@extends('layout.app')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="row">
                <div class="col-md-12 d-flex">

                    <div class="card flex-fill">
                        <div class="card-header">
                            <h4 class="card-title float-start">Edit Admin</h4>
                            <div class="table-search float-end">
                                <a href="{{ url('admin/admin/list') }}" class="btn btn-primary"><i class="fe fe-table"></i>
                                    Admin List</a>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="card-body">
                                <div class="col-md-12">
                                    <div class="card p-3">
                                        
                                        
                                        <form action="" method="post">
                                            {{ csrf_field() }}
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input type="text" class="form-control" name="name" required value="{{ old('name', $getRecord->name) }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" class="form-control" name="last_name" required value="{{ old('last_name', $getRecord->last_name) }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Email Address</label>
                                                <input type="email" class="form-control" name="email" required value="{{ old('email', $getRecord->email) }}">
                                                <span class="text-danger">{{ $errors->first('email')}}</span>
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
                                                <label>Mobile Number <span class="text-danger"></span></label>
                                                <input type="text" class="form-control" name="mobile_number" value="{{ old('mobile_number', $getRecord->mobile_number) }}" >
                                                <span class="text-danger">{{ $errors->first('mobile_number')}}</span>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Profile Picture <span class="text-danger"></span></label>
                                                <input type="file" class="form-control" name="profile_pic">
                                                <span class="text-danger">{{ $errors->first('profile_pic')}}</span>
                                                @if (!empty($getRecord->getProfile()))
                                                    <img src="{{ $getRecord->getProfile() }}" alt="" style="width: auto; height: 50px;">
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="text" class="form-control" name="password">
                                                <p class="text-warning">
                                                    Supply New Password If You Want To Change Old Password, else leave blank
                                                </p>
                                            </div>
                                            <div class="text-end">
                                                <button type="submit" class="btn btn-primary d-block mb-5">Update</button>
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
