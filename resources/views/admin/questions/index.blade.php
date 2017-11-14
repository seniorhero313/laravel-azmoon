@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center"> سوالات آزمون {{ $exam->title }}
                    <span style="font-size: 12px;" class="label label-primary">مدت آزمون : {{$exam->duration}} دقیقه</span>


                    @if($exam->status)
                        <span style="font-size: 12px;" class="label label-success "> وضعیت آزمون : فعال </span>
                    @else
                        <span style="font-size: 12px;" class="label label-danger "> وضعیت آزمون : غیر فعال </span>
                    @endif

                </h1>
                <a href="{{"/admin/exams/questions/$exam->id/create"}}" class="btn btn-primary"> ایجاد سوال جدید </a>
                <a href="{{route('exams.index')}}" class="btn btn-primary"> بازگشت به صفحه آزمون ها </a>
                <div class="row" style="padding: 10px;">
                    @foreach($questions as $question)
                        <div class="col-md-4 pull-right">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <span>{{$loop->index + 1 }}-</span> {{$question->question}}
                                    </h4>
                                </div>
                                <div class="panel-body">
                                    <ol>
                                        <li> {{$question->option1}} </li>
                                        <li>{{$question->option2}}</li>
                                        <li>{{$question->option3}}</li>
                                        <li>{{$question->option4}}</li>
                                    </ol>
                                </div>
                                <div class="panel-footer">
                                    <div class="text-success">
                                        جواب صحیح : {{ $question->answer }}
                                        <a href="{{"$exam->id/edit/$question->id"}}" class="pull-left btn btn-warning btn-sm"
                                           style="margin-right: 5px"> ویرایش  </a>
                                        <form action="delete/{{ $question->id }}" method="post" class="pull-left">
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection