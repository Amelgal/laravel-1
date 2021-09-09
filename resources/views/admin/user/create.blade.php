@extends('layouts.admin-layout')
@section('title','New user')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">New User</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
                    </div>
                @endif
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <!-- form start -->
                            <form action="{{route('user.store')}}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label for="name">Name</label>
                                            <input type="text" name="name"
                                                   class="form-control" id="name"
                                                   placeholder="Enter user name"
                                                   required>
                                        </div>
                                        <div class="col-sm-12">
                                            <label for="email">Email</label>
                                            <input type="text"
                                                   name="email"
                                                   class="form-control"
                                                   id="email"
                                                   placeholder="Enter user email"
                                                   required>
                                        </div>
                                        <div class="col-sm-12">
                                            <label for="password">Password</label>
                                            <input type="text"
                                                   name="password"
                                                   class="form-control"
                                                   id="password"
                                                   placeholder="Enter user email"
                                                   required>
                                        </div>
                                        <div class="col-sm-12">
                                            <!-- select -->
                                            <div class="form-group">
                                                <label>Select role</label>
                                                <select class="form-control" name="role_name" id="role_name" multiple>
                                                    @foreach($roles as $role)
                                                        <option value="{{$role->name}}">{{$role->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <!-- select -->
                                            <div class="form-group">
                                                <label for="feature_image">Feature Image</label>
                                                <img src="" alt="" class="feature_image_uploaded d-block m-3" width="200px">
                                                <input type="text" id="feature_image" name="feature_image" value=""
                                                       class="form-control" readonly>
                                                <a href="" class="popup_selector" data-inputid="feature_image">
                                                    Select Image </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
