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
                                        <input type="text" class="form-control" placeholder="Search by Name"
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
                                <div class="form-group col-md-2">
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="sizing-addon3"><i class="fa fa-search"></i></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Search by Email"
                                        value="{{ Request::get('email') }}" name="email">
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="sizing-addon3"><i class="fa fa-search"></i></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Search by Student ID"
                                        value="{{ Request::get('id') }}" name="id">
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <button type="submit" class="btn btn-outline-primary"><i class="fa fa-search"></i> Search</button> 
                                            <a href="{{ url('admin/parent/my-student/'.$parent_id)}}" class="btn btn-outline-danger ml-3">Reset</a>
                                        </div>                                                                                                                                                           
                                    </div>
                                </div>
                                
                            </div>
                        </form>
                    </div>
                    
                </div>

                <div class="card card-table flex-fill">
                    <div class="card-header">
                        <h4 class="card-title float-start"> {{ $getParent->last_name.','.' '. $getParent->name }} ( Parent - Student List )</h4>
                    </div>
                    <div class="card-header">
                        <h4 class="card-title float-start">Student List</h4>
                        
                    </div>
                    @include('_message')
                @if (!empty($getSearchStudent))
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Profile Picture</th>
                                        <th>Student Name</th>
                                        <th>Email</th>
                                        <th>Parent Name</th>
                                        <th>Created Date</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($getSearchStudent as $value)
                                        <tr>
                                            <td>{{ $value->id }}</td>
                                            <td>
                                                @if (!empty($value->getProfile()))   
                                                    <img src="{{ $value->getProfile() }}" alt="" style="width: 100px; height:100px;border-radius:50px">
                                                @endif
                                            </td>
                                            <td>{{ $value->name }} {{ $value->last_name}}</td>
                                            <td>{{ $value->email }}</td>
                                            <td>{{ $value->parent_name }} {{ $value->parent_lastname }}</td>
                                            <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                                            <td>
                                                <a href="{{ url('admin/parent/assign_student_parent/' . $value->id.'/'.$parent_id) }}" {{-- this value_id is the student's id whies parent id is parent id --}}
                                                    class="btn btn-outline-primary"><i class="fe fe-plus"></i> Add Student To Parent
                                                </a>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="p-3" style="padding: 10px; float: right">
                                {{-- {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                                showing results for {{ $getRecord->total() }} --}}
                            </div>
                        </div>
                    </div>
                @endif
                    
                    
                </div>
                <div class="card card-table flex-fill">
                    
                    <div class="card-header">
                        <h4 class="card-title float-start">Parent Student List</h4>
                        
                    </div>
                    @include('_message')
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Profile Picture</th>
                                        <th>Student Name</th>
                                        <th>Email</th>
                                        <th>Parent Name</th>
                                        <th>Created Date</th>
                                        <th></th>
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
                                            <td>{{ $value->email }}</td>
                                            <td>{{ $value->parent_name }} {{ $value->parent_lastname }}</td>
                                            <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                                            <td>
                                                <a href="{{ url('admin/parent/assign_student_parent_delete/'.$value->id) }}" {{-- this value_id is the student id --}}
                                                    class="btn btn-outline-danger"><i class="fe fe-trash"></i> Delete
                                                </a>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="p-3" style="padding: 10px; float: right">
                                {{-- {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                                showing results for {{ $getRecord->total() }} --}}
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
