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
                                        <input type="text" class="form-control" placeholder="Search by Subject"
                                             value="{{ Request::get('name') }}" name="name">
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="sizing-addon3"><i class="fa fa-search"></i></span>
                                        </div>
                                        <select name="type" class="form-control">
                                            <option value="">Select Type</option>
                                            <option {{ (Request::get('type') == 'Theory') ? 'selected' : '' }} value="Theory">Theory</option>
                                            <option {{ (Request::get('type') == 'Practical') ? 'selected' : '' }} value="Practical">Practical</option>
                                        </select>
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
                                            <a href="{{ url('admin/subject/list')}}" class="btn btn-outline-danger ml-3">Reset</a> 
                                        </div>                                                                                                                                                           
                                    </div>
                                </div>
                                
                            </div>
                        </form>
                    </div>
                    
                </div>

                <div class="card card-table flex-fill">
                    
                    <div class="card-header">
                        <h4 class="card-title float-start">List Of Subjects</h4>
                        <div class="table-search float-end">
                            <a href="{{ url('admin/subject/add') }}" class="btn btn-outline-primary"><i class="fe fe-plus"></i> New
                                Subject</a>
                        </div>
                    </div>
                    @include('_message')
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Subject Name</th>
                                        <th>Subject Type</th>
                                        <th>Subject Status</th>
                                        <th>Created By</th>
                                        <th>Created Date</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($getRecord as $value)
                                        <tr>
                                            <td>{{ $value->id }}</td>
                                            <td>{{ $value->name }}</td>
                                            <td>{{ $value->type }}</td>
                                            <td>
                                                @if ($value->status == 0)
                                                    Active
                                                @else
                                                    Inactive
                                                @endif
                                            </td>
                                            <td>{{ $value->created_by_name }}</td>
                                            <td>{{ date('d-m-Y H:i A', strtotime($value->created_at))}}</td>
                                            <td>
                                                <a href="{{ url('admin/subject/edit/' . $value->id) }}"
                                                class="btn btn-outline-primary"><i class="fe fe-edit"></i> Edit</a>
                                                <a href="{{ url('admin/subject/delete/' . $value->id) }}"
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
