@extends('layouts.admin-layout')
@section('title','All Contacts')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>All Contacts</h1>
                    </div>
                </div>
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
                    </div>
                @endif
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Users</h3>
                    <a class="btn breadcrumb float-sm-right btn-outline-dark" href="{{route('contact.create')}}">
                        Add New Contact
                    </a>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                        <tr>
                            <th style="width: 1%">#</th>
                            <th style="width: 15%">User Name</th>
                            <th style="width: 15%">Description</th>
                            <th style="width: 15%">Email</th>
                            <th style="width: 15%">Subject</th>
                            <th style="width: 15%"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($contacts as $contact)
                            <tr>
                                <td>{{$contact->id}}</td>
                                <td>
                                    <a>{{$contact->name}}</a><br/>
                                    <small>{{$contact->created_at}}</small>
                                </td>
                                <td>{{$contact->email}}</td>
                                <td>{{$contact->subject}}</td>
                                <td>{{$contact->text}}</td>
                                <td class="project-state">
                                    <a href="{{route('sendEmail',$contact->id)}}">Send email</a>
                                    <span class="badge badge-success">Success</span>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>
@endsection
