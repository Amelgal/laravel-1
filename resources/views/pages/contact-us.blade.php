@extends('layouts.main-layout')

@section('title', 'Contact Us')

@section('content')
    <div class="">
        <div class="m-5">
            <h2>Send your contact to us</h2>
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
            <form action="{{route('contact-us.store')}}" method="post">
                @csrf
                <label for="name">Your name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}"><br>

                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}"><br>

                <label for="subject">Subject</label>
                <input type="text" name="subject" id="subject" class="form-control" value="{{ old('subject') }}"><br>

                <label for="text">Subject description</label>
                <textarea name="text" id="text" cols="30" rows="10" class="form-control"></textarea><br>

                <div class="col text-center">
                    <button type="submit" class="btn btn-success w-25" >Send</button>
                </div>
            </form>
        </div>
    </div>
@endsection
