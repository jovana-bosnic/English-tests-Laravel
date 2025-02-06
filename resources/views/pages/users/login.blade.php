@extends('layouts.layout')

@section('title') English tests - Log in @endsection
@section('description') For certain actions on our site and solving tests, we prefer that you log in. @endsection
@section('keywords') English test, Test, Exercises, Business, Log in, User @endsection

@section('content')
    <div class="contact">
        <div class="container">
            <div class="row">
                @if(Session::get('success'))
                    <div class="alert alert-success mt-5 col-12" role="alert">
                        {{Session::get('success')}}
                    </div>
                @endif
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2><strong class="yellow">If you are an unregistered user:
                                <a class="text-dark" href="{{ route("register") }}" style="text-decoration: underline !important;">Create user account</a></strong>
                        </h2>
                        <p>For certain actions on our site and solving tests, we prefer that you log in.
                            This way you will be able to track your results and improve your knowledge.</p>
                        <h2 class="mt-5">LOG IN</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <form action="{{route("doLogin")}}" method="post" class="contact_form">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <label for="email">Email</label>
                                <input class="contact_control" type="email" id="email" name="email">
                            </div>
                            <div class="col-md-12">
                                <label for="password">Password</label>
                                <input class="contact_control" type="password" id="password" name="password">
                            </div>
                            <div class="col-3">
                                <button type="submit" class="send_btn">Login</button>
                            </div>
                        </div>
                    </form>
                    @if(Session::get('error'))
                        <div class="alert alert-danger mt-5" role="alert">
                            {{Session::get('error')}}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection

