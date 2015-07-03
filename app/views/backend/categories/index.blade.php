@extends('backend.master')
@section('title')
    category - @parent
@stop
@section('content')
    <h1 class="page-header content_blog">カテゴリ一覧</h1>
    {{ Notification::showAll() }}
    <div class="pull-left">
        <div class='btn-toolbar'>
            <a href="{{ URL::route('backend.categories.create') }}" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i>&nbsp;新規カテゴリ作成</a>
        </div>
    </div>
    <div style="clear:both"></div>
@if($categories->count())
    <div class="table-responsive">
        <table class="table table-striped">
        <thead>
            <tr>
            <th>カテゴリ名</th>
            <th>作成日</th>
            <th>更新日</th>
            <th>ID</th>
            <th>削除</th>
            </tr>
        </thead>
        <tbody>
@foreach($categories as $category)
        <!-- カテゴリの削除アラート -->
        <div class="modal fade" id="catModal{{$category->id}}" tabindex="-1" role="dialog" aria-lavelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3 class="modal-title">記事の削除</h3>
                    </div>
                    <div class="modal-body">
                        <p><span class="text-danger lead">{{ $category->category }}</span>を削除していいですか？<br>一度削除すると戻せません。</p>
                    </div>
                    <div class="modal-footer">
                        {{ Form::open(array('url' => 'backend/categories/' . $category->id, 'class' => 'pull-right')) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::button('キャンセル', array('class' => 'btn btn-default', 'data-dismiss' => 'modal')) }}
                        {{ Form::submit('削除', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
        <!--  カテゴリの削除アラートここまで      -->
            <tr>
            <td><a href="{{ URL::route('backend.categories.edit', array($category->id)) }}">{{ $category->category }}</a></td>
            <td>{{ $category->created_at }}</td>
            <td>{{ $category->updated_at }}</td>
            <td>{{ $category->id }}</td>
                <td><a data-toggle="modal" href="#catModal{{$category->id}}"><span class="glyphicon glyphicon-remove-circle" Title="Delete Category"></span></a></td>
            </tr>
@endforeach
        </tbody>
        </table>
    </div>
    {{ $categories->links() }}
@else
    <div class="alert alert-danger">No results found</div>
@endif
@section('script')
@parent
    <script type="text/javascript">
        fadeOut('.alert', 3000);
    </script>
@stop