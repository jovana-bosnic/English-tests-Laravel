@extends('layouts.layout')

@section('title') English tests - Reminders @endsection
@section('description') With our shortened versions of the lessons, remind yourself of the most important points on your journey to improve your English. @endsection
@section('keywords') English test, Test, Reminders, Business, Lessons @endsection

@section('content')

    <div class="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="titlepage">
                        <h2><strong class="yellow">quick</strong><br>reminder</h2>
                        <span>before taking the tests</span>
                        <p>With our shortened versions of the lessons, remind yourself of the most important points on your journey to improve your English.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @php
                $i = 1;
                @endphp
                @foreach($reminders as $reminder)
                    <div class="col-md-3 col-sm-6 mb-5">
                        <div class="gallery border-tab">
                            <a href="{{ asset('assets/img/'.$reminder->path) }}" class="big" rel="rel{{$i++}}">
                                <img src="{{ asset('assets/img/'.$reminder->path) }}" alt="{{ $reminder->alt }}" title="{{ $reminder->alt }}">
                                <div class="middle">
                                    <div class="text2">View More</div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div div="row">
                <div class="col-12">
                    <ul class="pagination pagination-md justify-content-end">
                        {{ $reminders->links("pagination::bootstrap-4") }}
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
