@extends('layouts.layout')

@section('title') English tests - Tests @endsection
@section('description') English language tests by category and results for each user. @endsection
@section('keywords') English test, Test, Exercises, Business, Results @endsection

@section('content')
    <div id="service" class="service">
        <div class="container">
            <div class="row mb-3">
                <div class="col-md-12">
                    <form class="contact_form row" action="{{route('tests.index')}}" method="get">
                        <div class="col-md-4">
                            <select name="categoryFilter" class="contact_control mt-4">
                                <option value="0">All categories</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" @if(request()->categoryFilter && request()->categoryFilter == $category->id) selected @endif>
                                        {{$category->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <input class="contact_control mt-4" type="text" name="testName" value="{{request()->testName ?? ''}}" placeholder="Test name">
                        </div>
                        <div class="col-md-4">
                            <button class="send_btn btn-sm float-left mb-2 p-2" style="width: 18%"><i class="fa fa-search fa-md" aria-hidden="true"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            @foreach($categories as $category)
                @if($category->subcategories != null)
                    <div class="row">
                        <div class="col-md-7">
                            <div class="titlepage">
                                <h2><strong class="yellow">category</strong><br>{{$category->name}}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach($category->subcategories as $subcategory)
                            <div class="col-md-4 col-sm-6">
                                <div id="ho_color" class="service_box">
                                    <img src="{{ asset('assets/img/service_icon1.png') }}" alt="Test icon" />
                                    <h3 class="mb-3"> <a class="yellow" href="{{ route('tests.show', ['test' => $subcategory->id]) }}">{{$subcategory->name}}</a></h3>
                                    @if(count($subcategory->tests) > 0)
                                        <table class="table result-table">
                                            <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Result</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($subcategory->tests as $tests)
                                                <tr>
                                                    <td>{{date('d-m-Y', strtotime($tests->date))}}</td>
                                                    <td class="badge p-2 m-3 @if($tests->result < 50) badge-danger @elseif($tests->result < 70) badge-warning @else badge-success @endif">
                                                        {{round($tests->result, 2)}}%
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>

                                    @else
                                        <table class="table result-table">
                                            <thead>
                                            <tr>
                                                <th class="text-center">No results</th>
                                            </tr>
                                            </thead>
                                        </table>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection
