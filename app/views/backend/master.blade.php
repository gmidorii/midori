<!DOCTYPE html>
<html lang='ja'>
<head>
    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        @section('title')
            Laravel4-blog
        @show
    </title>
    {{ HTML::style('asset/css/bootstrap.min.css') }}
    {{ HTML::style('asset/css/template.css') }}
</head>
<body>
    <div class='navbar navbar-default navbar-fixed-top' role='navigation'>
        <div class='container'>
            <div class='nabbar-header'>
                <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='.navbar-collapse'>
                    <span class="sr-only">Toggle nav</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                    <a class="navbar-brand" href="{{{ URL::to('/') }}}">Laravel4-Blog</a>
            </div>
            <div class="navbar-collapse collapse" >
                <ul class="nav navbar-nav">
                 <li class="{{ Request::is( 'backend/dashboard') ? 'active' : '' }}"><a href="{{{ URL::route('dashboard') }}}">ダッシュボード</a></li>
                <li class="{{ Request::is('backend/articles*') ? 'active' : ''}}" ><a href="{{{ URL::to('backend/articles') }}}">記事</a></li>
                    <li class="{{ Request::is('backend/categories*') ? 'active' : ''}}"><a href="{{{ URL::to('backend/categories') }}}">カテゴリー</a></li>
                    <li class="{{ Request::is('backend/blocks*') ? 'active' : ''}}"><a href="{{{ URL::to('backend/blocks') }}}">ブロック</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                <li><a href="{{{ URL::route('logout') }}}">ログアウト</a></li>
                </ul>
            </div>
            <!--  /.nav-collapse -->
        </div>
    </div>
    <div  class='container'>
    <!-- Content-->
    @yield('content')
    </div>
    <!-- /.container -->
@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js">
    </script>
    {{ HTML::script('asset/js/bootstrap.min.js') }}
    {{ HTML::script('asset/js/template.js') }}
@show
</body>
</html>