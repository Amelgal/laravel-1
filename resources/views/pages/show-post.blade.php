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
        <h1>Submit form</h1>
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
@endsection
