@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center"> سوال جدید </h1>
                <a href="{{ "/question/$question->exam_id" }}" class="btn btn-primary"> بازگشت به سوالات </a>
                {{--@include('layouts.errors')--}}
                <form method="post" action="{{"/admin/exams/questions/$question->exam_id/update"}}">
                    {{ csrf_field() }}
                    <input type="hidden" name="exam_id" value="{{$question->exam_id}}">
                    <input type="hidden" name="id" value="{{$question->id}}">
                    <div class="row">
                        <div class="form-group col-md-12 pull-right">
                            <label for="question">متن سوال</label>
                            <input type="text" class="form-control"
                                   id="title" name="question" placeholder="question"
                                   value="{{$question->question}}" required>
                        </div>
                        <div class="form-group col-md-12 pull-right">
                            <label for="option1">گزینه اول</label>
                            <input type="text" class="form-control"
                                   id="option1" name="option1" placeholder="option1"
                                   value="{{$question->option1}}" required>
                        </div>
                        <div class="form-group col-md-12 pull-right">
                            <label for="option2">گزینه دوم</label>
                            <input type="text" class="form-control"
                                   id="option2" name="option2" placeholder="option2"
                                   value="{{$question->option2}}" required>
                        </div>
                        <div class="form-group col-md-12 pull-right">
                            <label for="option3">گزینه سوم</label>
                            <input type="text" class="form-control"
                                   id="option3" name="option3" placeholder="option3"
                                   value="{{$question->option3}}" required>
                        </div>
                        <div class="form-group col-md-12 pull-right">
                            <label for="option4">گزینه چهارم</label>
                            <input type="text" class="form-control"
                                   id="option4" name="option4" placeholder="option4"
                                   value="{{$question->option4}}" required>
                        </div>
                        <div class="form-group col-md-10 pull-right">
                            <label>جواب درست</label><br>
                            <label for="ch1" class="col-md-3 pull-right">
                                @if($question->answer == 1)
                                    <input type="radio"  name="answer" id="ch1" checked="checked" value="1">
                                @else
                                    <input type="radio"  name="answer" id="ch1" value="1">
                                @endif
                                گزینه اول
                            </label>
                            <label for="ch2" class="col-md-3 pull-right">
                                @if($question->answer == 2)
                                    <input type="radio"  name="answer" id="ch2" checked="checked" value="2">
                                @else
                                    <input type="radio"  name="answer" id="ch2" value="2">
                                @endif
                                گزینه دوم
                            </label>
                            <label for="ch3" class="col-md-3 pull-right">
                                @if($question->answer == 3)
                                    <input type="radio"  name="answer" id="ch3" checked="checked" value="3">
                                @else
                                    <input type="radio"  name="answer" id="ch3" value="3">
                                @endif
                                گزینه سوم
                            </label>
                            <label for="ch4" class="col-md-3 pull-right">
                                @if($question->answer == 4)
                                    <input type="radio"  name="answer" id="ch4" checked="checked" value="4">
                                @else
                                    <input type="radio"  name="answer" id="ch4" value="4">
                                @endif
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