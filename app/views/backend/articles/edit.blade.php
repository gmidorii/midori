@extends('backend.master')
@section('title')
    記事編集 - @parent
@stop
@section('content')
    <h1 class="page-header content_blog">記事編集</h1>
    {{ Form::open(array('action' => array('ArticlesController@update',$article->id), 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PUT')) }}

    <!-- タイトル -->
    <div class="form-group has-feedback {{ $errors->has('title') ? 'has-error' : '' }}" >
        <label class="control-label col-sm-2" for="title">タイトル</label>
        <div class="col-sm-10">
            {{ Form::text('title', $article->title, array('class' => 'form-control' , 'id' => 'title', 'placeholder' => 'タイトル')) }}
@if($errors->first('title'))
            <span class="help-block">{{ $errors->first('title') }}</span>
@endif
        </div>
    </div>
    
     <!-- 公開設定 -->
    <div class="form-group">
        <label class="control-label col-sm-2" for="is_published">公開</label>
        <div class="col-sm-10">
        {{ Form::checkbox('is_published', 'is_published', $article->is_published, array('id' => 'is_published')) }}
        </div>
    </div>

    <!-- カテゴリ-->
    <div class="form-group has-feedback {{ $errors->has('category_id') ? 'has-error' : '' }}" >
        <label class="control-label col-sm-2" for="category_id">カテゴリ</label>
        <div class="col-sm-10">
        {{ Form::select('category_id', array('default' => '選択') + $categories, $article->category_id, array('class' => 'form-control')) }}
        </div>
    </div>

    <!-- 記事内容-->
    <div class="form-group has-feedback {{ $errors->has('content') ? 'has-error' : '' }}" >
        <label class="control-label col-sm-2" for="content">記事内容</label>
        <div class="col-sm-10">
            {{ Form::textarea('content', $article->content, array('class' => 'ckeditor form-control', 'id' => 'content', 'placeholder' => '記事内容')) }}
@if($errors->first('content'))
            <span class="help-block">{{ $errors->first('content') }}</span>
@endif
        </div>
    </div>
    
    <!-- Form action-->
    {{ Form::submit('変更保存', array('class' => 'btn btn-success')) }}
        <a href="{{ url('backend/articles') }}" class="btn btn-default">&nbsp;キャンセル</a>
    {{ Form::close() }}
@stop
@section('script')
@parent
    {{ HTML::script('ckeditor/ckeditor.js') }}
@stop