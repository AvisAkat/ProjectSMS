@extends('layout.app')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="row">
                <div class="col-md-12 d-flex">

                    <div class="card flex-fill">
                        <div class="card-header">
                            <h4 class="card-title float-start">Change Password</h4>
                            
                        </div>
                        <div class="row mt-3">
                            <div class="card-body">
                                @include('_message')
                                <div class="col-md-12">
                                    <div class="card p-3">
                                        <form action="" method="post">
                                            {{ csrf_field() }}
                                            <div class="form-group">
                                                <label>Old Password</label>
                                                <input type="password" class="form-control" name="old_password" required placeholder="Old Password">
                                            </div>
                                            <div class="form-group">
                                                <label>New Password</label>
                                                <input type="password" class="form-control" name="new_password" required placeholder="New Password">
                                            </div>
                                           
                                            
                                            <div class="text-end">
                                                <button type="submit" class="btn btn-primary d-block">Update</button>
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
