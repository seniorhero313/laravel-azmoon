<div class="panel panel-default">
<div class="panel-heading">
    <h3 class="panel-title"> منوی مطالب </h3>
</div>
<div class="panel-body">
    <ul class="nav nav-pills nav-stacked nav-pills-stacked-example">
        <li class="{{ (Request::is('admin/articles') ? 'active' : '') }}">
            <a href="{{route('articles.index')}}">مطالب</a></li>
        <li class="{{ (Request::is('admin/articles/create') ? 'active' : '') }}">
            <a href="{{route('articles.create')}}">مطلب جدید</a>
        </li>
    </ul>
</div>
</div>
