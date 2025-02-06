@extends('layouts.layout')

@section('content')
    <div id="contact" class="contact">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                         <div class="alert alert-danger">
                            {{ session('error') }}
                         </div>
                    @endif
                </div>
            </div>
            <div class="row mb-5 mt-5 border-tab">
                <div class="col-md-12">
                    <h2>Statistics</h2>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="titlepage pb-0">
                                <h3 class="text-left"><strong class="yellow">Most popular test</strong><br>{{ $statistics->mostPopular->name }}</h3>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="titlepage pb-0">
                                <h3 class="text-left"><strong class="yellow">Best results</strong><br>{{ $statistics->bestResult->name }}</h3>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="titlepage pb-0">
                                <h3 class="text-left"><strong class="yellow">The worst results</strong><br>{{ $statistics->worstResult->name }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row border-tab">
                <div class="col-md-6 my-auto">
                    <div class="titlepage pb-0">
                        <h2 class="text-left"><strong class="yellow">Create new</strong><br>Category</h2>
                    </div>
                </div>
                <div class="col-md-6">
                    <form method="post" action="{{route('categoryInsert')}}" class="contact_form">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 titlepage pb-0">
                                <label for="name">Category name</label>
                                <input type="text" class="contact_control" name="name">
                            </div>
                            <div class="col-md-6 titlepage pb-0 my-auto">
                                <button class="sign_btn" type="submit">Create category</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row mt-5 border-tab">
                <div class="col-md-6">
                    <div class="titlepage pb-0">
                        <h2 class="text-left"><strong class="yellow">Create new</strong><br>Test</h2>
                    </div>
                </div>
                <div class="col-md-6 my-auto">
                    <div class="titlepage pb-0">
                        <a class="sign_btn" href="{{route("tests.create")}}">Create test</a>
                    </div>
                </div>
            </div>
            <div class="row mb-5 mt-5 border-tab">
                <div class="col-md-12">
                    <h2>Tests table</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Category</th>
                                <th>Test name</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        @php
                            $counter = 0;
                        @endphp
                        @foreach($categories as $category)
                            <tr>
                                <td>{{$category->name}}</td>
                            </tr>
                            @foreach($category->subcategories as $subcategory)
                                <tr @if($counter++ % 2 == 0) class="zebra" @endif>
                                    <td></td>
                                    <td>{{$subcategory->name}}</td>
                                    <td> <a class="btn btn-dark btn-sm" href="{{route('tests.edit', ['test' => $subcategory->id])}}">Edit</a></td>
                                    <td>
                                        <form method="POST" action="{{ route('tests.destroy', ['test' => $subcategory->id]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-dark btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row border-tab">
                <div class="col-md-3 mt-5 my-auto">
                    <div class="titlepage pb-0">
                        <h2 class="text-left"><strong class="yellow">Create new</strong><br>Reminder</h2>
                    </div>
                </div>
                <div class="col-md-9 mt-5">
                    <form method="post" action="{{ route("reminderInsert") }}" class="contact_form" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-4 titlepage pb-0">
                                <label for="alt">Text</label>
                                <input type="text" class="contact_control" name="alt">
                            </div>
                            <div class="col-md-4 titlepage pb-0">
                                <label for="picture">Picture</label>
                                <input type="file" class="form-control" name="picture">
                            </div>
                            <div class="col-md-4 titlepage pb-0">
                                <button class="sign_btn" type="submit">Create reminder</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row border-tab">
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Reminder</th>
                            <th>Text</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($reminders as $reminder)
                            <tr>
                                <td> <img src="{{ asset('assets/img/'.$reminder->path) }}" alt="{{ $reminder->alt }}" width="150px"></td>
                                <td>{{$reminder->alt}}</td>
                                <td>
                                    <form method="POST" action="{{ route('deleteReminder', ['reminder' => $reminder->id]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-dark btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div div="row">
                        <ul class="pagination pagination-sm justify-content-end">
                            {{ $reminders->links("pagination::bootstrap-4") }}
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row mb-5 mt-5 border-tab">
                <div class="col-md-12">
                    <h2>Users messages</h2>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Email</th>
                            <th>Message</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $counter = 0;
                        @endphp
                        @foreach($messages as $message)

                                <tr @if($counter++ % 2 == 0) class="zebra" @endif>
                                    @if($message->userEmail != null)
                                        <td>{{ $message->userEmail }}</td>
                                    @else
                                        <td>{{ $message->messageEmail }}</td>
                                    @endif
                                    <td>{{ $message->message }}</td>
                                </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection


