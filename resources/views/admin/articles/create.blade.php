@extends('admin.layouts.app')

@section('title','مدیریت مطالب')

@section('exist-menu')
    @include('admin.articles.actionMenu')
@endsection

@section('script')
    <script src="/js/ckeditor/ckeditor.js"></script>
    <script src="/js/ckeditor/lang/fa.js"></script>
    <script>
        CKEDITOR.replace( 'body' ,{
            contentsLangDirection:'rtl',
            contentsLanguage: 'fa'
        });

        var tags = $('#tags').selectize({
            delimiter: ',',
            persist: false,
            // options:[{text:'cat',value:'cat'},{text:'dog',value:'dog'},{text:'snake',value:'snake'}],
            create: function(input) {
                return {
                    value: input,
                    text: input
                }
            }
        });

    </script>
@endsection

@section('content')
    <form method="post" action="{{route('articles.store')}}" enctype="multipart/form-data">
        {{csrf_field()}}
        @include('admin.layouts.errors')
        <div class="form-group">
            <div class="col-sm-12">
                <label for="title" class="control-label">عنوان مقاله</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="عنوان را وارد کنید" value="{{ old('title') }}">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-12">
                <label for="body" class="control-label">متن</label>
                <textarea rows="5" class="form-control" name="body" id="body"
                          placeholder="متن مقاله را وارد کنید">{{ old('body') }}</textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-6">
                <label for="images" class="control-label">تصویر مقاله</label>
                <input type="file" class="form-control" name="images" id="images"
                       placeholder="تصویر مقاله را وارد کنید">
            </div>
            <div class="col-sm-6">
                <label for="tags" class="control-label">برچسب ها</label>
                <input type="text" class="form-control" name="tags" id="tags"
                       placeholder="تگ ها را وارد کنید" value="{{ old('tags') }}">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-12">
                <button type="submit" class="btn btn-danger">ارسال</button>
            </div>
        </div>
    </form>

@endsection