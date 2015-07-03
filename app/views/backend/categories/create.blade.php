@extends('backend.master')
@asection('title)
    カテゴリ作成 - @parent
@stop
@section('content')
     <h1 class="page-header content_blog">カテゴリ作成</h1>
    {{ Form::open(array('action' => 'CategoriesController@store', 'class' => 'form-horizontal', 'role' => 'form')) }}

    <!-- カテゴリ名 -->
    <div class="form-group has-feedback {{ $errors->has('category') ? 'has-error' : '' }}" >
        <label class="control-label category_name" for="category">カテゴリ名</label>
        <div>
            {{ Form::text('category', null, array('class' => 'form-control col-sm-8' , 'id' => 'category', 'placeholder' => 'カテゴリ名')) }}
@if($errors->first('category'))
            <span class="help-block">{{ $errors->first('category') }}</span>
@endif
        </div>
    </div>

    <!-- Form action-->
    {{ Form::submit('保存', array('class' => 'btn btn-success')) }}
        <a href="{{ url('backend/categories') }}" class="btn btn-default">&nbsp;キャンセル</a>
    {{ Form::close() }}
@stop
@section('script')
@parent
    {{ HTML::script('ckeditor/ckeditor.js') }}
@stop