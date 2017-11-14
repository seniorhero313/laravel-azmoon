<div class="panel panel-default">
<div class="panel-heading">
    <h3 class="panel-title"> منوی مطالب </h3>
</div>
<div class="panel-body">
    <ul class="nav nav-pills nav-stacked nav-pills-stacked-example">
        <li class="{{ (Request::is('admin/exams') ? 'active' : '') }}">
            <a href="{{route('exams.index')}}">آزمون</a></li>
        <li class="{{ (Request::is('admin/exams/create') ? 'active' : '') }}">
            <a href="{{route('exams.create')}}">آزمون جدید</a>
            <a href="{{route('result.index')}}">نتایج آزمون</a>
        </li>
    </ul>
</div>
</div>
