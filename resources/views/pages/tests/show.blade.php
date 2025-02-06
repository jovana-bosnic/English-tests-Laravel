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
                    <form id="post_form" class="contact_form">
                        <div class="row">
                            @php
                                $counter = 1;
                            @endphp
                            @if(count($tests) > 0)
                                @foreach($tests as $exercise)
                                    @php $quCounter = 1; @endphp
                                    <div class="col-md-12">
                                        <h3 class="yellow mt-5">{{$counter++}}. {{$exercise->text}}</h3>
                                    </div>
                                    <div class="col-md-12">
                                        <p class="assignment">- {{$exercise->assignment}}</p>
                                    </div>
                                    @if($exercise->type == "text")
                                        @foreach($exercise->questions as $question)
                                            <div class="col-md-11">
                                                {{$quCounter++}}.
                                                @if(is_null($question->text_first))
                                                    <input class="contact_control input-line" type="text" id="questionId-{{$question->id}}" name="questionId-{{$question->id}}">
                                                @else
                                                    {{$question->text_first}}
                                                @endif
                                                @if(!is_null($question->text_first))
                                                    <input class="contact_control input-line" type="text" id="questionId-{{$question->id}}" name="questionId-{{$question->id}}">
                                                @endif
                                                @if(!is_null($question->text_second))
                                                    {{$question->text_second}}
                                                @endif
                                            </div>
                                            <div class="col-md-1">
                                                <i id="correct-{{$question->id}}" class='fa fa-check btn-success p-1 correct-answer hide' aria-hidden='true'></i>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <span class="explanation" id="explanation-{{$question->id}}"></span>
                                            </div>
                                        @endforeach
                                    @else
                                        @foreach($exercise->questions as $question)
                                            <div class="col-md-12">
                                                {{$quCounter++}}. {{$question->text_first}}
                                            </div>
                                            <div class="col-md-11">
                                                @foreach($question->answers as $answer)
                                                    <input class="radio-answer" type="radio" value="{{$answer->text}}" name="questionId-{{$question->id}}"> {{$answer->text}}
                                                @endforeach
                                            </div>
                                            <div class="col-md-1">
                                                <i id="correct-{{$question->id}}" class='fa fa-check btn-success p-1 correct-answer hide' aria-hidden='true'></i>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <span class="explanation" id="explanation-{{$question->id}}"></span>
                                            </div>
                                        @endforeach
                                    @endif
                                @endforeach
                                <div class="col-md-12">
                                    <button id="checkAnswers" data-id="{{$categories["idCategory"]}}" class="send_btn">Check answers</button>
                                </div>
                            @else
                                <div class="col-md-12">
                                    <h2>Dear users, the test is being prepared. Thank you for your understanding.</h2>
                                </div>
                            @endif
                        </div>
                    </form>
                    <div class="mt-5"><h2 id="result"></h2></div>
                </div>
            </div>
        </div>
    </div>
@endsection

