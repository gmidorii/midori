<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset='utg-8'>
    <title>ログイン</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        {{ Form::open(array('class' => 'form-signin')) }}
        <h2 class="form-signin-heading">ログインしてください</h2>
         {{ Form::text('username','',array('class'=>'form-control','placeholder'=>'Username')) }}
         {{ Form::password('password',array('class'=>'form-control','placeholder'=>'Password')) }}
        @if($errors->has())
            <div class='alert alert-danger'>
                <ul>
                @foreach($errors->all() as $warning)
                    <li>{{ $warning }}</li>
                @endforeach
                </ul>
            </div>
        @endif
        {{ Form::checkbox('remember', 1, false, ['id' => 'lavel_1'])  }}
        <label for="label_1">Remember me</label>
        {{ Form::submit('登録', array('class' => 'btn btn-lg btn-primary btn-block')) }}
        {{ Form::close() }}
    </div>
    <!-- container -->   
</body>
</html>