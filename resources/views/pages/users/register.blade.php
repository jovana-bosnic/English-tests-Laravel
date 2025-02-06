@extends('layouts.layout')

@section('title') English tests - Registration @endsection
@section('description') If you are unregistered user, create account and solve our tests. @endsection
@section('keywords') English test, Test, Exercises, Register, User @endsection

@section('content')
    <div class="contact">
        <div class="row">
            <div class="col-md-12">
                <div class="titlepage">
                    <h2>
                        <strong class="yellow">User registration</strong>
                    </h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 offset-md-2">
                <form action="{{route("doRegister")}}" class="contact_form" method="post" role="form">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6 mb-3">
                            <label for="firstname">First name</label>
                            <input type="text" class="contact_control" id="firstname" name="firstname">
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <label for="lastname">Last name</label>
                            <input type="text" class="contact_control" id="lastname" name="lastname">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="contact_control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="password">Password</label>
                        <input type="password" class="contact_control" id="password" name="password">
                    </div>
                    <div class="mb-3">
                        <label for="confirm">Confirm password</label>
                        <input type="password" class="contact_control" id="confirm" name="confirm">
                    </div>
                    <div class="row">
                        <div class="col-3 text-end mt-2">
                            <button type="submit" class="send_btn">Register</button>
                        </div>
                    </div>
                </form>
                <div class="row py-5">
                    <div class="mb-3 col-md-12">
                        @if (session('errors'))
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach (session('errors')->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

