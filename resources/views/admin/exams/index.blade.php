@extends('admin.layouts.app')

@section('title','مدیریت آزمون')

@section('exist-menu')
    @include('admin.exams.actionMenu')
@endsection

@section('content')

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th> عنوان </th>
                <th> توضیحات </th>
                <th> زمان - دقیقه</th>
                <th> عملیات </th>
            </tr>
            </thead>
            <tbody>
                @foreach($exams as $exam)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $exam->title }}</td>
                        <td>{!! $exam->description !!}</td>
                        <td>{{ $exam->duration }}</td>
                        <td>
                            <form action="{{ route('exams.destroy',['id' => $exam->id])}}"
                                  method="post">
                                {{csrf_field()}}
                                <div class="btn-group btn-group-xs">
                                    <a href="{{ route('exams.edit',['id' => $exam->id])}}"
                                       class="btn btn-warning">ویرایش</a>
                                    <button type="submit" class="btn btn-danger">حذف</button>
                                </div>
                            </form>
                            <a class="btn btn-sm btn-primary" href="exams/questions/{{$exam->id}}/">مدیریت سوالات</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection