@extends('layouts.site')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading text-center"> آخرین اخبار </div>

                    <div class="panel-body">

                        @foreach($articles as $article)
                            <div class="col-md-4">
                                <div class="panel panel-primary">
                                    <div class="panel-heading text-center">
                                        {{ $article->title }}
                                    </div>
                                    <div class="panel-body">
                                        {{ $article->description }}
                                        <img src="{{ unserialize($article->images)['thumb']}}"
                                             class="img-responsive"
                                             alt="{{ $article->title }}">
                                    </div>
                                    <div class="panel-footer">
                                        @if(strlen($article->body) > 200)
                                        <a class="btn btn-primary" href="{{route('article.show',$article->id)}}"> ادامه مطلب </a>
                                        @else
                                        <a class="btn btn-primary" disabled> ادامه مطلب </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>
                    <div class="panel-footer ltr text-center">
                        {{$articles->links()}}
                    </div>
                </div>
                {{--<div class="panel panel-default">
                    <div class="panel-heading text-center"> آخرین آزمون ها </div>

                    <div class="panel-body">

                        @foreach($articles as $article)
                            <div class="col-md-4">
                                <div class="panel panel-primary">
                                    <div class="panel-heading text-center">   {{ $article->title }}  </div>
                                    <div class="panel-body">
                                        {{ $article->description }}
                                        @if(strlen($article->body) > 200)
                                            ...
                                        @endif
                                    </div>
                                    <div class="panel-footer">
                                        @if(strlen($article->body) > 200)
                                            <a class="btn btn-primary" href="#"> ادامه مطلب </a>
                                        @else
                                            <a class="btn btn-primary" disabled> ادامه مطلب </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-md-4">
                        </div>
                    </div>
                </div>--}}
            </div>
        </div>
    </div>
@endsection