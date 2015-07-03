@extends('backend.master')
@section('title')
    article - @parent
@stop
@section('content')
    <h1 class="page-header content_blog">記事一覧</h1>
    {{ Notification::showAll() }}
    <div class="pull-left">
        <div class="btn-toolbar">
            <a href="{{ URL::route('backend.articles.create') }}" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span>&nbsp;新規記事作成
            </a>
        </div>
    </div>
    <div style="clear:both"></div>
@if($articles->count())
    <div class="table-resposive">
        <table class="table table-striped">
        <thead>
            <tr>
                <th>タイトル</th>
                <th>公開</th>
                <th>カテゴリ</th>
                <th>作成日</th>
                <th>更新日</th>
                <th>ID</th>
                <th>削除</th>
            </tr>
        </thead>
        <tbody>
@foreach($articles as $article)
        <!-- 記事の削除アラート -->
        <div class="modal fade" id="myModal{{$article->id}}" tabindex="-1" role="dialog" aria-lavelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3 class="modal-title">記事の削除</h3>
                    </div>
                    <div class="modal-body">
                        <p><span class="text-danger lead">{{ $article->title }}</span>を削除していいですか？<br>削除すると戻せません。</p>
                    </div>
                    <div class="modal-footer">
                        {{ Form::open(array('url' => 'backend/articles/' . $article->id, 'class' => 'pull-right')) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::button('キャンセル', array('class' => 'btn btn-default', 'data-dismiss' => 'modal')) }}
                        {{ Form::submit('削除', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
        <!--  記事の削除アラートここまで      -->
            <tr>
                <td><a href="{{ URL::route('backend.articles.edit', array($article->id)) }}">{{ $article->title }}</a></td>
                <td>{{ ($article->is_published) ? '公開' : '非公開' }}</td>
                <td>{{ $article->category->category or '' }}</td>
                <td>{{ $article->created_at}}</td>
                <td>{{ $article->updated_at }}</td>
                <td>{{ $article->id }}</td>
                <td><a data-toggle="modal" href="#myModal{{$article->id }}"><span class="glyphicon glyphicon-remove-circle" Title="Delete Article"></span></a></td>
            </tr>
@endforeach
        </tbody>
        </table>
    </div>
    {{ $articles->links() }}
@else
    <div class="alert alert-danger">No results found</div>
@endif
@section('script')
@parent
    <script type="text/javascript">
       fadeOut('.alert', 3000);
    </script>
@stop