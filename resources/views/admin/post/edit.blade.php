@extends('layouts.admin-layout')
@section('title','Edit Post')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Post</h1>
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
                            <form action="{{route('post.update', $post)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label for="title">Title</label>
                                            <input type="text" name="title"
                                                   class="form-control" id="title"
                                                   placeholder="Enter post title"
                                                   required value="{{$post->title}}">
                                        </div>
                                        <div class="col-sm-12">
                                            <label for="description">Description</label>
                                            <input type="text"
                                                   name="description"
                                                   class="form-control"
                                                   id="description"
                                                   placeholder="Enter post description"
                                                   required value="{{$post->description}}">
                                        </div>
                                        <div class="col-sm-12">
                                            <label for="post_text">Text</label>
                                            <textarea name="post_text" id="post_text" cols="30" rows="10"
                                                      class="form-control">{{$post->text}}</textarea>
                                        </div>
                                        <div class="col-sm-12">
                                            <!-- select -->
                                            <div class="form-group">
                                                <label>Select</label>
                                                <select class="form-control" name="category_id" id="category_id">
                                                    @foreach($categories as $category)
                                                        <option value="{{$category->id}}"
                                                                @if($category->id == $post->category_id) selected @endif>{{$category->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <!-- select -->
                                            <div class="form-group">
                                                <label for="feature_image">Feature Image</label>
                                                <img src="{{$post->image_path}}" alt="" class="feature_image_uploaded d-block m-3"
                                                     width="90%">
                                                <input type="text" id="feature_image" name="feature_image" value="{{$post->image_path}}"
                                                       class="form-control" readonly>
                                                <a href="" class="popup_selector" data-inputid="feature_image">
                                                    Select Image </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
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
