@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center"> سوال جدید </h1>
                <a href="{{ "/question/$exam->id" }}" class="btn btn-primary"> بازگشت به سوالات </a>
                {{--@include('layouts.errors')--}}
                <form method="post" action="{{"create"}}">
                    {{ csrf_field() }}
                    <input type="hidden" name="exam_id" value="{{$exam->id}}">
                    <div class="row">
                        <div class="form-group col-md-12 pull-right">
                            <label for="question">متن سوال</label>
                            <input type="text" class="form-control"
                                   id="title" name="question" placeholder="question"
                                   value="{{old('question')}}" required>
                        </div>
                        <div class="form-group col-md-12 pull-right">
                            <label for="option1">گزینه اول</label>
                            <input type="text" class="form-control"
                                   id="option1" name="option1" placeholder="option1"
                                   value="{{old('option1')}}" required>
                        </div>
                        <div class="form-group col-md-12 pull-right">
                            <label for="option2">گزینه دوم</label>
                            <input type="text" class="form-control"
                                   id="option2" name="option2" placeholder="option2"
                                   value="{{old('option2')}}" required>
                        </div>
                        <div class="form-group col-md-12 pull-right">
                            <label for="option3">گزینه سوم</label>
                            <input type="text" class="form-control"
                                   id="option3" name="option3" placeholder="option3"
                                   value="{{old('option3')}}" required>
                        </div>
                        <div class="form-group col-md-12 pull-right">
                            <label for="option4">گزینه چهارم</label>
                            <input type="text" class="form-control"
                                   id="option4" name="option4" placeholder="option4"
                                   value="{{old('option4')}}" required>
                        </div>
                        <div class="form-group col-md-10 pull-right">
                            <label>جواب درست</label><br>
                            <label for="ch1" class="col-md-3">
                                <input type="radio"  name="answer" id="ch1"  value="1">
                                گزینه اول
                            </label>
                            <label for="ch2" class="col-md-3">
                                <input type="radio"  name="answer" id="ch2"  value="2">
                                گزینه دوم
                            </label>
                            <label for="ch3" class="col-md-3">
                                <input type="radio"  name="answer" id="ch3"  value="3">
                                گزینه سوم
                            </label>
                            <label for="ch4" class="col-md-3">
                                <input type="radio"  name="answer" id="ch4"  value="4">
                                گزینه چهارم
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group  col-md-6">
                            <button type="submit" class="btn btn-default">ثبت سوال</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection