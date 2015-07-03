@extends('backend.master')
@section('title')
    block - @parent
@stop
@section('content')
    <h1 class="page-header content_blog">ブロック一覧</h1>
    {{ Notification::showAll() }}
    <div class="pull-left">
        <div class="btn-toolbar">
            <a href="{{ URL::route('backend.blocks.create') }}" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span>&nbsp;新規ブロック作成
            </a>
        </div>
    </div>
    <div style="clear:both"></div>
    @if($blocks->count())
    <div class="table-resposive">
        <table id="sortable-table" class="table table-striped">
        <thead>
            <tr>
                <th><span class="glyphicon glyphicon-save"></span></th>
                <th>タイトル</th>
                <th>公開</th>
                <th>タイプ</th>
                <th>作成日</th>
                <th>更新日</th>
                <th>ID</th>
                <th>削除</th>
            </tr>
        </thead>
        <tbody>
@foreach($blocks as $block)
        <!-- ブロックの削除アラート -->
        <div class="modal fade" id="blockModal{{$block->id}}" tabindex="-1" role="dialog" aria-lavelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3 class="modal-title">ブロックの削除</h3>
                    </div>
                    <div class="modal-body">
                        <p><span class="text-danger lead">{{ $block->title }}</span>を削除していいですか？<br>削除すると戻せません。</p>
                    </div>
                    <div class="modal-footer">
                        {{ Form::open(array('url' => 'backend/blocks/' . $block->id, 'class' => 'pull-right')) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::button('キャンセル', array('class' => 'btn btn-default', 'data-dismiss' => 'modal')) }}
                        {{ Form::submit('削除', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
        <!--  ブロックの削除アラートここまで      -->
            
            <tr>
                <td></td>
                <td><a href="{{ URL::route('backend.blocks.edit', array($block->id)) }}">{{ $block->title }}</a></td>
                <td>{{ ($block->is_published) ? '公開' : '非公開' }}</td>
                <td>{{ $block->type}}</td>
                <td>{{ $block->created_at}}</td>
                <td>{{ $block->updated_at }}</td>
                <td>{{ $block->id }}</td>
                <td><a data-toggle="modal" href="#blockModal{{$block->id }}"><span class="glyphicon glyphicon-remove-circle" Title="Delete block"></span></a></td>
            </tr>
@endforeach
        </tbody>
        </table>
    </div>
    {{ $blocks->links() }}
@else
    <div class="alert alert-danger">No results found</div>
@endif
@section('script')
@parent
    {{ HTML::script('asset/js/jquery-ui-1.11.4.custom/jquery-ui.min.js') }}
    <script type="text/javascript">
        fadeOut('.alert', 3000);
        $('#sortable-table tbody').sortable();
        $('#submit')
        var sortID = $('#sortable-table tbody').sortable("toArray");
    </script>
@stop