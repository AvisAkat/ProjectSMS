@extends('layout.app')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="row">
                <div class="col-md-12 d-flex">
                    <div class="card-body">
                        <form action="" method="GET" enctype="multipart/form-data">
                            
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
                                        <input type="date" class="form-control" placeholder=""
                                        value="{{ Request::get('date') }}" name="date">
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <button type="submit" class="btn btn-outline-primary"><i class="fa fa-search"></i> Search</button> 
                                            <a href="{{ url('admin/admin/list')}}" class="btn btn-outline-danger ml-3">Reset</a>
                                        </div>                                                                                                                                                           
                                    </div>
                                </div>
                                
                            </div>
                        </form>
                    </div>
                    
                </div>

                <div class="card card-table flex-fill">
                    
                    <div class="card-header">
                        <h4 class="card-title float-start">Admin List</h4>
                        <div class="table-search float-end">
                            <a href="{{ url('admin/admin/add') }}" class="btn btn-outline-primary"><i class="fe fe-plus"></i> New
                                Admin</a>
                        </div>
                    </div>
                    @include('_message')
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Profile Picture</th>
                                        <th>Admin Name</th>
                                        <th>Gender</th>
                                        <th>Mobile Number</th>
                                        <th>Admin Email</th>
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
                                            <td>{{ $value->name }} {{ $value->last_name }}</td>
                                            <td>{{ $value->gender }}</td>
                                            <td>{{ $value->mobile_number }}</td>
                                            <td>{{ $value->email }}</td>
                                            <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                                            <td>
                                                <a href="{{ url('admin/admin/edit/' . $value->id) }}"
                                                    class="btn btn-outline-primary"><i class="fe fe-edit"></i> Edit</a>
                                                <a href="{{ url('admin/admin/delete/' . $value->id) }}"
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