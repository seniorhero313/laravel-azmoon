@extends('layouts.site')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading text-center"> {{ $article->title }} </div>
                    <div class="panel-body">
                        <img src="{{ $img }}"
                             class="img-responsive box-center"
                             alt="{{ $article->title }}">

                        <hr>
                        {!! $article->body !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection