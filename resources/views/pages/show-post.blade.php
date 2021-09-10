@extends('layouts.main-layout')

@section('title', $post->title)

@section('content')
    @include('includes.categories')
    <div>
        <a href="{{route('getPostsByCategory', $slug_category)}}" class="btn btn-outline-primary mb-4">Back</a>
    </div>
    <article>
        {!! $post->text !!}
    </article>
    <div>
        @if(!is_null($comments))
            <div class="container mt-5">
                <div class="row d-block">
                    @foreach($comments as $comment)
                        <div class="card p-3 mt-2">
                            <div class="justify-content-between">
                                <div class="col-md-2">
                                    <small class="font-weight-bold text-primary">
                                        {{$comment->name}}
                                    </small>
                                </div>
                                <div class="col-md-12">
                                    <span>
                                        <small class="font-weight-bold">
                                            {{$comment->text}}
                                        </small>
                                    </span>
                                </div>
                                <div class="col-md-2">
                                    <small>
                                        {{$comment->created_at}}
                                    </small>
                                </div>
                            </div>
                            {{--<div class="action d-flex justify-content-between mt-2 align-items-center">
                                <div class="reply px-4"><small>Remove</small> <span class="dots"> </span>
                                    <small>Reply</small> <span class="dots"></span> <small>Translate</small></div>
                                <div class="icons align-items-center">
                                    <i class="fa fa-check-circle-o check-icon text-primary"></i>
                                </div>
                            </div>--}}
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
        <div class="m-5">
            <h2>Write a comment on the post</h2>
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route('checkComments',$post->id)}}" method="post">
                @csrf
                <input type="text" name="name" id="name" class="form-control"><br>
                <textarea name="comment" id="comment" cols="30" rows="10" class="form-control"></textarea><br>
                <button type="submit" class="btn btn-success">Send</button>
            </form>
        </div>
    </div>
@endsection
