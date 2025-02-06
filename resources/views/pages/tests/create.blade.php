@extends('layouts.layout')

@section('content')
    <div id="contact" class="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2><strong class="yellow">Create new</strong><br>Test</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    @if(Session::get('error'))
                        <div class="alert alert-danger mt-5" role="alert">
                            {{Session::get('error')}}
                        </div>
                    @endif
                        @if(Session::get('success'))
                            <div class="alert alert-success mt-5" role="alert">
                                {{Session::get('success')}}
                            </div>
                        @endif
                    <form id="post_form" class="contact_form" method="post" action="{{route("tests.store")}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <label for="testCategory">Test Category</label>
                                <select class="contact_control" id="testCategory" name="testCategory">
                                    <option value="0">Choose...</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="testName">Test Name</label>
                                <input type="text" class="contact_control" id="testName" name="testName">
                            </div>
                            @for($i = 1; $i <= 5; $i++)
                                <div class="row border-tab">
                                    @include('components.exercise', ['exercise' => null, 'i' => $i] )
                                    @for($j = 1; $j <= 3; $j++)
                                        <div class="row border-tab mx-3">
                                            @include('components.question', ['question' => null, 'i' => $i, 'j' => $j] )
                                        </div>
                                    @endfor
                                </div>
                            @endfor
                        </div>
                        <div class="col-md-12">
                            <button id="createTest" class="send_btn">Create test</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


