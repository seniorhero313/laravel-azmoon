@extends('admin.layouts.app')

@section('title','ایجاد آزمون')

@section('exist-menu')
    @include('admin.exams.actionMenu')
@endsection

@section('script')
    <script src="/js/ckeditor/ckeditor.js"></script>
    <script src="/js/ckeditor/lang/fa.js"></script>
    <script>
        CKEDITOR.replace( 'description' ,{
            contentsLangDirection:'rtl',
            contentsLanguage: 'fa'
        });


    </script>
@endsection

@section('content')
    <form method="post" action="{{route('exams.store')}}">
        {{ csrf_field() }}
        @include('admin.layouts.errors')
        <div class="row">
            <div class="form-group col-md-6 pull-right">
                <label for="title">عنوان آزمون</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="عنوان آزمون" value="{{old('title')}}" required>
            </div>
            <div class="form-group  col-md-6 pull-right">
                <label for="duration">زمان آزمون - دقیقه</label>
                <input type="number" class="form-control" id="duration" name="duration" placeholder="00" value="{{old('duration')}}">
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <label for="description" class="control-label">توضیحات آزمون</label>
                    <textarea rows="5" class="form-control" name="description" id="description"
                              placeholder="توضیحات آزمون را وارد کنید">{{ old('description') }}</textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group  col-md-12">
                <button type="submit" class="btn btn-default">ثبت آزمون</button>
            </div>
        </div>
    </form>

@endsection