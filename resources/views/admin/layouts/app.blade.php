@include('admin.layouts.header')
@include('admin.layouts.nav')
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            @include('admin.layouts.sidebar')
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-body">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/selectize.js-master/dist/js/standalone/selectize.min.js"></script>
{{--<script src="/js/bootstrap-select.min.js"></script>--}}
{{--<script src="/js/admin.js"></script>--}}
@include('admin.layouts.footer')