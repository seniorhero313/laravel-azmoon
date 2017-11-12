@extends('admin.layouts.app')

@section('title','مدیریت مطالب')

@section('exist-menu')
    @include('admin.articles.actionMenu')
@endsection

@section('content')

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th> عنوان </th>
                <th> چکیده </th>
                <th> بازدید </th>
                <th> نظرات </th>
                <th> عملیات </th>
            </tr>
            </thead>
            <tbody>
                @foreach($articles as $article)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $article->title }}</td>
                        <td>{{ $article->description }}</td>
                        <td>{{ $article->viewCount }}</td>
                        <td>{{ $article->commentCount }}</td>
                        <td>
                            <form action="{{ route('articles.destroy',['id' => $article->id]) }}"
                                  method="post">
                                {{method_field('delete')}}
                                {{csrf_field()}}
                                <div class="btn-group btn-group-xs">
                                    <a href="{{ route('articles.edit',['id' => $article->id])}}"
                                       class="btn btn-warning">ویرایش</a>
                                    <button type="submit" class="btn btn-danger">حذف</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection