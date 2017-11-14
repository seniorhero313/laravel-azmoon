@extends('layouts.site')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading text-center"> {{ $exam->title }} </div>
                    <div class="panel-body">
                        {!! $exam->description !!}
                        <br>
                        تعداد سوالات آزمون :
                        {{ count($exam->questions) }}
                        <br>
                        <br>

                        <form method="post" action="{{route('exam.request')}}" class="text-center">
                            {{csrf_field()}}
                            <input type="hidden" name="exam_id" value="{{$exam->id}}">
                            <button class="btn btn-lg btn-primary" type="submit"> شروع آزمون </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection