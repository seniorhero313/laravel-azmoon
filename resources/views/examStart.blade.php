@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>{{$exam->title}}</h3>
                    <p>
                        {!!$exam->description!!}
                    </p>
                    <p>
                        <span>زمان آزمون پس از شروع فقط</span>
                        <span>{{$exam->duration}}</span>
                        <span>دقیقه است.</span>
                    </p>
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="alert alert-info">
                        با آرزوی موفقیت برای {{ $user->name }}
                        <br>
                        لطفا به تمامی سوالات پاسخ دهید ، با تشکر
                    </div>
                    <form method="post" action="" class="text-center">
                        {{csrf_field()}}
                        <input type="hidden" id="user_id" value="{{$user->id}}">
                        <input type="hidden" id="exam_id" value="{{$exam->id}}">
                        <input type="hidden" id="questions_Count" value="{{count($exam->questions)}}">
                        @foreach($exam->questions as $question)
                            <div class="col-md-6 pull-right question">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <span>{{$loop->index + 1 }}-</span> {{$question->question}}
                                        </h4>
                                    </div>
                                    <div class="panel-body text-right">
                                        <ol>
                                            <li>
                                                <label for="{{"$question->id-1"}}">
                                                    <input type="radio" id="{{$question->id}}-1"
                                                           answer="1" name="{{$question->id}}"> {{$question->option1}}
                                                </label>
                                            </li>
                                            <li>
                                                <label for="{{"$question->id-2"}}">
                                                    <input type="radio" id="{{$question->id}}-2"
                                                           answer="2" name="{{$question->id}}"> {{$question->option2}}
                                                </label>
                                            </li>
                                            <li>
                                                <label for="{{"$question->id-3"}}">
                                                    <input type="radio" id="{{$question->id}}-3"
                                                           answer="3" name="{{$question->id}}"> {{$question->option3}}
                                                </label>
                                            </li>
                                            <li>
                                                <label for="{{"$question->id-4"}}">
                                                    <input type="radio" id="{{$question->id}}-4"
                                                           answer="4" name="{{$question->id}}"> {{$question->option4}}
                                                </label>
                                            </li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <button id="submitAnswer"> ثبت جواب ها</button>
                    </form>
                </div>
                <script src="/js/jquery.min.js"></script>
                <script>
                    $(document).ready(function () {
                        //
                        $(document).on('click','#submitAnswer',function (e) {
                            e.preventDefault();
                            var val = $('.question input:checked'),
                                userAnswers = [],
                                questionsCount = $('#questions_Count').val(),
                                user_id = $('#user_id').val(),
                                exam_id = $('#exam_id').val();

                            $(val).each(function (index, value) {
                                var questionId = $(this).attr('name'),
                                    userAnswer = $(this).attr('answer');
                                userAnswers.push({
                                   question_id: questionId,
                                    user_answer: userAnswer
                                });
                            });

                            if(Number(questionsCount) === userAnswers.length){
                                data = {
                                    userAnswers:userAnswers,
                                    user_id:user_id,
                                    exam_id:exam_id
                                };

                                console.log(data);
                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                });
                                $.ajax({
                                    url:'{{route('answers.getUserAnswers')}}',
                                    method:'POST',
                                    datatype: 'JSON',
                                    data:data,
                                    success:function (resp) {
                                        console.log(resp);
                                        location.href = '/';
                                    },
                                    error:function (resp) {
                                        var msg = resp.responseJSON.error;
                                        alert(msg);
                                        location.href = '/';
                                    }
                                });
                            }else {
                                alert('لطفا به تمامی سوالات پاسخ دهید');
                            }
                        })
                    });
                </script>
            </div>
        </div>
    </div>
</div>
@endsection
