@extends('layouts.layout')

@section('content')
    <div id="contact" class="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2><strong class="yellow">{{$categories["category"]}}</strong><br>{{$categories["subcategory"]}}</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <form id="post_form" method="post" class="contact_form" action="{{route('tests.update', ['test' => $categories["idCategory"]])}}">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            @php
                                $counter = 1;
                            @endphp
                            @foreach($tests as $exercise)
                                <div class="row border-tab">
                                    @include('components.exercise', ['exercise' => $exercise, 'i' => $exercise->exerciseId])

                                    @foreach($exercise->questions as $question)
                                        <div class="row border-tab mx-3">
                                            @include('components.question', ['question' => $question, 'i' => $exercise->exerciseId, 'j' => $question->id])
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                            <div class="col-md-12">
                                <button class="send_btn">Edit</button>
                            </div>
                        </div>
                    </form>
                    <div class="mt-5"><h2 id="result"></h2></div>
                </div>
            </div>
        </div>
    </div>
@endsection

