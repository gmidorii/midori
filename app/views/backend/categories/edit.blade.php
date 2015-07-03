@extends('backend.master')
@section('title')
    カテゴリ編集 - @parent
@stop
@section('content')
    <h1 class="page-header content_blog">カテゴリ編集</h1>
    {{ Form::open(array('action' => array('CategoriesController@update',$category->id), 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PUT')) }}

    <!-- カテゴリ名 -->
    <div class="form-group has-feedback {{ $errors->has('category') ? 'has-error' : '' }}" >
        <label class="control-label category_name" for="category">カテゴリ名</label>
        <div>
            {{ Form::text('category', $category->category, array('class' => 'form-control' , 'id' => 'category', 'placeholder' => 'カテゴリ名')) }}
@if($errors->first('category'))
            <span class="help-block">{{ $errors->first('category') }}</span>
@endif
        </div>
    </div>
    
    <!-- Form action-->
    {{ Form::submit('変更保存', array('class' => 'btn btn-success')) }}
        <a href="{{ url('backend/articles') }}" class="btn btn-default">&nbsp;キャンセル</a>
    {{ Form::close() }}
@stop