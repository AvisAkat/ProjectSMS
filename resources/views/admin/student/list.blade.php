@extends('layout.app')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="row">
                <div class="col-md-12 d-flex">
                    <div class="card-body">
                        <form action="" method="GET">
                            
                            <div class="form-group row mb-0">
                                <div class="form-group col-md-3">
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" ><i class="fa fa-search"></i></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Search by First Name"
                                             value="{{ Request::get('name') }}" name="name">
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" ><i class="fa fa-search"></i></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Search by Last Name"
                                             value="{{ Request::get('last_name') }}" name="last_name">
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="sizing-addon3"><i class="fa fa-search"></i></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Search by Email"
                                        value="{{ Request::get('email') }}" name="email">
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="sizing-addon3"><i class="fa fa-search"></i></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Search by Class"
                                        value="{{ Request::get('class') }}" name="class">
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="sizing-addon3"><i class="fa fa-search"></i></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Search by Caste"
                                        value="{{ Request::get('caste') }}" name="caste">
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="sizing-addon3"><i class="fa fa-search"></i></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Search by Admission Number"
                                        value="{{ Request::get('admission_number') }}" name="admission_number">
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="sizing-addon3"><i class="fa fa-search"></i></span>
                                        </div>
                                        <input type="date" class="form-control" placeholder=""
                                        value="{{ Request::get('date') }}" name="date">
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <button type="submit" class="btn btn-outline-primary"><i class="fa fa-search"></i> Search</button> 
                                            <a href="{{ url('admin/student/list')}}" class="btn btn-outline-danger ml-3">Reset</a> 
                                        </div>                                                                                                                                                           
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                </div>

                <div class="card card-table flex-fill">
                    
                    <div class="card-header">
                        <h4 class="card-title float-start">Student List</h4>
                        <div class="table-search float-end">
                            <a href="{{ url('admin/student/add') }}" class="btn btn-outline-primary"><i class="fe fe-plus"></i> New
                                Student</a>
                        </div>
                    </div>
                    @include('_message')
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Profile</th>
                                        <th>Student Name</th>
                                        <th>Parent Name</th>
                                        <th>Email</th>
                                        <th>Class</th>
                                        <th>Admission Number</th>
                                        <th>Roll Number</th>
                                        <th>Gender</th>
                                        <th>Date Of Birth</th>
                                        <th>Caste</th>
                                        <th>Religion</th>
                                        <th>Mobile Number</th>
                                        <th>Admission Date</th>
                                        <th>Blood Group</th>
                                        <th>Height</th>
                                        <th>Weight</th>
                                        <th>Status</th>
                                        <th>Created Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($getRecord as $value)
                                        <tr>
                                            <td>{{ $value->id }}</td>
                                            <td>
                                                @if (!empty($value->getProfile()))   
                                                    <img src="{{ $value->getProfile() }}" alt="" style="width: 100px; height:100px;border-radius:50px">
                                                @endif
                                            </td>
                                            <td>{{ $value->name }} {{ $value->last_name}}</td>
                                            <td>{{ $value->parent_name }} {{ $value->parent_lastname}}</td>
                                            <td>{{ $value->email }}</td>
                                            <td>{{ $value->class_name }}</td>
                                            <td>{{ $value->admission_number }}</td>
                                            <td>{{ $value->roll_number }}</td>
                                            <td>{{ $value->gender }}</td>
                                            <td>{{ date('d-m-Y', strtotime($value->date_of_birth)) }}</td>
                                            <td>{{ $value->caste }}</td>
                                            <td>{{ $value->religion }}</td>
                                            <td>{{ $value->mobile_number }}</td>
                                            <td>{{ date('d-m-Y', strtotime($value->admission_date)) }}</td>
                                            <td>{{ $value->blood_group }}</td>
                                            <td>{{ $value->height }}</td>
                                            <td>{{ $value->weight }}</td>
                                            <td>
                                                @if ($value->status == 0)
                                                    Active
                                                @else
                                                    Inactive
                                                @endif
                                            </td>
                                            <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                                            <td>
                                                <a href="{{ url('admin/student/edit/' . $value->id) }}"
                                                    class="btn btn-outline-primary"><i class="fe fe-edit"></i> Edit</a>
                                                <a href="{{ url('admin/student/delete/' . $value->id) }}"
                                                    class="btn btn-outline-danger"><i class="fe fe-trash"></i> Delete</a>
                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <div class="p-3" style="padding: 10px; float: right">
                                {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                                showing results for {{ $getRecord->total() }}
                            </div>
                        </div>
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
